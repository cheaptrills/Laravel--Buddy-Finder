<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    $data = [
        
    ];
    return view('home');
});

Route::get('/user/register', 'UserController@register');
Route::post('/user/register', 'UserController@handleRegister');

Route::get('/user/login', 'UserController@login');
Route::post('/user/login', 'UserController@handleLogin');

Route::get('/home', 'UserController@buddyFinder');

Route::get('/user/profile', 'UserController@profileInfo');
Route::get('user/profile/{id}', 'UserController@getUserById');

Route::get('/user/edit', 'UserController@profileEdit');
Route::post('/user/edit', 'UserController@handleProfileEdit');

Route::get('/user/logout', 'UserController@logout');


//Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');