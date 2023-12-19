@extends('admin.layouts.master')


@section('head-tag')
    <title>ویرایش پست</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"> <a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#">منو</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">ویرایش منو</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ویرایش منو</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-3 border-bottom">
                    <a href="{{ route('admin.content.menu.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.content.menu.update', $menu->id) }}" method="POST">
                        @csrf
                        {{ method_field('put') }}
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">عنوان منو</label>
                                    <input class="form-control form-control-sm" type="text" name="name" id=""
                                        value="{{ old('name', $menu->name) }}">
                                </div>
                                @error('name')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">انتخاب منو</label>
                                    <select class="form-control form-control-sm" name="parent_id" id="">
                                        <option value="">منو اصلی</option>
                                        @foreach ($parent_menus as $parent_menu)
<option value="{{ $parent_menu->id }}"
@if (old('parent_id', $menu->parent_id) == $parent_menu->id) selected @endif>{{ $parent_menu->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('parent_id')
                                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">آدرس url</label>
                                    <input class="form-control form-control-sm" type="text" name="url"
                                        id="" value="{{ old('url', $menu->url) }}">
                                </div>
                                @error('url')
                                    <span class="alert_required bg-danger text-white p-1 rounded"
                                        role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select class="form-control form-control-sm" name="status" id="status">
                                        <option value="0" @if (old('status', $menu->status) == 0) selected @endif>غیر فعال
                                        </option>
                                        <option value="1" @if (old('status', $menu->status) == 1) selected @endif>فعال
                                        </option>
                                    </select>
                                </div>
                                @error('status')
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
