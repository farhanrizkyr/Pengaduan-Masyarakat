<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaturanprofilPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     
    public function __construct()
    {
       $this->middleware('auth:petugas');
    }
    public function index()
    {
      return view('Petugas.profil');
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
    public function destroy(string $id)
    {
        //
    }


    public function avatar($id)
    {
        $user=Auth::user();
        request()->validate([
         'avatar'=>'required|mimes:jpg,png,jpeg|max:510'
        ],
        [
         'avatar.required'=>'Wajib Di isi',
         'avatar.mimes'=>'Wajib JPG,PNG,JPEG',
         'avatar.max'=>'Maximal Ukuran 5MB',
    
    

         ]);

        $filename=$user->avatar;

        if (request()->avatar ) {
            $file=request()->file('avatar');
            $filename=time().' . '.$file->getClientOriginalExtension();
            $file->move(public_path('AvatarUser'),$filename);

            if (request()->avatar_lama) {
                unlink(public_path('AvatarUser').'/'.request()->avatar_lama);
            }

            Petugas::find($id)->update([
            'avatar'=>$filename,

            ]);
        }

        return redirect('/apps-petugas/profile')->with('pesan','Avatar Berhasil Di Ubah');
    }
}
