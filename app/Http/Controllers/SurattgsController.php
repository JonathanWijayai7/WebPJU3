<?php

namespace App\Http\Controllers;

use App\Exports\SurattgsExport;
use App\Imports\SurattgsImport;
use App\Models\Surattgs;
use App\Models\Validasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class SurattgsController extends Controller
{
    public function index()
    {
        $surattgss = Surattgs::join('validasis', 'surattgss.validasi_id', '=', 'validasis.id')
        ->select('surattgss.*','validasis.s_validasi as s_validasi')
        ->latest()->paginate(5);
        return view('surattugas.index', compact('surattgss'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $validasis = Validasi::all();
        return view('surattugas.create', compact('validasis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $validasi_id = $request->input('validasi_id');
    $validasi = Validasi::find($validasi_id);

    $input = $request->all();
    $input['validasi_id'] = $validasi_id;

    $request->validate([
        'tgl_surat' => 'required',
        'validasi_id' => 'required',
        'petugas1' => 'required',
        'petugas2' => 'required',
        'petugas3' => 'required',
        'petugas4' => 'required',
        'petugas5' => 'required',
        'tujuan1' => 'required',
        'tujuan2' => 'required',
        'tujuan3' => 'required',
        'tujuan4' => 'required',
        'tujuan5' => 'required',
        'tujuan6' => 'required',
        'tujuan7' => 'required',
    ]);

    Surattgs::create($input);

    return redirect()->route('surattugas')->with('message', 'Surat Tugas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $surattgs = Surattgs::find($id);
        return view('surattugas.show', compact('surattgs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $surattgs = Surattgs::find($id);
        $validasis = Validasi::all();
        return view('surattugas.edit', compact('surattgs', 'validasis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $surattgs = Surattgs::find($id);
        $surattgs->tgl_surat = $request->input('tgl_surat');
        $surattgs->validasi_id = $request->input('validasi_id');
        $surattgs->petugas1 = $request->input('petugas1');
        $surattgs->petugas2 = $request->input('petugas2');
        $surattgs->petugas3 = $request->input('petugas3');
        $surattgs->petugas4 = $request->input('petugas4');
        $surattgs->petugas5 = $request->input('petugas5');
        $surattgs->tujuan1 = $request->input('tujuan1');
        $surattgs->tujuan2 = $request->input('tujuan2');
        $surattgs->tujuan3 = $request->input('tujuan3');
        $surattgs->tujuan4 = $request->input('tujuan4');
        $surattgs->tujuan5 = $request->input('tujuan5');
        $surattgs->tujuan6 = $request->input('tujuan6');
        $surattgs->tujuan7 = $request->input('tujuan7');

        $surattgs->save();

        return redirect()->route('surattugas')->with('message', 'Surat Tugas berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
    Surattgs::find($id)->delete();
    return redirect()->route('surattugas')->with('message', 'Surattgs berhasil dihapus');
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

    public function surattgsexport(){
        return Excel::download(new SurattgsExport,'data_surattugas.xlsx');
    }

    public function surattgsimportexcel(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataSurattgs', $namaFile);

        Excel::import(new SurattgsImport, public_path('/DataSurattgs/'.$namaFile));
        return redirect('surattugas');
    }

    public function cetakSurattgs($id)
    {
        $tanggal = now();
        $tanggalFormatted = $tanggal->format('d') . ' ' . $this->monthIndo($tanggal->format('m')) . ' ' . $tanggal->format('Y');

        $surattgs = Surattgs::find($id);
        $validasis = Validasi::all();

        if ($surattgs->validasi_id == '2') {
            return view('surattugas.cetak', compact('surattgs', 'validasis', 'tanggalFormatted'));
        } else {
            return redirect('surattugas');
        }
    }

    public function searchTglsrttgs(Request $request)
{
    $tgl_surat = $request->input('tgl_surat');
    $surattgss = Surattgs::join('validasis', 'surattgss.validasi_id', '=', 'validasis.id')
    ->select('surattgss.*','validasis.s_validasi as s_validasi')
    ->where('tgl_surat', 'LIKE', "%{$tgl_surat}%")->paginate(5);
    return view('surattugas.index', compact('surattgss'));
}
}
