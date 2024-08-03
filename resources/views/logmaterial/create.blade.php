@extends('layouts.app')

@section('title', 'Tambah Pengajuan Penggunaan Material')

@section('content')

<div class="container">
    <a href="{{ route('logmaterials') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a> 
<div class="row">
<div class="col-md-12">
    <form action="{{ route('logmaterials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
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
            <label for="">Tanggal Pemakaian</label>
            <input type="date" class="form-control" name="tgl_pakai" placeholder="Tanggal Pemakaian">
        </div>
        @error('tgl_pakai')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="barang_id">Nama Material</label>
            <select name="barang_id" id="barang_id" class="form-control">
                @foreach($materials as $material)
                <option value="{{ $material->id }}">{{ $material->nm_brg }}</option>
                @endforeach
            </select>
        </div>
        @error('barang_id')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Jumlah Unit Terpakai</label>
            <input type="text" class="form-control" name="unit_pakai" placeholder="Jumlah Unit yang terpakai">
        </div>
        @error('unit_pakai')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Satuan</label>
            <input type="text" class="form-control" name="stn_pakai" placeholder="Masukkan Jenis Satuan">
        </div>
        @error('stn_pakai')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Lokasi Pakai</label>
            <textarea name="lokasi_pakai" id="" cols="30" rows="10" class="form-control" placeholder="Lokasi Pakai"></textarea>
        </div>
        @error('lokasi_pakai')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Keterangan</label>
            <textarea name="keterangan" cols="30" rows="10" class="form-control" placeholder="Keterangan"></textarea>
        </div>
        @error('keterangan')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="wkl_pgwlog">Perwakilan Petugas</label>
            <select name="wkl_pgwlog" id="wkl_pgwlog" class="form-control">
                @foreach($pegawais as $pegawai)
                <option value="{{ $pegawai->id }}">{{ $pegawai->nm_pgw }}</option>
                @endforeach
            </select>
        </div>
        @error('wkl_pgwlog')
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