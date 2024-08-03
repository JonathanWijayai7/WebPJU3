@extends('layouts.app')

@section('title', 'Tambah Status Validasi')

@section('content')

<div class="container">
    <a href="{{ route('validasi') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
    <br><br> 
<div class="row">
<div class="col-md-12">
    <form action="{{ route('validasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Status</label>
            <input type="text" class="form-control" name="s_validasi" placeholder="Status">
        </div>
        @error('s_validasi')
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