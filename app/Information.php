<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\InfoLike;
use Illuminate\Support\Facades\Auth;

class Information extends Model
{
    //
    protected $guarded = array('id');
    
    public static $rules = array(
        'title' => 'required',
        'body' => 'required',
    );
    
    public function histories()
    {
        return $this->hasMany('App\History');
    }
    
    public function likes()
  {
    return $this->hasMany(InfoLike::class, 'information_id');
  }
  
    public function is_liked_by_auth_user()
    {
        $id = Auth::id();
    
        $likers = array();
        foreach($this->likes as $like) {
          array_push($likers, $like->user_id);
        }
    
        if (in_array($id, $likers)) {
          return true;
        } else {
          return false;
        }
    }
  
}
