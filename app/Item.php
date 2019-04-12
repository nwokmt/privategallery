<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = array('id');
    protected $primaryKey = "id";

    public static $rules =array(
        'name' => 'required',
        'price' => 'required',
    );

    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }
}

