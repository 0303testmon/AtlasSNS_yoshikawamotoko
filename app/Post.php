<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;

class Post extends Model
{
    //投稿処理
    protected $fillable =[
        'user_id',
        'post'
    ];

    //リレーション定義を追加
    //「１対多」の「1」側 → メソッド名は単数形でbelongsToを使う
    public function user(){
        return $this->belongsTo('App\User');
    }
}
