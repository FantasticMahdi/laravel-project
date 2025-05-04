<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Customer\LoginRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class LoginRegisterController extends Controller
{
    public function loginRegisterForm(){
        return view('customer.auth.login-register');
    }

    public function loginRegister(LoginRegisterRequest $request){
        $inputs = $request->only('id');
        if (filter_var($inputs['id'], FILTER_VALIDATE_EMAIL)) {
            $type = 1; // => email
            $user = User::where('email', $inputs['id'])->first();
            if (empty($user)){
                $newUser['email'] = $inputs['id'];
            }
        }

        //check id is mobile or not
        elseif (preg_match('/^(\+98|98|0)9\d{9}$', $inputs['id'])) {
            $type = 0; // 0 => mobile;

            // all mobile numbers are in on format 9** *** ***
            $inputs['id'] = ltrim($inputs['id'], '0');
            $inputs['id'] = substr($inputs['id'], 0,2) === '98' ? substr($inputs['id'], 2) : $inputs['id'];
            $inputs['id'] = str_replace('+98', '', $inputs['id']);

            $user = User::where('phone', $inputs['id'])->first();
            if (empty($user)){
                $newUser['mobile'] = $inputs['id'];
            }
        }

        else{
            $errorText = 'شناسه ورودی شما نه شماره موبایل است نه ایمیل';
            return redirect()->route('auth.customer.login-register-form')->withErrors(['id' => $errorText]);
        }
    }
}
