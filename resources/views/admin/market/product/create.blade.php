@extends('admin.layouts.master')


@section('head-tag')
    <title>ایجاد کالا</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"> <a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#">کالا</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">ایجاد کالا جدید</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ایجاد کالا جدید</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-3 border-bottom">
                    <a href="{{ route('admin.market.product.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="" method="post">
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام کالا</label>
                                    <input class="form-control form-control-sm" type="text" name=""
                                        id="">
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">دسته کالا</label>
                                    <select class="form-control form-control-sm" name="" id="">
                                        <option value="">choose category</option>
                                        <option value="">electronic</option>
                                    </select>
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">فرم کالا</label>
                                    <select class="form-control form-control-sm" name="" id="">
                                        <option value="">choose category</option>
                                        <option value="">electronic</option>
                                    </select>
                                </div>
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">تصویر کالا</label>
                                    <input class="form-control form-control-sm" type="file" name=""
                                        id="">
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">وزن</label>
                                    <input class="form-control form-control-sm" type="text" name=""
                                        id="">
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">قیمت کالا</label>
                                    <input class="form-control form-control-sm" type="text" name=""
                                        id="">
                                </div>
                            </section>
<section class="col-12">
<div class="form-group">
<label for="">توضیحات</label>
<textarea class="form-control form-control-sm" name="body" id="body" rows="6"></textarea>
</div>
</section>
<section class="col-12 border-top border-bottom py-3 mb-3">

    <section class="row">
        <section class="col-6 col-md-3">
            <div class="form-group">
                <input class="form-control form-control-sm" type="text" name=""
                id="" placeholder="ویژگی">
                </div>
        </section>
        <section class="col-6 col-md-3">
            <div class="form-group">
                <input class="form-control form-control-sm" type="text" name=""
                id="" placeholder="مقدار">
                </div>
        </section>
    </section>

    <section>
        <button type="button" class="btn btn-success btn-sm">افزودن</button>
    </section>
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

@section('script')
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('body');
    </script>
@endsection

