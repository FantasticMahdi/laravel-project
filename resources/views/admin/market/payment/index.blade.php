@extends('admin.layouts.master')


@section('head-tag')
    <title>پرداخت ها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"><a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">پرداخت ها</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>پرداخت ها</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-2">
                    <a href="#" class="btn btn-info btn-sm disabled">ایجاد پرداخت
                        جدید</a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" name="" id=""
                               placeholder="search">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>کد تراکنش</th>
                            <th>بانک</th>
                            <th>پرداخت کننده</th>
                            <th>وضعیت پرداخت</th>
                            <th>نوع پرداخت</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"> تنظیمات</i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $payment)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$payment->paymentable->transaction_id ?? '-'}}</td>
                                <td>{{$payment->paymentable->gateway ?? '-'}}</td>
                                <td>{{$payment->user->fullName}}</td>
                                <td>@if($payment->status == 0) پرداخت شده@elseif($payment->status == 1)پرداخت نشده
                                    @elseif($payment->status == 2) باطل شده@else برگشت داده شده @endif</td>
                                <td>{{$payment->type == 0 ? 'آنلاین' : ($payment->type == 1 ? 'آفلاین' : 'درب محل')}}</td>
                                <td class="width-22-rem text-left">
                                    <a href="#" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> مشاهده</a>
                                    <a href="{{ route('admin.market.payment.canceled',$payment) }}" class="btn btn-warning btn-sm"><i class="fa fa-window-close"></i> باطل
                                        کردن</a>
                                    <a href="{{ route('admin.market.payment.returned',$payment) }}" class="btn btn-danger btn-sm"><i class="fa fa-reply"></i>
                                        برگرداندن</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection
