<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ListPengaduanMasyarakatController extends Controller
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
        $pengaduans=Pengaduan::latest()->wherein('status',['0','1'])->get();
       return view('Petugas.list_pengaduan',compact('pengaduans'));
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
    public function store($id)
    {
        Pengaduan::find($id)->update([
        'catatan'=>request()->catatan,
        'status'=>request()->status,
        'petugas_id'=>Auth::user()->id

        ]);

        return redirect('/apps-petugas/list-laporan-pengaduan-masyarakat/')->with('pesan','Pengaduan Berhasil Di Tanggapi ');
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
    public function edit($id)
    {
        $data=Pengaduan::find($id);
        return  view('Petugas.jawab',compact('data'));
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


     public function history()

     {
        $pengaduans=Pengaduan::where('status','2')->latest()->get();
        return view('Petugas.list_pengaduan',compact('pengaduans'));
     }
    public function destroy(string $id)
    {
        //
    }
}
