<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(){
        return view('user/register');
    }

    public function handleRegister(Request $request){
        $user = new \App\User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->moviegenre = $request->input('moviegenre');
        $user->musicgenre = $request->input('musicgenre');
        $user->sport = $request->input('sport');
        $user->hobby = $request->input('hobby');
        $user->course = $request->input('course');
        $user->password = \Hash::make($request->input('password'));
        $user->save();
        dd($user);
       // return view('user/register');
    }

    public function login(){
        return view('user/login');
    }

    public function handleLogin(Request $request){
        $credentials = $request->only(['email','password']);
        if( \Auth::attempt($credentials)){
            
        }
        
        return view('user/login');
    }

}
