<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //配列内の要素を書き込み可能にする
    protected $fillable = ['condo_id','user_id','from_user_id'];
    
    public function condo()
    {
        return $this->belongsTo(Condo::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function is_posted_by_auth_user()
    {
        $id = Auth::id();
    }
}
