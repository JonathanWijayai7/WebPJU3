<?php

namespace App\Imports;

use App\Models\Surattgs;
use Maatwebsite\Excel\Concerns\ToModel;

class SurattgsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Surattgs([
            'tgl_surat' =>$row[1],
            'validasi_id' =>$row[2],
            'petugas1' =>$row[3],
            'petugas2' =>$row[4],
            'petugas3' =>$row[5],
            'petugas4' =>$row[6],
            'petugas5' =>$row[7],
            'tujuan1' =>$row[8],
            'tujuan2' =>$row[9],
            'tujuan3' =>$row[10],
            'tujuan4' =>$row[11],
            'tujuan5' =>$row[12],
        ]);
    }
}
