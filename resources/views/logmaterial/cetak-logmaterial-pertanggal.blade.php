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
            orientation: potrait;
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
            padding-bottom: 80px;
        }

        table.static {
            position: relative;
            border: 1px solid #543535;
        }
    </style>

    <title>CETAK Permohonan Material Pertanggal</title>
</head>
<body>
    <div id="halaman">
        <table>
            <tr>
                <td colspan="2">
                    <img src="{{ asset('image/lambang_kt_cirebon.jpg') }}" alt="Lambang Kota Cirebon" style="width: 160px; height: 130px;">
                </td>
                <td colspan="10" align="center">
                    <font size="5">DINAS PERHUBUNGAN KOTA CIREBON</font><br>
                    <font size="5"><b>UPT PENERANGAN JALAN UMUM</b></font><br>
                    <font size="2">Jalan Rarasantang No.1 Komplek Pekantoran Bima Kesambi Cirebon 45132</font><br>
                    <img src="{{ asset('image/lg_phone.png') }}" style="width: 10px;  height: 10px;"><font size="2"> : (0231) 489717 | </font> <img src="{{ asset('image/lg_office.png') }}" style="width: 10px;  height: 10px;"> <font size="2"> : (0231) 489717 | </font> 
                    <img src="{{ asset('image/lg_wa.png') }}" style="width: 10px;  height: 10px;"><font size="2"> : 087700015151 | </font> <img src="{{ asset('image/lg_gmail.png') }}" style="width: 10px;  height: 10px;"> <font size="2"> : dishub@cirebonkota.go.id | </font> 
                    <img src="{{ asset('image/lg_facebook.png') }}" style="width: 10px;  height: 10px;"><font size="2"> : Dishub Crebon Kota | </font> <img src="{{ asset('image/lg_insta.png') }}" style="width: 10px;  height: 10px;"> <font size="2"> : dishub@cirebonkota.go.id </font> 
                </td>
            </tr>
            <tr>
                <td colspan="12"><hr> </td>
            </tr>
        </table>
        
        <table width="470">
            <center>
                <font size="4"><b>Surat Permohonan Penggunaan Material</b></font><br>
                <font size="4"><b>Tanggal {{ $tglawalFormatted }}</b></font>
            </center>
        </table>
        <br>

        <table>
            <tr>
                <td>Kepada Yth </td>
                <td>: </td>
                <td>Kepala UPT PJU</td>
            </tr>
            <tr>
                <td>Dari </td>
                <td>: </td>
                <td>TIM UPT PJU</td>
            </tr>
            <tr>
                <td>Tanggal </td>
                <td>: </td>
                <td>{{ $tanggalFormatted }}</td>
            </tr>
            <tr>
                <td>Sifat </td>
                <td>: </td>
                <td>Penting</td>
            </tr>
            <tr>
                <td>Lampiran </td>
                <td>: </td>
                <td>-</td>
            </tr>
            <tr>
                <td>Perihal </td>
                <td>: </td>
                <td>Permohonan Barang Material</td>
            </tr>
        </table>

        <table>
            <tr>
                <td width="10"> </td>
                <td>
                    <p>Disampaikan dengan hormat bahwa untuk menunjang kegiatan pelayanan pada UPT PJU Dinas Perhubungan Kota Cirebon, maka dengan ini kami mengajukan permohonan barang material sebagai berikut : </p>
                </td>
            </tr>
        </table>

    <div class="form-group">
        <table class="static" align="center" rules="all" border="1px" style="width: 95%">
            <tr align="center">
                <th>No</th>
                <th>Nama Material</th>
                <th>Jumlah Unit Terpakai</th>
                <th>Satuan</th>
                <th>Lokasi Pemakaian</th>
                <th>Keterangan</th>
                <th>Perwakilan Petugas</th>
            </tr>
            @foreach ($cetakPertanggal as $item)
                <tr>
                    <td align="center">{{ $loop->iteration }}</td>
                    <td>{{ $item->nm_brg }}</td>
                    <td align="center">{{ $item->unit_pakai }}</td>
                    <td align="center">{{ $item->stn_pakai }}</td>
                    <td>{{ $item->lokasi_pakai }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td align="center">{{ $item->nm_pgw }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <br>

    <table>
        <tr>
            <td width="70"> </td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>Demikian atas perhatiannya, kami sampaikan terima kasih</td>
        </tr>
    </table><br><br>

<div>
    <div style="width:50%; text-align: left; float: left;">
        <center>
            <br>
        Kepala UPT PJU<br>
        Dinas Perhubungan<br>
        Kota Cirebon<br>
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
    <div style="width:30%; text-align: left; float: right;">
        <center>
        Cirebon, {{ $tanggalFormatted }} <br>
        TIM UPT PJU<br>
        Dinas Perhubungan<br>
        Kota Cirebon<br>
        <br>
        <br>
        <br>
        <br>
        ....................<br>
    </center>
    </div>
</div>
</div>
    

    <script type="text/javascript">
    window.print();
    </script>
</body>
</html>