@extends('layouts.app')

@section('title', 'Edit Jabatan')

@section('content')

<div class="container">
    <a href="{{ route('posisi') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a> 
<div class="row">
<div class="col-md-12">
    <form action="{{route('posisi.update', $posisi->id)}}" method="POST" enctype="multipart/form-data">>
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Nama Posisi</label>
            <input type="text" class="form-control" name="nm_posisi" placeholder="Nama" value="{{$posisi->nm_posisi}}">
        </div>
        @error('nm_posisi')
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