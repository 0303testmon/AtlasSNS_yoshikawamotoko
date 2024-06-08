<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Post;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


        //リレーション定義を追加
    //「１対多」の「1」側 → メソッド名は単数形でbelongsToを使う
    public function follow(){
        return $this->belongsTo('App\Follow');
    }


    //フォローしてるかどうか
    public function isFollowing(Int $user_id){

        return (boolean) $this->follows()->where('followed_id',$user_id)->first(['follows.id']);
    }

    ///フォローされてるかどうか
    public function isFollowed(Int $user_id){

        return (boolean) $this->followers()->where('following_id',$user_id)->first(['follows.id']);
    }

    //フォローボタン設置・解除
    public function follows(){
        return $this->belongsToMany('App\User', 'follows', 'following_id', 'followed_id');
    }

    public function follower(){
        return $this->belongsToMany('App\User', 'follows', 'followed_id', 'following_id');
    }

    // リレーションの定義
    //「１対多」の「多」側 → メソッド名は複数形でhasManyを使う
    public function posts(){
    return $this->hasMany('App\Post');
    }
}
