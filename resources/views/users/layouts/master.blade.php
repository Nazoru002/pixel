<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom_user.css')}}">
    <link rel="stylesheet" href="{{asset('js/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/assets/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/Chart.min.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/Myriad/style.css')}}">

    <title>@yield('title') IPI Talent Mapping</title>
  </head>
  <body class="h-100">
    <div class="wrapper">
        @section('content')

        @show
    </div>
    <div class="mt-5">&nbsp;</div>
    @if(url()->current() != route('index') && url()->current() != route('landing') && url()->current() != route('user-login') && url()->current() != route('siswa-biodata') )
    <div class="row w-100">
        <div class="col">
            <div class="mt-5">&nbsp;</div>
            <div class="mt-5">&nbsp;</div>
        </div>
        <div class="col">
            <div class="fixed-bottom w-100 pt-3 white text-center text-grey d-flex justify-content-center px-3">
                <div class="row">
                    <div class="col-md-2 col-4">
                        <a href="{{route('siswa-index')}}" class="py-1 px-1 bot-nav-link w-100">
                            <i class="fas fa-home fa-md"></i><br><p class="text-icon">Beranda</p>
                        </a>
                    </div>
                    <div class="col-md-2 col-4 mx-md-3">
                        <a href="{{route('siswa-tes-hasil')}}" class="py-1 px-1 bot-nav-link w-100">
                            <i class="fas fa-clipboard-list fa-md"></i><br><p class="text-icon">Hasil Tes</p>
                        </a>
                    </div>
                    <div class="col-md-2 col-4">
                        <a href="{{route('siswa-read-biodata')}}" class="py-1 px-1 bot-nav-link w-100">
                            <i class="fas fa-user fa-md"></i><br><p class="text-icon">Biodata</p>
                        </a>
                    </div>
                    <div class="col-md-2 col-6 mx-md-3">
                        <a href="{{route('siswa-settings')}}" class="py-1 px-1 bot-nav-link w-100">
                            <i class="fas fa-cogs fa-md"></i><br><p class="text-icon">Pengaturan</p>
                        </a>
                    </div>
                    <div class="col-md-2 col-6">
                        <a href="{{url('logout')}}" class="py-1 px-1 bot-nav-link w-100">
                            <i class="fas fa-power-off fa-md"></i><br><p class="text-icon">Logout</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('js/animatedModal.min.js')}}"></script>
    @section('js_addon')

    @show
  </body>
</html>