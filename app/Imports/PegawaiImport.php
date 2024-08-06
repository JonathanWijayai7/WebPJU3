<?php

namespace App\Imports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\ToModel;

class PegawaiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pegawai([
            'nm_pgw' =>$row[1],
            'jabatan' =>$row[2],
            'tgl_mskpgw' =>$row[3],
            'nip_pgw' =>$row[4],
            'tgkt_pgw' =>$row[5],
            'ftpegawai' =>$row[6],
        ]);
    }
}
