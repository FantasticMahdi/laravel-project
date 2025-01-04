@extends('admin.layouts.master')


@section('head-tag')
    <title>نقش ها</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-14"><a href="">خانه</a></li>
            <li class="breadcrumb-item font-size-14"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-14 active" aria-current="page">نقش ها</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>نقش ها</h5>

                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-2">
                    <a href="{{ route('admin.user.role.create') }}" class="btn btn-info btn-sm">ایجاد نقش
                        جدید</a>
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
                                <th>نام نقش</th>
                                <th>دسترسی ها</th>

                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"> تنظیمات</i></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $key => $role)
                            <tr>
                                <th>{{$key + 1}}</th>
                                <td>{{$role->name}}</td>
                                <td>
                                    @if(empty($role->permissions->toArray()))
                                        <span class="text-danger">{{__('no permission defined for this role')}}</span>
                                    @else
                                        @foreach($role->permissions as $permission)
                                            {{ $permission->name }}<br>
                                        @endforeach
                                    @endif
                                </td>
                                <td class="width-16-rem text-left">
                                    <a href="#" class="btn btn-success btn-sm"><i class="fa fa-user-graduate"></i>
                                        دسترسی ها</a>
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                    <button class="btn btn-danger btn-sm" type="submit">
                                        <i class="fa fa-trash-alt"> حذف</i>
                                    </button>
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
