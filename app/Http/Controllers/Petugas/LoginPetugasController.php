<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginPetugasController extends Controller
{
  public function login_petugas(Request $request)
  {
     return view('Petugas.login');
  }

  public   function proses_login_petugas(Request $request){
    $credentials = $request->validate([
        'username' => ['required'],
        'password' => ['required'],
    ]);

    if (Auth::guard('petugas')->attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->intended('/apps-petugas/petugas/dashboard');
    }

    return back()->withErrors([
        'username' => 'The provided credentials do not match our records.',
    ])->onlyInput('username');
   }

   public function keluar_petugas()
   {
       auth()->guard('petugas')->logout();
       session()->flush();
       return redirect()->route('petugas.login');
   }


}
