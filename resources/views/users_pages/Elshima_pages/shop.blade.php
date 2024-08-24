@extends('user_layout.elshima_layout')
@section('layout')
<style>
    .img-fluid {

        height: 250px;
        object-fit: cover;
    }

    @media (max-width: 768px) {
        .aline .row>div {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }

    .pagination {
        display: flex;
        justify-content: center;
        color: goldenrod;
        padding: 10px 0;
    }

    .pagination>* {
        margin: auto 5px;
    }

    .pagination .page-link {
        color: black;
        background-color: white;
    }

    .pagination .page-item.active .page-link {
        background-color: goldenrod;
        color: white;
        border: 1px solid goldenrod;
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
@if (app()->getLocale() === 'ar')
<style>
    .ar {
        direction: rtl;
        text-align: right;
    }
</style>
@endif
<!-- Start Shop Page  -->
<!-- errro message  -->
<div id="errorMessage" class="alert alert-danger" style="display:none;"></div>
<!-- success message  -->
<div id="succesmessage" class="alert alert-success" style="display:none;"></div>


<div class="shop-box-inner">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                <div class="right-product-box">
                    <div class="product-item-filter row">
                        <div class="col-12 col-sm-8 text-center text-sm-left">
                            <div class="toolbar-sorter-right">
                                <span></span>
                                <li class="dropdown">
                                    <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">@lang('public.Sort_by')</a>
                                    @if (app()->getLocale() === 'ar')
                                    <ul class="dropdown-menu ar">
                                        <li><a class="dropdown-item" href="{{url('/search/sortby_newest')}}">الأحدث</a></li>
                                        <li><a class="dropdown-item" href="{{url('/search/sortby_oldest')}}">الأقدم</a></li>
                                        <li><a class="dropdown-item" href="{{url('/search/sortby_price_low')}}">السعر الأقل</a></li>
                                        <li><a class="dropdown-item" href="{{url('/search/sortby_price_high')}}">السعر الأعلى</a></li>
                                    </ul>
                                    @else
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{url('/search/sortby_newest')}}">Newest</a></li>
                                        <li><a class="dropdown-item" href="{{url('/search/sortby_oldest')}}">Oldest</a></li>
                                        <li><a class="dropdown-item" href="{{url('/search/sortby_price_low')}}">Low Price</a></li>
                                        <li><a class="dropdown-item" href="{{url('/search/sortby_price_high')}}">High Price</a></li>
                                    </ul>
                                    @endif
                                </li>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 text-center text-sm-right">
                            <ul class="nav nav-tabs ml-auto">
                                <li>
                                    <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-categorie-box">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active aline" id="grid-view">
                                <div class="row">
                                    @foreach($products as $item)
                                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                        <div class="products-single fix">
                                            <div class="box-img-hover">
                                                <div class="type-lb">
                                                    <p class="sale">Sale</p>
                                                </div>
                                                <img src="{{asset('/products_images/'.$item->image)}}" class="img-fluid" alt="Image">
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
                                                <h4>{{$item->name}}</h4>
                                                <h5> {{$item->price}} LE</h5>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="list-view">
                                @foreach($products as $item)
                                <div class="list-view-box">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="new">New</p>
                                                    </div>
                                                    <img src="{{asset('/products_images/'.$item->image)}}" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="/about/product/{{$item->id}}" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                            <div class="why-text full-width">
                                                <h4>{{$item->name}}</h4>
                                                <h5> {{$item->price}} LE</h5>
                                                <p>{{$item->short_details}}</p>
                                                <p>{{$item->long_details}}</p>
                                                <form id="add-to-cart-form">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="product_id" value="{{ $item->id }}">
                                                    <input type="hidden" name="quantity" value="1">
                                                    <a href="#" class="btn hvr-hover add-to-cart-btn" onclick="addToCart(event, this)">@lang('public.add_to_cart')</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        {{$products->links()}}

                    </div>
                </div>

            </div>
            <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                <div class="product-categori">
                    <div class="search-product">
                        <form action="{{ url('/prodcut/search') }}" method="GET">
                            <input class="form-control" name="search" placeholder="Search here..." type="text">
                            <button type="submit"> <i class="fa fa-search"></i> </button>
                        </form>
                    </div>
                    <div class="filter-sidebar-left">
                        <div class="title-left">
                            <h3>@lang('public.Categories')</h3>
                        </div>

                        <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                            @foreach($category as $item)
                            @php
                            // Filter the subcategories that belong to this category
                            $subcategoriesCount = $subcategories->where('category', $item->title)->count();
                            @endphp
                            <div class="list-group-collapse sub-men">
                                <a class="list-group-item list-group-item-action" href="/category/search/{{$item->id}}" aria-expanded="true" aria-controls="sub-men{{$loop->iteration}}">
                                    {{$item->title}} <small class="text-muted">({{$subcategoriesCount}})</small>
                                    <i class="bi bi-arrow-right-square-fill"></i>
                                </a>

                                <div class="collapse show" id="sub-men1" data-parent="#list-group-men">

                                    @foreach($subcategories as $subcategory)
                                    @php
                                    // Filter the subcategories that belong to this category
                                    $productCount = $products->where('subcategories', $subcategory->title)->count();
                                    @endphp
                                    @if($subcategory->category === $item->title)
                                    <div class="list-group">
                                        <a href="/category/search/{{$subcategory->id}}" class="list-group-item list-group-item-action active">{{$subcategory->title}}<small class="text-muted">({{$productCount}})</small></a>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>

                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>
</div>
<!-- End Shop Page -->

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