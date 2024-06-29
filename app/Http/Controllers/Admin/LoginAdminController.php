<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginAdminController extends Controller
{


    public function loginadmin()
    {
       return view('Admin.login');
    }

    public function post_log(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
    
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
    
            return redirect()->intended('/admin/dashboard');
        }
    
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }


    public function keluar_admin()
    {
        auth()->guard('admin')->logout();
        session()->flush();
        return redirect()->route('admin.login');
    }
}
