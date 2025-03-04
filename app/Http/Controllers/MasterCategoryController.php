<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class MasterCategoryController extends Controller
{
    public function storecat(Request $request){
        $validate_data = $request->validate([
            'category_name' => 'unique:categories|max:100|min:5',
        ]);

        Category::create($validate_data);

        return redirect()->back()->with('success', 'Category Added Successfully');
    }

    public function show($id){
        $category_info = Category::find($id);
        return view('admin.category.edit', compact('category_info'));
    }
}
