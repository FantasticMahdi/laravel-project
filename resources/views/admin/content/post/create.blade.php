@extends('admin.layouts.master')


@section('head-tag')
    <title>ایجاد پست</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"> <a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#">پست</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">ایجاد پست جدید</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ایجاد پست</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-3 border-bottom">
                    <a href="{{ route('admin.content.post.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.content.post.store') }}" method="POST" enctype="multipart/form-data" id="form">
                        @csrf
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
<label for="">عنوان پست</label>
<input class="form-control form-control-sm" type="text" name="title" id="" value="{{ old('title') }}">
                                </div>
                                @error('title')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
<label for="">انتخاب دسته</label>
<select class="form-control form-control-sm" name="category_id" id="">
<option value="">choose category</option>
@foreach($postCategories as $postCategory)
<option value="{{ $postCategory->id }}" @if (old('category_id') == $postCategory->id) selected @endif>{{ $postCategory->name }}</option>
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
<label for="">تصویر</label>
<input class="form-control form-control-sm" type="file" name="image" id="">
                                </div>
                                @error('iamge')
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
                                    <label for="commentable">امکان درج کامنت</label>
<select class="form-control form-control-sm" name="commentable" id="commentable">
                                        <option value="0" @if (old('commentable') == 0) selected @endif>غیر فعال
                                        </option>
                                        <option value="1" @if (old('commentable') == 1) selected @endif>فعال
                                        </option>
                                    </select>
                                </div>
                                @error('commentable')
                                    <span class="alert_required bg-danger text-white p-1 rounded"
                                        role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">تاریخ انتشار</label>
                                    <input class="form-control form-control-sm" type="text" name="published_at"
                                        id="">
                                </div>
                                @error('published_at')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </section>
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="tags">تگ ها</label>
<input class="form-control form-control-sm" type="hidden" name="tags" id="tags" value="{{ old('tags') }}">
                                    <select name="" class="select3 form-control form-control-sm" id="select_tags"
                                        multiple>

                                    </select>
                                </div>
                                @error('tags')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">خلاصه پست</label>
<textarea class="form-control form-control-sm" rows="4" name="summary" id="summary">{{ old('summary') }}</textarea>
                                </div>
                                @error('summary')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </section>
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">متن پست</label>
                                    <textarea class="form-control form-control-sm" rows="4" name="body" id="body">{{ old('body') }}</textarea>
                                </div>
                                @error('body')
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

@section('script')
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('body');
        CKEDITOR.replace('summary');
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
