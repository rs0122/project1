<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
} 
