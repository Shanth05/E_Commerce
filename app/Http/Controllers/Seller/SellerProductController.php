<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerProductController extends Controller
{
    public function index()
    {
        $authuserid = Auth::id();
        $stores = Store::where('user_id', $authuserid )->get();
        return view('seller.product.create', compact('stores'));
    }

    public function manage()
    {
        return view('seller.product.manage');
    }

    public function storeproduct(Request $request)
    {
        $request->validate([
            'product_name'=>'required|string|max:100',
            'description'=>'nullable|string',
            'sku'=>'required|string|unique:products,sku',
            'category_id'=>'required|exists:categories,id',
            'subcategory_id'=>'nullable|exits:subcategories,id',
            'store_id'=>'required|exists:stores,id',
            'regular_price'=>'required|numeric|min:0',
            'discounted_price'=>'nullable|numeric|min:0',
            'tax_rate'=>'required|numeric|min:0|max:100',
            'stock_quantity'=>'required|integer|min:0',
            'images'=>'nullable|image|mimes:png,jpg,jpeg,gif|max:2048'
        ]);

        Product::create([
            'product_name'=>$request->product_name,
            'description'=>$request->description,
            'sku'=>$request->sku,
            'seller_id'=>Auth::id(),
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'store_id'=>$request->store_id,
            'regular_price'=>$request->regular_price,
            'discounted_price'=>$request->discounted_price,
            'tax_rate'=>$request->tax_rate,
            'stock_quantity'=>$request->stock_quantity,
            'slug'=>$request->slug,
            'meta_title'=>$request->meta_title,
            'meta_description'=>$request->meta_description,
             
        ]);
    }
}
