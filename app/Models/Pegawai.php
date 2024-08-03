<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = "pegawai";
    protected $primaryKey = "id";
    protected $fillable = [
        'nm_pgw', 'jabatan', 'tgl_mskpgw', 'nip_pgw', 'tgkt_pgw', 'ftpegawai',
    ];

}
