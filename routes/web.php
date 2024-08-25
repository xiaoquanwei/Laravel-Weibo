<?php
/**
 * web 路由
 */

use Illuminate\Support\Facades\Route;


Route::get('/', 'StaticPagesController@home')->name('home');  // get方式，第一个参数指明url，StaticPagesController是控制器，home是方法
Route::get('/help', 'StaticPagesController@help')->name('help');  // 在路由后面链式调用 name 方法来为路由指定名称
Route::get('/about', 'StaticPagesController@about')->name('about');
