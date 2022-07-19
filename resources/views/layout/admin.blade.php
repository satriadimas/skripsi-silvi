<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Balairung | Sistem</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/')}}admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('/')}}admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('/')}}admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('/')}}admin/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/')}}admin/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('/')}}admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('/')}}admin/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('/')}}admin/plugins/summernote/summernote-bs4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('/')}}admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/')}}admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/')}}admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/')}}admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  @yield("other-css")
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-row justify-content-center align-items-center">
    <!-- <img class="animation__shake" src="{{ asset('/')}}admin/dist/img/logo.png" alt="AdminLTELogo" width="100"> -->
    <div class="spinner-border text-primary mr-3" role="status">
    <span class="sr-only">Loading...</span>
    </div>
    <div class="spinner-border text-secondary mr-3" role="status">
    <span class="sr-only">Loading...</span>
    </div>
    <div class="spinner-border text-success mr-3" role="status">
    <span class="sr-only">Loading...</span>
    </div>
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            <i class="fas fa-power-off"></i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="{{ asset('/')}}admin/dist/img/logo.png" alt="AdminLTE Logo" class="brand-image elevation-5" style="opacity: .8"> -->
      <span class="brand-text font-weight-light ml-3">Balairung | Sistem</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/')}}admin/dist/img/user-logo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <li class="nav-item">
                <a href="{{ url('/admin/home') }}" class="nav-link">
                <i class="nav-icon fas fa-cloud"></i>
                <p>
                    Dashboard
                    <!-- <span class="right badge badge-danger">New</span> -->
                </p>
                </a>
            </li>
            @if( Auth::user()->role == 2 )
            <li class="nav-item">
                <a href="{{ url('/admin/penyewaan') }}" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    Data Penyewaan
                    <!-- <span class="right badge badge-danger">New</span> -->
                </p>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="{{ url('/admin/user-management') }}" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    User Management
                    <!-- <span class="right badge badge-danger">New</span> -->
                </p>
                </a>
            </li>
            @endif
          </li>
          <li class="nav-item">
                <a href="{{ url('/admin/pengajuan') }}" class="nav-link">
                <i class="nav-icon fas fa-asterisk"></i>
                <p>
                    Pengajuan Dana
                    <!-- <span class="right badge badge-danger">New</span> -->
                </p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
    @yield('content')


<footer class="main-footer">
<strong>Copyright &copy; 2022 Balairung Anjungan Sumatera Barat.</strong>
All rights reserved.
<div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 1.0
</div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('/')}}admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('/')}}admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/')}}admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('/')}}admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('/')}}admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('/')}}admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('/')}}admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('/')}}admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('/')}}admin/plugins/moment/moment.min.js"></script>
<script src="{{ asset('/')}}admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('/')}}admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('/')}}admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('/')}}admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/')}}admin/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/')}}admin/dist/js/demo.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('/')}}admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('/')}}admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('/')}}admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('/')}}admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('/')}}admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('/')}}admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('/')}}admin/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('/')}}admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('/')}}admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('/')}}admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('/')}}admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('/')}}admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
$(function () {
    $("#data").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
});
</script>
<!-- SweetAlert2 -->
<script src="{{ asset('/')}}admin/plugins/sweetalert2/sweetalert2.min.js"></script>

<script>
var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
</script>
@yield("other-js")
</body>
</html>
