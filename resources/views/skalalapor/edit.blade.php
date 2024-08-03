@extends('layouts.app')

@section('title', 'Edit Skala Pengaduan')

@section('content')

<div class="container">
    <a href="{{ route('skala') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a> 
    <br><br>
<div class="row">
<div class="col-md-12">
    <form action="{{route('skalalapor.update', $skala->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Kategori Skala</label>
            <input type="text" class="form-control" name="skala" placeholder="Skala" value="{{$skala->skala}}">
        </div>
        @error('skala')
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