@extends('admin.layouts.master')


@section('head-tag')
    <title>ویرایش مشتری</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"> <a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#"> مشتریان</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">ویرایش مشتری جدید</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ویرایش مشتری</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-3 border-bottom">
                    <a href="{{ route('admin.user.customer.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.user.customer.update',$user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام</label>
                                    <input class="form-control form-control-sm" type="text" name="first_name" id=""
                                        value="{{ old('first_name', $user->first_name) }}">
                                </div>
                                @error('first_name')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام خانوادگی</label>
                                    <input class="form-control form-control-sm" type="text" name="last_name" id=""
                                        value="{{ old('last_name', $user->last_name) }}">
                                </div>
                                @error('last_name')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">تصویر</label>
                                    <input class="form-control form-control-sm" type="file" name="profile_photo_path" id="">
                                    <img src="{{ asset($user->profile_photo_path) }}" width="100" height="75" class="mt-2" alt="">
                                </div>
                                @error('profile_photo_path')
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
