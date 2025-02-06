@extends('admin.layouts.master')


@section('head-tag')
    <title>brand</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"><a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"><a href="#">بخش فروش</a></li>
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
                            <th>نام فارسی برند</th>
                            <th>لوگو</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$brand->original_name}}</td>
                                <td>{{$brand->persian_name}}</td>
                                <td><img src="{{ asset('admin-assets/images/logo.png') }}" class="max-height-2rem"
                                         alt=""></td>
                                <td class="width-16-rem text-left">
                                    <a href="{{route('admin.market.brand.edit',$brand)}}"
                                       class="btn btn-primary btn-sm"><i
                                                class="fa fa-edit"></i> ویرایش</a>
                                    <form class="d-inline" action="{{route('admin.market.brand.destroy',$brand)}}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm delete" type="submit">
                                            <i class="fa fa-trash-alt"></i>حذف
                                        </button>
                                    </form>
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
@section('script')
    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
