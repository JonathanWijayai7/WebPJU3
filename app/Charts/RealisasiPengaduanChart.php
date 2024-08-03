<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class RealisasiPengaduanChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $pengaduans = DB::table('pengaduans')
        ->join('skalalapors', 'pengaduans.skala_id', '=', 'skalalapors.id')
        ->join('penanganans', 'pengaduans.penanganan_id', '=', 'penanganans.id')
        ->join('validasis', 'pengaduans.validasi_id', '=', 'validasis.id')
        ->join('kecamatans', 'pengaduans.kec_id', '=', 'kecamatans.id')
        ->join('kelurahans', 'pengaduans.kel_id', '=', 'kelurahans.id')
        ->select('pengaduans.*', 'skalalapors.skala as skala', 'penanganans.s_penanganan as s_penanganan', 'validasis.s_validasi as s_validasi', 'kecamatans.nm_kecamatan as nm_kecamatan', 'kelurahans.nm_kelurahan as nm_kelurahan')->get();

        $data= [
            $pengaduans->where('penanganan_id',1)->count(),
            $pengaduans->where('penanganan_id',3)->count(),
            $pengaduans->where('penanganan_id',4)->count(),
            $pengaduans->where('penanganan_id',5)->count(),
            
        ];

        $label = [
            'Laporan Baru Diterima',
            'Sedang Diperbaiki',
            'Terselesaikan (Nyala)',
            'Tertunda',
        ];

        return $this->chart->donutChart()
            ->setTitle('Data Realisasi Penanganan Pengaduan')
            ->setSubtitle(date('Y'))
            ->addData($data)
            ->setColors(['#0fab15', '#ffb514', '#3595f0','#db0700'])
            ->setLabels($label);
    }
    }
