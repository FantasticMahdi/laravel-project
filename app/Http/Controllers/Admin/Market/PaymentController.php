<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::select('id', 'amount', 'user_id', 'status', 'type', 'paymentable_type')->orderBy('created_at', 'desc')->simplePaginate(10);
        return view('admin.market.payment.index', ['payments' => $payments]);
    }

    public function online()
    {
        return view('admin.market.payment.index');
    }

    public function offline()
    {
        return view('admin.market.payment.index');
    }

    public function attendance()
    {
        return view('admin.market.payment.index');
    }

    public function confirm()
    {
        return view('admin.market.payment.index');
    }
}
