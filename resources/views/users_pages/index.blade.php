@extends('user_layout.layout')
@section('layout')
<!-- Start Slider -->
<style>
    .shop-cat-box img {
        height: 250px;
        /* Change this to the desired height */
        object-fit: cover;
        /* This ensures that the image fills the height of the container without stretching */
    }

    .product-image {
        width: 250px;
        height: 250px;
        object-fit: cover;
    }

    .description {
        background-color: #4F8340;
        padding: 20px;
        font-size: 16px;
        line-height: 1.5;
        border-radius: 5px;
    }

    .description h4 {
        color: white;

    }

    .description2 {
        background-color: white;
        padding: 20px;
        font-size: 16px;
        line-height: 1.5;
        border-radius: 5px;
    }

    .description2 h4 {
        color: #4F8340;

    }

    #errorMessage {
        position: fixed;
        top: 10%;
        width: 100%;
        text-align: center;
        z-index: 9999;
    }

    #succesmessage {
        position: fixed;
        top: 10%;
        width: 100%;
        text-align: center;
        z-index: 9999;
    }
    .slides-navigation {
    display: block; /* Show the slides navigation by default */
}

@media (max-width: 767px) {
    /* Apply styles when the screen width is 767px or less (considered as mobile screens) */
    .slides-navigation {
        display: none; /* Hide the slides navigation on mobile screens */ 
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
<!-- errro message  -->
<div id="errorMessage" class="alert alert-danger" style="display:none;"></div>
<!-- success message  -->
<div id="succesmessage" class="alert alert-success" style="display:none;"></div>
<div id="slides-shop" class="cover-slides">
    <ul class="slides-container">
        <li class="text-center">
            <img src="{{asset('images/using_iamge/SH_Slider.png')}}" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>@lang('public.SM_Scienc')</strong></h1>
                        <p class="m-b-40">@lang('public.slider1')</p>
                        <p><a class="btn hvr-hover" href="{{url('/shop')}}">@lang('public.Shop_New')</a></p>
                    </div>
                </div>
            </div>
        </li>
        <li class="text-center">
        <img src="{{asset('images/using_iamge/3.png')}}" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>@lang('public.SM_Scienc')</strong></h1>
                        <p class="m-b-40">@lang('public.slider2')</p>
                        <p><a class="btn hvr-hover" href="{{url('/shop')}}">@lang('public.Shop_New')</a></p>
                    </div>
                </div>
            </div>
        </li>
        <li class="text-center">
        <img src="{{asset('images/using_iamge/2.png')}}" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>@lang('public.SM_Scienc')</strong></h1>
                        <p class="m-b-40">@lang('public.slider3')</p>
                        <p><a class="btn hvr-hover" href="{{url('/shop')}}">@lang('public.Shop_New')</a></p>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <div class="slides-navigation">
        <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
    </div>
</div>
<!-- End Slider -->

<!-- Start Categories  -->
<div class="categories-shop">
    <div class="container">
        <div class="row">
            @foreach($category as $item)
            @if (app()->getLocale() === 'ar')   
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="shop-cat-box">
                    <img class="img-fluid" src="{{asset('/category_image/'.$item->image)}}" alt="" />
                    <a class="btn hvr-hover" href="/category/search/{{$item->id}}">{{$item->title_ar}}</a>
                </div>
            </div>
            @else
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="shop-cat-box">
                    <img class="img-fluid" src="{{asset('/category_image/'.$item->image)}}" alt="" />
                    <a class="btn hvr-hover" href="/category/search/{{$item->id}}">{{$item->title}}</a>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
<!-- End Categories -->

<div class="box-add-products ar">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="offer-box-products description">
                    <h4>@lang('public.abot1')</h4>
                </div>
                <div class="offer-box-products description2">
                    <h4>@lang('public.abot2')</h4>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="offer-box-products description2">
                    <h4>@lang('public.abot3')</h4>
                </div>
                <div class="offer-box-products description">
                    <h4>@lang('public.abot4')</h4>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Start Products  -->
<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>@lang('public.Products')</h1>
                    <p>@lang('public.abot5')</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="special-menu text-center">
                    <div class="button-group filter-button-group">
                        <button class="active" data-filter=".all">@lang('public.All')</button>
                        <button data-filter=".top-featured">@lang('public.Top_featured')</button>
                        <button data-filter=".best-seller">@lang('public.Best_seller')</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row special-list">
            @foreach($products as $item)
            <div class="col-lg-3 col-md-6 special-grid all">

                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">
                            <p class="sale">Sale</p>
                        </div>
                        <img src="{{asset('/products_images/'.$item->image)}}" class="img-fluid product-image " alt="Image">
                        <div class="mask-icon">
                            <ul>
                                <li><a href="/about/product/{{$item->id}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                <!-- <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li> -->
                            </ul>
                            <form id="add-to-cart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <a href="#" class="cart add-to-cart-btn" onclick="addToCart(event, this)">@lang('public.add_to_cart')</a>
                            </form>
                        </div>
                    </div>
                    <div class="why-text">
                        @if (app()->getLocale() === 'ar')   
                        <h4>{{$item->name_ar}}</h4>
                        @else
                        <h4>{{$item->name}}</h4>
                        @endif
                        <h5> {{$item->price}} LE</h5>
                    </div>
                </div>

            </div>
            @endforeach
            @foreach($featured_product as $item)
            <div class="col-lg-3 col-md-6 special-grid top-featured">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">
                            <p class="new">New</p>
                        </div>
                        <img src="{{asset('/products_images/'.$item->image)}}" class="img-fluid product-image " alt="Image">
                        <div class="mask-icon">
                            <ul>
                                <li><a href="/about/product/{{$item->id}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                <!-- <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li> -->
                            </ul>
                            <form id="add-to-cart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <a href="#" class="cart add-to-cart-btn" onclick="addToCart(event, this)">@lang('public.add_to_cart')</a>
                            </form>
                        </div>
                    </div>
                    <div class="why-text">
                    @if (app()->getLocale() === 'ar')   
                        <h4>{{$item->name_ar}}</h4>
                        @else
                        <h4>{{$item->name}}</h4>
                        @endif
                        <h5> {{$item->price}} LE</h5>
                    </div>
                </div>
            </div>
            @endforeach
            @foreach($bestseller as $item)
            <div class="col-lg-3 col-md-6 special-grid best-seller">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">

                        </div>
                        <img src="{{asset('/products_images/'.$item->image)}}" class="img-fluid product-image " alt="Image">
                        <div class="mask-icon">
                            <ul>
                                <li><a href="/about/product/{{$item->id}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                <!-- <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li> -->
                            </ul>
                            <form id="add-to-cart-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <a href="#" class="cart add-to-cart-btn" onclick="addToCart(event, this)">@lang('public.add_to_cart')</a>
                            </form>
                        </div>
                    </div>
                    <div class="why-text">
                    @if (app()->getLocale() === 'ar')   
                        <h4>{{$item->name_ar}}</h4>
                        @else
                        <h4>{{$item->name}}</h4>
                        @endif
                        <h5> {{$item->price}} LE</h5>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- End Products  -->

<!-- Start Blog  -->
<div class="latest-blog ar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>@lang('public.Latest_Blog')</h1>
                    <p>@lang('public.blog1')</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4 col-xl-4">
                <div class="blog-box">
                    <div class="blog-img">
                        <img class="img-fluid" src="{{asset('blogs1.jpg')}}" alt="" />
                    </div>
                    <div class="blog-content">
                        <div class="title-blog">
                            <h3>@lang('public.blog_1')</h3>
                            <p>@lang('public.blog_2')</p>
                        </div>
                        <ul class="option-blog">
                            <li><a href="{{url('/about')}}"><i class="fas fa-eye"></i></a></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4">
                <div class="blog-box">
                    <div class="blog-img">
                        <img class="img-fluid" src="{{asset('blogs2.JPG')}}" alt="img" />
                    </div>
                    <div class="blog-content">
                        <div class="title-blog">
                            <h3>@lang('public.blog_3')</h3>
                            <p>@lang('public.blog_4')</p>
                        </div>
                        <ul class="option-blog">
                            <li><a href="{{url('/about')}}"><i class="fas fa-eye"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4">
                <div class="blog-box">
                    <div class="blog-img">
                        <img class="img-fluid" src="{{asset('blogs3.JPG')}}" alt="" />
                    </div>
                    <div class="blog-content">
                        <div class="title-blog">
                            <h3>@lang('public.blog_5')</h3>
                            <p>@lang('public.blog_6')</p>
                        </div>
                        <ul class="option-blog">
                            <li><a href="{{url('/about')}}"><i class="fas fa-eye"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Blog  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- jQuery code to handle the button click event -->

<script>
    function addToCart(event, element) {
        event.preventDefault();
        var formData = $(element).closest('form').serialize();
        var product_id = $(element).closest('form').find('input[name="product_id"]').val();
        var quantity = $(element).closest('form').find('input[name="quantity"]').val();

        $.ajax({
            url: '/add/product/to/cart/' + product_id,
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.status == 'success') {
                    // Show success message
                    $('#succesmessage').text(response.message).addClass('success').show();
                    setTimeout(function() {
                        $('#succesmessage').fadeOut('slow').removeClass('success error');
                    }, 3000);

                    // // Update the cart count element with the new count value
                    // $('#cart-count').text(response.cartCount);

                    // // Update the cart items element with the new items data
                    // $('#cart-items').html(response.cartItemsHtml);

                    // // Update the cart total element with the new total value
                    // $('#cart-total').text(response.cartTotal.toFixed(2));

                    $('.cart-box').load(location.href + ' .cart-box');
                    $('.badge').load(location.href + ' .badge');


                } else {
                    // Show error message
                    $('#errorMessage').text(response.message2).show();
                    setTimeout(function() {
                        $('#errorMessage').fadeOut('slow');
                    }, 3000);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Show error message
                $('#errorMessage').text('An error occurred. Please try again later.').show();
                setTimeout(function() {
                    $('#errorMessage').fadeOut('slow');
                }, 3000);
            }
        });
    }
</script>
@endsection