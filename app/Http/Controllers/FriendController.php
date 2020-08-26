<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Friendship;
use Image;

class FriendController extends Controller
{
    public function sendFriendRequest(Request $request){

        $user = auth()->user();

        $friendid = $request->input('friendId');

        $request = new Friendship();
        $request->friend1 = $user->id;
        $request->friend2 = $friendid;
        $request->accepted = false;
        $request->save();

    }

    public function acceptRequest(Request $request){
        $user = auth()->user();
        $request = Friendship::find($request->input('friendshiprequest'));
        $request->accepted = true;

        $request->save();
    }

    public function friendRequests(){

        $user = auth()->user();

        $requests = Friendship::select('users.name', 'users.bio', 'friendships.id')
            ->join('users', 'users.id', '=', 'friendships.friend1')
            ->where(['accepted'=> false, 'friend2'=>$user->id])->get();
        
        return view("/user/friendRequests", ["requests"=>$requests]);
    }

    public function getFriends(){
        $user = auth()->user();
        $user_id = $user->id;
        $requests = DB::table('friendships as fs')
            ->select('f1.name as friend1',
                     'f1.avatar as f1image',
                     'f1.id as f1id', 
                     'f1.course as f1course', 

                     'f2.name as friend2', 
                     'f2.avatar as f1image',
                     'f2.id as f2id', 
                     'f2.course as f2course', 
                     'fs.accepted')
            ->leftJoin('users as f1', 'f1.id', '=', 'fs.friend1')
            ->join('users as f2', 'f2.id', '=', 'fs.friend2')
            ->where('accepted', '=', 1, 'AND', ['f1.id', '=', $user_id, 'OR', 'f2.id', '=', $user_id])
            ->get();

        return view("/user/friendList", ["user"=>$user, 'friends'=>$requests]);

    }
}