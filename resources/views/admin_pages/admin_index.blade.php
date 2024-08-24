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
      .product-image{
        height: 50px;
        width: 50px;
      }
    </style>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>@lang('public.Dashboard')</h1>
    <nav>
      <ol class="breadcrumb">
        <!-- <li class="breadcrumb-item active">@lang('public.Dashboard')</li> -->
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">
      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">
          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
              <div class="card-body">
                <h5 class="card-title">@lang('public.Sales')<span>| @lang('public.Today')</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cart"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$numOrders}}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">
              <div class="card-body">
                <h5 class="card-title"> @lang('public.Analysis')<span>|  @lang('public.This_Month')</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-dollar"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$total}}</h6>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">
              <div class="card-body">
                <h5 class="card-title">@lang('public.Visitors')<span>| @lang('public.This_Month')</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-eye-fill"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$sumVisits}}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Revenue Card -->

          <!-- Customers Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card customers-card">
              <div class="card-body">
                <h5 class="card-title">@lang('public.Customers')<span>| @lang('public.This_Year')</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$order_customer_count}}</h6>

                  </div>
                </div>

              </div>
            </div>

          </div>

          <!-- End Customers Card -->

          <!-- Reports -->
          <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">@lang('public.Reports') <span>/@lang('public.Today')</span></h5>

            <!-- Line Chart -->
            <div id="reportsChart"></div>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const salesData = {!! $salesData !!};
                    const salesData2 = {!! $salesData2 !!};
                    new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                            name: 'Sales',
                            data: salesData,
                        }, {
                            name: 'User Id',
                            data:{!! $salesData2 !!}
                        },],
                        chart: {
                            height: 350,
                            type: 'area',
                            toolbar: {
                                show: false
                            },
                        },
                        markers: {
                            size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                            type: "gradient",
                            gradient: {
                                shadeIntensity: 1,
                                opacityFrom: 0.3,
                                opacityTo: 0.4,
                                stops: [0, 90, 100]
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            curve: 'smooth',
                            width: 2
                        },
                        xaxis: {
                            type: 'datetime',
                            categories: {!! json_encode($orderss->pluck('created_at')) !!}
                        },
                        tooltip: {
                            x: {
                                format: 'dd/MM/yy HH:mm'
                            },
                        }
                    }).render();
                });
            </script>
            <!-- End Line Chart -->

        </div>

    </div>
</div>
          <!-- End Reports -->
          <!-- Recent Sales -->
          @if (app()->getLocale() === 'ar') 
          <div class="col-12">
            <div class="card recent-sales overflow-auto ">
              <div class="card-body ">
                <h5 class="card-title">@lang('public.Recent_Sales')<span>| @lang('public.Today')</span></h5>
                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                    <th scope="col">@lang('public.Status')</th>
                      <th scope="col">@lang('public.total')</th>
                      <th scope="col">@lang('public.Customer')</th>
                      <th scope="col">#</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $item)
                    @if($item->statues == 0)
                    <tr>
                      @if($item->statues == 0)
                      <td scope="row"><span class="badge bg-success">@lang('public.Pending')</span></td>
                     @endif
                     <td scope="row">{{$item->total}}</td>
                     <td scope="row">{{$item->name}}</td>
                     <td scope="row"><a href="/admin/order/details/{{$item->id}}"><i class="bi bi-eye-fill"></i></a></td>

                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>

              </div>

            </div>
          </div>
          @else
          <div class="col-12">
            <div class="card recent-sales overflow-auto ">
              <div class="card-body ">
                <h5 class="card-title">@lang('public.Recent_Sales')<span>| @lang('public.Today')</span></h5>
                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                    <th scope="col">#</th>
                      <th scope="col">@lang('public.Customer')</th>
                      <th scope="col">@lang('public.total')</th>
                      <th scope="col">@lang('public.Status')</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $item)
                    @if($item->statues == 0)
                    <tr>
                    <td scope="row"><a href="/admin/order/details/{{$item->id}}"><i class="bi bi-eye-fill"></i></a></td>
                      <td scope="row">{{$item->name}}</td>
                      <td scope="row">{{$item->total}}</td>
                      @if($item->statues == 0)
                      <td scope="row"><span class="badge bg-success">@lang('public.Pending')</span></td>
                    @endif
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>

              </div>

            </div>
          </div>
          @endif
          <!-- End Recent Sales -->

          <!-- Top Selling -->
          <div class="col-12 ar">
            <div class="card top-selling overflow-auto">
              </div>

              <div class="card-body pb-0">
                <h5 class="card-title">@lang('public.Top_Selling')<span>|@lang('public.Today')</span></h5>

                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th scope="col"> @lang('public.Image')</th>
                      <th scope="col"> @lang('public.Product')</th>
                      <th scope="col"> @lang('public.Number')</th>
                      <th scope="col"> @lang('public.Price')</th>

                    </tr>
                  </thead>
                  <tbody>
                    @if ($best_products->isNotEmpty())
                    @foreach ($best_products as $product)
                    <tr>
                      <th scope="row"><a href="#"><img src="{{asset('/products_images/'.$product->image)}}"  class="img-fluid product-image " alt="Image"></a></th>
                      @if (app()->getLocale() === 'ar')
                      <td><a href="#" class="text-primary fw-bold">{{ $product->name_ar }}</a></td>
                      @else
                      <td><a href="#" class="text-primary fw-bold">{{ $product->name }}</a></td>
                      @endif
                      <td class="fw-bold">{{ $product_counts[$product->id] }}</td>
                      <td>${{ $product->price }}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                      <td colspan="5"> @lang('public.not_found')</td>
                    </tr>
                    @endif
                  </tbody>
                </table>

              </div>

            </div>
          </div><!-- End Top Selling -->

        </div>
      </div><!-- End Left side columns -->

  </section>

</main><!-- End #main -->
@endsection