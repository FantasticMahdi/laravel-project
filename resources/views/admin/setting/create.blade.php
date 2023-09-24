@extends('admin.layouts.master')


@section('head-tag')
    <title>ایجاد فرم کالا</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"> <a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#">فرم کالا</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">ایجاد فرم کالا</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ایجاد فرم کالا</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-3 border-bottom">
                    <a href="{{ route('admin.market.property.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="" method="post">
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام فرم کالا</label>
                                    <input class="form-control form-control-sm" type="text" name=""
                                        id="">
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">فرم والد</label>
                                    <select class="form-control form-control-sm" name="" id="">
                                        <option value="">choose category</option>
                                        <option value="">electronic</option>
                                    </select>
                                </div>
                            </section>
                            <section class="col-12">
                                <button class="btn btn-primary btn-sm">register</button>
                            </section>
                        </section>
                    </form>
                </section>
            </section>
        </section>
    </section>
@endsection
