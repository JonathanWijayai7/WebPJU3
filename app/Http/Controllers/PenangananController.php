<?php

namespace App\Http\Controllers;

use App\Models\Penanganan;
use Illuminate\Http\Request;

class PenangananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penanganans = Penanganan::paginate(3);
        return view('s_penanganan.index', compact('penanganans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('s_penanganan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            's_penanganan' => 'required',
        ]);

        Penanganan::create($request->all());

        return redirect()->route('penanganan')->with('message', 'Keterangan Penanganan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $penanganan = Penanganan::find($id);
        return view('penanganan.show', compact('penanganan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $penanganan = Penanganan::find($id);
        return view('s_penanganan.edit', compact('penanganan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $penanganan = Penanganan::find($id);
        $request->validate([
            's_penanganan' => 'required',
        ]);

        $penanganan->update($request->all());

        return redirect()->route('penanganan')->with('message', 'Keterangan Penanganan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
    Penanganan::find($id)->delete();
    return redirect()->route('penanganan')->with('message', 'Keterangan Penanganan berhasil dihapus');
    }
}