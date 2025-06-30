<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\SalesProcess\StoreAddressRequest;
use App\Models\Address;
use App\Models\Market\CartItem;
use App\Models\Province;

class AddressController extends Controller
{
    public function addressAndDelivery()
    {
        //check profile
        $user = \Auth::user();
        $provinces = Province::all();
        $cartItems = CartItem::where('user_id', $user->id)->get();
        if (empty($cartItems->count())) {
            return redirect()->route('customer.sales-process.cart');
        }
        return view('customer.sales-process.address-and-delivery', ['cartItems' => $cartItems, 'user' => $user, 'provinces' => $provinces]);
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
        $inputs['user_id'] = \Auth::user()->id;
        $address = Address::create(array_filter($inputs));
        return redirect()->back();
    }


}
