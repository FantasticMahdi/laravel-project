<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use App\Models\Market\CartItem;
use Illuminate\Http\Request;

class ProfileCompletionController extends Controller
{
    public function profileCompletion()
    {
        $user = \Auth::user();
        $cartItems = CartItem::where('user_id', $user->id)->get();

        return view('customer.sales-process.profile-completion', ['cartItems' => $cartItems, 'user' => $user]);
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'first_name' => 'sometimes|required',
            'last_name' => 'sometimes|required',
            'email' => 'email|unique:users,email',
            'mobile' => 'sometimes|required|unique:users,mobile',
            'national_code' => 'sometimes|required|unique:users,national_code',
        ]);
        $inputs = $request->all();
        auth()->user()->update($inputs);
        return redirect()->route('customer.sales-process.address-and-delivery');
    }
}
