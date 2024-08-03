<?php

namespace App\Http\Controllers;

use App\Models\Posisi;
use Illuminate\Http\Request;

class PosisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posisis = Posisi::paginate(3);
        return view('posisipage.index', compact('posisis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posisipage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nm_posisi' => 'required',
        ]);

        Posisi::create($request->all());

        return redirect()->route('posisi')->with('message', 'Data posisi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $posisi = Posisi::find($id);
        return view('posisi.show', compact('posisi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $posisi = Posisi::find($id);
        return view('posisipage.edit', compact('posisi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $posisi = Posisi::find($id);
        $request->validate([
            'nm_posisi' => 'required',
        ]);

        $posisi->update($request->all());

        return redirect()->route('posisi')->with('message', 'Data posisi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
    Posisi::find($id)->delete();
    return redirect()->route('posisi')->with('message', 'Data posisi berhasil dihapus');
    }
}