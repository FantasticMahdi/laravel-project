<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\BrandRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Market\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::select('id', 'persian_name', 'original_name', 'logo', 'status')->simplePaginate(10);
        return view('admin.market.brand.index', ['brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.market.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request, ImageService $imageService)
    {
        $inputs = $request->only('original_name', 'persian_name', 'logo', 'status', 'tags');
        if ($request->hasFile('logo')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'brand');
            $result = $imageService->createIndexAndSave($request->file('logo'));
        }
        if ($result === false) {
            return redirect()->route('admin.market.brand.index')->with('swall-error', 'آپلود تصویر با خطا مواجه شد!');
        }
        $inputs['logo'] = $result;
        $brand = Brand::create([
            'original_name' => $inputs['original_name'],
            'persian_name' => $inputs['persian_name'],
            'logo' => $inputs['logo'],
            'status' => $inputs['status'],
            'tags' => $inputs['tags']
        ]);
        return redirect()->route('admin.market.brand.index')->with('swal-success', 'برند جدید شما با موفقیت ثبت شد!');
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
    public function edit(Brand $brand)
    {
        return view('admin.market.brand.edit', ['brand' => $brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, Brand $brand, ImageService $imageService)
    {
        $inputs = $request->only('original_name', 'persian_name', 'logo', 'status', 'tags','currentImage');
        if ($request->hasFile('logo')) {
            if (!empty($brand->logo)) {
                $imageService->deleteDirectoryAndFiles($brand->logo['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'brand');
            $result = $imageService->createIndexAndSave($request->file('logo'));
            if ($result === false) {
                return redirect()->route('admin.market.brand.index')->with('swall-error', 'آپلود تصویر با خطا مواجه شد!');
            }
            $inputs['logo'] = $result;
        } else {
            if (isset($inputs['currentImage']) && !empty($brand->logo)) {
                $image = $brand->logo;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['logo'] = $image;
            }
        }
        $brand->update([
            'original_name' => $inputs['original_name'],
            'persian_name' => $inputs['persian_name'],
            'logo' => $inputs['logo'],
            'status' => $inputs['status'],
            'tags' => $inputs['tags']
        ]);
        return redirect()->route('admin.market.brand.index')->with('swal-success', 'برند شما با موفقیت ویرایش شد!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $result = $brand->delete();
        return redirect()->route('admin.market.brand.index')->with('swal-success','برند شما با موفقیت حذف شد!');
    }
}
