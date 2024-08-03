<?php

namespace App\Exports;

use App\Models\Surattgs;
use Maatwebsite\Excel\Concerns\FromCollection;

class SurattgsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Surattgs::all();
    }
}
