<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function otherprofile($id){

        //特定のユーザをDBから抽出
        $user = User::findOrFail($id);
        //ユーザ情報をビューに渡す
        return view('users.otherprofile', compact('user'));
    }
    //検索機能
    public function search(Request $request)
    {
        // 1つ目の処理
        $keyword = $request->input('keyword');
        // 2つ目の処理
        if(!empty($keyword)){
            //Userモデル（usersテーブル）からレコード情報を取得
            $users = User::where('username','like', '%'.$keyword.'%')->get();
        }else{
            $users = User::all();
        }
        // 3つ目の処理
        return view('users.search',['users'=>$users, 'keyword'=>$keyword]);
    }

    //プロフィール編集機能
    public function updateProfile(Request $request){


             //バリデーション
        $request->validate([
            'username' => 'required | between:2,12',
            'mail' => 'required | between:5,40 | unique:users',
            'password' => 'required | alpha_dash | between:8,20 | confirmed' ,
            'bio' => 'between:0,150',
            'file' => 'file|mimes:jpg,jpeg,png',
        ]);

    $id = $request->input('id');
    $username = $request->input('username');
    $mail = $request->input('mail');
    $password = $request->input('password');
    $bio = $request->input('bio');


    User::where('id', $id)->update([
        'username' => $username,
        'mail' => $mail,
        'password' => $password,
        // 'password' => Hash::make($request->password),//ハッシュ化
        'bio' => $bio,
    ]);

    return redirect('/top');
}
}
