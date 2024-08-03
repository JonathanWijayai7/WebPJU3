<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validasi extends Model
{
    use HasFactory;
    public $table = "validasis";

    //tambahkan kode berikut
    protected $fillable = [
        'id','s_validasi',
    ];
}
