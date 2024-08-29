<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
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
        if (Auth::attempt($credentials)) {
            session()->flash('success', '欢迎回来');
            return redirect()->route('users.show', [Auth::user()]);
        } else {
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back()->withInput();
        }
    }

    // 退出登录逻辑
    public function destroy() {
        return 'do logout';
    }




}
