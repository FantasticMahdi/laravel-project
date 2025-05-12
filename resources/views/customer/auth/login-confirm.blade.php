@extends('customer.layouts.master-simple')

@section('head-tag')
    <style>
        #resend-otp {
            font-size: 1rem;
        }
    </style>
@endsection
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
                <section id="resend-otp" class="d-none">
                    <a href="#" class="text-decoration-none text-primary">دریافت مجدد کد تایید
                    </a>
                </section>
                <section id="timer">

                </section>
            </form>
        </section>
    </section>
@endsection

@section('script')

    @php
        $timer = ((new \Carbon\Carbon($otp->created_at))->addMinute(5)->timestamp - \Carbon\Carbon::now()->timestamp) * 1000;
    @endphp

    <script>
        var countDownDate = new Date().getTime() + {{$timer}};
        var timer = $('#timer');
        var resentOtp = $('#resend-otp');

        var x = setInterval(function () {
            var now = new Date().getTime();
            var distance = countDownDate - now;

            var minutes = Math.floor(distance % (1000 * 60 * 60) / (1000 * 60));
            var seconds = Math.floor(distance % (1000 * 60) / 1000);

            if (minutes == 0) {
                timer.html('ارسال مجدد کد تایید تا ' + seconds + 'ثانیه دیگر')
            } else {
                timer.html('ارسال مجدد کد تایید تا ' + minutes + 'دقیقه و' + seconds + 'ثانیه دیگر');
            }

            if(distance < 0){
                clearInterval(x);
                timer.addClass('d-none');
                resentOtp.removeClass('d-none');
            }
        }, 1000);

    </script>

@endsection