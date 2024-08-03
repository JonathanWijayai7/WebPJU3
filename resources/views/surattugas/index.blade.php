@extends('layouts.app')

@section('title', 'Kelola Data Surat Tugas')

@section('content')

<div class="card card-primary card-outline">
    <div class="card-header">
            <h5 class="m-0">@yield('title')</h5>
        </div>
    <div class="card-body">

<div class="container">
    @if(auth()->user()->level=="tatausaha")
    <a href="{{ route('surattugas.create') }}" class="btn btn-info"><i class="fas fa-plus-square"></i> Tambah Data</a>
    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-arrow-right"></i> <i class="fas fa-file-excel"></i> Import Excel</a>
    <a href="{{ route('exportsurattgs') }}" class="btn btn-success"><i class="fas fa-arrow-left"></i> <i class="fas fa-file-excel"></i> Export Excel</a> 
    @endif
    <br><br>

    <div class="col-lg-4">
        <div class="form-group">
            <form action="{{ route('searchTglsrttgs') }}" method="GET">
                <input type="date" name="tgl_surat" id="tgl_surat" class="form-control" placeholder="Cari berdasarkan Tanggal">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import Data Surat Tugas dari Excel</h5>
        </div>
        <form action="{{ route ('importsurattgs') }}" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            @csrf
            <div class="form-group">
                <input type="file" name="file" required="required">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-primary">Import</button>
        </div>
      </div>
    </form>
    </div>
  </div>

<div class="col-lg-12">
<div class="table-responsive">
    <table id="surattugas-table" class="table table-bordered table-hover table-striped">
        <thead>
            <tr align="center">
                <th>No</th>
                <th>Tanggal Surat Tugas</th>
                <th>Validasi Kepala UPT</th>
                <th>Nama Petugas</th>
                <th>Daftar Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1
            @endphp
            @foreach ($surattgss as $item)
            <tr>
            <td align="center">{{ $i++ }}</td>
            <td align="center">{{ $item->tgl_surat }}</td>
            <td align="center">{{ $item->s_validasi }}</td>
            <td align="center">
                {{ $item->petugas1 }} <br>
                {{ $item->petugas2 }} <br>
                {{ $item->petugas3 }} <br>
                {{ $item->petugas4 }} <br>
                {{ $item->petugas5 }} <br>
            </td>
            <td align="center">
                {{ $item->tujuan1 }} <br>
                {{ $item->tujuan2 }} <br>
                {{ $item->tujuan3 }} <br>
                {{ $item->tujuan4 }} <br>
                {{ $item->tujuan5 }} <br>
                {{ $item->tujuan6 }} <br>
                {{ $item->tujuan7 }} <br>
            </td>
            <td>
            @if(auth()->user()->level=="tatausaha")
            <a href="{{ route('surattugas.edit', $item->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('surattugas.cetak', $item->id) }}" target="_blank" class="btn btn-primary">Cetak </a>
            <form action="{{ route('surattugas.destroy', $item->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            @endif
            @if(auth()->user()->level=="kepala")
            <a href="{{ route('surattugas.edit', $item->id) }}" class="btn btn-warning">Validasi</a>
            <a href="{{ route('surattugas.cetak', $item->id) }}" target="_blank" class="btn btn-primary">Cetak </a>
            @endif
            </td>
            <tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
    <div class="pagination">
        {{ $surattgss->links('pagination::bootstrap-4') }}
    </div>
</div>

</div>
</div>
@endsection
    

@section('script')
    <script>
        $(document).ready(function() {
            $('#surattugas-table').DataTable();
        });
    </script>
@endsection