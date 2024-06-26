<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $guarded=['id'];
    protected $table='pengajuan_masalah';


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
