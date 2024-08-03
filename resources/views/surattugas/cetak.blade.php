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

    <title>CETAK SURAT TUGAS</title>
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
                <font size="4"><b><u>SURAT TUGAS</u></b></font>
            </center>
        </table>
        <br><br>
        <table>
            <tr>
                <td>Nama </td>
                <td>: </td>
                <td><b><u>SURYA AGUNG HERMAWAN. ST.,MT</u></b></td>
            </tr>
            <tr>
                <td>NIP </td>
                <td>: </td>
                <td>19770421 201001 1 004</td>
            </tr>
            <tr>
                <td>Pangkat/Golongan </td>
                <td>: </td>
                <td>Penata Tingkat I - III/d</td>
            </tr>
            <tr>
                <td>Jabatan </td>
                <td>: </td>
                <td>Kepala UPT Penerangan Jalan Umum</td>
            </tr>
        </table>
        <br><br>
        <table width="470">
            <center>
                <font size="4"><b><u>M E M E R I N T A H K A N</u></b></font>
            </center>
        </table>

        <div>
            <table>
                <tr>
                    <td width="100">Kepada </td>
                    <td>: </td>
                </tr>
                <tr>
                    <td width="100"></td>
                    <td>
                        <table width="300" class="static" rules="all" border="1px">
                            <tr>
                                <td align="center">Daftar Petugas</td>
                            </tr>
                            <tr>
                                <td align="center">{{$surattgs->petugas1}}</td>
                            </tr>
                            <tr>
                                <td align="center">{{$surattgs->petugas2}}</td>
                            </tr>
                            <tr>
                                <td align="center">{{$surattgs->petugas3}}</td>
                            </tr>
                            <tr>
                                <td align="center">{{$surattgs->petugas4}}</td>
                            </tr>
                            <tr>
                                <td align="center">{{$surattgs->petugas5}}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <br><br>

        <table>
            <tr>
                <td width="100">Untuk</td>
                <td>:</td>
                <td>Melaksanakan Perbaikan Lampu Penerangan Jalan Umum di :</td>
            </tr>
        </table>

    <div class="form-group">
        <table class="static" align="center" rules="all" border="1px" style="width: 95%">
            <tr>
                <th width="200">Daftar Lokasi</th>
                <th width="200">Deskripsi Perbaikan</th>
            </tr>
            <tr>
                <td height="100">{{$surattgs->tujuan1}}</td>
                <td height="100"></td>
            </tr>
            <tr>
                <td height="100">{{$surattgs->tujuan2}}</td>
                <td height="100"></td>
            </tr>
            <tr>
                <td height="100">{{$surattgs->tujuan3}}</td>
                <td height="100"></td>
            </tr>
            <tr>
                <td height="100">{{$surattgs->tujuan4}}</td>
                <td height="100"></td>
            </tr>
            <tr>
                <td height="100">{{$surattgs->tujuan5}}</td>
                <td height="100"></td>
            </tr>
            <tr>
                <td height="100">{{$surattgs->tujuan6}}</td>
                <td height="100"></td>
            </tr>
            <tr>
                <td height="100">{{$surattgs->tujuan7}}</td>
                <td height="100"></td>
            </tr>
        </table>
    </div>
    <br>
    <br>

    <table>
        <tr>
            <td width="70"> </td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>Demikian Surat Perintah ini dibuat untuk dilaksanakan dengan penuh tanggung jawab</td>
        </tr>
    </table><br><br>

    <div>
        <div style="width:30%; text-align: left; float: left;">
            <table width="200" class="static" rules="all" border="1px">
                <tr>
                    <th><u>PENTING : </u> LAPORKAN SETIAP TITIK PJU YANG DIPERBAIKI, BARANG YANG DIGUNAKAN, BERIKUT TANDA TANGAN WARGA SEKITAR UNTUK PERTANGGUNGJAWABAN</th>
                </tr>
            </table>
        </div>
    </div>

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
</div>

    <script type="text/javascript">
    window.print();
    </script>
</body>
</html>