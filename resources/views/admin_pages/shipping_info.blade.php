@extends('admin_layout.layout')
@section('layout')
@if (app()->getLocale() === 'ar') 
    <style>
        .ar{
            direction:rtl;
        }
    </style>
    @endif
    <style>
        .success-message {
            position: fixed;
            top: 10%;
            left: 0;
            width: 100%;
            background-color: green;
            color: white;
            font-weight: bold;
            text-align: center;
            padding: 10px;
            display: none;
        }
        .err-message
        {
            position: fixed;
            top: 10%;
            left: 0;
            width: 100%;
            background-color: red;
            color: white;
            font-weight: bold;
            text-align: center;
            padding: 10px;
            display: none;
        }
    </style>
  
<main id="main" class="main">
@if(session('message'))
    <div id="suceesMessage" class="alert alert-success" style="display:none;">{{session('message')}}</div>
    <script>
        // Show the error message
        document.getElementById('suceesMessage').style.display = 'block';
        // Hide the error message after 5 seconds
        setTimeout(function() {
            document.getElementById('suceesMessage').style.display = 'none';
        }, 5000);

        
    </script>
    @endif
    @if(session('message_error'))
    <div id="errorMessage" class="alert alert-danger"  style="display:none;">{{ session('message_error') }}</div>
    <script>
           // Show the error message
           document.getElementById('errorMessage').style.display = 'block';
        // Hide the error message after 5 seconds
        setTimeout(function() {
            document.getElementById('errorMessage').style.display = 'none';
        }, 5000);
    </script>
    @endif
    <div class="pagetitle">
        <h1>@lang('public.Subcategories_Data')</h1>
        <nav>
            <ol class="breadcrumb ar">
                <li class="breadcrumb-item"><a href="{{url('/admin/index')}}">@lang('public.Home')/</a></li>
                <li class="breadcrumb-item">@lang('public.Shipping')</li>
                <li class="breadcrumb-item active">@lang('public.Data')</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body tab_data table-responsive">
                        <h5 class="card-title ar">@lang('public.Shipping')</h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Add_Shipping_info" data-bs-whatever="@mdo">@lang('public.Add_Shipping_info')</button>
                        <!-- Table with stripped rows -->
                        @if (app()->getLocale() === 'ar') 
                        <table class="table datatable ">
                            <thead>
                                <tr>
                                    <th scope="col">@lang('public.Edite')</th>
                                    <th scope="col">@lang('public.Delete')</th>
                                    <th scope="col">@lang('public.cost')</th>
                                    <th scope="col">@lang('public.city')</th>
                                    <th scope="col">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($shipping as $item)
                                <tr>
                                    <td><a href="" class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" data-bs-toggle="modal" data-bs-target="#edite_Shipping_info" data-id="{{ $item->id }}" data-city="{{ $item->city }}" data-cost="{{ $item->cost }}" id="btn-info">@lang('public.Edite') <i class="bi bi-pencil-fill"></i></a></td>
                                    <td><a href="/admin/shipping/delete/{{$item->id}}" class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">@lang('public.Delete') <i class="bi bi-trash3"></i></a></td>
                                    <th scope="row">{{$item->cost}}</th>
                                    <th scope="row">{{$item->city}}</th>
                                    <th scope="row">{{$item->id}}</th>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        @else
                        <table class="table datatable ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">@lang('public.city')</th>
                                    <th scope="col">@lang('public.cost')</th>
                                    <th scope="col">@lang('public.Delete')</th>
                                    <th scope="col">@lang('public.Edite')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($shipping as $item)
                                <tr>
                                    <th scope="row">{{$item->id}}</th>
                                    <th scope="row">{{$item->city}}</th>
                                    <th scope="row">{{$item->cost}}</th>
                                    <td><a href="/admin/shipping/delete/{{$item->id}}" class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">@lang('public.Delete') <i class="bi bi-trash3"></i></a></td>
                                    <td><a href="" class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" data-bs-toggle="modal" data-bs-target="#edite_Shipping_info" data-id="{{ $item->id }}" data-city="{{ $item->city }}" data-cost="{{ $item->cost }}" id="btn-info">@lang('public.Edite') <i class="bi bi-pencil-fill"></i></a></td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        @endif
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- add new category model -->
    <div class="modal fade" id="Add_Shipping_info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('public.Add_Shipping_info')</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ar">
                    <form id="Add_Shipping_info_form" method="POST" action="{{ url('admin/addnewsubcategories') }}" enctype="multipart/form-data">
                        <div id="err"></div>
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="col-form-label">@lang('public.city')</label>
                            <input type="text" class="form-control" id="city" name="city">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="col-form-label">@lang('public.cost')</label>
                            <input type="number" class="form-control" id="cost" name="cost">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close-btn">@lang('public.Close')</button>
                    <button type="submit" class="btn btn-primary" id="submit-btn">@lang('public.save')</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- update category -->
    <div class="modal fade" id="edite_Shipping_info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('public.Edite_info_shipping')</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ar">
                    <form id="edite" action="{{url('admin/shipping_info')}}" method="POST" enctype="multipart/form-data">
                        <div id="err"></div>
                        @csrf
                        <input type="hidden" name="id" id="up_id">
                        <div class="mb-3">
                            <label for="title" class="col-form-label">@lang('public.city')</label>
                            <input type="text" class="form-control" id="up_city" name="city" required>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="col-form-label">@lang('public.cost')</label>
                            <input type="number" class="form-control" id="up_cost" name="cost" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close-btn">@lang('public.Close')</button>
                    <button type="submit" class="btn btn-primary" id="update">@lang('public.save')</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</main>
<!-- End #main -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#Add_Shipping_info_form').on('submit', function(event) {
    event.preventDefault();
    var name_error = '';

    $('#city').each(function() {
        if ($(this).val() == '') {
            name_error += '<span style="color:red">ادخال اسم المدينه </span>';
            return false;
        }
    });
    $('#cost').each(function() {
        if ($(this).val() == '') {
            name_error += '<span style="color:red">ادخال  تكلفة الشحن </span>';
            return false;
        }
    });

    if (name_error == '') {
        var formData = new FormData(this);

        $.ajax({
            url: "{{ url('admin/Add_Shipping_info_data') }}",
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log('success');

                $('#Add_Shipping_info_form')[0].reset();
                $('#Add_Shipping_info').modal('hide');
                location.reload();
                var successMessage = $('<div>').addClass('success-message').text('تم الحفظ ');

                $('body').append(successMessage);
                    
                successMessage.fadeIn(500).delay(3000).fadeOut(500, function() {
                    $(this).remove();
                });             
            },
            error: function(response) {
                var errorMessage = $('<div>').addClass('err-message').text('هذه المعلومات موجودة بالفعل');
                $('#Add_Shipping_info').modal('hide');
                $('body').append(errorMessage);
                errorMessage.fadeIn(500).delay(3000).fadeOut(500, function() {
                    $(this).remove();
                });
            }
        });
    } else {
        $('#err').html('<div class="alert alert-danger">' + name_error + '</div>');
    }
});

    $(document).on('click', '#btn-info', function() {
        // Get the ID, title, description, and image values from the data attributes
        let id = $(this).data('id');
        let city = $(this).data('city');
        let cost = $(this).data('cost');
        // Set the values in the form fields
        $('#up_id').val(id);
        $('#up_city').val(city);
        $('#up_cost').val(cost);
        $('#edite_Shipping_info').modal('show');

    });
    
</script>



@endsection