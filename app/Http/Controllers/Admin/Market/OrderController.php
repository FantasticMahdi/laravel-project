<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Order;

class OrderController extends Controller
{
    public function all()
    {
        $orders = Order::all();
        return view('admin.market.order.index', ['orders' => $orders]);
    }

    public function newOrders()
    {
        $orders = Order::where('order_status', 0)->orderBy('created_at', 'desc')->simplePaginate(10);

        $orderIds = $orders->pluck('id')->toArray();

        Order::whereIn('id', $orderIds)->update(['order_status' => 1]);
        return view('admin.market.order.index', ['orders' => $orders]);
    }

    public function sending()
    {
        $orders = Order::where('delivery_status', 1)->orderBy('created_at', 'desc')->simplePaginate(10);
        return view('admin.market.order.index', ['orders' => $orders]);
    }

    public function unpaid()
    {
        $orders = Order::where('payment_status', 0)->orderBy('created_at', 'desc')->simplePaginate(10);
        return view('admin.market.order.index', ['orders' => $orders]);
    }

    public function canceled()
    {
        $orders = Order::where('order_status', 4)->orderBy('created_at', 'desc')->simplePaginate(10);
        return view('admin.market.order.index', ['orders' => $orders]);
    }

    public function returned()
    {
        $orders = Order::where('order_status', 5)->orderBy('created_at', 'desc')->simplePaginate(10);
        return view('admin.market.order.index', ['orders' => $orders]);
    }

    public function show()
    {
        return view('admin.market.order.index');
    }

    public function changeSendStatus(Order $order)
    {
        switch ($order->delivery_status) {
            case 0:
                $order->delivery_status = 1;
                break;
            case 1:
                $order->delivery_status = 2;
                break;
            case 2:
                $order->delivery_status = 3;
                break;
            default:
                $order->delivery_status = 0;
                break;
        }
        $order->save();
        return back();
    }

    public function changeOrderStatus(Order $order)
    {
        switch ($order->order_status) {
            case 1:
                $order->order_status = 2;
                break;
            case 2:
                $order->order_status = 3;
                break;
            case 3:
                $order->order_status = 4;
                break;
            case 4:
                $order->order_status = 5;
                break;
            default:
                $order->order_status = 1;
                break;
        }
        $order->save();
        return back();
    }

    public function cancelOrder(Order $order)
    {
        $order->order_status = 4;
        $order->save();
        return back();
    }
}
