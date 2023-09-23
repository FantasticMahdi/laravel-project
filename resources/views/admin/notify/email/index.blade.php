@extends('admin.layouts.master')


@section('head-tag')
    <title>اطلاعیه ایمیلی</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"> <a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#"> اطلاعیه</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page"> اطلاعیه ایمیلی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>اطلاعیه ایمیلی</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-2">
                    <a href="{{ route('admin.notify.email.create') }}" class="btn btn-info btn-sm">ایجاد اطلاعیه جدید</a>
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
                                <th>عنوان اطلاعیه</th>
                                <th>تاریخ ارسال</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"> تنظیمات</i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>فروش ویژه بهاری</td>
                                <td>25 اردیبهشت 02</td>
                                <td class="width-16-rem text-left"><a href="#" class="btn btn-info btn-sm"><i
                                            class="fa fa-eye"></i> ویرایش</a>
                                    <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt">
                                            حذف</i></button>
                                </td>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td>فروش ویژه بهاری</td>
                                <td>25 اردیبهشت 02</td>
                                <td class="width-16-rem text-left"><a href="#" class="btn btn-info btn-sm"><i
                                            class="fa fa-eye"></i> ویرایش</a>
                                    <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt">
                                            حذف</i></button>
                                </td>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td>فروش ویژه بهاری</td>
                                <td>25 اردیبهشت 02</td>
                                <td class="width-16-rem text-left"><a href="#" class="btn btn-info btn-sm"><i
                                            class="fa fa-eye"></i> ویرایش</a>
                                    <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt">
                                            حذف</i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection
