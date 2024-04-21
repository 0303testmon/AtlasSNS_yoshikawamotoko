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
    public function search(){

        $users = User::get(); //Userモデル（usersテーブル）からレコード情報を取得
        return view('users.search',['users'=>$users]);
    }

    //プロフィール編集機能
    public function updateProfile(Request $request){

    $id = $request->input('id');
    $username = $request->input('username');
    $mail = $request->input('mail');
    $password = $request->input('password');
    $bio = $request->input('bio');

    User::where('id', $id)->update([
        'username' => $username,
        'mail' => $mail,
        'password' => Hash::make($request->password),//ハッシュ化
        'bio' => $bio,
    ]);

    return redirect('/top');
}
}
