@extends('admin_layout.layout')
@section('layout')

<main id="main" class="main ">
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
    </style>
    @if (app()->getLocale() === 'ar')
    <style>
        .ar {
            direction: rtl;
        }
    </style>
    @endif
    <div class="pagetitle mainform ar">
        <h1>@lang('public.Add_New_Product')</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">@lang('public.Home')/</a></li>
                <li class="breadcrumb-item">@lang('public.Products')</li>
                <li class="breadcrumb-item active">@lang('public.Add_New')</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section" id="form-section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body ar">
                        <h5 class="card-title">@lang('public.Add_New_Product')</h5>
                        <!-- General Form Elements -->
                        <form id="form" action="{{url('admin/add/new/product/save')}}" method="post">
                            <p id="form-error-message" style="color: red;"></p>
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">@lang('public.Name') <span style="color: red;">(@lang('public.In_English'))</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="name" name="name" class="form-control">
                                    <span style="color:red;">*@lang('public.required')*</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">@lang('public.Name') <span style="color: red;">(@lang('public.In_Arabic'))</span></label>
                                <div class="col-sm-10">
                                    <input type="text" id="name_ar" name="name_ar" class="form-control" placeholder="استخدم اللغه العربية" style="text-align: right;">
                                    <span style="color:red;">*@lang('public.required')*</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">@lang('public.Price')</label>
                                <div class="col-sm-10">
                                    <input type="number" id="price" name="price" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">@lang('public.Quantity')</label>
                                <div class="col-sm-10">
                                    <input type="number" id="quantity" name="quantity" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">@lang('public.main_image')</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="image" type="file" id="image">
                                    <span style="color:red;">*@lang('public.required')*</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">@lang('public.images')</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="images" name="images[]" multiple>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">@lang('public.Production_Date')</label>
                                <div class="col-sm-10">
                                    <input type="date" id="production_date" name="production_date" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">@lang('public.Expiry_Date')</label>
                                <div class="col-sm-10">
                                    <input type="date" id="expiry_date" name="expiry_date" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">@lang('public.Long_Details') <span style="color: red;">(@lang('public.In_English'))</span></label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="long_details" name="long_details" style="height: 100px"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">@lang('public.Long_Details') <span style="color: red;">(@lang('public.In_Arabic'))</span></label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="long_details_ar" name="long_details_ar" style="height: 100px" placeholder="استخدم اللغه العربية" style="text-align: right;"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">@lang('public.Short_Details') <span style="color: red;">(@lang('public.In_English'))</span></label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" id="short_details" name="short_details" style="height: 100px"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">@lang('public.Short_Details') <span style="color: red;">(@lang('public.In_Arabic'))</span></label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" id="short_details_ar" name="short_details_ar" style="height: 100px" placeholder="استخدم اللغه العربية" style="text-align: right;"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">@lang('public.Status')</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="status" name="status">
                                            <label class="form-check-label" for="gridCheck1">
                                                @lang('public.Unavailable')
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="featured_product" name="featured_product" checked>
                                            <label class="form-check-label" for="gridCheck2">
                                                @lang('public.Featured_product')
                                            </label>
                                        </div>
                                        <!-- <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="elshama" name="elshama">
                                            <label class="form-check-label" for="gridCheck2">
                                                @lang('public.elshaima')
                                            </label>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">@lang('public.Category')</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" id="category" name="category" aria-label="Default select example">
                                            <option value=""></option>
                                            @foreach($category as $item)
                                            <option value="{{$item->title}}">{{$item->title}}</option>
                                            @endforeach
                                        </select>
                                        <span style="color:red;">*@lang('public.required')*</span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">@lang('public.Subcategories')</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" id="subcategories" name="subcategories" aria-label="Default select example">
                                            <option value="">----</option>
                                            @foreach($subcategories as $item)
                                            <option value="{{$item->title}}">{{$item->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">@lang('public.save')</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 ar">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">@lang('public.Additional_details')</h5>
                        <div class="row mb-5">
                            <h5 class="card-title">@lang('public.Efficacy_and_usage_rates') <span style="color: red;">(@lang('public.In_English'))</span></h5>
                            <!-- Quill Editor Default -->
                            <div class="quill-editor-default" id="quillContent">

                            </div>
                            <!-- End Quill Editor Default -->
                        </div>

                        <div class="row mb-5">
                            <label for="inputNumber" class="col-sm-2 col-form-label">@lang('public.country') <span style="color: red;">(@lang('public.In_English'))</span></label>
                            <div class="col-sm-10">
                                <input type="text" id="country_of_origin" name="country_of_origin" class="form-control">
                            </div>
                            <label for="inputNumber" class="col-sm-2 col-form-label">@lang('public.country') <span style="color: red;">(@lang('public.In_Arabic'))</span></label>
                            <div class="col-sm-10">
                                <input type="text" id="country_of_origin" name="country_of_origin_ar" class="form-control" placeholder="استخدم اللغه العربية" style="text-align: right;">
                            </div>
                            <label for="inputNumber" class="col-sm-2 col-form-label">@lang('public.Effective_Material') <span style="color: red;">(@lang('public.In_English'))</span></label>
                            <div class="col-sm-10">
                                <input type="text" id="effective_material" name="effective_material" class="form-control">
                            </div>
                            <label for="inputNumber" class="col-sm-2 col-form-label">@lang('public.Effective_Material') <span style="color: red;">(@lang('public.In_Arabic'))</span></label>
                            <div class="col-sm-10">
                                <input type="text" id="effective_material_ar" name="effective_material_ar" class="form-control" placeholder="استخدم اللغه العربية" style="text-align: right;">
                            </div>
                        </div>
                        </form><!-- End General Form Elements -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function() {
        $('form').submit(function(event) {
            event.preventDefault();

            var form = $(this);
            var formData = new FormData(form[0]);

            // Get the Quill editor content and add it to the FormData object
            var quillContent = $('.quill-editor-default .ql-editor').html();
            formData.append('content', quillContent);

            // Client-side validation
            var name = $('#name').val().trim();
            var name_ar = $('#name_ar').val().trim();
            // var price = $('#price').val().trim();
            // var quantity = $('#quantity').val().trim();
            var image = $('#image').val().trim();
            // var productionDate = $('#production_date').val().trim();
            // var expiryDate = $('#expiry_date').val().trim();
            // var longDetails = $('#long_details').val().trim();
            // var shortDetails = $('#short_details').val().trim();
            var category = $('#category').val().trim();
            // var country_of_origin = $('#country_of_origin').val().trim();
            // var effective_material = $('#effective_material').val().trim();

            var subcategories = $('#subcategories').val().trim();

            // Check if any of the required fields are empty
            var errorFields = [];
            if (!name) {
                $('#name').css('border-color', 'red');
                errorFields.push('@lang("public.Name")');
            } else {
                $('#name').css('border-color', '');
            }
            if (!name_ar) {
                $('#name_ar').css('border-color', 'red');
                errorFields.push('@lang("public.Name")');
            } else {
                $('#name_ar').css('border-color', '');
            }
            if (!image) {
                $('#image').css('border-color', 'red');
                errorFields.push('@lang("public.image")');
            } else {
                // Check that the user entered only an image file
                var regex = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
                if (!regex.test(image)) {
                    $('#image').css('border-color', 'red');
                    errorFields.push('Image must be a valid image file (JPG, JPEG, PNG, GIF).');
                } else {
                    $('#image').css('border-color', '');
                }
            }


            // if (!price) {
            //     $('#price').css('border-color', 'red');
            //     errorFields.push('@lang("public.Price")');
            // } else {
            //     $('#price').css('border-color', '');
            // }

            // if (!quantity) {
            //     $('#quantity').css('border-color', 'red');
            //     errorFields.push('@lang("public.Quantity")');
            // } else {
            //     $('#quantity').css('border-color', '');
            // }



            // if (!productionDate) {
            //     $('#production_date').css('border-color', 'red');
            //     errorFields.push('@lang("public.Production_Date")');
            // } else {
            //     $('#production_date').css('border-color', '');
            // }

            // if (!expiryDate) {
            //     $('#expiry_date').css('border-color', 'red');
            //     errorFields.push('@lang("public.Expiry_Date")');
            // } else {
            //     $('#expiry_date').css('border-color', '');
            // }

            // if (!longDetails) {
            //     $('#long_details').css('border-color', 'red');
            //     errorFields.push('@lang("public.Long_Details")');
            // } else {
            //     $('#long_details').css('border-color', '');
            // }

            // if (!shortDetails) {
            //     $('#short_details').css('border-color', 'red');
            //     errorFields.push('@lang("public.Short_Details")');
            // } else {
            //     $('#short_details').css('border-color', '');
            // }

            if (!category) {
                $('#category').css('border-color', 'red');
                errorFields.push('@lang("public.Category")');
            } else {
                $('#category').css('border-color', '');
            }

            // if (!subcategories) {
            //     $('#subcategories').css('border-color', 'red');
            //     errorFields.push('@lang("public.Subcategories")');
            // } else {
            //     $('#subcategories').css('border-color', '');
            // }

            // if (!country_of_origin) {
            //     $('#country_of_origin').css('border-color', 'red');
            //     errorFields.push('@lang("public.country")');
            // } else {
            //     $('#country_of_origin').css('border-color', '');
            // }

            // if (!effective_material) {
            //     $('#effective_material').css('border-color', 'red');
            //     errorFields.push('@lang("public.Effective_Material")');
            // } else {
            //     $('#effective_material').css('border-color', '');
            // }

            if (errorFields.length > 0) {
                var errorMessage = '@lang("public.Please")' + errorFields.join(', ') + '.';
                $('#form-error-message').text(errorMessage);
                return;
            }

            // if (isNaN(price) || isNaN(quantity)) {
            //     var errorMessage = 'Price and quantity must be numeric values.';
            //     $('#form-error-message').text(errorMessage);
            //     return;
            // }

            // Send the AJAX request to the server
            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    location.reload();
                    // Display a success message
                    var successMessage = $('<div>').addClass('success-message').text('Product Added successfully');
                    $('body').append(successMessage);
                    successMessage.fadeIn(500).delay(3000).fadeOut(500, function() {
                        $(this).remove();
                    });

                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>
<script>
    $(document).on('change', '#category', function() {
        let category = $(this).val();
        let url = '{{ url("admin/get_sub_category") }}';

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                category: category
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                let subCategories = response.sub_categories;
                let options = '';

                if (subCategories.length === 0) {
                    options = '<option value="">No subcategories found.</option>';
                } else {
                    subCategories.forEach(function(subCategory) {
                        options += '<option value="' + subCategory + '">' + subCategory + '</option>';
                    });
                    options = '<option value="">Select</option>' + options;
                }

                $('#subcategories').html(options);
            },
            error: function(xhr, status, error) {
                $('#subcategories').html('<option value="">An error occurred while retrieving subcategories.</option>');
            }
        });
    });
</script>
@endsection