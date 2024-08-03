@extends('layouts.app')

@section('title', 'Tambah Surat Tugas')

@section('content')

<div class="container">
    <a href="{{ route('surattugas') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a> 
<div class="row">
<div class="col-md-12">
    <form action="{{ route('surattugas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Tanggal Surat</label>
            <input type="date" class="form-control" name="tgl_surat" placeholder="Tanggal Pengaduan">
        </div>
        @error('tgl_surat')
        <small style="color:red">{{ $message }}</small>
        @enderror
        @if(auth()->user()->level=="tatausaha")
        <div style="display: none;">
        <div class="form-group" >
            <label for="validasi_id">Validasi Kepala UPT</label>
            <select name="validasi_id" id="validasi_id" class="form-control">
                @foreach($validasis as $validasi)
                <option value="{{ $validasi->id }}">{{ $validasi->s_validasi }}</option>
                @endforeach
            </select>
        </div>
    </div>
    @endif
        @if(auth()->user()->level=="kepala")
        <div class="form-group" >
            <label for="validasi_id">Validasi Kepala UPT</label>
            <select name="validasi_id" id="validasi_id" class="form-control">
                @foreach($validasis as $validasi)
                <option value="{{ $validasi->id }}">{{ $validasi->s_validasi }}</option>
                @endforeach
            </select>
        </div>
    @endif
        <div class="form-group">
            <label for="">Petugas 1</label>
            <input type="text" class="form-control" name="petugas1" placeholder="Masukkan Nama Petugas">
        </div>
        @error('petugas1')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Petugas 2</label>
            <input type="text" class="form-control" name="petugas2" placeholder="Masukkan Nama Petugas">
        </div>
        @error('petugas2')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Petugas 3</label>
            <input type="text" class="form-control" name="petugas3" placeholder="Masukkan Nama Petugas">
        </div>
        @error('petugas3')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Petugas 4</label>
            <input type="text" class="form-control" name="petugas4" placeholder="Masukkan Nama Petugas">
        </div>
        @error('petugas4')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Petugas 5</label>
            <input type="text" class="form-control" name="petugas5" placeholder="Masukkan Nama Petugas">
        </div>
        @error('petugas5')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Lokasi 1</label>
            <textarea name="tujuan1" cols="30" rows="10" class="form-control" placeholder="Masukkan Lokasi"></textarea>
        </div>
        @error('tujuan1')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Lokasi 2</label>
            <textarea name="tujuan2" cols="30" rows="10" class="form-control" placeholder="Masukkan Lokasi"></textarea>
        </div>
        @error('tujuan2')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Lokasi 3</label>
            <textarea name="tujuan3" cols="30" rows="10" class="form-control" placeholder="Masukkan Lokasi"></textarea>
        </div>
        @error('tujuan3')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Lokasi 4</label>
            <textarea name="tujuan4" cols="30" rows="10" class="form-control" placeholder="Masukkan Lokasi"></textarea>
        </div>
        @error('lokasi4')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Lokasi 5</label>
            <textarea name="tujuan5" cols="30" rows="10" class="form-control" placeholder="Masukkan Lokasi"></textarea>
        </div>
        @error('tujuan5')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Lokasi 6</label>
            <textarea name="tujuan6" cols="30" rows="10" class="form-control" placeholder="Masukkan Lokasi"></textarea>
        </div>
        @error('tujuan6')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Lokasi 7</label>
            <textarea name="tujuan7" cols="30" rows="10" class="form-control" placeholder="Masukkan Lokasi"></textarea>
        </div>
        @error('tujuan7')
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