@extends('layouts.app')

@section('title', 'Kelola Stok Material')

@section('content')

<div class="card card-primary card-outline">
    <div class="card-header">
            <h5 class="m-0">@yield('title')</h5>
        </div>
    <div class="card-body">

<div class="container">
    @if(auth()->user()->level=="tatausaha")
    <a href="{{ route('material.create') }}" class="btn btn-info"><i class="fas fa-plus-square"></i> Tambah Data Material</a>
    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-arrow-right"></i> <i class="fas fa-file-excel"></i> Import Excel</a>
    <a href="{{ route('exportmaterial') }}" class="btn btn-success"><i class="fas fa-arrow-left"></i> <i class="fas fa-file-excel"></i> Export Excel</a> 
    @endif
    <a href="{{ route('material.cetak') }}" target="_blank" class="btn btn-danger"><i class="fas fa-print"></i> <i class="fas fa-file-pdf"></i> Cetak Data </a>
    <br><br>

    <div class="col-lg-4">
        <div class="form-group">
            <form action="{{ route('searchnmbrg') }}" method="GET">
                <input type="text" name="nm_brg" id="nm_brg" class="form-control" placeholder="Cari Nama Material">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import Data Material dari Excel</h5>
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

<div class="table-responsive">
    <table id="penanganan-table" class="table table-bordered table-hover table-striped">
        <thead>
            <tr align="center">
                <th>No</th>
                <th>ID Material</th>
                <th>Tanggal Masuk</th>
                <th>Nama</th>
                <th>Stok Awal</th>
                <th>Stok Terpakai</th>
                <th>Stok Sisa</th>
                <th>Satuan</th>
                <th>Harga Per Unit</th>
                <th>Total Nilai</th>
                <th>Keterangan</th>
                <th>Foto</th>
                @if(auth()->user()->level=="tatausaha")
                <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1
            @endphp
            @foreach ($materials as $material)
            <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $material->no_id_brg }}</td>
            <td align="center">{{ $material->tgl_masuk }}</td>
            <td>{{ $material->nm_brg }}</td>
            <td align="center">{{ $material->stk_awal }}</td>
            <td align="center">{{ $material->stk_terpakai }}</td>
            <td align="center">{{ $material->stk_sisa }}</td>
            <td align="center">{{ $material->satuan }}</td>
            <td align="center">Rp {{ number_format($material->hrg_brg, 0, ',', '.') }}</td>
            <td align="center">Rp {{ number_format($material->ttl_brg, 0, ',', '.') }}</td>
            <td>{{ $material->ket }}</td>
            <td>
                <img src="/img_brg/{{$material->ft_brg}}" alt="" class="img-fluid" width="90">
            </td>
            @if(auth()->user()->level=="tatausaha")
           <td>
            <a href="{{ route('material.edit', $material->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('material.destroy', $material->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </td>
            @endif
        </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6">Total Nominal Material Awal</td>
                <td colspan="6"> Rp {{ number_format($totalMaterialAwal, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td colspan="6">Total Nominal Material Terpakai</td>
                <td colspan="6"> Rp {{ number_format($totalMaterialTerpakai, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td colspan="6">Estimasi Nominal Material Tersisa</td>
                <td colspan="6"> Rp {{ number_format($totalMaterialSisa, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
    </div>
    <div class="pagination">
        {{ $materials->links('pagination::bootstrap-4') }}
    </div>
</div>
</div>
</div>
@endsection
    

@section('script')
    <script>
        $(document).ready(function() {
            $('#material-table').DataTable();
        });
    </script>
@endsection