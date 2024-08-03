<?php

namespace App\Http\Controllers;

use App\Exports\MaterialExport;
use App\Imports\MaterialImport;
use App\Models\Material;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::latest()->paginate(10);

        $totalMaterialAwal = $materials->sum(function ($material) {
            return $material->stk_awal * $material->hrg_brg;
        });

        $totalMaterialTerpakai = $materials->sum(function ($material) {
            return $material->stk_terpakai * $material->hrg_brg;
        });

        $totalMaterialSisa = $materials->sum(function ($material) {
            return ($material->stk_awal * $material->hrg_brg) - ($material->stk_terpakai * $material->hrg_brg);
        });


        return view('material.index', compact('materials', 'totalMaterialAwal', 'totalMaterialTerpakai', 'totalMaterialSisa'));
    }

    public function create()
    {
        return view('material.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_id_brg' => 'required',
            'tgl_masuk' => 'required',
            'nm_brg' => 'required',
            'stk_awal' => 'required',
            'stk_terpakai' => 'required',
            'satuan' => 'required',
            'hrg_brg' => 'required',
            'ket' => 'required',
            'ft_brg' => 'required|image',
        ]);
        
        // Validate and store the user data
        $material = new Material();
        $material->no_id_brg = $request->input('no_id_brg');
        $material->tgl_masuk = $request->input('tgl_masuk');
        $material->nm_brg = $request->input('nm_brg');
        $material->stk_awal = $request->input('stk_awal');
        $material->stk_terpakai = $request->input('stk_terpakai');
        $material->satuan = $request->input('satuan');
        $material->hrg_brg = $request->input('hrg_brg');
        $material->ket = $request->input('ket');
        

        if ($request->hasFile('ft_brg')) {
            $image = $request->file('ft_brg');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img_brg'), $imageName);
            $material->ft_brg = $imageName;
        }
        
        $material->save();
    
        return redirect()->route('material')->with('message', 'Data berhasil ditambahkan');
    }

    public function edit(Material $material, $id)
    {
        $material = Material::find($id);
        return view('material.edit', compact('material'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the user data
        $material = Material::find($id);
        $material->no_id_brg = $request->input('no_id_brg');
        $material->tgl_masuk = $request->input('tgl_masuk');
        $material->nm_brg = $request->input('nm_brg');
        $material->stk_awal = $request->input('stk_awal');
        $material->stk_terpakai = $request->input('stk_terpakai');
        $material->satuan = $request->input('satuan');
        $material->hrg_brg = $request->input('hrg_brg');
        $material->ket = $request->input('ket');

        if ($request->hasFile('ft_brg')) {
            // Unlink the previous file
            if (file_exists(public_path('img_brg/' . $material->ft_brg))) {
                unlink(public_path('img_brg/' . $material->ft_brg));
            }
    
            $file = $request->file('ft_brg');
            $filename = date('Ymd'). '-' .time(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img_brg'), $filename);
            $material->ft_brg = $filename;
        }
        $material->save();
        return redirect()->route('material');
    }

    public function destroy(Material $material, $id)
    {
        $materials = Material::where('materials.id', $id)->first();
        if (file_exists(public_path('img_brg/' . $materials->ft_brg))) {
            unlink(public_path('img_brg/' . $materials->ft_brg));
        }
        $materials->delete();
        return redirect()->route('material');
    }

    public function cetakMaterial()
    {
        $tanggal = now();
        $tanggalFormatted = $tanggal->format('d') . ' ' . $this->monthIndo($tanggal->format('m')) . ' ' . $tanggal->format('Y');

        $materials = Material::all();

        $totalMaterialAwal = $materials->sum(function ($material) {
            return $material->stk_awal * $material->hrg_brg;
        });

        $totalMaterialTerpakai = $materials->sum(function ($material) {
            return $material->stk_terpakai * $material->hrg_brg;
        });

        $totalMaterialSisa = $materials->sum(function ($material) {
            return ($material->stk_awal * $material->hrg_brg) - ($material->stk_terpakai * $material->hrg_brg);
        });

        return view('material.cetak', compact('materials', 'tanggalFormatted', 'totalMaterialAwal', 'totalMaterialTerpakai', 'totalMaterialSisa'));
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

    public function materialexport(){
        return Excel::download(new MaterialExport,'material.xlsx');
    }

    public function materialimportexcel(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataMaterial', $namaFile);

        Excel::import(new MaterialImport, public_path('/DataMaterial/'.$namaFile));
        return redirect('material');
    }

    public function cetakPertanggal()
    {
        return view('material.cetak-pertanggal');
    }

    public function cetakMaterialPertanggal($tglawal, $tglakhir)
    {
        $tanggal = now();
        $tanggalFormatted = $tanggal->format('d') . ' ' . $this->monthIndo($tanggal->format('m')) . ' ' . $tanggal->format('Y');

        $cetakPertanggal = Material::whereBetween('tgl_masuk',[$tglawal,$tglakhir])->get();

        $tglawalFormatted = \Carbon\Carbon::parse($tglawal)->format('d M Y', 'id_ID');
        $tglakhirFormatted = \Carbon\Carbon::parse($tglakhir)->format('d M Y', 'id_ID');

        return view('material.cetak-material-pertanggal', compact('cetakPertanggal', 'tglawalFormatted', 'tglakhirFormatted', 'tanggalFormatted'));
    }

    public function searchnmbrg(Request $request)
    {
    $nm_brg = $request->input('nm_brg');
    $materials = Material::where('nm_brg', 'LIKE', "%{$nm_brg}%")->paginate(10);

    $totalMaterialAwal = $materials->sum(function ($material) {
        return $material->stk_awal * $material->hrg_brg;
    });

    $totalMaterialTerpakai = $materials->sum(function ($material) {
        return $material->stk_terpakai * $material->hrg_brg;
    });

    $totalMaterialSisa = $materials->sum(function ($material) {
        return ($material->stk_awal * $material->hrg_brg) - ($material->stk_terpakai * $material->hrg_brg);
    });

    return view('material.index', compact('materials', 'totalMaterialAwal', 'totalMaterialTerpakai', 'totalMaterialSisa'));
    }
}
