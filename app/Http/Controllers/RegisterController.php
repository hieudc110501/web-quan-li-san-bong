<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class RegisterController extends Controller
{
    //show index
    public function show_register() {
        return view('register');
    }

    //register
    public function post_register(Request $request) {
        $account = $request['account'];
        $request->flash();
        $result = DB::table('taikhoan')->where('TenTaiKhoan', $account)->first();
            $new_user = array();
            $new_user['TenTaiKhoan'] = $request->account;
            $new_user['MatKhau'] =bcrypt($request->password);
            $new_user['Ten'] = $request->name;
            $new_user['VaiTro'] = 2;
            $res = User::create($new_user);
            if ($res) {
                return redirect('/login')->with('status', 'Đăng ký thành công');
            }
    }
}
