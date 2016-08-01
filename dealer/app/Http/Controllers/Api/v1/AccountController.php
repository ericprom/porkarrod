<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use Response;
use Auth;

class AccountController extends Controller
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
  public function profile(){
    $param = $this->getParams();
    $result = array("status" => FALSE, "data" => "");
    try {
      $options = array();
      if (is_array($param["filter"])){
        $options = $param["filter"];
        $section = isset($options['section'])? $options['section'] : '';
        switch($section){
          case "profile":
            $result['data'] = $this->get_profile($options);
            break;
          case "update":
            $result['data'] = $this->update_profile($options);
            break;
        }
        $result["status"] = TRUE;
      }
    } catch(Exceptions $ex) {
      $result['error'] = $ex;
    }
    return Response::json($result);
  }
  public static function get_profile($options = array()){
    return User::find(Auth::id());
  }
  public static function update_profile($options = array()){
    if (gettype($options["data"]) == "string") {
      $data = json_decode($options["data"], TRUE);
    } else {
      $data = json_encode($options["data"]);
      $data = json_decode($data, TRUE);
    }
    $user = Auth::user();
    $user->name = $data['name'];
    $user->save();
    return $user;
  }
  public function partners(){
    $param = $this->getParams();
    $result = array("status" => FALSE, "data" => "");
    try {
      $options = array();
      if (is_array($param["filter"])){
        $options = $param["filter"];
        $section = isset($options['section'])? $options['section'] : '';
        switch($section){
          case "partners":
          case "partner":
            $result['data'] = $this->get_all_partner($options);
            break;
          case "friend_request":
            $result['data'] = $this->friend_request($options);
            break;
          case "pending":
            $result['data'] = $this->pending_request($options); 
            break;
          case "response":
            $result['data'] = $this->request_response($options);
            break;
          case "unfriend":
            $result['data'] = $this->unfriend($options);
            break;
          case "cancel_request":
            $result['data'] = $this->cancel_request($options);
            break;
        }
        $result["status"] = TRUE;
      }
    } catch(Exceptions $ex) {
      $result['error'] = $ex;
    }
    return Response::json($result);
  }
  public static function get_all_partner($options = array()){
    $user = Auth::user();
    $section = isset($options['section'])? $options['section'] : '';
    switch($section){
      case "partners":
        return $user->getFriends();
        break;
      case "partner":
        return $user->getFriends($perPage = 6);
        break;
    }
    $all_friends = $user->getFriends();
    return $all_friends;
  }
  public static function friend_request($options = array()){
    $user = Auth::user();
    $section = isset($options['section'])? $options['section'] : '';
    $result = array("status" => FALSE, "data" => "");
    if (gettype($options["data"]) == "string") {
      $data = json_decode($options["data"], TRUE);

    } else {
      $data = json_encode($options["data"]);
      $data = json_decode($data, TRUE);
    }
    $friend = User::where('email',$data["email"])->first();
    if($friend){
      if($user->isFriendWith($friend)){
        $result = Array();
        $result['message'] = 'This person is your partner.';
        $result['found'] = TRUE; 
        return $result;
      }
      else{
        if($friend->hasFriendRequestFrom($user)){
          $result = Array();
          $result['message'] = 'Your request is pending.';
          $result['found'] = TRUE; 
          return $result;
        }
        else{
          $result = Array();
          if($data["email"]!==$user->email){
            $success = $user->befriend($friend);
            $result['message'] = $friend;
            $result['found'] = TRUE; 
          }
          else{
            $result['message'] = 'You cannot add yourself as a partner.';
            $result['found'] = FALSE; 
          }
          return $result;
        }
      }
    }
    else{
      $result = Array();
      $result['message'] = 'Email not found.';
      $result['found'] = FALSE; 
      return $result;
    }
  }
  public static function pending_request($options = array()){
    $user = Auth::user();
    $friend = Array();
    $pendingList = $user->getPendingFriendships();
    foreach($pendingList as $key => $value){
      if($user->id==$value["recipient_id"]){
        $friend[$key]['user'] = User::where('id',$value["sender_id"])->first();
        $friend[$key]['status'] = 'request';
      }
      if($user->id==$value["sender_id"]){
        $friend[$key]['user'] = User::where('id',$value["recipient_id"])->first();
        $friend[$key]['status'] = 'pending';
      }
    }
    return $friend;
  }
  public static function request_response($options = array()){
    $user = Auth::user();
    $action = isset($options['action'])? $options['action'] : '';
    if (gettype($options["data"]) == "string") {
      $data = json_decode($options["data"], TRUE);
    } else {
      $data = json_encode($options["data"]);
      $data = json_decode($data, TRUE);
    }
    $friend = User::where('id',$data["id"])->first();
    switch($action){
      case "accept":
        if($user->hasFriendRequestFrom($friend)){
          return $user->acceptFriendRequest($friend);
        }
        break;
      case "deny":
        if($user->hasFriendRequestFrom($friend)){
          return $user->denyFriendRequest($friend);
        }
        break;
    }
  }
  public static function unfriend($options = array()){
    $user = Auth::user();
    $action = isset($options['action'])? $options['action'] : '';
    if (gettype($options["data"]) == "string") {
      $data = json_decode($options["data"], TRUE);
    } else {
      $data = json_encode($options["data"]);
      $data = json_decode($data, TRUE);
    }
    $friend = User::where('id',$data["id"])->first();
    switch($action){
      case "yes":
        if($user->isFriendWith($friend)){
          return $user->unfriend($friend);
        }
        break;
    }
  }
  public static function cancel_request($options = array()){
    $user = Auth::user();
    $action = isset($options['action'])? $options['action'] : '';
    if (gettype($options["data"]) == "string") {
      $data = json_decode($options["data"], TRUE);
    } else {
      $data = json_encode($options["data"]);
      $data = json_decode($data, TRUE);
    }
    $friend = User::where('id',$data["id"])->first();
    switch($action){
      case "yes":
        if($friend->hasFriendRequestFrom($user)){
          return $user->unfriend($friend);
        }
        break;
    }
  }
}
