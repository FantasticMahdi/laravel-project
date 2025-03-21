<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\CashPayment;
use App\Models\Market\OfflinePayment;
use App\Models\Market\OnlinePayment;
use App\Models\Market\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::select('id', 'amount', 'user_id', 'status', 'type', 'paymentable_type','paymentable_id')->orderBy('created_at', 'desc')->simplePaginate(10);
        return view('admin.market.payment.index', ['payments' => $payments]);
    }

    public function online()
    {
        $payments = Payment::select('id','amount','user_id','status','type','paymentable_id','paymentable_type')->where('paymentable_type', OnlinePayment::class)->orderBy('created_at', 'desc')->simplePaginate(10);
        return view('admin.market.payment.index',['payments' => $payments]);
    }

    public function offline()
    {
        $payments = Payment::select('id','amount','user_id','status','type','paymentable_id','paymentable_type')->where('paymentable_type', OfflinePayment::class)->orderBy('created_at', 'desc')->simplePaginate(10);
        return view('admin.market.payment.index', ['payments' => $payments]);
    }

    public function cash()
    {
        $payments = Payment::select('id','amount','user_id','status','type','paymentable_id','paymentable_type')->where('paymentable_type', CashPayment::class)->orderBy('created_at', 'desc')->simplePaginate(10);
        return view('admin.market.payment.index',['payments' => $payments]);
    }

    public function canceled(Payment $payment)
    {
        $payment->status = 2;
        $payment->save();
        return redirect()->back()->route('admin.market.payment.index')->with('swal-success','وضعیت پرداخت با موفقیت تغییر کرد!');
    }

    public function returned(Payment $payment)
    {
        $payment->status = 3;
        $payment->save();
        return redirect()->back()->with('swal-success','وضعیت پرداخت با موفقیت تغییر کرد!');
    }

    public function show(Payment $payment)
    {
        return view('admin.market.payment.show',['payment' => $payment]);
    }
}
