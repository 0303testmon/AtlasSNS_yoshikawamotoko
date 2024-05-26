<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use Auth;

class FollowsController extends Controller
{
    //
    public function followList(){

        $following_id = Auth::user()->pluck('followed_id');
        $posts = Post::with('user')->whereIn('user_id', $following_id)->latest()->get();
        return view('follows.followList', ['follows' => $follows,'posts' => $posts]);
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
public function unfollow($userId){

    //フォローしているか
    $follower = auth() -> user();
    $is_following = $follower -> isFollowing($userId);

    //フォローしていれば下記のフォロー解除を実行する
    if ($is_following){

        $loggedInUserId = auth()->user()->id;
        Follow::where([
            ['followed_id', '=', $userId],
            ['following_id', '=', $loggedInUserId]
        ])
            ->delete();
    }
    return redirect('/search');
}

public function follow($userId){

    //フォローしているか
    $follower = auth() -> user();
    $is_following = $follower -> isFollowing($userId);

    //フォローしていなけば下記のフォローを実行する
    if (!$is_following){
        //自身のユーザID取得
        $loggedInUserId = auth()->user()->id;
        //フォローしたい人のユーザIDをもとにユーザ取得
        $followedUser = User::find($userId);
        $followedUserId = $followedUser -> id;

        //フォローデータをDBに登録
        Follow::create([
            'following_id' => $loggedInUserId,
            'followed_id' => $followedUserId,
        ]);
        //フォロー後もとのページにリダイレクト
        return redirect('/search');
    }
}



}
