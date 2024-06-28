<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
class HomePetugasController extends Controller
{

    public function __construct()
{
   $this->middleware('auth:petugas');
}
    public function index()
    {
        $jumlah=Pengaduan::count();
        $panding=Pengaduan::where('status','0')->count();
        $proses=Pengaduan::where('status','1')->count();
        $done=Pengaduan::where('status','2')->count();
        return view('Petugas.home',compact('panding','done','proses','jumlah'));
    }


}
