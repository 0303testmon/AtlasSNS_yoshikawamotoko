<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function otherprofile($id){

        //特定のユーザをDBから抽出
        $user = User::findOrFail($id);
        $posts = Post::where('user_id', $id)->orderBy('updated_at', 'desc')->get();
        // dd($posts);
        //ユーザ情報をビューに渡す
        return view('users.otherprofile', compact('user','posts'));
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
        $user = User::find($request->id);

             //バリデーション
            $request->validate([
                'username' => 'required | between:2,12',
                'mail' => 'required | between:5,40 | unique:users,mail,'.$user->mail.',mail',
                'password' => 'required | alpha_dash | between:8,20 | confirmed',
                'bio' => 'between:0,150',
                // 'file' => 'file|mimes:jpg,jpeg,png',
            ]);

            $id = $request->input('id');
            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');
            $bio = $request->input('bio');
            // $image = $request->input('images');
            //if文で画像があるかないか→更新なかったら今の画像のまま保存→あったらファイルの名前を変えて保存ファイルの保存先を指定して保存
            if(array_key_exists('images', $request->all())){
            $request->file('images')->storeas('images',$id.".jpg", "public");
            $image = $id.".jpg";
        }else{
            $image = "icon1.png";
        }
            // dd($image);

            User::where('id', $id)->update([
                'username' => $username,
                'mail' => $mail,
                'password' => bcrypt($password),
                // 'password' => Hash::make($request->password),//ハッシュ化
                'bio' => $bio,
                'images' => $image,

            ]);

            return redirect('/top');
        }
}
