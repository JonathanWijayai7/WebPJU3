<?php

namespace App\Http\Controllers;

use App\Models\Validasi;
use Illuminate\Http\Request;

class ValidasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $validasis = Validasi::paginate(3);
        return view('s_validasipage.index', compact('validasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('s_validasipage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            's_validasi' => 'required',
        ]);

        Validasi::create($request->all());

        return redirect()->route('validasi')->with('message', 'Keterangan validasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $validasi = Validasi::find($id);
        return view('validasi.show', compact('validasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $validasi = Validasi::find($id);
        return view('s_validasipage.edit', compact('validasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validasi = Validasi::find($id);
        $request->validate([
            's_validasi' => 'required',
        ]);

        $validasi->update($request->all());

        return redirect()->route('validasi')->with('message', 'Keterangan Validasi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
    Validasi::find($id)->delete();
    return redirect()->route('validasi')->with('message', 'Keterangan Validasi berhasil dihapus');
    }
}