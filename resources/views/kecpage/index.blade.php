@extends('layouts.app')

@section('title', 'Daftar Kecamatan Kota Cirebon')

@section('content')

<div class="card card-primary card-outline">
    <div class="card-header">
            <h5 class="m-0">@yield('title')</h5>
        </div>
    <div class="card-body">

<div class="container">
    <a href="{{ route('kecamatan.create') }}" class="btn btn-info"><i class="fas fa-plus-square"></i> Tambah Kecamatan</a>
    <br><br>

<div class="table-responsive">
    <table id="kecamatan-table" class="table table-bordered table-hover table-striped">
        <thead>
            <tr align="center">
                <th>No</th>
                <th>Nama Kecamatan</th>
                @if(auth()->user()->level=="tatausaha")
                <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1
            @endphp
            @foreach ($kecamatans as $kecamatan)
            <tr>
            <td align="center">{{ $i++ }}</td>
            <td align="center">{{ $kecamatan->nm_kecamatan }}</td>
           <td>
            @if(auth()->user()->level=="tatausaha")
            <a href="{{ route('kecamatan.edit', $kecamatan->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('kecamatan.destroy', $kecamatan->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            @endif
            </td>
            <tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <div class="pagination">
        {{ $kecamatans->links('pagination::bootstrap-4') }}
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