@extends('admin.layouts.master')


@section('head-tag')
    <title>‌دسته بندی</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"> <a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#">دسته بندی</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">ایجاد دسته بندی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>دسته بندی</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-3 border-bottom">
                    <a href="{{ route('admin.content.category.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.content.category.update', $postCategory->id) }}" method="post"
                        enctype="multipart/form-data" id="form">
                        @csrf
                        {{ method_field('put') }}
                        <section class="row">
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="name">نام دسته</label>
                                    <input class="form-control form-control-sm" type="text" name="name" id="name"
                                        value="{{ old('name', $postCategory->name) }}">

                                </div>
                                @error('name')
                                    <span class="alert_required bg-danger text-white p-1 rounded"
                                        role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="tags">تگ ها</label>
                                    <input class="form-control form-control-sm" type="hidden" name="tags" id="tags"
                                        value="{{ old('tags', $postCategory->tags) }}">
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
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="image">تصویر</label>
                                    <input class="form-control form-control-sm" type="file" name="image"
                                        id="image">
                                </div>
                                @error('image')
                                    <span class="alert_required bg-danger text-white p-1 rounded"
                                        role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>

                                <section class="row">
                                    @php
                                        $number = 1;
                                    @endphp
                                    @foreach ($postCategory->image['indexArray'] as $key => $value)
                                        <section class="col-md-{{ 6 / $number }}">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="currentImage"
                                                    id="{{ $number }}" value="{{ $key }}"
                                                    @if ($postCategory->image['currentImage'] == $key) checked @endif>
                                                <label for="{{ $number }}" class="form-check-label mx-2">
                                                    <img src="{{ asset($value) }}" class="w-100" alt=""
                                                        srcset="">
                                                </label>
                                            </div>
                                        </section>
                                        @php
                                            $number++;
                                        @endphp
                                    @endforeach
                                </section>

                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select class="form-control form-control-sm" name="status" id="status">
                                        <option value="0" @if (old('status', $postCategory->status) == 0) selected @endif>غیر فعال
                                        </option>
                                        <option value="1" @if (old('status', $postCategory->status) == 1) selected @endif>فعال
                                        </option>
                                    </select>
                                </div>
                                @error('status')
                                    <span class="alert_required bg-danger text-white p-1 rounded"
                                        role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">توضیحات</label>
                                    <textarea class="form-control form-control-sm" name="description" id="description" rows="4">{{ old('description', $postCategory->description) }}</textarea>
                                </div>
                                @error('description')
                                    <span class="alert_required bg-danger text-white p-1 rounded"
                                        role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>
                            <section class="col-12 my-3">
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
        CKEDITOR.replace('description');
    </script>

    <script>
        $(document).ready(function() {
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


            $('#form').submit(function(event) {
                if (select_tags.val() !== null && select_tags.val().length > 0) {
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource);
                }
            })
        })
    </script>
@endsection
