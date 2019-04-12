<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = array('id');

    public static $rules =array(
        'name' => 'required',
        'introduction' => 'required',
    );

	public function users()
	{
		return $this->belongsTo('App\User');
	}
}

