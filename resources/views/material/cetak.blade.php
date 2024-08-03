<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>

        @page {
            size: 8.27in 11.67in;
            orientation: landscape;
        }

        #judul{
            text-align:center;
        }

        #halaman{
            width: auto;
            height: auto;
            position: relative;
            padding-top: 10px;
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 30px;
        }

        table.static {
            position: relative;
            border: 1px solid #543535;
        }
    </style>

    <title>CETAK DATA MATERIAL</title>
    <link rel="stylesheet" href="{{ asset('css/print.css') }}">
</head>
<body>
    <div id="halaman">
        <table>
            <tr>
                <td colspan="2">
                    <img src="{{ asset('image/lambang_kt_cirebon.jpg') }}" alt="Lambang Kota Cirebon" style="width: 160px; height: 130px;">
                </td>
                <td colspan="10" align="center">
                    <font size="6">DINAS PERHUBUNGAN KOTA CIREBON</font><br>
                    <font size="6"><b>UPT PENERANGAN JALAN UMUM</b></font><br>
                    <font size="4">Jalan Rarasantang No.1 Komplek Pekantoran Bima Kesambi Cirebon 45132</font><br>
                    <img src="{{ asset('image/lg_phone.png') }}" style="width: 10px;  height: 10px;"><font size="3"> : (0231) 489717 | </font> <img src="{{ asset('image/lg_office.png') }}" style="width: 10px;  height: 10px;"> <font size="3"> : (0231) 489717 | </font> 
                    <img src="{{ asset('image/lg_wa.png') }}" style="width: 10px;  height: 10px;"><font size="3"> : 087700015151 | </font> <img src="{{ asset('image/lg_gmail.png') }}" style="width: 10px;  height: 10px;"> <font size="3"> : dishub@cirebonkota.go.id | </font> 
                    <img src="{{ asset('image/lg_facebook.png') }}" style="width: 10px;  height: 10px;"><font size="3"> : Dishub Crebon Kota | </font> <img src="{{ asset('image/lg_insta.png') }}" style="width: 10px;  height: 10px;"> <font size="3"> : dishub@cirebonkota.go.id </font> 
                </td>
            </tr>
            <tr>
                <td colspan="12"><hr> </td>
            </tr>
        </table>
        
        <table width="470">
            <center>
                <font size="4"><b>Laporan Stok Material UPT PJU Kota Cirebon</b></font>
            </center>
        </table>
        <br>

    <div class="form-group">
        <table class="static" align="center" rules="all" border="1px" style="width: 95%">
            <tr align="center">
                <th>No</th>
                <th>ID Barang</th>
                <th>Tanggal Masuk</th>
                <th>Nama Barang</th>
                <th>Stok Awal</th>
                <th>Terpakai</th>
                <th>Stok Sisa</th>
                <th>Satuan</th>
                <th>Harga Per Unit</th>
                <th>Total Nilai</th>
                <th>Keterangan</th>
            </tr>
            @foreach ($materials as $item)
                <tr>
                    <td align="center">{{ $loop->iteration }}</td>
                    <td>{{ $item->no_id_brg }}</td>
                    <td>{{ date('d F Y', strtotime($item->tgl_masuk)) }}</td>
                    <td>{{ $item->nm_brg }}</td>
                    <td align="center">{{ $item->stk_awal }}</td>
                    <td align="center">{{ $item->stk_terpakai }}</td>
                    <td align="center">{{ $item->stk_sisa }}</td>
                    <td align="center">{{ $item->satuan }}</td>
                    <td align="center">Rp {{ number_format($item->hrg_brg, 0, ',', '.') }}</td>
            <td align="center">Rp {{ number_format($item->ttl_brg, 0, ',', '.') }}</td>
                    <td>{{ $item->ket }}</td>
                </tr>
            @endforeach
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
    <br>
    <br>

    <div style="width:50%; text-align: left; float: right;">
        <center>
        Cirebon, {{ $tanggalFormatted }} <br>
        Kepala UPT PJU<br>
        Dinas Perhubungan Kota Cirebon <br>
        <br>
        <br>
        <br>
        <br>
        <b><u>SURYA AGUNG HERMAWAN. ST.,MT</u></b><br>
        Penata Tingkat I - III/d <br>
        NIP. 19770421 201001 1 004
    </center>
    </div>
</div>

    <script type="text/javascript">
    window.print();
    </script>
</body>
</html>