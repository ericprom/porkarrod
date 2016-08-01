<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use Auth;
use Image;
use File;
class AccountController extends Controller
{
  public function dashboard(){
    return view('account.dashboard',array());
  }
  public function profile(){
    return view('account.profile',array('public_key'=>Auth::id()));
  }
  public function partner(){
    return view('account.partner',array());
  }
  public function shop(){
    return view('account.shop',array());
  }
}
