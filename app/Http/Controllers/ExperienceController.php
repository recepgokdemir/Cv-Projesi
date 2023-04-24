<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperienceStoreRequest;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $list = Experience::all();

        return view('admin.experience.list', compact('list'));
    }

    public function create()
    {

        return view("admin.experience.create-update");

    }

    public function store(ExperienceStoreRequest $request)
    {

        $data = $request->except("_token");

        Experience::create($data);
        return redirect()->route("experience.list");

    }

    public function edit(Request $request, Experience $experience)
    {

        return view("admin.experience.create-update",compact("experience"));
    }

    public function update(Request $request, Experience $experience)
    {
        $data = $request->except("_token");

        $data['status'] = isset($data['status']) ? 1 : 0;
        $experience->update($data);
        alert()->success('Başarılı', "Eğitim bilgileri güncellendi")->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);

        return redirect()->route("admin.index");
    }

    public function changeStatus(Request $request): \Illuminate\Http\JsonResponse
    {
        $experienceID = $request->experienceID;
        $experience = Experience::query()
            ->where("id", $experienceID)
            ->first();

        if ($experience) {
            $experience->status = $experience->status ? 0 : 1;
            $experience->save();

            return response()
                ->json(['status' => "success", "message" => "Başarılı", "data" => $experience, "experience_status" => $experience->status])
                ->setStatusCode(200);
        }

        return response()
            ->json(['status' => "error", "message" => "Makale bulunamadı"])
            ->setStatusCode(404);

    }
    public function changeActive(Request $request): \Illuminate\Http\JsonResponse
    {
        $experienceID = $request->experienceID;
        $experience = Experience::query()
            ->where("id", $experienceID)
            ->first();

        if ($experience) {
            $experience->active = $experience->active ? 0 : 1;
            $experience->save();

            return response()
                ->json(['active' => "success", "message" => "Başarılı", "data" => $experience, "experience_active" => $experience->active])
                ->setStatusCode(200);
        }

        return response()
            ->json(['active' => "error", "message" => "Active bulunamadı"])
            ->setStatusCode(404);

    }

    public function delete(Request $request)
    {
        $experienceID = $request->experienceID;

        $experience = Experience::query()
            ->where("id", $experienceID)
            ->first();
        if ($experience) {
            $experience->delete();
            return response()
                ->json(['status' => "success", "message" => "Başarılı", "data" => ""])
                ->setStatusCode(200);
        }
        return response()
            ->json(['status' => "error", "message" => "Eğitim bilgileri bulunamadı"])
            ->setStatusCode(404);
    }
}
