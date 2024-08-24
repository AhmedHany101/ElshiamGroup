@extends('admin_layout.layout')
@section('layout')
@if (app()->getLocale() === 'ar')
<style>
  .ar {
    direction: rtl;
  }
</style>
@endif
<main id="main" class="main">
  <section class="section profile ar">
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body pt-3">
            <div class="tab-content pt-2">
              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <div class="card table-responsive">
                  <div class="card-body ">
                    <h5 class="card-title">@lang('public.products_details')</h5>
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">@lang('public.Product_Image')</th>
                          <th scope="col">@lang('public.Product_Name')</th>
                          <th scope="col">@lang('public.Product_Price')</th>
                          <th scope="col">@lang('public.Quantity')</th>
                          <th scope="col">@lang('public.total')</th>
                          <!-- <th scope="col"> @lang('public.elshaima')</th> -->

                        </tr>
                      </thead>
                      <tbody>
                        @foreach($order_item as $item)
                        <tr>
                          <th scope="row">{{$item->id}}</th>
                          <td><img src="{{asset('/products_images/'.$item->product_image)}}" class="img-fluid" alt="Image" style="width:80px;"></td>
                          <td>{{$item->product_name}}</td>
                          <td>{{$item->product_price}}</td>
                          <td>{{$item->quantity}}</td>
                          <td>{{$item->total}}</td>
                          <td>
                            @php
                            $product = \App\Models\products::find($item->product_id);
                            @endphp

                            <!-- @if($product && $product->elshama == 1)
                            <i class="bi bi-check-circle-fill"></i>
                            @else
                            <i class="bi bi-x-circle-fill"></i>
                            @endif -->
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <h5 class="card-title">@lang('public.User_Details')</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">@lang('public.Name')</div>
                  <div class="col-lg-9 col-md-8">{{$order->name}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">@lang('public.Email')</div>
                  <div class="col-lg-9 col-md-8">{{$order->user_email}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">@lang('public.Phone')</div>
                  <div class="col-lg-9 col-md-8">{{$order->phone}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">@lang('public.Phone 2')</div>
                  <div class="col-lg-9 col-md-8">{{$order->phone2}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">@lang('public.Address')</div>
                  <div class="col-lg-9 col-md-8">{{$order->address}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">@lang('public.Address')</div>
                  <div class="col-lg-9 col-md-8">{{$order->address2}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">@lang('public.city')</div>
                  <div class="col-lg-9 col-md-8">{{$order->city}}</div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">@lang('public.cost')</div>
                  <div class="col-lg-9 col-md-8">{{$order->shipping_cost}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">@lang('public.total')</div>
                  <div class="col-lg-9 col-md-8">{{$order->total + $order->shipping_cost}}</div>
                </div>

              </div>
              @if($order->statues == 0)
              <a href="/admin/Confirm/Order/{{$order->id}}" class="btn btn-success">@lang('public.Confirm_Order')<i class="bi bi-check-circle"></i></a>

              <a href="/admin/reject/Order/{{$order->id}}" class="btn btn-danger">@lang('public.Reject')<i class="bi bi-exclamation-octagon"></i></a>

              @elseif($order->statues == 1)
              <a href="/admin/reject/Order/{{$order->id}}" class="btn btn-danger">@lang('public.Reject')<i class="bi bi-exclamation-octagon"></i></a>
              @endif
            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>
</main>

@endsection