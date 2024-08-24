@extends('user_layout.layout')
@section('layout')
@if (app()->getLocale() === 'ar')
<style>
    .ar {
        direction: rtl;
        text-align: right;
    }
</style>
@endif

@if (app()->getLocale() === 'ar')

<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>اتمام الطلب</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">الطلبات</li>
                    <li class="breadcrumb-item"><a href="{{url('shop')}}">المتجر</a></li>

                </ul>
            </div>
        </div>
    </div>
</div>

<div class="cart-box-main">
    <div class="container">
        <div class="row new-account-login">
        </div>
        <div class="row">
            <div class="col-sm-6 col-lg-6 mb-3 ar">
                <div class="checkout-address">
                    <div class="title-left">
                        <h3>الفاتورة</h3>
                    </div>
                    <form class="needs-validation" novalidate action="{{url('/checkout/sucess')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">الاسم *</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="" value="" required>
                                <div class="invalid-feedback">الاسم صحيح مطلوب.</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email">البريد الإلكتروني *</label>
                                <input type="email" class="form-control" id="user_email" name="user_email" placeholder="" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
                                <div class="invalid-feedback">الرجاء إدخال عنوان بريد إلكتروني صحيح للتحديثات الشحن.</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="username">رقم الهاتف *</label>
                            <div class="input-group">
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="" required pattern="[0-9+]{8,15}" minlength="8" maxlength="15">
                                <div class="invalid-feedback" style="width: 100%;">رقم هاتفك مطلوب.</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email">رقم الهاتف 2</label>
                            <input type="tel" class="form-control" id="phone2" name="phone2" placeholder="">
                            <div class="invalid-feedback">الرجاء إدخال رقم هاتف صحيح.</div>
                        </div>
                        <div class="mb-3">
                            <label for="address">العنوان *</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="" required>
                            <div class="invalid-feedback">الرجاء إدخال عنوان الشحن الخاص بك.</div>
                        </div>
                        <div class="mb-3">
                            <label for="address2">العنوان 2</label>
                            <input type="text" class="form-control" id="address2" name="address2" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="country">المدينة *</label>
                            <select class="wide w-100" id="city" name="city" required>
                                <option value=""></option>
                                @foreach($shipping_info as $item)
                                <option value="{{$item->city}}" data-display="اختر">{{$item->city}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">الرجاء اختيار مدينة صحيحة.</div>
                        </div>
                        <hr class="mb-4">
                </div>
            </div>
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="order-box">
                            <div class="title-left">
                                <h3>طلبك</h3>
                            </div>
                            <div class="d-flex">
                                <div class="font-weight-bold">المنتج</div>
                                <div class="ml-auto center font-weight-bold">الكمية</div>
                                <div class="ml-auto font-weight-bold">السعر</div>
                                <div class="ml-auto font-weight-bold">الإجمالي</div>
                            </div>
                            <hr class="my-1">
                            @php $total=0; @endphp
                            @foreach($cart as $item)
                            @php
                            $total += $item->product_price * $item->quantity;
                            @endphp
                            <div class="d-flex">
                                <h4>{{$item->product_name_ar}}</h4>
                                <div class="ml-auto center font-weight-bold"> {{$item->quantity}} </div>
                                <div class="ml-auto font-weight-bold"> {{$item->product_price}} </div>
                                <div class="ml-auto font-weight-bold"> {{$item->total}} </div>
                            </div>

                            @endforeach
                            <div class="d-flex gr-total">
                                <h5>الإجمالي</h5>
                                <div class="ml-auto h5"> {{$total}}.LE</div>
                            </div>
                            <hr>
                            <div class="d-flex gr-total">
                                <h5>تكلفة الشحن</h5>
                                <div class="ml-auto h5 shipping-cost">0.00.LE</div>
                            </div>
                            <hr>
                            <div class="d-flex gr-total">
                                <h5>الإجمالي النهائي</h5>
                                <div class="ml-auto h5 final-total">0.00,LE</div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="col-12 d-flex shopping-box"> <button class="ml-auto btn hvr-hover" type="submit"> الطلب</button> </div>
                    <!-- <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button> -->
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
@else
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Complete Oreder</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="cart-box-main">
    <div class="container">
        <div class="row new-account-login">
        </div>
        <div class="row">
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="checkout-address">
                    <div class="title-left">
                        <h3>Billing address</h3>
                    </div>
                    <form class="needs-validation" novalidate action="{{url('/checkout/sucess')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">Name *</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="" value="" required>
                                <div class="invalid-feedback">Valid name is required.</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email">Email Address *</label>
                                <input type="email" class="form-control" id="user_email" name="user_email" placeholder="" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
                                <div class="invalid-feedback">Please enter a valid email address for shipping updates.</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="username">Phone *</label>
                            <div class="input-group">
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="" required pattern="[0-9+]{8,15}" minlength="8" maxlength="15">
                                <div class="invalid-feedback" style="width: 100%;">Your phone number is required.</div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email">Phone 2</label>
                            <input type="tel" class="form-control" id="phone2" name="phone2" placeholder="">
                            <div class="invalid-feedback">Please enter a valid phone number.</div>
                        </div>
                        <div class="mb-3">
                            <label for="address">Address *</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="" required>
                            <div class="invalid-feedback">Please enter your shipping address.</div>
                        </div>
                        <div class="mb-3">
                            <label for="address2">Address 2</label>
                            <input type="text" class="form-control" id="address2" name="address2" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="country">City *</label>
                            <select class="wide w-100" id="city" name="city" required>
                                <option value=""></option>
                                @foreach($shipping_info as $item)
                                <option value="{{$item->city}}" data-display="Select">{{$item->city}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Please select a valid city.</div>
                        </div>
                        <hr class="mb-4">
                </div>
            </div>
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="order-box">
                            <div class="title-left">
                                <h3>Your order</h3>
                            </div>
                            <div class="d-flex">
                                <div class="font-weight-bold">Product</div>
                                <div class="ml-auto center font-weight-bold">Quantity</div>
                                <div class="ml-auto font-weight-bold">Price</div>
                                <div class="ml-auto font-weight-bold">Total</div>
                            </div>
                            <hr class="my-1">
                            @php $total=0; @endphp
                            @foreach($cart as $item)
                            @php
                            $total += $item->product_price * $item->quantity;
                            @endphp
                            <div class="d-flex">
                                <h4>{{$item->product_name}}</h4>
                                <div class="ml-auto center font-weight-bold"> {{$item->quantity}} </div>
                                <div class="ml-auto font-weight-bold"> {{$item->product_price}} </div>
                                <div class="ml-auto font-weight-bold"> {{$item->total}} </div>
                            </div>

                            @endforeach
                            <div class="d-flex gr-total">
                                <h5>Total</h5>
                                <div class="ml-auto h5"> {{$total}}.LE</div>
                            </div>
                            <hr>
                            <div class="d-flex gr-total">
                                <h5>Shipping Cost</h5>
                                <div class="ml-auto h5 shipping-cost">0.00.LE</div>
                            </div>
                            <hr>
                            <div class="d-flex gr-total">
                                <h5>Final Total</h5>
                                <div class="ml-auto h5 final-total">$0.00</div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="col-12 d-flex shopping-box"> <button class="ml-auto btn hvr-hover" type="submit">Place Order</button> </div>
                    <!-- <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button> -->
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
@endif

<!-- End Cart -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    // Get the form element
    var form = document.querySelector('.needs-validation');

    // Add a listener for the form submission
    form.addEventListener('submit', function(event) {
        // Check if the form is valid
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }

        form.classList.add('was-validated');
    });
</script>
<script>
    // Get the selected city value whenever it changes
    $('#city').change(function() {
        var selectedCity = $(this).val();

        // Make an AJAX request to retrieve the cost of the selected city
        $.ajax({
            url: '/get-shipping-cost',
            method: 'GET',
            data: {
                city: selectedCity
            },
            success: function(response) {
                var cost = response.cost; // Assuming the server returns the cost in the "cost" field

                // Use the retrieved cost as needed
                $('.shipping-cost').text('$' + cost);
                // Calculate the final total
                var total = parseFloat('{{ $total }}'); // Convert $total to a floating-point number
                var finalTotal = total + parseFloat(cost);

                // Display the final total in the HTML markup
                $('.final-total').text('$' + finalTotal);
            },
            error: function(xhr, status, error) {
                console.log('An error occurred while retrieving the shipping cost:', error);
            }
        });
    });
</script>
@endsection