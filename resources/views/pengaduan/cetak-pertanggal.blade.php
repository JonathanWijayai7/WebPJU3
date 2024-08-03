@extends('layouts.app')

@section('title', 'Pilih Durasi Tanggal')

@section('content')

<div class="container">
    <div class="card card-primary card-outline">
        <div class="card-header">
          <h5 class="m-0">@yield('title')</h5>
        </div>
        <div class="card-body">
            <a href="{{ route('pengaduan') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a><br><br> 
    <div class="input-group mb-3">
        <label for="label">Tanggal Awal </label><br>
        <input type="date" name="tglawal" id="tglawal" class="form-control"> 
    </div>
    <div class="input-group mb-3">
        <label for="label">Tanggal Akhir </label><br>
        <input type="date" name="tglakhir" id="tglakhir" class="form-control"> 
    </div>
    <div class="input-group mb-3">
        <a href="" onclick="this.href='/cetakpengaduan/pertanggal/'+document.getElementById('tglawal').value +'/'+document.getElementById('tglakhir').value" target="_blank" class="btn btn-primary col-md-12"><i class="fas fa-print"></i> Cetak Laporan Pertanngal</a>
    </div>
</div>
</div>
</div>
@endsection
    

@section('script')
    <script>
        $(document).ready(function() {
            $('#pegawai-table').DataTable();
        });
    </script>
@endsection