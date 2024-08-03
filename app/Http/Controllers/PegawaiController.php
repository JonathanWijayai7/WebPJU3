<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Exports\PegawaiExport;
use App\Imports\PegawaiImport;
use App\Models\Posisi;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Pegawai::join('posisis', 'pegawai.jabatan', '=', 'posisis.id')
        ->select('pegawai.*', 'posisis.nm_posisi as nm_posisi')
        ->paginate(10);

        return view('dtpegawai.index', compact('pegawai'));
    }


    public function cetakPegawai()
    {
        $tanggal = now();
        $tanggalFormatted = $tanggal->format('d') . ' ' . $this->monthIndo($tanggal->format('m')) . ' ' . $tanggal->format('Y');

        $pegawai = Pegawai::join('posisis', 'pegawai.jabatan', '=', 'posisis.id')
        ->select('pegawai.*', 'posisis.nm_posisi as nm_posisi')
        ->get();

        return view('dtpegawai.cetak', compact('pegawai', 'tanggalFormatted'));
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

    public function pegawaiexport(){
        return Excel::download(new PegawaiExport,'pegawai.xlsx');
    }

    public function pegawaiimportexcel(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataPegawai', $namaFile);

        Excel::import(new PegawaiImport, public_path('/DataPegawai/'.$namaFile));
        return redirect('dtpegawai');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posisis = Posisi::all();
        return view('dtpegawai.create', compact('posisis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jabatan_id = $request->input('jabatan');
        $posisi = Posisi::find($jabatan_id);
        $jabatan = $posisi->nm_posisi;

        $input = $request->all();
        $input['jabatan'] = $jabatan;

        $request->validate([
            'nm_pgw' => 'required',
            'jabatan' => 'required',
            'tgl_mskpgw' => 'required',
            'nip_pgw' => 'required',
            'tgkt_pgw' => 'required',
            'ftpegawai' => 'required|image',
        ]);

        $input = $request->all();

        if ($image = $request->file('ftpegawai')) {
            $destinationPath = 'image/';
            $imageName = date('Ymd') . '_' . rand(1000, 9999) . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageName);
            $input['ftpegawai'] = "$imageName";
        }
        Pegawai::create($input);

        return redirect('/dtpegawai')->with('message', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pegawai = Pegawai::join('posisis', 'pegawai.jabatan', '=', 'posisis.id')
        ->select('pegawai.*', 'posisis.nm_posisi as nm_posisi')
        ->find($id);

    $posisis = Posisi::all();

    return view('dtpegawai.edit', compact('pegawai', 'posisis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $pegawai = Pegawai::find($id);
    $pegawai->nm_pgw = $request->input('nm_pgw');
    $pegawai->jabatan = $request->input('jabatan');
    $pegawai->tgl_mskpgw = $request->input('tgl_mskpgw');
    $pegawai->nip_pgw = $request->input('nip_pgw');
    $pegawai->tgkt_pgw = $request->input('tgkt_pgw');

    if ($request->hasFile('ftpegawai')) {
        // Unlink the previous file
        if (file_exists(public_path('image/' . $pegawai->ftpegawai))) {
            unlink(public_path('image/' . $pegawai->ftpegawai));
        }

        $file = $request->file('ftpegawai');
        $filename = date('Ymd') . '_' . rand(1000, 9999) . "." . $file->getClientOriginalExtension();
        $file->move(public_path('image'), $filename);
        $pegawai->ftpegawai = $filename;
    }

    $pegawai->save();
    return redirect()->route('dtpegawai')->with('success', 'Data pegawai berhasil diupdate');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    $pegawai = Pegawai::find($id);
    if (file_exists(public_path('image/' . $pegawai->ftpegawai))) {
        unlink(public_path('image/' . $pegawai->ftpegawai));
    }
    $pegawai->delete();
    return redirect()->route('dtpegawai')->with('success', 'Data Berhasil Dihapus');
    }

    public function cetakPertanggal()
    {
        return view('dtpegawai.cetak-pertanggal');
    }

    public function cetakPegawaiPertanggal($tglawal, $tglakhir)
    {
        $tanggal = now();
        $tanggalFormatted = $tanggal->format('d') . ' ' . $this->monthIndo($tanggal->format('m')) . ' ' . $tanggal->format('Y');

        $cetakPertanggal = Pegawai::join('posisis', 'pegawai.jabatan', '=', 'posisis.id')
        ->select('pegawai.*', 'posisis.nm_posisi as nm_posisi')
        ->get()->whereBetween('tgl_mskpgw',[$tglawal,$tglakhir]);

        $tglawalFormatted = \Carbon\Carbon::parse($tglawal)->format('d M Y', 'id_ID');
        $tglakhirFormatted = \Carbon\Carbon::parse($tglakhir)->format('d M Y', 'id_ID');

        return view('dtpegawai.cetak-pegawai-pertanggal', compact('cetakPertanggal', 'tglawalFormatted', 'tglakhirFormatted', 'tanggalFormatted'));
    }

    public function searchNama(Request $request)
    {
    $nm_pgw = $request->input('nm_pgw');
    $pegawai = Pegawai::where('nm_pgw', 'LIKE', "%{$nm_pgw}%")->paginate(5);
    return view('dtpegawai.index', compact('pegawai'));
    }
}
