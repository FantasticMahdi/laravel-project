@extends('admin.layouts.master')


@section('head-tag')
    <title>brand</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"> <a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">برندها</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>برند ها</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-2">
                    <a href="{{ route('admin.market.brand.create') }}" class="btn btn-info btn-sm">ایجاد برند جدید</a>
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
                                <th>نام برند</th>
                                <th>لوگو</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"> تنظیمات</i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>lcd</td>
                                <td><img src="{{ asset('admin-assets/images/logo.png') }}" class="max-height-2rem" alt=""></td>
                                <td class="width-16-rem text-left"><a href="#" class="btn btn-primary btn-sm"><i
                                            class="fa fa-edit"></i> ویرایش</a>
                                    <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt">
                                            حذف</i></button>
                                </td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>lcd</td>
                                <td><img src="{{ asset('admin-assets/images/logo.png') }}" class="max-height-2rem" alt=""></td>
                                <td class="width-16-rem text-left"><a href="#" class="btn btn-primary btn-sm"><i
                                            class="fa fa-edit"></i> ویرایش</a>
                                    <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt">
                                            حذف</i></button>
                                </td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td>lcd</td>
                                <td><img src="{{ asset('admin-assets/images/logo.png') }}" class="max-height-2rem" alt=""></td>
                                <td class="width-16-rem text-left"><a href="#" class="btn btn-primary btn-sm"><i
                                            class="fa fa-edit"></i> ویرایش</a>
                                    <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt">
                                            حذف</i></button>
                                </td>
                            </tr>
                            <tr>
                                <th>4</th>
                                <td>lcd</td>
                                <td><img src="{{ asset('admin-assets/images/logo.png') }}" class="max-height-2rem" alt=""></td>
                                <td class="width-16-rem text-left"><a href="#" class="btn btn-primary btn-sm"><i
                                            class="fa fa-edit"></i> ویرایش</a>
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
