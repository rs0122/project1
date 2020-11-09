<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    
    public function join_likes_condos()
    {
        
       $condos = $this->hasManyThrough(
            'App\Condo', //リレーションして取りたいテーブル「condos」
            'App\Like', //経由するテーブル「likes」
            'user_id', //likesテーブルをusersテーブルと結ぶための外部キー
            'id', // condosテーブルの外部キー
            null, // usersテーブルのローカルキー
            'condo_id' //likesとcondosを結ぶために使うキー
        )->get();
       
       return $condos;
       
    }
    
    public function join_likes_posts()
    {
        
       $posts = $this->hasManyThrough(
            'App\Information', //リレーションして取りたいテーブル「info」
            'App\InfoLike', //経由するテーブル「infolikes」
            'user_id', //infolikesテーブルをusersテーブルと結ぶための外部キー
            'id', // infoテーブルの外部キー
            null, // usersテーブルのローカルキー
            'information_id' //infolikesとinfoを結ぶために使うキー
        )->get();
       
       return $posts;
       
    }
    
    public function userhistories()
    {
      return $this->hasMany('App\UserHistory');

    }
    
    public function condoFromAdmin()
    {
        return $this->hasManyThrough(
            'App\Condo',//繋げる先
            'App\Post',
            'user_id',
            'id',
            null,
            'condo_id'
            )->get();
    }
    
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    
}
