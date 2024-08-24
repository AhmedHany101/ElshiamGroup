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
<!-- Start Contact Us  -->
<div class="contact-box-main ar">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-12">
                @if (app()->getLocale() === 'ar')
                <div class="contact-form-right ar">
                    <h2>ابقى على تواصل</h2>
                    <p>للتواصل معنا، يرجى ملء النموذج أدناه أو استخدام المعلومات المقدمة:</p>
                    <form method="POST" action="{{route('contact')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="اسمك" required data-error="يرجى إدخال اسمك">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" placeholder="بريدك الإلكتروني" id="email" class="form-control" name="email" required data-error="يرجى إدخال بريدك الإلكتروني">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="subject" name="phone" placeholder="الموضوع" required data-error="يرجى إدخال رقم هاتفك">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="mesg" id="message" placeholder="رسالتك" rows="4" data-error="يرجى كتابة رسالتك" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="submit-button text-center">
                                    <button class="btn hvr-hover" id="submit" type="submit">إرسال الرسالة</button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @else
                <div class="contact-form-right">
                    <h2>GET IN TOUCH</h2>
                    <p>To get in touch with us, please fill out the form below or use the provided contact information:</p>
                    <form method="POST" action="{{route('contact')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required data-error="Please enter your name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Your Email" id="email" class="form-control" name="email" required data-error="Please enter your email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="subject" name="phone" placeholder="Subject" required data-error="Please enter your phone">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="mesg" id="message" placeholder="Your Message" rows="4" data-error="Write your message" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="submit-button text-center">
                                    <button class="btn hvr-hover" id="submit" type="submit">Send Message</button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @endif
            </div>
            <div class="col-lg-4 col-sm-12 ar">
                <div class="contact-info-left">
                    <h2>@lang('public.CONTACT_INFO')</h2>
                    <p>@lang('public.contact1')</p>
                    <ul>
                        <li>
                            <p><i class="fas fa-map-marker-alt"></i>@lang('public.Address'): @lang('public.add1')</p>
                        </li>
                        <li>
                            <p><i class="fas fa-phone-square"></i>@lang('public.Phone'): <a>+00201000008075</a></p>
                        </li>
                          <li>
                            <p><i class="fas fa-phone-square"></i>@lang('public.Phone'): <a>+00201125746749</a></p>
                        </li>
                        <li>
                            <p><i class="fas fa-envelope"></i>@lang('public.Email'): <a>smscience@sm-science.com</a></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Cart -->
@endsection