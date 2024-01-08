@extends('admin.layouts.master')


@section('head-tag')
    <title>ایجاد اطلاعیه پیامکی</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"> <a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#"> اطلاعیه</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#"> اطلاعیه پیامکی</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">ویرایش اطلاعیه پیامکی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ویرایش اطلاعیه پیامکی</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-3 border-bottom">
                    <a href="{{ route('admin.notify.sms.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.notify.sms.update', $sms->id) }}" method="post">
                        @csrf
                        {{ method_field('put') }}
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">عنوان پیامک</label>
                                    <input class="form-control form-control-sm" type="text" name="title" id="title" value="{{ old('title', $sms->title) }}">
                                </div>
                                @error('title')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">تاریخ انتشار</label>
                                    <input class="form-control form-control-sm d-none" type="text" name="published_at" id="published_at">
                                    <input class="form-control form-control-sm" type="text" id="published_at_view" value="{{ $sms->published_at }}">
                                </div>
                                @error('published_at')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select class="form-control form-control-sm" name="status" id="status">
                                        <option value="0" @if (old('status', $sms->status) == 0) selected @endif>غیر فعال
                                        </option>
                                        <option value="1" @if (old('status' , $sms->status) == 1) selected @endif>فعال
                                        </option>
                                    </select>
                                </div>
                                @error('status')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">متن پیامک</label>
                                    <textarea class="form-control form-control-sm" rows="4" name="body" id="body">{{ old('body', $sms->body) }}</textarea>
                                </div>
                                @error('body')
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

@section('script')
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>


    <script>
        $(document).ready(function() {
            $('#published_at_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#published_at',
                timePicker: {
                    enabled: true,
                    meridiem: {
                        enabled: true
                    }
                }

            })
        });
    </script>
@endsection
