<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perbaikan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_lpprbk',
        'nm_pelapor',
        'laporan',
        'lks_laporan',
        'dftr_mtrl',
        'dftr_unitmtrl',
        'penanganan_id',
        'ket_pengadaan',
        'validasi_id',
    ];

}