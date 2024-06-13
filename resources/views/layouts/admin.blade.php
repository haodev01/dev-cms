<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{\App\Helpers\AssetHelper::assetAdmin('img/favicon/favicon.ico')}}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="{{\App\Helpers\AssetHelper::assetAdmin('vendor/fonts/boxicons.css')}}" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{\App\Helpers\AssetHelper::assetAdmin('vendor/css/core.css')}}" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{\App\Helpers\AssetHelper::assetAdmin('vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{\App\Helpers\AssetHelper::assetAdmin('css/demo.css')}}" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{App\Helpers\AssetHelper::assetAdmin('vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
  <link rel="stylesheet" href="{{App\Helpers\AssetHelper::assetAdmin('vendor/libs/apex-charts/apex-charts.css')}}" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="{{App\Helpers\AssetHelper::assetAdmin('vendor/js/helpers.js')}}"></script>
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="{{App\Helpers\AssetHelper::assetAdmin('js/config.js')}}"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->


      <!-- / Menu -->
      @include('components.menu')

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        @include('components.navbar')
        <!-- / Navbar -->
        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            @yield('content')
          </div>
          <!-- / Content -->
          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

  <div class="buy-now">
  </div>

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->

  <script src="{{App\Helpers\AssetHelper::assetAdmin('vendor/libs/jquery/jquery.js')}}"></script>
  <script src="{{App\Helpers\AssetHelper::assetAdmin('vendor/libs/popper/popper.js')}}"></script>
  <script src="{{App\Helpers\AssetHelper::assetAdmin('vendor/js/bootstrap.js')}}"></script>
  <script src="{{App\Helpers\AssetHelper::assetAdmin('vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
  <script src="{{App\Helpers\AssetHelper::assetAdmin('vendor/js/menu.js')}}"></script>


  <!-- endbuild -->

  <!-- Vendors JS -->

  <script src="{{App\Helpers\AssetHelper::assetAdmin('vendor/libs/echarts/echarts.js')}}"></script>

  <!-- Main JS -->
  <script src="{{App\Helpers\AssetHelper::assetAdmin('js/main.js')}}"></script>


  <!-- Page JS -->
  <script src="{{App\Helpers\AssetHelper::assetAdmin('js/dashboards-analytics.js')}}"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>