<?php

namespace App\Charts;

use App\Models\Pengaduan;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class KecPengaduanChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $pengaduans = DB::table('pengaduans')
        ->join('skalalapors', 'pengaduans.skala_id', '=', 'skalalapors.id')
        ->join('penanganans', 'pengaduans.penanganan_id', '=', 'penanganans.id')
        ->join('validasis', 'pengaduans.validasi_id', '=', 'validasis.id')
        ->join('kecamatans', 'pengaduans.kec_id', '=', 'kecamatans.id')
        ->join('kelurahans', 'pengaduans.kel_id', '=', 'kelurahans.id')
        ->select('pengaduans.*', 'skalalapors.skala as skala', 'penanganans.s_penanganan as s_penanganan', 'validasis.s_validasi as s_validasi', 'kecamatans.nm_kecamatan as nm_kecamatan', 'kelurahans.nm_kelurahan as nm_kelurahan')->get();

        $data= [
            $pengaduans->where('kec_id',1)->count(),
            $pengaduans->where('kec_id',2)->count(),
            $pengaduans->where('kec_id',3)->count(),
            $pengaduans->where('kec_id',4)->count(),
            $pengaduans->where('kec_id',5)->count(),
        ];

        $label = [
            'Harjamukti',
            'Kejaksan',
            'Kesambi',
            'Lemahwungkuk',
            'Pekalipan',
        ];

        return $this->chart->barChart()
            ->setTitle('Data Pengaduan Per Kecamatan')
            ->setSubtitle(date('Y'))
            ->addData('Kec', $data)
            ->setColors(['#0600ad'])
            ->setXAxis($label);
    }

}
