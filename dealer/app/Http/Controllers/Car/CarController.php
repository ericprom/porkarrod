<?php

namespace App\Http\Controllers\Car;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use File;
class CarController extends Controller
{
  public function listing(){
    $tentFolder = sha1('tent-'.Auth::id());
    $destinationPath = getcwd()."/uploads/tmp/".$tentFolder;
    $success = File::cleanDirectory($destinationPath);
    return view('car.listing',array('tent'=>$tentFolder));
  }
  public function editing($id=null){
    $tentFolder = sha1('tent-'.Auth::id());
    return view('car.editing',array('id'=>$id,'tent'=>$tentFolder));
  }
  public function detail($id=null){
    return view('car.detail',array('id'=>$id));
  }
  public function showroom($showroom){
    return view('car.showroom',array('showroom'=>$showroom));
  }
}
