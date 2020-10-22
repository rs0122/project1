<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Information;
use App\User;

class InfoLike extends Model
{
    // 配列内の要素を書き込み可能にする
  protected $fillable = ['information_id','user_id'];

  public function info()
  {
    return $this->belongsTo(Information::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
