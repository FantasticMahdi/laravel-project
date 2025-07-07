<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use App\Models\Market\CartItem;
use App\Models\Market\Product;
use Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        if (!Auth::check()) {
            return redirect()->route('auth.customer.login-register-form');
        }
        $cartItems = CartItem::where('user_id', Auth::user()->id)->get();
        if ($cartItems->count() <= 0) {
        return redirect()->back();
        }
        $relatedProducts = Product::all();
        return view('customer.sales-process.cart', ['cartItems' => $cartItems, 'relatedProducts' => $relatedProducts]);
    }

    public function addToCart(Product $product, Request $request)
    {
        if (!Auth::check()) {
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
        $numbers = $request->input('number');
        $cartItems = CartItem::whereIn('id', array_keys($numbers))
            ->where('user_id', Auth::id())->get();
        foreach ($cartItems as $cartItem) {
            $newQuantity = $numbers[$cartItem->id];
            if ($cartItem->number != $newQuantity) {
                $cartItem->update(['number' => $newQuantity]);
            }
        }
        return redirect()->route('customer.sales-process.address-and-delivery');
    }


    public function removeFromCart(Request $request, CartItem $cartItem)
    {
        if ($cartItem->user_id === Auth::user()->id)
            $cartItem->delete();
        return back();
    }
}
