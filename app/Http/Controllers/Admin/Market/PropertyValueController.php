<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\CategoryValueRequest;
use App\Models\Market\CategoryAttribute;
use App\Models\Market\CategoryValue;

class PropertyValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryAttribute $categoryAttribute)
    {
        /*foreach($categoryAttribute->values as $value){
            dd($value->product);
        }*/
        return view('admin.market.property.value.index', ['categoryAttribute' => $categoryAttribute]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoryAttribute $categoryAttribute)
    {
        return view('admin.market.property.value.create', ['categoryAttribute' => $categoryAttribute]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryValueRequest $request, CategoryAttribute $categoryAttribute)
    {
        $inputs = $request->only('value', 'price_increase', 'product_id', 'type');
        $inputs['value'] = json_encode(['value' => $inputs['value'], 'price_increase' => $inputs['price_increase']]);
        $categoryValue = CategoryValue::create([
            'value' => $inputs['value'],
            'price_increase' => $inputs['price_increase'],
            'product_id' => $inputs['product_id'],
            'type' => $inputs['type'],
            'category_attribute_id' => $categoryAttribute->id,
        ]);
        return redirect()->route('admin.market.value.index', $categoryAttribute)->with('swal-success', 'ویژگی شما با موفقیت اضافه شد!');
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
    public function edit(CategoryAttribute $categoryAttribute, CategoryValue $value)
    {
        $value->value = json_decode($value->value);
        return view('admin.market.property.value.edit', ['categoryAttribute' => $categoryAttribute, 'value' => $value]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(categoryValueRequest $request, CategoryAttribute $categoryAttribute, CategoryValue $value)
    {
        $inputs = $request->only('value', 'price_increase', 'product_id', 'type');
        $inputs['value'] = json_encode(['value' => $inputs['value'], 'price_increase' => $inputs['price_increase']]);
        $value->update([
            'product_id' => $inputs['product_id'],
            'value' => $inputs['value'],
            'type' => $inputs['type'],
        ]);
        return redirect()->route('admin.market.value.index',$categoryAttribute)->with('swal-success','مقدار ویژگی با موفقیت ویرایش شد!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryAttribute $categoryAttribute, CategoryValue $value)
    {
        $value->delete();
        return redirect()->route('admin.market.value.index',$categoryAttribute)->with('swal-success','مقدار ویژگی با موفقیت حذف شد!');
    }
}
