<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }


//ユーザーをDBから取得
public function show(User $user){
    $login_user = auth()->user();

    return view('users,show',[
        'user' => $user,
        'is_following' => $is_following,
        'is_followed' => $is_followed,
        'follow_count' => $follow_count,
        'follower_count' => $follower_count
    ]);
}

//フォローの人数取得
public function follows(){
    return $this->belongsToMany(User::class,'follows','following_id','followed_id');
}

//フォロワーの人数取得
public function followers(){
    return $this->belongsToMany(User::class,'followers','followed_id','following_id');
}

//フォローする・解除するボタン設置
public function following(Request $request){
    return back();
}

}
