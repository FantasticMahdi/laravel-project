@extends('admin.layouts.master')
@section('head-tag')
    <title>رنگ کالا</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"><a href=""> خانه</a></li>
            <li class="breadcrumb-item font-size-14"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item font-size-14"><a href="#"> محصولات</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page"> رنگ کالا</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>رنگ کالا</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-2">
                    <a href="{{ route('admin.market.color.create',$product) }}" class="btn btn-info btn-sm">ایجاد رنگ
                        جدید</a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" name="" id=""
                               placeholder="search">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover h-150px">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام کالا</th>
                            <th>رنگ</th>
                            <th>افزایش قیمت</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"> تنظیمات</i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($product->colors as $color)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$product->name}}</td>
                                <td>{{$color->color_name}}</td>
                                <td>{{$color->price_increase}}</td>
                                <td class="width-16-rem text-left">
                                    <form class="d-inline"
                                          action="{{route('admin.market.color.destroy',['product' => $product,'productColor' => $color])}}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt">
                                                حذف</i></button>
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
