@extends('layouts.app')

@section('title', 'Edit Data Pengaduan')
@section('content')

<div class="container">
    <a href="{{ route('pengaduan') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a> 
<div class="row">
<div class="col-md-12">
    <form action="{{route('pengaduan.update', $pengaduan->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if(auth()->user()->level=="tatausaha")
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="{{$pengaduan->nama}}">
        </div>
        @error('nama')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Tanggal Pengaduan</label>
            <input type="date" class="form-control" name="tgl_lapor" placeholder="Tanggal Lahir" value="{{$pengaduan->tgl_lapor}}">
        </div>
        @error('tgl_lapor')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Alamat</label>
            <textarea name="alamat" id="" cols="30" rows="10" class="form-control" placeholder="Alamat">{{$pengaduan->alamat}}</textarea>
        </div>
        @error('alamat')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">No Telepon</label>
            <input type="text" class="form-control" name="no_tlp" placeholder="Nomor Telepon" value="{{$pengaduan->no_tlp}}">
        </div>
        @error('no_tlp')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Detail Masalah</label>
            <textarea name="masalah" id="" cols="30" rows="10" class="form-control" placeholder="Masalah">{{$pengaduan->masalah}}</textarea>
        </div>
        @error('masalah')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="skala_id">Skala Penanganan</label>
            <select name="skala_id" id="Skala_id" class="form-control">
                @foreach($skalas as $skala)
                    <option value="{{ $skala->id }}" {{ old('skala_id', $pengaduan->skala_id) == $skala->id ? 'selected' : '' }}>{{ $skala->skala }}</option>
                @endforeach
            </select>
        </div>
        @error('skala_id')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="penanganan_id">Realisasi</label>
            <select name="penanganan_id" id="penanganan_id" class="form-control">
                @foreach($penanganans as $penanganan)
                    <option value="{{ $penanganan->id }}" {{ old('penanganan_id', $pengaduan->penanganan_id) == $penanganan->id ? 'selected' : '' }}>{{ $penanganan->s_penanganan }}</option>
                @endforeach
            </select>
        </div>
        @error('penanganan_id')
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
            <label for="">Lokasi Titik Lampu</label>
            <textarea name="lokasi" id="" cols="30" rows="10" class="form-control" placeholder="Lokasi">{{$pengaduan->lokasi}}</textarea>
        </div>
        @error('lokasi')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="kec_id">Kecamatan Titik Lampu</label>
            <select name="kec_id" id="kec_id" class="form-control">
                @foreach($kecamatans as $kecamatan)
                    <option value="{{ $kecamatan->id }}" {{ old('kec_id', $pengaduan->kec_id) == $kecamatan->id ? 'selected' : '' }}>{{ $kecamatan->nm_kecamatan }}</option>
                @endforeach
            </select>
        </div>
        @error('kec_id')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="kel_id">Kelurahan Titik Lampu</label>
            <select name="kel_id" id="kel_id" class="form-control">
                @foreach($kelurahans as $kelurahan)
                    <option value="{{ $kelurahan->id }}" {{ old('kel_id', $pengaduan->kel_id) == $kelurahan->id ? 'selected' : '' }}>{{ $kelurahan->nm_kelurahan }}</option>
                @endforeach
            </select>
        </div>
        @error('kel_id')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Titik Maps Lampu Bermasalah</label>
            <input type="text" class="form-control" name="maps" placeholder="Titik Google Maps" value="{{$pengaduan->maps}}">
        </div>
        @error('maps')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Deskripsi Perbaikan</label>
            <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control" placeholder="Masalah">{{$pengaduan->deskripsi}}</textarea>
        </div>
        @error('deskripsi')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Foto Kondisi PJU</label><br>
            <img src="/img_lapor/{{$pengaduan->ft_pju}}" alt="" class="img-fluid">
            <input type="file" class="form-control" name="ft_pju">
        </div>
        @error('ft_pju')
        <small style="color:red">{{ $message }}</small>
        @enderror
        @endif







        @if(auth()->user()->level=="kepala")
        <div class="form-group" >
            <label for="validasi_id">Validasi Kepala UPT</label>
            <select name="validasi_id" id="validasi_id" class="form-control">
                @foreach($validasis as $validasi)
                <option value="{{ $validasi->id }}"{{ old('validasi_id', $validasi->s_validasi) == $validasi->id ? 'selected' : '' }}>{{ $validasi->s_validasi }}</option>
            </option>
                @endforeach
            </select>
        </div>
        <div style="display: none;">
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="{{$pengaduan->nama}}">
        </div>
        @error('nama')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Tanggal Pengaduan</label>
            <input type="date" class="form-control" name="tgl_lapor" placeholder="Tanggal Lahir" value="{{$pengaduan->tgl_lapor}}">
        </div>
        @error('tgl_lapor')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Alamat</label>
            <textarea name="alamat" id="" cols="30" rows="10" class="form-control" placeholder="Alamat">{{$pengaduan->alamat}}</textarea>
        </div>
        @error('alamat')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">No Telepon</label>
            <input type="text" class="form-control" name="no_tlp" placeholder="Nomor Telepon" value="{{$pengaduan->no_tlp}}">
        </div>
        @error('no_tlp')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Detail Masalah</label>
            <textarea name="masalah" id="" cols="30" rows="10" class="form-control" placeholder="Masalah">{{$pengaduan->masalah}}</textarea>
        </div>
        @error('masalah')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="skala_id">Skala Penanganan</label>
            <select name="skala_id" id="Skala_id" class="form-control">
                @foreach($skalas as $skala)
                    <option value="{{ $skala->id }}" {{ old('skala_id', $pengaduan->skala_id) == $skala->id ? 'selected' : '' }}>{{ $skala->skala }}</option>
                @endforeach
            </select>
        </div>
        @error('skala_id')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="penanganan_id">Realisasi</label>
            <select name="penanganan_id" id="penanganan_id" class="form-control">
                @foreach($penanganans as $penanganan)
                    <option value="{{ $penanganan->id }}" {{ old('penanganan_id', $pengaduan->penanganan_id) == $penanganan->id ? 'selected' : '' }}>{{ $penanganan->s_penanganan }}</option>
                @endforeach
            </select>
        </div>
        @error('penanganan_id')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Lokasi Titik Lampu</label>
            <textarea name="lokasi" id="" cols="30" rows="10" class="form-control" placeholder="Lokasi">{{$pengaduan->lokasi}}</textarea>
        </div>
        @error('lokasi')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="kec_id">Kecamatan Titik Lampu</label>
            <select name="kec_id" id="kec_id" class="form-control">
                @foreach($kecamatans as $kecamatan)
                    <option value="{{ $kecamatan->id }}" {{ old('kec_id', $pengaduan->kec_id) == $kecamatan->id ? 'selected' : '' }}>{{ $kecamatan->nm_kecamatan }}</option>
                @endforeach
            </select>
        </div>
        @error('kec_id')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="kel_id">Kelurahan Titik Lampu</label>
            <select name="kel_id" id="kel_id" class="form-control">
                @foreach($kelurahans as $kelurahan)
                    <option value="{{ $kelurahan->id }}" {{ old('kel_id', $pengaduan->kel_id) == $kelurahan->id ? 'selected' : '' }}>{{ $kelurahan->nm_kelurahan }}</option>
                @endforeach
            </select>
        </div>
        @error('kel_id')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Titik Maps Lampu Bermasalah</label>
            <input type="text" class="form-control" name="maps" placeholder="Titik Google Maps" value="{{$pengaduan->maps}}">
        </div>
        @error('maps')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Deskripsi Perbaikan</label>
            <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control" placeholder="Masalah">{{$pengaduan->deskripsi}}</textarea>
        </div>
        @error('deskripsi')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Foto Kondisi PJU</label><br>
            <img src="/img_lapor/{{$pengaduan->ft_pju}}" alt="" class="img-fluid">
            <input type="file" class="form-control" name="ft_pju">
        </div>
        @error('ft_pju')
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