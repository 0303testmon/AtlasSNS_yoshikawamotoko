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
}
