<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skala extends Model
{
    use HasFactory;
    public $table = "skalalapors";

    //tambahkan kode berikut
    protected $fillable = [
        'id','skala',
    ];

}
