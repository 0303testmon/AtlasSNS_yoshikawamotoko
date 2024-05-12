<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;

class Follow extends Model
{

    // リレーションの定義
    //「１対多」の「多」側 → メソッド名は複数形でhasManyを使う
public function users(){
  return $this->hasMany('App\User');
}

// フォロー数
public function followings(){
return $this->belongsToMany('App\Follow','follows','followed_id','following_id');
}
// フォロワー数
public function followers(){
    return $this->belongsToMany('App\Follow','follows','followed_id','following_id');
}

//フォローする
public function follow(User $data){
    $this->followings()->attach($data->id);
}

//フォロー削除する
public function unfollow(User $data){
    $this->followings()->detach($data->id);
}

//フォローしているか判断する
public function inFollowing(User $data){
    return $this->Following()->where('following_id',$data->id)->exists();
}

}
