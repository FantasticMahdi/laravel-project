<?php

namespace App\Http\Controllers\Customer\Market;

use App\Http\Controllers\Controller;
use App\Models\Content\Comment;
use App\Models\Market\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function product(Product $product)
    {
        $relatedProducts = Product::all();
        $product->load([
            'images',
            'colors',
            'guarantees',
            'amazingSales',
            'values.attribute',
            'metas',
            'activeComments.user',
        ]);
        return view('customer.market.product.product', ['relatedProducts' => $relatedProducts, 'product' => $product]);
    }

    public function addComment(Product $product, Request $request)
    {
        $request->validate([
            'body' => 'required|max:2000',
        ]);

        $inputs['body'] = str_replace(PHP_EOL, '<br/>', $request->body);
        $inputs['author_id'] = \Auth::user()->id;
        $inputs['commentable_id'] = $product->id;
        $inputs['commentable_type'] = Product::class;
        Comment::create([
            'body' => $inputs['body'],
            'author_id' => $inputs['author_id'],
            'commentable_id' => $inputs['commentable_id'],
            'commentable_type' => $inputs['commentable_type'],
        ]);
        return back()->with('swal-success', 'نظر شما با موفقیت ثبت شد و بعد از تایید ادمین نمایش داده میشود!');
    }

    public function addToFavorites(Product $product)
    {
        if (Auth::check()) {
            $product->user()->toggle([Auth::user()->id]);
            if ($product->user->contains(Auth::user()->id)) {
                return response()->json(['status' => 1]);
            } else {
                return response()->json(['status' => 2]);
            }
        } else {
            return response()->json(['status' => 3]);
        }
    }
}
