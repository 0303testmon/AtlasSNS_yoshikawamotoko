<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;

class Follow extends Model
{

    // リレーションの定義
    //「１対多」の「多」側 → メソッド名は複数形でhasManyを使う
public function users(){
  return $this->hasMany('App/User');
}

// フォロー数
public function follows(){
return $this->belongsToMany(User::class,'follows','following_id','followed_id');
}
// フォロワー数
public function followers(){
    return $this->belongsToMany(User::class,'follows','followed_id','following_id');
}

}
