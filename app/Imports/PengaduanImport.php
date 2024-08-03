<?php

namespace App\Imports;

use App\Models\Pengaduan;
use Maatwebsite\Excel\Concerns\ToModel;

class PengaduanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pengaduan([
            'tgl_lapor' =>$row[1],
            'nama' =>$row[2],
            'alamat' =>$row[3],
            'no_tlp' =>$row[4],
            'masalah' =>$row[5],
            'skala_id' =>$row[6],
            'penanganan_id' =>$row[7],
            'validasi_id' =>$row[8],
            'lokasi' =>$row[9],
            'kec_id' =>$row[10],
            'kel_id' =>$row[11],
            'maps' =>$row[12],
            'deskripsi' =>$row[13],
            'ft_pju' =>$row[14],
        ]);
    }
}
