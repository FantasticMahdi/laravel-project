@extends('admin.layouts.master')


@section('head-tag')
    <title>‌دسته بندی</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"> <a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page"> دسته بندی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>دسته بندی</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-2">
                    <a href="{{ route('admin.content.category.create') }}" class="btn btn-info btn-sm">ایجاد دسته بندی</a>
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
                                <th>نام دسته بندی</th>
                        <th>توضیحات</th>
                        <th>اسلاگ</th>
                        <th>عکس</th>
                        <th>تگ ها</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"> تنظیمات</i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($postCategories as $postCategory)
                                <tr>
                                    <th>1</th>
<td>{{ $postCategory->name }}</td>
<td>{{ $postCategory->description }}</td>
<td>{{ $postCategory->slug }}</td>
<td><img src="{{ asset($postCategory->image) }}" alt="" width="50px" height="50px"></td>
<td>{{ $postCategory->tags }}</td>
<td class="width-16-rem text-left"><a href="#" class="btn btn-primary btn-sm"><i
                                                class="fa fa-edit"></i> ویرایش</a>
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt">
                                                حذف</i></button>
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
