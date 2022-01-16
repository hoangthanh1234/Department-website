<?php

namespace App\Http\Controllers\Admin\Giangvien;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cauhoi;
use Session;

class TrangchuController extends Controller
{
    public function index(){

    	return view('Admin.Trangchu');
    }
}
