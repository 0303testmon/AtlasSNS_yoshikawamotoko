<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;

class Follow extends Model
{

    // リレーションの定義
// public function follows(){
//   return $this->hasMany('App/Follow');
// }

// フォロー数
public function follows(){
return $this->belongsToMany(User::class,'follows','following_id','followed_id');
}
// フォロワー数
public function followers(){
    return $this->belongsToMany(User::class,'follows','followed_id','following_id');
}

}
