@extends('admin.layouts.master')


@section('head-tag')
    <title>ایجاد پیج</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"> <a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#">پیج ساز</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">ایجاد پیج جدید </li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ایجاد پیج</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-3 border-bottom">
                    <a href="{{ route('admin.content.page.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.content.page.store') }}" method="post" id="form">
                        @csrf
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">عنوان</label>
                                    <input class="form-control form-control-sm" type="text" name="title"
                                        id="title" value="{{ old('title') }}">
                                </div>
                                @error('title')
                                <span class="alert_required bg-danger text-white p-1 rounded"
                                    role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">آدرس url</label>
                                    <input class="form-control form-control-sm" type="text" name="url"
                                        id="url" value="{{ old('url') }}">
                                </div>
                                @error('url')
                                <span class="alert_required bg-danger text-white p-1 rounded"
                                    role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            </section>
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">محتوی</label>
                                    <textarea class="form-control form-control-sm" name="body"
                                        id="body" rows="4">{{ old('body') }}</textarea>
                                </div>
                                @error('body')
                                <span class="alert_required bg-danger text-white p-1 rounded"
                                    role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
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
