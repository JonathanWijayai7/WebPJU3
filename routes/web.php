<?php

use App\Http\Controllers\AutorisasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormmskController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogmaterialController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PenangananController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PerbaikanController;
use App\Http\Controllers\PosisiController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\SkalaController;
use App\Http\Controllers\SurattgsController;
use App\Http\Controllers\ValidasiController;
use App\Http\Middleware\CekLevel;
use App\Models\Pegawai;
use App\Models\Surattgs;
use App\Models\Validasi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Home
Route::get('/', [HomeController::class, 'index']);

Route::get('formmasuk', [FormmskController::class, 'create'])->name('formmasuk.create');
Route::post('formmasuk/store', [FormmskController::class, 'store'])->name('formmasuk.store');

Route::get('riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');
Route::get('riwayat/sort-pengaduan-darurat', [RiwayatController::class,'sortDarurat'])->name('riwayat.sort.pengaduan.darurat');
Route::get('riwayat/sort-pengaduan-penting', [RiwayatController::class,'sortPenting'])->name('riwayat.sort.pengaduan.penting');
Route::get('riwayat/sort-pengaduan-dptditunda', [RiwayatController::class,'sortDptditunda'])->name('riwayat.sort.pengaduan.dptditunda');
Route::get('riwayat/sort-pengaduan-diterima', [RiwayatController::class,'sortDiterima'])->name('riwayat.sort.pengaduan.diterima');
Route::get('riwayat/sort-pengaduan-diperbaiki', [RiwayatController::class,'sortDiperbaiki'])->name('riwayat.sort.pengaduan.diperbaiki');
Route::get('riwayat/sort-pengaduan-terselesaikan', [RiwayatController::class,'sortTerselesaikan'])->name('riwayat.sort.pengaduan.terselesaikan');
Route::get('riwayat/sort-pengaduan-tertunda', [RiwayatController::class,'sortTertunda'])->name('riwayat.sort.pengaduan.tertunda');

Route::get('/adminmasuk', function () {
    return view('auth.login');
})->name('login');

