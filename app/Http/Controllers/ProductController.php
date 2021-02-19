<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// newly added
use Illuminate\Support\Str;
use Illuminate\support\Facades\Redirect;
use DB;
use Session;
session_start();

class ProductController extends Controller
{
    public function showProductForm()
    {
    	
    	return view('admin.product.add_product');

    }

    public function store(Request $request)
    {
    	// $this->AdminAuthCheck();
    	$data = array();
		$data['product_name'] = $request->product_name;
		$data['category_id'] = $request->category_id;
		$data['manufacture_id'] = $request->manufacture_id;
		$data['product_short_description'] = $request->product_short_description;
		$data['product_long_description'] = $request->product_long_description;
		$data['product_price'] = $request->product_price;
		$data['product_size'] = $request->product_size;
		$data['product_color'] = $request->product_color;
		$data['publication_status'] = $request->publication_status;
		$image = $request->file('product_image');

		if($image){
			$image_name = Str::random(40);
			$extention_name = strtolower($image->getClientOriginalExtension());
			$image_full_name = $image_name.'.'.$extention_name;
			$upload_path = 'image/';

			$image_url = $upload_path.$image_full_name;
			$success = $image->move($upload_path,$image_full_name);

			if($success){
				$data['product_image'] = $image_url;
				
				DB::table('tbl_products')->insert($data);
				Session::put('message', 'Data inserted successfully!');
				return Redirect::to('/add/product');
			}

		}
				$data['product_image'] = '';
				Session::put('message', 'Data inserted without image successfully!');
				DB::table('tbl_products')->insert($data);
				return Redirect::to('/add/product');

    }

    public function all_product()
    {
    	// $this->AdminAuthCheck();
    	$all_product = DB::table('tbl_products')
    			->join('tbl_category', 'tbl_products.category_id', '=', 'tbl_category.category_id')
    			->join('tbl_manufacture', 'tbl_products.manufacture_id', '=', 'tbl_manufacture.manufacture_id')
    			->select('tbl_products.*', 'tbl_category.category_name', 'tbl_manufacture.manufacture_name')
    			->get();
    	// echo "<pre>";
    	// print_r($all_product);
    	return view('admin.product.all_product')->with('all_product',$all_product);
    }

    public function inactive_product($id)
    {
    	// $this->AdminAuthCheck();
    	$data = DB::table('tbl_products')->where('product_id', $id)->update(['publication_status'=>0]);

    	// echo "<pre>";
    	// print_r($data);
    	return Redirect::to('/all/product');
    }

    public function active_product($id)
    {
    	// $this->AdminAuthCheck();
    	$data = DB::table('tbl_products')->where('product_id', $id)->update(['publication_status'=>1]);
    	
    	return Redirect::to('/all/product');
    }

    public function delete_product($id)
    {

    	// $this->AdminAuthCheck();
    	DB::table('tbl_products')->where('product_id', $id)->delete();

    	return Redirect::to('/all/product');
    }


    // public function AdminAuthCheck()
    // {
    // 	$admin_id = Session::get('admin_id');
    // 	if($admin_id){
    // 		return;
    // 	}else{
    // 		return Redirect::to('/backend')->send();
    // 	}
    // }

}
