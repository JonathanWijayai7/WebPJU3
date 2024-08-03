@extends('layouts.app')

@section('title', 'Edit Status Realisasi')

@section('content')

<div class="container">
    <a href="{{ route('penanganan') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a> 
    <br><br>
<div class="row">
<div class="col-md-12">
    <form action="{{route('penanganan.update', $penanganan->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Status</label>
            <input type="text" class="form-control" name="s_penanganan" placeholder="Status" value="{{$penanganan->s_penanganan}}">
        </div>
        @error('s_penanganan')
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