<?php
/**
 * 用户控制器
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    // 用户注册页面
    public function create() {
        return view('users.create');
    }

    // 用户详情页面
    public function show(User $user) {
        return view('users.show', compact('user'));
    }

    // 执行用户注册逻辑
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|unique:users|max:50', // required必传参|在users表中唯一|长度最大为50
            'email' => 'required|email|unique:users|max:255', // email邮箱验证
            'password' => 'required|confirmed|min:6' // confirmed密码匹配验证
        ]);
        return;
    }





}
