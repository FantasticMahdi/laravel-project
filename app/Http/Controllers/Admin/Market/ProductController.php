<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\ProductRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Market\Brand;
use App\Models\Market\Product;
use App\Models\Market\ProductCategory;
use App\Models\Market\ProductMeta;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::select('id', 'name', 'image', 'brand_id', 'category_id', 'price', 'weight')->orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.market.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productCategories = ProductCategory::select('id', 'name')->get();
        $brands = Brand::select('id', 'persian_name')->get();
        return view('admin.market.product.create', ['productCategories' => $productCategories, 'brands' => $brands]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, ImageService $imageService)
    {
        $inputs = $request->only('name', 'category_id', 'brand_id', 'image', 'price', 'weight', 'length', 'width', 'height', 'introduction', 'tags', 'status', 'marketable', 'published_at', 'meta_key', 'meta_value');

        //date fix
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)substr($inputs['published_at'], 0, 10));

        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product');
            $result = $imageService->createIndexAndSave($request->file('image'));
        }

        if ($result === false) {
            return redirect()->route('admin.market.product.index')->with('swall-error', 'آپلود تصویر با خطا مواجه شد!');
        }
        $inputs['image'] = $result;
        DB::transaction(function () use ($inputs) {
            $product = Product::create([
                'name' => $inputs['name'],
                'category_id' => $inputs['category_id'],
                'brand_id' => $inputs['brand_id'],
                'weight' => $inputs['weight'],
                'length' => $inputs['length'],
                'width' => $inputs['width'],
                'height' => $inputs['height'],
                'price' => $inputs['price'],
                'introduction' => $inputs['introduction'],
                'status' => $inputs['status'],
                'marketable' => $inputs['marketable'],
                'tags' => $inputs['tags'],
                'published_at' => $inputs['published_at'],
                'image' => $inputs['image'],
            ]);

            $metas = array_combine($inputs['meta_key'], $inputs['meta_value']);
            foreach ($metas as $metaKey => $metaValue) {
                $meta = ProductMeta::create([
                    'meta_key' => $metaKey,
                    'meta_value' => $metaValue,
                    'product_id' => $product->id,
                ]);
            }
        });

        return redirect()->route('admin.market.product.index')->with('swal-success', 'محصول شما با موفقیت ساخته شد!');
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
        $productCategories = ProductCategory::select('id', 'name')->get();
        $brands = Brand::select('id', 'persian_name', 'original_name')->get();
        return view('admin.market.product.edit', ['product' => $product, 'productCategories' => $productCategories, 'brands' => $brands]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product, ImageService $imageService)
    {
        $inputs = $request->only('name', 'category_id', 'brand_id', 'image', 'price', 'weight', 'length', 'width', 'height', 'introduction', 'tags', 'status', 'marketable', 'published_at', 'meta_key', 'meta_value', 'currentImage');
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)substr($inputs['published_at'], 0, 10));
        if ($request->hasFile('image')) {
            if (!empty($product->image)) {
                $imageService->deleteDirectoryAndFiles($product->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.market.product.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد.');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['currentImage']) && !empty($product->image)) {
                $image = $product->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }
        $product->update([
            'name' => $inputs['name'],
            'category_id' => $inputs['category_id'],
            'brand_id' => $inputs['brand_id'],
            'weight' => $inputs['weight'],
            'length' => $inputs['length'],
            'width' => $inputs['width'],
            'height' => $inputs['height'],
            'price' => $inputs['price'],
            'introduction' => $inputs['introduction'],
            'status' => $inputs['status'],
            'marketable' => $inputs['marketable'],
            'tags' => $inputs['tags'],
            'published_at' => $inputs['published_at'],
            'image' => $inputs['image'],
        ]);
        $meta_keys = $request->meta_key;
        $meta_values = $request->meta_value;
        $meta_ids = array_keys($request->meta_key);
        $metas = array_map(function ($meta_id, $meta_key, $meta_value) {
            return array_combine(
                ['meta_id', 'meta_key', 'meta_value'],
                [$meta_id, $meta_key, $meta_value]
            );
        }, $meta_keys, $meta_values, $meta_ids);
        foreach ($metas as $meta)
            ProductMeta::where('id', $meta['meta_id'])->update([
                'meta_key' => $meta['meta_key'],
                'meta_value' => $meta['meta_value'],
            ]);
        return redirect()->route('admin.market.product.index')->with('swal-success', 'محصول شما با موفقیت ویرایش شد!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.market.product.index')->with('swal-success', 'محصول شما با موفقیت حذف شد!');
    }
}
