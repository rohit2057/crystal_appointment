<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Appointment</title>
  <link rel="stylesheet" href="{{asset('assets/css/materialdesignicons.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/vendor.bundle.base.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datepicker.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body class="sidebar-light">
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
        <ul class="navbar-nav mr-lg-2 d-none d-lg-flex">
          <li class="nav-item nav-toggler-item">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>
          
        </ul>

        <ul class="navbar-nav navbar-nav-right">
            <span class="nav-profile-name"> Appointment</span>
         </ul>
      </div>
    </nav>

    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/">
              <i class="mdi mdi-view-quilt menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('officer')}}">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">officer</span>
            </a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="{{route('visitor')}}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Visitor</span>
            </a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="{{route('activity')}}">
              <i class="mdi mdi-airplay menu-icon"></i>
              <span class="menu-title">Activity</span>
            </a>
          </li>
          
        </ul>
      </nav>
    
      <div class="main-panel">
        <div class="content-wrapper">
          
           @yield('content')

        </div>

        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
 

  <!-- plugins:js -->
  <script src="{{ asset('assets/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('assets/js/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
  <script src="{{ asset('assets/js/template.js') }}"></script>
  <script src="{{ asset('assets/js/settings.js') }}"></script>
  <script src="{{ asset('assets/js/todolist.js') }}"></script>
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
</body>
</html>