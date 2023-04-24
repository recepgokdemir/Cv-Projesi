<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\isNull;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view("auth.login");
    }
//    public function showLoginUser()
//    {
//        return view ("front.auth.login");
//    }
    public function login(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember;

        if (!isNull($remember))
        {
            $remember=true;
        }
        else
        {
            $remember=false;
        }

        $user = User::query()
            ->where("email", $email)
            ->first();

        if ($user && Hash::check($password, $user->password))
        {
            Auth::login($user, $remember);
            return redirect()->route("admin.index");
        }
        else
        {
            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => "Kullanıcı Adı veya Parolanızı Kontrol Ediniz."
                ])
                ->onlyInput("email", "remember");

        }



    }

    public function logout(Request $request)
    {
        if (Auth::check())
        {
            $isAdmin = Auth::user()->is_admin;
//            $this->log("logout", auth()->id(), auth()->user()->toArray(), User::class);

            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();
            if (!$isAdmin)
                return redirect()->route("admin.index");

            return redirect()->route("login");
        }
    }

}
