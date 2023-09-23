@extends('admin.layouts.master')


@section('head-tag')
    <title>ایجاد نقش</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"> <a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#"> نقش ها</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">ایجاد نقش جدید</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ایجاد نقش</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-3 border-bottom">
                    <a href="{{ route('admin.user.role.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="" method="post">
                        <section class="row">
                            <section class="col-12 col-md-5">
                                <div class="form-group">
                                    <label for="">عنوان نقش</label>
                                    <input class="form-control form-control-sm" type="text">
                                </div>
                            </section>
                            <section class="col-12 col-md-5">
                                <div class="form-group">
                                    <label for="">توضیح نقش</label>
                                    <input class="form-control form-control-sm" type="text">
                                </div>
                            </section>
<section class="col-12 col-md-2">
<button class="btn btn-primary btn-sm mt-md-4">ثبت</button>
                            </section>
                            <section class="col-12">
                                <section class="row border-top mt-3 py-3">
                                    <section class="col-md-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="" id="check1"
                                                checked>
                                            <label for="check1" class="form-check-label mr-3">نمایش دسته جدید</label>
                                        </div>
                                    </section>
                                    <section class="col-md-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="" id="check2"
                                                checked>
                                            <label for="check2" class="form-check-label mr-3">ایجاد دسته جدید</label>
                                        </div>
                                    </section>
                                    <section class="col-md-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="" id="check3"
                                                checked>
                                            <label for="check3" class="form-check-label mr-3">ویرایش دسته جدید</label>
                                        </div>
                                    </section>
                                    <section class="col-md-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="" id="check4"
                                                checked>
                                            <label for="check4" class="form-check-label mr-3">حذف دسته جدید</label>
                                        </div>
                                    </section>
                                    <section class="col-md-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="" id="check5"
                                                checked>
                                            <label for="check5" class="form-check-label mr-3">نمایش کالای جدید</label>
                                        </div>
                                    </section>
                                    <section class="col-md-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="" id="check6"
                                                checked>
                                            <label for="check6" class="form-check-label mr-3">ایجاد کالای جدید</label>
                                        </div>
                                    </section>
                                    <section class="col-md-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="" id="check7"
                                                checked>
                                            <label for="check7" class="form-check-label mr-3">ویرایش کالای جدید</label>
                                        </div>
                                    </section>
                                    <section class="col-md-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="" id="check8"
                                                checked>
                                            <label for="check8" class="form-check-label mr-3">حذف کالای جدید</label>
                                        </div>
                                    </section>
                                </section>
                            </section>
                        </section>
                    </form>
                </section>
            </section>
        </section>
    </section>
@endsection
