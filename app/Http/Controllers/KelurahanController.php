<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelurahans = Kelurahan::paginate(5);
        return view('kelpage.index', compact('kelurahans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelpage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nm_kelurahan' => 'required',
        ]);

        Kelurahan::create($request->all());

        return redirect()->route('kelurahan')->with('message', 'Keterangan Kelurahan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kelurahan = Kelurahan::find($id);
        return view('kelurahan.show', compact('kelurahan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kelurahan = Kelurahan::find($id);
        return view('kelpage.edit', compact('kelurahan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kelurahan = Kelurahan::find($id);
        $request->validate([
            'nm_kelurahan' => 'required',
        ]);

        $kelurahan->update($request->all());

        return redirect()->route('kelurahan')->with('message', 'Keterangan Kelurahan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
    Kelurahan::find($id)->delete();
    return redirect()->route('kelurahan')->with('message', 'Keterangan Kelurahan berhasil dihapus');
    }
}