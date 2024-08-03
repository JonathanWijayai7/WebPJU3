@extends('layouts.app')

@section('title', 'Edit Stok Material')

@section('content')

<div class="container">
    <a href="{{ route('material') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a> 
    <br><br>
<div class="row">
<div class="col-md-12">
    <form action="{{route('material.update', $material->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">ID Barang</label>
            <input type="text" class="form-control" name="no_id_brg" placeholder="ID Barang" value="{{$material->no_id_brg}}">
        </div>
        @error('no_id_brg')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Tanggal Masuk</label>
            <input type="date" class="form-control" name="tgl_masuk" placeholder="Tanggal Masuk" value="{{$material->tgl_masuk}}">
        </div>
        @error('tgl_masuk')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Nama Material</label>
            <input type="text" class="form-control" name="nm_brg" placeholder="Nama" value="{{$material->nm_brg}}">
        </div>
        @error('nm_brg')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Stok Awal</label>
            <input type="text" class="form-control" name="stk_awal" placeholder="Total Unit" value="{{$material->stk_awal}}">
        </div>
        @error('stk_awal')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Stok Terpakai</label>
            <input type="text" class="form-control" name="stk_terpakai" placeholder="Stok Terpakai" value="{{$material->stk_terpakai}}">
        </div>
        @error('stk_terpakai')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Satuan Unit Barang</label>
            <input type="text" class="form-control" name="satuan" placeholder="Satuan Barang" value="{{$material->satuan}}">
        </div>
        @error('satuan')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Harga Unit</label>
            <input type="text" class="form-control" name="hrg_brg" placeholder="Total Unit" value="{{$material->hrg_brg}}">
        </div>
        @error('hrg_brg')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Keterangan Material</label>
            <textarea name="ket" id="" cols="30" rows="10" class="form-control" placeholder="Keterangan">{{$material->ket}}</textarea>
        </div>
        @error('ket')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Foto Material</label><br>
            <img src="/img_brg/{{$material->ft_brg}}" alt="" class="img-fluid">
            <input type="file" class="form-control" name="ft_brg">
        </div>
        @error('ft_brg')
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