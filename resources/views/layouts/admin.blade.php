<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Admin</title>
  <link rel="shortcut icon" href="{{asset('contents/admin')}}/assets/images/icon.png">

  <link href="{{asset('contents/admin')}}/assets/plugins/switchery/switchery.min.css" rel="stylesheet">
  <link href="{{asset('contents/admin')}}/assets/plugins/apexcharts/apexcharts.css" rel="stylesheet">
  <link href="{{asset('contents/admin')}}/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
  <link href="{{asset('contents/admin')}}/assets/plugins/slick/slick.css" rel="stylesheet">
  <link href="{{asset('contents/admin')}}/assets/plugins/slick/slick-theme.css" rel="stylesheet">
  <link href="{{asset('contents/admin')}}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="{{asset('contents/admin')}}/assets/css/icons.css" rel="stylesheet" type="text/css">
  @stack('css')
  <link href="{{asset('contents/admin')}}/assets/css/datatables.min.css" rel="stylesheet" type="text/css">
  <link href="{{asset('contents/admin')}}/assets/css/orbiter.css" rel="stylesheet" type="text/css">
  <link href="{{asset('contents/admin')}}/assets/css/style.css" rel="stylesheet" type="text/css">
  <script src="{{asset('contents/admin')}}/assets/js/jquery.min.js"></script>
  <script src="{{asset('contents/admin')}}/assets/js/sweetalert.min.js"></script>
</head>

<body class="vertical-layout">


  <!-- End Infobar Setting Sidebar -->
  <!-- Start Containerbar -->
  <div class="infobar-settings-sidebar-overlay"></div>
  <div id="containerbar">
    <!-- Start Leftbar -->
    @include('layouts.partials.sidebar')

    <div class="rightbar">
      <div class="topbar-mobile">
        <div class="row align-items-center">
          <div class="col-md-12">
            <div class="mobile-logobar">
              <a href="index.html" class="mobile-logo"><img src="{{asset('contents/admin')}}/assets/images/logo.png"
                  class="img-fluid" alt="logo"></a>
            </div>
            <div class="mobile-togglebar">
              <ul class="list-inline mb-0">
                <li class="list-inline-item">
                  <div class="topbar-toggle-icon">
                    <a class="topbar-toggle-hamburger" href="javascript:void();">
                      <img src="{{asset('contents/admin')}}/assets/images/svg-icon/horizontal.svg"
                        class="img-fluid menu-hamburger-horizontal" alt="horizontal">
                      <img src="{{asset('contents/admin')}}/assets/images/svg-icon/verticle.svg"
                        class="img-fluid menu-hamburger-vertical" alt="verticle">
                    </a>
                  </div>
                </li>
                <li class="list-inline-item">
                  <div class="menubar">
                    <a class="menu-hamburger" href="javascript:void();">
                      <img src="{{asset('contents/admin')}}/assets/images/svg-icon/collapse.svg"
                        class="img-fluid menu-hamburger-collapse" alt="collapse">
                      <img src="{{asset('contents/admin')}}/assets/images/svg-icon/close.svg"
                        class="img-fluid menu-hamburger-close" alt="close">
                    </a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- Start Topbar -->
      @include('layouts.partials.topbar')

      <!-- Start Breadcrumb -->
      @component('layouts.partials.breadcrumb')
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">CRM</li>
      @endcomponent

      <div class="contentbar">
        @yield('content')
      </div>
      <div class="footerbar">
        <footer class="footer">
          <p class="mb-0">© 2020 ASAC || Design & Developed by : <span style="color: #ff0019;"> HSBLCO</span>
          </p>
        </footer>
      </div>
    </div>
  </div>
  <script src="{{asset('contents/admin')}}/assets/js/jquery.min.js"></script>
  {{-- export table --}}
  <script src="{{asset('contents/admin')}}/assets/js/tableHTMLExport.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js">
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.0.37/jspdf.plugin.autotable.js">
  </script>
  {{-- export table --}}
  <script src="{{asset('contents/admin')}}/assets/js/popper.min.js"></script>
  <script src="{{asset('contents/admin')}}/assets/js/bootstrap.min.js"></script>
  <script src="{{asset('contents/admin')}}/assets/js/modernizr.min.js"></script>
  <script src="{{asset('contents/admin')}}/assets/js/detect.js"></script>
  {{-- <script src="{{asset('contents/admin')}}/assets/js/jquery.slimscroll.js"></script> --}}
  {{-- <script src="{{asset('contents/admin')}}/assets/js/jquery.slimscroll.min.js"></script> --}}
  <script src="{{asset('contents/admin')}}/assets/js/vertical-menu.js"></script>
  <script src="{{asset('contents/admin')}}/assets/plugins/switchery/switchery.min.js"></script>
  <script src="{{asset('contents/admin')}}/assets/plugins/apexcharts/apexcharts.min.js"></script>
  <script src="{{asset('contents/admin')}}/assets/plugins/apexcharts/irregular-data-series.js"></script>
  <script src="{{asset('contents/admin')}}/assets/plugins/slick/slick.min.js"></script>
  <script src="{{asset('contents/admin')}}/assets/js/custom/custom-dashboard.js"></script>
  <script src="{{asset('contents/admin')}}/assets/js/custom/custom-form-editor.js"></script>
  @stack('js')
  <script src="{{asset('contents/admin')}}/assets/js/core.js"></script>
  <script src="{{asset('contents/admin')}}/assets/js/datatables.min.js"></script>

  <script src="{{asset('contents/admin')}}/assets/js/custom.js"></script>
  <script src="{{asset('contents/admin')}}/assets/js/ajax.js"></script>
  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  </script>
</body>

</html>