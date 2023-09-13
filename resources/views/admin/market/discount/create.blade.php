@extends('admin.layouts.master')


@section('head-tag')
    <title>کوپن تخفیف</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"> <a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#">کوپن تخفیف</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page"> ساخت کوپن تخفیف</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ساخت کوپن تخفیف جدید</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-3 border-bottom">
                    <a href="{{ route('admin.market.discount.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>


                <section>
                    <form action="" method="post">
                        <section class="row">
                            <section class="col-12 col-md-6 d-flex">
                                <div class="form-group">
                                    <label for="">پاسخ ادمین </label>
                                    <input class="form-control form-control-sm" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="">پاسخ ادمین </label>
                                    <input class="form-control form-control-sm" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="">پاسخ ادمین </label>
                                    <input class="form-control form-control-sm" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="">پاسخ ادمین </label>
                                    <input class="form-control form-control-sm" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="">پاسخ ادمین </label>
                                    <input class="form-control form-control-sm" type="text">
                                </div>
                            </section>
                            <section class="col-12">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>
            </section>
        </section>
    </section>
@endsection
