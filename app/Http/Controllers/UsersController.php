<?php
/**
 * 用户控制器
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['show', 'create', 'store', 'index']
        ]);

        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

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

        // 创建用户数据
        $user = User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password'=>bcrypt($request->password),
        ]);

        // 注册成功后自动登录
        Auth::login($user);

        session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');

        // 跳转页面
        return redirect()->route('users.show', [$user]);
    }

    // 修改用户信息页面
    public function edit(User $user) {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    // 修改用户信息逻辑
    public function update(User $user, Request $request) {
        $this->authorize('update', $user);
        // 验证参数
        $this->validate($request, [
            'name' => 'required|max:50',
            'password' => 'nullable|confirmed|min:6'
        ]);

        $data = [];
        $data['name'] = $request->name;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        // 更新到数据库
        $user->update($data);

        session()->flash('success', '个人资料更新成功！');

        return redirect()->route('users.show', $user);
    }

    public function index() {
        $users = User::all();
        return view('users.index', compact('users'));
    }


}
