<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\BannerRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Content\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::select('id', 'title', 'image', 'url', 'status','position')->orderBy('created_at', 'desc')->simplePaginate(10);
        $positions = Banner::$positions;
        return view('admin.content.banner.index', ['banners' => $banners, 'positions' => $positions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Banner::$positions;
        return view('admin.content.banner.create', ['positions' => $positions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request, ImageService $imageService)
    {
        $inputs = $request->only('title', 'image', 'status', 'url', 'position');


        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'banner');
            $result = $imageService->save($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.content.banner.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        $banner = Banner::create([
            'title' => $inputs['title'],
            'image' => $inputs['image'],
            'status' => $inputs['status'],
            'url' => $inputs['url'],
            'position' => $inputs['position'],
        ]);
        return redirect()->route('admin.content.banner.index')->with('swal-success', 'بنر  جدید شما با موفقیت ثبت شد');
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
    public function edit(Banner $banner)
    {
        $positions = Banner::$positions;
        return view('admin.content.banner.edit', ['banner' => $banner, 'positions' => $positions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, Banner $banner, ImageService $imageService)
    {
        $inputs = $request->only('title', 'image', 'status', 'url', 'position');

        if ($request->hasFile('image')) {
            if (!empty($banner->image)) {
                $imageService->deleteDirectoryAndFiles($banner->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'banner');
            $result = $imageService->save($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.content.banner.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['currentImage']) && !empty($banner->image)) {
                $image = $banner->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }
        $banner->update([
            'title' => $inputs['title'],
            'image' => $inputs['image'] ?? $banner->image,
            'status' => $inputs['status'],
            'url' => $inputs['url'],
            'position' => $inputs['position'],
        ]);
        return redirect()->route('admin.content.banner.index')->with('swal-success', 'بنر  شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $result = $banner->delete();
        return redirect()->route('admin.content.banner.index')->with('swal-success', 'بنر  شما با موفقیت حذف شد');
    }

    public function status(Banner $banner)
    {
        $banner->status = $banner->status == 0 ? 1 : 0;
        $result = $banner->save();
        if ($result) {
            if ($banner->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
