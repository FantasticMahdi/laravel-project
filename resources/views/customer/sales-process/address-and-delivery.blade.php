@extends('customer.layouts.master-two-col')

@section('head-tag')
<title>مدیریت آدرس ها</title>
@endsection


@section('content')

  <!-- start cart -->
  <section class="mb-4">
    <section class="container-xxl" >
        <section class="row">
            <section class="col">
                <!-- start vontent header -->
                <section class="content-header">
                    <section class="d-flex justify-content-between align-items-center">
                        <h2 class="content-header-title">
                            <span>تکمیل اطلاعات ارسال کالا (آدرس گیرنده، مشخصات گیرنده، نحوه ارسال) </span>
                        </h2>
                        <section class="content-header-link">
                            <!--<a href="#">مشاهده همه</a>-->
                        </section>
                    </section>
                </section>

                <section class="row mt-4">
                    <section class="col-md-9">
                        <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                            <!-- start vontent header -->
                            <section class="content-header mb-3">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title content-header-title-small">
                                        انتخاب آدرس و مشخصات گیرنده
                                    </h2>
                                    <section class="content-header-link">
                                        <!--<a href="#">مشاهده همه</a>-->
                                    </section>
                                </section>
                            </section>

                            <section class="address-alert alert alert-primary d-flex align-items-center p-2" role="alert">
                                <i class="fa fa-info-circle flex-shrink-0 me-2"></i>
                                <secrion>
                                    پس از ایجاد آدرس، آدرس را انتخاب کنید.
                                </secrion>
                            </section>


                            <section class="address-select">

                                @foreach (auth()->user()->addresses as $address)


                                <input type="radio" name="address" value="1" id="a1"/> <!--checked="checked"-->
                                <label for="a1" class="address-wrapper mb-2 p-2">
                                    <section class="mb-2">
                                        <i class="fa fa-map-marker-alt mx-1"></i>
                                        آدرس : {{ $address->address ?? '-' }}
                                    </section>
                                    <section class="mb-2">
                                        <i class="fa fa-user-tag mx-1"></i>
                                        گیرنده : {{ $address->recipient_first_name ?? '-' }} {{ $address->recipient_last_name ?? '-' }}
                                    </section>
                                    <section class="mb-2">
                                        <i class="fa fa-mobile-alt mx-1"></i>
                                        موبایل گیرنده : {{ $address->mobile ?? '-' }}
                                    </section>
                                    <a class="" href="#"><i class="fa fa-edit"></i> ویرایش آدرس</a>
                                    <span class="address-selected">کالاها به این آدرس ارسال می شوند</span>
                                </label>

                                @endforeach





                                <section class="address-add-wrapper">
                                    <button class="address-add-button" type="button" data-bs-toggle="modal" data-bs-target="#add-address" ><i class="fa fa-plus"></i> ایجاد آدرس جدید</button>
                                    <!-- start add address Modal -->
                                    <section class="modal fade" id="add-address" tabindex="-1" aria-labelledby="add-address-label" aria-hidden="true">
                                        <section class="modal-dialog">
                                            <section class="modal-content">
                                                <section class="modal-header">
                                                    <h5 class="modal-title" id="add-address-label"><i class="fa fa-plus"></i> ایجاد آدرس جدید</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </section>
                                                <section class="modal-body">
                                                    <form class="row" action="#">
                                                        <section class="col-6 mb-2">
                                                            <label for="province" class="form-label mb-1">استان</label>
                                                            <select class="form-select form-select-sm" id="province">
                                                                <option selected>استان را انتخاب کنید</option>
                                                                @foreach ($provinces as $province)

                                                                <option value="{{ $province->id }}" data-url="{{ route('customer.sales-process.get-cities', $province->id) }}">{{ $province->name }}</option>

                                                                @endforeach

                                                            </select>
                                                        </section>

                                                        <section class="col-6 mb-2">
                                                            <label for="city" class="form-label mb-1">شهر</label>
                                                            <select class="form-select form-select-sm" id="city">
                                                                <option selected>شهر را انتخاب کنید</option>
                                                            </select>
                                                        </section>
                                                        <section class="col-12 mb-2">
                                                            <label for="address" class="form-label mb-1">نشانی</label>
                                                            <input type="text" class="form-control form-control-sm" id="address" placeholder="نشانی">
                                                        </section>

                                                        <section class="col-6 mb-2">
                                                            <label for="postal_code" class="form-label mb-1">کد پستی</label>
                                                            <input type="text" class="form-control form-control-sm" id="postal_code" placeholder="کد پستی">
                                                        </section>

                                                        <section class="col-3 mb-2">
                                                            <label for="no" class="form-label mb-1">پلاک</label>
                                                            <input type="text" class="form-control form-control-sm" id="no" placeholder="پلاک">
                                                        </section>

                                                        <section class="col-3 mb-2">
                                                            <label for="unit" class="form-label mb-1">واحد</label>
                                                            <input type="text" class="form-control form-control-sm" id="unit" placeholder="واحد">
                                                        </section>

                                                        <section class="border-bottom mt-2 mb-3"></section>

                                                        <section class="col-12 mb-2">
                                                            <section class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="receiver">
                                                                <label class="form-check-label" for="receiver">
                                                                    گیرنده سفارش خودم هستم
                                                                </label>
                                                            </section>
                                                        </section>

                                                        <section class="col-6 mb-2">
                                                            <label for="first_name" class="form-label mb-1">نام گیرنده</label>
                                                            <input type="text" class="form-control form-control-sm" id="first_name" placeholder="نام گیرنده">
                                                        </section>

                                                        <section class="col-6 mb-2">
                                                            <label for="last_name" class="form-label mb-1">نام خانوادگی گیرنده</label>
                                                            <input type="text" class="form-control form-control-sm" id="last_name" placeholder="نام خانوادگی گیرنده">
                                                        </section>

                                                        <section class="col-6 mb-2">
                                                            <label for="mobile" class="form-label mb-1">شماره موبایل</label>
                                                            <input type="text" class="form-control form-control-sm" id="mobile" placeholder="شماره موبایل">
                                                        </section>


                                                    </form>
                                                </section>
                                                <section class="modal-footer py-1">
                                                    <button type="button" class="btn btn-sm btn-primary">ثبت آدرس</button>
                                                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">بستن</button>
                                                </section>
                                            </section>
                                        </section>
                                    </section>
                                    <!-- end add address Modal -->
                                </section>

                            </section>
                        </section>


                        <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                            <!-- start vontent header -->
                            <section class="content-header mb-3">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title content-header-title-small">
                                        انتخاب نحوه ارسال
                                    </h2>
                                    <section class="content-header-link">
                                        <!--<a href="#">مشاهده همه</a>-->
                                    </section>
                                </section>
                            </section>
                            <section class="delivery-select ">

                                <section class="address-alert alert alert-primary d-flex align-items-center p-2" role="alert">
                                    <i class="fa fa-info-circle flex-shrink-0 me-2"></i>
                                    <secrion>
                                        نحوه ارسال کالا را انتخاب کنید. هنگام انتخاب لطفا مدت زمان ارسال را در نظر بگیرید.
                                    </secrion>
                                </section>

                                <input type="radio" name="delivery_type" value="1" id="d1"/>
                                <label for="d1" class="col-12 col-md-4 delivery-wrapper mb-2 pt-2">
                                    <section class="mb-2">
                                        <i class="fa fa-shipping-fast mx-1"></i>
                                        پست پیشتاز
                                    </section>
                                    <section class="mb-2">
                                        <i class="fa fa-calendar-alt mx-1"></i>
                                        تامین کالا از 4 روز کاری آینده
                                    </section>
                                </label>

                                <input type="radio" name="delivery_type" value="2" id="d2"/>
                                <label for="d2" class="col-12 col-md-4 delivery-wrapper mb-2 pt-2">
                                    <section class="mb-2">
                                        <i class="fa fa-shipping-fast mx-1"></i>
                                        تیپاکس
                                    </section>
                                    <section class="mb-2">
                                        <i class="fa fa-calendar-alt mx-1"></i>
                                        تامین کالا از 2 روز کاری آینده
                                    </section>
                                </label>


                            </section>
                        </section>




                    </section>
                    <section class="col-md-3">
                        <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                            @php
                                $totalProductPrice = 0;
                                $totalDiscount = 0;
                            @endphp

                            @foreach($cartItems as $cartItem)
                                @php
                                    $totalProductPrice += $cartItem->cartItemProductPrice() * $cartItem->number;
                                    $totalDiscount += $cartItem->cartItemProductDiscount() * $cartItem->number;
                                @endphp
                            @endforeach

                            <section class="d-flex justify-content-between align-items-center">
                                <p class="text-muted">قیمت کالاها ({{ $cartItems->count() }})</p>
                                <p class="text-muted"><span  id="total_product_price">{{ priceFormat($totalProductPrice) }}</span> تومان</p>
                            </section>

                            @if($totalDiscount != 0)
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">تخفیف کالاها</p>
                                    <p class="text-danger fw-bolder"><span id="total_discount">{{ priceFormat($totalDiscount) }}</span> تومان</p>
                                </section>
                            @endif
                            <section class="border-bottom mb-3"></section>
                            <section class="d-flex justify-content-between align-items-center">
                                <p class="text-muted">جمع سبد خرید</p>
                                <p class="fw-bolder"><span id="total_price">{{ priceFormat($totalProductPrice - $totalDiscount) }}</span> تومان</p>
                            </section>

                            <p class="my-3">
                                <i class="fa fa-info-circle me-1"></i>کاربر گرامی  خرید شما هنوز نهایی نشده است. برای ثبت سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و سپس نحوه ارسال را انتخاب کنید. نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد شد. و در نهایت پرداخت این سفارش صورت میگیرد.
                            </p>


                            <section class="">
                                <button type="button" onclick="document.getElementById('profile_completion').submit();" class="btn btn-danger d-block w-100">تکمیل فرآیند خرید</button>
                            </section>

                        </section>
                    </section>
                </section>
            </section>
        </section>

    </section>
</section>
<!-- end cart -->


@endsection


@section('script')

<script>

$(document).ready(function() {
    $('#province').change(function() {
       var element = $('#province option:selected');
        var url = element.attr('data-url');

        $.ajax({
            url : url,
            type : "GET",
            success : function(response) {
                if(response.status)
                {
                    let cities = response.cities;
                    $('#city').empty();
                    cities.map((city) => {
                        $('#city').append($('<option/>').val(city.id).text(city.name))
                    })
                }
                else{
                    errorToast('خطا پیش آمده است')
                }
            },
            error : function() {
               errorToast('خطا پیش آمده است')
            }
        })
    })
})

</script>

@endsection
