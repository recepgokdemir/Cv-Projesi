<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('front.index');
});
Route::prefix("admin")->middleware('auth')->group(function (){

    Route::get('/', function (){
        return view('admin.index');
    })->name("admin.index");

    Route::get("user/create", [UserController::class, "create"])->name("user.create");
    Route::post("user/create", [UserController::class, "store"]);

    Route::get("/logout", [LoginController::class, "logout"])->name("logout");

    Route::get("educations", [EducationController::class, "index"])->name('education.list');
    Route::get("education/create", [EducationController::class, "create"])->name('education.create');
    Route::post("education/create", [EducationController::class, "store"]);

    Route::get('education/{education:id}/edit', [EducationController::class, 'edit'])->name('education.edit');
    Route::post('education/{education:id}/edit', [EducationController::class, 'update'])->whereNumber('id');

    Route::get('user/{user:id}/edit', [UserController::class, 'edit'])->name("user.edit");
    Route::post('user/{user:id}/edit', [UserController::class, 'update'])->whereNumber("id");

    Route::post('education/change-status', [EducationController::class, 'changeStatus'])->name('education.changeStatus');
    Route::post('education/delete', [EducationController::class, 'delete'])->name("education.delete");

    Route::get("experiences", [ExperienceController::class, "index"])->name('experience.list');
    Route::get("experience/create", [ExperienceController::class, "create"])->name('experience.create');
    Route::post("experience/create", [ExperienceController::class, "store"]);

    Route::get('experience/{experience:id}/edit', [ExperienceController::class, 'edit'])->name('experience.edit');
    Route::post('experience/{experience:id}/edit', [ExperienceController::class, 'update'])->whereNumber('id');

    Route::post('experience/change-status', [ExperienceController::class, 'changeStatus'])->name('experience.changeStatus');
    Route::post('experience/change-active', [ExperienceController::class, 'changeActive'])->name('experience.changeActive');
    Route::post('experience/delete', [ExperienceController::class, 'delete'])->name("experience.delete");

    Route::get("social-media", [SocialMediaController::class, "index"])->name('social-media.list');
    Route::get("social-media/create", [SocialMediaController::class, "create"])->name('social-media.create');
    Route::post("social-media/create", [SocialMediaController::class, "store"]);

    Route::get('social-media/{socialMedia:id}/edit', [SocialMediaController::class, 'edit'])->name('social-media.edit');
    Route::post('social-media/{socialMedia:id}/edit', [SocialMediaController::class, 'update'])->whereNumber('id');

    Route::post('social-media/change-status', [SocialMediaController::class, 'changeStatus'])->name('socialMedia.changeStatus');
    Route::post('social-media/delete', [SocialMediaController::class, 'delete'])->name("social-media.delete");


    Route::get("portfolio", [PortfolioController::class, "index"])->name('portfolio.list');
    Route::get("portfolio/create", [PortfolioController::class, "create"])->name('portfolio.create');
    Route::post("portfolio/create", [PortfolioController::class, "store"]);

    Route::get('portfolio/{portfolio:id}/edit', [PortfolioController::class, 'edit'])->name('portfolio.edit');
    Route::post('portfolio/{portfolio:id}/edit', [PortfolioController::class, 'update'])->whereNumber('id');

    Route::post('portfolio/change-status', [PortfolioController::class, 'changeStatus'])->name('portfolio.changeStatus');
    Route::post('portfolio/delete', [PortfolioController::class, 'delete'])->name("portfolio.delete");

    Route::get("contact-list", [ContactController::class, "index"])->name('contact-list');
    Route::post('contact/delete', [ContactController::class, 'delete'])->name("contact.delete");


});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get("/login", [LoginController::class,"showLogin"])->name("login");
Route::post("/login", [LoginController::class, "login"]);

Route::get('/', [FrontController::class, "home"])->name("home");
Route::get("resume", [FrontController::class, "index"])->name("resume");

Route::get("contact", [FrontController::class, "create"])->name("contact");
Route::post("contact", [FrontController::class, "stores"]);

Route::get("portfolio", [FrontController::class, "store"])->name("portfolio");








//Route::get("makaleler", [FrontController::class, "articleList"])->name("front.articleList");
//Route::get("/kategoriler/{category:slug}", [FrontController::class, "category"])->name("front.categoryArticles");
//Route::get("/yazarlar/{user:username}", [FrontController::class, "authorArticles"])->name("front.authorArticles");
//Route::get("/@{user:username}/{article:slug}", [FrontController::class, "articleDetail"])->name("front.articleDetail")->middleware("visitedArticle");
//Route::post("/{article:id}/makale-yorum", [FrontController::class, "articleComment"])->name("article.comment");
//Route::get("/arama", [FrontController::class, "search"])->name("front.search");



