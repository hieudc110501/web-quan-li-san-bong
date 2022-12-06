<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class LoginController extends Controller
{

    public function username()
    {
        return 'TenTaiKhoan';
    }

    public function show_login() {
        return view('login');
    }

    public function post_login(Request $request) {
        $tk = $request['account'];
        $mk = $request['password'];

        $ad = [
            'TenTaiKhoan' => $tk,
            'password' => $mk,
        ];

        if (Auth::attempt($ad)) {
            return Redirect::to('index');
        } else {
            return redirect()->back()->withInput()->with('message', 'Sai tên tài khoản hoặc mật khẩu');
        }
    }


    public function logout() {
        Auth::logout();
        return Redirect::to('/login');
    }
}
