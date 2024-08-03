@extends('layouts.app')

@section('title', 'Kelola Laporan Perbaikan & Penggunaan Material')

@section('content')

<div class="card card-primary card-outline">
    <div class="card-header">
            <h5 class="m-0">@yield('title')</h5>
        </div>
    <div class="card-body">

<div class="container">
    @if(auth()->user()->level=="tatausaha")
    <a href="{{ route('perbaikans.create') }}" class="btn btn-info"><i class="fas fa-plus-square"></i> Tambah Data</a>
    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-arrow-right"></i> <i class="fas fa-file-excel"></i> Import Excel</a>
    <a href="{{ route('exportperbaikans') }}" class="btn btn-success"><i class="fas fa-arrow-left"></i> <i class="fas fa-file-excel"></i> Export Excel</a> 
    @endif
    <a href="{{ route('perbaikans.cetak.tanggal') }}" class="btn btn-secondary"><i class="fas fa-print"></i> <i class="fas fa-calendar"></i> Cetak Data Pertanggal</a>
    <br><br>


    <div class="col-lg-4">
        <div class="form-group">
            <form action="{{ route('searchTglprbk') }}" method="GET">
                <input type="date" name="tgl_lpprbk" id="tgl_lpprbk" class="form-control" placeholder="Cari berdasarkan Tanggal">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import Data Laporan Perbaikan dari Excel</h5>
        </div>
        <form action="{{ route ('importperbaikans') }}" method="post" enctype="multipart/form-data">
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
    <table id="logmaterials-table" class="table table-bordered table-hover table-striped">
        <thead>
            <tr align="center">
                <th>No</th>
                <th>Hari/Tanggal</th>
                <th>Nama/NO HP</th>
                <th>Pengaduan</th>
                <th>Validasi Kepala UPT</th>
                <th>Lokasi</th>
                <th>Nama Barang</th>
                <th>Pemakaian</th>
                <th>Realisasi</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1
            @endphp
            @foreach ($perbaikans as $item)
            <tr>
            <td align="center">{{ $i++ }}</td>
            <td align="center">{{ $item->tgl_lpprbk }}</td>
            <td>{{ $item->nm_pelapor }}</td>
            <td>{{ $item->laporan }}</td>
            <td align="center">{{ $item->s_validasi }}</td>
            <td>{{ $item->lks_laporan }}</td>
            <td>{{ $item->dftr_mtrl }}</td>
            <td align="center">{{ $item->dftr_unitmtrl }}</td>
            <td align="center">{{ $item->s_penanganan }}</td>
            <td align="center">{{ $item->ket_pengadaan }}</td>
            <td>
                @if(auth()->user()->level=="tatausaha")
            <a href="{{ route('perbaikans.edit', $item->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('perbaikans.destroy', $item->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            @endif
            @if(auth()->user()->level=="kepala")
            <a href="{{ route('perbaikans.edit', $item->id) }}" class="btn btn-warning">Validasi</a>
            @endif
                </td>
            <tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
    <div class="pagination">
        {{ $perbaikans->links('pagination::bootstrap-4') }}
    </div>
</div>

</div>
</div>
@endsection
    

@section('script')
    <script>
        $(document).ready(function() {
            $('#logmaterials-table').DataTable();
        });
    </script>
@endsection