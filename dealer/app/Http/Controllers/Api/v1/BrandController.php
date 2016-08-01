<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Models;
use Response;
class BrandController extends Controller
{
  public static function getParams(){
    $param = array("filter"=>FALSE);
    foreach ($param as $key => $val) {
      if (isset($_REQUEST[$key])) {
        $param[$key] = $_REQUEST[$key];
      }
    }
    return $param;
  }
  public function brands(){
    $param = $this->getParams();
    $result = array("status" => FALSE, "data" => "");
    try {
      $options = array();
      if (is_array($param["filter"])){
        $options = $param["filter"];
        $result['data'] = $this->brand_list($options);
        $result["status"] = TRUE;
      }
    } catch(Exceptions $ex) {
      $result['error'] = $ex;
    }
    return Response::json($result);
  }
  public static function brand_list($options = array()){
    $section = isset($options['section'])? $options['section'] : '';
    $id = isset($options['id'])? $options['id'] : '';
    switch($section){
      case "brands":
        return Brands::all(array('id', 'title'));
        break;
      case "models":
        return Brands::find($id, array('id', 'title'))->models;
        break;
    }
  }
}
