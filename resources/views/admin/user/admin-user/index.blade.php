@extends('admin.layouts.master')


@section('head-tag')
    <title>کاربران ادمین</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"> <a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page"> کاربران ادمین</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>کاربران ادمین</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-2">
                    <a href="{{ route('admin.user.admin-user.create') }}" class="btn btn-info btn-sm">ایجاد ادمین
                        جدید</a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" name="" id="" placeholder="search">
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
                                <th>نقش</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"> تنظیمات</i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $key => $admin)
                                <tr>
                                    <th>{{ $key + 1 }}</th>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->mobile }}</td>
                                    <td>{{$admin->first_name}}</td>
                                    <td>{{$admin->last_name}}</td>
                                    <td>super admin</td>
                                    <td class="width-16-rem text-left">
                                        <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> نقش</a>
<a href="{{route('admin.user.admin-user.edit',$admin->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
<button class="btn btn-danger btn-sm" type="submit">
<i class="fa fa-trash-alt"> حذف</i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection
