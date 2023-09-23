@extends('admin.layouts.master')


@section('head-tag')
    <title>نمایش تیکت</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"> <a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#"> بخش تیکت ها</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#">تیکت</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">نمایش تیکت</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>نمایش تیکت</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-3 border-bottom">
                    <a href="{{ route('admin.ticket.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section class="card mb-3">

                    <section class="card-header text-white bg-custom-pink">
                        987654 - مهدی خراسانی
                    </section>
                    <section class="card-body">
                        <h5 class="card-title">نمی تونم به سایت واردشم</h5>
                        <p class="card-text">ساعت خوبیه فقط سنگینه</p>
                    </section>
                </section>

                <section>
                    <form action="" method="post">
                        <section class="row">
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">پاسخ تیکت </label>
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
