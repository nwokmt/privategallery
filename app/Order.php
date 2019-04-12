<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = array('id');
    protected $primaryKey = "id";

    public static $rules =array(
        'address' => 'required',
        'name' => 'required',
        'payment' => 'required',
    );
    public function details()
    {
        return $this->hasMany('App\Orderdetail');
    }

    public function items()
    {
        return $this->belongsToMany('App\Item');
    }
}

