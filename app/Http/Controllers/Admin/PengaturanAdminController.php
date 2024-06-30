<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class PengaturanAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function __construct()
     {
        return $this->middleware('auth:admin');
     }
    public function index()
    {
        return view('Admin.profile');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function edit()
    {
        return view('Admin.editprofile');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        request()->validate([
            'name'=>'required',
            'username'=>'required',
            'email'=>'required',
           ]);
   
           Admin::find($id)->update([
            'name'=>request()->name,
            'username'=>request()->username,
            'email'=>request()->email,
           ]);
   
           return redirect('/admin/admin-edit-profile')->with('status','Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
