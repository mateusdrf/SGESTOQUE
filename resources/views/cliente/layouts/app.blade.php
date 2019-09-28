<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Início - Cliente</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.addons.css') }}">
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/shared/style.min.css') }}">
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.min.css') }}">
    <!-- Datatables -->
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <style>
      .t-header .t-header-content-wrapper{
        border-left: 1px solid #f2f4f9;
        background-color: white;
        border-bottom: 1px solid #f2f4f9;
      }
    </style>
  </head>
  <body class="header-fixed">
    <!-- partial:../../partials/_header.html -->
    <nav class="t-header">
      <div class="t-header-brand-wrapper" style="padding-left: 75px;!important">
        <a href="#">
          <img class="logo" src="{{ asset('img/img.png') }}" alt="">
        </a>
      </div>
      <div class="t-header-content-wrapper">
        <div class="t-header-content">
          <button class="t-header-toggler t-header-mobile-toggler d-block d-lg-none">
            <i class="mdi mdi-menu"></i>
          </button>
          
          <!-- <form action="#" class="t-header-search-box">
            <div class="input-group">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search" autocomplete="off">
              <button class="btn btn-primary" type="submit"><i class="mdi mdi-arrow-right-thick"></i></button>
            </div>
          </form> -->
          <ul class="nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" id="notificationDropdown" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-settings mdi-1x"></i>
              </a>
              <div class="dropdown-menu navbar-dropdown dropdown-menu-right" aria-labelledby="notificationDropdown">
                <div class="dropdown-header">
                  <h6 class="dropdown-title">Configurações</h6>
                  <p class="dropdown-title-text"></p>
                </div>
                <div class="dropdown-body">
                  <div class="dropdown-list">
                    <div class="icon-wrapper rounded-circle bg-inverse-primary text-primary">
                      <i class="mdi mdi-logout"></i>
                    </div>
                    <div class="content-wrapper">
                      <a href="{{ route('cliente.logout') }}"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          <small class="name">Sair</small>
                      </a>

                      <form id="logout-form" action="{{ route('cliente.logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- partial -->
    <div class="page-body">
      <!-- partial:../../partials/_sidebar.html -->
      <div class="sidebar">
        <div class="user-profile">
          <div class="display-avatar animated-avatar">
            <img class="profile-img img-lg rounded-circle" src="{{ asset('assets/images/profile/male/image_1.png') }}" alt="profile image">
          </div>
          <div class="info-wrapper">
            <!-- <p class="user-name"></p> -->
          </div>
        </div>
        <ul class="navigation-menu">
          <li class="nav-category-divider">PRINCIPAL</li>
          <li>
            <a href="{{ route('cliente.dashboard') }}">
              <span class="link-title">Estatísticas</span>
              <i class="mdi mdi-trending-up link-icon"></i>
            </a>
          </li>

          <li>
            <a href="{{ route('cliente.produtos') }}">
              <span class="link-title">Produtos</span>
              <i class="mdi mdi-trending-up link-icon"></i>
            </a>
          </li>

          <!-- <li>
            <a href="{{ route('cliente.entradas') }}">
              <span class="link-title">Entradas</span>
              <i class="mdi mdi-trending-up link-icon"></i>
            </a>
          </li>

          <li>
            <a href="{{ route('cliente.saidas') }}">
              <span class="link-title">Saídas</span>
              <i class="mdi mdi-trending-up link-icon"></i>
            </a>
          </li> -->

          <li>
            <a href="{{ route('cliente.estoque') }}">
              <span class="link-title">Estoque</span>
              <i class="mdi mdi-trending-up link-icon"></i>
            </a>
          </li>

          <!-- <li>
            <a href="{{ route('admin.clientes.list') }}">
              <span class="link-title">Clientes</span>
              <i class="mdi mdi-account-multiple link-icon"></i>
            </a>
          </li> -->
          <li>
            <a href="#" data-toggle="collapse" aria-expanded="false">
              <span class="link-title">Usuários</span>
              <i class="mdi mdi-account-multiple link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="sample-pages">
              <li>
                <a href="{{ route('cliente.funcionarios') }}" target="_self">Funcionários</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- partial -->
      <div class="page-content-wrapper">
        <div class="page-content-wrapper-inner">
          <div class="content-viewport">
            @yield('content')
          </div>
        </div>
        <!-- content viewport ends -->
        <!-- partial:../../partials/_footer.html -->
        <!-- <footer class="footer">
          <div class="row">
            <div class="col-sm-6 text-center text-sm-right order-sm-1">
              <ul class="text-gray">
                <li><a href="#">Terms of use</a></li>
                <li><a href="#">Privacy Policy</a></li>
              </ul>
            </div>
            <div class="col-sm-6 text-center text-sm-left mt-3 mt-sm-0">
              <small class="text-muted d-block">Copyright © 2019 <a href="http://www.uxcandy.co" target="_blank">UXCANDY</a>. All rights reserved</small>
              <small class="text-gray mt-2">Handcrafted With <i class="mdi mdi-heart text-danger"></i></small>
            </div>
          </div>
        </footer> -->
        <!-- partial -->
      </div>
      <!-- page content ends -->
    </div>
    <!--page body ends -->
    <!-- SCRIPT LOADING START FORM HERE /////////////-->
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/core.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/vendor.addons.js') }}"></script>
    <script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/charts/chartjs.addon.js') }}"></script>
    <!-- Vendor Js For This Page Ends-->
    <!-- build:js -->
    <script src="{{ asset('assets/js/dashboard.min.js') }}"></script>
    <script src="{{ asset('assets/js/template.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <!-- endbuild -->
  </body>
  @yield('scripts')
  <script>
    $(document).ready(function(){
      $('.date').mask('00/00/0000');
      $('.money').mask('000.000.000.000.000,00', {reverse: true});
    });
  </script>
</html>
