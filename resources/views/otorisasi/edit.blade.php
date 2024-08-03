@extends('layouts.app')

@section('title', 'Edit Autorisasi')

@section('content')

<div class="container">
    <a href="{{ route('otorisasi') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a> 
    <br><br>
<div class="row">
<div class="col-md-12">
    <form action="{{route('otorisasi.update', $user->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="name" placeholder="Nama" value="{{$user->name}}">
        </div>
        @error('name')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Email" value="{{$user->email}}">
        </div>
        @error('email')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Password</label>
            <input type="text" class="form-control" name="password" placeholder="Password" value="{{$user->password}}">
        </div>
        @error('password')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Level</label>
            <input type="text" class="form-control" name="level" placeholder="Level" value="{{$user->level}}">
        </div>
        @error('level')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Foto Profil</label><br>
            <img src="/image/{{$user->ftprofil}}" alt="" class="img-fluid">
            <input type="file" class="form-control" name="ftprofil">
        </div>
        @error('ftprofil')
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