@extends('admin_layout.layout')
@section('layout')
@if (app()->getLocale() === 'ar') 
    <style>
        .ar{
            direction:rtl;
        }
    </style>
    @endif
<main id="main" class="main">
    @if(session('message'))
    <div id="errorMessage" class="alert alert-success" style="display:none;">{{session('message')}}</div>
    <script>
        // Show the error message
        document.getElementById('errorMessage').style.display = 'block';
        // Hide the error message after 5 seconds
        setTimeout(function() {
            document.getElementById('errorMessage').style.display = 'none';
        }, 5000);
    </script>
    @endif
    <div class="pagetitle ar">
        <h1>@lang('public.categories_Data')</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">@lang('public.Home')/</a></li>
                <li class="breadcrumb-item">@lang('public.Categories')</li>
                <li class="breadcrumb-item active">@lang('public.Data')</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    @if (app()->getLocale() === 'ar') 
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body tab_data table-responsive">
                        <h5 class="card-title  ar">@lang('public.Categories')</h5>
                        <button type="button" class="btn btn-primary ar" data-bs-toggle="modal" data-bs-target="#addnewcategory" data-bs-whatever="@mdo">@lang('public.Add_New_Category')</button>
                        <!-- Table with stripped rows -->
                        <table class="table datatable ">
                            <thead>
                                <tr>
                                    <th scope="col">@lang('public.Edite')</th>
                                    <th scope="col">@lang('public.Delete')</th>
                                    <th scope="col">@lang('public.image')</th>
                                    <th scope="col">@lang('public.description')</th>
                                    <th scope="col">@lang('public.Name')</th>
                                    <th scope="col">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($category as $item)
                                <tr>
                                    <td><a href=""  class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" data-bs-toggle="modal" data-bs-target="#updatecategory" data-id="{{ $item->id }}" data-title="{{ $item->title }}" data-description="{{ $item->description }}" data-image="{{ $item->image }}" id="btn-info">@lang('public.Edite') <i class="bi bi-pencil-fill"></i></a></td>
                                    <td><a href="/admin/delete/{{$item->id}}" class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">@lang('public.Delete') <i class="bi bi-trash3"></i></a></td>
                                    <td> <img src="{{asset('/category_image/'.$item->image)}}" style="height:80px;width:80px" class="me-4 border" alt="image" /></td>
                                    <td>{{$item->description}}</td>
                                    <th scope="row">{{$item->title_ar}}</th>
                                    <th scope="row">{{$item->id}}</th>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
    @else
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body tab_data table-responsive">
                        <h5 class="card-title">@lang('public.Categories')</h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addnewcategory" data-bs-whatever="@mdo">@lang('public.Add_New_Category')</button>
                        <!-- Table with stripped rows -->
                        <table class="table datatable ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">@lang('public.Name')</th>
                                    <th scope="col">@lang('public.description')</th>
                                    <th scope="col">@lang('public.image')</th>
                                    <th scope="col">@lang('public.Delete')</th>
                                    <th scope="col">@lang('public.Edite')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($category as $item)
                                <tr>
                                    <th scope="row">{{$item->id}}</th>
                                    <th scope="row">{{$item->title}}</th>
                                    <td>{{$item->description}}</td>
                                    <td> <img src="{{asset('/category_image/'.$item->image)}}" style="height:80px;width:80px" class="me-4 border" alt="image" /></td>
                                    <td><a href="/admin/delete/{{$item->id}}" class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">@lang('public.Delete') <i class="bi bi-trash3"></i></a></td>
                                    <td><a href=""  class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" data-bs-toggle="modal" data-bs-target="#updatecategory" data-id="{{ $item->id }}" data-title="{{ $item->title }}" data-title_ar="{{ $item->title_ar }}" data-description="{{ $item->description }}" data-image="{{ $item->image }}" id="btn-info">@lang('public.Edite') <i class="bi bi-pencil-fill"></i></a></td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
    @endif
    <!-- add new category model -->
    <div class="modal fade " id="addnewcategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('public.New_category')</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ar">
                    <form id="addnewcataform" method="POST" action="{{ url('admin/addnewcategory') }}" enctype="multipart/form-data">
                        <div id="err"></div>
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="col-form-label">@lang('public.Title') <span style="color: red;">(@lang('public.In_English'))</span></label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="col-form-label">@lang('public.Title') <span style="color: red;">(@lang('public.In_Arabic'))</span></label>
                            <input type="text" class="form-control" id="title_ar" name="title_ar">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="col-form-label">@lang('public.description')</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="col-form-label">@lang('public.Image')</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close-btn">@lang('public.Close')</button>
                    <button type="submit" class="btn btn-primary" id="submit-btn">@lang('public.Create_category')</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- update category -->
    <div class="modal fade" id="updatecategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('public.Edite_category')</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ar">
                    <form id="edite" action="{{url('admin/edite_category')}}" method="POST" enctype="multipart/form-data">
                        <div id="err"></div>
                        @csrf
                        <input type="hidden" name="id" id="up_id">
                        <div class="mb-3">
                            <label for="title" class="col-form-label">@lang('public.Title') <span style="color: red;">(@lang('public.In_English'))</span></label>
                            <input type="text" class="form-control" id="up_title" name="title">
                        </div><div class="mb-3">
                            <label for="title" class="col-form-label">@lang('public.Title') <span style="color: red;">(@lang('public.In_Arabic'))</span></label>
                            <input type="text" class="form-control" id="up_title_ar" name="title_ar">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="col-form-label">@lang('public.description')</label>
                            <textarea class="form-control" id="up_description" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="up_image" class="form-label">@lang('public.Image')</label>
                            <img id="up_image" src="" alt="Image">
                        </div>
                        <div class="mb-3">
                            <label for="up_new_image" class="col-form-label">@lang('public.New_Image')</label>
                            <input type="file" class="form-control" id="newimage" name="newimage">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close-btn">@lang('public.Close')</button>
                    <button type="submit" class="btn btn-primary" id="update">@lang('public.Edite_category')</button>
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

    $('#addnewcataform').on('submit', function(event) {
        event.preventDefault();
        var name_error = '';

        $('#title').each(function() {
            if ($(this).val() == '') {
                name_error += '<span style="color:red">ادخال اسم الفئة | </span>';
                return false;
            }
        });
        $('#title_ar').each(function() {
            if ($(this).val() == '') {
                name_error += '<span style="color:red">  ادخال اسم الفئة بلغه العربية</span>';
                return false;
            }
        });
        $('#image').each(function() {
            if ($(this).val() == '') {
                name_error += '<span style="color:red"> | ادخال الصورة الخاصة بالفئة  </span>';
                return false;
            }
        });

        if (name_error == '') {
            var formData = new FormData(this);

            $.ajax({
                url: "{{ url('admin/add_new_category') }}",
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log('success');

                    $('#addnewcataform')[0].reset();
                    $('.tab_data').load(location.href + ' .tab_data');
                    // Update the table by reloading the .tab_data element with the current URL
                },
                error: function(response) {
                    console.log('error');

                    // Handle error
                }
            });
        } else {
            $('#err').html('</div class="alert alert-danger">' + name_error + '</div>');
        }
    });

    $(document).on('click', '#btn-info', function() {
        // Get the ID, title, description, and image values from the data attributes
        let id = $(this).data('id');
        let title = $(this).data('title');
        let title_ar = $(this).data('title_ar');
        let description = $(this).data('description');
        let image = $(this).data('image');
        // Set the values in the form fields
        $('#up_id').val(id);
        $('#up_title').val(title);
        $('#up_title_ar').val(title_ar);
        $('#up_description').val(description);
        $('#up_image').val(image);
        // Set the src attribute of the image element to the URL of the image
        $('#up_image').attr('src', "{{ asset('/category_image/') }}" + '/' + image);
        $('#up_image').css('max-width', '80px');
        // Show the modal
        $('#updatecategory').modal('show');

    });

</script>
@endsection