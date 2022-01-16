<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Tamcontroller extends Controller
{
    public function login(){
      \Session::put('user_permission',1);
      \Session::put('user_department',6);  
      \Session::put('user_ten','Tạm');
      return redirect('set_admin');
    }
}
