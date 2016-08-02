<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
  	public function car()
  	{
    	return $this->belongsTo('App\Models\Cars')->with('brand','model');
  	}
}
