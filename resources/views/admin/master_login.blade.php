<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
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
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/Chart.bundle.min.js')}}"></script>
    @section('js_addon')

    @show
  </body>
</html>