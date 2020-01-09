<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;

class CategoryController extends Controller
{
    public function add_category()
    {
        return view('admin.add_category');
    }

    public function save_category(Request $request)
    {
        $data = array();
        $data['category_name'] = $request -> category_name;
        $data['category_description'] = $request -> category_description;
        
         DB :: table('categories') -> insert($data);
         Session :: put('save_message','Category added successfully!!!');
         return Redirect :: to('/admin/all-category');
    }

    public function all_category()
    {
        $categories = DB :: table('categories') -> paginate(10);

        return view('admin.all_category') -> with('all_category',$categories);
    }

    public function edit_category($category_id)
    {
        $category = DB :: table('categories')
                    ->where('category_id',$category_id)
                    ->first();

        return view('admin.edit_category') -> with('category',$category);
    }

    public function update_category(Request $request,$category_id)
    {
        $data = array();
        $data['category_name'] = $request -> category_name;
        $data['category_description'] = $request -> category_description;

         DB :: table('categories')
               ->where('category_id',$category_id)
               ->update($data);
        Session :: put('save_message','Category update successfully!!!');
        return Redirect :: to('/admin/all-category');
    }

    public function delete_category($category_id)
    {
         DB :: table('categories')
               ->where('category_id',$category_id)
               ->delete();
         Session :: put('save_message','Category deleted successfully!!!');
         return Redirect :: to('/admin/all-category');
    }
}
