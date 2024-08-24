<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
     @if (app()->getLocale() === 'ar')
    <title>اس ام ساينس</title>
    @else
    <title>SM SCIENCE</title>
    @endif
    <meta name="keywords" content="SM SCIENCE">
    <meta name="description" content="">
    <meta name="keywords" content="اس ام ساينس ">
    <meta name="description" content="">
    <meta name="author" content="sm science">
     <meta name="author" content="اس ام ساينس">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Site Icons D:\project\SH_project\public\user_Pages\images\using_iamge\logo.png-->
    <!--<link rel="shortcut icon" href="{{asset('SM.png')}}" type="image/x-icon">-->
    <link rel="shortcut icon" href="{{asset('SM.png')}}" type="image/png" sizes="64x64">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">


    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
     
        body {
            opacity: 0;
            animation: fadeIn 1s ease-in-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @media only screen and (min-width: 992px) {

            /* For screens larger than 992px (i.e. laptops and desktops) */
            .logo {
                height: 100px;
                width: 100px;
            }
        }


        @media (max-width: 767px) {

            /* Apply styles when the screen width is 767px or less (considered as mobile screens) */
            .custom-select-box {
                display: block;
                /* Make the custom select box visible */
            }
        }
       
    </style>

    @if (app()->getLocale() === 'ar')
    <style>
        .ar {
            direction: rtl;
            text-align: right;
        }
    </style>
    @endif
</head>

<body>

    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="custom-select-box">
                        <select id="basic" class="form-control selectpicker show-tick form-control" onchange="location = this.value;">
                            <option value="/locale/en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>EN</option>
                            <option value="/locale/ar" {{ app()->getLocale() == 'ar' ? 'selected' : '' }}>AR</option>
                        </select>
                    </div>
                    <div class="right-phone-box">
                        <p>@lang('public.Call_US'):- <a href="#"> +00201125746749</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="https://wa.me//201125746749"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                        <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                                    </svg></a></li>
                            <li><a href="#contactuss"><i class="fas fa-location-arrow"></i> @lang('public.Our_location')</a></li>
                            <li><a href="{{url('/contact')}}"><i class="fas fa-headset"></i> @lang('public.Contact_Us')</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="login-box">
                        @guest
                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder="Sign In">
                            <option style="color: white;" data-content='<a href="#" data-toggle="modal" data-target="#modalLoginForm">@lang("public.Sign")</a>'></option>
                            <option style="color: white;" data-content='<a href="#" data-toggle="modal" data-target="#modalRegisterForm">@lang("public.Register")</a>'></option>
                        </select>
                        @endguest
                        @auth

                        <a href="{{url('/logout')}}" style="color: white;">@lang('public.Logout')</a>
                        @endauth
                    </div>
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li> <i class="fab fa-opencart"></i> @lang('public.k1')</li>
                                <li> <i class="fab fa-opencart"></i> @lang('public.k2')</li>
                                <li> <i class="fab fa-opencart"></i> @lang('public.k3') </li>
                                <li> <i class="fab fa-opencart"></i>@lang('public.k4')</li>
                                <li> <i class="fab fa-opencart"></i> @lang('public.k5') </li>
                                <li> <i class="fab fa-opencart"></i> @lang('public.k6') </li>
                                <li> <i class="fab fa-opencart"></i> @lang('public.k7') </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- logo -->
                    <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('SM.png')}}" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse ar" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">@lang('public.Home')</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('/about')}}"> @lang('public.About')</a></li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">@lang('public.Category')</a>
                            <ul class="dropdown-menu">
                                @foreach($category as $item)
                                @if (app()->getLocale() === 'ar')
                                <li style="text-align: right;"><a href="/category/search/{{$item->id}}">{{$item->title_ar}}</a></li>
                                @else
                                <li><a href="/category/search/{{$item->id}}">{{$item->title}}</a></li>
                                @endif
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{url('/shop')}}">@lang('public.shop')</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="{{url('/Elshima/index')}}">@lang('public.elshima')</a></li> -->

                        <!-- <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalsearchForm"><i class="fa fa-search"></i></a></a></li> -->
                        <li class="nav-item"><a class="nav-link" href="{{url('/contact')}}">@lang('public.Contact')</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#" id="search-icon"><i class="fa fa-search"></i></a></li>
                        @auth
                        <li class="side-menu"><a href="#">
                                <i class="fa fa-shopping-bag"></i>
                                <span class="badge">{{$cartCount}}</span>
                                <p>@lang('public.My_Cart')</p>
                            </a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
            <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            @php $total=0; @endphp
            @auth
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box" id="cart-box">
                    <ul class="cart-list">
                        @foreach($cart as $item)
                        <li>
                            <a href="#" class="photo"><img src="{{asset('/products_images/'.$item->product_image)}}" class="cart-thumb" alt="" /></a>
                            @if (app()->getLocale() === 'ar')
                            <h6><a href="#">{{$item->product_name_ar}}</a></h6>
                            @else
                            <h6><a href="#">{{$item->product_name}}</a></h6>
                            @endif
                            <p>{{$item->quantity}}x - <span class="price">{{$item->product_price}}</span></p>
                        </li>
                        @php $total += $item->quantity * $item->product_price; @endphp
                        @endforeach
                        <li class="total">
                            <a href="{{url('cart')}}" class="btn btn-default hvr-hover btn-cart">@lang('public.VIEW_CART')</a>
                            <span class="float-right"><strong>@lang('public.total')</strong>: {{$total}}</span>
                        </li>
                    </ul>
                </li>
            </div>
            @endauth
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>

    @if(session('message2'))
    <div id="errorMessage" class="alert alert-danger" style="display:none;">{{session('message2')}}</div>
    <script>
        // Show the error message
        document.getElementById('errorMessage').style.display = 'block';
        // Hide the error message after 5 seconds
        setTimeout(function() {
            document.getElementById('errorMessage').style.display = 'none';
        }, 5000);
    </script>
    @endif
    @if(session('message'))
    <div id="successMessage" class="alert alert-success" style="display:none;">{{session('message')}}</div>
    <script>
        // Show the error message
        document.getElementById('successMessage').style.display = 'block';
        // Hide the error message after 5 seconds
        setTimeout(function() {
            document.getElementById('successMessage').style.display = 'none';
        }, 5000);
    </script>
    @endif
    <div id="top-search-container" class="top-search">
        <div class="container">
            <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <form action="{{ url('/prodcut/search') }}" method="GET">
                    <input type="text" class="form-control" name="search" placeholder="Search">
                </form>

                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>

    <!------register model --------->
    <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="modalRegisterFormTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="modalRegisterFormTitle">@lang('public.Register')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="registerForm" class="ar">
                    <div class="modal-body ">
                        <div class="form-group">
                            <label for="name" class="ar">@lang('public.Name')</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">@lang('public.Email')</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">@lang('public.Password')</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="alert alert-danger d-none" id="registerError"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn" style="background-color: #4F8340;" id="registerBtn">@lang('public.Register')</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <!-- ajax cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- register script -->
    <script>
        $(document).ready(function() {
            // Set CSRF token for all AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Handle form submission
            $('#registerForm').submit(function(event) {
                event.preventDefault(); // Prevent form from submitting normally
                var name = $('#name').val();
                var email = $('#email').val();
                var password = $('#password').val();
                $.ajax({
                    type: 'POST',
                    url: '/register', // Replace with the URL of your server-side script
                    data: {
                        name: name,
                        email: email,
                        password: password
                    },
                    success: function(response) {
                        $('#registerForm')[0].reset(); // Clear the form
                        $('#modalRegisterForm').modal('hide'); // Hide the modal
                        // TODO: Handle success response
                    },
                    error: function(xhr, status, error) {
                        var response = xhr.responseJSON;
                        if (response && response.errors && response.errors.email) {
                            var errorMessage = response.errors.email[0];
                            $('#registerError').text(errorMessage).removeClass('d-none');
                        }
                        // TODO: Handle error response
                    }
                });
            });
        });
    </script>
    <!-- end register script -->

    <!--login model  -->
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">@lang('public.Sign')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="loginForm" class="ar" action="{{url('signin')}}" method="POST">
                    @csrf
                    <div class="modal-body mx-3">
                        <div class="form-group">
                            <label for="email">@lang('public.Email')</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">@lang('public.Password')</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="alert alert-danger d-none" id="registerError"></div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn" style="background-color: #4F8340;" id="loginrBtn">@lang('public.Sign')</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- login script -->

    <!-- end login script -->

    <!-- logout script -->
    <script>
        $(document).ready(function() {
            // Set CSRF token for all AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Handle logout button click
            $('#logoutLink').click(function(event) {
                event.preventDefault(); // Prevent link from navigating to another page
                $.ajax({
                    type: 'POST',
                    url: '{{ route("logout") }}',
                    success: function(response) {
                        // alert(response.message); // Show logout message
                        location.reload(); // Reload the webpage
                    },
                    error: function(xhr, status, error) {
                        var response = xhr.responseJSON;
                        var errorMessage = response.error || 'An error occurred';
                        alert(errorMessage);
                    }
                });
            });
        });
    </script>
    <!-- end logout -->
    <script>
        const searchLi = document.querySelector('.search');
        const topSearchContainer = document.querySelector('#top-search-container');

        searchLi.addEventListener('click', function() {
            topSearchContainer.classList.toggle('show');
        });
    </script>
    @yield('layout')

    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('images/using_iamge/AHXU9538.JPG')}}" style="width: 400px !important;" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('images/using_iamge/GSAX9415.JPG')}}" style="width: 400px !important;" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('images/using_iamge/GWPB8762.JPG')}}" style="width: 400px !important;" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('images/using_iamge/IMG_3899.JPG')}}" style="width: 400px !important;" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('images/using_iamge/IMG_3900.JPG')}}" style="width: 400px !important;" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('images/using_iamge/IMG_4107.JPG')}}" style="width: 400px !important;" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('images/using_iamge/IMG_7865.JPG')}}" style="width: 400px !important;" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('images/using_iamge/IMG_4114.JPG')}}" style="width: 400px !important;" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->


    <!-- Start Footer  -->
    <footer>
        <div class="footer-main ar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>@lang('public.Business_Time')</h3>
                            <ul class="list-time">
                                <li>@lang('public.Saturday') - @lang('public.Thursday') : 08.00am to 08.00pm</li>
                                <li>@lang('public.Friday'): <span>@lang('public.Closed')</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>@lang('public.Contact_Us')</h3>
                            <form class="newsletter-box">
                                <div class="form-group">
                                    <input class="" type="email" name="Email" placeholder="*" />
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <a href="{{url('/contact')}}" class="btn hvr-hover" type="submit">@lang('public.Contact_Us')</a>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>@lang('public.Social_Media')</h3>
                            <p>@lang('public.k01')</p>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>@lang('public.About_SM')</h4>
                            <p>@lang('public.k02')</p>
                            @if (app()->getLocale() === 'ar')
                            <h4>الرقم الضريبي: 706-486-587</h4>
                            <h4>رقم التسجيل: 21024</h4>
                            @else
                            <h4>Vat number:706-486-587</h4>
                            <h4>Registration no:21024</h4>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>@lang('public.Information')</h4>
                            <ul>
                                <li><a href="{{url('/about')}}">@lang('public.About')</a></li>
                                <li><a href="#">@lang('public.Customer_Service')</a></li>
                                <li><a href="#">@lang('public.Privacy_Policy')</a></li>
                                <li><a href="#">@lang('public.Delivery_Information')</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12" id="contactuss">
                        <div class="footer-link-contact">
                            <h4>@lang('public.Contact_Us')</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>@lang('public.Address'): @lang('public.add1')</p>
                                </li>
                                 <li>
                                    <p><i class="fab fa-whatsapp"></i>@lang('public.Phone'): <a href="https://wa.me//201125746749">00201125746749</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>@lang('public.Phone'): <a href="">00201125746749</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>@lang('public.Phone'): <a href="">00201000008075</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>@lang('public.Email'): <a href="{{url('/contact')}}">smscience@sm-science.com</a></p>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->
    <script>
        const searchIcon = document.getElementById('search-icon');

        searchIcon.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2023 <a href="#">SM SCIENCE</a> Design By :
            <a href="https://icanforsoftware.com/">ICANFORSOFTWARE</a>
        </p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{asset('js/jquery.superslides.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.js')}}"></script>
    <script src="{{asset('js/inewsticker.js')}}"></script>
    <script src="{{asset('js/bootsnav.js')}}"></script>
    <script src="{{asset('js/images-loded.min.js')}}"></script>
    <script src="{{asset('js/isotope.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/baguetteBox.min.js')}}"></script>
    <script src="{{asset('js/form-validator.min.js')}}"></script>
    <script src="{{asset('js/contact-form-script.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
</body>

</html>