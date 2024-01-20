@extends('admin.layouts.master')


@section('head-tag')
    <title>ویرایش تنظیمات</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"> <a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#"> تنظیمات </a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">ویرایش تنظیمات</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ویرایش تنظیمات</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-3 border-bottom">
                    <a href="{{ route('admin.setting.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.setting.update', $setting->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('put') }}
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">عنوان سایت</label>
                                    <input class="form-control form-control-sm" type="text" name="title" id="subject"
                                        value="{{ old('title', $setting->title) }}">
                                </div>
                                @error('title')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">کلمات کلیدی سایت</label>
                                    <input class="form-control form-control-sm" type="text" name="keywords" id="subject"
                                        value="{{ old('keywords', $setting->keywords) }}">
                                </div>
                                @error('keywords')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="logo">لگو</label>
                                    <input class="form-control form-control-sm" type="file" name="logo" id="logo">
                                </div>
                                @error('logo')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="icon">آیکون</label>
                                    <input class="form-control form-control-sm" type="file" name="icon" id="icon">
                                </div>
                                @error('icon')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">توضیحات سایت</label>
                                    <textarea class="form-control form-control-sm" rows="4" name="description" id="description">{{ old('description', $setting->description) }}</textarea>
                                </div>
                                @error('description')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert"><strong>{{ $message }}</strong></span>
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
