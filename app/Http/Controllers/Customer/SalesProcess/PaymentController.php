<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use App\Models\Market\Order;

class PaymentController extends Controller
{
    public function payment()
    {

        return view('customer.sales-process.payment');
    }
}
