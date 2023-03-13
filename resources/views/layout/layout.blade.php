<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, srink-to-fit=no">
    <title>Aplikasi SPP</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('Template/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('Template/assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{ asset('Template/assets/css/style.css')}}">
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>

    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('Template/assets/images/favicon.ico')}}" />
  </head>
  <body>
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html"><img src="{{asset('Template/assets/images/logo.svg')}}" alt="Aplikasi SPP" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link" href="{{ route('logout') }}" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 pt-2 text-black">Logout<span>   </span><i class="mx-auto fa fa-sign-out"></i></p>
                </div>
              </a>
            </li>
            
          </ul>
          
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
        @if (auth()->user()->level == 'admin')
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">Hello, {{ Auth::user()->nama_petugas }}</span>
                  <span class="text-secondary text-small mx-auto">{{ Auth::user()->level }}</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('dashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="ms-auto fa fa-solid fa-house"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('kelas') }}">
                <span class="menu-title">Kelas</span>
                <i class="ms-auto fa fa-solid fa-door-closed"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('spp') }}">
                <span class="menu-title">SPP</span>
                <i class="ms-auto fa fa-solid fa-hand-holding-dollar"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('petugas') }}">
                <span class="menu-title">Petugas</span>
                <i class="ms-auto fa fa-solid fa-user-gear"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('siswa') }}">
                <span class="menu-title">Siswa</span>
                <i class="ms-auto fa fa-solid fa-users"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('pembayaran') }}">
                <span class="menu-title">Pembayaran</span>
                <i class="ms-auto fa fa-solid fa-money-bills"></i>
              </a>
            </li>
          </ul>
          @elseif (auth()->user()->level == 'petugas')
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">Hello, {{ Auth::user()->nama_petugas }}</span>
                  <span class="text-secondary text-small mx-auto">{{ Auth::user()->level }}</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('dashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="ms-auto fa fa-solid fa-house"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('nama_kelas') }}">
                <span class="menu-title">Kelas</span>
                <i class="ms-auto fa fa-solid fa-door-closed"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('nama_siswa') }}">
                <span class="menu-title">Siswa</span>
                <i class="ms-auto fa fa-solid fa-users"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('bayar') }}">
                <span class="menu-title">Pembayaran</span>
                <i class="ms-auto fa fa-solid fa-money-bills"></i>
              </a>
            </li>
          </ul>
          @elseif (auth()->user()->level == 'siswa')
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">Hello, {{ Auth::user()->nama_petugas }}</span>
                  <span class="text-secondary text-small mx-auto">{{ Auth::user()->level }}</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('dashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="ms-auto fa fa-solid fa-house"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('history') }}">
                <span class="menu-title">Pembayaran</span>
                <i class="ms-auto fa fa-solid fa-money-bills"></i>
              </a>
            </li>
          </ul>
          @endif
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ul class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item ms-auto">@yield('page')</li>
                                <li class="breadcrumb-item active">@yield('subtitle')</li>
                            </ul>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
                <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </section>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
              <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="{{ asset('Template/assets/vendors/js/number-separator.js') }}"></script>
    <script>
        easyNumberSeparator({
          selector: '.number-separator',
          separator: ',',
          decimalSeparator: '.',
          resultInput: '#result_input',
        })
    </script>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>