@extends('layouts.app')

@section('title', 'Tambah Pegawai')

@section('content')

<div class="container">
    <a href="{{ route('dtpegawai') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a> 
<div class="row">
<div class="col-md-12">
    <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="nm_pgw" placeholder="Nama Lengkap Pegawai">
        </div>
        @error('nm_pgw')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <select name="jabatan" id="jabatan" class="form-control">
                @foreach($posisis as $posisi)
                    <option value="{{ $posisi->id }}">{{ $posisi->nm_posisi }}</option>
                @endforeach
            </select>
        </div>
        @error('jabatan')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Tanggal Masuk</label>
            <input type="date" class="form-control" name="tgl_mskpgw" placeholder="Tanggal Masuk">
        </div>
        @error('tgl_mskpgw')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">NIP</label>
            <input type="text" class="form-control" name="nip_pgw" placeholder="NIP Pegawai">
        </div>
        @error('nip_pgw')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Tingakatan</label>
            <input type="text" class="form-control" name="tgkt_pgw" placeholder="Tingkatan Pegawai">
        </div>
        @error('tgkt_pgw')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Foto Pegawai</label>
            <input type="file" class="form-control" name="ftpegawai">
        </div>
        @error('ftpegawai')
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