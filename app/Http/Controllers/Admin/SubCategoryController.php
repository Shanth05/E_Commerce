<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $catagories = Category::all();
        return view('admin.sub_category.create', compact('catagories'));
    }

    public function manage()
    {
        return view('admin.sub_category.manage');
    }
}
