@extends('layouts.app')

@section('title', 'Kelola Permohonan Penggunaan Material')

@section('content')

<div class="card card-primary card-outline">
    <div class="card-header">
            <h5 class="m-0">@yield('title')</h5>
        </div>
    <div class="card-body">

<div class="container">
    @if(auth()->user()->level=="tatausaha")
    <a href="{{ route('logmaterials.create') }}" class="btn btn-info"><i class="fas fa-plus-square"></i> Tambah Data</a>
    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-arrow-right"></i> <i class="fas fa-file-excel"></i> Import Excel</a>
    <a href="{{ route('exportlogmaterials') }}" class="btn btn-success"><i class="fas fa-arrow-left"></i> <i class="fas fa-file-excel"></i> Export Excel</a> 
    @endif
    <a href="{{ route('logmaterials.cetak.tanggal') }}" class="btn btn-secondary"><i class="fas fa-print"></i> <i class="fas fa-calendar"></i> Cetak Data Pertanggal</a>
    <br><br>

    <div class="col-lg-4">
    <div class="form-group">
        <form action="{{ route('searchTgllog') }}" method="GET">
            <input type="date" name="tgl_pakai" id="tgl_pakai" class="form-control" placeholder="Cari berdasarkan Tanggal">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import Data Permohonan Penggunaan Material dari Excel</h5>
        </div>
        <form action="{{ route ('importlogmaterials') }}" method="post" enctype="multipart/form-data">
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
                <th>Tanggal Pemakaian</th>
                <th>Validasi Kepala UPT</th>
                <th>Nama Material</th>
                <th>Unit Terpakai</th>
                <th>Satuan</th>
                <th>Lokasi Pemakaian</th>
                <th>Keterangan</th>
                <th>Perwakilan Petugas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1
            @endphp
            @foreach ($logmaterials as $item)
            <tr>
            <td align="center">{{ $i++ }}</td>
            <td align="center">{{ $item->tgl_pakai }}</td>
            <td align="center">{{ $item->s_validasi }}</td>
            <td>{{ $item->nm_brg }}</td>
            <td align="center">{{ $item->unit_pakai }}</td>
            <td align="center">{{ $item->stn_pakai }}</td>
            <td>{{ $item->lokasi_pakai }}</td>
            <td>{{ $item->keterangan }}</td>
            <td align="center">{{ $item->nm_pgw }}</td>
            <td>
            @if(auth()->user()->level=="tatausaha")
            <a href="{{ route('logmaterials.edit', $item->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('logmaterials.destroy', $item->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            @endif
            @if(auth()->user()->level=="kepala")
            <a href="{{ route('logmaterials.edit', $item->id) }}" class="btn btn-warning">Validasi</a>
            @endif
            </td>
        </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
    <div class="pagination">
        {{ $logmaterials->links('pagination::bootstrap-4') }}
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