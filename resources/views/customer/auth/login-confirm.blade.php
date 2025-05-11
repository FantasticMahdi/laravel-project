@extends('customer.layouts.master-simple')

@section('content')
    <section class="vh-100 d-flex justify-content-center align-items-center pb-5">
        <section class="login-wrapper mb-5">
            <form action="{{route('auth.customer.login-confirm',$token)}}" method="post">
                @csrf
                <section class="login-logo">
                    <img src="{{asset('customer-assets/images/logo/4.png')}}" alt="">
                </section>
                <section class="login-title mb-2">
                    <a href="{{route('auth.customer.login-register-form')}}" class="btn btn-primary">
                        <i class="fa fa-arrow-right me-1 align-middle"></i>
                        بازگشت
                    </a>
                </section>
                <section class="login-info">
                    @if($otp->type == 1)
                        کد تاییدیه به آدرس ایمیل {{$otp->login_id}} ارسال شد
                    @else
                        کد تاییدیه به شماره موبایل {{$otp->login_id}}ارسال شد
                    @endif
                </section>
                <section class="login-input-text">
                    <input type="text" name="otp" value="{{old('otp')}}">
                    @error('otp')
                    <span class="alert_required bg-danger text-white p-1 rounded"
                          role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </section>
                <section class="login-btn d-grid g-2">
                    <button class="btn btn-danger">تایید</button>
                </section>
            </form>
        </section>
    </section>
@endsection