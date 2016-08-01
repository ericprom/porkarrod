<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
  public function brand()
  {
    return $this->belongsTo('App\Models\Brands');
  }
  public function model()
  {
    return $this->belongsTo('App\Models\Models');
  }
}
