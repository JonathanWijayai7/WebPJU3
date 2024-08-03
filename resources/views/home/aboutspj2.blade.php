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
    Informasi Tambahan terkait SIPELAJU
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

<body class="about-us bg-gray-200">
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
          <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuBlocks" data-bs-toggle="dropdown" aria-expanded="false">
          <b>Informasi</b>
            <img src="{{asset('pjuprofil/assets/img/down-arrow-white.svg')}}" alt="down-arrow" class="arrow ms-2 d-lg-block d-none">
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive p-3 border-radius-lg mt-0 mt-lg-3" aria-labelledby="dropdownMenuBlocks">
            <div class="d-none d-lg-block">
  <li class="nav-item dropdown dropdown-hover dropdown-subitem">
    <a class="dropdown-item py-2 ps-3 border-radius-md">
      <div class="w-100 d-flex align-items-center justify-content-between">
        <div>
          <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Tentang SIPELAJU</h6>
          <span class="text-sm">Informasi mengenai SIPELAJU</span>
        </div>
        <img src="{{asset('pjuprofil/assets/img/down-arrow.svg')}}" alt="down-arrow" class="arrow">
      </div>
    </a>
    <div class="dropdown-menu mt-0 py-3 px-2 mt-3">
      <a class="dropdown-item ps-3 border-radius-md mb-1" href="aboutsipelaju1">
        Apa itu SIPELAJU?
      </a>
      <a class="dropdown-item ps-3 border-radius-md mb-1" href="aboutsipelaju2">
        Info Tambahan terkait SIPELAJU
      </a>
    </div>
  </li>

  <li class="nav-item dropdown dropdown-hover dropdown-subitem">
    <a class="dropdown-item py-2 ps-3 border-radius-md" >
      <div class="w-100 d-flex align-items-center justify-content-between">
        <div>
          <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Tentang UPT PJU Cirebon</h6>
          <span class="text-sm">Informasi terkait UPT PJU Kota Cirebon</span>
        </div>
        <img src="{{asset('pjuprofil/assets/img/down-arrow.svg')}}" alt="down-arrow" class="arrow">
      </div>
    </a>
    <div class="dropdown-menu mt-0 py-3 px-2 mt-3">
      <a class="dropdown-item ps-3 border-radius-md mb-1" href="aboutpjucirebon1">
        Mengenal UPT PJU Kota Cirebon
      </a>
      <a class="dropdown-item ps-3 border-radius-md mb-1" href="aboutpjucirebon2">
        Struktur Organisasi UPT PJU Kota Cirebon
      </a>
      <a class="dropdown-item ps-3 border-radius-md mb-1" href="aboutpjucirebon3">
        Informasi tambahan UPT PJU Kota Cirebon
      </a>
    </div>
  </li>
          </ul>
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
  <!-- -------- START HEADER 7 w/ text and video ------- -->
  <header class="bg-gradient-dark">
    <div class="page-header min-vh-75" style="background-image: url({{asset('pjuprofil/assets/img/bg9.jpg')}});">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 text-center mx-auto my-auto">
            <h1 class="text-white">Info Tambahan terkait SIPELAJU</h1>
            <p class="lead mb-4 text-white opacity-8">We’re constantly trying to express ourselves and actualize our dreams. If you have the opportunity to play this game</p>
            <button type="submit" class="btn bg-white text-dark">Create Account</button>
            <h6 class="text-white mb-2 mt-5">Find us on</h6>
            <div class="d-flex justify-content-center">
              <a href="javascript:;"><i class="fab fa-facebook text-lg text-white me-4"></i></a>
              <a href="javascript:;"><i class="fab fa-instagram text-lg text-white me-4"></i></a>
              <a href="javascript:;"><i class="fab fa-twitter text-lg text-white me-4"></i></a>
              <a href="javascript:;"><i class="fab fa-google-plus text-lg text-white"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- -------- END HEADER 7 w/ text and video ------- -->
  <div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6">
    <!-- Section with four info areas left & one card right with image and waves -->
    <section class="py-7">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="row justify-content-start">
              <div class="col-md-6">
                <div class="info">
                  <i class="material-icons text-3xl text-gradient text-info mb-3">public</i>
                  <h5>Fully integrated</h5>
                  <p>We get insulted by others, lose trust for those We get back freezes</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info">
                  <i class="material-icons text-3xl text-gradient text-info mb-3">payments</i>
                  <h5>Payments functionality</h5>
                  <p>We get insulted by others, lose trust for those We get back freezes</p>
                </div>
              </div>
            </div>
            <div class="row justify-content-start mt-4">
              <div class="col-md-6">
                <div class="info">
                  <i class="material-icons text-3xl text-gradient text-info mb-3">apps</i>
                  <h5>Prebuilt components</h5>
                  <p>We get insulted by others, lose trust for those We get back freezes</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info">
                  <i class="material-icons text-3xl text-gradient text-info mb-3">3p</i>
                  <h5>Improved platform</h5>
                  <p>We get insulted by others, lose trust for those We get back freezes</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 ms-auto mt-lg-0 mt-4">
            <div class="card">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <a class="d-block blur-shadow-image">
                  <img src="https://images.unsplash.com/photo-1544717302-de2939b7ef71?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="img-colored-shadow" class="img-fluid border-radius-lg">
                </a>
              </div>
              <div class="card-body text-center">
                <h5 class="font-weight-normal">
                  <a href="javascript:;">Get insights on Search</a>
                </h5>
                <p class="mb-0">
                  Website visitors today demand a frictionless user expericence — especially when using search. Because of the hight standards.
                </p>
                <button type="button" class="btn bg-gradient-info btn-sm mb-0 mt-3">Find out more</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END Section with four info areas left & one card right with image and waves -->
    <!-- -------- START Features w/ pattern background & stats & rocket -------- -->
    <section class="pb-5 position-relative bg-gradient-dark mx-n3">
      <div class="container">
        <div class="row">
          <div class="col-md-8 text-start mb-5 mt-5">
            <h3 class="text-white z-index-1 position-relative">The Executive Team</h3>
            <p class="text-white opacity-8 mb-0">There’s nothing I really wanted to do in life that I wasn’t able to get good at. That’s my skill.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-12">
            <div class="card card-profile mt-4">
              <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mt-n5">
                  <a href="javascript:;">
                    <div class="p-3 pe-md-0">
                      <img class="w-100 border-radius-md shadow-lg" src="{{asset('pjuprofil/assets/img/team-5.jpg')}}" alt="image">
                    </div>
                  </a>
                </div>
                <div class="col-lg-8 col-md-6 col-12 my-auto">
                  <div class="card-body ps-lg-0">
                    <h5 class="mb-0">Emma Roberts</h5>
                    <h6 class="text-info">UI Designer</h6>
                    <p class="mb-0">Artist is a term applied to a person who engages in an activity deemed to be an art.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-12">
            <div class="card card-profile mt-lg-4 mt-5">
              <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mt-n5">
                  <a href="javascript:;">
                    <div class="p-3 pe-md-0">
                      <img class="w-100 border-radius-md shadow-lg" src="{{asset('pjuprofil/assets/img/bruce-mars.jpg')}}" alt="image">
                    </div>
                  </a>
                </div>
                <div class="col-lg-8 col-md-6 col-12 my-auto">
                  <div class="card-body ps-lg-0">
                    <h5 class="mb-0">William Pearce</h5>
                    <h6 class="text-info">Boss</h6>
                    <p class="mb-0">Artist is a term applied to a person who engages in an activity deemed to be an art.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-lg-6 col-12">
            <div class="card card-profile mt-4 z-index-2">
              <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mt-n5">
                  <a href="javascript:;">
                    <div class="p-3 pe-md-0">
                      <img class="w-100 border-radius-md shadow-lg" src="{{asset('pjuprofil/assets/img/ivana-squares.jpg')}}" alt="image">
                    </div>
                  </a>
                </div>
                <div class="col-lg-8 col-md-6 col-12 my-auto">
                  <div class="card-body ps-lg-0">
                    <h5 class="mb-0">Ivana Flow</h5>
                    <h6 class="text-info">Athlete</h6>
                    <p class="mb-0">Artist is a term applied to a person who engages in an activity deemed to be an art.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-12">
            <div class="card card-profile mt-lg-4 mt-5 z-index-2">
              <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mt-n5">
                  <a href="javascript:;">
                    <div class="p-3 pe-md-0">
                      <img class="w-100 border-radius-md shadow-lg" src="{{asset('pjuprofil/assets/img/ivana-square.jpg')}}" alt="image">
                    </div>
                  </a>
                </div>
                <div class="col-lg-8 col-md-6 col-12 my-auto">
                  <div class="card-body ps-lg-0">
                    <h5 class="mb-0">Marquez Garcia</h5>
                    <h6 class="text-info">JS Developer</h6>
                    <p class="mb-0">Artist is a term applied to a person who engages in an activity deemed to be an art.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- -------- END Features w/ pattern background & stats & rocket -------- -->
    <section class="pt-4 pb-6" id="count-stats">
      <div class="container">
        <div class="row mb-7">
          <div class="col-lg-2 col-md-4 col-6 mb-4">
            <img class="w-100 opacity-7" src="{{asset('pjuprofil/assets/img/logos/gray-logos/logo-coinbase.svg')}}" alt="logo">
          </div>
          <div class="col-lg-2 col-md-4 col-6 mb-4">
            <img class="w-100 opacity-7" src="{{asset('pjuprofil/assets/img/logos/gray-logos/logo-nasa.svg')}}" alt="logo">
          </div>
          <div class="col-lg-2 col-md-4 col-6 mb-4">
            <img class="w-100 opacity-7" src="{{asset('pjuprofil/assets/img/logos/gray-logos/logo-netflix.svg')}}" alt="logo">
          </div>
          <div class="col-lg-2 col-md-4 col-6 mb-4">
            <img class="w-100 opacity-7" src="{{asset('pjuprofil/assets/img/logos/gray-logos/logo-pinterest.svg')}}" alt="logo">
          </div>
          <div class="col-lg-2 col-md-4 col-6 mb-4">
            <img class="w-100 opacity-7" src="{{asset('pjuprofil/assets/img/logos/gray-logos/logo-spotify.svg')}}" alt="logo">
          </div>
          <div class="col-lg-2 col-md-4 col-6 mb-4">
            <img class="w-100 opacity-7" src="{{asset('pjuprofil/assets/img/logos/gray-logos/logo-vodafone.svg')}}" alt="logo">
          </div>
        </div>
        <div class="row justify-content-center text-center">
          <div class="col-md-3">
            <h1 class="text-gradient text-info" id="state1" countTo="5234">0</h1>
            <h5>Projects</h5>
            <p>Of “high-performing” level are led by a certified project manager</p>
          </div>
          <div class="col-md-3">
            <h1 class="text-gradient text-info"><span id="state2" countTo="3400">0</span>+</h1>
            <h5>Hours</h5>
            <p>That meets quality standards required by our users</p>
          </div>
          <div class="col-md-3">
            <h1 class="text-gradient text-info"><span id="state3" countTo="24">0</span>/7</h1>
            <h5>Support</h5>
            <p>Actively engage team members that finishes on time</p>
          </div>
        </div>
      </div>
    </section>
    <!-- -------- START PRE-FOOTER 1 w/ SUBSCRIBE BUTTON AND IMAGE ------- -->
    <section class="my-5 pt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-6 m-auto">
            <h4>Be the first to see the news</h4>
            <p class="mb-4">
              Your company may not be in the software business,
              but eventually, a software company will be in your business.
            </p>
            <div class="row">
              <div class="col-8">
                <div class="input-group input-group-outline">
                  <label class="form-label">Email Here...</label>
                  <input type="text" class="form-control mb-sm-0">
                </div>
              </div>
              <div class="col-4 ps-0">
                <button type="button" class="btn bg-gradient-info mb-0 h-100 position-relative z-index-2">Subscribe</button>
              </div>
            </div>
          </div>
          <div class="col-md-5 ms-auto">
            <div class="position-relative">
              <img class="max-width-50 w-100 position-relative z-index-2" src="{{asset('pjuprofil/assets/img/macbook.png')}}" alt="image">
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- -------- END PRE-FOOTER 1 w/ SUBSCRIBE BUTTON AND IMAGE ------- -->
  </div>
  <footer class="footer pt-5 mt-5">
    <div class="container">
      <div class=" row">
        <div class="col-md-3 mb-4 ms-auto">
          <div>
            <a href="https://www.creative-tim.com/product/material-kit">
              <img src="{{asset('pjuprofil/assets/img/logo-ct-dark.png')}}" class="mb-3 footer-logo" alt="main_logo">
            </a>
            <h6 class="font-weight-bolder mb-4">Material Kit 2</h6>
          </div>
          <div>
            <ul class="d-flex flex-row ms-n3 nav">
              <li class="nav-item">
                <a class="nav-link pe-1" href="https://www.facebook.com/CreativeTim" target="_blank">
                  <i class="fab fa-facebook text-lg opacity-8"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pe-1" href="https://twitter.com/creativetim" target="_blank">
                  <i class="fab fa-twitter text-lg opacity-8"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pe-1" href="https://dribbble.com/creativetim" target="_blank">
                  <i class="fab fa-dribbble text-lg opacity-8"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pe-1" href="https://github.com/creativetimofficial" target="_blank">
                  <i class="fab fa-github text-lg opacity-8"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pe-1" href="https://www.youtube.com/channel/UCVyTG4sCw-rOvB9oHkzZD1w" target="_blank">
                  <i class="fab fa-youtube text-lg opacity-8"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-2 col-sm-6 col-6 mb-4">
          <div>
            <h6 class="text-sm">Company</h6>
            <ul class="flex-column ms-n3 nav">
              <li class="nav-item">
                <a class="nav-link" href="https://www.creative-tim.com/presentation" target="_blank">
                  About Us
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.creative-tim.com/templates/free" target="_blank">
                  Freebies
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.creative-tim.com/templates/premium" target="_blank">
                  Premium Tools
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.creative-tim.com/blog" target="_blank">
                  Blog
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-2 col-sm-6 col-6 mb-4">
          <div>
            <h6 class="text-sm">Resources</h6>
            <ul class="flex-column ms-n3 nav">
              <li class="nav-item">
                <a class="nav-link" href="https://iradesign.io/" target="_blank">
                  Illustrations
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.creative-tim.com/bits" target="_blank">
                  Bits & Snippets
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.creative-tim.com/affiliates/new" target="_blank">
                  Affiliate Program
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-2 col-sm-6 col-6 mb-4">
          <div>
            <h6 class="text-sm">Help & Support</h6>
            <ul class="flex-column ms-n3 nav">
              <li class="nav-item">
                <a class="nav-link" href="https://www.creative-tim.com/contact-us" target="_blank">
                  Contact Us
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.creative-tim.com/knowledge-center" target="_blank">
                  Knowledge Center
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://services.creative-tim.com/?ref=ct-mk2-footer" target="_blank">
                  Custom Development
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.creative-tim.com/sponsorships" target="_blank">
                  Sponsorships
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-2 col-sm-6 col-6 mb-4 me-auto">
          <div>
            <h6 class="text-sm">Legal</h6>
            <ul class="flex-column ms-n3 nav">
              <li class="nav-item">
                <a class="nav-link" href="https://www.creative-tim.com/knowledge-center/terms-of-service" target="_blank">
                  Terms & Conditions
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.creative-tim.com/knowledge-center/privacy-policy" target="_blank">
                  Privacy Policy
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.creative-tim.com/license" target="_blank">
                  Licenses (EULA)
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-12">
          <div class="text-center">
            <p class="text-dark my-4 text-sm font-weight-normal">
              All rights reserved. Copyright © <script>
                document.write(new Date().getFullYear())
              </script> Material Kit by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
            </p>
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
  <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <script src="{{asset('pjuprofil/assets/js/material-kit.min.js?v=3.0.4')}}" type="text/javascript"></script>
  <script>
    // get the element to animate
    var element = document.getElementById('count-stats');
    var elementHeight = element.clientHeight;

    // listen for scroll event and call animate function

    document.addEventListener('scroll', animate);

    // check if element is in view
    function inView() {
      // get window height
      var windowHeight = window.innerHeight;
      // get number of pixels that the document is scrolled
      var scrollY = window.scrollY || window.pageYOffset;
      // get current scroll position (distance from the top of the page to the bottom of the current viewport)
      var scrollPosition = scrollY + windowHeight;
      // get element position (distance from the top of the page to the bottom of the element)
      var elementPosition = element.getBoundingClientRect().top + scrollY + elementHeight;

      // is scroll position greater than element position? (is element in view?)
      if (scrollPosition > elementPosition) {
        return true;
      }

      return false;
    }

    var animateComplete = true;
    // animate element when it is in view
    function animate() {

      // is element in view?
      if (inView()) {
        if (animateComplete) {
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
          animateComplete = false;
        }
      }
    }

    if (document.getElementById('typed')) {
      var typed = new Typed("#typed", {
        stringsElement: '#typed-strings',
        typeSpeed: 90,
        backSpeed: 90,
        backDelay: 200,
        startDelay: 500,
        loop: true
      });
    }
  </script>
  <script>
    if (document.getElementsByClassName('page-header')) {
      window.onscroll = debounce(function() {
        var scrollPosition = window.pageYOffset;
        var bgParallax = document.querySelector('.page-header');
        var oVal = (window.scrollY / 3);
        bgParallax.style.transform = 'translate3d(0,' + oVal + 'px,0)';
      }, 6);
    }
  </script>
</body>

</html>