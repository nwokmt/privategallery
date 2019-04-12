<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    protected $guarded = array('id');

    public static $rules =array(
        'order_id' => 'required',
        'item_id' => 'required',
    );

    public function items()
    {
        return $this->hasOne('App\Item');
    }
}

