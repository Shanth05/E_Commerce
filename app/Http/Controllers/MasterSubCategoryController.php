<?php

namespace App\Http\Controllers;
use App\Models\Subcategory;

use Illuminate\Http\Request;

class MasterSubCategoryController extends Controller
{
    public function storesubcat(Request $request)
    {
       $validate_data = $request->validate([
        'subcategory_name' => 'unique:sub_categories|max:100|min:5',
        'category_id' => 'required|exists:categories,id',
       ]);

       Subcategory::create($validate_data);
    
       return redirect()->back()->with('message', 'Sub Category Added Successfully');
    }
}
