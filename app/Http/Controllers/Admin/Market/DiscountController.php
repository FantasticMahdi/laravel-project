<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\AmazingSaleRequest;
use App\Http\Requests\Admin\Market\CommonDiscountRequest;
use App\Models\Market\AmazingSale;
use App\Models\Market\CommonDiscount;
use App\Models\Market\Product;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function coupon()
    {
        return view('admin.market.discount.coupon');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function couponCreate()
    {
        return view('admin.market.discount.create-coupon');
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
            'status' => $inputs['status'],
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
            'status' => $inputs['status'],
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
            'status' => $inputs['status'],
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
            'status' => $inputs['status'],
        ]);
        return redirect()->route('admin.market.discount.amazingSale')->with('swal-success', 'فروش ویژه شما با موفقیت ویرایش شد!');
    }

    public function amazingSaleDestroy(AmazingSale $amazingSale)
    {
        $amazingSale->delete();
        return redirect()->route('admin.market.discount.amazingSale')->with('swal-success', 'فروش ویژه شما با موفقیت حذف شد!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
