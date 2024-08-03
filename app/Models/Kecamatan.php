<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    public $table = "kecamatans";

    //tambahkan kode berikut
    protected $fillable = [
        'id','nm_kecamatan',
    ];

    public function pengaduans()
{
    return $this->hasMany(Pengaduan::class, 'kec_id');
}
}
