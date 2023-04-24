<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\EducationStoreRequest;

class EducationController extends Controller
{
    public function index()
    {
        $list = Education::all();

        return view('admin.education.list', compact('list'));
    }

    public function create()
    {

        return view("admin.education.create-update");

    }

    public function store(EducationStoreRequest $request)
    {

        $data = $request->except("_token");

        Education::create($data);
        return redirect()->route("admin.index");

    }

    public function edit(Request $request, Education $education)
    {

        return view("admin.education.create-update",compact("education"));
    }

    public function update(Request $request, Education $education)
    {
        $data = $request->except("_token");

        $data['status'] = isset($data['status']) ? 1 : 0;
        $education->update($data);
        alert()->success('Başarılı', "Eğitim bilgileri güncellendi")->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);

        return redirect()->route("admin.index");
    }

    public function changeStatus(Request $request): \Illuminate\Http\JsonResponse
    {
        $educationID = $request->educationID;
        $education = Education::query()
            ->where("id", $educationID)
            ->first();

        if ($education) {
            $education->status = $education->status ? 0 : 1;
            $education->save();

            return response()
                ->json(['status' => "success", "message" => "Başarılı", "data" => $education, "education_status" => $education->status])
                ->setStatusCode(200);
        }

        return response()
            ->json(['status' => "error", "message" => "Makale bulunamadı"])
            ->setStatusCode(404);

    }

    public function delete(Request $request)
    {
        $educationID = $request->educationID;

        $education = Education::query()
            ->where("id", $educationID)
            ->first();
        if ($education) {
            $education->delete();
            return response()
                ->json(['status' => "success", "message" => "Başarılı", "data" => ""])
                ->setStatusCode(200);
        }
        return response()
            ->json(['status' => "error", "message" => "Eğitim bilgileri bulunamadı"])
            ->setStatusCode(404);
    }



}
