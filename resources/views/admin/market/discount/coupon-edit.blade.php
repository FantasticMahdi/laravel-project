@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش کوپن تخفیف</title>
    <link rel="stylesheet"
          href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"><a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-14"><a href="#">کوپن تخفیف</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page"> ویرایش کوپن تخفیف</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>ویرایش کوپن تخفیف جدید</h5>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-3 border-bottom">
                    <a href="{{ route('admin.market.discount.coupon') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{route('admin.market.discount.coupon.update',$coupon)}}" method="post">
                        @csrf
                        @method('PUT')
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">کد کوپن</label>
                                    <input class="form-control form-control-sm" type="text" name="code"
                                           value="{{old('code',$coupon->code)}}">
                                </div>
                                @error('code')
                                <span class="alert_required bg-danger text-white p-1 rounded"
                                      role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نوع کوپن</label>
                                    <select class="form-control form-control-sm" name="type" id="type">
                                        <option value="0" @if(old('type',$coupon->type) == 0) selected @endif>عمومی
                                        </option>
                                        <option value="1" @if(old('type',$coupon->type) == 1) selected @endif>خصوصی
                                        </option>
                                    </select>
                                </div>
                                @error('type')
                                <span class="alert_required bg-danger text-white p-1 rounded"
                                      role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">کاربران</label>
                                    <select class="form-control form-control-sm" name="user_id"
                                            id="users" {{ $coupon->type == 0 ? 'disabled':''}}>
                                        <option value="">کاربر را انتخاب کنید</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}"
                                                    @if(old('user_id',$coupon->user_id) == $user->id) selected @endif>{{$user->fullName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('user_id')
                                <span class="alert_required bg-danger text-white p-1 rounded"
                                      role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نوع تخفیف</label>
                                    <select class="form-control form-control-sm" name="amount_type" id="amount_type">
                                        <option value="0"
                                                @if(old('amount_type',$coupon->amount_type) == 0) selected @endif>درصدی
                                        </option>
                                        <option value="1"
                                                @if(old('amount_type',$coupon->amount_type) == 1) selected @endif>عددی
                                        </option>
                                    </select>
                                </div>
                                @error('type')
                                <span class="alert_required bg-danger text-white p-1 rounded"
                                      role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">مقدار تخفیف</label>
                                    <input class="form-control form-control-sm" type="text" name="amount"
                                           value="{{old('amount',$coupon->amount)}}">
                                </div>
                                @error('amount')
                                <span class="alert_required bg-danger text-white p-1 rounded"
                                      role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">حداکثر تخفیف</label>
                                    <input class="form-control form-control-sm" type="text" name="discount_ceiling"
                                           value="{{old('discount_ceiling',$coupon->discount_ceiling)}}">
                                </div>
                                @error('discount_ceiling')
                                <span class="alert_required bg-danger text-white p-1 rounded"
                                      role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">تاریخ شروع</label>
                                    <input class="form-control form-control-sm d-none" type="text" name="start_date"
                                           id="start_date">
                                    <input class="form-control form-control-sm" type="text" id="start_date_view">
                                </div>
                                @error('start_date')
                                <span class="alert_required bg-danger text-white p-1 rounded"
                                      role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">تاریخ پایان</label>
                                    <input class="form-control form-control-sm d-none" type="text" name="end_date"
                                           id="end_date">
                                    <input class="form-control form-control-sm" type="text" id="end_date_view">
                                </div>
                                @error('end_date')
                                <span class="alert_required bg-danger text-white p-1 rounded"
                                      role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">وضعیت</label>
                                    <select class="form-control form-control-sm" name="status" id="status">
                                        <option value="0" @if(old('status',$coupon->status) == 0) selected @endif>فعال
                                        </option>
                                        <option value="1" @if(old('status',$coupon->status) == 1) selected @endif>غیر
                                            فعال
                                        </option>
                                    </select>
                                </div>
                                @error('type')
                                <span class="alert_required bg-danger text-white p-1 rounded"
                                      role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </section>
                        </section>
                        <section class="col-12">
                            <button class="btn btn-primary btn-sm">ثبت</button>
                        </section>
                    </form>
                </section>
            </section>
        </section>
    </section>
@endsection

@section('script')
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#start_date_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#start_date'
            }),
                $('#end_date_view').persianDatepicker({
                    format: 'YYYY/MM/DD',
                    altField: '#end_date'
                })
        });
    </script>

    <script>
        $('#type').change(function () {
            if ($('#type').find(':selected').val() == 1) {
                $('#users').removeAttr('disabled');
            } else {
                $('#users').attr('disabled', 'disabled');
            }
        });
    </script>
@endsection