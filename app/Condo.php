<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Condo extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
      'condo' => 'required',
      'price' => 'required',
      'place' => 'required',
      'area' => 'required',
      'plan' => 'required',
      'old' => 'required'
    );
    
    public function likes()
  {
    return $this->hasMany(Like::class, 'condo_id');
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
  
  public function posts()
  {
    return $this->hasMany(Post::class, 'condo_id');
  }
  
} 
