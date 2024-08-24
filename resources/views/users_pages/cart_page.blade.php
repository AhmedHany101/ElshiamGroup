@extends('user_layout.layout')
@section('layout')
<style>
    .quantity-box {
        width: 100px;
    }

    .product-quantity-slider {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product-quantity-slider button {
        background-color: #f7f7f7;
        color: #333;
        border: 1px solid #ccc;
        padding: 5px 10px;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.2s ease-in-out;
    }

    .product-quantity-slider button:hover {
        background-color: #333;
        color: #fff;
        border-color: #333;
    }

    .product-quantity-slider input {
        width: 50px;
        text-align: center;
        font-size: 16px;
        border: 1px solid #ccc;
        padding: 5px;
        margin: 0 5px;
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
<!-- Start Cart  -->
@if (app()->getLocale() === 'ar')
<div class="cart-box-main ar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-main table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>الصور</th>
                                <th>اسم المنتج</th>
                                <th>السعر</th>
                                <th>الكمية</th>
                                <th>الإجمالي</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($cart as $item)
                            <tr>
                                <td class="thumbnail-img">
                                    <a href="#">
                                        <img class="img-fluid" src="{{asset('/products_images/'.$item->product_image)}}" alt="" />
                                    </a>
                                </td>
                                <td class="name-pr">
                                    <a href="/about/product/{{$item->product_id}}">
                                
                                        {{$item->product_name_ar}}
                                    </a>
                                </td>
                                <td class="price-pr">
                                    <p>{{$item->product_price}}</p>
                                </td>
                                <td class="quantity-box">
                                    <div class="product-quantity">
                                        <div class="product-quantity-slider">
                                            <button class="decrement-btn" type="button">-</button>
                                            <input class="product-quantity" readonly type="text" value="{{$item->quantity}}" name="quantity" data-cart-item-id="{{$item->id}}">
                                            <button class="increment-btn" type="button">+</button>
                                        </div>
                                    </div>
                                </td>
                                <td class="total-pr item-total">
                                    {{$item->product_price * $item->quantity}}
                                </td>
                                <td class="remove-pr">
                                    <a href="{{ route('delet_product', $item->id) }}" class="remove-cart-item" data-cart-item-id="{{$item->id}}">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>   
        <div class="row my-5">
            <div class="col-12 d-flex shopping-box"><a href="{{url('checkout')}}" class="ml-auto btn hvr-hover">اتمام الطلب</a> </div>
        </div>
    </div>
</div>

@else

<div class="cart-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-main table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Images</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($cart as $item)
                            <tr>
                                <td class="thumbnail-img">
                                <a href="/about/product/{{$item->product_id}}">
                                        <img class="img-fluid" src="{{asset('/products_images/'.$item->product_image)}}" alt="" />
                                    </a>
                                </td>
                                <td class="name-pr">
                                    <a href="#">
                                        {{$item->product_name}}
                                    </a>
                                </td>
                                <td class="price-pr">
                                    <p>{{$item->product_price}}</p>
                                </td>
                                <td class="quantity-box">
                                    <div class="product-quantity">
                                        <div class="product-quantity-slider">
                                            <button class="decrement-btn" type="button">-</button>
                                            <input class="product-quantity" readonly type="text" value="{{$item->quantity}}" name="quantity" data-cart-item-id="{{$item->id}}">
                                            <button class="increment-btn" type="button">+</button>
                                        </div>
                                    </div>
                                </td>
                                <td class="total-pr item-total">
                                    {{$item->product_price * $item->quantity}}
                                </td>
                                <td class="remove-pr">
                                    <a href="{{ route('delet_product', $item->id) }}" class="remove-cart-item" data-cart-item-id="{{$item->id}}">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-12 d-flex shopping-box"><a href="{{url('checkout')}}" class="ml-auto btn hvr-hover">Complete Oreder</a></div>
        </div>
    </div>
</div>


@endif

<!-- End Cart -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script>
    var incrementButtons = $('.increment-btn');
    var decrementButtons = $('.decrement-btn');
    var productQuantities = $('.product-quantity');

    incrementButtons.click(function() {
        var cartItemId = $(this).siblings('.product-quantity').data('cart-item-id');
        var productQuantity = $(this).siblings('.product-quantity');
        var itemTotal = $(this).parents('tr').find('.item-total');

        $.ajax({
            url: '/increment-cart-item',
            type: 'POST',
            data: {
                cartItemId: cartItemId,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                productQuantity.val(parseInt(productQuantity.val()) + 1);
                itemTotal.text(data);
            }
        });
    });

    decrementButtons.click(function() {
        var cartItemId = $(this).siblings('.product-quantity').data('cart-item-id');
        var productQuantity = $(this).siblings('.product-quantity');
        var itemTotal = $(this).parents('tr').find('.item-total');

        if (parseInt(productQuantity.val()) > 1) {
            $.ajax({
                url: '/decrement-cart-item',
                type: 'POST',
                data: {
                    cartItemId: cartItemId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    productQuantity.val(parseInt(productQuantity.val()) - 1);
                    itemTotal.text(data);
                }
            });
        }
    });


    productQuantities.change(function() {
        var cartItemId = $(this).data('cart-item-id');
        var productQuantity = $(this);
        var itemTotal = $(this).parents('tr').find('.item-total');
        var cartTotal = $('#cart-total'); // Select the element by ID

        $.ajax({
            url: '/update-cart-item-quantity',
            type: 'POST',
            data: {
                cartItemId: cartItemId,
                quantity: productQuantity.val(),
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                itemTotal.text(data);
                cartTotal.text(data);
            }
        });
    });
    $(document).on('click', '.remove-cart-item', function(e) {
        e.preventDefault();
        var cartItemId = $(this).data('cart-item-id');
        var cartItemRow = $(this).parents('tr');

        $.ajax({
            url: $(this).attr('href'), // Use the URL of the link element
            type: 'get',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                cartItemRow.remove();
                $('#cart-total').text(data.cartTotal);
            }
        });
    });
</script>
@endsection