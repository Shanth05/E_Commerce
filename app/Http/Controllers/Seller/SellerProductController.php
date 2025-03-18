<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Store;
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
            'category_id'=>'required|exits:categories,id',
            'subcategory_id'=>'nullable|exits:subcategories,id',
            'store_id'=>'required|exits:stores,id',
            'regular_price'=>'required|numeric|min:0',
            'discounted_price'=>'nullable|numeric|min:0',
            'tax_rate'=>'required|numeric|min:0|max:100',
            'stock_quantity'=>'required|integer|min:0',
            'images'=>'nullable|image|mimes:png,jpg,jpeg,gif|max:2048'
        ]);
    }
}
