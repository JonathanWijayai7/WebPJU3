<?php

namespace App\Imports;

use App\Models\Material;
use Maatwebsite\Excel\Concerns\ToModel;

class MaterialImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Material([
            'no_id_brg' =>$row[1],
            'tgl_masuk' =>$row[2],
            'nm_brg' =>$row[3],
            'stk_awal' =>$row[4],
            'stk_terpakai' =>$row[5],
            'stk_sisa' =>$row[6],
            'satuan' =>$row[7],
            'harga' =>$row[8],
            'ttl_brg' =>$row[9],
            'ket' =>$row[10],
            'asal' =>$row[11],
            'ft_brg' =>$row[12],
        ]);
    }
}
