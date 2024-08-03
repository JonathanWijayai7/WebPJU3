@extends('layouts.app')

@section('title', 'Keterangan Validasi')

@section('content')

<div class="card card-primary card-outline">
    <div class="card-header">
            <h5 class="m-0">@yield('title')</h5>
        </div>
    <div class="card-body">

<div class="container">
    <a href="{{ route('validasi.create') }}" class="btn btn-info"><i class="fas fa-plus-square"></i> Tambah Kategori Status</a>
    <br><br>

<div class="table-responsive">
    <table id="validasi-table" class="table table-bordered table-hover table-striped">
        <thead>
            <tr align="center">
                <th>No</th>
                <th>Status</th>
                @if(auth()->user()->level=="tatausaha")
                <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1
            @endphp
            @foreach ($validasis as $validasi)
            <tr>
            <td align="center">{{ $i++ }}</td>
            <td align="center">{{ $validasi->s_validasi }}</td>
           <td>
            @if(auth()->user()->level=="tatausaha")
            <a href="{{ route('validasi.edit', $validasi->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('validasi.destroy', $validasi->id) }}" method="POST">
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
        {{ $validasis->links('pagination::bootstrap-4') }}
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