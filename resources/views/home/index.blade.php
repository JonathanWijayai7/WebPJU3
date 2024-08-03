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
  

  
Dashboard - SIPELAJU

  
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

<body class="index-page bg-gray-200">
  
  
  <!-- Navbar -->
<div class="container position-sticky z-index-sticky top-0"><div class="row"><div class="col-12">
<nav class="navbar navbar-expand-lg  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
  <div class="container-fluid px-0">
    <div class="col" >
      <img src="{{asset('image/lg_dishub.png')}}" width="50px" height="50px">
    </div>
    <a class="navbar-brand font-weight-bolder ms-sm-3" href="/">
      SIPELAJU - UPT PJU Kota Cirebon
    </a>
    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon mt-2">
        <span class="navbar-toggler-bar bar1"></span>
        <span class="navbar-toggler-bar bar2"></span>
        <span class="navbar-toggler-bar bar3"></span>
      </span>
    </button>
    <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
      <ul class="navbar-nav navbar-nav-hover ms-auto">
        <li class="nav-item mx-2">
          <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" href="/">
            <b>Dashboard</b>
          </a>
        </li>

        <li class="nav-item mx-2">
          <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" href="{{ route('riwayat.index') }}">
            Riwayat Pengaduan
          </a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" href="{{ route('formmasuk.create') }}">
            Ajukan Pengaduan
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
</div></div></div>

  

  

    














<header class="header-2">
  <div class="page-header min-vh-75 relative" style="background-image: url('{{ asset('image/bg_pageawal.jpeg') }}')">
    <span class="mask bg-gradient-info opacity-4"></span>
    <div class="container">
    <div class="row">
        <div class="col-lg-10 text-center mx-auto">
          <h1 class="text-white pt-3 mt-n5">Selamat Datang di SIPELAJU Kota Cirebon</h1>
        </div>
      <div class="row">
        <div class="col-lg-7 text-center mx-auto">
          <p class="lead text-white mt-3">Sistem Informasi Pelayanan Pengaduan Penerangan Lampu Jalan Umum Kota Cirebon <br/> Layanan Online dari Dinas UPT PJU Kota Cirebon</p>
        </div>
      </div>
    </div>
  </div>
</header>

<div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6">

<section class="my-1 py-1">
  <div class="container">
    <div class="row">
      <div class="row justify-content-center text-center my-sm-5">
        <div class="col-lg-10">
          <h1 class="text-dark mb-0">SISTEM PELAYANAN PENGADUAN LAMPU PENERANGAN JALAN UMUM (SIPELAJU)</h1><br>
          <h4 class="lead">Merupakan sistem yang dapat menerima & memproses permintaan pengaduan masyarakat Kota Cirebon mengenai Lampu Penerangan Jalan Umum selama 24 Jam Penuh. Masyarakat dapat mengajukan pengaduan kapanpun dan mendapatkan informasi secara langsung tentang tindak lanjut laporan secara portabel. </h4>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="my-1 py-1">
  <div class="container">
    <div class="row">
      <div class="row justify-content-center text-center my-sm-2">
        <div class="col-lg-6">
          <img src="{{asset('image/lg_dishub.png')}}">
        </div>
      </div>
    </div>
  </div>
</section>

<section class="my-1 py-1">
  <div class="container">
    <div class="row">
      <div class="row justify-content-center text-center my-sm-2">
        <div class="col-lg-10">
          <h2 class="text-dark mb-0">Liputan Singkat UPT PJU Kota Cirebon dari DISHUB Kota Cirebon</h2><br>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="pt-3 pb-4">
  <div class="container">
    <div class="row">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{asset('image/bg_dash1.png')}}" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="{{asset('image/bg_dash2.png')}}" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="{{asset('image/bg_dash3.png')}}" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="{{asset('image/bg_dash4.png')}}" class="d-block w-100">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    </div>
  </div>
</section>

<section class="my-5">
  <div class="container">
    <div class="row">
      <div class="col-md-7 col-12 my-auto">
        <h3 class="text-gradient text-info mb-0">Bagaimana</h3>
        <h3>melakukan pengajuan melalui SIPELAJU?</h3>
        <p class="pe-md-5 mb-4">
          <h5>1. Pilih menu "Ajukan Pengaduan" atau tombol dibawah ini</h5>
          <a href="{{ route('formmasuk.create') }}" class="btn btn-facebook mb-0 me-2">
            <h6 style="color: white">Ajukan Pengaduan Sekarang </h6>
          </a><br><br>
          <h5>2. Isi semua informasi yang dibutuhkan formulir Pengaduan Online PJU </h5><br>
          <h5>3. Jangan lupa untuk mengirimkan gambar persis Lampu PJU yang Bermasalah </h5><br>
          <h5>4. Tekan "Kirim Pengaduan", dan pengaduan anda akan ditinjau segera. </h5><br>
        </p>
      </div>
      <div class="col-md-5 col-12 my-auto">
      <img src="{{asset('image/touch.png')}}" width="600px" height="400px">
      </div>
    </div>
  </div>
