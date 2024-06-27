<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class HomeUserController extends Controller
{

  public function __construct() {
    $this->middleware('auth');
  }
  public  function index(){
    $panding=Pengaduan::where('user_id',auth()->user()->id)->where('status','0')->count();
    $proses=Pengaduan::where('user_id',auth()->user()->id)->where('status','1')->count();
    $done=Pengaduan::where('user_id',auth()->user()->id)->where('status','2')->count();
    return view('User.home',compact('panding','done','proses'));

   }
}
