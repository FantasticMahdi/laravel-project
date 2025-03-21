@extends('admin.layouts.master')


@section('head-tag')
    <title>برند</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"><a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-14"><a href="#">پرداخت ها</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">نمایش پرداخت</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>نمایش پرداخت</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-3 border-bottom">
                    <a href="{{ route('admin.market.payment.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section class="card mb-3">

                    <section class="card-header text-white bg-custom-yellow">
                        {{$payment->user->fullName}} - {{ $payment->user->id }}
                    </section>
                    <section class="card-body">
                        <h5 class="card-title">مقدار: {{$payment->paymentable->amount}} |
                            بانک: {{$payment->paymentable->gateway ?? '-'}}</h5>
                        <p class="card-text">شماره تراکنش: {{ $payment->paymentable->transaction_id ?? '-' }}</p>
                        <p class="card-text">تاریخ پرداخت: {{ isset($payment->paymentable->pay_date) ? jalaliDate($payment->paymentable->pay_date) : '-' }}</p>
                        <p class="card-text">دریافت کننده: {{ $payment->paymentable->cash_receiver ?? '-' }}</p>
                    </section>
                </section>
            </section>
        </section>
    </section>
@endsection
