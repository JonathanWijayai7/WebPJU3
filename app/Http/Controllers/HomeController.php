<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::join('posisis', 'pegawai.jabatan', '=', 'posisis.id')
        ->select('pegawai.*', 'posisis.nm_posisi as nm_posisi')
        ->get();

        return view('home.index', compact('pegawai'));
    }
    public function about1(){
        return view('home.aboutspj');
    }
    public function about2(){
        return view('home.aboutspj2');
    }
    public function about3(){
        return view('home.aboutupt1');
    }
    public function about4(){
        return view('home.aboutupt2');
    }
    public function about5(){
        return view('home.aboutupt3');
    }

}
 