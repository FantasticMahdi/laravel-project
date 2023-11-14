@extends('admin.layouts.master')


@section('head-tag')
    <title>پست ها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"> <a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">پست ها</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>پست ها</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-2">
                    <a href="{{ route('admin.content.post.create') }}" class="btn btn-info btn-sm">ایجاد پست جدید</a>
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
                                <th>عنوان پست</th>
                                <th>دسته</th>
                                <th>تصویر</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"> تنظیمات</i></th>
                            </tr>
                        </thead>
                        <tbody>
@foreach ($posts as $key => $post)
                                <tr>
<th>{{  $key += 1 }}</th>
<td>{{ $post->title }}</td>
<td>{{ $post->postCategory->name }}</td>
<td>
{{--  <img src="{{ asset($post->image['indexArray'][$post->image['currentImage']]) }}" alt="" width="70" height="60px">  --}}
</td>
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
