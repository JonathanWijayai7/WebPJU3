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
    Form Pengaduan - UPT PJU Kota Cirebon
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

<body class="contact-us">
  <!-- Navbar -->
  <div class="container position-sticky z-index-sticky top-0"><div class="row"><div class="col-12">
<nav class="navbar navbar-expand-lg  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
  <div class="container-fluid px-0">
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
            Dashboard
          </a>
        </li>

        <li class="nav-item mx-2">
          <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" href="riwayat">
            Riwayat Pengaduan
          </a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" href="formmasuk">
            <b>Ajukan Pengaduan</b>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
</div></div></div>
  <!-- -------- START HEADER 8 w/ card over right bg image ------- -->
  <section>
    <div class="page-header min-vh-100">
      <div class="container" style="color: darkblue">
        <div class="row">
          <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
            <div class="position-relative h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url({{asset('image/bg_card3.jpeg')}}); background-size: cover;" loading="lazy"></div>
          </div>
          <div class="col-xl-5 col-lg-6 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
            <div class="card d-flex blur justify-content-center shadow-lg my-sm-0 my-sm-6 mt-8 mb-5">
              <div class="card-header p-0 position-relative mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-info shadow-primary border-radius-lg p-3">
                  <h3 class="text-white text-primary mb-0">Formulir Pengaduan PJU Online</h3>
                </div>
              </div>
              <div class="card-body">
                <p class="pb-3">
                  <b>Silahkan Masukan Keterangan Pengaduan saudara apabila mendapati PJU bermasalah.
                    Mohon mengisi semua rincian dibawah sedetil mungkin.
                    </b>
                </p>
                <p class="pb-3">
                  <b>
                    Untuk Titik maps PJU yang bermasalah bisa langsung menyalin dari koordinat / patokan lokasi terdekat di google maps atau dikosongkan dengan mengisi tanda strip "-"</b>
                </p>
                @if(session()->has('message'))
            <div class="alert alert-success">
            {{ session()->get('message') }}
            </div>
            @endif

                <form action="{{ route('formmasuk.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body p-0 my-3">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="input-group input-group-static mb-4">
                          <label><b>1. Nama Lengkap<font color="red">*</font></b></label>
                          <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                        </div>
                      </div>
                      <div class="col-md-6 ps-md-2">
                        <div class="input-group input-group-static mb-4">
                          <label><b>2. Tanggal Pengaduan<font color="red">*</font></b></label>
                          <div class="input-group input-group-static">
                            <span class="input-group-text"></i></span>
                            <input class="form-control datepicker" placeholder="Tanggal Hari Ini" type="date" name="tgl_lapor">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="input-group input-group-static mb-4">
                          <label><b>3. Nomor Telepon<font color="red">*</font></b></label>
                          <input type="text" class="form-control" name="no_tlp" placeholder="Nomor Telepon">
                        </div>
                      </div>
                      <div class=" form-group col-md-6 ps-md-2">
                        <div class="input-group input-group-static mb-4">
                          <label><b>4. Alamat Responden<font color="red">*</font></b></label>
                          <textarea name="alamat" class="form-control" id="" rows="2" placeholder="Masukkan Alamat Rumah Anda"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group mb-0 mt-md-0 mt-4">
                        <div class="input-group input-group-static mb-4">
                          <label><b>5. Detail Masalah<font color="red">*</font></b></label>
                          <textarea name="masalah" class="form-control" id="" rows="4" placeholder="Detailkan Masalah PJU yang Anda Temukan"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row" style="display: none;">
                      <div class="col-md-6">
                        <div class="input-group input-group-static mb-4">
                          <label for="skala_id">Skala Penanganan<font color="red">*</font></label>
                          <select name="skala_id" id="skala_id" class="form-control">
                          @foreach($skalas as $skala)
                          <option value="{{ $skala->id }}">{{ $skala->skala }}</option>
                          @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6 ps-md-2">
                        <div class="input-group input-group-static mb-4">
                          <label for="penanganan_id">Realisasi<font color="red">*</font></label>
                          <select name="penanganan_id" id="penanganan_id" class="form-control">
                          @foreach($penanganans as $penanganan)
                          <option value="{{ $penanganan->id }}">{{ $penanganan->s_penanganan }}</option>
                          @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row" style="display: none;">
                      <div class="col-md-6">
                        <div class="input-group input-group-static mb-4">
                          <label for="validasi_id">Validasi Kepala UPT<font color="red">*</font></label>
                        <select name="validasi_id" id="validasi_id" class="form-control">
                        @foreach($validasis as $validasi)
                        <option value="{{ $validasi->id }}">{{ $validasi->s_validasi }}</option>
                        @endforeach
                        </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group mb-0 mt-md-0 mt-4">
                        <div class="input-group input-group-static mb-4">
                          <label><b>6. Lokasi Titik Lampu<font color="red">*</font></b></label>
                          <textarea name="lokasi" class="form-control" id="" rows="2" placeholder="Masukkan informasi lokasi PJU yang bermasalah"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="input-group input-group-static mb-4">
                          <label for="kec_id"><b>7. Kecamatan Titik Lampu<font color="red">*</font></b></label>
                          <select name="kec_id" id="kec_id" class="form-control">
                              @foreach($kecamatans as $kecamatan)
                                  <option value="{{ $kecamatan->id }}">{{ $kecamatan->nm_kecamatan }}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6 ps-md-2">
                        <div class="input-group input-group-static mb-4">
                          <label for="kel_id"><b>8. Kelurahan Titik Lampu<font color="red">*</font></b></label>
                          <select name="kel_id" id="kel_id" class="form-control">
                          @foreach($kelurahans as $kelurahan)
                          <option value="{{ $kelurahan->id }}">{{ $kelurahan->nm_kelurahan }}</option>
                          @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group mb-0 mt-md-0 mt-4">
                        <div class="input-group input-group-static mb-4">
                          <label><b>9. Titik Maps PJU Bermasalah<font color="red">*</font></b></label>
                          <textarea name="maps" class="form-control" id="" rows="2" placeholder="Masukkan salinan koordinat / lokasi terdekat dari google maps"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row" style="display: none;">
                      <div class="form-group mb-0 mt-md-0 mt-4">
                        <div class="input-group input-group-static mb-4">
                          <label><b>Deskripsi Perbaikan<font color="red">*</font></b></label>
                          <textarea name="deskripsi" class="form-control" id="" rows="2" placeholder="Masukkan informasi lokasi PJU yang bermasalah">-</textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="input-group input-group-static mb-4">
                          <label><b>10. Foto Kondisi PJU<font color="red">*</font></b></label>
                          <input type="file" class="form-control" name="ft_pju" placeholder="Upload gambar disini">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 text-center">
                        <button type="submit" class="btn bg-gradient-info mt-3 mb-0">Kirim Pengaduan</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- -------- END HEADER 8 w/ card over right bg image ------- -->
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
  <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <script src="{{asset('pjuprofil/assets/js/material-kit.min.js?v=3.0.4')}}" type="text/javascript"></script>
</body>

</html>