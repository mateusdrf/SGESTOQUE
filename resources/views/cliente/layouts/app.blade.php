<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cliente - @yield('title')</title>
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
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <style>
      .t-header .t-header-content-wrapper{
        border-left: 1px solid #f2f4f9;
        background-color: white;
        border-bottom: 1px solid #f2f4f9;
      }

      @media (max-width : 420px) {
        .t-header-content-wrapper{
          padding-left: 0px; height: 85px!important;
        }
        .desktop{
          display: none!important;
        }
      }
      @media (min-width : 421px) {
        .t-header-content-wrapper{
          padding-left: 70px; height: 85px!important;
        }
        .desktop{
          padding-left: 70px!important;
        }
      }
    </style>
  </head>
  <body class="header-fixed">
    <nav class="t-header">
      <div class="t-header-brand-wrapper desktop">
        <a href="#">
          <img class="logo" style="width: 100px!important" src="{{ asset('img/img.png') }}" alt="">
        </a>
      </div>
      <div class="t-header-content-wrapper">
        <div class="t-header-content">
          <button class="t-header-toggler t-header-mobile-toggler d-block d-lg-none">
            <i class="mdi mdi-menu"></i>
          </button>
          <ul class="nav ml-auto">
            <li class="nav-item dropdown">
              <strong style="cursor: pointer;"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <small class="name">Sair</small>
              </strong>
              <form id="logout-form" action="{{ route('cliente.logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>         
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="page-body">
      <div class="sidebar">
        <div class="user-profile">
          <div class="display-avatar">
            <img class="profile-img img-lg rounded-circle" src="{{ asset('assets/images/profile/male/default.png') }}" alt="profile image">
          </div>
          <div class="info-wrapper">
            <p class="user-name">{{ Auth::guard('cliente')->user()->firstname }} {{ Auth::guard('cliente')->user()->lastname }}</p>
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
          
          <li>
            <a href="{{ route('cliente.estoque') }}">
              <span class="link-title">Estoque</span>
              <i class="mdi mdi-trending-up link-icon"></i>
            </a>
          </li>
          <li>
            <a href="{{ route('cliente.funcionarios') }}">
              <span class="link-title">Funcionários</span>
              <i class="mdi mdi-account-multiple link-icon"></i>
            </a>
          </li>
        </ul>
      </div>
      <!-- partial -->
      <div class="page-content-wrapper">
        <div class="page-content-wrapper-inner">
          <div class="content-viewport" style="padding-top: 10px!important;">
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
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/highcharts.js') }}"></script>
    <!-- endbuild -->
  </body>
  @yield('scripts')
  <script>
    $(document).ready(function(){
      $('.date').mask('00/00/0000');
      $('.money').mask('000.000.000.000.000,00', {reverse: true});
    });

    function set_language_datatables(){
      return {
        "sEmptyTable": "Nenhum registro encontrado",
        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
        "sInfoPostFix": "",
        "sInfoThousands": ".",
        "sLengthMenu": "_MENU_ resultados por página",
        "sLoadingRecords": "Carregando...",
        "sProcessing": "Processando...",
        "sZeroRecords": "Nenhum registro encontrado",
        "sSearch": "Pesquisar",
        "oPaginate": {
            "sNext": "Próximo",
            "sPrevious": "Anterior",
            "sFirst": "Primeiro",
            "sLast": "Último"
        },
        "oAria": {
            "sSortAscending": ": Ordenar colunas de forma ascendente",
            "sSortDescending": ": Ordenar colunas de forma descendente"
        },
        "select": {
            "rows": {
                "_": "Selecionado %d linhas",
                "0": "Nenhuma linha selecionada",
                "1": "Selecionado 1 linha"
            }
        }
      };
    }
  </script>
</html>
