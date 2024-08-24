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
<!-- Start About Page  -->
<div class="about-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="banner-frame"> <img class="img-fluid" src="{{asset('/images/using_iamge/SH_Slider.png')}}" alt="" />
                </div>
            </div>
            <div class="col-lg-6 ar">
                <h2 class="noo-sh-title-top"><span>SM Science</span></h2>
                <p>@lang('public.aboutsm1')
                <p> @lang('public.abot2') </p>

            </div>
        </div>
      
         <div class="row my-5">
            <div class="col-sm-6 col-lg-4">
                <div class="service-block-inner">
                    <h3>@lang('public.About')</h3>
                    <p >@lang('public.abot3')</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
        <div class="service-block-inner">
                            <h3>@lang('public.About')</h3>
                            <p >@lang('public.abot2')</p>
                        </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="service-block-inner">
                    <h3>@lang('public.About')</h3>
                    <p >@lang('public.abot1')</p>
                </div>
            </div>
        </div>
    </div>
   
</div>
<!-- End About Page -->
@endsection