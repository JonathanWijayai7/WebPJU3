@extends('layouts.app')

@section('title', 'Tambah Data Kecamatan')

@section('content')

<div class="container">
    <a href="{{ route('kecamatan') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a> 
    <br><br>
<div class="row">
<div class="col-md-12">
    <form action="{{ route('kecamatan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Nama Kecamatan</label>
            <input type="text" class="form-control" name="nm_kecamatan" placeholder="Kecamatan">
        </div>
        @error('kecamatan')
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