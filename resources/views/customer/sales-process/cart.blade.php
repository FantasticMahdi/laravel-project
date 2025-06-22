@extends('customer.layouts.master-two-col')

@section('head-tag')
    <title>سبد خرید</title>
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
                                <span>سبد خرید شما</span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>

                    <section class="row mt-4">
                        <section class="col-md-9 mb-3">
                            <section class="content-wrapper bg-white p-3 rounded-2">

                                <section class="cart-item d-md-flex py-3">
                                    <section class="cart-img align-self-start flex-shrink-1"><img src="assets/images/products/1.jpg" alt=""></section>
                                    <section class="align-self-start w-100">
                                        <p class="fw-bold">کتاب اثر مرکب نوشته دارن هاردی</p>
                                        <p><span style="background-color: #523e02;" class="cart-product-selected-color me-1"></span> <span> قهوه ای</span></p>
                                        <p><i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i> <span> گارانتی اصالت و سلامت فیزیکی کالا</span></p>
                                        <p><i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا موجود در انبار</span></p>
                                        <section>
                                            <section class="cart-product-number d-inline-block ">
                                                <button class="cart-number-down" type="button">-</button>
                                                <input class="" type="number" min="1" max="5" step="1" value="1" readonly="readonly">
                                                <button class="cart-number-up" type="button">+</button>
                                            </section>
                                            <a class="text-decoration-none ms-4 cart-delete" href="#"><i class="fa fa-trash-alt"></i> حذف از سبد</a>
                                        </section>
                                    </section>
                                    <section class="align-self-end flex-shrink-1">
                                        <section class="text-nowrap fw-bold">56,000 تومان</section>
                                    </section>
                                </section>


                                <section class="cart-item d-md-flex py-3">
                                    <section class="cart-img align-self-start flex-shrink-1"><img src="assets/images/products/2.jpg" alt=""></section>
                                    <section class="align-self-start w-100">
                                        <p class="fw-bold">دستگاه آبمیوه گیری دنویر با کد 1016</p>
                                        <p><span style="background-color: #523e02;" class="cart-product-selected-color me-1"></span> <span> قهوه ای</span></p>
                                        <p><i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i> <span> گارانتی اصالت و سلامت فیزیکی کالا</span></p>
                                        <p><i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا موجود در انبار</span></p>
                                        <section>
                                            <section class="cart-product-number d-inline-block ">
                                                <button class="cart-number-down" type="button">-</button>
                                                <input class="" type="number" min="1" max="5" step="1" value="1" readonly="readonly">
                                                <button class="cart-number-up" type="button">+</button>
                                            </section>
                                            <a class="text-decoration-none ms-4 cart-delete" href="#"><i class="fa fa-trash-alt"></i> حذف از سبد</a>
                                        </section>
                                    </section>
                                    <section class="align-self-end flex-shrink-1">
                                        <section class="cart-item-discount text-danger text-nowrap mb-1">تخفیف 78,000</section>
                                        <section class="text-nowrap fw-bold">264,000 تومان</section>
                                    </section>
                                </section>


                            </section>
                        </section>
                        <section class="col-md-3">
                            <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">قیمت کالاها (2)</p>
                                    <p class="text-muted">398,000 تومان</p>
                                </section>

                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">تخفیف کالاها</p>
                                    <p class="text-danger fw-bolder">78,000 تومان</p>
                                </section>
                                <section class="border-bottom mb-3"></section>
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">جمع سبد خرید</p>
                                    <p class="fw-bolder">320,000 تومان</p>
                                </section>

                                <p class="my-3">
                                    <i class="fa fa-info-circle me-1"></i>کاربر گرامی  خرید شما هنوز نهایی نشده است. برای ثبت سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و سپس نحوه ارسال را انتخاب کنید. نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد شد. و در نهایت پرداخت این سفارش صورت میگیرد.
                                </p>


                                <section class="">
                                    <a href="address.html" class="btn btn-danger d-block">تکمیل فرآیند خرید</a>
                                </section>

                            </section>
                        </section>
                    </section>
                </section>
            </section>

        </section>
    </section>
    <!-- end cart -->






    <section class="mb-4">
        <section class="container-xxl" >
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>کالاهای مرتبط با سبد خرید شما</span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- start vontent header -->
                        <section class="lazyload-wrapper" >
                            <section class="lazyload light-owl-nav owl-carousel owl-theme">


                                <section class="item">
                                    <section class="lazyload-item-wrapper">
                                        <section class="product">
                                            <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                            <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                            <a class="product-link" href="#">
                                                <section class="product-image">
                                                    <img class="" src="assets/images/products/3.jpg" alt="">
                                                </section>
                                                <section class="product-name"><h3>پکیج آموزش خطاطی و خوشنویسی با کد 624</h3></section>
                                                <section class="product-price-wrapper">
                                                    <section class="product-price">115,000 تومان</section>
                                                </section>
                                                <section class="product-colors">
                                                    <section class="product-colors-item" style="background-color: yellow;"></section>
                                                    <section class="product-colors-item" style="background-color: green;"></section>
                                                    <section class="product-colors-item" style="background-color: white;"></section>
                                                    <section class="product-colors-item" style="background-color: blue;"></section>
                                                    <section class="product-colors-item" style="background-color: red;"></section>
                                                </section>
                                            </a>
                                        </section>
                                    </section>
                                </section>
                                <section class="item">
                                    <section class="lazyload-item-wrapper">
                                        <section class="product">
                                            <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                            <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                            <a class="product-link" href="#">
                                                <section class="product-image">
                                                    <img class="" src="assets/images/products/4.jpg" alt="">
                                                </section>
                                                <section class="product-colors"></section>
                                                <section class="product-name"><h3>مجموعه داستان های هزار و یک شب</h3></section>
                                                <section class="product-price-wrapper">
                                                    <section class="product-discount">
                                                        <span class="product-old-price">230,000 </span>
                                                        <span class="product-discount-amount">10%</span>
                                                    </section>
                                                    <section class="product-price">207،000 تومان</section>
                                                </section>
                                            </a>
                                        </section>
                                    </section>
                                </section>
                                <section class="item">
                                    <section class="lazyload-item-wrapper">
                                        <section class="product">
                                            <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                            <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                            <a class="product-link" href="#">
                                                <section class="product-image">
                                                    <img class="" src="assets/images/products/5.jpg" alt="">
                                                </section>
                                                <section class="product-colors"></section>
                                                <section class="product-name"><h3>کتاب اطلاعات عمومی انتشارات فارابی با کد 3087</h3></section>
                                                <section class="product-price-wrapper">
                                                    <section class="product-price">870,000 تومان</section>
                                                </section>
                                            </a>
                                        </section>
                                    </section>
                                </section>
                                <section class="item">
                                    <section class="lazyload-item-wrapper">
                                        <section class="product">
                                            <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                            <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                            <a class="product-link" href="#">
                                                <section class="product-image">
                                                    <img class="" src="assets/images/products/6.jpg" alt="">
                                                </section>
                                                <section class="product-colors"></section>
                                                <section class="product-name"><h3>کتاب شیوه گرگ اثر جردن بلفورت</h3></section>
                                                <section class="product-price-wrapper">
                                                    <section class="product-discount">
                                                        <span class="product-old-price">59,000 </span>
                                                        <span class="product-discount-amount">50%</span>
                                                    </section>
                                                    <section class="product-price">29،000 تومان</section>
                                                </section>
                                            </a>
                                        </section>
                                    </section>
                                </section>
                                <section class="item">
                                    <section class="lazyload-item-wrapper">
                                        <section class="product">
                                            <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                            <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                            <a class="product-link" href="#">
                                                <section class="product-image">
                                                    <img class="" src="assets/images/products/7.jpg" alt="">
                                                </section>
                                                <section class="product-colors"></section>
                                                <section class="product-name"><h3>مجموعه داستان های قصه های مشهور جهان</h3></section>
                                                <section class="product-price-wrapper">
                                                    <section class="product-price">450,000 تومان</section>
                                                </section>
                                            </a>
                                        </section>
                                    </section>
                                </section>
                                <section class="item">
                                    <section class="lazyload-item-wrapper">
                                        <section class="product">
                                            <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                            <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                            <a class="product-link" href="#">
                                                <section class="product-image">
                                                    <img class="" src="assets/images/products/8.jpg" alt="">
                                                </section>
                                                <section class="product-colors"></section>
                                                <section class="product-name"><h3>کتاب برای سفر خودآموز مکالمات انگلیسی</h3></section>
                                                <section class="product-price-wrapper">
                                                    <section class="product-price">64,000 تومان</section>
                                                </section>
                                            </a>
                                        </section>
                                    </section>
                                </section>
                                <section class="item">
                                    <section class="lazyload-item-wrapper">
                                        <section class="product">
                                            <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                            <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                            <a class="product-link" href="#">
                                                <section class="product-image">
                                                    <img class="" src="assets/images/products/9.jpg" alt="">
                                                </section>
                                                <section class="product-colors"></section>
                                                <section class="product-name"><h3>کتاب آدم های سمی اثر لیلیان گلاس</h3></section>
                                                <section class="product-price-wrapper">
                                                    <section class="product-discount">
                                                        <span class="product-old-price">164,000 </span>
                                                        <span class="product-discount-amount">10%</span>
                                                    </section>
                                                    <section class="product-price">147،600 تومان</section>
                                                </section>
                                            </a>
                                        </section>
                                    </section>
                                </section>
                                <section class="item">
                                    <section class="lazyload-item-wrapper">
                                        <section class="product">
                                            <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                            <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                            <a class="product-link" href="#">
                                                <section class="product-image">
                                                    <img class="" src="assets/images/products/10.jpg" alt="">
                                                </section>
                                                <section class="product-colors"></section>
                                                <section class="product-name"><h3>مجموعه کتاب من پیش از تو، پس از تو، باز هم من</h3></section>
                                                <section class="product-price-wrapper">
                                                    <section class="product-price">221,000 تومان</section>
                                                </section>
                                            </a>
                                        </section>
                                    </section>
                                </section>
                                <section class="item">
                                    <section class="lazyload-item-wrapper">
                                        <section class="product">
                                            <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                            <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                            <a class="product-link" href="#">
                                                <section class="product-image">
                                                    <img class="" src="assets/images/products/11.jpg" alt="">
                                                </section>
                                                <section class="product-colors"></section>
                                                <section class="product-name"><h3>کتاب سلخ اثر غزاله شکوهی</h3></section>
                                                <section class="product-price-wrapper">
                                                    <section class="product-price">870,000 تومان</section>
                                                </section>
                                            </a>
                                        </section>
                                    </section>
                                </section>
                                <section class="item">
                                    <section class="lazyload-item-wrapper">
                                        <section class="product">
                                            <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                            <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                            <a class="product-link" href="#">
                                                <section class="product-image">
                                                    <img class="" src="assets/images/products/12.jpg" alt="">
                                                </section>
                                                <section class="product-colors"></section>
                                                <section class="product-name"><h3>کتاب بیشعوری اثر جردن بلفورت</h3></section>
                                                <section class="product-price-wrapper">
                                                    <section class="product-price">57,000 تومان</section>
                                                </section>
                                            </a>
                                        </section>
                                    </section>
                                </section>
                                <section class="item">
                                    <section class="lazyload-item-wrapper">
                                        <section class="product">
                                            <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                            <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section>
                                            <a class="product-link" href="#">
                                                <section class="product-image">
                                                    <img class="" src="assets/images/products/13.jpg" alt="">
                                                </section>
                                                <section class="product-colors"></section>
                                                <section class="product-name"><h3>کتاب تختخوابت را مرتب کن اثر ژنرال ویلیام مک ریون</h3></section>
                                                <section class="product-price-wrapper">
                                                    <section class="product-price">89,000 تومان</section>
                                                </section>
                                            </a>
                                        </section>
                                    </section>
                                </section>

                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>

@endsection