<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePetugasController extends Controller
{

    public function __construct()
{
   $this->middleware('auth:petugas');
}
    public function index()
    {
        return view('Petugas.home');
    }


}
