<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePetugasController extends Controller
{
    public function index()
    {
        return view('Petugas.home');
    }
}
