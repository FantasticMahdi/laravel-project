@extends('admin.layouts.master')


@section('head-tag')
    <title>کوپن تخفیف</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"> <a href=""> خانه</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#"> بخش فروش</a></li>
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
                    <a href="{{ route('admin.market.discount.create') }}" class="btn btn-info btn-sm">ایجاد کوپن تخفیف جدید</a>
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
                                <th>کد کوپن</th>
                                <th>درصد تخفیف</th>
                                <th>سقف تخفیف</th>
                                <th>تاریخ شروع</th>
                                <th>تاریخ پایان</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"> تنظیمات</i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>12345</td>
                                <td>مهدی خراسانی</td>
                                <td>98765</td>
                                <td>آیفون 13</td>
                                <td>در انتظار تایید</td>
                                <td class="width-16-rem text-left">
                                    <a href="{{ route('admin.market.comment.show') }}" class="btn btn-info btn-sm"><i
                                            class="fa fa-eye"></i> نمایش</a>
                                    <button class="btn btn-danger btn-sm" type="submit">
                                        <i class="fa fa-check"> حذف</i></button>
                                </td>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td>12345</td>
                                <td>مهدی خراسانی</td>
                                <td>98765</td>
                                <td>آیفون 13</td>
                                <td>در انتظار تایید</td>
                                <td class="width-16-rem text-left">
                                    <a href="{{ route('admin.market.comment.show') }}" class="btn btn-info btn-sm"><i
                                            class="fa fa-eye"></i> نمایش</a>
                                    <button class="btn btn-danger btn-sm" type="submit">
                                        <i class="fa fa-trash-alt"> حذف</i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection
