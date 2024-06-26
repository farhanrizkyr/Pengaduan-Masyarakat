<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct() {
        $this->middleware('auth');
      }

    public function index()
    {
        return view('User.list_pengaduan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('User.buat_pengaduan');

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
        'judul'=>'required',
        'pengaduan'=>'required',
        'gambar'=>'required|mimes:jpg,png,jpeg|max:5120',
        ],
        [
        'judul.required'=>'Wajib Di isi',
        'pengaduan.required'=>'Wajib Di isi',
        'gambar.required'=>'Wajib Di isi',
        'gambar.mimes'=>'Wajib JPG,PNG,JPEG',
        'gambar.max'=>'Maximal 5 MB',
    
       ]);

       if (request()->gambar) {
        $file=request()->file('gambar');
        $filename=time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('Bukti_Laporan'),$filename);
       }
       Pengaduan::create([
       'judul'=>request()->judul,
       'pengaduan'=>request()->pengaduan,
       'jgambar'=>$filename,
       ]);

       return redirect('/apps-user/list-laporan-pengaduan')->with('pesan','Data Pengaduan Berhasil Di BuT');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengaduan $pengaduan)
    {
        //
    }
}
