<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\DeliveryRequest;
use App\Models\Market\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveryMethods = Delivery::select('id', 'name', 'amount', 'delivery_time', 'delivery_time_unit', 'status')->get();
        return view('admin.market.delivery.index', ['deliveryMethods' => $deliveryMethods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.market.delivery.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeliveryRequest $request)
    {
        $inputs = $request->only('name', 'amount', 'delivery_time', 'delivery_time_unit');
        $delivery = Delivery::create([
            'name'=> $inputs['name'],
            'amount'=> $inputs['amount'],
            'delivery_time'=> $inputs['delivery_time'],
            'delivery_time_unit'=> $inputs['delivery_time_unit'],
        ]);
        return redirect()->route('admin.market.delivery.index')->with('swal-success', 'روش ارسال جدید با موفقیت اضافه شد');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delivery)
    {
        return view('admin.market.delivery.edit', ['delivery' => $delivery]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(DeliveryRequest $request, Delivery $delivery)
    {
        $inputs = $request->only('name', 'amount', 'delivery_time', 'delivery_time_unit');
        $delivery->update([
            'name'=> $inputs['name'],
            'amount'=> $inputs['amount'],
            'delivery_time'=> $inputs['delivery_time'],
            'delivery_time_unit'=> $inputs['delivery_time_unit'],
        ]);
        return redirect()->route('admin.market.delivery.index')->with('swal-success','روش ارسال با موفقیت ویرایش شد!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
        return redirect()->route('admin.market.delivery.index')->with('swal-success','روش ارسال با موفقیت حذف شد!');
    }

    public function status(Delivery $delivery)
    {
        $delivery->status = $delivery->status == 0 ? 1 : 0;
        $result = $delivery->save();
        if ($result) {
            if ($delivery->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
