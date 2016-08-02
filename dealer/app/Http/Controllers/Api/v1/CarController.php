<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cars;
use App\Models\User;
use Response;
use Auth;
use File;
use DB;
class CarController extends Controller
{
  public static function getParams(){
    $param = array("filter"=>FALSE);
    foreach($param as $key => $val) {
      if (isset($_REQUEST[$key])) {
        $param[$key] = $_REQUEST[$key];
      }
    }
    return $param;
  }
  public function select(){
    $param = $this->getParams();
    $result = array("status" => FALSE, "data" => "");
    try {
      $options = array();
      if (is_array($param["filter"])){
        $options = $param["filter"];
        $result['data'] = $this->list_car($options);
        $result["status"] = TRUE;
      }
    } catch(Exceptions $ex) {
      $result['error'] = $ex;
    }
    return Response::json($result);
  }
  public static function list_car($options = array()){
    $userID =Auth::id();
    $section = isset($options['section'])? $options['section'] : '';
    $showroom = isset($options['showroom'])? $options['showroom'] : '';
    $skip = isset($options['skip'])? $options['skip'] : 0;
    $limit = isset($options['limit'])? $options['limit'] : 10;
    switch($section){
      case "total":
        $result = array();
        $result['income'] = Cars::where('owner','=',$userID)->where('active', '=', '1')->where('sold', '=', '1')->sum('cash');
        $result['sold'] = Cars::where('owner','=',$userID)->where('active', '=', '1')->where('sold', '=', '1')->count();
        $result['stock'] = Cars::where('owner','=',$userID)->where('active', '=', '1')->where('sold', '=', '0')->count();
        return $result;
        break;
      case "shop":
        $car =  Cars::where('owner','=',$userID)->
                where('active','=','1')->
                with('brand','model')->
                orderBy('bought_at', 'desc')->
                skip($skip)->
                take($limit)->
                get();
        $result = array();
        foreach ($car as $ck => $val) {
          $result['list'][$ck]['gallery'] = CarController::gallery_list($val->owner, $val->id);
          $result['list'][$ck]['car'] = $val;
        }
        $result['total'] = Cars::where('active', '=', '1')->where('owner','=',$userID)->count();
        return $result;
        break;
      case "display":
        $car =  Cars::select('id','title','price','brand_id','model_id','commission','bought_at','owner','sold')->
                where('active','=','1')->
                with('brand','model')->
                orderBy('bought_at', 'desc')->
                skip($skip)->
                take($limit)->
                get();
        $result = array();
        foreach ($car as $ck => $val) {
          $result['list'][$ck]['gallery'] = CarController::gallery_list($val->owner, $val->id);
          $result['list'][$ck]['car'] = $val;
        }
        $result['total'] = Cars::where('active', '=', '1')->count();
        return $result;
        break;

      case "showroom":
        $result = array();
        $car =  Cars::select('id','title','price','brand_id','model_id','commission','bought_at','owner','sold')->
                where('active','=','1')->
                where('sold','=','0')->
                where('owner','=',$showroom)->
                with('brand','model')->
                orderBy('bought_at', 'desc')->
                skip($skip)->
                take($limit)->
                get();
        foreach ($car as $ck => $val) {
          $result['list'][$ck]['gallery'] = CarController::gallery_list($val->owner, $val->id);
          $result['list'][$ck]['car'] = $val;
        }
        $result['total'] = Cars::where('active', '=', '1')->where('owner','=',$showroom)->count();
        return $result;
        break;
      case "recommend":
        $car =  Cars::select('id','title','price','brand_id','model_id','commission','bought_at','owner','sold')->
                where('active','=','1')->
                where('sold', '=', '0')->
                where('recommended','=','1')->
                with('brand','model')->
                orderBy('bought_at', 'desc')->
                get();
        $result = array();
        foreach ($car as $ck => $val) {
          $result['list'][$ck]['gallery'] = CarController::gallery_list($val->owner, $val->id);
          $result['list'][$ck]['car'] = $val;
        }
        $result['total'] = Cars::where('active', '=', '1')->count();
        return $result;
        break;
      case "sold":
        $car =  Cars::where('owner','=',$userID)->
                where('active','=','1')->
                where('sold', '=', '1')->
                with('brand','model')->
                orderBy('sold_at', 'desc')->
                skip($skip)->
                take($limit)->
                get();
        $result = array();
        $result['list'] = $car;
        $result['total'] = Cars::where('owner','=',$userID)->where('active', '=', '1')->where('sold', '=', '1')->count();
        return $result;
        break;
      case "detail":
        $id = isset($options['id'])? $options['id'] : '';
        $car =  Cars::select('id','title','detail','year','price','brand_id','model_id','sold','owner','bought_at')->
                where('id','=',$id)->
                where('active','=','1')->
                with('brand','model')->
                first();
        $result = array();
        $result['gallery'] = CarController::gallery_list($car->owner, $car->id);
        $result['car'] = $car;
        $result['owner'] = User::select('avatar','name','phone','line','email','username')->
                  where('id','=',$car->owner)->
                  first();
        return $result;
        break;
      case "edit":
        $id = isset($options['id'])? $options['id'] : '';
        $car =  Cars::where('owner','=',$userID)->where('id','=',$id)->first();
        return $car;
        break;
    }
  }
  public static function gallery_list($owner, $car){
    $onwerFolder = sha1('tent-'.$owner);
    $carFolder = getcwd()."/uploads/cars/".$onwerFolder."/".$car;
    $files = File::files($carFolder);
    $gallery = array();
    if(count($files)>0){
      foreach ($files as $gk => $file) {
        $poster = env('APP_URL')."/uploads/cars/".$onwerFolder."/".$car."/".File::name($file).".".File::extension($file);
        $gallery[] = $poster;
      }
    }
    else{
      $gallery[] = env('APP_URL')."/uploads/cars/default/default.png";
    }
    return $gallery;
  }
  public function import(){
    $param = $this->getParams();
    $result = array("status" => FALSE, "data" => "");
    try {
      $options = array();
      if (is_array($param["filter"])){
        $options = $param["filter"];
        $result['data'] = $this->import_car($options);
        $result["status"] = TRUE;
      }
    } catch(Exceptions $ex) {
      $result['error'] = $ex;
    }
    return Response::json($result);
  }
  public static function import_car($options = array()){
    $userID =Auth::id();
    $tentFolder = sha1('tent-'.Auth::id());
    $section = isset($options['section'])? $options['section'] : '';
    if (gettype($options["data"]) == "string") {
      $data = json_decode($options["data"], TRUE);

    } else {
      $data = json_encode($options["data"]);
      $data = json_decode($data, TRUE);
    }
    switch($section){
      case "car":
        $car = new Cars;
        $car->title = @$data["title"];
        $car->brand_id = @$data["brand"]["id"];
        $car->model_id = @$data["model"]["id"];
        $car->year = @$data["year"];
        $car->gear = @$data["gear"];
        $car->color = @$data["color"];
        $car->license = @$data["license"];
        $car->detail = @$data["detail"];
        $car->budget = @$data["budget"];
        $car->repair = @$data["repair"];
        $car->price = @$data["price"];
        $car->bought_at = @$data["bought_at"];
        $car->owner = $userID;
        $car->save();
        if($car){
          $sourceDir = getcwd()."/uploads/tmp/".$tentFolder;
          $destinationDir = getcwd()."/uploads/cars/".$tentFolder."/".$car->id;
          $success = File::copyDirectory($sourceDir, $destinationDir);
        }
        return $car;
        break;
      case "edit":
        $car =  Cars::where('owner','=',$userID)->where('id','=',@$data['id'])->first();
        $car->title = @$data["title"];
        $car->brand_id = @$data["brand"]["id"];
        $car->model_id = @$data["model"]["id"];
        $car->year = @$data["year"];
        $car->gear = @$data["gear"];
        $car->color = @$data["color"];
        $car->license = @$data["license"];
        $car->detail = @$data["detail"];
        $car->budget = @$data["budget"];
        $car->repair = @$data["repair"];
        $car->price = @$data["price"];
        $car->bought_at = @$data["bought_at"];
        $car->save();
        return $car;
        break;
    }
  }
  public function sale(){
    $param = $this->getParams();
    $result = array("status" => FALSE, "data" => "");
    try {
      $options = array();
      if (is_array($param["filter"])){
        $options = $param["filter"];
        $result['data'] = $this->sale_car($options);
        $result["status"] = TRUE;
      }
    } catch(Exceptions $ex) {
      $result['error'] = $ex;
    }
    return Response::json($result);
  }
  public static function sale_car($options = array()){
    $userID =Auth::id();
    $section = isset($options['section'])? $options['section'] : '';
    if (gettype($options["data"]) == "string") {
      $data = json_decode($options["data"], TRUE);

    } else {
      $data = json_encode($options["data"]);
      $data = json_decode($data, TRUE);
    }
    switch($section){
      case "sale":
        $id = isset($data['id'])? $data['id'] : '';
        $car =  Cars::where('owner','=',$userID)->where('id','=',$id)->first();
        $car->cash = @$data["cash"];
        $car->commission = @$data["commission"];
        $car->sold_at = @$data["sold_at"];
        $car->sold = 1;
        $car->save();
        return $car;
        break;
    }
  }

}
