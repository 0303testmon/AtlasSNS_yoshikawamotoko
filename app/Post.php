<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //投稿処理
    protected $fillable =[
        'user_id',
        'post'
    ];
}
