<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;

class Follow extends Model
{

    //引数を変えますよ宣言
    protected $fillable =[
        'following_id',
        'followed_id'
    ];
    // リレーションの定義
    //「１対多」の「多」側 → メソッド名は複数形でhasManyを使う
public function users(){
  return $this->hasMany('App\User');
}

//使ってないかも
// // フォロー数
// public function followings(){
// return $this->belongsToMany('App\Follow','follows','followed_id','following_id');
// }
// // フォロワー数
// public function followers(){
//     return $this->belongsToMany('App\Follow','follows','followed_id','following_id');
// }

//フォローする
public function follow(User $data){
    $this->followings()->attach($data->id);
}

//フォロー削除する
public function unfollow(User $data){
    $this->followings()->detach($data->id);
}

//フォロー数フォロワー数表示
public function getFollowCount($user_id){
    return $this->where('following_id', $user_id)->count();
}
public function getFollowerCount($user_id){
    return $this->where('followed_id', $user_id)->count();
}

}
