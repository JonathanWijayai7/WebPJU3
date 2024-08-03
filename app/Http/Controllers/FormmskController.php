<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Penanganan;
use App\Models\Pengaduan;
use App\Models\Skala;
use App\Models\Validasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormmskController extends Controller
{
    public function create()
    {
        $pengaduans = DB::table('pengaduans')
        ->join('skalalapors', 'pengaduans.skala_id', '=', 'skalalapors.id')
        ->join('penanganans', 'pengaduans.penanganan_id', '=', 'penanganans.id')
        ->join('validasis', 'pengaduans.validasi_id', '=', 'validasis.id')
        ->join('kecamatans', 'pengaduans.kec_id', '=', 'kecamatans.id')
        ->join('kelurahans', 'pengaduans.kel_id', '=', 'kelurahans.id')
        ->select('pengaduans.*', 'skalalapors.skala as skala', 'penanganans.s_penanganan as s_penanganan', 'validasis.s_validasi as s_validasi', 'kecamatans.nm_kecamatan as nm_kecamatan', 'kelurahans.nm_kelurahan as nm_kelurahan')
        ->get();

        $skalas = Skala::all();
        $penanganans = Penanganan::all();
        $validasis = Validasi::all();
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::all();
        return view('formmasuk.create', compact('kecamatans', 'kelurahans', 'skalas', 'penanganans', 'validasis'));
    }

    public function store(Request $request)
    {
        
        $skala_id = $request->input('skala_id');
        $skala = Skala::find($skala_id);
        $penanganan_id = $request->input('penanganan_id');
        $penanganan = Penanganan::find($penanganan_id);
        $validasi_id = $request->input('validasi_id');
        $validasi = Validasi::find($validasi_id);
        $kec_id = $request->input('kec_id');
        $kecamatan = Kecamatan::find($kec_id);
        $kel_id = $request->input('kel_id');
        $kelurahan = Kelurahan::find($kel_id);
    
        $input = $request->all();
        $input['skala_id'] = $skala_id;
        $input['penanganan_id'] = $penanganan_id;
        $input['validasi_id'] = $validasi_id;
        $input['kec_id'] = $kec_id;
        $input['kel_id'] = $kel_id;

        $request->validate([
            'nama' => 'required',
            'no_tlp' => 'required',
            'alamat' => 'required',
            'tgl_lapor' => 'required',
            'masalah' => 'required',
            'lokasi' => 'required',
            'kec_id' => 'required',
            'kel_id' => 'required',
            'skala_id' => 'required',
            'penanganan_id' => 'required',
            'validasi_id' => 'required',
            'maps' => 'required',
            'deskripsi' => 'required',
            'ft_pju' => 'required|image',
        ]);

        if ($image = $request->file('ft_pju')) {
            $destinationPath = 'img_lapor/';
            $imageName = date('Ymd'). '-' . time() . '_' . rand(1000, 9999) . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
            $input['ft_pju'] = "$imageName";
        }
    
        Pengaduan::create($input);
    
        return redirect()->route('formmasuk.create')->with('message', 'Laporan Pengaduan Berhasil Diajukan');
    }
}
