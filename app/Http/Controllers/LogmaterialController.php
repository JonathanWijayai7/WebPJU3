<?php

namespace App\Http\Controllers;

use App\Exports\LogmaterialExport;
use App\Imports\LogmaterialImport;
use App\Models\Logmaterial;
use App\Models\Material;
use App\Models\Pegawai;
use App\Models\Validasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class LogmaterialController extends Controller
{
    public function index()
    {
        $logmaterials = DB::table('logmaterials')
        ->join('validasis', 'logmaterials.validasi_id', '=', 'validasis.id')
        ->join('materials', 'logmaterials.barang_id', '=', 'materials.id')
        ->join('pegawai', 'logmaterials.wkl_pgwlog', '=', 'pegawai.id')
        ->select('logmaterials.*', 'materials.nm_brg as nm_brg', 'validasis.s_validasi as s_validasi', 'pegawai.nm_pgw as nm_pgw')
        ->latest()->paginate(10);

    return view('logmaterial.index', compact('logmaterials'));
    }

    public function create()
    {
        $validasis = Validasi::all();
        $materials = Material::all();
        $pegawais = Pegawai::all();
        return view('logmaterial.create', compact('validasis', 'materials', 'pegawais'));
    }

    public function store(Request $request)
    {
        $validasi_id = $request->input('validasi_id');
        $validasi = Validasi::find($validasi_id);
        $barang_id = $request->input('barang_id');
        $material = Material::find($barang_id);
        $wkl_pgwlog = $request->input('wkl_pgwlog');
        $pegawai = Pegawai::find($wkl_pgwlog);
        
        $input = $request->all();
        $input['validasi_id'] = $validasi_id;
        $input['barang_id'] = $barang_id;
        $input['wkl_pgwlog'] = $wkl_pgwlog;

        $request->validate([
            'tgl_pakai' => 'required',
            'validasi_id' => 'required',
            'barang_id' => 'required',
            'unit_pakai' => 'required',
            'stn_pakai' => 'required',
            'lokasi_pakai' => 'required',
            'keterangan' => 'required',
            'wkl_pgwlog' => 'required',
        ]);


        Logmaterial::create($input);
    
        return redirect()->route('logmaterials')->with('message', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $logmaterial = Logmaterial::find($id);
        $validasis = Validasi::all();
        $materials = Material::all();
        $pegawais = Pegawai::all();
        return view('logmaterial.edit', compact('logmaterial', 'validasis', 'materials', 'pegawais'));
    }

    public function update(Request $request, $id)
    {
        $logmaterial = Logmaterial::find($id);
        $logmaterial->tgl_pakai = $request->input('tgl_pakai');
        $logmaterial->validasi_id = $request->input('validasi_id');
        $logmaterial->barang_id = $request->input('barang_id');
        $logmaterial->unit_pakai = $request->input('unit_pakai');
        $logmaterial->stn_pakai = $request->input('stn_pakai');
        $logmaterial->lokasi_pakai = $request->input('lokasi_pakai');
        $logmaterial->keterangan = $request->input('keterangan');
        $logmaterial->wkl_pgwlog = $request->input('wkl_pgwlog');

        $logmaterial->save();

        return redirect()->route('logmaterials')->with('message', 'Surat Tugas berhasil diupdate');
    }

    public function destroy($id)
    {
        $logmaterials = Logmaterial::where('logmaterials.id', $id)->first();
        $logmaterials->delete();
        return redirect()->route('logmaterials')->with('success', 'Data Berhasil Dihapus');
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

    public function logmaterialexport(){
        return Excel::download(new LogmaterialExport,'prmhn_pngn_material.xlsx');
    }

    public function logmaterialimportexcel(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('Dataprmhnmaterial', $namaFile);

        Excel::import(new LogmaterialImport, public_path('/Dataprmhnmaterial/'.$namaFile));
        return redirect('logmaterials');
    }

    public function cetakPertanggal()
    {
        return view('logmaterial.cetak-pertanggal');
    }

    public function cetakLogmaterialPertanggal($tglawal, $tglakhir)
    {
        $tanggal = now();
        $tanggalFormatted = $tanggal->format('d') . ' ' . $this->monthIndo($tanggal->format('m')) . ' ' . $tanggal->format('Y');

        $cetakPertanggal = DB::table('logmaterials')
        ->join('validasis', 'logmaterials.validasi_id', '=', 'validasis.id')
        ->join('materials', 'logmaterials.barang_id', '=', 'materials.id')
        ->join('pegawai', 'logmaterials.wkl_pgwlog', '=', 'pegawai.id')
        ->select('logmaterials.*', 'materials.nm_brg as nm_brg', 'validasis.s_validasi as s_validasi', 'pegawai.nm_pgw as nm_pgw')
        ->where('s_validasi', 'Sudah Divalidasi')->whereBetween('tgl_pakai',[$tglawal,$tglakhir])->get();

        $tglawalFormatted = \Carbon\Carbon::parse($tglawal)->format('d M Y', 'id_ID');
        $tglakhirFormatted = \Carbon\Carbon::parse($tglakhir)->format('d M Y', 'id_ID');

        return view('logmaterial.cetak-logmaterial-pertanggal', compact('cetakPertanggal', 'tglawalFormatted', 'tglakhirFormatted', 'tanggalFormatted'));
    }

    public function searchTgllog(Request $request)
{
    $tgl_pakai = $request->input('tgl_pakai');
    $logmaterials = DB::table('logmaterials')
    ->join('validasis', 'logmaterials.validasi_id', '=', 'validasis.id')
    ->join('materials', 'logmaterials.barang_id', '=', 'materials.id')
    ->join('pegawai', 'logmaterials.wkl_pgwlog', '=', 'pegawai.id')
    ->select('logmaterials.*', 'materials.nm_brg as nm_brg', 'validasis.s_validasi as s_validasi', 'pegawai.nm_pgw as nm_pgw')
    ->where('tgl_pakai', 'LIKE', "%{$tgl_pakai}%")->paginate(5);
    return view('logmaterial.index', compact('logmaterials'));
}

}
