@extends('layouts.app')

@section('title', 'Data Jabatan')

@section('content')

<div class="card card-primary card-outline">
    <div class="card-header">
            <h5 class="m-0">@yield('title')</h5>
        </div>
    <div class="card-body">

<div class="container">
    <a href="{{ route('posisi.create') }}" class="btn btn-info"><i class="fas fa-plus-square"></i> Tambah Kategori Posisi</a>
    <br><br>

<div class="table-responsive">
    <table id="posisi-table" class="table table-bordered table-hover table-striped">
        <thead>
            <tr align="center">
                <th>No</th>
                <th>Nama Posisi</th>
                @if(auth()->user()->level=="tatausaha")
                <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1
            @endphp
            @foreach ($posisis as $posisi)
            <tr>
            <td align="center">{{ $i++ }}</td>
            <td align="center">{{ $posisi->nm_posisi }}</td>
           <td>
            @if(auth()->user()->level=="tatausaha")
            <a href="{{ route('posisi.edit', $posisi->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('posisi.destroy', $posisi->id) }}" method="POST">
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
        {{ $posisis->links('pagination::bootstrap-4') }}
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