<?php

namespace App\Http\Controllers;

use App\Http\Requests\SocialMediaStoreRequest;
use App\Models\Icons;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function index()
    {
        $list = SocialMedia::all();
        $icons = Icons::all();

        return view('admin.social_media.list', compact('list', 'icons'));
    }

    public function create()
    {
        $icons = Icons::all();
        return view("admin.social_media.create-update", compact("icons"));

    }

    public function store(SocialMediaStoreRequest $request)
    {

        $data = $request->except("_token");

        SocialMedia::create($data);
        return redirect()->route("social-media.list");

    }


    public function edit(Request $request, SocialMedia $socialMedia)
    {
        $icons = Icons::all();
        return view("admin.social_media.create-update",compact("socialMedia", "icons"));
    }

    public function update(Request $request, SocialMedia $socialMedia)
    {
        $data = $request->except("_token");

        $data['status'] = isset($data['status']) ? 1 : 0;
        $socialMedia->update($data);
        alert()->success('Başarılı', "Eğitim bilgileri güncellendi")->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);

        return redirect()->route("social-media.list");
    }

    public function changeStatus(Request $request): \Illuminate\Http\JsonResponse
    {
        $socialMediaID = $request->socialMediaID;
        $socialMedia = SocialMedia::query()
            ->where("id", $socialMediaID)
            ->first();

        if ($socialMedia) {
            $socialMedia->status = $socialMedia->status ? 0 : 1;
            $socialMedia->save();

            return response()
                ->json(['status' => "success", "message" => "Başarılı", "data" => $socialMedia, "social_media_status" => $socialMedia->status])
                ->setStatusCode(200);
        }

        return response()
            ->json(['status' => "error", "message" => "Sosyal medya bulunamadı"])
            ->setStatusCode(404);

    }

    public function delete(Request $request)
    {
        $socialMediaID = $request->socialMediaID;

        $socialMedia = SocialMedia::query()
            ->where("id", $socialMediaID)
            ->first();
        if ($socialMedia) {
            $socialMedia->delete();
            return response()
                ->json(['status' => "success", "message" => "Başarılı", "data" => ""])
                ->setStatusCode(200);
        }
        return response()
            ->json(['status' => "error", "message" => "Sosya medya bilgileri bulunamadı"])
            ->setStatusCode(404);
    }
}
