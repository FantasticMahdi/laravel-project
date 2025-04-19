@extends('admin.layouts.master')

@section('head-tag')
    <title>فاکتور سفارش</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"><a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-14"><a href="#">سفارشات</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">فاکتور سفارش</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>فاکتور سفارش</h5>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover h-150px" id="printable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th class="max-width-16-rem text-left"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="table-primary">
                            <th>{{$order->id}}</th>
                            <td class="text-left">
                                <a href="" class="btn btn-dark btn-sm" id="print"><i class="fa fa-print"></i> چاپ</a>
                                <a href="{{route('admin.market.order.show.detail',$order)}}" class="btn btn-warning btn-sm"><i class="fa fa-book"></i> جزییات سفارش</a>
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <th>نام مشتری :</th>
                            <td class="text-left font-weight-bolder">{{$order->user->fullName ?? '-'}}</td>
                        </tr>

                        <tr class="border-bottom">
                            <th>وضعیت پرداخت :</th>
                            <td class="text-left font-weight-bolder">
                                @if($order->payment_status == 0)
                                    پرداخت نشده
                                @elseif($order->payment_status == 1)
                                    پرداخت شده
                                @elseif($order->payment_status == 2)
                                    باطل شده
                                @else
                                    برگشت داده شده
                                @endif</td>
                        </tr>

                        <tr class="border-bottom">
                            <th>نوع پرداخت :</th>
                            <td class="text-left font-weight-bolder">
                                @if($order->payment_type == 0)
                                    آنلاین
                                @elseif($order->payment_type == 1)
                                    آفلاین
                                @else
                                    درمحل
                                @endif
                            </td>
                        </tr>
                        <tr class="border-bottom">
                            <th>مبلغ ارسال :</th>
                            <td class="text-left font-weight-bolder">{{$order->delivery_amount ?? '-'}}</td>
                        </tr>

                        <tr class="border-bottom">
                            <th>وضعیت ارسال :</th>
                            <td class="text-left font-weight-bolder">
                                @if($order->delivery_status == 0)
                                    ارسال نشده
                                @elseif($order->delivery_status == 1)
                                    درحال ارسال
                                @elseif($order->delivery_status == 2)
                                    ارسال شده
                                @else
                                    تحویل شده
                                @endif</td>
                        </tr>

                        <tr class="border-bottom">
                            <th>تاریخ ارسال :</th>
                            <td class="text-left font-weight-bolder">{{isset($order->delivery_date) ? jalaliDate($order->delivery_date) : '-'}}</td>
                        </tr>

                        <tr class="border-bottom">
                            <th>مجموع مبلغ سفارش (بدون تخفیف) :</th>
                            <td class="text-left font-weight-bolder">{{$order->order_final_amount ?? '-'}}</td>
                        </tr>

                        <tr class="border-bottom">
                            <th>مجموع مبلغ تمامی تخفیفات :</th>
                            <td class="text-left font-weight-bolder">{{$order->order_discount_amount ?? '-'}}</td>
                        </tr>

                        <tr class="border-bottom">
                            <th>مبلغ تخفیف همه محصولات :</th>
                            <td class="text-left font-weight-bolder">{{$order->order_total_products_discount_amount ?? '-'}}</td>
                        </tr>

                        <tr class="border-bottom">
                            <th>مبلغ نهایی :</th>
                            <td class="text-left font-weight-bolder">
                                @if($order->order_final_amount && $order->order_discount_amount)
                                    {{$order->order_final_amount - $order->order_discount_amount}}
                                @elseif($order->order_final_amount && !$order->order_discount_amount)
                                    {{$order->order_final_amount}}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>

                        <tr class="border-bottom">
                            <th>بانک :</th>
                            <td class="text-left font-weight-bolder">{{$order->paymentable->gateway ?? '-'}}</td>
                        </tr>

                        <tr class="border-bottom">
                            <th>کوپن تخفیف :</th>
                            <td class="text-left font-weight-bolder">{{$order->coupon->code ?? '-'}}</td>
                        </tr>

                        <tr class="border-bottom">
                            <th>مقدار تخفیف :</th>
                            <td class="text-left font-weight-bolder">{{$order->order_coupon_discount_amount ?? '-'}}</td>
                        </tr>

                        <tr class="border-bottom">
                            <th>تخفیف عمومی :</th>
                            <td class="text-left font-weight-bolder">{{$order->commonDiscount->title ?? '-'}}</td>
                        </tr>

                        <tr class="border-bottom">
                            <th>مقدار تخفیف عمومی :</th>
                            <td class="text-left font-weight-bolder">{{$order->commonDiscount->order_common_discount_amount ?? '-'}}</td>
                        </tr>

                        <tr class="border-bottom">
                            <th>وضعیت سفارش :</th>
                            <td class="text-left font-weight-bolder">
                                @if($order->order_status == 0)
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
                                @endif
                            </td>
                        </tr>


                        <tr class="border-bottom">
                            <th>پلاک :</th>
                            <td class="text-left font-weight-bolder">{{$order->address->no ?? '-'}}</td>
                        </tr>

                        <tr class="border-bottom">
                            <th>واحد :</th>
                            <td class="text-left font-weight-bolder">{{$order->address->unit ?? '-'}}</td>
                        </tr>

                        <tr class="border-bottom">
                            <th>شهر :</th>
                            <td class="text-left font-weight-bolder">{{$order->address->city->name ?? '-'}}</td>
                        </tr>

                        <tr class="border-bottom">
                            <th>نام گیرنده :</th>
                            <td class="text-left font-weight-bolder">{{$order->address->recipient_first_name ?? '-'}}</td>
                        </tr>

                        <tr class="border-bottom">
                            <th>نام خانوادگی گیرنده :</th>
                            <td class="text-left font-weight-bolder">{{$order->address->recipient_last_name ?? '-'}}</td>
                        </tr>

                        <tr class="border-bottom">
                            <th>موبایل :</th>
                            <td class="text-left font-weight-bolder">{{$order->address->mobile ?? '-'}}</td>
                        </tr>

                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection

@section('script')
    <script>
        var printBtn = document.getElementById('print');
        printBtn.addEventListener('click',function(){
            printContent('printable');
        })

        function printContent(el){
            var restorePage = $('body').html();
            var printContent = $('#'+ el).clone();
            $('body').empty().html(printContent);
            window.print();
            $('body').html(restorePage);
        }
    </script>
@endsection