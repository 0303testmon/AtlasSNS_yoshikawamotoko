<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use Auth;
use App\Post;

class FollowsController extends Controller
{
    //
    public function followList(){
        //followsテーブルのレコードを取得
        $following_id = Auth::user()->follows()->pluck('following_id');
        //フォローしているユーザのID取得
        $following_users = User::whereIn('id', $following_id)->orderBy('updated_at', 'desc')->get();
        //userテーブルのuser_idとフォローしているユーザIDが一致している投稿を取得
        //  dd($following_id, $following_users);
        $posts = Post::whereIn('user_id', $following_id)->orderBy('updated_at', 'desc')->get();
        //フォローしているユーザーのIDをもとに投稿内容を取得
        // dd($posts);
        return view('follows.followList', compact('following_users', 'posts'));
    }

    public function followerList(){
        //followsテーブルのレコードを取得
        $followed_id = Auth::user()->follows()->pluck('followed_id');
        //フォローされてるユーザのID取得
        $followed_users = User::whereIn('id', $followed_id)->orderBy('updated_at', 'desc')->get();
        //userテーブルのuser_idとフォローしているユーザIDが一致している投稿を取得
        // dd($followed_id, $followed_users);
        $posts = Post::whereIn('user_id', $followed_id)->orderBy('updated_at', 'desc')->get();
        //フォローされているユーザーのIDをもとに投稿内容を取得
        // dd($posts);
        return view('follows.followerList', compact('followed_users', 'posts'));
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
