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

        return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function showcat($id){
        $category_info = Category::find($id);
        return view('admin.category.edit', compact('category_info'));
    }

    public function updatecat(Request $request, $id){
        $Category= Category::findOrFail($id);
        $validate_data = $request->validate([
            'category_name' => 'unique:categories|max:100|min:5',
        ]);

        $Category->update($validate_data);
        return redirect()->back()->with('message', 'Category Updated Successfully');
    }

    public function deletecat($id){
       Category::findOrFail($id)->delete();

        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }
}
