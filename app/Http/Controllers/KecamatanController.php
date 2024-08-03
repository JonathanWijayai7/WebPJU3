<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kecamatans = Kecamatan::paginate(5);
        return view('kecpage.index', compact('kecamatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kecpage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nm_kecamatan' => 'required',
        ]);

        Kecamatan::create($request->all());

        return redirect()->route('kecamatan')->with('message', 'Keterangan Kecamatan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kecamatan = Kecamatan::find($id);
        return view('kecamatan.show', compact('kecamatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kecamatan = Kecamatan::find($id);
        return view('kecpage.edit', compact('kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kecamatan = Kecamatan::find($id);
        $request->validate([
            'nm_kecamatan' => 'required',
        ]);

        $kecamatan->update($request->all());

        return redirect()->route('kecamatan')->with('message', 'Keterangan Kecamatan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
    Kecamatan::find($id)->delete();
    return redirect()->route('kecamatan')->with('message', 'Keterangan Kecamatan berhasil dihapus');
    }
}