<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
  protected $fillable = ['condo_id','user_id'];

  public function condo()
  {
    return $this->belongsTo(Condo::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
