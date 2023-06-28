<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function create() {
        $categoies = Category::orderBy('name','ASC')->get();
        $data['categoies'] = $categoies;
        return view('admin.sub_category.create');
    }
}
