<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\SalesProcess\ChooseAddressAndDeliveryRequest;
use App\Http\Requests\Customer\SalesProcess\StoreAddressRequest;
use App\Http\Requests\Customer\SalesProcess\UpdateAddressRequest;
use App\Models\Address;
use App\Models\Market\CartItem;
use App\Models\Market\Delivery;
use App\Models\Market\Order;
use App\Models\Province;
use Auth;

class AddressController extends Controller
{
    public function addressAndDelivery()
    {
        //check profile
        $user = Auth::user();
        $provinces = Province::all();
        $cartItems = CartItem::where('user_id', $user->id)->get();
        $deliveryMethods = Delivery::where('status', 1)->get();
        if (empty($cartItems->count())) {
            return redirect()->route('customer.sales-process.cart');
        }
        return view('customer.sales-process.address-and-delivery', ['cartItems' => $cartItems, 'user' => $user, 'provinces' => $provinces, 'deliveryMethods' => $deliveryMethods]);
    }

    public function getCities(Province $province)
    {
        $cities = $province->cities;
        if ($cities != null) {
            return response()->json(['status' => true, 'cities' => $cities]);
        } else {
            return response()->json(['status' => false, 'cities' => null]);
        }
    }

    public function addAddress(StoreAddressRequest $request)
    {
        $inputs = $request->only('province_id', 'city_id', 'address', 'postal_code', 'no', 'unit', 'receiver', 'recipient_first_name', 'recipient_last_name');
        $inputs['user_id'] = Auth::user()->id;
        $inputs['postal_code'] = convertPersianToEnglish($inputs['postal_code']);
        $address = Address::create(array_filter($inputs));
        return redirect()->back();
    }

    public function updateAddress(UpdateAddressRequest $request, Address $address)
    {
        $inputs = $request->all();
        $inputs['user_id'] = Auth::user()->id;
        $inputs['postal_code'] = convertPersianToEnglish($inputs['postal_code']);
        $address->update($inputs);
        return redirect()->back();
    }

    public function ChooseAddressAndDelivery(ChooseAddressAndDeliveryRequest $request)
    {
        $inputs = $request->only('address_id', 'delivery_id');
        $user = auth()->user();
        $inputs['user_id'] = $user->id;

        $cartItems = CartItem::where('user_id', $user->id)->get();
        $totalProductPrice = 0;
        $totalDiscount = 0;
        $totalFinalPrice = 0;
        $totalFinalDiscountPrice = 0;
        $totalFinalDiscountPriceWithNumbers = 0;

        foreach ($cartItems as $cartItem) {
            $totalProductPrice += $cartItem->cartItemProductPrice();
            $totalDiscount += $cartItem->cartItemProductDiscount();
            $totalFinalPrice += $cartItem->cartItemFinalPrice();
            $totalFinalDiscountPriceWithNumbers += $cartItem->cartItemFinalDiscount();
        }

        $inputs['order_final_amount'] = $totalFinalPrice;
        $inputs['order_discount_amount'] = $totalFinalDiscountPriceWithNumbers;
        $order = Order::updateOrCreate([
            'user_id' => $user->id,
            'order_status' => 0
        ], $inputs);
        return redirect()->route('customer.sales-process.payment');
    }

}
