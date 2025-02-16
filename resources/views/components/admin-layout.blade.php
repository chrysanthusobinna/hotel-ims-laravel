
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin - @yield('page-title') </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/admin-dashboard-resource/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="/admin-dashboard-resource/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/admin-dashboard-resource/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="/admin-dashboard-resource/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/admin-dashboard-resource/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/admin-dashboard-resource/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/admin-dashboard-resource/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/admin-dashboard-resource/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="/admin-dashboard-resource/plugins/jquery/jquery.min.js"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="/admin-dashboard-resource/plugins/datatables-bs4/css/dataTables.bootstrap4.css">


    @stack('css')
 
  
</head>
<body   class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('admin.dashboard') }}" class="nav-link"> Dashboard </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="exit.php" class="nav-link">Logout</a>
      </li>
    </ul>


   </nav>
  <!-- /.navbar -->


  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="/images/velitechs_logo.png" alt=" Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"> {{ strtoupper(env('COMPANY_NAME')) }} </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/images/hotel_logo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="index.php" class="d-block"> ADMIN PANEL  </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
			   
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->route()->named('admin.dashboard') ? 'active' : '' }}"  >
              <i class="nav-icon fas fa-th"></i>
              <p>Dashboard</p>
            </a>
          </li>
 
 
 
          <li class="nav-item active">
            <a href="manage_bookings.php" class="nav-link" id="manage_bookings">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Bookings
               </p>
            </a>
          </li>

 
          <li class="nav-item">
            <a href="manage_room_maintenance.php" class="nav-link"  >
              <i class="nav-icon fas fa-tools"></i>  
              <p>
                Room Maintenance
               </p>
            </a>
          </li>
		  
  
 
 
 
          <li class="nav-item">
            <a href="manage_webmail_livechat.php" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>  
              <p>
                Communication
               </p>
            </a>
          </li>
 
          <li class="nav-item">
            <a href="paystack.php"  class="nav-link">
              <i class="nav-icon fas fa-money-check"></i>  
              <p>
                Paystack
               </p>
            </a>
          </li>
 

           <li class="nav-item">
            <a href="manage_staff_roles.php" class="nav-link">
              <i class="nav-icon fas fa-user-shield"></i>  
              <p>
                Manage Staff Roles
               </p>
            </a>
          </li>
 
 
            <li class="nav-item" id="manage_website_menu"> 
            <a href="#" class="nav-link" id="manage_website">
              <i class="nav-icon fas fa-globe"></i> 
              <p>
                Manage Website
              </p>
            </a>
          </li>
 
          
 
 
           <li class="nav-item">
            <a href="{{ route('admin.settings') }}" class="nav-link {{ str_starts_with(request()->route()->getName(), 'admin.settings') ? 'active' : '' }}">
              <i class="nav-icon fas fa-cog"></i>  
              <p>
                All Settings
               </p>
            </a>
          </li>
		  
		   
 
         <li class="nav-item">
            
            <a onclick="if (confirm('Are you Sure you want to Log out Now?')){return true;}else{event.stopPropagation(); event.preventDefault();};"    href="{{ route('admin-logout') }}" class="nav-link">
			  <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
               </p>
            </a>
          </li>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">@yield('page-title')</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item">@yield('back-link') 
                  <li class="breadcrumb-item active"> @yield('page-title') </li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
     
           
            @include('messagebag')






            {{$slot}}







          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->






      <footer class="main-footer">
        <strong><script>document.write(new Date().getFullYear());</script> &copy;  </strong>
        {{ strtoupper(env('COMPANY_NAME')) }} | Designed by <a href="www.linkedin.com/in/chrysanthus-obinna">Chrysanthus.C.</a>
        <div class="float-right d-none d-sm-inline-block">
         </div>
      </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
 
<!-- jQuery UI 1.11.4 -->
<script src="/admin-dashboard-resource/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/admin-dashboard-resource/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/admin-dashboard-resource/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/admin-dashboard-resource/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/admin-dashboard-resource/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/admin-dashboard-resource/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/admin-dashboard-resource/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/admin-dashboard-resource/plugins/moment/moment.min.js"></script>
<script src="/admin-dashboard-resource/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/admin-dashboard-resource/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/admin-dashboard-resource/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/admin-dashboard-resource/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/admin-dashboard-resource/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/admin-dashboard-resource/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/admin-dashboard-resource/dist/js/demo.js"></script>

<!-- DataTables -->
<script src="/admin-dashboard-resource/plugins/datatables/jquery.dataTables.js"></script>
<script src="/admin-dashboard-resource/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
 

    @stack('js')




            <script type="text/javascript">
              $(function () {
            
                $('#example1').DataTable({
                  "paging": true,
                  "lengthChange": true,
                  "searching": true,
                  "ordering": false,
                  "info": true,
                  "autoWidth": true,
                });
              });
            </script>
 

 <script type="text/javascript">

  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>

 

</body>
</html>
 
 