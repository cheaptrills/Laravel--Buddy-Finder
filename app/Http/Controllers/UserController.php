<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Image;

class UserController extends Controller
{
    public function register(){
        if(\Auth::check()){   
            return view('/home');
        }
        return view('user/register');
    }

    public function handleRegister(Request $request){

        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'

        ]);

        $user = new \App\User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->bio = $request->input('bio');
        $user->moviegenre = $request->input('moviegenre');
        $user->musicgenre = $request->input('musicgenre');
        $user->sport = $request->input('sport');
        $user->hobby = $request->input('hobby');
        $user->course = $request->input('course');
        $user->buddy = $request->input('buddy');
        $user->password = \Hash::make($request->input('password'));
        $user->save();
        return view('/home');
    }

    public function login(){
        if(\Auth::check()){   
            return view('/home');
        }
        return view('user/login');
    }

    public function handleLogin(Request $request){
        if(\Auth::check()){   
            return view('/home');
        }

        $validation = $request->validate([
            'email' => 'required',
            'password' => 'required'

        ]);

        $credentials = $request->only(['email','password']);
            if( \Auth::attempt($credentials)){
                return redirect('/home'); 
            }
            return view('/user/login');
    }

    public function logout(Request $request) {
        \Auth::logout();
        return redirect('/user/login');
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
            return view("/home", ["result"=>$result,"user"=>$user]);
    
        }
        
    }

    public function profileInfo(Request $request){

        $user = auth()->user();
        return view("/user/profile", ["user"=>$user]);

    } 

    public function profileEdit(Request $request){
        
        if(\Auth::check()){  
            $user = auth()->user(); 
            return view("/user/edit", ["user"=>$user]);
        }
        return view('/');
    }

    public function handleProfileEdit(Request $request){

        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'

        ]);
        
        $user = auth()->user();
        if (\Hash::check($request->input('password'), $user->password)) {

            $user->name = $request->input('name');
            if($request->hasFile('avatar')){
                $avatar = $request->file('avatar');
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
                $user->avatar = $filename;
            }
            $user->email = $request->input('email');
            $user->bio = $request->input('bio');
            $user->moviegenre = $request->input('moviegenre');
            $user->musicgenre = $request->input('musicgenre');
            $user->sport = $request->input('sport');
            $user->hobby = $request->input('hobby');
            $user->course = $request->input('course');
            $user->buddy = $request->input('buddy');

            if($request->input('password2') === $request->input('password3')){
                if(!empty($request->input('password2'))){
                    $user->password = \Hash::make($request->input('password2'));
                }
            }   
            $user->save();
        }  
        

        return view('/user/edit', array('user' => \Auth::user()) );    
    }

    public function getUserById($id){

        $user = \App\User::find($id);
        return view("/user/profile", ["user"=>$user]);

    }

  /*  public function showBuddies() {
        $user_id = \Auth::user()->id;    
        $friends = \App\Friend::all()=>where(function ($q){
            q->where('f1' => $user_id)
                ->where('accepted' => 1)
        })->orWhere(function ($q) {
            q->where('f2' => $user_id)
                ->where('accepted' => 1)
        }
        
        $friend_count = count($friends)
        if($friend_count <= 0){
            echo "Sorry you got no friends";
            die;
        }
        
        return view("/user/friends")
    } */
}
