@extends('admin_layout.layout')
@section('layout')
<style>
    .disabled {
        pointer-events: none;
        opacity: 0.5;
        /* Add any additional styling to indicate that the link is disabled */
    }
</style>
@if (app()->getLocale() === 'ar')
<style>
    .ar {
        direction: rtl;
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
    <div class="pagetitle ar ">
        <h1>@lang('public.Orders_Data')</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">@lang('public.Home')/</a></li>
                <li class="breadcrumb-item">@lang('public.Orders')</li>
                <li class="breadcrumb-item active">@lang('public.Data')</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body tab_data table-responsive">
                        <h5 class="card-title ar">@lang('public.Orders')</h5>

                        <!-- Table with stripped rows -->
                        @if (app()->getLocale() === 'ar')
                        <table class="table datatable ">
                            <thead>
                                <tr>
                                    <th scope="col">@lang('public.Status')</th>
                                    <th scope="col">@lang('public.Rejected')</th>
                                    <th scope="col">@lang('public.Confirm')</th>
                                    <th scope="col">@lang('public.View')</th>
                                    <th scope="col">@lang('public.Name')</th>
                                    <th scope="col">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $item)
                                    @if($item->statues !=2 )
                                        <tr>
                                            @if($item->statues == 0)
                                            <td><span class="badge bg-success">@lang('public.Pending') </span></td>
                                            @elseif($item->statues == 1)
                                            <td><span class="badge bg-warning">@lang('public.Confirmed')</span></td>
                                            @elseif($item->statues == 2)
                                            <td><span class="badge bg-danger">@lang('public.Rejected')</span></td>
                                            @endif
                                            @if($item->statues == 0)
                                            <td><a href="/admin/reject/Order/{{$item->id}}" class="btn btn-danger">@lang('public.Reject') <i class="bi bi-exclamation-octagon"></i></a></td>
                                            <td><a href="/admin/Confirm/Order/{{$item->id}}" class="btn btn-success">@lang('public.Confirm_Order') <i class="bi bi-check-circle"></i></a></td>
                                            @elseif($item->statues == 1)
                                            <td><a href="/admin/reject/Order/{{$item->id}}" class="btn btn-danger">@lang('public.Reject') <i class="bi bi-exclamation-octagon"></i></a></td>
                                            <td><a href="/admin/Confirm/Order/{{$item->id}}" class="btn btn-success disabled">@lang('public.Confirm_Order') <i class="bi bi-check-circle"></i></a></td>
                                            @endif
                                            <td scope="row"><a href="/admin/order/details/{{$item->id}}"><i class="bi bi-eye-fill"></i></a></td>
                                            <td scope="row">{{$item->name}}</td>
                                            <td scope="row">{{$item->id}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        @else 
                        <table class="table datatable ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">@lang('public.Name')</th>
                                    <th scope="col">@lang('public.View')</th>
                                    <th scope="col">@lang('public.Confirm')</th>
                                    <th scope="col">@lang('public.Rejected')</th>
                                    <th scope="col">@lang('public.Status')</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $item)
                                @if($item->statues !=2 )
                                <tr>
                                    <td scope="row">{{$item->id}}</td>
                                    <td scope="row">{{$item->name}}</td>
                                    <td scope="row"><a href="/admin/order/details/{{$item->id}}"><i class="bi bi-eye-fill"></i></a></td>
                                    @if($item->statues == 0)
                                    <td><a href="/admin/Confirm/Order/{{$item->id}}" class="btn btn-success">@lang('public.Confirm_Order') <i class="bi bi-check-circle"></i></a></td>
                                    <td><a href="/admin/reject/Order/{{$item->id}}" class="btn btn-danger">@lang('public.Reject') <i class="bi bi-exclamation-octagon"></i></a></td>
                                    @elseif($item->statues == 1)
                                    <td><a href="/admin/Confirm/Order/{{$item->id}}" class="btn btn-success disabled">@lang('public.Confirm_Order') <i class="bi bi-check-circle"></i></a></td>
                                    <td><a href="/admin/reject/Order/{{$item->id}}" class="btn btn-danger">@lang('public.Reject') <i class="bi bi-exclamation-octagon"></i></a></td>
                                    @endif
                                    @if($item->statues == 0)
                                    <td><span class="badge bg-success">@lang('public.Pending') </span></td>
                                    @elseif($item->statues == 1)
                                    <td><span class="badge bg-warning">@lang('public.Confirmed')</span></td>
                                    @elseif($item->statues == 2)
                                    <td><span class="badge bg-danger">@lang('public.Rejected')</span></td>
                                    @endif
                                </tr>
                                @endif
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

    <!-- update category -->


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