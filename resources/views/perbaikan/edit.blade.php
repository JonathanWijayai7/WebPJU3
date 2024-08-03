@extends('layouts.app')

@section('title', 'Edit Laporan Perbaikan & Penggunaan Material')
@section('content')

<div class="container">
    <a href="{{ route('perbaikans') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a> 
<div class="row">
<div class="col-md-12">
    <form action="{{route('perbaikans.update', $perbaikan->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if(auth()->user()->level=="tatausaha")
        <div class="form-group">
            <label for="">Hari/Tanggal</label>
            <input type="date" class="form-control" name="tgl_lpprbk" placeholder="Hari/Tanggal" value="{{$perbaikan->tgl_lpprbk}}">
        </div>
        @error('tgl_lpprbk')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Nama Pelapor</label>
            <input type="text" class="form-control" name="nm_pelapor" placeholder="Nama Pelapor" value="{{$perbaikan->nm_pelapor}}">
        </div>
        @error('nm_pelapor')
        <small style="color:red">{{ $message }}</small>
        @enderror
    <div class="form-group">
        <label for="">Pengaduan</label>
        <input type="text" class="form-control" name="laporan" placeholder="Pengaduan" value="{{$perbaikan->laporan}}">
    </div>
    @error('laporan')
    <small style="color:red">{{ $message }}</small>
    @enderror
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
    <div class="form-group">
        <label for="">Lokasi</label>
        <textarea name="lks_laporan" id="" cols="30" rows="10" class="form-control" placeholder="Lokasi">{{$perbaikan->lks_laporan}}</textarea>
    </div>
    @error('lks_laporan')
    <small style="color:red">{{ $message }}</small>
    @enderror
    <div class="form-group">
        <label for="">Daftar Material Yang Digunakan</label>
        <textarea name="dftr_mtrl" id="" cols="30" rows="10" class="form-control" placeholder="Daftar Material">{{$perbaikan->dftr_mtrl}}</textarea>
    </div>
    @error('dftr_mtrl')
    <small style="color:red">{{ $message }}</small>
    @enderror
    <div class="form-group">
        <label for="">Daftar Jumlah Material Yang Dipakai</label>
        <textarea name="dftr_unitmtrl" id="" cols="30" rows="10" class="form-control" placeholder="Daftar Jumlah Material">{{$perbaikan->dftr_unitmtrl}}</textarea>
    </div>
    @error('dftr_unitmtrl')
    <small style="color:red">{{ $message }}</small>
    @enderror
    <div class="form-group">
        <label for="penanganan_id">Realisasi</label>
        <select name="penanganan_id" id="penanganan_id" class="form-control">
            @foreach($penanganans as $penanganan)
                <option value="{{ $penanganan->id }}" {{ old('penanganan_id', $perbaikan->penanganan_id) == $penanganan->id ? 'selected' : '' }}>{{ $penanganan->s_penanganan }}</option>
            @endforeach
        </select>
    </div>
    @error('penanganan_id')
    <small style="color:red">{{ $message }}</small>
    @enderror
    <div class="form-group">
        <label for="">Keterangan Pengadaan</label>
        <textarea name="ket_pengadaan" id="" cols="30" rows="10" class="form-control" placeholder="Lokasi">{{$perbaikan->ket_pengadaan}}</textarea>
    </div>
    @error('ket_pengadaan')
    <small style="color:red">{{ $message }}</small>
    @enderror
    @endif





        @if(auth()->user()->level=="kepala")
        <div class="form-group" >
            <label for="validasi_id">Validasi Kepala UPT</label>
            <select name="validasi_id" id="validasi_id" class="form-control">
                @foreach($validasis as $validasi)
                <option value="{{ $validasi->id }}"{{ old('validasi_id', $validasi->s_validasi) == $validasi->id ? 'selected' : '' }}>{{ $validasi->s_validasi }}</option>
                @endforeach
            </select>
        </div>
        <div style="display: none;">
            <div class="form-group">
                <label for="">Hari/Tanggal</label>
                <input type="date" class="form-control" name="tgl_lpprbk" placeholder="Hari/Tanggal" value="{{$perbaikan->tgl_lpprbk}}">
            </div>
            @error('tgl_lpprbk')
            <small style="color:red">{{ $message }}</small>
            @enderror
            <div class="form-group">
                <label for="">Nama Pelapor</label>
                <input type="text" class="form-control" name="nm_pelapor" placeholder="Nama Pelapor" value="{{$perbaikan->nm_pelapor}}">
            </div>
            @error('nm_pelapor')
            <small style="color:red">{{ $message }}</small>
            @enderror
        <div class="form-group">
            <label for="">Pengaduan</label>
            <input type="text" class="form-control" name="laporan" placeholder="Pengaduan" value="{{$perbaikan->laporan}}">
        </div>
        @error('laporan')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Lokasi</label>
            <textarea name="lks_laporan" id="" cols="30" rows="10" class="form-control" placeholder="Lokasi">{{$perbaikan->lks_laporan}}</textarea>
        </div>
        @error('lks_laporan')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Daftar Material Yang Digunakan</label>
            <textarea name="dftr_mtrl" id="" cols="30" rows="10" class="form-control" placeholder="Daftar Material">{{$perbaikan->dftr_mtrl}}</textarea>
        </div>
        @error('dftr_mtrl')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Daftar Jumlah Material Yang Dipakai</label>
            <textarea name="dftr_unitmtrl" id="" cols="30" rows="10" class="form-control" placeholder="Daftar Jumlah Material">{{$perbaikan->dftr_unitmtrl}}</textarea>
        </div>
        @error('dftr_unitmtrl')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="penanganan_id">Realisasi</label>
            <select name="penanganan_id" id="penanganan_id" class="form-control">
                @foreach($penanganans as $penanganan)
                    <option value="{{ $penanganan->id }}" {{ old('penanganan_id', $perbaikan->penanganan_id) == $penanganan->id ? 'selected' : '' }}>{{ $penanganan->s_penanganan }}</option>
                @endforeach
            </select>
        </div>
        @error('penanganan_id')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Keterangan Pengadaan</label>
            <textarea name="ket_pengadaan" id="" cols="30" rows="10" class="form-control" placeholder="Lokasi">{{$perbaikan->ket_pengadaan}}</textarea>
        </div>
        @error('ket_pengadaan')
        <small style="color:red">{{ $message }}</small>
        @enderror
        </div>
    @endif
    
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Edit Data</button>
        </div>
    </form>
</div>
</div>
</div>

@endsection