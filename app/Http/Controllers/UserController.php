<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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
            return redirect('/home'); 
        }
    
        return view('user/login');
    }

    public function buddyFinder(Request $request){

        $result = [];
        $user = auth()->user();

        if(\Auth::check()){

            $users = \App\User::all("id","name","avatar","moviegenre","musicgenre","hobby","sport","course");
            
            foreach($users as $u){

                if($u->id == $user->id){
                    continue;
                }

                $count = 0;
                $count += (int)($u->moviegenre == $user->moviegenre );
                $count += (int)($u->musicgenre == $user->musicgenre );
                $count += (int)($u->hobby == $user->hobby );
                $count += (int)($u->sport == $user->sport );
                $count += (int)($u->course == $user->course );
                $percentage = ($count/5)*100;

                $tmp = (object)[
                   "id" => $u->id, 
                   "name" => $u->name, 
                   "avatar" => $u->avatar,
                   "percentage" => $percentage,
                   "course" => $u->course,
                ];

                array_push($result, $tmp);
            }
            //usort($result, fn($a, $b) => $a["precentage"] <=> $b["precentage"]);
            $sortedResults = Arr::sort($result, function($sort)
            {
                return -$sort->percentage;
            });        
        }
        
    }

}
