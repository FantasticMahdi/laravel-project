@extends('admin.layouts.master')

@section('head-tag')
    <title>سفارشات</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"><a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">سفارشات</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>سفارشات</h5>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-2">
                    <a href="{{ route('admin.market.order.newOrders') }}" class="btn btn-info btn-sm disabled">ایجاد
                        سفارش جدید</a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" name="" id=""
                               placeholder="search">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover h-150px">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>کد سفارش</th>
                            <th>مجموع مبلغ سفارش (بدون تخفیف)</th>
                            <th>مجموع تمامی مبلغ تخفیفات</th>
                            <th>مبلغ تخفیف همه محصولات</th>
                            <th>مبلغ نهایی</th>
                            <th>وضعیت پرداخت</th>
                            <th>شیوه پرداخت</th>
                            <th>بانک</th>
                            <th>وضعیت ارسال</th>
                            <th>شیوه ارسال</th>
                            <th>وضعیت سفارش</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$order->id}}</td>
                                <td>{{$order->order_final_amount}}</td>
                                <td>{{$order->order_discount_amount}}</td>
                                <td>{{$order->order_total_products_discount_amount}}</td>
                                <td>{{$order->order_final_amount - $order->order_discount_amount}}</td>
                                <td>@if($order->payment_status == 0)
                                        پرداخت نشده
                                    @elseif($order->payment_status == 1)
                                        پرداخت شده
                                    @elseif($order->payment_status == 2)
                                        باطل شده
                                    @else
                                        برگشت داده شده
                                    @endif</td>
                                <td>@if($order->payment_type == 0)
                                        آنلاین
                                    @elseif($order->payment_type == 1)
                                        آفلاین
                                    @else
                                        درمحل
                                    @endif</td>
                                <td>{{$order->payment->paymentable->getway ?? '-'}}</td>
                                <td>@if($order->delivery_status == 0)
                                        ارسال نشده
                                    @elseif($order->delivery_status == 1)
                                        درحال ارسال
                                    @elseif($order->delivery_status == 2)
                                        ارسال شده
                                    @else
                                        تحویل شده
                                    @endif</td>
                                <td>{{{$order->delivery->name}}}</td>
                                <td>@if($order->order_status == 0)
                                        برسسی نشده
                                    @elseif($order->order_status == 1)
                                        در انتظار تایید
                                    @elseif($order->order_status == 2)
                                        تایید نشده
                                    @elseif($order->order_status == 3)
                                        تایید شده
                                    @elseif($order->order_status == 4)
                                        باطل شده
                                    @else
                                        مرجوعی
                                    @endif</td>
                                <td class="width-8-rem text-left">
                                    <div class="dropdown">
                                        <a href="" class="btn  btn-success btn-sm btn-block dropdown-toggle"
                                           role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                           aria-expanded="false">
                                            <i class="fa fa-tools"></i> عملیات
                                        </a>
                                        <div class="dropdown-menu" aria-label="dropdownMenuLink">
                                            <a href="" class="dropdown-item text-right"><i class="fa fa-images"></i>
                                                مشاهده فاکتور</a>
                                            <a href="" class="dropdown-item text-right"><i class="fa fa-list-ul"></i>
                                                تغییر وضعیت ارسال</a>
                                            <a href="" class="dropdown-item text-right"><i class="fa fa-edit"></i>
                                                تغییر وضعیت سفارش</a>
                                            <a href="" class="dropdown-item text-right"><i
                                                        class="fa fa-window-close"></i> باطل کردن سفارش</a>
                                        </div>
                                    </div>
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
