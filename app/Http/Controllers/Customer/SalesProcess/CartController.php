<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use App\Models\Market\CartItem;
use App\Models\Market\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $cart = 0;
    }

    public function addToCart(Product $product, Request $request)
    {
        if (!\Auth::check()) {
            return redirect()->route('auth.customer.login-register-form');
        }
        $validated = $request->validate([
            'color' => ['nullable', 'exists:product_colors,id'],
            'guarantee' => ['nullable', 'exists:guarantees,id'],
            'number' => ['required', 'min:1', 'max:5'],
        ]);

        $userId = auth()->id();
        $colorId = $validated['color'] ?? null;
        $guaranteeId = $validated['guarantee'] ?? null;
        $number = $validated['number'];

        $cartItem = CartItem::where([['product_id', $product->id], ['user_id', $userId], ['color_id', $colorId], ['guarantee_id', $guaranteeId]])->first();
        if ($cartItem) {
            if (($cartItem->number + $number) > 5)
                return back()->with('alert-section-error', 'تعداد این محصول در سبد خرید شما نمیتواند بیشتر از ۵ باشد!');
            else {
              $cartItem->number += $number;
                $cartItem->save();
            }
        } else {
            // اگر نبود، آیتم جدید بساز
            CartItem::create([
                'user_id' => $userId,
                'product_id' => $product->id,
                'color_id' => $colorId,
                'guarantee_id' => $guaranteeId,
                'number' => $number,
            ]);
        }
        return back()->with('alert-section-success', 'محصول به سبد خرید اضافه شد');
    }

    public function updateCart(Request $request)
    {
    }


    public function removeFromCart(Request $request)
    {
    }
}
