<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHistory extends Model
{
    //
    protected $guarded = array('id');

    public static $rules = array(
        'user_id' => 'required',
        'logined_at' => 'required',
    );
}
