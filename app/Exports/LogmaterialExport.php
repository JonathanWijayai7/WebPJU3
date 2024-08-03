<?php

namespace App\Exports;

use App\Models\Logmaterial;
use Maatwebsite\Excel\Concerns\FromCollection;

class LogmaterialExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Logmaterial::all();
    }
}
