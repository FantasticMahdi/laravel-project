<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Content\Banner;
use App\Models\Market\Brand;
use App\Models\Market\Product;

class HomeController extends Controller
{

    public function home()
    {
        $banners = Banner::where('status', 1)
            ->whereIn('position', [0, 1, 2, 3])
            ->get()
            ->groupBy('position');
        $slideShowImages = $banners->get(0, collect());
        $topBanners = $banners->get(1, collect())->take(2);
        $middleBanners = $banners->get(2, collect())->take(2);
        $bottomBanners = $banners->get(3, collect())->first();

        $brands = Brand::all();

        $mostVisitedProducts = Product::latest()->take(10)->get();
        $offerProducts = Product::latest()->take(10)->get();
        return view('customer.home', [
            'slideShowImages' => $slideShowImages,
            'topBanners' => $topBanners,
            'middleBanners' => $middleBanners,
            'bottomBanners' => $bottomBanners,
            'brands' => $brands,
            'mostVisitedProducts' => $mostVisitedProducts,
            'offerProducts' => $offerProducts
        ]);
    }
}
