<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SM SCIENCE</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

     <link rel="shortcut icon" href="{{asset('SM.png')}}" type="image/png" sizes="64x64">

  <link href="{{asset('SM.png')}}" rel="apple-touch-icon">
  <!-- CSS only -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-9l5uBqQ8z1QqH7z9+6VcL+eNf7bO7bP9a1aQeI9j+pcU6Q6i8s9FzU1L8QaCk1J" crossorigin="anonymous">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('admin_pages/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('admin_pages/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('admin_pages/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('admin_pages/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('admin_pages/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('admin_pages/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('admin_pages/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('admin_pages/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{url('/admin/index')}}" class="logo d-flex align-items-center">
        <img src="{{asset('SM.png')}}" alt="loogo">
        <span class="d-none d-lg-block">SM SCIENCE</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">{{$unseen_orders}}</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
            @lang('public.You_have_new_Order')
              <a href="{{url('/admin/orders')}}"><span class="badge rounded-pill bg-primary p-2 ms-2">@lang('public.View_all')</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            @foreach($orders as $item)
            @if($item->statues == 0)
            <a href="/admin/order/details/{{$item->id}}">
              <li class="notification-item">
                <i class="bi bi-exclamation-circle text-warning"></i>
                <div>
                  <h4>{{$item->name}}</h4>
                  <p>{{$item->user_email}}</p>
                  <p>{{$item->total}}</p>
                </div>
              </li>
            </a>
            <li>
              <hr class="dropdown-divider">
            </li>
            @endif
            @endforeach
            <li class="dropdown-footer">
              <a href="{{url('/admin/orders')}}">@lang('public.Show_all_Orders')</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->



        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{asset('SM.png')}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">@lang('public.Admin')</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
              <select id="basic" class="form-control selectpicker show-tick form-control" onchange="location = this.value;">
                <option value="/locale/en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>EN</option>
                <option value="/locale/ar" {{ app()->getLocale() == 'ar' ? 'selected' : '' }}>AR</option>
              </select>
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ url('/logout') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>@lang('public.Logout')</span>
              </a>
            </li>
          </ul>
          <!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{url('/admin/index')}}">
          <i class="bi bi-house-door-fill"></i>
          <span>@lang('public.Dashboard')</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{url('/admin/categories')}}">
          <i class="bi bi-grid"></i>
          <span>@lang('public.Category')</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{url('/admin/subcategories')}}">
          <i class="bi bi-grid-3x3-gap"></i>
          <span>@lang('public.Subcategory')</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{url('/admin/products')}}">
          <i class="bi bi-boxes"></i>
          <span>@lang('public.Products')</span>
        </a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link " href="{{url('/admin/elshaima/products')}}">
          <i class="bi bi-boxes"></i>
          <span>@lang('public.elshaima')</span>
        </a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link " href="{{url('/admin/add/new/product')}}">
          <i class="bi bi-box-seam-fill"></i>
          <span>@lang('public.Add_Product')</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{url('/admin/shipping/information')}}">
          <i class="bi bi-truck"></i>
          <span>@lang('public.Shipping')</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-list-check"></i><span>@lang('public.Orders')</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('/admin/orders')}}">
              <i class="bi bi-circle"></i><span>@lang('public.Orders')</span>
            </a>
          </li>
          <li>
            <a href="{{url('/admin/rejected/Orders/')}}">
              <i class="bi bi-circle"></i><span>@lang('public.Rejected_Orders')</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </aside>
  <!-- End Sidebar-->
  @yield('layout')
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>SM SCIENCE</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('admin_pages/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('admin_pages/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('admin_pages/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('admin_pages/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('admin_pages/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('admin_pages/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('admin_pages/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('admin_pages/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('admin_pages/js/main.js')}}"></script>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-aN8WxP+4eWZpI4c0EZI1hvu+7tJ4wD5gV6bYjZsX+0UpOyK0tLkPpFEjpQ6LXqfC" crossorigin="anonymous"></script>

</body>

</html>
