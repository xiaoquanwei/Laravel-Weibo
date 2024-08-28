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



}
