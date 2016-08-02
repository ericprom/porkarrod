<?php

namespace App\Http\Controllers\Car;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Cars;
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
    $car = Cars::select('id')->where('id','=',$id)->first();
    if($car){
      return view('car.detail',array('id'=>$id));
    }
    else{
       return view('errors.404');
    }
  }
  public function showroom($showroom){
    $owner = User::select('id','username')->where('username','=',$showroom)->first();
    if($owner){
      return view('car.showroom',array('showroom'=>$owner));
    }
    else{
       return view('errors.404');
    }
  }
}
