<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>BK Admin</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{asset('admin/css/mdb.min.css')}}" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="{{asset('admin/css/style.min.css')}}" rel="stylesheet">
  <link href="{{asset('admin/css/custom_user.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('fonts/Myriad/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/Chart.min.css')}}">
  <style>

    .map-container{
        overflow:hidden;
        padding-bottom:56.25%;
        position:relative;
        height:0;
    }
    .map-container iframe{
        left:0;
        top:0;
        height:100%;
        width:100%;
        position:absolute;
    }
    .text-icon{
        font-size: 13px;
    }
  </style>
</head>

<body class="grey lighten-3">

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
      <div class="container-fluid">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">&nbsp;
            </li>
          </ul>
          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
              <i class="fas fa-user mr-3"></i>{{Auth::user()->nama_user}}
            </li>
          </ul>
      </div>
    </nav>
    <!-- Navbar -->

    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed">

      <a class="logo-wrapper waves-effect">
        <img src="{{asset('images/Asset 7@4x.png')}}" class="img-fluid logo-stroke" alt="">
      </a>

      <div class="list-group list-group-flush">
        <a href="{{route('bk-index')}}" class="list-group-item {{(url()->current() == route('bk-index'))?'active':' list-group-item-action'}} waves-effect">
          <i class="fas fa-chart-pie mr-3"></i>Dashboard
        </a>
        <a href="{{route('bk-siswa')}}" class="list-group-item {{(request()->segment(3) == 'siswa')?'active':' list-group-item-action'}} waves-effect">
          <i class="fas fa-users mr-3"></i>Data Siswa</a>
        <a href="{{route('bk-settings')}}" class="list-group-item {{(request()->segment(3) == 'settings')?'active':' list-group-item-action'}} waves-effect">
          <i class="fas fa-cogs mr-3"></i>Pengaturan</a>
        <a href="{{route('bk-psc')}}" class="list-group-item {{(request()->segment(3) == 'psc')?'active':' list-group-item-action'}} waves-effect">
          <i class="fas fa-book mr-3"></i>Info PSC</a>
        <a href="{{url('logout')}}" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-power-off mr-3"></i>Logout</a>
      </div>

    </div>
    <!-- Sidebar -->

  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">
      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="{{route('bk-index')}}" target="_blank">BK Admin</a>
            <span>/</span>
            <span>@yield('title')</span>
          </h4>

        </div>

      </div>
      <!-- Heading -->
      @section('content')

      @show
    </div>
  </main>
  <!--Main layout-->
    <div class="mt-5">&nbsp;</div>
    <div class="row w-100">
        <div class="col d-xl-none d-block">
            <div class="mt-5">&nbsp;</div>
            <div class="mt-5">&nbsp;</div>
        </div>
        <div class="col d-xl-none d-block">
            <div class="fixed-bottom w-100 pt-3 white text-center text-grey d-flex justify-content-center px-3">
                <div class="row">
                    <div class="col-md-2 col-4">
                        <a href="{{route('bk-index')}}" class="py-1 px-1 bot-nav-link">
                            <i class="fas fa-chart-pie fa-md"></i><br><p class="text-icon">Dashboard</p>
                        </a>
                    </div>
                    <div class="col-md-2 col-4">
                        <a href="{{route('bk-siswa')}}" class="py-1 px-1 bot-nav-link">
                            <i class="fas fa-users fa-md"></i><br><p class="text-icon">Data Siswa</p>
                        </a>
                    </div>
                    <div class="col-md-2 col-4">
                        <a href="{{route('bk-settings')}}" class="py-1 px-1 bot-nav-link">
                            <i class="fas fa-cogs fa-md"></i><br><p class="text-icon">Pengaturan</p>
                        </a>
                    </div>
                    <div class="col-md-2 col-6">
                        <a href="{{route('bk-psc')}}" class="py-1 px-1 bot-nav-link">
                            <i class="fas fa-book fa-md"></i><br><p class="text-icon">Info PSC</p>
                        </a>
                    </div>
                    <div class="col-md-2 col-6">
                        <a href="{{url('logout')}}" class="py-1 px-1 bot-nav-link">
                            <i class="fas fa-power-off fa-md"></i><br><p class="text-icon">Logout</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col d-xl-block d-none">
            <footer class="fixed-bottom page-footer text-center font-small primary-color wow fadeIn">
                <div class="footer-copyright py-3">
                  © 2020 Copyright:
                  <a href="https://ipi.ac.id" target="_blank"> International Professional Institute </a>
                </div>
            </footer>
        </div>
    </div>

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="{{asset('admin/js/jquery-3.4.1.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{asset('admin/js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{asset('admin/js/bootstrap.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{asset('admin/js/mdb.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{asset('js/Chart.bundle.min.js')}}"></script>
  <!-- Initializations -->
  @section('js_addon')

  @show
</body>

</html>
