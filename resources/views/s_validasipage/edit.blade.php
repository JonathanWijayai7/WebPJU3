@extends('layouts.app')

@section('title', 'Edit Status Validasi')

@section('content')

<div class="container">
    <a href="{{ route('validasi') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a> 
    <br><br>
<div class="row">
<div class="col-md-12">
    <form action="{{route('validasi.update', $validasi->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Status</label>
            <input type="text" class="form-control" name="s_validasi" placeholder="Status" value="{{$validasi->s_validasi}}">
        </div>
        @error('s_validasi')
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