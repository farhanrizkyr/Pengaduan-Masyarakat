<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    public  function index(){
        return view('User.login');
    
       }


    public   function action(Request $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('apps-user/dashboard');
        }
 
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
       }

       public function logout(Request $request)
       {
          
        Auth::logout();
        
           $request->session()->invalidate();
        
           $request->session()->regenerateToken();
        
           return redirect('/apps-user/login/')->with('pesan','Berhasil Logout Apps');
       
       }
}

