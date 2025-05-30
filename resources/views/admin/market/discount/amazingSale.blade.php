@extends('admin.layouts.master')


@section('head-tag')
    <title>فروش شگفت انگیز</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"><a href=""> خانه</a></li>
            <li class="breadcrumb-item font-size-14"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">فروش شگفت انگیز</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>فروش شگفت انگیز</h5>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-2">
                    <a href="{{ route('admin.market.discount.amazingSale.create') }}" class="btn btn-info btn-sm">ایجاد
                        فروش شگفت انگیز جدید</a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" name="" id=""
                               placeholder="search">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام کالا</th>
                            <th>درصد تخفیف</th>
                            <th>تاریخ شروع</th>
                            <th>تاریخ پایان</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"> تنظیمات</i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($amazingSales as $amazingSale)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$amazingSale->product->name}}</td>
                                <td>{{$amazingSale->percentage}}</td>
                                <td>{{jalaliDate($amazingSale->start_date)}}</td>
                                <td>{{jalaliDate($amazingSale->end_date)}}</td>
                                <td class="width-16-rem text-left">
                                    <a href="{{ route('admin.market.discount.amazingSale.edit',$amazingSale)}}  "
                                       class="btn btn-info btn-sm"><i
                                                class="fa fa-edit"></i> ویرایش</a>
                                    <form class="d-inline"
                                          action="{{route('admin.market.discount.amazingSale.destroy',$amazingSale)}}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm delete" type="submit">
                                            <i class="fa fa-trash-alt"> حذف</i></button>
                                    </form>
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
    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection