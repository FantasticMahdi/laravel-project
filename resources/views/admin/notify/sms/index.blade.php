@extends('admin.layouts.master')


@section('head-tag')
    <title>اطلاعیه پیامکی</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"> <a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"> <a href="#"> اطلاعیه</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page"> اطلاعیه پیامکی</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>اطلاعیه پیامکی</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-2">
                    <a href="{{ route('admin.notify.sms.create') }}" class="btn btn-info btn-sm">ایجاد اطلاعیه</a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" name="" id="" placeholder="search">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان اطلاعیه</th>
                                <th>متن پیامک</th>
                                <th>وضعیت</th>
                                <th>تاریخ ارسال</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"> تنظیمات</i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sms as $key => $single_sms)
                                <tr>
                                    <th>{{ $key + 1 }}</th>
                                    <td>{{ $single_sms->title }}</td>
                                    <td>{{ Str::limit($single_sms->body, 60) }}</td>
                                    <td><label for="">
                                            <input id="{{ $single_sms->id }}" onchange="changeStatus({{ $single_sms->id }})"
                                                data-url="{{ route('admin.notify.sms.status', $single_sms->id) }}" type="checkbox"
                                                @if ($single_sms->status === 1) checked @endif>
                                        </label></td>
                                    <td>{{ jalaliDate($single_sms->published_at) }}</td>
                                    <td class="width-16-rem text-left"><a href="#" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> ویرایش</a>
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-alt">
                                                حذف</i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection


@section('script')
    <script type="text/javascript">
        function changeStatus(id) {
            var element = $('#' + id);
            var url = element.attr('data-url');
            var elementValue = !element.prop('checked');

            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    if (response.status) {
                        if (response.checked) {
                            element.prop('checked', true);
                            successToast(' پیامک با موفقیت فعال شد.')
                        } else {
                            element.prop('checked', false);
                            successToast('پیامک با موفقیت غیر فعال شد.')
                        }
                    } else {
                        element.prop('checked', elementValue);
                        errorToast('هنگام ویرایش مشکلی پیش آمده است.');

                    }
                },
                error: function() {
                    element.prop('checked', elementValue);
                    errorToast('ارتباط برقرار نشد.');
                }
            });

            function successToast(message) {

                var successToastTag = ' <section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' + '</button>\n' + '</section>\n' + '</section>';


                $('.toast-wrapper').append(successToastTag);
                $('.toast').toast('show').delay(5000).queue(function() {
                    $(this).remove();
                });
            }

            function errorToast(message) {

                var errorToastTag = ' <section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' + '</button>\n' + '</section>\n' + '</section>';

                $('.toast-wrapper').append(errorToastTag);
                $('.toast').toast('show').delay(5000).queue(function() {
                    $(this).remove();
                });
            }
        }
    </script>
@endsection

