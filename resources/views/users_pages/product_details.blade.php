@extends('user_layout.layout')
@section('layout')
<style>
    .product-quantity-slider {
        display: flex;
        align-items: center;
    }

    .img-fluid {

        height: 250px;
        object-fit: cover;
    }

    .product-quantity-slider button {
        width: 30px;
        height: 30px;
        background: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 20px;
        line-height: 1;
        text-align: center;
        cursor: pointer;
    }

    .product-quantity-slider input {
        width: 40px;
        height: 30px;
        padding: 5px;
        border: none;
        border-radius: 3px;
        font-size: 16px;
        text-align: center;
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
</style>
<script>
    $(document).ready(function() {
        // Get the quantity input element and the increment/decrement buttons
        var $quantityInput = $(".product-quantity");
        var $incrementBtn = $(".increment-btn");
        var $decrementBtn = $(".decrement-btn");

        // Increment quantity when the increment button is clicked
        $incrementBtn.click(function() {
            var currentValue = parseInt($quantityInput.val(), 10);
            if (!isNaN(currentValue)) {
                $quantityInput.val(currentValue + 1);
            }
        });

        // Decrement quantity when the decrement button is clicked
        $decrementBtn.click(function() {
            var currentValue = parseInt($quantityInput.val(), 10);
            if (!isNaN(currentValue) && currentValue > 1) {
                $quantityInput.val(currentValue - 1);
            }
        });
    });
</script>
<!-- errro message  -->
<div id="errorMessage" class="alert alert-danger" style="display:none;"></div>
<!-- success message  -->
<div id="succesmessage" class="alert alert-success" style="display:none;"></div>
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if (app()->getLocale() === 'ar')

                <h2>تفاصيل المنتج</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">تفاصيل المنتج</li>
                    <li class="breadcrumb-item"><a href="{{url('shop')}}">المتجر</a></li>

                </ul>
                @else
                <h2>Product Detail </h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('shop')}}">Shop</a></li>
                    <li class="breadcrumb-item active">product Detail </li>
                </ul>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Shop Detail  -->