</section>

<section class="my-1 py-1">
  <div class="container">
    <div class="row">
      <div class="row justify-content-center text-center my-sm-5">
        <div class="col-lg-10">
          <h1 class="text-dark mb-0">Mengenal UPT PJU Kota Cirebon</h1><br>
          <h4 class="lead">Unit Pelaksana Teknis Penerangan jalan Umum dipimpin oleh seorang kepala dan mempunyai kepala tata usaha yang membantu. Kepala UPT PJU berkedudukan dibawah dan bertanggung jawab langsung kepada Kepala Dinas Perhubungan Kota Cirebon. </h4><br>
          <h4 class="lead">Unit Pelaksana Teknis PJU mempunyai tugas mengelola, memelihara, dan memberikan pelayanan kepada masyarakat langsung berupa penerangan dan pemeliharaan lampu jalan.</h4>
        </div>
      </div>
    </div>
  </div>
</section>



<section class="my-1 py-1">
  <div class="container">
    <div class="row">
      <div class="row justify-content-center text-center my-sm-5">
        <div class="col-lg-10">
          <h1 class="text-dark mb-0">Struktur Organisasi UPT PJU Kota Cirebon</h1><br>
            <img src="{{asset('image/struktur_organisasi.png')}}" width="800px" height="500px">

        </div>
      </div>
    </div>
  </div>
</section>







<!-- -------   START PRE-FOOTER 2 - simple social line w/ title & 3 buttons    -------- -->
<div class="py-5" style="display: none;">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 ms-auto">
        <h4 class="mb-1">Thank you for your support!</h4>
        <p class="lead mb-0">We deliver the best web products</p>
      </div>
      <div class="col-lg-5 me-lg-auto my-lg-auto text-lg-end mt-5">
        <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Kit%20made%20by%20%40CreativeTim%20%23webdesign%20%23designsystem%20%23bootstrap5&url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fmaterial-kit" class="btn btn-twitter mb-0 me-2" target="_blank">
          <i class="fab fa-twitter me-1"></i> Tweet
        </a>
        <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-kit" class="btn btn-facebook mb-0 me-2" target="_blank">
          <i class="fab fa-facebook-square me-1"></i> Share
        </a>
        <a href="https://www.pinterest.com/pin/create/button/?url=https://www.creative-tim.com/product/material-kit" class="btn btn-pinterest mb-0 me-2" target="_blank">
          <i class="fab fa-pinterest me-1"></i> Pin it
        </a>
      </div>
    </div>
  </div>
</div>
<!-- -------   END PRE-FOOTER 2 - simple social line w/ title & 3 buttons    -------- -->

</div>


  

<footer class="footer pt-5 mt-5">
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


  

  
  















<!--   Core JS Files   -->
<script src="{{asset('pjuprofil/assets/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('pjuprofil/assets/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('pjuprofil/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>




<!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
<script src="{{asset('pjuprofil/assets/js/plugins/countup.min.js')}}"></script>





<script src="{{asset('pjuprofil/assets/js/plugins/choices.min.js')}}"></script>



<script src="{{asset('pjuprofil/assets/js/plugins/prism.min.js')}}"></script>
<script src="{{asset('pjuprofil/assets/js/plugins/highlight.min.js')}}"></script>



<!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
<script src="{{asset('pjuprofil/assets/js/plugins/rellax.min.js')}}"></script>
<!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
<script src="{{asset('pjuprofil/assets/js/plugins/tilt.min.js')}}"></script>
<!--  Plugin for Selectpicker - ChoicesJS, full documentation here: https://github.com/jshjohnson/Choices -->
<script src="{{asset('pjuprofil/assets/js/plugins/choices.min.js')}}"></script>
















<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<!--  Google Maps Plugin    -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
<script src="{{asset('pjuprofil/assets/js/material-kit.min.js?v=3.0.4')}}" type="text/javascript"></script>


<script type="text/javascript">

  if (document.getElementById('state1')) {
    const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
    if (!countUp.error) {
      countUp.start();
    } else {
      console.error(countUp.error);
    }
  }
  if (document.getElementById('state2')) {
    const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
    if (!countUp1.error) {
      countUp1.start();
    } else {
      console.error(countUp1.error);
    }
  }
  if (document.getElementById('state3')) {
    const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
    if (!countUp2.error) {
      countUp2.start();
    } else {
      console.error(countUp2.error);
    };
  }
</script>


























</body>

</html>
