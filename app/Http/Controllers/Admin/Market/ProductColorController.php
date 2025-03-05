<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Product;
use App\Models\Market\ProductColor;
use Illuminate\Http\Request;

class ProductColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        return view('admin.market.product.color.index', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('admin.market.product.color.create', ['product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $validated = $request->validate([
            'color_name' => ['required', 'string'],
            'price_increase' => ['required', 'integer'],
            'status' => ['required', 'string', 'in:0,1'],
        ]);
        $inputs = $request->only(['color_name', 'price_increase', 'status']);
        $inputs['product_id'] = $product->id;
        $color = ProductColor::create([
            'color_name' => $inputs['color_name'],
            'price_increase' => $inputs['price_increase'],
            'product_id' => $inputs['product_id']
        ]);
        return redirect()->route('admin.market.color.index', $product)->with('swal-success', 'رنگ شما با موفقیت ثبت شد!');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, ProductColor $productColor)
    {
        $productColor->delete();
        return redirect()->route('admin.market.color.index', $product)->with('swal-success', 'رنگ شما با موفقیت حذف شد!');
    }
}
