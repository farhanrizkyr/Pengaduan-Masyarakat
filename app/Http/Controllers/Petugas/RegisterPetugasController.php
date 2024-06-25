<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Petugas::latest()->get();
        return view('Petugas.register_petugas',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Request()->validate([
        'name'=>'required',
        'jenis_kelamin'=>'required',
        'degree'=>'required',
        'jenis_kelamin'=>'required',
        'username'=>'required',
        'email'=>'required',
        'password'=>'required|confirmed',
        ]);

        Petugas::create([
        'name'=>request()->name,
        'jenis_kelamin'=>request()->jenis_kelamin,
        'username'=>request()->username,
        'jenis_kelamin'=>request()->jenis_kelamin,
        'degree'=>request()->degree,
        'email'=>request()->email,
        'password'=>Hash::make(request()->password),
        ]);

        return redirect('admin/petugas')->with('status','Data Account Petugas Berhasil Di Buat');
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
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Petugas $petugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        Request()->validate([
            'name'=>'required',
            'degree'=>'required',
            'jenis_kelamin'=>'required',
            'username'=>'required',
            'email'=>'required',
            ]);
    
            Petugas::find($id)->update([
            'name'=>request()->name,
            'jenis_kelamin'=>request()->jenis_kelamin,
            'username'=>request()->username,
            'degree'=>request()->degree,
            'email'=>request()->email,
            ]);
    
            return redirect('admin/petugas')->with('status','Data Account Petugas Berhasil Di Tambahkan');
    }



    /**
     * Remove the specified resource from storage.
     */



    public function destroy($id)
    {
       $data=Petugas::find($id);
       $data->delete();
       return redirect('admin/petugas')->with('pesan','Data Berhasil Di Delete');

    }

}

