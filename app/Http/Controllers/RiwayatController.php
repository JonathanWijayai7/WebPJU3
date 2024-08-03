<?php

namespace App\Http\Controllers;

use App\Charts\KecPengaduanChart;
use App\Charts\KelPengaduanChart;
use App\Charts\RealisasiPengaduanChart;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RiwayatController extends Controller
{
    public function index(KecPengaduanChart $kecPengaduanChart, KelPengaduanChart $kelPengaduanChart, RealisasiPengaduanChart $realisasiPengaduanChart)
    {
        $pengaduans = DB::table('pengaduans')
        ->join('skalalapors', 'pengaduans.skala_id', '=', 'skalalapors.id')
        ->join('penanganans', 'pengaduans.penanganan_id', '=', 'penanganans.id')
        ->join('validasis', 'pengaduans.validasi_id', '=', 'validasis.id')
        ->join('kecamatans', 'pengaduans.kec_id', '=', 'kecamatans.id')
        ->join('kelurahans', 'pengaduans.kel_id', '=', 'kelurahans.id')
        ->select('pengaduans.*', 'skalalapors.skala as skala', 'penanganans.s_penanganan as s_penanganan', 'validasis.s_validasi as s_validasi', 'kecamatans.nm_kecamatan as nm_kecamatan', 'kelurahans.nm_kelurahan as nm_kelurahan')
        ->latest()->paginate(8);

        $skalaIds = [1, 2, 3];
    $skalaCounts = Pengaduan::select('skala_id', DB::raw('count(*) as count'))
    ->whereIn('skala_id', $skalaIds)
    ->groupBy('skala_id')
    ->pluck('count', 'skala_id');
    
    $skalaCounts = collect(array_replace(array_fill_keys($skalaIds, 0), $skalaCounts->all()));
        
    $penangananIds = [1, 3, 4, 5];
    $penangananCounts = Pengaduan::select('penanganan_id', DB::raw('count(*) as count'))
    ->whereIn('penanganan_id', $penangananIds)
    ->groupBy('penanganan_id')
    ->pluck('count', 'penanganan_id');
    
    $penangananCounts = collect(array_replace(array_fill_keys($penangananIds, 0), $penangananCounts->all()));
    
    return view('riwayat.index', compact('pengaduans', 'skalaCounts', 'penangananCounts'), [
        'kecPengaduanChart' => $kecPengaduanChart->build(),
        'kelPengaduanChart' => $kelPengaduanChart->build(),
        'realisasiPengaduanChart' => $realisasiPengaduanChart->build(),
    ]);
    }
    public function sortDarurat()
    {
        $pengaduans = DB::table('pengaduans')
        ->join('skalalapors', 'pengaduans.skala_id', '=', 'skalalapors.id')
        ->join('penanganans', 'pengaduans.penanganan_id', '=', 'penanganans.id')
        ->join('validasis', 'pengaduans.validasi_id', '=', 'validasis.id')
        ->join('kecamatans', 'pengaduans.kec_id', '=', 'kecamatans.id')
        ->join('kelurahans', 'pengaduans.kel_id', '=', 'kelurahans.id')
        ->select('pengaduans.*', 'skalalapors.skala as skala', 'penanganans.s_penanganan as s_penanganan', 'validasis.s_validasi as s_validasi', 'kecamatans.nm_kecamatan as nm_kecamatan', 'kelurahans.nm_kelurahan as nm_kelurahan')
        ->where('skala', 'Darurat (< 5 Jam)')->paginate(8);
    
    return view('riwayat.sort-pengaduan-darurat', compact('pengaduans'));
    }
    
    public function sortPenting()
    {
        $pengaduans = DB::table('pengaduans')
        ->join('skalalapors', 'pengaduans.skala_id', '=', 'skalalapors.id')
        ->join('penanganans', 'pengaduans.penanganan_id', '=', 'penanganans.id')
        ->join('validasis', 'pengaduans.validasi_id', '=', 'validasis.id')
        ->join('kecamatans', 'pengaduans.kec_id', '=', 'kecamatans.id')
        ->join('kelurahans', 'pengaduans.kel_id', '=', 'kelurahans.id')
        ->select('pengaduans.*', 'skalalapors.skala as skala', 'penanganans.s_penanganan as s_penanganan', 'validasis.s_validasi as s_validasi', 'kecamatans.nm_kecamatan as nm_kecamatan', 'kelurahans.nm_kelurahan as nm_kelurahan')
        ->where('skala', 'Penting (5 Jam - 8 Jam)')->paginate(8);
    
    return view('riwayat.sort-pengaduan-penting', compact('pengaduans'));
    }

    public function sortDptditunda()
    {
        $pengaduans = DB::table('pengaduans')
        ->join('skalalapors', 'pengaduans.skala_id', '=', 'skalalapors.id')
        ->join('penanganans', 'pengaduans.penanganan_id', '=', 'penanganans.id')
        ->join('validasis', 'pengaduans.validasi_id', '=', 'validasis.id')
        ->join('kecamatans', 'pengaduans.kec_id', '=', 'kecamatans.id')
        ->join('kelurahans', 'pengaduans.kel_id', '=', 'kelurahans.id')
        ->select('pengaduans.*', 'skalalapors.skala as skala', 'penanganans.s_penanganan as s_penanganan', 'validasis.s_validasi as s_validasi', 'kecamatans.nm_kecamatan as nm_kecamatan', 'kelurahans.nm_kelurahan as nm_kelurahan')
        ->where('skala', 'Dapat Ditunda (> 24 Jam)')->paginate(8);
    
    return view('riwayat.sort-pengaduan-dptditunda', compact('pengaduans'));
    }

    public function sortDiterima()
    {
        $pengaduans = DB::table('pengaduans')
        ->join('skalalapors', 'pengaduans.skala_id', '=', 'skalalapors.id')
        ->join('penanganans', 'pengaduans.penanganan_id', '=', 'penanganans.id')
        ->join('validasis', 'pengaduans.validasi_id', '=', 'validasis.id')
        ->join('kecamatans', 'pengaduans.kec_id', '=', 'kecamatans.id')
        ->join('kelurahans', 'pengaduans.kel_id', '=', 'kelurahans.id')
        ->select('pengaduans.*', 'skalalapors.skala as skala', 'penanganans.s_penanganan as s_penanganan', 'validasis.s_validasi as s_validasi', 'kecamatans.nm_kecamatan as nm_kecamatan', 'kelurahans.nm_kelurahan as nm_kelurahan')
        ->where('s_penanganan', 'Laporan Baru Diterima')->paginate(8);
    
    return view('riwayat.sort-pengaduan-diterima', compact('pengaduans'));
    }

    public function sortDiperbaiki()
    {
        $pengaduans = DB::table('pengaduans')
        ->join('skalalapors', 'pengaduans.skala_id', '=', 'skalalapors.id')
        ->join('penanganans', 'pengaduans.penanganan_id', '=', 'penanganans.id')
        ->join('validasis', 'pengaduans.validasi_id', '=', 'validasis.id')
        ->join('kecamatans', 'pengaduans.kec_id', '=', 'kecamatans.id')
        ->join('kelurahans', 'pengaduans.kel_id', '=', 'kelurahans.id')
        ->select('pengaduans.*', 'skalalapors.skala as skala', 'penanganans.s_penanganan as s_penanganan', 'validasis.s_validasi as s_validasi', 'kecamatans.nm_kecamatan as nm_kecamatan', 'kelurahans.nm_kelurahan as nm_kelurahan')
        ->where('s_penanganan', 'Sedang Diperbaiki')->paginate(8);
    
    return view('riwayat.sort-pengaduan-diperbaiki', compact('pengaduans'));
    }

    public function sortTerselesaikan()
    {
        $pengaduans = DB::table('pengaduans')
        ->join('skalalapors', 'pengaduans.skala_id', '=', 'skalalapors.id')
        ->join('penanganans', 'pengaduans.penanganan_id', '=', 'penanganans.id')
        ->join('validasis', 'pengaduans.validasi_id', '=', 'validasis.id')
        ->join('kecamatans', 'pengaduans.kec_id', '=', 'kecamatans.id')
        ->join('kelurahans', 'pengaduans.kel_id', '=', 'kelurahans.id')
        ->select('pengaduans.*', 'skalalapors.skala as skala', 'penanganans.s_penanganan as s_penanganan', 'validasis.s_validasi as s_validasi', 'kecamatans.nm_kecamatan as nm_kecamatan', 'kelurahans.nm_kelurahan as nm_kelurahan')
        ->where('s_penanganan', 'Terselesaikan (Nyala)')->paginate(8);
    
    return view('riwayat.sort-pengaduan-terselesaikan', compact('pengaduans'));
    }

    public function sortTertunda()
    {
        $pengaduans = DB::table('pengaduans')
        ->join('skalalapors', 'pengaduans.skala_id', '=', 'skalalapors.id')
        ->join('penanganans', 'pengaduans.penanganan_id', '=', 'penanganans.id')
        ->join('validasis', 'pengaduans.validasi_id', '=', 'validasis.id')
        ->join('kecamatans', 'pengaduans.kec_id', '=', 'kecamatans.id')
        ->join('kelurahans', 'pengaduans.kel_id', '=', 'kelurahans.id')
        ->select('pengaduans.*', 'skalalapors.skala as skala', 'penanganans.s_penanganan as s_penanganan', 'validasis.s_validasi as s_validasi', 'kecamatans.nm_kecamatan as nm_kecamatan', 'kelurahans.nm_kelurahan as nm_kelurahan')
        ->where('s_penanganan', 'Tertunda')->paginate(8);
    
    return view('riwayat.sort-pengaduan-tertunda', compact('pengaduans'));
    }

}
