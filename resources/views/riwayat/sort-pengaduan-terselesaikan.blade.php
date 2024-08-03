<!--
=========================================================
* Material Kit 2 - v3.0.4
=========================================================

* Product Page:  https://www.creative-tim.com/product/material-kit 
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('pjuprofil/assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('pjuprofil/assets/img/favicon.png')}}">
  <title>
    Riwayat Pengaduan - SIPELAJU
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{asset('pjuprofil/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('pjuprofil/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('pjuprofil/assets/css/material-kit.css?v=3.0.4')}}" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="blog-author bg-gray-200">
  <!-- Navbar Transparent -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent ">
    <div class="container">
      <a class="navbar-brand  text-white " href="/">
        SIPELAJU - UPT PJU Kota Cirebon
      </a>
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0 ms-lg-12 ps-lg-5" id="navigation">
        <ul class="navbar-nav navbar-nav-hover ms-auto">
        <li class="nav-item mx-2">
          <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" href="/">
            Dashboard
          </a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" href="riwayat">
            <b>Riwayat Pengaduan</b>
          </a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" href="formmasuk">
            Ajukan Pengaduan
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  <!-- End Navbar -->
  <!-- -------- START HEADER 4 w/ search book a ticket form ------- -->
  <header>
    <div class="page-header min-height-400" style="background-image: url({{asset('pjuprofil/assets/img/city-profile.jpg')}});" loading="lazy">
      <span class="mask bg-gradient-dark opacity-8"></span>
    </div>
  </header>
  <!-- -------- END HEADER 4 w/ search book a ticket form ------- -->
  <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6 mb-4">
    <!-- START Testimonials w/ user image & text & info -->
    <section class="py-sm-7 py-5 position-relative">
      <div class="container">
        <div class="row">
          <div class="col-12 mx-auto">
            <div class="mt-n8 mt-md-n9 text-center">
              <img class="avatar avatar-xxl shadow-xl position-relative z-index-2" src="{{asset('image/lg_riwayat.png')}}" loading="lazy">
            </div>
            <div class="row py-5">
              <div class="col-lg-7 text-center mx-auto">
                <h1 class="text pt-3 mt-n5">Riwayat Pengaduan</h1>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-7 text-center mx-auto">
                <h5>Lihat semua pengaduan PJU Kota Cirebon dari publik <br/> Serta melihat status pengaduan yang sudah masuk melalui formulir online</h5>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END Testimonials w/ user image & text & info -->
    <!-- START Blogs w/ 4 cards w/ image & text & link -->

    <section class="py-3">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h3 class="mb-5">Daftar Pengaduan Yang Sudah Terselesaikan</h3>
          </div>
        </div>
        <div class="row">
          @foreach ($pengaduans as $item)
          <div class="col-lg-3 col-sm-6">
            <div class="card mb-5">
              <div class="card-header p-0 position-relative">
                <a class="d-block blur-shadow-image">
                  <img src="/img_lapor/{{$item->ft_pju}}" class="img-fluid shadow border-radius-lg" style="width: 100%; height: 150px; object-fit: cover;">
                </a>
              </div>
              <div class="card-body">
                <h5>
                  <a class="text-dark font-weight-bold">{{$item->nama}}</a>
                </h5>
                <p> <i class="fas fa-solid fa-map-pin"></i> Lokasi : {{$item->lokasi}}</p>
                <p>Kecamatan : {{$item->nm_kecamatan}}</p>
                <p>Kelurahan : {{$item->nm_kelurahan}}</p>
                <p align="right">
                  <i>{{$item->tgl_lapor}}</i>
                </p>
                <a href="#" class="text-info text-sm icon-move-right" data-bs-toggle="modal" data-bs-target="#detailModal{{$item->id}}">
                  Detail Status 
                  <i class="fas fa-arrow-right text-xs ms-1"></i>
              </a>
              </div>
            </div>
          </div>
          <!-- Modal for each pengaduan -->
<div class="modal fade" id="detailModal{{$item->id}}" tabindex="-1" aria-labelledby="detailModalLabel{{$item->id}}" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="detailModalLabel{{$item->id}}">Detail Pengaduan {{$item->id}}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <p>Nama Pelapor: {{$item->nama}}</p>
              <p>Tanggal Pengaduan: <i>{{$item->tgl_lapor}}</i></p>
              <p>No Telepon: {{$item->no_tlp}}</p>
              <p>Masalah: {{$item->masalah}}</p>
              <p>Skala: {{$item->skala}}</p>
              <p>Realisasi: {{$item->s_penanganan}}</p>
              <p>Validasi: {{$item->s_validasi}}</p>
              <p>Lokasi: {{$item->lokasi}}</p>
              <p>Kecamatan: {{$item->nm_kecamatan}}</p>
              <p>Kelurahan: {{$item->nm_kelurahan}}</p>
              <p>Titik Map PJU: {{$item->maps}}</p>
              <p>Deskripsi Perbaikan: {{$item->deskripsi}}</p>
              <p>Foto Kondisi PJU: </p>
              <img src="/img_lapor/{{$item->ft_pju}}" alt="" class="img-fluid" sizes="80%">
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          </div>
      </div>
  </div>
</div>
          @endforeach
        </div>
        <div class="pagination">
          {{ $pengaduans->links('pagination::bootstrap-4') }}
      </div>
      </div>
    </section>

    <!-- END Blogs w/ 4 cards w/ image & text & link -->
  </div>
  
  <!-- -------- START FOOTER 5 w/ DARK BACKGROUND ------- -->
<footer class="footer py-5">
  <div class="container">
    <div class=" row">
      <div class="col-md-4 mb-4 ms-auto">
        <div>
            <img src="{{asset('image/lg_dishub.png')}}" class="mb-3 footer-logo" >
          </a>
          <h5 class="font-weight-bolder mb-4">SIPELAJU - UPT PJU Kota Cirebon</h5>
        </div>
        <div>
          <ul class="flex-column ms-n3 nav">
            <li class="nav-item">
              <a class="nav-link">
                Jl. Dukuh Semar No.9, Drajat, Kec. Kesambi, Kota Cirebon, Jawa Barat 45133
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://maps.app.goo.gl/iq9Vva6P1Ma7TvS27">
                Titik Maps
              </a>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-md-2 col-sm-6 col-6 mb-4">
        <div>
          <h6 class="text-sm">Hubungi Layanan Darurat</h6>
          <ul class="flex-column ms-n3 nav">
            <li class="nav-item">
              <a class="nav-link">
                112
              </a>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-md-2 col-sm-6 col-6 mb-4">
        <div>
          <h6 class="text-sm">Call Center UPT PJU Kota Cirebon</h6>
          <ul class="flex-column ms-n3 nav">
            <li class="nav-item">
              <table>
                <td><img src="{{ asset('image/lg_wa.png') }}" width="30px" height="30px"> </td>
                <td><a class="nav-link" href="https://wa.me/6281514082424" target="_blank">
                  Whatsapp (Aji)
                </a></td>
              </table>
            </li>

          </ul>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-6 mb-4">
        <div>
          <h6 class="text-sm">Kunjungi Media Sosial Dinas Perhubungan</h6>
          <ul class="flex-column ms-n3 nav">
            <li class="nav-item">
              <table>
                <td><img src="{{ asset('image/lg_insta.png') }}" width="30px" height="30px"> </td>
                <td><a class="nav-link" href="https://www.instagram.com/dishubcirebonkota/" target="_blank">
                  Instagram
                </a></td>
              </table>
            </li>
            <br>

            <li class="nav-item">
              <table>
                <td><img src="{{ asset('image/lg_facebook.png') }}" width="30px" height="30px"> </td>
                <td><a class="nav-link" href="https://www.facebook.com/dishubcirebonkota" target="_blank">
                  Facebook
                </a></td>
              </table>
            </li><br>

            <li class="nav-item">
              <table>
                <td><img src="{{ asset('image/lg_linktree.png') }}" width="30px" height="30px"> </td>
                <td><a class="nav-link" href="https://linktr.ee/DishubCirebonKota" target="_blank">
                  Linktree Dishub Kota Cirebon
                </a></td>
              </table>
            </li>

          </ul>
        </div>
      </div>
      
      <div class="col-12">
        <div class="display: none;">
          <div class="text-center">
            <p class="text-dark my-3 text-sm font-weight-normal">
            SIPELAJU - UPT PJU Kota Cirebon
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
  <!-- -------- END FOOTER 5 w/ DARK BACKGROUND ------- -->
  <!--   Core JS Files   -->
  <script src="{{asset('pjuprofil/assets/js/core/popper.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('pjuprofil/assets/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('pjuprofil/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <script src="{{asset('pjuprofil/assets/js/material-kit.min.js?v=3.0.4')}}" type="text/javascript"></script>

</body>

</html>