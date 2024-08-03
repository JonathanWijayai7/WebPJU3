@extends('layouts.app')

@section('title', 'Edit Permohonan Penggunaan Material')
@section('content')

<div class="container">
    <a href="{{ route('logmaterials') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a> 
<div class="row">
<div class="col-md-12">
    <form action="{{route('logmaterials.update', $logmaterial->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
    <div class="form-group">
        <label for="">Tanggal pemakaian</label>
        <input type="date" class="form-control" name="tgl_pakai" placeholder="Tanggal Lahir" value="{{$logmaterial->tgl_pakai}}">
    </div>
    @error('tgl_pakai')
    <small style="color:red">{{ $message }}</small>
    @enderror
    <div class="form-group">
        <label for="barang_id">Nama Material</label>
        <select name="barang_id" id="barang_id" class="form-control">
            @foreach($materials as $material)
                <option value="{{ $material->id }}" {{ old('material_id', $logmaterial->barang_id) == $material->id ? 'selected' : '' }}>{{ $material->nm_brg }}</option>
            @endforeach
        </select>
    </div>
    @error('barang_id')
    <small style="color:red">{{ $message }}</small>
    @enderror
        <div class="form-group">
            <label for="">Jumlah Unit Terpakai</label>
            <input type="text" class="form-control" name="unit_pakai" placeholder="Unit Terpakai" value="{{$logmaterial->unit_pakai}}">
        </div>
        @error('unit_pakai')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Satuan</label>
            <input type="text" class="form-control" name="stn_pakai" placeholder="Masukkan Jenis Satuan" value="{{$logmaterial->stn_pakai}}">
        </div>
        @error('stn_pakai')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Lokasi Pakai</label>
            <textarea name="lokasi_pakai" id="" cols="30" rows="10" class="form-control" placeholder="Lokasi Pakai">{{$logmaterial->lokasi_pakai}}</textarea>
        </div>
        @error('lokasi_pakai')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Keterangan</label>
            <textarea name="keterangan" id="" cols="30" rows="10" class="form-control" placeholder="Keterangan">{{$logmaterial->keterangan}}</textarea>
        </div>
        @error('keterangan')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="wkl_pgwlog">Perwakilan Petugas</label>
            <select name="wkl_pgwlog" id="barang_id" class="form-control">
                @foreach($pegawais as $pegawai)
                    <option value="{{ $pegawai->id }}" {{ old('pegawai_id', $logmaterial->wkl_pgwlog) == $pegawai->id ? 'selected' : '' }}>{{ $pegawai->nm_pgw }}</option>
                @endforeach
            </select>
        </div>
        @error('wkl_pgwlog')
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
        <label for="">Tanggal pemakaian</label>
        <input type="date" class="form-control" name="tgl_pakai" placeholder="Tanggal Lahir" value="{{$logmaterial->tgl_pakai}}">
    </div>
    @error('tgl_pakai')
    <small style="color:red">{{ $message }}</small>
    @enderror
    <div class="form-group">
        <label for="barang_id">Nama Material</label>
        <select name="barang_id" id="barang_id" class="form-control">
            @foreach($materials as $material)
                <option value="{{ $material->id }}" {{ old('material_id', $logmaterial->barang_id) == $material->id ? 'selected' : '' }}>{{ $material->nm_brg }}</option>
            @endforeach
        </select>
    </div>
    @error('barang_id')
    <small style="color:red">{{ $message }}</small>
    @enderror
        <div class="form-group">
            <label for="">Jumlah Unit Terpakai</label>
            <input type="text" class="form-control" name="unit_pakai" placeholder="Unit Terpakai" value="{{$logmaterial->unit_pakai}}">
        </div>
        @error('unit_pakai')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Lokasi Pakai</label>
            <textarea name="lokasi_pakai" id="" cols="30" rows="10" class="form-control" placeholder="Lokasi Pakai">{{$logmaterial->lokasi_pakai}}</textarea>
        </div>
        @error('lokasi_pakai')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Keterangan</label>
            <textarea name="keterangan" id="" cols="30" rows="10" class="form-control" placeholder="Keterangan">{{$logmaterial->keterangan}}</textarea>
        </div>
        @error('keterangan')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="wkl_pgwlog">Perwakilan Petugas</label>
            <select name="wkl_pgwlog" id="barang_id" class="form-control">
                @foreach($pegawais as $pegawai)
                    <option value="{{ $pegawai->id }}" {{ old('pegawai_id', $logmaterial->wkl_pgwlog) == $pegawai->id ? 'selected' : '' }}>{{ $pegawai->nm_pgw }}</option>
                @endforeach
            </select>
        </div>
        @error('wkl_pgwlog')
        <small style="color:red">{{ $message }}</small>
        @enderror
            <div class="form-group">
                <label for="">Tanggal pemakaian</label>
                <input type="date" class="form-control" name="tgl_pakai" placeholder="Tanggal Lahir" value="{{$logmaterial->tgl_pakai}}">
            </div>
            @error('tgl_pakai')
            <small style="color:red">{{ $message }}</small>
            @enderror
            <div class="form-group">
                <label for="barang_id">Nama Material</label>
                <select name="barang_id" id="barang_id" class="form-control">
                    @foreach($materials as $material)
                        <option value="{{ $material->id }}" {{ old('material_id', $logmaterial->barang_id) == $material->id ? 'selected' : '' }}>{{ $material->nm_brg }}</option>
                    @endforeach
                </select>
            </div>
            @error('barang_id')
            <small style="color:red">{{ $message }}</small>
            @enderror
                <div class="form-group">
                    <label for="">Jumlah Unit Terpakai</label>
                    <input type="text" class="form-control" name="unit_pakai" placeholder="Unit Terpakai" value="{{$logmaterial->unit_pakai}}">
                </div>
                @error('unit_pakai')
                <small style="color:red">{{ $message }}</small>
                @enderror
                <div class="form-group">
                    <label for="">Satuan</label>
                    <input type="text" class="form-control" name="stn_pakai" placeholder="Unit Terpakai" value="{{$logmaterial->stn_pakai}}">
                </div>
                @error('stn_pakai')
                <small style="color:red">{{ $message }}</small>
                @enderror
                <div class="form-group">
                    <label for="">Lokasi Pakai</label>
                    <textarea name="lokasi_pakai" id="" cols="30" rows="10" class="form-control" placeholder="Lokasi Pakai">{{$logmaterial->lokasi_pakai}}</textarea>
                </div>
                @error('lokasi_pakai')
                <small style="color:red">{{ $message }}</small>
                @enderror
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <textarea name="keterangan" id="" cols="30" rows="10" class="form-control" placeholder="Keterangan">{{$logmaterial->keterangan}}</textarea>
                </div>
                @error('keterangan')
                <small style="color:red">{{ $message }}</small>
                @enderror
                <div class="form-group">
                    <label for="wkl_pgwlog">Perwakilan Petugas</label>
                    <select name="wkl_pgwlog" id="barang_id" class="form-control">
                        @foreach($pegawais as $pegawai)
                            <option value="{{ $pegawai->id }}" {{ old('pegawai_id', $logmaterial->wkl_pgwlog) == $pegawai->id ? 'selected' : '' }}>{{ $pegawai->nm_pgw }}</option>
                        @endforeach
                    </select>
                </div>
                @error('wkl_pgwlog')
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