<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use File;
use Input;
use Validator;
use Response;
use Image;
class DropzoneController extends Controller
{
    public function selectAvatar()
    {
      $publicKey = sha1('avatar-'.Input::get('public_key'));
      $userFolder = sha1('avatar-'.Auth::id());
      if($publicKey==$userFolder){
        $destinationPath = getcwd()."/uploads/avatars/".$userFolder;
        $file = File::files($destinationPath)[0];
        $avatar = array();
        $avatar['name'] = File::name($file);
        $avatar['extension'] = File::extension($file);
        $avatar['type'] = File::type($file);
        $avatar['size'] = File::size($file);
        $avatar['path'] = env('APP_URL')."/uploads/avatars/".$userFolder."/".File::name($file).".".File::extension($file);
        return Response::json([
          'error' => false,
          'avatar' => $avatar
        ], 200);
      } else {
        return Response::json([
          'error' => true,
          'code'  => 400
        ], 400);
      }
    }
    public function uploadAvatar() 
    {
      $input = Input::all();
      $rules = array(
          'file' => 'image|max:3000',
      );
      $validation = Validator::make($input, $rules);
      if ($validation->fails()) {
          return Response::make($validation->errors->first(), 400);
      }
      $filename = Input::file('file')->getClientOriginalName();
      $extension = Input::file('file')->getClientOriginalExtension();
      $fileName = sha1('avatar-'.Auth::id().'-'.$filename).".".$extension;
      $userFolder = sha1('avatar-'.Auth::id());
      $destinationPath = getcwd()."/uploads/avatars/".$userFolder;
      $clean = File::cleanDirectory($destinationPath);
      $success = Input::file('file')->move($destinationPath, $fileName);
      if ($success) {
        $path = env('APP_URL')."/uploads/avatars/".$userFolder."/".$fileName;
        $user = Auth::user();
        $user->avatar = $path;
        $user->save();
        return Response::json([
          'path' => $path,
          'error' => false,
          'code'  => 200
        ], 200);
      } else {
        return Response::json([
          'error' => true,
          'code'  => 400
        ], 400);
      }

    }
    public function uploadFiles() 
    {
      $source = Input::get('source');
      $carID = Input::get('car');
      $publicKey = Input::get('public_key');
      $input = Input::all();
      $rules = array(
          'file' => 'image|max:3000',
      );
      $validation = Validator::make($input, $rules);
      if ($validation->fails()) {
          return Response::make($validation->errors->first(), 400);
      }
      $tentFolder = sha1('tent-'.Auth::id());

      switch ($source) {
        case 'editing':
          $destinationPath = getcwd()."/uploads/cars/".$tentFolder."/".$carID;
          break;
        case 'listing':
          $destinationPath = getcwd()."/uploads/tmp/".$tentFolder;
          break;
      }
      $filename = Input::file('file')->getClientOriginalName();
      $extension = Input::file('file')->getClientOriginalExtension();
      $fileName = sha1('tent-'.Auth::id().'-car-'.$filename).".".$extension;
      if($publicKey==$tentFolder){
        $upload_success = Input::file('file')->move($destinationPath, $fileName);
        if ($upload_success) {
          return Response::json([
            'error' => false,
            'code'  => 200
          ], 200);
        } else {
          return Response::json([
            'error' => true,
            'code'  => 400
          ], 400);
        }
      }
      else{
        return Response::json([
          'error' => true,
          'code'  => 400
        ], 400);
      }

    }
    public function selectFiles()
    {
      $carID = Input::get('car');
      $publicKey = Input::get('public_key');
      $tentFolder = sha1('tent-'.Auth::id());
      $destinationPath = getcwd()."/uploads/cars/".$tentFolder."/".$carID;
      $imageList = array();
      if($publicKey==$tentFolder){
        $files = File::files($destinationPath);
        foreach ($files as $key => $file) {
            $imageList[$key]['name'] = File::name($file);
            $imageList[$key]['extension'] = File::extension($file);
            $imageList[$key]['type'] = File::type($file);
            $imageList[$key]['size'] = File::size($file);
            $imageList[$key]['path'] = "http://porkarrod.com/uploads/cars/".$tentFolder."/".$carID."/".File::name($file).".".File::extension($file);
        }
        return Response::json([
          'error' => false,
          'data' => $imageList
        ], 200);
      }
      else{
        return Response::json([
          'error' => true,
          'data' => $imageList
        ], 400);
      }
    }
    public function deleteImage()
    {
      $source = Input::get('source');
      $carID = Input::get('car');
      $tentFolder = sha1('tent-'.Auth::id());
      $filename = Input::get('filename');
      $extension = Input::get('extension');
      $publicKey = Input::get('public_key');
      switch ($source) {
        case 'server_image':
          $destinationPath = getcwd()."/uploads/cars/".$tentFolder."/".$carID."/".$filename;
          break;
        case 'server_preview':
          $fileName = sha1('tent-'.Auth::id().'-car-'.$filename).".".$extension;
          $destinationPath = getcwd()."/uploads/cars/".$tentFolder."/".$carID."/".$fileName;
          break;
        case 'local_preview':
          $fileName = sha1('tent-'.Auth::id().'-car-'.$filename).".".$extension;
          $destinationPath = getcwd()."/uploads/tmp/".$tentFolder.'/'.$fileName;
          break;
      }
      if (File::exists($destinationPath) && $publicKey==$tentFolder)
      {
          $delete_success = File::delete($destinationPath);
          if($delete_success){
            return Response::json([
                'error' => false,
                'code'  => 200
            ], 200);
          }
          else{
            return Response::json([
                'error' => true,
                'code'  => 400
            ], 400);
          }
      }else{
        return Response::json([
            'error' => true,
            'code'  => 400
        ], 400);
      }
    }
}
