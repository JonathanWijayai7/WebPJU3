@extends('layouts.app')

@section('title', 'Tambah Daftar Material')

@section('content')

<div class="container">
    <a href="{{ route('material') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a> 
    <br><br>
<div class="row">
<div class="col-md-12">
    <form action="{{ route('material.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="no_id_brg">ID Material</label>
            <input type="text" class="form-control" name="no_id_brg" placeholder="Masukkan ID Barang">
        </div>
        @error('no_id_brg')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="tgl_masuk">Tanggal Masuk</label>
            <input type="date" class="form-control" name="tgl_masuk" placeholder="Tanggal Masuk Material">
        </div>
        @error('tgl_masuk')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="nm_brg">Nama Material</label>
            <input type="text" class="form-control" name="nm_brg" placeholder="Masukkan Nama Barang">
        </div>
        @error('nm_brg')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="stk_awal">Jumlah Stok Awal </label>
            <input type="text" class="form-control" name="stk_awal" placeholder="Masukkan jumlah Stok">
        </div>
        @error('stk_awal')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div style="display: none;">
            <div class="form-group">
                <label for="stk_terpakai">Jumlah Stok Terpakai </label>
                <input type="text" class="form-control" name="stk_terpakai" placeholder="Masukkan jumlah Stok yang Terpakai" value="0">
            </div>
            @error('stk_terpakai')
            <small style="color:red">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="satuan">Satuan Unit Barang</label>
            <input type="text" class="form-control" name="satuan" placeholder="Masukkan Jenis Satuan">
        </div>
        @error('satuan')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="hrg_brg">Harga Unit </label>
            <input type="text" class="form-control" name="hrg_brg" placeholder="Masukkan Total Unit">
        </div>
        @error('hrg_brg')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="ket">Keterangan Material</label>
            <textarea name="ket" id="" cols="30" rows="10" class="form-control" placeholder="Keterangan Material">-</textarea>
        </div>
        @error('ket')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="ft_brg">Foto Material</label>
            <input type="file" class="form-control" name="ft_brg">
        </div>
        @error('ft_brg')
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