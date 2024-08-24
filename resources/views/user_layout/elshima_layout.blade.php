<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>El Shima</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Site Icons D:\project\SH_project\public\user_Pages\images\using_iamge\logo.png-->
    <link rel="shortcut icon" href="{{asset('elshima_logo.png')}}" type="image/x-icon">
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
    height: 80px;
    width: 80px;
  }
}


    </style>
</head>

<body>

    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="custom-select-box">
                        <!-- <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
                            <option>AR</option>
                            <option>EN</option>
                        </select> -->
                        <select id="basic" class="form-control selectpicker show-tick form-control" onchange="location = this.value;">
								<option value="/locale/en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>EN</option>
								<option value="/locale/ar" {{ app()->getLocale() == 'ar' ? 'selected' : '' }}>AR</option>
							</select>
                    </div>
                    <div class="right-phone-box">
                        <p>Call US :- <a href="#"> +11 900 800 100</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="#"><i class="fa fa-user s_color"></i> MyAccount</a></li>
                            <li><a href="#"><i class="fas fa-location-arrow"></i> Our location</a></li>
                            <li><a href="#"><i class="fas fa-headset"></i> Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="login-box">
                        @guest
                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder="Sign In">
                            <option data-content='<a href="#" data-toggle="modal" data-target="#modalRegisterForm">@lang("public.Register")</a>'></option>
                            <option data-content='<a href="#" data-toggle="modal" data-target="#modalLoginForm">@lang("public.Sign")</a>'></option>
                        </select>
                        @endguest
                        @auth

                        <a href="{{url('/logout')}}"  style="color: white;">@lang('public.Logout')</a>
                        @endauth
                    </div>
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT80
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 50%! Shop Now
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT30
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 50%! Shop Now
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
  
    @if (app()->getLocale() === 'ar') 
    <style>
        .ar{
            direction:rtl;
        }
    </style>



    @endif
    <header class="main-header" >
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- logo -->
                    <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('elshima_logo.png')}}" class="logo" alt=""></a>
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
                                <li><a href="/category/search/{{$item->id}}">{{$item->title}}</a></li>
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
                                <p>My Cart</p>
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
                            <h6><a href="#">{{$item->product_name}}</a></h6>
                            <p>{{$item->quantity}}x - <span class="price">{{$item->product_price}}</span></p>
                        </li>
                        @php $total += $item->quantity * $item->product_price; @endphp
                        @endforeach
                        <li class="total">
                            <a href="{{url('cart')}}" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: {{$total}}</span>
                        </li>
                    </ul>
                </li>
            </div>
            @endauth
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>

    <!-- End Main Top -->
    <!-- Modal -->
    <!-- Start Top Search -->

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
                    <h5 class="modal-title font-weight-bold" id="modalRegisterFormTitle">Sign up</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="registerForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="alert alert-danger d-none" id="registerError"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="registerBtn">Register</button>
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
                    <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="loginForm" action="{{url('signin')}}" method="POST">
                    @csrf
                    <div class="modal-body mx-3">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="alert alert-danger d-none" id="registerError"></div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" id="loginrBtn">Login</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalsearchForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="loginForm" action="{{url('signin')}}" method="POST">
                    @csrf
                    <div class="modal-body mx-3">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="alert alert-danger d-none" id="registerError"></div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" id="loginrBtn">Login</button>
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
    <!-- <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('images/using_iamge/sm.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('images/using_iamge/sm0.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('images/using_iamge/sm2.jpg')}}"alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('images/using_iamge/sm3.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('user_pages/images/using_iamge/sm4.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('images/using_iamge/sm7.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('images/using_iamge/sm8.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('images/using_iamge/sm9.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End Instagram Feed  -->


    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>Business Time</h3>
                            <ul class="list-time">
                                <li>Monday - Friday: 08.00am to 05.00pm</li>
                                <li>Saturday: 10.00am to 08.00pm</li>
                                <li>Sunday: <span>Closed</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>Newsletter</h3>
                            <form class="newsletter-box">
                                <div class="form-group">
                                    <input class="" type="email" name="Email" placeholder="Email Address*" />
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <button class="btn hvr-hover" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>Social Media</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
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
                            <h4>About Freshshop</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Information</h4>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Customer Service</a></li>
                                <li><a href="#">Our Sitemap</a></li>
                                <li><a href="#">Terms &amp; Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Delivery Information</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contact Us</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Address: Michael I. Days 3756 <br>Preston Street Wichita,<br> KS 67213 </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+1-888705770">+1-888 705 770</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">contactinfo@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->
<script>const searchIcon = document.getElementById('search-icon');

searchIcon.addEventListener('click', function() {
  window.scrollTo({ top: 0, behavior: 'smooth' });
});</script>
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