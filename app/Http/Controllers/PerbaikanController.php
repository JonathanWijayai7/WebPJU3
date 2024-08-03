<?php

namespace App\Http\Controllers;

use App\Exports\PerbaikanExport;
use App\Imports\PerbaikanImport;
use App\Models\Penanganan;
use App\Models\Perbaikan;
use App\Models\Validasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PerbaikanController extends Controller
{
    public function index()
    {
        $perbaikans = DB::table('perbaikans')
        ->join('penanganans', 'perbaikans.penanganan_id', '=', 'penanganans.id')
        ->join('validasis', 'perbaikans.validasi_id', '=', 'validasis.id')
        ->select('perbaikans.*', 'penanganans.s_penanganan as s_penanganan', 'validasis.s_validasi as s_validasi')
        ->latest()->paginate(10);

        return view('perbaikan.index', compact('perbaikans'));
    }

    public function create()
    {
        $penanganans = Penanganan::all();
        $validasis = Validasi::all();
        return view('perbaikan.create', compact('penanganans', 'validasis'));
    }

    public function store(Request $request)
    {
        $penanganan_id = $request->input('penanganan_id');
        $penanganan = Penanganan::find($penanganan_id);
        $validasi_id = $request->input('validasi_id');
        $validasi = Validasi::find($validasi_id);

        $input = $request->all();
        $input['penanganan_id'] = $penanganan_id;
        $input['validasi_id'] = $validasi_id;

        $request->validate([
            'tgl_lpprbk' => 'required',
            'nm_pelapor' => 'required',
            'laporan' => 'required',
            'lks_laporan' => 'required',
            'dftr_mtrl' => 'required',
            'dftr_unitmtrl' => 'required',
            'penanganan_id' => 'required',
            'ket_pengadaan' => 'required',
            'validasi_id' => 'required',
        ]);
        
        Perbaikan::create($input);
    
        return redirect()->route('perbaikans')->with('message', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $perbaikan = Perbaikan::find($id);

        $penanganans = Penanganan::all();
        $validasis = Validasi::all();

    return view('perbaikan.edit', compact('perbaikan', 'penanganans', 'validasis'));
    }

    public function update(Request $request, $id)
    {

    $perbaikan = Perbaikan::find($id);
    $perbaikan->tgl_lpprbk = $request->input('tgl_lpprbk');
    $perbaikan->nm_pelapor = $request->input('nm_pelapor');
    $perbaikan->laporan = $request->input('laporan');
    $perbaikan->lks_laporan = $request->input('lks_laporan');
    $perbaikan->dftr_mtrl = $request->input('dftr_mtrl');
    $perbaikan->dftr_unitmtrl = $request->input('dftr_unitmtrl');
    $perbaikan->penanganan_id = $request->input('penanganan_id');
    $perbaikan->ket_pengadaan = $request->input('ket_pengadaan');
    $perbaikan->validasi_id = $request->input('validasi_id');
    
    $perbaikan->save();
    return redirect()->route('perbaikans')->with('success', 'Data berhasil diupdate');
}

    public function destroy(Request $request, $id)
    {  
    Perbaikan::find($id)->delete();
    return redirect()->route('perbaikans')->with('message', 'Keterangan Penanganan berhasil dihapus');
    }

    public function cetakPertanggal()
    {
        return view('perbaikan.cetak-pertanggal');
    }

    public function cetakPerbaikanPertanggal($tglawal, $tglakhir)
    {
        $tanggal = now();
        $tanggalFormatted = $tanggal->format('d') . ' ' . $this->monthIndo($tanggal->format('m')) . ' ' . $tanggal->format('Y');

        $cetakPertanggal = $perbaikans = DB::table('perbaikans')
        ->join('penanganans', 'perbaikans.penanganan_id', '=', 'penanganans.id')
        ->join('validasis', 'perbaikans.validasi_id', '=', 'validasis.id')
        ->where('s_validasi', 'Sudah Divalidasi')
        ->whereBetween('tgl_lpprbk',[$tglawal,$tglakhir])->get();

        $tglawalFormatted = \Carbon\Carbon::parse($tglawal)->format('d M Y', 'id_ID');
        $tglakhirFormatted = \Carbon\Carbon::parse($tglakhir)->format('d M Y', 'id_ID');

        return view('perbaikan.cetak-perbaikan-pertanggal', compact('cetakPertanggal', 'tglawalFormatted', 'tglakhirFormatted', 'tanggalFormatted'));
    }

    private function monthIndo($month) {
        $bulan = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        );
        return $bulan[$month];
    }

    public function perbaikanexport(){
        return Excel::download(new PerbaikanExport,'db_perbaikan.xlsx');
    }

    public function perbaikanimportexcel(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataPerbaikan', $namaFile);

        Excel::import(new PerbaikanImport, public_path('/DataPerbaikan/'.$namaFile));
        return redirect('perbaikans');
    }

    public function searchTglprbk(Request $request)
{
    $tgl_lpprbk = $request->input('tgl_lpprbk');
    $perbaikans = DB::table('perbaikans')
        ->join('penanganans', 'perbaikans.penanganan_id', '=', 'penanganans.id')
        ->join('validasis', 'perbaikans.validasi_id', '=', 'validasis.id')
        ->select('perbaikans.*', 'penanganans.s_penanganan as s_penanganan', 'validasis.s_validasi as s_validasi')
        ->where('tgl_lpprbk', 'LIKE', "%{$tgl_lpprbk}%")->paginate(5);
    return view('perbaikan.index', compact('perbaikans'));
}

}
