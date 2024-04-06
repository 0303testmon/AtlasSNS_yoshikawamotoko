<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;

class PostsController extends Controller
{
    //Postレコードから情報を取得
    public function index(){
        $list=Post::get();
        //bladeへ返す際にデータを送る
        return view('posts.index',['list'=>$list]);
    }


    //投稿の登録処理
    public function postCreate(Request $request){
        //投稿フォームに書かれた情報を取得
        $post=$request->input('newPost');
        $user_id=Auth::user()->id;
        //Postsテーブルの user_id post に変数を当てる
        Post::create([
            'user_id'=>$user_id,
            'post'=>$post
        ]);
        return redirect('/top');
    }
}
