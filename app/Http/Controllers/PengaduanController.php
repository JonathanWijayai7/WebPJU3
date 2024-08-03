<?php

namespace App\Http\Controllers;

use App\Exports\PengaduanExport;
use App\Imports\PengaduanImport;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Penanganan;
use App\Models\Pengaduan;
use App\Models\Skala;
use App\Models\Validasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduans = DB::table('pengaduans')
        ->join('skalalapors', 'pengaduans.skala_id', '=', 'skalalapors.id')
        ->join('penanganans', 'pengaduans.penanganan_id', '=', 'penanganans.id')
        ->join('validasis', 'pengaduans.validasi_id', '=', 'validasis.id')
        ->join('kecamatans', 'pengaduans.kec_id', '=', 'kecamatans.id')
        ->join('kelurahans', 'pengaduans.kel_id', '=', 'kelurahans.id')
        ->select('pengaduans.*', 'skalalapors.skala as skala', 'penanganans.s_penanganan as s_penanganan', 'validasis.s_validasi as s_validasi', 'kecamatans.nm_kecamatan as nm_kecamatan', 'kelurahans.nm_kelurahan as nm_kelurahan')
        ->latest()->paginate(10);

        return view('pengaduan.index', compact('pengaduans'));
    }

    public function cetakPengaduan()
    {
        $tanggal = now();
        $tanggalFormatted = $tanggal->format('d') . ' ' . $this->monthIndo($tanggal->format('m')) . ' ' . $tanggal->format('Y');

        $pengaduans = DB::table('pengaduans')
        ->join('skalalapors', 'pengaduans.skala_id', '=', 'skalalapors.id')
        ->join('penanganans', 'pengaduans.penanganan_id', '=', 'penanganans.id')
        ->join('validasis', 'pengaduans.validasi_id', '=', 'validasis.id')
        ->join('kecamatans', 'pengaduans.kec_id', '=', 'kecamatans.id')
        ->join('kelurahans', 'pengaduans.kel_id', '=', 'kelurahans.id')
        ->select('pengaduans.*', 'skalalapors.skala as skala', 'penanganans.s_penanganan as s_penanganan', 'validasis.s_validasi as s_validasi', 'kecamatans.nm_kecamatan as nm_kecamatan', 'kelurahans.nm_kelurahan as nm_kelurahan')
        ->where('s_validasi', 'Sudah Divalidasi')->get();

        return view('pengaduan.cetak', compact('pengaduans', 'tanggalFormatted'));
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

    public function pengaduanexport(){
        return Excel::download(new PengaduanExport,'pengaduan.xlsx');
    }

    public function pengaduanimportexcel(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataPengaduan', $namaFile);

        Excel::import(new PengaduanImport, public_path('/DataPengaduan/'.$namaFile));
        return redirect('pengaduan');
    }

    public function create()
    {
        $skalas = Skala::all();
        $penanganans = Penanganan::all();
        $validasis = Validasi::all();
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::all();
        return view('pengaduan.create', compact('kecamatans', 'kelurahans', 'skalas', 'penanganans', 'validasis'));
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
    
        return redirect()->route('pengaduan')->with('message', 'Data berhasil ditambahkan');
    }

    public function show(Pengaduan $pengaduan)
    {
        return view('pengaduan.show', compact('pengaduan'));
    }

    public function edit($id)
    {
        $pengaduan = Pengaduan::find($id);

        $skalas = Skala::all();
        $penanganans = Penanganan::all();
        $validasis = Validasi::all();
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::all();

    return view('pengaduan.edit', compact('pengaduan', 'kecamatans', 'kelurahans', 'skalas', 'penanganans', 'validasis'));
    }

    public function update(Request $request, $id)
    {

    $pengaduan = Pengaduan::find($id);
    $pengaduan->nama = $request->input('nama');
    $pengaduan->tgl_lapor = $request->input('tgl_lapor');
    $pengaduan->alamat = $request->input('alamat');
    $pengaduan->no_tlp = $request->input('no_tlp');
    $pengaduan->masalah = $request->input('masalah');
    $pengaduan->skala_id = $request->input('skala_id');
    $pengaduan->penanganan_id = $request->input('penanganan_id');
    $pengaduan->validasi_id = $request->input('validasi_id');
    $pengaduan->lokasi = $request->input('lokasi');
    $pengaduan->kec_id = $request->input('kec_id');
    $pengaduan->kel_id = $request->input('kel_id');
    $pengaduan->maps = $request->input('maps');
    $pengaduan->deskripsi = $request->input('deskripsi');

    if ($request->hasFile('ft_pju')) {
        // Unlink the previous file
        if (file_exists(public_path('img_lapor/' . $pengaduan->ft_pju))) {
            unlink(public_path('img_lapor/' . $pengaduan->ft_pju));
        }

        $file = $request->file('ft_pju');
        $filename = date('Ymd'). '-' .time(). '.' . $file->getClientOriginalExtension();
        $file->move(public_path('img_lapor'), $filename);
        $pengaduan->ft_pju = $filename;
    }

    $pengaduan->save();
    return redirect()->route('pengaduan')->with('success', 'Data berhasil diupdate');
}

    public function destroy($id)
    {
        $pengaduans = Pengaduan::where('pengaduans.id', $id)->first();
        if (file_exists(public_path('img_lapor/' . $pengaduans->ft_pju))) {
            unlink(public_path('img_lapor/' . $pengaduans->ft_pju));
        }
        $pengaduans->delete();
        return redirect()->route('pengaduan')->with('success', 'Data Berhasil Dihapus');
    }

    public function cetakPertanggal()
    {
        return view('pengaduan.cetak-pertanggal');
    }

    public function cetakPengaduanPertanggal($tglawal, $tglakhir)
    {
        $tanggal = now();
        $tanggalFormatted = $tanggal->format('d') . ' ' . $this->monthIndo($tanggal->format('m')) . ' ' . $tanggal->format('Y');

        $cetakPertanggal = $pengaduans = DB::table('pengaduans')
        ->join('skalalapors', 'pengaduans.skala_id', '=', 'skalalapors.id')
        ->join('penanganans', 'pengaduans.penanganan_id', '=', 'penanganans.id')
        ->join('validasis', 'pengaduans.validasi_id', '=', 'validasis.id')
        ->join('kecamatans', 'pengaduans.kec_id', '=', 'kecamatans.id')
        ->join('kelurahans', 'pengaduans.kel_id', '=', 'kelurahans.id')
        ->select('pengaduans.*', 'skalalapors.skala as skala', 'penanganans.s_penanganan as s_penanganan', 'validasis.s_validasi as s_validasi', 'kecamatans.nm_kecamatan as nm_kecamatan', 'kelurahans.nm_kelurahan as nm_kelurahan')
        ->where('s_validasi', 'Sudah Divalidasi')->get()->whereBetween('tgl_lapor',[$tglawal,$tglakhir]);

        $tglawalFormatted = \Carbon\Carbon::parse($tglawal)->format('d M Y', 'id_ID');
        $tglakhirFormatted = \Carbon\Carbon::parse($tglakhir)->format('d M Y', 'id_ID');

        return view('pengaduan.cetak-pengaduan-pertanggal', compact('cetakPertanggal', 'tglawalFormatted', 'tglakhirFormatted', 'tanggalFormatted'));
    }

    public function searchTgllpr(Request $request)
{
    $tgl_lapor = $request->input('tgl_lapor');
    $pengaduans = DB::table('pengaduans')
        ->join('skalalapors', 'pengaduans.skala_id', '=', 'skalalapors.id')
        ->join('penanganans', 'pengaduans.penanganan_id', '=', 'penanganans.id')
        ->join('validasis', 'pengaduans.validasi_id', '=', 'validasis.id')
        ->join('kecamatans', 'pengaduans.kec_id', '=', 'kecamatans.id')
        ->join('kelurahans', 'pengaduans.kel_id', '=', 'kelurahans.id')
        ->select('pengaduans.*', 'skalalapors.skala as skala', 'penanganans.s_penanganan as s_penanganan', 'validasis.s_validasi as s_validasi', 'kecamatans.nm_kecamatan as nm_kecamatan', 'kelurahans.nm_kelurahan as nm_kelurahan')
        ->where('tgl_lapor', 'LIKE', "%{$tgl_lapor}%")->paginate(5);
    return view('pengaduan.index', compact('pengaduans'));
}
    
}