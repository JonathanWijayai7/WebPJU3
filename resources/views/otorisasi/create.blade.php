@extends('layouts.app')

@section('title', 'Tambah Autorisasi')

@section('content')

<div class="container">
    <a href="{{ route('otorisasi') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a> 
    <br><br>
<div class="row">
<div class="col-md-12">
    <form action="{{ route('otorisasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="name" placeholder="Nama">
        </div>
        @error('name')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Email">
        </div>
        @error('email')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Password</label>
            <input type="text" class="form-control" name="password" placeholder="Password">
        </div>
        @error('password')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Level</label>
            <input type="text" class="form-control" name="level" placeholder="Level">
        </div>
        @error('level')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Foto Profil</label>
            <input type="file" class="form-control" name="ftprofil">
        </div>
        @error('ftprofil')
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