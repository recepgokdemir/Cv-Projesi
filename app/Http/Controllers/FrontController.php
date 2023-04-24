<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\PortfolioRequest;
use App\Models\Ability;
use App\Models\Article;
use App\Models\Contact;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Icons;
use App\Models\Portfolio;
use App\Models\SocialMedia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FrontController extends Controller
{
    public function home()
    {
        $list = User::query()->get();
        $education = Education::query()->orderBy("order", "asc")->get();
        $experience = Experience::query()->orderBy("order", "asc")->get();
        $social = SocialMedia::with("icons")->get();
        $ability = Ability::all();
        return view("front.index", compact("list", "education", "experience", "social", "ability"));
    }

    public function index()
    {
        $list = User::query()->get();
        $education = Education::all();
        $experience = Experience::all();
        $ability = Ability::all();
        $social = SocialMedia::with("icons")->get();
        return view("front.resume", compact("list", "education", "experience", "social", "ability",));
    }

    public function store()
    {
        $list = User::query()->get();
        $education = Education::all();
        $experience = Experience::all();
        $social = SocialMedia::with("icons")->get();
        $portfolio = Portfolio::all();
        return view("front.portfolio", compact("list", "education", "experience", "social", "portfolio"));
    }

    public function create()
    {


        $list = User::query()->get();
        $social = SocialMedia::with("icons")->get();

        return view("front.contact", compact("list", "social"));

    }

    public function stores(Request $request)
    {
        $request->validate([
           'g-recaptcha-response' => 'recaptcha',
        ]);

       $data = $request->except("token");
       Contact::create($data);
       return redirect()->route("contact");
    }





}
