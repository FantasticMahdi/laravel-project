@extends('admin.layouts.master')
@section('head-tag')
    <title>محصولات</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"><a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">محصولات</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>محصولات</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-2">
                    <a href="{{ route('admin.market.product.create') }}" class="btn btn-info btn-sm">ایجاد محصول
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
                            <th>تصویر کالا</th>
                            <th>قیمت</th>
                            <th>دسته</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"> تنظیمات</i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$product->name}}</td>
                                <td>
                                    <img src="{{ asset($product->image['indexArray'][$product->image['currentImage']]) }}"
                                         width="85" height="60" alt=""></td>
                                <td>{{$product->price}} تومان</td>
                                <td>{{$product->brand->persian_name}}</td>

                                <td class="width-8-rem text-left">
                                    <div class="dropdown">
                                        <a href="" class="btn  btn-success btn-sm btn-block dropdown-toggle"
                                           role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                           aria-expanded="false">
                                            <i class="fa fa-tools"></i> عملیات
                                        </a>
                                        <div class="dropdown-menu" aria-label="dropdownMenuLink">
                                            <a href="" class="dropdown-item text-right"><i class="fa fa-images"></i>
                                                گالری</a>
                                            <a href="" class="dropdown-item text-right"><i class="fa fa-list-ul"></i>
                                                فرم کالا</a>
                                            <a href="{{ route('admin.market.product.edit',$product) }}"
                                               class="dropdown-item text-right"><i class="fa fa-edit"></i>
                                                ویرایش</a>
                                            <form action="{{ route('admin.market.product.destroy',$product) }}"
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-right"><i
                                                            class="fa fa-window-close delete"></i> حذف
                                                </button>
                                            </form>
                                        </div>
                                    </div>
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
