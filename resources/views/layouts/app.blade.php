<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
  {{ config('app.name', 'Laravel') }}
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{asset('theme_tcw/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('theme_tcw/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{asset('theme_tcw/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('theme_tcw/assets/css/soft-ui-dashboard.css')}}" rel="stylesheet" />
  @vite(['resources/js/app.js'])
</head>
<body class="g-sidenav-show  bg-gray-100">
@include('layouts.sidenav')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
@include('layouts.topnav')
{{$slot}}
</main>
<script src="{{asset('theme_tcw/assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('theme_tcw/assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('theme_tcw/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('theme_tcw/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="{{asset('theme_tcw/assets/js/plugins/chartjs.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('theme_tcw/assets/js/soft-ui-dashboard.js')}}"></script>
</body>

</html>
