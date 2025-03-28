<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\AmazingSaleRequest;
use App\Http\Requests\Admin\Market\CommonDiscountRequest;
use App\Http\Requests\Admin\Market\CouponRequest;
use App\Models\Market\AmazingSale;
use App\Models\Market\CommonDiscount;
use App\Models\Market\Coupon;
use App\Models\Market\Product;
use App\Models\User;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function coupon()
    {
        $coupons = Coupon::select('id', 'code', 'amount', 'amount_type', 'discount_ceiling', 'type', 'status', 'start_date', 'end_date', 'user_id')->orderBy('created_at', 'desc')->simplePaginate(10);
        return view('admin.market.discount.coupon', ['coupons' => $coupons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function couponCreate()
    {
        $users = User::select('id', 'first_name', 'last_name')->get();
        return view('admin.market.discount.coupon-create', ['users' => $users]);
    }

    public function couponStore(CouponRequest $request)
    {
        $inputs = $request->only('code', 'type', 'user_id', 'amount_type', 'amount', 'discount_ceiling', 'start_date', 'end_date', 'status');

        $inputs['start_date'] = date("Y-m-d H:i:s", (int)substr($inputs['start_date'], 0, 10));
        $inputs['end_date'] = date("Y-m-d H:i:s", (int)substr($inputs['end_date'], 0, 10));

        $coupon = Coupon::create([
            'code' => $inputs['code'],
            'type' => $inputs['type'],
            'user_id' => $inputs['type'] == '0' ? null : $inputs['user_id'],
            'amount_type' => $inputs['amount_type'],
            'amount' => $inputs['amount'],
            'discount_ceiling' => $inputs['discount_ceiling'],
            'start_date' => $inputs['start_date'],
            'end_date' => $inputs['end_date'],
            'status' => $inputs['status']
        ]);
        return redirect()->route('admin.market.discount.coupon')->with('swal-success', 'کوپن جدید شما با موفقیت ثبت شد!');
    }

    public function couponEdit(Coupon $coupon)
    {
        $users = User::select('id', 'first_name', 'last_name')->get();
        return view('admin.market.discount.coupon-edit', ['coupon' => $coupon, 'users' => $users]);
    }

    public function couponUpdate(CouponRequest $request, Coupon $coupon)
    {
        $inputs = $request->only('code', 'type', 'user_id', 'amount_type', 'amount', 'discount_ceiling', 'start_date', 'end_date', 'status');

        $inputs['start_date'] = date("Y-m-d H:i:s", (int)substr($inputs['start_date'], 0, 10));
        $inputs['end_date'] = date("Y-m-d H:i:s", (int)substr($inputs['end_date'], 0, 10));
        $coupon->update([
            'code' => $inputs['code'],
            'type' => $inputs['type'],
            'user_id' => $inputs['type'] == '0' ? null : $inputs['user_id'],
            'amount_type' => $inputs['amount_type'],
            'amount' => $inputs['amount'],
            'discount_ceiling' => $inputs['discount_ceiling'],
            'start_date' => $inputs['start_date'],
            'end_date' => $inputs['end_date'],
            'status' => $inputs['status']
        ]);
        return redirect()->route('admin.market.discount.coupon')->with('swal-success', 'کوپن شما با موفقیت ویرایش شد!');
    }

    public function couponDelete(Coupon $coupon){
        $coupon->delete();
        return redirect()->route('admin.market.discount.coupon')->with('swal-success', 'کوپن شما با موفقیت حذف شد!');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function commonDiscount()
    {
        $commonDiscounts = CommonDiscount::select('id', 'title', 'percentage', 'discount_ceiling', 'minimal_order_amount', 'start_date', 'end_date', 'status')->orderBy('created_at', 'DESC')->simplePaginate(10);
        return view('admin.market.discount.common', ['commonDiscounts' => $commonDiscounts]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function commonDiscountCreate()
    {
        return view('admin.market.discount.common-create');
    }

    public function commonDiscountStore(CommonDiscountRequest $request)
    {
        $inputs = $request->only('title', 'percentage', 'discount_ceiling', 'minimal_order_amount', 'start_date', 'end_date', 'status');

        $inputs['start_date'] = date("Y-m-d H:i:s", (int)substr($inputs['start_date'], 0, 10));
        $inputs['end_date'] = date("Y-m-d H:i:s", (int)substr($inputs['end_date'], 0, 10));
        $commonDiscount = CommonDiscount::create([
            'title' => $inputs['title'],
            'percentage' => $inputs['percentage'],
            'discount_ceiling' => $inputs['discount_ceiling'],
            'minimal_order_amount' => $inputs['minimal_order_amount'],
            'start_date' => $inputs['start_date'],
            'end_date' => $inputs['end_date'],
            'status' => $inputs['status']
        ]);
        return redirect()->route('admin.market.discount.commonDiscount')->with('swal-success', 'تخفیف جدید شما با موفقیت ثبت شد!');
    }

    public function commonDiscountEdit(CommonDiscount $commonDiscount)
    {
        return view('admin.market.discount.common-edit', ['commonDiscount' => $commonDiscount]);
    }

    public function commonDiscountUpdate(CommonDiscountRequest $request, CommonDiscount $commonDiscount)
    {
        $inputs = $request->only('title', 'percentage', 'discount_ceiling', 'minimal_order_amount', 'start_date', 'end_date', 'status');
        $inputs['start_date'] = date("Y-m-d H:i:s", (int)substr($inputs['start_date'], 0, 10));
        $inputs['end_date'] = date("Y-m-d H:i:s", (int)substr($inputs['end_date'], 0, 10));

        $commonDiscount->update([
            'title' => $inputs['title'],
            'percentage' => $inputs['percentage'],
            'discount_ceiling' => $inputs['discount_ceiling'],
            'minimal_order_amount' => $inputs['minimal_order_amount'],
            'start_date' => $inputs['start_date'],
            'end_date' => $inputs['end_date'],
            'status' => $inputs['status']
        ]);
        return redirect()->route('admin.market.discount.commonDiscount')->with('swal-success', 'تخفیف شما با موفقیت ویرایش شد!');
    }

    public function commonDiscountDestroy(CommonDiscount $commonDiscount)
    {
        $commonDiscount->delete();
        return redirect()->route('admin.market.discount.commonDiscount')->with('swal-success', 'تخفیف شما با موفقیت حذف شد!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function amazingSale()
    {
        $amazingSales = AmazingSale::select('id', 'product_id', 'percentage', 'start_date', 'end_date', 'status')->orderBy('created_at', 'DESC')->simplePaginate(10);
        return view('admin.market.discount.amazingSale', ['amazingSales' => $amazingSales]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function amazingSaleCreate()
    {
        $products = Product::select('id', 'name')->get();
        return view('admin.market.discount.amazing-create', ['products' => $products]);
    }

    public function amazingSaleStore(AmazingSaleRequest $request)
    {
        $inputs = $request->only('product_id', 'percentage', 'start_date', 'end_date', 'status');
        $inputs['start_date'] = date("Y-m-d H:i:s", (int)substr($inputs['start_date'], 0, 10));
        $inputs['end_date'] = date("Y-m-d H:i:s", (int)substr($inputs['end_date'], 0, 10));

        $amazingSale = AmazingSale::create([
            'product_id' => $inputs['product_id'],
            'percentage' => $inputs['percentage'],
            'start_date' => $inputs['start_date'],
            'end_date' => $inputs['end_date'],
            'status' => $inputs['status']
        ]);
        return redirect()->route('admin.market.discount.amazingSale')->with('swal-success', 'فروش ویژه شما با موفقیت اضافه شد!');
    }

    public function amazingSaleEdit(AmazingSale $amazingSale)
    {
        return view('admin.market.discount.amazing-edit', ['amazingSale' => $amazingSale]);
    }

    public function amazingSaleUpdate(AmazingSaleRequest $request, AmazingSale $amazingSale)
    {
        $inputs = $request->only('product_id', 'percentage', 'start_date', 'end_date', 'status');
        $inputs['start_date'] = date("Y-m-d H:i:s", (int)substr($inputs['start_date'], 0, 10));
        $inputs['end_date'] = date("Y-m-d H:i:s", (int)substr($inputs['end_date'], 0, 10));

        $amazingSale->update([
            'product_id' => $inputs['product_id'],
            'percentage' => $inputs['percentage'],
            'start_date' => $inputs['start_date'],
            'end_date' => $inputs['end_date'],
            'status' => $inputs['status']
        ]);
        return redirect()->route('admin.market.discount.amazingSale')->with('swal-success', 'فروش ویژه شما با موفقیت ویرایش شد!');
    }

    public function amazingSaleDestroy(AmazingSale $amazingSale)
    {
        $amazingSale->delete();
        return redirect()->route('admin.market.discount.amazingSale')->with('swal-success', 'فروش ویژه شما با موفقیت حذف شد!');
    }

}
