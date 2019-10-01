<?php
/**
 * User: zengrui
 */

namespace App\Cartoon\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function showLoginForm()
    {

        return view('cartoon.auth.login');
    }

    public function doLogin(Request $request)
    {
        $params = [
            'email' => $request->input('username'),
            'password' => $request->input('password'),
        ];
        if (Auth::attempt(['email' => $params['email'],'password' => $params['password']],true)) {
            return response()->json(['code' => 200,'msg' => '登陆成功']);
        } else {
            return response()->json(['code' => 403,'msg' => '账号或密码错误']);
        }

    }

    public function logout()
    {
        Auth::logout();
    }
}