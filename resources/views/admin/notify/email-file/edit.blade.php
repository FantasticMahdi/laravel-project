@extends('admin.layouts.master')


@section('head-tag')
    <title>ویرایش فایل اطلاعیه ایمیلی</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"> <a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#"> اطلاعیه</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#"> اطلاعیه ایمیلی</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#"> فایل های اطلاعیه ایمیلی</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">ویرایش فایل های اطلاعیه ایمیلی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ویرایش فایل های اطلاعیه ایمیلی</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-3 border-bottom">
                    <a href="{{ route('admin.notify.email-file.index', $file->email->id) }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.notify.email-file.update', $file->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="file">فایل</label>
                                    <input class="form-control form-control-sm" type="file" name="file" id="file">
                                </div>
                                @error('file')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select class="form-control form-control-sm" name="status" id="status">
                                        <option value="0" @if (old('status', $file->status) == 0) selected @endif>غیر فعال
                                        </option>
                                        <option value="1" @if (old('status', $file->status) == 1) selected @endif>فعال
                                        </option>
                                    </select>
                                </div>
                                @error('status')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="sensivity">نوع فایل</label>
                                    <select class="form-control form-control-sm" name="sensivity" id="sensivity">
                                        <option value="0" @if (old('sensivity') == 0) selected @endif>غیر حساس
                                        </option>
                                        <option value="1" @if (old('sensivity') == 1) selected @endif>حساس
                                        </option>
                                    </select>
                                </div>
                                @error('sensivity')
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
