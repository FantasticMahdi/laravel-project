@extends('admin.layouts.master')


@section('head-tag')
    <title>انبار</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"> <a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">انبار</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>انبار</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-2">
                    <a href="{{ route('admin.market.property.create') }}" class="btn btn-info btn-sm disabled">ایجاد انبار
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
                                <th>نام کالا</th>
                                <th> تصویر کالا</th>
                                <th> موجودی</th>
                                <th>ورودی انبار </th>
                                <th>خروجی انبار</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"> تنظیمات</i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
<th>1</th>
<td>نمایشگر</td>
<td><img src="{{ asset('admin-assets/images/avatar-2.jpg') }}" alt="" srcset="" class="max-height-2rem"></td>
<td>16</td>
<td>38</td>
<td>22</td>
<td class="width-22-rem text-left">
<a href="{{ route('admin.market.store.add-to-store') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> افزایش موجودی</a>
<a href="#" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> اصلاح موجودی</a>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection
