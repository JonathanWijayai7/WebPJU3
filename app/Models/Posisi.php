<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posisi extends Model
{
    use HasFactory;
    public $table = "posisis";

    //tambahkan kode berikut
    protected $fillable = [
        'id','nm_posisi',
    ];
}
