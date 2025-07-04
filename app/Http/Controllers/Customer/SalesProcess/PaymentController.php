<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use App\Models\Market\CartItem;
use App\Models\Market\Coupon;
use App\Models\Market\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment()
    {
        $user = auth()->user();
        $cartItems = CartItem::where('user_id', $user->id)->get();
        $order = Order::where([['user_id', $user->id], ['order_status', 0]])->first();
        return view('customer.sales-process.payment', ['cartItems' => $cartItems, 'order' => $order]);
    }

    public function couponDiscount(Request $request)
    {
        $request->validate([
            'coupon' => 'required|string',
        ]);

        $coupon = Coupon::where([
            ['code', $request->coupon],
            ['status', 1],
            ['end_date', '>', now()],
            ['start_date', '<', now()]
        ])->first();
        if ($coupon != null) {
            if ($coupon->user_id != null) {
                $coupon = Coupon::where([
                    ['code', $request->coupon],
                    ['status', 1],
                    ['end_date', '>', now()],
                    ['start_date', '<', now()],
                    ['user_id', auth()->user()->id]
                ])->first();
                if ($coupon == null) {
                    return redirect()->back();
                }
            }
        } else {
            return redirect()->back();
        }

        $order = Order::where([
            ['user_id', auth()->user()->id],
            ['order_status', 0],
            ['coupon_id', null]
        ])->first();
        if ($order) {
            if ($coupon->amount_type == 0) {
                $couponDiscountAmount = $order->order_final_amount * ($coupon->amount / 100);
                if ($couponDiscountAmount > $coupon->discount_ceiling)
                    $couponDiscountAmount = $coupon->discount_ceiling;
            } else
                $couponDiscountAmount = $coupon->amount;

            $order->order_final_amount = $order->order_final_amount - $couponDiscountAmount;

            $finalDiscount = $order->order_total_product_discount_amount + $couponDiscountAmount;
            $order->update([
                'coupon_id' => $coupon->id,
                'order_coupon_discount_amount' => $couponDiscountAmount,
                'order_total_product_discount_amount' => $finalDiscount
            ]);

            return redirect()->back();
        } else
            return redirect()->back();
    }
}
