<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function __construct() {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    // 登录视图页面
    public function create() {
        return view('sessions.create');
    }

    // 登录处理逻辑
    public function store(Request $request) {
        // 参数验证
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        // 用户身份认证
        if (Auth::attempt($credentials, $request->has('remember'))) {
            session()->flash('success', '欢迎回来');
            $fallback = route('users.show', Auth::user());
            return redirect()->intended($fallback);
        } else {
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back()->withInput();
        }
    }

    // 退出登录逻辑
    public function destroy() {
        Auth::logout();
        session()->flash('success', '您已成功退出');
        return redirect('login');
    }




}
