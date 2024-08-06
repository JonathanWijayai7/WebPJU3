<?php

namespace App\Imports;

use App\Models\Logmaterial;
use Maatwebsite\Excel\Concerns\ToModel;

class LogmaterialImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Logmaterial([
            'tgl_pakai' =>$row[1],
            'validasi_id' =>$row[2],
            'barang_id' =>$row[3],
            'unit_pakai' =>$row[4],
            'stn_pakai' =>$row[5],
            'lokasi_pakai' =>$row[6],
            'keterangan' =>$row[7],
            'wkl_pgwlog' =>$row[8]
        ]);
    }
}
