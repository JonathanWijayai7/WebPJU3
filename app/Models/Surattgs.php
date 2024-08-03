<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surattgs extends Model
{
    use HasFactory;
    public $table = "surattgss";

    //tambahkan kode berikut
    protected $fillable = [
        'id',
        'tgl_surat',
        'validasi_id',
        'petugas1',
        'petugas2',
        'petugas3',
        'petugas4',
        'petugas5',
        'tujuan1',
        'tujuan2',
        'tujuan3',
        'tujuan4',
        'tujuan5',
        'tujuan6',
        'tujuan7',
    ];
}
