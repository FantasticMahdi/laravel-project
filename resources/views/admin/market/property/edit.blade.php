@extends('admin.layouts.master')
@section('head-tag')
    <title>ویرایش فرم کالا</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"><a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-14"><a href="#">فرم کالا</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">ویرایش فرم کالا</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ویرایش فرم کالا</h5>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-3 border-bottom">
                    <a href="{{ route('admin.market.property.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <section>
                    <form action="{{route('admin.market.property.update',$category_attribute)}}" method="post">
                        @csrf
                        @method('PUT')
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام فرم کالا</label>
                                    <input class="form-control form-control-sm" type="text" name="name"
                                           value="{{old('name',$category_attribute->name)}}"
                                           id="">
                                </div>
                                @error('name')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">واحد اندازه گیری</label>
                                    <input class="form-control form-control-sm" type="text" name="unit"
                                           value="{{old('unit',$category_attribute->unit)}}"
                                           id="">
                                </div>
                                @error('unit')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">فرم والد</label>
                                    <select class="form-control form-control-sm" name="category_id" id="">
                                        <option value="">دسته بندی را انتخاب کنید</option>
                                        @foreach($product_categories as $product_category)
                                            <option value="{{$product_category->id}}" @if(old('category_id',$category_attribute->category_id) == $product_category->id) selected @endif>{{$product_category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
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
