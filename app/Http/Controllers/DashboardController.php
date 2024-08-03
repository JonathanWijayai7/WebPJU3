<?php

namespace App\Http\Controllers;

use App\Charts\KecPengaduanChart;
use App\Charts\KelPengaduanChart;
use App\Charts\RealisasiPengaduanChart;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KecPengaduanChart $kecPengaduanChart, KelPengaduanChart $kelPengaduanChart, RealisasiPengaduanChart $realisasiPengaduanChart)
    {

        return view('admin.dashboard', [
            'kecPengaduanChart' => $kecPengaduanChart->build(),
            'kelPengaduanChart' => $kelPengaduanChart->build(),
            'realisasiPengaduanChart' => $realisasiPengaduanChart->build(),
        ]);
    }

    public function autorisasi()
    {
        return view('otorisasi.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
