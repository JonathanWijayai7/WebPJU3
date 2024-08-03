@extends('layouts.app')

@section('title', 'Tambah Laporan Perbaikan & Penggunaan Material')

@section('content')

<div class="container">
    <a href="{{ route('perbaikans') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a> 
<div class="row">
<div class="col-md-12">
    <form action="{{ route('perbaikans.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Hari / Tanggal </label>
            <input type="date" class="form-control" name="tgl_lpprbk" placeholder="Tanggal Pemakaian">
        </div>
        @error('tgl_lpprbk')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Nama Pelapor</label>
            <input type="text" class="form-control" name="nm_pelapor" placeholder="Masukkan Nama Pelapor">
        </div>
        @error('nm_pelapor')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Pengaduan</label>
            <input type="text" class="form-control" name="laporan" placeholder="Masukkan Pengaduan">
        </div>
        @error('laporan')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Lokasi</label>
            <textarea name="lks_laporan" cols="30" rows="10" class="form-control" placeholder="Masukkan Lokasi"></textarea>
        </div>
        @error('lks_laporan')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Daftar Material</label>
            <textarea name="dftr_mtrl" cols="30" rows="10" class="form-control" placeholder="Masukkan Daftar Material yang Terpakai"></textarea>
        </div>
        @error('dftr_mtrl')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Daftar Pemakaian</label>
            <textarea name="dftr_unitmtrl" cols="30" rows="10" class="form-control" placeholder="Masukkan Jumlah setiap Material yang Terpakai"></textarea>
        </div>
        @error('dftr_unitmtrl')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="penanganan_id">Realisasi</label>
            <select name="penanganan_id" id="penanganan_id" class="form-control">
                @foreach($penanganans as $penanganan)
                <option value="{{ $penanganan->id }}">{{ $penanganan->s_penanganan }}</option>
                @endforeach
            </select>
        </div>
        @error('penanganan_id')
        <small style="color:red">{{ $message }}</small>
        @enderror
        @if(auth()->user()->level=="tatausaha")
        <div style="display: none;">
        <div class="form-group" >
            <label for="validasi_id">Validasi Kepala UPT</label>
            <select name="validasi_id" id="validasi_id" class="form-control">
                @foreach($validasis as $validasi)
                <option value="{{ $validasi->id }}">{{ $validasi->s_validasi }}</option>
                @endforeach
            </select>
        </div>
    </div>
    @endif
        @if(auth()->user()->level=="kepala")
        <div class="form-group" >
            <label for="validasi_id">Validasi Kepala UPT</label>
            <select name="validasi_id" id="validasi_id" class="form-control">
                @foreach($validasis as $validasi)
                <option value="{{ $validasi->id }}">{{ $validasi->s_validasi }}</option>
                @endforeach
            </select>
        </div>
    @endif
        <div class="form-group">
            <label for="">Keterangan Pengadaan</label>
            <textarea name="ket_pengadaan" cols="30" rows="10" class="form-control" placeholder="Masukkan setiap keterangan pengadaan material yang digunakan"></textarea>
        </div>
        @error('ket_pengadaan')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Tambah Data</button>
        </div>
    </form>
</div>
</div>
</div>

@endsection