<div class="shop-detail-box-main">
    <div class="container">
        <div class="row">
            <!-- <div class="col-xl-5 col-lg-5 col-md-6">
                <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active"> <img class="d-block w-100" src="{{asset('/products_images/'.$product->image)}}" alt="First slide"> </div>
                    </div>
                </div>
            </div> -->
            <div class="col-xl-5 col-lg-5 col-md-6">
                <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active"> <img class="d-block w-100" src="{{asset('/products_images/'.$product->image)}}" alt="slide"> </div>
                        @foreach($product_images as $image)
                        <div class="carousel-item"> <img class="d-block w-100" src="{{asset('/products_images/'.$image->image)}}" alt="slide"> </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                    <ol class="carousel-indicators">
                        @foreach($product_images as $image)
                        <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                            <img class="d-block w-100 img-fluid" src="{{asset('/products_images/'.$image->image)}}" alt="" />
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-6">
                <div class="single-product-details">
                    <style>
                        .single-product-details table {
                            border-collapse: collapse;
                            width: 100%;
                        }

                        .single-product-details th,
                        .single-product-details td {
                            border: 1px solid #ddd;
                            padding: 8px;
                        }

                        .single-product-details th {
                            background-color: #f2f2f2;
                        }
                    </style>
                    @if (app()->getLocale() === 'ar')
                    <table style="direction: rtl;text-align: right ;">
                        <tr>
                            <td>اسم المنتج</td>
                            <td>{{$product->name_ar}}</td>
                        </tr>
                        @if($product->price != 0)
                        <tr>
                            <td>السعر</td>
                            <td>{{$product->price}} LE</td>
                        </tr>
                        @endif
                        @if($product->production_date != "")
                        <tr>
                            <td>تاريخ الإنتاج</td>
                            <td>{{$product->production_date}}</td>
                        </tr>
                        @endif
                        @if($product->expiry_date != "")
                        <tr>
                            <td>تاريخ انتهاء الصلاحية</td>
                            <td>{{$product->expiry_date}}</td>
                        </tr>
                        @endif
                        @if($product->country_of_origin_ar != "")
                        <tr>
                            <td>بلد المنشأ</td>
                            <td>{{$product->country_of_origin_ar}}</td>
                        </tr>
                        @endif
                        @if($product->effective_material_ar != "")
                        <tr>
                            <td>مادة فعالة</td>
                            <td>{{$product->effective_material_ar}}</td>
                        </tr>
                        @endif
                        <tr>
                            <td rowspan="2">وصف المنتج</td>
                            <td>
                                {{$product->short_details_ar}}
                                <br>
                                {{$product->long_details_ar}}
                            </td>
                        </tr>
                    </table>
                    @else
                    <table>

                        <tr>
                            <td>Product Name</td>
                            <td>{{$product->name}}</td>
                        </tr>
                        @if($product->price != 0)
                        <tr>
                            <td>Price</td>
                            <td>{{$product->price}} LE</td>
                        </tr>
                        @endif
                        @if($product->production_date != "")
                        <tr>
                            <td>Production Date</td>
                            <td>{{$product->production_date}}</td>
                        </tr>
                        @endif
                        @if($product->expiry_date != "")
                        <tr>
                            <td>Expiry Date</td>
                            <td>{{$product->expiry_date}}</td>
                        </tr>
                        @endif
                        @if($product->country_of_origin != "")
                        <tr>
                            <td>Country Of Origin</td>
                            <td>{{$product->country_of_origin}}</td>
                        </tr>
                        @endif
                        @if($product->effective_material != "")
                        <tr>
                            <td>Effective Material</td>
                            <td>{{$product->effective_material}}</td>
                        </tr>
                        @endif
                        <tr>
                            <td rowspan="2">Description</td>
                            <td>{{$product->short_details}} <br> {{$product->long_details}}</td>
                        </tr>

                    </table>
                    @endif
                    <form id="add-to-cart-form">
                        <ul>
                            <li>
                                <div class="product-quantity-slider">
                                    <button class="decrement-btn" type="button">-</button>
                                    <input class="product-quantity" readonly type="text" value="1" id="quantity" name="quantity">
                                    <button class="increment-btn" type="button">+</button>
                                </div>
                            </li>
                        </ul>
                        <div class="price-box-bar">
                            <div class="cart-and-bay-btn">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <a href="#" class="cart add-to-cart-btn btn hvr-hover" onclick="addToCart(event, this)">@lang('public.add_to_cart')</a>
                            </div>
                        </div>
                    </form>

                    <div class="add-to-btn">
                        <div class="share-bar">
                            <a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                            <a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
                            <a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                            <a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                            <a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="card card-outline-secondary my-4">
                <div class="card-header">
                    @if (app()->getLocale() === 'ar')
                    <h2>تعليقات المنتج</h2>
                    @else
                    <h2>Product Reviews</h2>
                    @endif
                </div>
                <div class="card-body">
                    <div class="media mb-3">

                        <div class="media-body" data-id="usage_details">
                            {!! $product->usage_details !!}
                        </div>
                    </div>

                    <hr>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>
                        @if (app()->getLocale() === 'ar')
                        المنتجات ذات صله
                        @else
                        Related Products
                        @endif
                    </h1>
                    <p>
                        @if (app()->getLocale() === 'ar')
                        الأسمدة هي مواد تضاف إلى التربة أو النباتات لتحسين توافر المغذيات وزيادة إنتاجية المحاصيل. يتم استخدام الأسمدة لتعزيز نمو النباتات وتحسين صحة التربة.
                        @else
                        Fertilizers are substances added to soil or plants to improve nutrient availability and increase crop productivity. Fertilizers are used to promote plant growth and enhance soil health.
                        @endif
                    </p>
                </div>
                <div class="featured-products-box owl-carousel owl-theme">
                    @foreach($related_products as $item)
                    <div class="item">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <img src="{{asset('/products_images/'.$item->image)}}" class="img-fluid" alt="Image">
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="/about/product/{{$item->id}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>

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
                                <h5> {{$item->price}}</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Cart -->
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