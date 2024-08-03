@extends('layouts.app')

@section('title', 'Daftar Kelurahan Kota Cirebon')

@section('content')

<div class="card card-primary card-outline">
    <div class="card-header">
            <h5 class="m-0">@yield('title')</h5>
        </div>
    <div class="card-body">

<div class="container">
    <a href="{{ route('kelurahan.create') }}" class="btn btn-info"><i class="fas fa-plus-square"></i> Tambah Kelurahan</a>
    <br><br>

<div class="table-responsive">
    <table id="kelurahan-table" class="table table-bordered table-hover table-striped">
        <thead>
            <tr align="center">
                <th align="center">No</th>
                <th align="center">Nama Kelurahan</th>
                @if(auth()->user()->level=="tatausaha")
                <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1
            @endphp
            @foreach ($kelurahans as $kelurahan)
            <tr>
            <td align="center">{{ $i++ }}</td>
            <td align="center">{{ $kelurahan->nm_kelurahan }}</td>
           <td>
            @if(auth()->user()->level=="tatausaha")
            <a href="{{ route('kelurahan.edit', $kelurahan->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('kelurahan.destroy', $kelurahan->id) }}" method="POST">
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
        {{ $kelurahans->links('pagination::bootstrap-4') }}
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