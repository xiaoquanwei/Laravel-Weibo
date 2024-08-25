<?php
/**
 * web 路由
 */

use Illuminate\Support\Facades\Route;


Route::get('/', 'StaticPagesController@home');  // get方式，第一个参数指明url，StaticPagesController是控制器，home是方法
Route::get('/help', 'StaticPagesController@help');
Route::get('/about', 'StaticPagesController@about');
