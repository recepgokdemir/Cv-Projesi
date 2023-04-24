<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{

    public function create()
    {
        return view("admin.user.create-update");
    }

    public function store(Request $request)
    {

        $data = $request->except("_token");
        $data['password'] = bcrypt($data['password']);
        $data['status'] = isset($data['status']) ? 1 : 0;
        User::create($data);

//        alert()->success('Başarılı', "Kullanıcı oluşturuldu")->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);

        return redirect()->route("admin.index");
    }


    public function edit(Request $request, User $user)
    {
        return view("admin.user.create-update", compact("user"));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $data = $request->except("_token");

        if (!is_null($data["password"]))
        {
            $data['password'] = bcrypt($data['password']);
        }
        else
        {
            unset($data['password']);
        }
        $data['status'] = isset($data['status']) ? 1 : 0;
        $user->update($data);

        alert()->success('Başarılı', "Kullanıcı güncellendi")->showConfirmButton('Tamam', '#3085d6')->autoClose(5000);

        return redirect()->back();
    }}



//
//    public function delete(Request $request)
//    {
//        $user = User::findOrFail($request->id);
//        $user->delete();
//
//        return response()
//            ->json(['status' => "success", "message" => "Başarılı", "data" => "" ])
//            ->setStatusCode(200);
//    }
//
//}
