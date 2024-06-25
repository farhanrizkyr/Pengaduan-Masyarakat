<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class RegisterAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $admins=Admin::latest()->get();
       return view('Admin/register_admin',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        request()->validate([
         'name'=>'required',
         'email'=>'required',
         'username'=>'required|unique:admins||alpha_dash',
         'password'=>'required|confirmed',

        ],
        [
        'username.alpha_dash'=>'Username Not Spacing Caracter'

       ]);

       Admin::create([
       'name'=>request()->name,
       'username'=>request()->username,
       'email'=>request()->name,
       'password'=>Hash::make(request()->password),
       ]);

       return redirect('/admin/register-admin')->with('status','Admin Berhasil Di Buat');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $admin=Admin::find($id);
        $admin->delete();
        return redirect('/admin/register-admin')->with('status','Data Berhasil Di Delete');
    }
}
