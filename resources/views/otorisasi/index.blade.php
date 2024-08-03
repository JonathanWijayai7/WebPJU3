@extends('layouts.app')

@section('title', 'Kelola Autorisasi')

@section('content')

<div class="card card-primary card-outline">
    <div class="card-header">
            <h5 class="m-0">@yield('title')</h5>
        </div>
    <div class="card-body">

<div class="container">
    <a href="{{ route('otorisasi.create') }}" class="btn btn-info"><i class="fas fa-plus-square"></i> Tambah Autorisasi</a>
    <br><br>

<div class="table-responsive">
    <table id="penanganan-table" class="table table-bordered table-hover table-striped">
        <thead>
            <tr align="center">
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Password</th>
                <th>Level</th>
                <th>Foto Profil</th>
                @if(auth()->user()->level=="tatausaha")
                <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1
            @endphp
            @foreach ($users as $user)
            <tr>
            <td align="center">{{ $i++ }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->password }}</td>
            <td>{{ $user->level }}</td>
            <td align="center">
                <img src="/image/{{$user->ftprofil}}" alt="" class="img-fluid" width="90">
            </td>
           <td>
            @if(auth()->user()->level=="tatausaha")
            <a href="{{ route('otorisasi.edit', $user->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('otorisasi.destroy', $user->id) }}" method="POST">
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