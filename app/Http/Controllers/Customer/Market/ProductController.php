<?php

namespace App\Http\Controllers\Customer\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Product;

class ProductController extends Controller
{
    public function product(Product $product)
    {
        $relatedProducts = Product::all();
        $product->load([
            'images',
            'colors',
            'guarantees',
            'brand',
            'category'
        ]);
        return view('customer.market.product.product', ['relatedProducts' => $relatedProducts, 'product' => $product]);
    }

    public function addComment()
    {

    }
}
