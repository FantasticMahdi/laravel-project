@extends('admin.layouts.master')


@section('head-tag')
    <title>سفارشات</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"> <a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#">بخش فروش</a></li>
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
                    <a href="#" class="btn btn-info btn-sm disabled">ایجاد سفارش جدید</a>
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
                                <th>مبلغ سفارش</th>
                                <th>مبلغ تخفیف</th>
                                <th>مبلغ نهایی</th>
                                <th>وضعیت پرداخت</th>
                                <th>شیوه پرداخت</th>
                                <th>بانک</th>
                                <th>وضعیت ارسال</th>
                                <th>شیوه ارسال</th>
                                <th>وضعیت سفارش</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"> تنظیمات</i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>13579</td>
                                <td>150.000تومان</td>
                                <td>300.000تومان</td>
                                <td>500.000تومان</td>
                                <td>پرداخت شده</td>
                                <td>آنلاین</td>
                                <td>شهر</td>
                                <td>درحال ارسال</td>
                                <td>پیک ارسال</td>
                                <td>درحال ارسال</td>
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
                            <tr>
                                <th>1</th>
                                <td>13579</td>
                                <td>150.000تومان</td>
                                <td>300.000تومان</td>
                                <td>500.000تومان</td>
                                <td>پرداخت شده</td>
                                <td>آنلاین</td>
                                <td>شهر</td>
                                <td>درحال ارسال</td>
                                <td>پیک ارسال</td>
                                <td>درحال ارسال</td>
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
                            <tr>
                                <th>1</th>
                                <td>13579</td>
                                <td>150.000تومان</td>
                                <td>300.000تومان</td>
                                <td>500.000تومان</td>
                                <td>پرداخت شده</td>
                                <td>آنلاین</td>
                                <td>شهر</td>
                                <td>درحال ارسال</td>
                                <td>پیک ارسال</td>
                                <td>درحال ارسال</td>
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
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection
