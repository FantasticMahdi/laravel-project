@extends('admin.layouts.master')


@section('head-tag')
    <title>ایجاد نقش</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"><a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-14"><a href="#"> نقش ها</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">ایجاد نقش جدید</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ایجاد نقش</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-3 border-bottom">
                    <a href="{{ route('admin.user.role.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.user.role.store') }}" method="post">
                        @csrf
                        <section class="row">
                            <section class="col-12 col-md-5">
                                <div class="form-group">
                                    <label for="">عنوان نقش</label>
                                    <input name="name" value="{{old('name')}}" class="form-control form-control-sm"
                                           type="text">
                                </div>
                                @error('name')
                                <span class="alert_required bg-danger text-white p-1 rounded"
                                      role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-5">
                                <div class="form-group">
                                    <label for="">توضیح نقش</label>
                                    <input name="description" value="{{old('description')}}"
                                           class="form-control form-control-sm" type="text">
                                </div>
                                @error('description')
                                <span class="alert_required bg-danger text-white p-1 rounded"
                                      role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-2">
                                <button class="btn btn-primary btn-sm mt-md-4">ثبت</button>
                            </section>
                            <section class="col-12">
                                <section class="row border-top mt-3 py-3">
                                    @foreach($permissions as $key => $permission)
                                        <section class="col-md-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="permissions[]"
                                                       id="{{$permission->id}}" value="{{$permission->id}}">
                                                <label for="{{$permission->id}}"
                                                       class="form-check-label mr-3">{{$permission->name}}</label>
                                            </div>
                                            <div class="mt-2">
                                                @error('permissions.'. $key)
                                                <span class="alert_required bg-danger text-white p-1 rounded"
                                                      role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </section>
                                    @endforeach
                                </section>
                            </section>
                        </section>
                    </form>
                </section>
            </section>
        </section>
    </section>
@endsection
