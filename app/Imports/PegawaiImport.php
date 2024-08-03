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
            'nama' =>$row[1],
            'jabatan' =>$row[2],
            'alamat' =>$row[3],
            'tglhr' =>$row[4],
            'email' =>$row[5],
            'telp' =>$row[6],
            'ftpegawai' =>$row[7],
            'wkl_pgwlog' =>$row[7],
        ]);
    }
}
