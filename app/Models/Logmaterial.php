<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logmaterial extends Model
{
    use HasFactory;
    protected $fillable = [
        'tgl_pakai',
        'validasi_id',
        'barang_id',
        'unit_pakai',
        'stn_pakai',
        'lokasi_pakai',
        'keterangan',
        'wkl_pgwlog',
    ];
}
