@extends('admin.layouts.master')


@section('head-tag')
    <title>نمایش نظر</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"> <a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#">نظرات</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">نمایش نظرات</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>نمایش نظر</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-3 border-bottom">
                    <a href="{{ route('admin.content.comment.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section class="card mb-3">

                    <section class="card-header text-white bg-custom-yellow">
                        {{ $comment->user->id }} - {{ $comment->user->fullName }}
                    </section>
                    <section class="card-body">
                        <h5 class="card-title">کد کالا : {{ $comment->commentable->id }} | مشخصات کالا : {{ $comment->commentable->title }}</h5>
                        <p class="card-text">{{ $comment->body }}</p>
                    </section>
                </section>

                @if ($comment->parent_id == null)
                <section>
                    <form action="{{ route('admin.content.comment.answer', $comment) }}" method="post">
                        @csrf
                        <section class="row">
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">پاسخ ادمین </label>
                                    <textarea class="form-control form-control-sm" rows="4" name="body"></textarea>
                                </div>
                                @error('body')
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
                @endif
            </section>
        </section>
    </section>
@endsection
