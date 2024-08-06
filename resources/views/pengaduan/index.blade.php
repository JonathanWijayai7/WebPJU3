@extends('layouts.app')

@section('title', 'Kelola Data Pengaduan')

@section('content')

<div class="card card-primary card-outline">
    <div class="card-header">
            <h5 class="m-0">@yield('title')</h5>
        </div>
    <div class="card-body">

<div class="container">
    @if(auth()->user()->level=="tatausaha")
    <a href="{{ route('pengaduan.create') }}" class="btn btn-info"><i class="fas fa-plus-square"></i> Tambah Data</a>
    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-arrow-right"></i> <i class="fas fa-file-excel"></i> Import Excel</a>
    <a href="{{ route('exportpengaduan') }}" class="btn btn-success"><i class="fas fa-arrow-left"></i> <i class="fas fa-file-excel"></i> Export Excel</a> 
    @endif
    <a href="{{ route('pengaduan.cetak') }}" target="_blank" class="btn btn-danger"><i class="fas fa-print"></i> <i class="fas fa-file-pdf"></i> Cetak Data </a>
    <a href="{{ route('pengaduan.cetak.tanggal') }}" class="btn btn-secondary"><i class="fas fa-print"></i> <i class="fas fa-calendar"></i> Cetak Data Pertanggal</a>
    <br><br>

    <div class="col-lg-4">
    <div class="form-group">
        <form action="{{ route('searchTgllpr') }}" method="GET">
            <input type="date" name="tgl_lapor" id="tgl_lapor" class="form-control" placeholder="Cari berdasarkan Tanggal">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import Data Pengaduan dari Excel</h5>
        </div>
        <form action="{{ route ('importpengaduan') }}" method="post" enctype="multipart/form-data">
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
    <table id="pengaduan-table" class="table table-bordered table-hover table-striped">
        <thead>
            <tr align="center">
                <th>No</th>
                <th>Tanggal Pengaduan</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No.Telp</th>
                <th>Detail Masalah</th>
                <th>Skala</th>
                <th>Realisasi</th>
                <th>Validasi Kepala UPT</th>
                <th>Lokasi</th>
                <th>Kecamatan</th>
                <th>Kelurahan</th>
                <th>Maps</th>
                <th>Deskripsi Perbaikan</th>
                <th>Foto Kondisi PJU</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1
            @endphp
            @foreach ($pengaduans as $item)
            <tr>
            <td align="center">{{ $i++ }}</td>
            <td align="center">{{ $item->tgl_lapor }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->alamat }}</td>
            <td align="center">{{ $item->no_tlp }}</td>
            <td>{{ $item->masalah }}</td>
            <td>{{ $item->skala }}</td>
            <td align="center">{{ $item->s_penanganan }}</td>
            <td align="center">{{ $item->s_validasi }}</td>
            <td>{{ $item->lokasi }}</td>
            <td align="center">{{ $item->nm_kecamatan }}</td>
            <td align="center">{{ $item->nm_kelurahan }}</td>
            <td>{{ $item->maps }}</td>
            <td>{{ $item->deskripsi }}</td>
            <td align="center">
                <img src="/img_lapor/{{$item->ft_pju}}" alt="" class="img-fluid" width="90">
            </td>
            <td>
            @if(auth()->user()->level=="tatausaha")
            <a href="{{ route('pengaduan.edit', $item->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('pengaduan.destroy', $item->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            @endif
            @if(auth()->user()->level=="kepala")
            <a href="{{ route('pengaduan.edit', $item->id) }}" class="btn btn-warning">Validasi</a>
            @endif
            </td>
            <tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
    <div class="pagination">
        {{ $pengaduans->links('pagination::bootstrap-4') }}
    </div>
</div>

</div>
</div>
@endsection
    

@section('script')
    <script>
        $(document).ready(function() {
            $('#pengaduan-table').DataTable();
        });
    </script>
@endsection