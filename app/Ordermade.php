<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordermade extends Model
{
    protected $guarded = array('id');

    public static $rules =array(
        'type' => 'required',
        'material' => 'required',
        'color' => 'required',
        'address' => 'required',
        'name' => 'required',
        'payment' => 'required',
    );
}

