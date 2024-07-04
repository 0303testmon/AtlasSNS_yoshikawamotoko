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
        $user_id=Auth::user()->id;
        //フォローしているIDを取得
        $following_id = Auth::user()->follows()->pluck('followed_id');
        //自分と他の人を合体
        $users = $following_id->push($user_id);
        //userテーブルのuser_idとフォローしているユーザIDが一致している投稿を取得
        $posts = Post::whereIn('user_id', $users)->orderBy('updated_at', 'desc')->get();
        //bladeへ返す際にデータを送る
        return view('posts.index',['list'=>$posts]);
    }
    // public function index(){
    //     $user_id=Auth::user()->id;
    //     //自分の投稿のみ取得
    //     $list=Post::where('user_id', $user_id)->get();
    //     //bladeへ返す際にデータを送る
    //     return view('posts.index',['list'=>$list]);
    // }


    //投稿の登録処理
    public function postCreate(Request $request){


             //バリデーション
        $request->validate([
            'newPost' => 'required | between:1,150'
        ]);

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

    //投稿の編集処理
    public function postUpdate(Request $request){
        //投稿フォームに書かれた情報を取得
        $id = $request->input('id');
        $up_post = $request->input('upPost');

        Post::where('id',$id)->update(['post'=>$up_post]);

        return redirect('/top');
    }

        //投稿の削除処理
        //URLで{id}のように指定しているときはrequest使わなくていい
    public function postDelete($id){
        //投稿フォームに書かれた情報を取得
        Post::where('id',$id)->delete();

        return redirect('/top');
    }
}
