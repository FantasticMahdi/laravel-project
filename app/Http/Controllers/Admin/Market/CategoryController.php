<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\ProductCategoryRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Market\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategories = ProductCategory::select('id', 'name', 'description', 'slug', 'image', 'status', 'show_in_menu', 'tags', 'parent_id', 'created_at')->orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.market.category.index', ['productCategories' => $productCategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productCategories = ProductCategory::select('id', 'name')->where('parent_id', null)->get();
        return view('admin.market.category.create', ['productCategories' => $productCategories]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCategoryRequest $request, ImageService $imageService)
    {
        $inputs = $request->only('name', 'description', 'image', 'status', 'show_in_menu', 'tags', 'parent_id');
        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product_category');
            $result = $imageService->createIndexAndSave($request->file('image'));
        }
        if ($result === false) {
            return redirect()->route('admin.market.category.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد!');
        }
        $inputs['image'] = $result;
        $productCategory = ProductCategory::create([
            'name' => $inputs['name'],
            'description' => $inputs['description'],
            'image' => $inputs['image'],
            'status' => $inputs['status'],
            'show_in_menu' => $inputs['show_in_menu'],
            'tags' => $inputs['tags'],
            'parent_id' => $inputs['parent_id'],
        ]);
        return redirect()->route('admin.market.category.index')->with('swal-success', 'دسته بندی شما با موفقیت ساخته شد!');
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
    public function edit(ProductCategory $productCategory)
    {
        $parentCategories = ProductCategory::select('id', 'name')
            ->where([['parent_id', null],['id','<>',$productCategory->id]])->get();
        return view('admin.market.category.edit', ['productCategory' => $productCategory, 'parentCategories' => $parentCategories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCategoryRequest $request, ProductCategory $productCategory, ImageService $imageService)
    {
        $inputs = $request->only('name', 'description', 'image', 'status', 'show_in_menu', 'tags', 'parent_id','currentImage');

        if ($request->hasFile('image')) {
            if (!empty($productCategory->image)) {
                $imageService->deleteDirectoryAndFiles($productCategory->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product-category');

            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.market.category.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد.');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['currentImage']) && !empty($productCategory->image)) {
                $image = $productCategory->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }

        $productCategory->update([
           'name' => $inputs['name'],
           'description' => $inputs['description'],
           'image' => $inputs['image'] ?? $productCategory->image,
           'status' => $inputs['status'],
           'show_in_menu' => $inputs['show_in_menu'],
           'tags' => $inputs['tags'],
           'parent_id' => $inputs['parent_id'],
        ]);
        return redirect()->route('admin.market.category.index')->with('swal-success','دسته بندی شما با موفقیت ویرایش شد!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();
        return redirect()->route('admin.market.category.index')->with('swal-success','دسته بندی شما با موفقیت حذف شد!');
    }
}
