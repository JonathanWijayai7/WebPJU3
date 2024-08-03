<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penanganan extends Model
{
    use HasFactory;
    public $table = "penanganans";

    //tambahkan kode berikut
    protected $fillable = [
        'id','s_penanganan',
    ];

    public function pengaduans()
{
    return $this->hasMany(Pengaduan::class, 'penanganan_id');
}

}
