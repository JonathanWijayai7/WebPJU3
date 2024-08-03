@extends('layouts.app')

@section('title', 'Data Pegawai')

@section('content')

<div class="card card-primary card-outline">
    <div class="card-header">
            <h5 class="m-0">@yield('title')</h5>
        </div>
    <div class="card-body">

<div class="container">
    @if(auth()->user()->level=="tatausaha")
    <a href="{{ route('pegawai.create') }}" class="btn btn-info"><i class="fas fa-plus-square"></i> Tambah Data</a>
    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-arrow-right"></i> <i class="fas fa-file-excel"></i> Import Excel</a>
    <a href="{{ route('exportpegawai') }}" class="btn btn-success"><i class="fas fa-arrow-left"></i> <i class="fas fa-file-excel"></i> Export Excel</a> 
    @endif
    <a href="{{ route('pegawai.cetak') }}" target="_blank" class="btn btn-danger"><i class="fas fa-print"></i> <i class="fas fa-file-pdf"></i> Cetak Data </a>
    <a href="{{ route('pegawai.cetak.tanggal') }}" class="btn btn-secondary"><i class="fas fa-print"></i> <i class="fas fa-calendar"></i> Cetak Data Pertanggal</a>
    <br><br>

    <div class="col-lg-4">
    <div class="form-group">
        <form action="{{ route('searchNama') }}" method="GET">
            <input type="text" name="nm_pgw" id="nm_pgw" class="form-control" placeholder="Cari Nama Pegawai">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
</div>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import Data dari Excel</h5>
        </div>
        <form action="{{ route ('importpegawai') }}" method="post" enctype="multipart/form-data">
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

<div class="table-responsive">
    <table id="pegawai-table" class="table table-bordered table-hover table-striped">
        <thead>
            <tr align="center">
                <th>No</th>
                <th>Nama Pegawai</th>
                <th>Jabatan</th>
                <th>Tanggal Masuk</th>
                <th>NIP</th>
                <th>Golongan</th>
                <th>Gambar</th>
                @if(auth()->user()->level=="tatausaha")
                <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1
            @endphp
            @foreach ($pegawai as $item)
            <tr>
            <td align="center">{{ $i++ }}</td>
            <td>{{ $item->nm_pgw }}</td>
            <td align="center">{{ $item->nm_posisi }}</td>
            <td align="center">{{ $item->tgl_mskpgw }}</td>
            <td align="center">{{ $item->nip_pgw }}</td>
            <td align="center">{{ $item->tgkt_pgw }}</td>
            <td align="center">
                <img src="/image/{{$item->ftpegawai}}" alt="" class="img-fluid" width="90">
            </td>
            @if(auth()->user()->level=="tatausaha")
           <td>
            <a href="{{ route('pegawai.edit', $item->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('pegawai.destroy', $item->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </td>
            <tr>
            @endif
            @endforeach
        </tbody>
    </table>
    </div>
    <div class="pagination">
        {{ $pegawai->links('pagination::bootstrap-4') }}
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
