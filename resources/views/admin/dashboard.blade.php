@extends('layouts.app')

@section('title', 'Dashboard')


@section('content')
<div class="container">
    <div class="card card-primary card-outline">
        <div class="card-header">
          <h5 class="m-0">@yield('title')</h5>
        </div>
        <div class="card-body">
<div class="p-6 m-20 bg-white rounded shadow">
{!! $kecPengaduanChart->container() !!}
</div><br><hr><br>
<div class="p-6 m-20 bg-white rounded shadow">
{!! $kelPengaduanChart->container() !!}
</div><br><hr><br>
<div class="p-6 m-20 bg-white rounded shadow">
{!! $realisasiPengaduanChart->container() !!}
</div>
</div>
</div>
</div>

<script src="{{$kecPengaduanChart->cdn() }}"></script>

{{ $kecPengaduanChart->script() }}

<script src="{{$kelPengaduanChart->cdn() }}"></script>

{{ $kelPengaduanChart->script() }}

<script src="{{$realisasiPengaduanChart->cdn() }}"></script>

{{ $realisasiPengaduanChart->script() }}


@endsection