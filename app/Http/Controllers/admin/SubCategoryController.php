<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    public function index(Request $request ){
        $subCategories = SubCategory::select('sub_categories.*','categories.name as categoryName')
        ->latest('sub-categories.id')
        ->leftJoin('categories','categories.id','sub_category_id');

        if(!empty($request->get('keyword'))) {
            $subCategories = $subCategories->where('sub-categories.name','like','%'.'%'.$request->get('keyword').'%');
            $subCategories = $subCategories->orwhere('categories.name','like','%'.'%'.$request->get('keyword').'%');  
        }
        $subCategories = $subCategories->paginate(10);
        return view('admin.category.list',compact('categories'));
    }
    public function create() {
        $categoies = Category::orderBy('name','ASC')->get();
        $data['categoies'] = $categoies;
        return view('admin.sub_category.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'slug'=>'required|unique:sub_categaries',
            'catagory_id'=>'required',
            'status'=>'required',

        ]);

        if($validator->passes()){
            $subCategory=new Subcategory();
            $subCategory->name= $request->name;
            $subCategory->slug= $request->slug;
            $subCategory->status= $request->status;
            $subCategory->category= $request->catagory;
            $subCategory->save();

            $request->session()->flash('success','Sub Category created successfully. ');

            return response([
                'status'=>true,
                'message'=>'Sub Catagory created successfully.'
            ]);

        }else{
            return response([
                'status'=>false,
                'errors'=>$validator->errors()
            ]);
        }
    }

    public function edit($id, Request $request){
        
    }
}
