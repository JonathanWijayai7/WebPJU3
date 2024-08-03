@extends('layouts.app')

@section('title', 'Edit Data Surat Tugas')
@section('content')

<div class="container">
    <a href="{{ route('surattugas') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a> 
<div class="row">
<div class="col-md-12">
    <form action="{{route('surattugas.update', $surattgs->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if(auth()->user()->level=="tatausaha")
        <div class="form-group">
            <label for="">Tanggal Surat</label>
            <input type="date" class="form-control" name="tgl_surat" placeholder="Tanggal Lahir" value="{{$surattgs->tgl_surat}}">
        </div>
        @error('tgl_surat')
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
        <label for="">Petugas 1</label>
        <input type="text" class="form-control" name="petugas1" placeholder="Petugas 1"  value="{{$surattgs->petugas1}}">
    </div>
    @error('petugas1')
    <small style="color:red">{{ $message }}</small>
    @enderror
    <div class="form-group">
        <label for="">Petugas 2</label>
        <input type="text" class="form-control" name="petugas2" placeholder="Petugas 2"  value="{{$surattgs->petugas2}}">
    </div>
    @error('petugas2')
    <small style="color:red">{{ $message }}</small>
    @enderror
    <div class="form-group">
        <label for="">Petugas 3</label>
        <input type="text" class="form-control" name="petugas3" placeholder="Petugas 3"  value="{{$surattgs->petugas3}}">
    </div>
    @error('petugas3')
    <small style="color:red">{{ $message }}</small>
    @enderror
    <div class="form-group">
        <label for="">Petugas 4</label>
        <input type="text" class="form-control" name="petugas4" placeholder="Petugas 4"  value="{{$surattgs->petugas4}}">
    </div>
    @error('petugas4')
    <small style="color:red">{{ $message }}</small>
    @enderror
    <div class="form-group">
        <label for="">Petugas 5</label>
        <input type="text" class="form-control" name="petugas5" placeholder="Petugas 5"  value="{{$surattgs->petugas5}}">
    </div>
    @error('petugas5')
    <small style="color:red">{{ $message }}</small>
    @enderror
    <div class="form-group">
        <label for="">Lokasi 1</label>
        <textarea name="tujuan1" cols="30" rows="10" class="form-control" placeholder="Masukkan Lokasi">{{$surattgs->tujuan1}}</textarea>
    </div>
    @error('tujuan1')
    <small style="color:red">{{ $message }}</small>
    @enderror
    <div class="form-group">
        <label for="">Lokasi 2</label>
        <textarea name="tujuan2" cols="30" rows="10" class="form-control" placeholder="Masukkan Lokasi">{{$surattgs->tujuan2}}</textarea>
    </div>
    @error('tujuan2')
    <small style="color:red">{{ $message }}</small>
    @enderror
    <div class="form-group">
        <label for="">Lokasi 3</label>
        <textarea name="tujuan3" cols="30" rows="10" class="form-control" placeholder="Masukkan Lokasi">{{$surattgs->tujuan3}}</textarea>
    </div>
    @error('tujuan3')
    <small style="color:red">{{ $message }}</small>
    @enderror
    <div class="form-group">
        <label for="">Lokasi 4</label>
        <textarea name="tujuan4" cols="30" rows="10" class="form-control" placeholder="Masukkan Lokasi">{{$surattgs->tujuan4}}</textarea>
    </div>
    @error('tujuan4')
    <small style="color:red">{{ $message }}</small>
    @enderror
    <div class="form-group">
        <label for="">Lokasi 5</label>
        <textarea name="tujuan5" cols="30" rows="10" class="form-control" placeholder="Masukkan Lokasi">{{$surattgs->tujuan5}}</textarea>
    </div>
    @error('tujuan5')
    <small style="color:red">{{ $message }}</small>
    @enderror
    <div class="form-group">
        <label for="">Lokasi 6</label>
        <textarea name="tujuan6" cols="30" rows="10" class="form-control" placeholder="Masukkan Lokasi">{{$surattgs->tujuan5}}</textarea>
    </div>
    @error('tujuan6')
    <small style="color:red">{{ $message }}</small>
    @enderror
    <div class="form-group">
        <label for="">Lokasi 7</label>
        <textarea name="tujuan7" cols="30" rows="10" class="form-control" placeholder="Masukkan Lokasi">{{$surattgs->tujuan5}}</textarea>
    </div>
    @error('tujuan7')
    <small style="color:red">{{ $message }}</small>
    @enderror
    @endif
    @if(auth()->user()->level=="kepala")
        <div class="form-group" >
            <label for="validasi_id">Validasi Kepala UPT</label>
            <select name="validasi_id" id="validasi_id" class="form-control">
                @foreach($validasis as $validasi)
                <option value="{{ $validasi->id }}"{{ old('validasi_id', $surattgs->validasi_id) == $validasi->id ? 'selected' : '' }}>{{ $validasi->s_validasi }}</option>
                @endforeach
            </select>
        </div>
        <div style="display: none;">
            <div class="form-group">
                <label for="">Tanggal Surat</label>
                <input type="date" class="form-control" name="tgl_surat" placeholder="Tanggal Lahir" value="{{$surattgs->tgl_surat}}">
            </div>
            @error('tgl_surat')
            <small style="color:red">{{ $message }}</small>
            @enderror
        <div class="form-group">
            <label for="">Petugas 1</label>
            <input type="text" class="form-control" name="petugas1" placeholder="Petugas 1"  value="{{$surattgs->petugas1}}">
        </div>
        @error('petugas1')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Petugas 2</label>
            <input type="text" class="form-control" name="petugas2" placeholder="Petugas 2"  value="{{$surattgs->petugas2}}">
        </div>
        @error('petugas2')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Petugas 3</label>
            <input type="text" class="form-control" name="petugas3" placeholder="Petugas 3"  value="{{$surattgs->petugas3}}">
        </div>
        @error('petugas3')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Petugas 4</label>
            <input type="text" class="form-control" name="petugas4" placeholder="Petugas 4"  value="{{$surattgs->petugas4}}">
        </div>
        @error('petugas4')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Petugas 5</label>
            <input type="text" class="form-control" name="petugas5" placeholder="Petugas 5"  value="{{$surattgs->petugas5}}">
        </div>
        @error('petugas5')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Lokasi 1</label>
            <textarea name="tujuan1" cols="30" rows="10" class="form-control" placeholder="Masukkan Lokasi">{{$surattgs->tujuan1}}</textarea>
        </div>
        @error('tujuan1')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Lokasi 2</label>
            <textarea name="tujuan2" cols="30" rows="10" class="form-control" placeholder="Masukkan Lokasi">{{$surattgs->tujuan2}}</textarea>
        </div>
        @error('tujuan2')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Lokasi 3</label>
            <textarea name="tujuan3" cols="30" rows="10" class="form-control" placeholder="Masukkan Lokasi">{{$surattgs->tujuan3}}</textarea>
        </div>
        @error('tujuan3')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Lokasi 4</label>
            <textarea name="tujuan4" cols="30" rows="10" class="form-control" placeholder="Masukkan Lokasi">{{$surattgs->tujuan4}}</textarea>
        </div>
        @error('tujuan4')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Lokasi 5</label>
            <textarea name="tujuan5" cols="30" rows="10" class="form-control" placeholder="Masukkan Lokasi">{{$surattgs->tujuan5}}</textarea>
        </div>
        @error('tujuan5')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Lokasi 6</label>
            <textarea name="tujuan6" cols="30" rows="10" class="form-control" placeholder="Masukkan Lokasi">{{$surattgs->tujuan5}}</textarea>
        </div>
        @error('tujuan6')
        <small style="color:red">{{ $message }}</small>
        @enderror
        <div class="form-group">
            <label for="">Lokasi 7</label>
            <textarea name="tujuan7" cols="30" rows="10" class="form-control" placeholder="Masukkan Lokasi">{{$surattgs->tujuan5}}</textarea>
        </div>
        @error('tujuan7')
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