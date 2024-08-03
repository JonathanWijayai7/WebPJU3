<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
    {
        protected $table = "pengaduans";
        protected $primaryKey = "id";
        protected $fillable = [
            'tgl_lapor', 
            'nama', 
            'alamat', 
            'no_tlp', 
            'masalah', 
            'skala_id', 
            'penanganan_id', 
            'validasi_id', 
            'lokasi', 
            'kec_id', 
            'kel_id', 
            'maps', 
            'deskripsi', 
            'ft_pju',
        ];
        
    }