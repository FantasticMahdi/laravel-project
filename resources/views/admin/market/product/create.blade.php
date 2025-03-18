@extends('admin.layouts.master')


@section('head-tag')
    <title>ایجاد کالا</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"><a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-14"><a href="#">کالا</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">ایجاد کالا جدید</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ایجاد کالا جدید</h5>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-3 border-bottom">
                    <a href="{{ route('admin.market.product.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <section>
                    <form action="{{route('admin.market.product.store')}}" method="post" id="form"
                          enctype="multipart/form-data">
                        @csrf
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">نام کالا</label>
                                    <input class="form-control form-control-sm" type="text" name="name"
                                           value="{{ old('name') }}"
                                           id="name">
                                </div>
                                @error('name')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="category_id">دسته کالا</label>
                                    <select class="form-control form-control-sm" name="category_id"
                                            value="{{old('category_id')}}" id="category_id">
                                        <option value="">یک دسته بندی انتخاب کنید</option>
                                        @foreach($productCategories as $productCategory)
                                            <option value="{{$productCategory->id}}">{{$productCategory->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">برند کالا</label>
                                    <select class="form-control form-control-sm" name="brand_id"
                                            value="{{old('brand_id')}}" id="brand_id">
                                        <option value="">یک دسته بندی انتخاب کنید</option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->persian_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="image">تصویر کالا</label>
                                    <input class="form-control form-control-sm" type="file" name="image" value=""
                                           id="image">
                                </div>
                                @error('image')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </section>
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="price">قیمت کالا</label>
                                    <input class="form-control form-control-sm" type="text" name="price"
                                           value="{{old('price')}}"
                                           id="price">
                                </div>
                                @error('price')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="weight">وزن</label>
                                    <input class="form-control form-control-sm" type="text" name="weight"
                                           value="{{old('weight')}}"
                                           id="weight">
                                </div>
                                @error('weight')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="length">طول</label>
                                    <input class="form-control form-control-sm" type="text" name="length"
                                           value="{{old('length')}}"
                                           id="length">
                                </div>
                                @error('length')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="width">عرض</label>
                                    <input class="form-control form-control-sm" type="text" name="width"
                                           value="{{old('width')}}"
                                           id="width">
                                </div>
                                @error('width')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="height">ارتفاع</label>
                                    <input class="form-control form-control-sm" type="text" name="height"
                                           value="{{old('height')}}"
                                           id="height">
                                </div>
                                @error('height')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </section>
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="introduction">توضیحات</label>
                                    <textarea class="form-control form-control-sm" name="introduction"
                                              id="introduction"
                                              rows="6">
                                        {{ old('introduction') }}
                                    </textarea>
                                </div>
                                @error('introduction')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="tags">تگ ها</label>
                                    <input class="form-control form-control-sm" type="hidden" name="tags" id="tags"
                                           value="{{ old('tags') }}">
                                    <select name="" class="select2 form-control form-control-sm" id="select_tags"
                                            multiple>
                                    </select>
                                </div>
                                @error('tags')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select class="form-control form-control-sm" name="status" id="status">
                                        <option value="0" @if (old('status') == 0) selected @endif>غیر فعال
                                        </option>
                                        <option value="1" @if (old('status') == 1) selected @endif>فعال
                                        </option>
                                    </select>
                                </div>
                                @error('status')
                                <span class="alert_required bg-danger text-white p-1 rounded"
                                      role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="marketable">قابل فروش بودن</label>
                                    <select class="form-control form-control-sm" name="marketable" id="marketable">
                                        <option value="0" @if (old('marketable') == 0) selected @endif>غیر فعال
                                        </option>
                                        <option value="1" @if (old('marketable') == 1) selected @endif>فعال
                                        </option>
                                    </select>
                                </div>
                                @error('marketable')
                                <span class="alert_required bg-danger text-white p-1 rounded"
                                      role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="published_at">تاریخ انتشار</label>
                                    <input class="form-control form-control-sm d-none" type="text" name="published_at"
                                           id="published_at">
                                    <input class="form-control form-control-sm" type="text" id="published_at_view">
                                </div>
                                @error('published_at')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </section>
                            <section class="col-12 border-top border-bottom py-4 my-4">
                                <section class="row dynamic-fields">
                                    @if(old('meta_key'))
                                        @foreach(old('meta_key') as $index => $meta_key)
                                            <section class="col-6 col-md-3">
                                                <div class="form-group">
                                                    <input class="form-control form-control-sm" type="text"
                                                           name="meta_key[]" placeholder="ویژگی"
                                                           value="{{ $meta_key }}">
                                                    @error("meta_key.{$index}")
                                                    <span class="alert_required bg-danger text-white p-1 rounded"
                                                          role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </section>
                                            <section class="col-6 col-md-3">
                                                <div class="form-group">
                                                    <input class="form-control form-control-sm" type="text"
                                                           name="meta_value[]" placeholder="مقدار"
                                                           value="{{ old('meta_value')[$index] ?? '' }}">
                                                    @error("meta_value.{$index}")
                                                    <span class="alert_required bg-danger text-white p-1 rounded"
                                                          role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </section>
                                        @endforeach
                                    @else
                                        <section class="col-6 col-md-3">
                                            <div class="form-group">
                                                <input class="form-control form-control-sm" type="text"
                                                       name="meta_key[]" placeholder="ویژگی">
                                            </div>
                                            @error("meta_value")
                                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </section>
                                        <section class="col-6 col-md-3">
                                            <div class="form-group">
                                                <input class="form-control form-control-sm" type="text"
                                                       name="meta_value[]" placeholder="مقدار">
                                            </div>
                                            @error("meta_value")
                                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </section>
                                    @endif
                                </section>

                                <section>
                                    <button id="btn-copy" type="button" class="btn btn-success btn-sm">افزودن</button>
                                </section>
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
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#published_at_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#published_at'
            })
        });
    </script>
    <script>
        CKEDITOR.replace('introduction');
    </script>
    <script>
        $(document).ready(function () {
            var tags_input = $('#tags');
            var select_tags = $('#select_tags');
            var default_tags = tags_input.val();
            var default_data = null;

            if (tags_input.val() !== null && tags_input.val().length > 0) {
                default_data = default_tags.split(',');
            }

            select_tags.select2({
                placeholder: 'لطفا تگ های خود را وارد کنید.',
                tags: true,
                data: default_data
            });
            select_tags.children('option').attr('selected', true).trigger('change');


            $('#form').submit(function (event) {
                if (select_tags.val() !== null && select_tags.val().length > 0) {
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource);
                }
            })
        })
    </script>

    <script>
        $(function () {
            $('#btn-copy').on('click', function () {
                // Clone both key and value inputs together
                var clone = $('.dynamic-fields .col-6').slice(-2).clone(true);
                // Clear input values in the cloned pair
                clone.find('input').val('');
                // Append the cloned pair back to the parent
                $('.dynamic-fields').append(clone);
            });
        });

    </script>
@endsection

