@extends('admin.layouts.master')


@section('head-tag')
    <title>برند</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"> <a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#">نظرات</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">نمایش نظرات</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>نمایش نظر</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-3 border-bottom">
                    <a href="{{ route('admin.market.comment.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section class="card mb-3">

                    <section class="card-header text-white bg-custom-yellow">
                        987654 - مهدی خراسانی
                    </section>
                    <section class="card-body">
                        <h5 class="card-title">کد کالا : 987654 اپل واچ |مشخصات کالا : ساعت هوشمند</h5>
                        <p class="card-text">ساعت خوبیه فقط سنگینه</p>
                    </section>
                </section>

                <section>
                    <form action="" method="post">
                        <section class="row">
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">پاسخ ادمین </label>
                                    <textarea class="form-control form-control-sm" rows="4"></textarea>
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
