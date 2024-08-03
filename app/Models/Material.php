<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = "materials";
        protected $primaryKey = "id";
        protected $fillable = [
            'no_id_brg', 
            'tgl_masuk', 
            'nm_brg', 
            'stk_awal', 
            'stk_terpakai', 
            'stk_sisa', 
            'satuan', 
            'hrg_brg', 
            'ttl_brg', 
            'ket', 
            'ft_brg', 
        ];
        
        public static function boot()
    {
        parent::boot();

        static::saving(function ($material) {
            $material->stk_sisa = $material->stk_awal - $material->stk_terpakai;
            $material->ttl_brg = $material->stk_sisa * $material->hrg_brg;
        });
    }
}
