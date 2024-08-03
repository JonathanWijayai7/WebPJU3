<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class KelPengaduanChart
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
            $pengaduans->where('kel_id',1)->count(),
            $pengaduans->where('kel_id',2)->count(),
            $pengaduans->where('kel_id',3)->count(),
            $pengaduans->where('kel_id',4)->count(),
            $pengaduans->where('kel_id',5)->count(),
            $pengaduans->where('kel_id',6)->count(),
            $pengaduans->where('kel_id',7)->count(),
            $pengaduans->where('kel_id',8)->count(),
            $pengaduans->where('kel_id',9)->count(),
            $pengaduans->where('kel_id',10)->count(),
            $pengaduans->where('kel_id',11)->count(),
            $pengaduans->where('kel_id',12)->count(),
            $pengaduans->where('kel_id',13)->count(),
            $pengaduans->where('kel_id',14)->count(),
            $pengaduans->where('kel_id',15)->count(),
            $pengaduans->where('kel_id',16)->count(),
            $pengaduans->where('kel_id',17)->count(),
            $pengaduans->where('kel_id',18)->count(),
            $pengaduans->where('kel_id',19)->count(),
            $pengaduans->where('kel_id',20)->count(),
            $pengaduans->where('kel_id',21)->count(),
            $pengaduans->where('kel_id',22)->count(),
        ];

        $label = [
            'Argasunya',
            'Harjamukti',
            'Kalijaga',
            'Kecapi',
            'Larangan',
            'Kebonbaru',
            'Kejaksan',
            'Kesenden',
            'Sukapura',
            'Drajat',
            'Karyamulya',
            'Kesambi',
            'Pekiringan',
            'Sunyaragi',
            'Kasepuhan',
            'Lemahwungkuk',
            'Panjunan',
            'Pegambiran',
            'Jagasatru',
            'Pekalangan',
            'Pekalipan',
            'Pulausaren',
        ];

        return $this->chart->barChart()
            ->setTitle('Data Pengaduan Per Kelurahan')
            ->setSubtitle(date('Y'))
            ->addData('Kel', $data)
            ->setColors(['#3595f0'])
            ->setXAxis($label);
    }
    }
