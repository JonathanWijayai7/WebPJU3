@extends('layouts.app')

@section('title', 'Kelola Status Realisasi')

@section('content')

<div class="card card-primary card-outline">
    <div class="card-header">
            <h5 class="m-0">@yield('title')</h5>
        </div>
    <div class="card-body">

<div class="container">
    <a href="{{ route('penanganan.create') }}" class="btn btn-info"><i class="fas fa-plus-square"></i> Tambah Status</a>
    <br><br>

<div class="table-responsive">
    <table id="penanganan-table" class="table table-bordered table-hover table-striped">
        <thead>
            <tr align="center">
                <th>No</th>
                <th>Status Penanganan</th>
                @if(auth()->user()->level=="tatausaha")
                <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1
            @endphp
            @foreach ($penanganans as $penanganan)
            <tr>
            <td align="center">{{ $i++ }}</td>
            <td align="center">{{ $penanganan->s_penanganan }}</td>
           <td>
            @if(auth()->user()->level=="tatausaha")
            <a href="{{ route('penanganan.edit', $penanganan->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('penanganan.destroy', $penanganan->id) }}" method="POST">
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
        {{ $penanganans->links('pagination::bootstrap-4') }}
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