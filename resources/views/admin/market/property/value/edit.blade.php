@extends('admin.layouts.master')
@section('head-tag')
    <title>ویرایش مقدار فرم کالا</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"><a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-14"><a href="#">فرم کالا</a></li>
            <li class="breadcrumb-item font-size-14"><a href="#">مقدار فرم کالا</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">ویرایش مقدار فرم کالا</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ویرایش مقدار فرم کالا</h5>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-3 border-bottom">
                    <a href="{{ route('admin.market.value.index',$categoryAttribute) }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <section>
                    <form action="{{route('admin.market.value.update',['categoryAttribute' =>$categoryAttribute,'value'=> $value])}}"
                          method="post">
                        @csrf
                        @method('PUT')
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">انتخاب محصول</label>
                                    <select class="form-control form-control-sm" name="product_id" id="">
                                        <option value="">محصول را انتخاب کنید</option>
                                        @foreach($categoryAttribute->category->products as $product)
                                            <option value="{{$product->id}}"
                                                    @if(old('product_id',$value->product_id) == $product->id) selected @endif>{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('product_id')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">مقدار فرم کالا</label>
                                    <input class="form-control form-control-sm" type="text" name="value"
                                           value="{{old('value',$value->value->value)}}"
                                           id="">
                                </div>
                                @error('value')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="price_increase">افزایش قیمت</label>
                                    <input class="form-control form-control-sm" type="text" name="price_increase"
                                           value="{{old('price_increase',$value->value->price_increase)}}"
                                           id="price_increase">
                                </div>
                                @error('price_increase')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="type">نوع</label>
                                    <select class="form-control form-control-sm" name="type" id="type">
                                        <option value="0" @if (old('type',$value->type) == 0) selected @endif>ساده
                                        </option>
                                        <option value="1" @if (old('type',$value->type) == 1) selected @endif>انتخابی
                                        </option>
                                    </select>
                                </div>
                                @error('type')
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
