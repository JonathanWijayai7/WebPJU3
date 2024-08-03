@extends('layouts.app')

@section('title', 'Edit Pegawai')

@section('content')

<div class="container">
    <a href="{{ route('dtpegawai') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a> 
<div class="row">
<div class="col-md-12">
    <form action="{{route('pegawai.update', $pegawai->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="nm_pgw" placeholder="Nama" value="{{$pegawai->nm_pgw}}">
        </div>
        @error('nm_pgw')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="jabatan">Posisi</label>
            <select name="jabatan" id="jabatan" class="form-control">
                @foreach ($posisis as $posisi)
                    <option value="{{ $posisi->id }}" {{ old('jabatan', $pegawai->jabatan) == $posisi->id ? 'selected' : '' }}>{{ $posisi->nm_posisi }}</option>
                @endforeach
            </select>
        </div>
        @error('jabatan')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Tanggal Masuk</label>
            <input type="date" class="form-control" name="tgl_mskpgw" placeholder="tgl_mskpgw" value="{{$pegawai->tgl_mskpgw}}">
        </div>
        @error('tgl_mskpgw')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">NIP Pegawai</label>
            <input type="text" class="form-control" name="nip_pgw" placeholder="nip_pgw" value="{{$pegawai->nip_pgw}}">
        </div>
        @error('nip_pgw')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Golongan Pegawai</label>
            <input type="text" class="form-control" name="tgkt_pgw" placeholder="tgkt_pgw" value="{{$pegawai->tgkt_pgw}}">
        </div>
        @error('tgkt_pgw')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Foto Pegawai</label><br>
            <img src="/image/{{$pegawai->ftpegawai}}" alt="" class="img-fluid">
            <input type="file" class="form-control" name="ftpegawai">
        </div>
        @error('ftpegawai')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Edit Data</button>
        </div>
    </form>
</div>
</div>
</div>

@endsection