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
        <h1>@lang('public.Products_Data')</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">@lang('public.Home')/</a></li>
                <li class="breadcrumb-item">@lang('public.Products')</li>
                <li class="breadcrumb-item active">@lang('public.Data')</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body tab_data table-responsive">
                        <h5 class="card-title ar">@lang('public.Products')</h5>
                        <a href="{{url('/admin/add/new/product')}}" class="btn btn-primary">@lang('public.Add_New_Product')</a>
                        @if (app()->getLocale() === 'ar') 
                        <table class="table datatable ">
                            <thead>
                                <tr>
                                    <th scope="col">@lang('public.Delete')</th>
                                    <th scope="col">@lang('public.Edite')</th>
                                    <th scope="col">@lang('public.Name')</th>
                                    <th scope="col">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $item)
                                <tr>
                                <td><a href="/admin/product/edite/{{$item->id}}"  class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">@lang('public.Edite') <i class="bi bi-pencil-fill"></i></a></td>
                                    <td><a href="/admin/product/delete/{{$item->id}}" class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">@lang('public.Delete') <i class="bi bi-trash3"></i></a></td>
                                    <td scope="row">{{$item->name_ar}}</td>
                                    <td scope="row">{{$item->id}}</td>
                                    <!-- <th scope="row" data-id="usage_details">{!! $item->usage_details !!}</th> -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <table class="table datatable ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">@lang('public.Name')</th>
                                    <th scope="col">@lang('public.Edite')</th>
                                    <th scope="col">@lang('public.Delete')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $item)
                                <tr>
                                    <td scope="row">{{$item->id}}</td>
                                    <td scope="row">{{$item->name}}</td>
                                    <!-- <th scope="row" data-id="usage_details">{!! $item->usage_details !!}</th> -->
                                   
                                    <td><a href="/admin/product/edite/{{$item->id}}"  class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">@lang('public.Edite') <i class="bi bi-pencil-fill"></i></a></td>
                                    <td><a href="/admin/product/delete/{{$item->id}}" class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">@lang('public.Delete') <i class="bi bi-trash3"></i></a></td>

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
    <div class="modal fade" id="addnewcategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addnewcataform" method="POST" action="{{ url('admin/addnewcategory') }}" enctype="multipart/form-data">
                        <div id="err"></div>
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="col-form-label">Title:</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="col-form-label">Description:</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="col-form-label">Image:</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close-btn">Close</button>
                    <button type="submit" class="btn btn-primary" id="submit-btn">Create category</button>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edite" action="{{url('admin/edite_category')}}" method="POST" enctype="multipart/form-data">
                        <div id="err"></div>
                        @csrf
                        <input type="hidden" name="id" id="up_id">
                        <div class="mb-3">
                            <label for="title" class="col-form-label">Title:</label>
                            <input type="text" class="form-control" id="up_title" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="col-form-label">Description:</label>
                            <textarea class="form-control" id="up_description" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="up_image" class="form-label">Image</label>
                            <img id="up_image" src="" alt="Image">
                        </div>
                        <div class="mb-3">
                            <label for="up_new_image" class="col-form-label">New Image:</label>
                            <input type="file" class="form-control" id="newimage" name="newimage">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close-btn">Close</button>
                    <button type="submit" class="btn btn-primary" id="update">Edite category</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</main>
<script>
    //     // Get the <th> element that you want to update
    // var usageDetailsTh = $('th[data-id="usage_details"]');

    // // Set the HTML content of the <th> element to the quillContent
    // usageDetailsTh.html(quillContent);
    // 
</script>
<!-- End #main -->
@endsection