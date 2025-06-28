<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\SalesProcess\ProfileCompletionRequest;
use App\Models\Market\CartItem;

class ProfileCompletionController extends Controller
{
    public function profileCompletion()
    {
        $user = \Auth::user();
        $cartItems = CartItem::where('user_id', $user->id)->get();

        return view('customer.sales-process.profile-completion', ['cartItems' => $cartItems, 'user' => $user]);
    }

    public function profileUpdate(ProfileCompletionRequest $request)
    {
        $user = auth()->user();
        $inputs = [];

        // ✅ mobile
        if (isset($request->mobile) && empty($user->mobile)) {
            $mobile = convertPersianToEnglish($request->mobile);
            if (preg_match('/^(\+98|98|0)9\d{9}$/', $mobile)) {
                $mobile = ltrim($mobile, '0');
                $mobile = str_starts_with($mobile, '98') ? substr($mobile, 2) : $mobile;
                $mobile = str_replace('+98', '', $mobile);
                $inputs['mobile'] = $mobile;
            } else {
                return redirect()->back()->withErrors(['mobile' => 'فرمت شماره موبایل معتبر نمی‌باشد!']);
            }
        }

        // ✅ email
        if (isset($request->email) && empty($user->email)) {
            $inputs['email'] = convertPersianToEnglish($request->email);
        }

        // ✅ سایر فیلدها (با array_filter)
        $inputs += array_filter($request->only([
            'first_name',
            'last_name',
            'national_code',
        ]));
        if (!empty($inputs)) {
            $user->update($inputs);
        }

        return redirect()->route('customer.sales-process.address-and-delivery');
    }
}
