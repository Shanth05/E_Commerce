<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class MasterCategoryController extends Controller
{
    public function storecat(Request $request){
        $validate_data = $request->validate([
            'category_name' => 'unique:categories|max:100|min:10',
        ]);

        Category::create($validate_data);

        return redirect()->back();
    }
}
