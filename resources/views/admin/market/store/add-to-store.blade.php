@extends('admin.layouts.master')


@section('head-tag')
    <title>اضافه کردن به انبار</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"><a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-14"><a href="#">انبار</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">اضافه کردن به انبار</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5> اضافه کردن به انبار</h5>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-3 border-bottom">
                    <a href="{{ route('admin.market.store.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <section>
                    <form action="{{route('admin.market.store.store',$product)}}" method="post">
                        @csrf
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام تحویل گیرنده</label>
                                    <input class="form-control form-control-sm" type="text" name="receiver"
                                           value="{{old('receiver')}}"
                                           id="">
                                </div>
                                @error('receiver')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام تحویل دهنده</label>
                                    <input class="form-control form-control-sm" type="text" name="deliverer"
                                           value="{{old('deliverer')}}"
                                           id="">
                                </div>
                                @error('deliverer')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">تعداد</label>
                                    <input class="form-control form-control-sm" type="text" name="marketable_number" value="{{old('marketable_number')}}"
                                           id="">
                                </div>
                                @error('marketable_number')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">توضیحات</label>
                                    <textarea class="form-control form-control-sm" rows="4" name="description" id="">{{old('description')}}</textarea>
                                </div>
                                @error('description')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
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
