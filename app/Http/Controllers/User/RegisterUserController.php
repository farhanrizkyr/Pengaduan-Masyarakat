<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
class RegisterUserController extends Controller
{
   public function index()
   {
     return view('User.register');
   }

   public function post_register(Request $request){
    
    request()->validate([
     'name'=>'required',
     'username'=>'required|unique:users',
     'email'=>'required|unique:users',
     'password'=>'required|confirmed'
    ]);

    User::create([
     'name'=>request()->name,
     'username'=>request()->username,
     'email'=>request()->email,
     'password'=>Hash::make(request()->password),
    ]);
return redirect('/apps-user/login/')->with('pesan','User Account Berhasil Di Buat');
   }

 
}
