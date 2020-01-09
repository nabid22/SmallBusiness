<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Str;
use Session;
class ProductController extends Controller
{
    public function add_product()
    {
        $categories = DB :: table('categories') -> get();
        return view('admin.add_product') -> with('categories',$categories);
    }

    public function save_product(Request $request)
    {
        $data = array();
        $data['brand_name'] = $request -> brand_name;
        $data['item_price'] = $request -> item_price;
        $data['item_description'] = $request -> item_description;
        $data['category_id'] = $request -> category_id;
        $image = $request ->file('item_image');

        if($image)
        {
            
            $image_name = Str :: random(20);
            $extension = strtolower($image -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'bookImage/';
            $image_url = $upload_path.$image_full_name;
            $success = $image -> move($upload_path,$image_full_name);

            if($success)
            {
                $data['item_image'] = $image_url;
                DB :: table('products')->insert($data);
                Session :: put('save_message','Product saved successfully!!!');
                return Redirect :: to('/admin/all-products');
            }
        }
         
        $data['item_image'] = '';
            DB :: table('products')->insert($data);
            Session :: put('save_message','Product saved successfully!!!');
        return Redirect :: to('/admin/all-products');
    }

    public function all_products()
    {
        $all_brands = DB :: table('products')
                     ->join('categories','products.category_id','=','categories.category_id')
                     ->select('products.*','categories.category_name')
                     ->paginate(10);
        return view('admin.all_products') -> with('all_brands',$all_brands);
    }

    public function delete_product($menu_id)
    {
         DB :: table('products')
             ->where('menu_id',$menu_id)
             ->delete();
        Session :: put('save_message','Product deleted successfully!!!');
        return Redirect :: to('/admin/all-products');
    }

    public function edit_product($menu_id)
    {
        $brand_info = DB :: table('products')
                     ->join('categories','products.category_id','=','categories.category_id')
                     ->select('products.*','categories.category_name')
                     ->where('menu_id',$menu_id)
                     ->first();

        $categories = DB :: table('categories') -> get();

        return view('admin.edit_product',['brand_info' => $brand_info,'categories' => $categories]);
    }

    public function update_product(Request $request,$menu_id)
    {
        $data = array();
        $data['brand_name'] = $request -> brand_name;
        $data['item_price'] = $request -> item_price;
        $data['item_description'] = $request -> item_description;
        $data['category_id'] = $request -> category_id;
        $image = $request ->file('item_image');
        
        if($image)
        {
            $image_name = Str :: random(20);
            $extension = strtolower($image -> getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $extension;
            $upload_path = 'bookImage/';
            $image_url = $upload_path.$image_full_name;
            $success = $image -> move($upload_path,$image_full_name);

            if($success)
            {
                $data['item_image'] = $image_url;
                DB :: table('products')
                ->where('menu_id',$menu_id)
                ->update($data);
                Session :: put('save_message','Product updated successfully!!!');
                return Redirect :: to('/admin/all-products');
            }
        }
        else
        {
            DB :: table('products')
            ->where('menu_id',$menu_id)
            ->update($data);
            Session :: put('save_message','Product updated successfully!!!');
            return Redirect :: to('/admin/all-products');
        }
        
    }

    public function get_products()
    {
        $products = DB :: table('products')
                     ->join('categories','products.category_id','=','categories.category_id')
                     ->select('products.*')
                     ->paginate(12);
        return view('all_products_view',['products' => $products]);
    }

    public function asce_order_by_name()
    {
        $products = DB :: table('products')
        ->join('categories','products.category_id','=','categories.category_id')
        ->select('products.*')
        ->orderBy('brand_name','asc')
        ->paginate(12);
        return view('all_products_view',['products' => $products]);
    }
    public function asce_order_by_price()
    {
        $products = DB :: table('products')
        ->join('categories','products.category_id','=','categories.category_id')
        ->select('products.*')
        ->orderBy('item_price','asc')
        ->paginate(12);
        return view('all_products_view',['products' => $products]);
    }
    public function desc_order_by_name()
    {
        $products = DB :: table('products')
        ->join('categories','products.category_id','=','categories.category_id')
        ->select('products.*')
        ->orderBy('brand_name','desc')
        ->paginate(12);
        return view('all_products_view',['products' => $products]);
    }
    public function desc_order_by_price()
    {
        $products = DB :: table('products')
        ->join('categories','products.category_id','=','categories.category_id')
        ->select('products.*')
        ->orderBy('item_price','desc')
        ->paginate(12);
        return view('all_products_view',['products' => $products]);
    }
    public function get_product_by_keyword(Request $request)
    {
        $keyword = $request -> product_name;
        Session :: put('keyword',$keyword);
        return Redirect :: to('/products-by-keyword');
    }

    public function get_single_product($product_id)
    {
        $product = DB :: table('products')
                   ->join('categories','categories.category_id','=','products.category_id')
                   ->where('menu_id',$product_id)
                   ->select('products.*','categories.category_name')
                   ->first();
        $category_id = DB :: table('products')
                      ->where('menu_id',$product_id)
                      ->first();

        $related_items = DB :: table('products')
                      ->where('category_id',$category_id -> category_id)
                      ->get();
        return view('single_product',['device' => $product,'related_items' => $related_items]);
    }

    public function helper_function()
    {
      
        $keyword = Session :: get('keyword');
        $products = DB :: table('products')
        ->join('categories','products.category_id','=','categories.category_id')
        ->where('brand_name','like','%'.$keyword.'%')
        ->orWhere('categories.category_name','like','%'.$keyword.'%')
        ->paginate(12);
        return view('all_products_view',['products' => $products]);
    }
}