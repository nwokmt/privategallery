<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signup extends Model
{
    protected $guarded = array('id');
    //
    public static $rules = array(
        'user' => 'required',
        'mail' => 'required',
    );
}
