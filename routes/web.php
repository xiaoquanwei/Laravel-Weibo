<?php
/**
 * web 路由
 */

use Illuminate\Support\Facades\Route;


Route::get('/', 'StaticPagesController@home')->name('home');  // get方式，第一个参数指明url，StaticPagesController是控制器，home是方法
Route::get('/help', 'StaticPagesController@help')->name('help');  // 在路由后面链式调用 name 方法来为路由指定名称
Route::get('/about', 'StaticPagesController@about')->name('about');

// 注册功能的路由
Route::get('signup', 'UsersController@create')->name('signup');

// 用户资源路由，restful
Route::resource('users', 'UsersController');
//上面代码将等同于：
//Route::get('/users', 'UsersController@index')->name('users.index');               // 所有用户列表页面
//Route::get('/users/{user}', 'UsersController@show')->name('users.show');          // 单个用户详情页面
//Route::get('/users/create', 'UsersController@create')->name('users.create');      // 创建用户页面
//Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');     // 更新用户信息页面
//Route::post('/users', 'UsersController@store')->name('users.store');              // 执行创建用户逻辑
//Route::patch('/users/{user}', 'UsersController@update')->name('users.update');    // 执行更新用户逻辑
//Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy'); // 执行删除用户逻辑
/*
 * 也就是说一个resource路由，就包含有：
1、列表页get
2、详情页get
3、创建页get，创建动作post
4、更新页get，更新动作patch
5、删除动作delete
*/
