<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PengaturanUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public  function __construct() {
        $this->middleware('auth');
     }
    public function index()
    {
        return view('User.profil');
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
        return view('User.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $user=Auth::user();
        request()->validate([
          'avatar'=>'required|mimes:jpg,png',
        ]);

        $filename=$user->avatar;

        if (request()->avatar) {
            $file=request()->file('avatar');
            $filename=time().''.$file->getClientOriginalExtension();
            $file->move(public_path('AvatarUser'),$filename);

           
        }

        if (request()->avatar_lama) {
           unlink(public_path('AvatarUser').'/'.request()->avatar_lama);
        }
     

        User::find($id)->update([
            'avatar'=>$filename,
    
            ]);
       

        return redirect('apps-user/profile')->with('status','Avatar Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
