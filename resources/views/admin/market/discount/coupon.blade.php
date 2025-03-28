@extends('admin.layouts.master')


@section('head-tag')
    <title>کوپن تخفیف</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"><a href=""> خانه</a></li>
            <li class="breadcrumb-item font-size-14"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page"> کوپن تخفیف</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>کوپن تخفیف</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-2">
                    <a href="{{ route('admin.market.discount.coupon.create') }}" class="btn btn-info btn-sm">ایجاد کوپن
                        تخفیف جدید</a>
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
                            <th>کد تخفیف</th>
                            <th>کاربر</th>
                            <th>درصد تخفیف</th>
                            <th>سقف تخفیف</th>
                            <th>نوع تخفیف</th>
                            <th>نوع کوپن</th>
                            <th>تاریخ شروع</th>
                            <th>تاریخ پایان</th>
                            <th>وضعیت</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"> تنظیمات</i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($coupons as $coupon)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$coupon->code}}</td>
                                <td>{{$coupon->user->fullName ?? '-'}}</td>
                                <td>{{$coupon->amount}}</td>
                                <td>{{$coupon->discount_ceiling ?? '-'}}</td>
                                <td>{{$coupon->amount_type == 0 ? 'درصدی' : 'عددی'}}</td>
                                <td>{{$coupon->type == 0 ? 'عمومی': 'شخصی'}}</td>
                                <td>{{jalaliDate($coupon->start_date)}}</td>
                                <td>{{jalaliDate($coupon->end_date)}}</td>
                                <td>{{$coupon->status == 0 ? 'غیر فعال' : 'فعال'}}</td>
                                <td class="width-16-rem text-left">
                                    <a href="{{ route('admin.market.discount.coupon.edit',$coupon) }}"
                                       class="btn btn-info btn-sm"><i
                                                class="fa fa-edit"></i> ویرایش</a>
                                    <form action="{{route('admin.market.discount.coupon.destroy',$coupon)}}"
                                          class="d-inline" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm delete" type="submit">
                                            <i class="fa fa-trash-alt"> حذف</i></button>
                                    </form>
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


@section('script')
    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection