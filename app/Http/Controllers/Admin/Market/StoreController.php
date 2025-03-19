<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\StoreRequest;
use App\Models\Market\Product;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::select('id', 'name', 'frozen_number', 'sold_number', 'marketable_number', 'image')->orderBy('created_at', 'desc')->simplePaginate(10);
        return view('admin.market.store.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToStore(Product $product)
    {
        return view('admin.market.store.add-to-store', ['product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Product $product)
    {
        $product->marketable_number += $request->marketable_number;
        $product->save();
        \Log::info("receiver => {$request->receiver}, deliverer => {$request->deliverer}, description => {$request->description}, add => {$request->marketable_number}");
        return redirect()->route('admin.market.store.index')->with('swal-success', 'موجودی با موفقیت اضافه شد!');
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
    public function edit(Product $product)
    {
        return view('admin.market.store.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Product $product)
    {
        $inputs = $request->only('marketable_number', 'sold_number', 'frozen_number');
        $product->update([
            'marketable_number' => $inputs['marketable_number'],
            'sold_number' => $inputs['sold_number'],
            'frozen_number' => $inputs['frozen_number']
        ]);
        return redirect()->route('admin.market.store.index')->with('swal-success', 'موجودی شما با موفقیت اصلاح شد!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
