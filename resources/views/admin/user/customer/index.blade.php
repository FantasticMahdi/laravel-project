@extends('admin.layouts.master')


@section('head-tag')
    <title>مشتریان</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"> <a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page"> مشتریان</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>مشتریان</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-2">
                    <a href="{{ route('admin.user.customer.create') }}" class="btn btn-info btn-sm">ایجاد مشتری
                        جدید</a>
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
                                <th>ایمیل</th>
                                <th>شماره موبایل</th>
                                <th>نام</th>
                                <th>نام خانوادگی</th>
                                <th>کد ملی</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"> تنظیمات</i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
<th>1</th>
<td>mahdi@gmail.com</td>
<td>09121212121</td>
<td>mahdi</td>
<td>khorasani</td>
<td>002123456789</td>
<td class="width-16-rem text-left">
<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
<button class="btn btn-danger btn-sm" type="submit">
    <i class="fa fa-trash-alt"> حذف</i>
</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection
