<?php

namespace App\Http\Controllers;

use App\Models\Skala;
use Illuminate\Http\Request;

class SkalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skalas = Skala::paginate(3);
        return view('skalalapor.index', compact('skalas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('skalalapor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'skala' => 'required',
        ]);

        Skala::create($request->all());

        return redirect()->route('skala')->with('message', 'Keterangan skala laporan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $skala = Skala::find($id);
        return view('skala.show', compact('skala'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $skala = Skala::find($id);
        return view('skalalapor.edit', compact('skala'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $skala = Skala::find($id);
        $request->validate([
            'skala' => 'required',
        ]);

        $skala->update($request->all());

        return redirect()->route('skala')->with('message', 'Keterangan Skala Laporan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
    Skala::find($id)->delete();
    return redirect()->route('skala')->with('message', 'Keterangan Skala Laporan berhasil dihapus');
    }
}