<?php

namespace App\Imports;

use App\Models\Perbaikan;
use Maatwebsite\Excel\Concerns\ToModel;

class PerbaikanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Perbaikan([
            'tgl_lpprbk' =>$row[1],
            'nm_pelapor' =>$row[2],
            'laporan' =>$row[3],
            'lks_laporan' =>$row[4],
            'dftr_mtrl' =>$row[5],
            'dftr_unitmtrl' =>$row[6],
            'penanganan_id' =>$row[7],
            'ket_pengadaan' =>$row[8],
            'validasi_id' =>$row[9],
        ]);
    }
}
