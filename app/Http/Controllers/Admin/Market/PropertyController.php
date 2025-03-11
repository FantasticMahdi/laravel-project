<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\CategoryAttributeRequest;
use App\Models\Market\CategoryAttribute;
use App\Models\Market\ProductCategory;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_attributes = CategoryAttribute::select('id', 'name', 'category_id', 'unit')->with('category:name,id')->orderBy('created_at', 'desc')->simplePaginate(10);
//        dd($category_attributes);
        return view('admin.market.property.index', ['category_attributes' => $category_attributes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_categories = ProductCategory::select('id', 'name')->orderBy('created_at', 'desc')->get();
        return view('admin.market.property.create', ['product_categories' => $product_categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryAttributeRequest $request)
    {
        $inputs = $request->only('name', 'category_id', 'unit');
        $property = CategoryAttribute::create([
            'name' => $inputs['name'],
            'category_id' => $inputs['category_id'],
            'unit' => $inputs['unit'],
        ]);
        return redirect()->route('admin.market.property.index')->with('swal-success', 'ویژگی با موفقیت ساخته شد!');
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
    public function edit(CategoryAttribute $categoryAttribute)
    {
        $product_categories = ProductCategory::select('id', 'name')->orderBy('created_at', 'desc')->get();
        return view('admin.market.property.edit', ['category_attribute' => $categoryAttribute, 'product_categories' => $product_categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryAttributeRequest $request, CategoryAttribute $categoryAttribute)
    {
        $inputs = $request->only('name', 'category_id', 'unit');
        $categoryAttribute->update([
            'name' => $inputs['name'],
            'category_id' => $inputs['category_id'],
            'unit' => $inputs['unit'],
        ]);
        return redirect()->route('admin.market.property.index')->with('swal-success', 'ویژگی با موفقیت ویرایش شد!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryAttribute $categoryAttribute)
    {
        $categoryAttribute->delete();
        return redirect()->route('admin.market.property.index')->with('swal-success', 'ویژگی با موفقیت حذف شد!');
    }
}
