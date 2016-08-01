<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
  public function models()
  {
      return $this->hasMany('App\Models\Models', 'brand_id')->select(array('id', 'title'));
  }
}
