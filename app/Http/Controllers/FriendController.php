<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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

        
        $requests = Friendship::select('users.name', 'users.bio', 'friendships.id')
            ->join('users', 'users.id', '=', 'friendships.friend1')
            ->join('users', 'users.id', '=', 'friendships.friend2')
            ->where(function ($q){
                $q->where('friend1', $user_id)
                    ->where('accepted', 1);
            })->orWhere(function ($q) {
                $q->where('friend2', $user_id)
                    ->where('accepted', 1);
            })
            ->get();
        dd($requests);
        /*$user_id = \Auth::user()->id;    
        $friends = Friendship::all()->where(function ($q){
            q->where('friend1' => $user_id)
                ->where('accepted' => 1)
        })->orWhere(function ($q) {
            q->where('friend2' => $user_id)
                ->where('accepted' => 1)
        })
        
        $friend_count = count($friends)
        if($friend_count <= 0){
            echo "Sorry you got no friends";
            die;
        }
        
        return view("buddies")*/

        return view("/user/friends", ["user"=>$user]);

    }
}