<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;
    public $table = "kelurahans";

    //tambahkan kode berikut
    protected $fillable = [
        'id','nm_kelurahan',
    ];

    public function pengaduans()
{
    return $this->hasMany(Pengaduan::class, 'kel_id');
}

}