Route::post('/postlogin', [LoginController::class,'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');

Route::group(['middleware' =>['auth','cekLevel:tatausaha,kepala']], function(){
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/dtpegawai', [PegawaiController::class,'index'])->name('dtpegawai');
    Route::get('pegawai/{id}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::put('pegawai/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');
    Route::get('/cetakpegawai', [PegawaiController::class,'cetakPegawai'])->name('pegawai.cetak');
    Route::get('/cetakpegawai/tanggal', [PegawaiController::class,'cetakPertanggal'])->name('pegawai.cetak.tanggal');
    Route::get('/cetakpegawai/pertanggal/{tglawal}/{tglakhir}', [PegawaiController::class,'cetakPegawaiPertanggal'])->name('cetak.pertanggal');
    Route::get('dtpegawai/search', [PegawaiController::class,'searchNama'])->name('searchNama');
    Route::get('/pengaduan', [PengaduanController::class,'index'])->name('pengaduan');
    Route::get('pengaduan/search', [PengaduanController::class,'searchTgllpr'])->name('searchTgllpr');
    Route::get('pengaduan/{id}/edit', [PengaduanController::class, 'edit'])->name('pengaduan.edit');
    Route::put('pengaduan/{id}', [PengaduanController::class, 'update'])->name('pengaduan.update');
    Route::get('/cetakpengaduan', [PengaduanController::class,'cetakPengaduan'])->name('pengaduan.cetak');
    Route::get('/cetakpengaduan/tanggal', [PengaduanController::class,'cetakPertanggal'])->name('pengaduan.cetak.tanggal');
    Route::get('/cetakpengaduan/pertanggal/{tglawal}/{tglakhir}', [PengaduanController::class,'cetakPengaduanPertanggal'])->name('cetak.pertanggal');
    Route::get('/surattugas', [SurattgsController::class,'index'])->name('surattugas');
    Route::get('surattugas/{id}/edit', [SurattgsController::class, 'edit'])->name('surattugas.edit');
    Route::put('surattugas/{id}', [SurattgsController::class, 'update'])->name('surattugas.update');
    Route::get('surattugas/search', [SurattgsController::class,'searchTglsrttgs'])->name('searchTglsrttgs');
    Route::get('/cetaksurattugas/{id}', [SurattgsController::class,'cetakSurattgs'])->name('surattugas.cetak');
    Route::get('/logmaterials', [LogmaterialController::class,'index'])->name('logmaterials');
    Route::get('logmaterials/{id}/edit', [LogmaterialController::class, 'edit'])->name('logmaterials.edit');
    Route::put('logmaterials/{id}', [LogmaterialController::class, 'update'])->name('logmaterials.update');
    Route::get('logmaterials/search', [LogmaterialController::class, 'searchTgllog'])->name('searchTgllog');
    Route::get('/cetaklogmaterial/tanggal', [LogmaterialController::class,'cetakPertanggal'])->name('logmaterials.cetak.tanggal');
    Route::get('/cetaklogmaterial/pertanggal/{tglawal}/{tglakhir}', [LogmaterialController::class,'cetakLogmaterialPertanggal'])->name('cetak.pertanggal');
    Route::get('/material', [MaterialController::class,'index'])->name('material');
    Route::get('material/{id}/edit', [MaterialController::class, 'edit'])->name('material.edit');
    Route::put('material/{id}', [MaterialController::class, 'update'])->name('material.update');
    Route::get('material/search', [MaterialController::class,'searchnmbrg'])->name('searchnmbrg');
    Route::get('/cetakmaterial', [MaterialController::class,'cetakMaterial'])->name('material.cetak');
    Route::get('/perbaikans', [PerbaikanController::class,'index'])->name('perbaikans');
    Route::get('perbaikans/{id}/edit', [PerbaikanController::class, 'edit'])->name('perbaikans.edit');
    Route::put('perbaikans/{id}', [PerbaikanController::class, 'update'])->name('perbaikans.update');
    Route::get('perbaikans/search', [PerbaikanController::class,'searchTglprbk'])->name('searchTglprbk');
    Route::get('/cetakperbaikan/tanggal', [PerbaikanController::class,'cetakPertanggal'])->name('perbaikans.cetak.tanggal');
    Route::get('/cetakperbaikan/pertanggal/{tglawal}/{tglakhir}', [PerbaikanController::class,'cetakPerbaikanPertanggal'])->name('cetak.pertanggal');
});

Route::group(['middleware' =>['auth','cekLevel:tatausaha']], function(){
    Route::get('dtpegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
    Route::post('dtpegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');
    Route::delete('pegawai/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');
    Route::post('/importpegawai', [PegawaiController::class,'pegawaiimportexcel'])->name('importpegawai');
    Route::get('/exportpegawai', [PegawaiController::class,'pegawaiexport'])->name('exportpegawai');
    Route::get('/posisi', [PosisiController::class,'index'])->name('posisi');
    Route::get('posisi/create', [PosisiController::class, 'create'])->name('posisi.create');
    Route::post('posisi/store', [PosisiController::class, 'store'])->name('posisi.store');
    Route::get('posisi/{id}/edit', [PosisiController::class, 'edit'])->name('posisi.edit');
    Route::put('posisi/{id}', [PosisiController::class, 'update'])->name('posisi.update');
    Route::delete('posisi/{id}', [PosisiController::class, 'destroy'])->name('posisi.destroy');
    Route::get('/validasi', [ValidasiController::class,'index'])->name('validasi');
    Route::get('validasi/create', [ValidasiController::class, 'create'])->name('validasi.create');
    Route::post('validasi/store', [ValidasiController::class, 'store'])->name('validasi.store');
    Route::get('validasi/{id}/edit', [ValidasiController::class, 'edit'])->name('validasi.edit');
    Route::put('validasi/{id}', [ValidasiController::class, 'update'])->name('validasi.update');
    Route::delete('validasi/{id}', [ValidasiController::class, 'destroy'])->name('validasi.destroy');
    Route::get('/penanganan', [PenangananController::class,'index'])->name('penanganan');
    Route::get('penanganan/create', [PenangananController::class, 'create'])->name('penanganan.create');
    Route::post('penanganan/store', [PenangananController::class, 'store'])->name('penanganan.store');
    Route::get('penanganan/{id}/edit', [PenangananController::class, 'edit'])->name('penanganan.edit');
    Route::put('penanganan/{id}', [PenangananController::class, 'update'])->name('penanganan.update');
    Route::delete('penanganan/{id}', [PenangananController::class, 'destroy'])->name('penanganan.destroy');
    Route::get('/skala', [SkalaController::class,'index'])->name('skala');
    Route::get('skalalapor/create', [SkalaController::class, 'create'])->name('skalalapor.create');
    Route::post('skalalapor/store', [SkalaController::class, 'store'])->name('skalalapor.store');
    Route::get('skalalapor/{id}/edit', [SkalaController::class, 'edit'])->name('skalalapor.edit');
    Route::put('skalalapor/{id}', [SkalaController::class, 'update'])->name('skalalapor.update');
    Route::delete('skalalapor/{id}', [SkalaController::class, 'destroy'])->name('skalalapor.destroy');
    Route::get('/kecamatan', [KecamatanController::class,'index'])->name('kecamatan');
    Route::get('kecamatan/create', [KecamatanController::class, 'create'])->name('kecamatan.create');
    Route::post('kecamatan/store', [KecamatanController::class, 'store'])->name('kecamatan.store');
    Route::get('kecamatan/{id}/edit', [KecamatanController::class, 'edit'])->name('kecamatan.edit');
    Route::put('kecamatan/{id}', [KecamatanController::class, 'update'])->name('kecamatan.update');
    Route::delete('kecamatan/{id}', [KecamatanController::class, 'destroy'])->name('kecamatan.destroy');
    Route::get('/kelurahan', [KelurahanController::class,'index'])->name('kelurahan');
    Route::get('kelurahan/create', [KelurahanController::class, 'create'])->name('kelurahan.create');
    Route::post('kelurahan/store', [KelurahanController::class, 'store'])->name('kelurahan.store');
    Route::get('kelurahan/{id}/edit', [KelurahanController::class, 'edit'])->name('kelurahan.edit');
    Route::put('kelurahan/{id}', [KelurahanController::class, 'update'])->name('kelurahan.update');
    Route::delete('kelurahan/{id}', [KelurahanController::class, 'destroy'])->name('kelurahan.destroy');
    Route::get('pengaduan/create', [PengaduanController::class, 'create'])->name('pengaduan.create');
    Route::post('pengaduan/store', [PengaduanController::class, 'store'])->name('pengaduan.store');
    Route::delete('pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy');
    Route::post('/importpengaduan', [PengaduanController::class,'pengaduanimportexcel'])->name('importpengaduan');
    Route::get('/exportpengaduan', [PengaduanController::class,'pengaduanexport'])->name('exportpengaduan');
    Route::get('/autorisasi', [AutorisasiController::class,'index'])->name('otorisasi');
    Route::get('autorisasi/create', [AutorisasiController::class, 'create'])->name('otorisasi.create');
    Route::post('autorisasi/store', [AutorisasiController::class, 'store'])->name('otorisasi.store');
    Route::get('autorisasi/{id}/edit', [AutorisasiController::class, 'edit'])->name('otorisasi.edit');
    Route::put('autorisasi/{id}', [AutorisasiController::class, 'update'])->name('otorisasi.update');
    Route::delete('autorisasi/{id}', [AutorisasiController::class, 'destroy'])->name('otorisasi.destroy');
    Route::get('material/create', [MaterialController::class, 'create'])->name('material.create');
    Route::post('material/store', [MaterialController::class, 'store'])->name('material.store');
    Route::delete('material/{id}', [MaterialController::class, 'destroy'])->name('material.destroy');
    Route::post('/importmaterial', [MaterialController::class,'materialimportexcel'])->name('importmaterial');
    Route::get('/exportmaterial', [MaterialController::class,'materialexport'])->name('exportmaterial');
    Route::get('/cetakmaterial/tanggal', [MaterialController::class,'cetakPertanggal'])->name('material.cetak.tanggal');
    Route::get('/cetakmaterial/pertanggal/{tglawal}/{tglakhir}', [MaterialController::class,'cetakMaterialPertanggal'])->name('cetak.pertanggal');
    Route::get('surattugas/create', [SurattgsController::class, 'create'])->name('surattugas.create');
    Route::post('surattugas/store', [SurattgsController::class, 'store'])->name('surattugas.store');
    Route::delete('surattugas/{id}', [SurattgsController::class, 'destroy'])->name('surattugas.destroy');
    Route::post('/importsurattugas', [SurattgsController::class,'surattgsimportexcel'])->name('importsurattgs');
    Route::get('/exportsurattugas', [SurattgsController::class,'surattgsexport'])->name('exportsurattgs');
    Route::get('logmaterials/create', [LogmaterialController::class, 'create'])->name('logmaterials.create');
    Route::post('logmaterials/store', [LogmaterialController::class, 'store'])->name('logmaterials.store');
    Route::delete('logmaterials/{id}', [LogmaterialController::class, 'destroy'])->name('logmaterials.destroy');
    Route::post('/importlogmaterials', [LogmaterialController::class,'logmaterialimportexcel'])->name('importlogmaterials');
    Route::get('/exportlogmaterials', [LogmaterialController::class,'logmaterialexport'])->name('exportlogmaterials');
    Route::get('perbaikans/create', [PerbaikanController::class, 'create'])->name('perbaikans.create');
    Route::post('perbaikans/store', [PerbaikanController::class, 'store'])->name('perbaikans.store');
    Route::delete('perbaikans/{id}', [PerbaikanController::class, 'destroy'])->name('perbaikans.destroy');
    Route::post('/importperbaikans', [PerbaikanController::class,'perbaikanimportexcel'])->name('importperbaikans');
    Route::get('/exportperbaikans', [PerbaikanController::class,'perbaikanexport'])->name('exportperbaikans');
});

Route::group(['middleware' =>['auth','cekLevel:kepala']], function(){
   
});