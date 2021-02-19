<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// newly added
use Illuminate\Support\Str;
use Illuminate\support\Facades\Redirect;
use DB;
use Session;
session_start();


class HomeController extends Controller
{
    // public function index()
    // {
    // 	return view('pages.home_content');
    // }

    public function index()
    {
    	
    	$all_product = DB::table('tbl_products')
    			->join('tbl_category', 'tbl_products.category_id', '=', 'tbl_category.category_id')
    			->join('tbl_manufacture', 'tbl_products.manufacture_id', '=', 'tbl_manufacture.manufacture_id')
    			->select('tbl_products.*', 'tbl_category.category_name', 'tbl_manufacture.manufacture_name')
    			->where('tbl_products.publication_status',1)
    			->limit(9)
    			->get();
    	// echo "<pre>";
    	// print_r($all_product);
    	return view('pages.home_content')->with('all_product',$all_product);
    }

    public function show_all_product_by_category($id)
    {
        $product_by_category = DB::table('tbl_products')
                ->join('tbl_category', 'tbl_products.category_id', '=', 'tbl_category.category_id')
                ->select('tbl_products.*', 'tbl_category.category_name' )
                ->where('tbl_category.category_id',$id)
                ->where('tbl_products.publication_status', 1)
                ->limit(18)
                ->get();
        // echo "<pre>";
        // print_r($product_by_category);
        return view('front_page.product_by_category')->with('product_by_category',$product_by_category);
    }

    public function show_all_product_by_manufacture($id)
    {
        $product_by_brand = DB::table('tbl_products')
                ->join('tbl_category', 'tbl_products.category_id', '=', 'tbl_category.category_id')
                ->join('tbl_manufacture', 'tbl_products.manufacture_id', '=', 'tbl_manufacture.manufacture_id')
                ->select('tbl_products.*', 'tbl_category.category_name', 'tbl_manufacture.manufacture_name')
                ->where('tbl_manufacture.manufacture_id', $id)
                ->where('tbl_products.publication_status',1)
                ->limit(18)
                ->get();
        // echo "<pre>";
        // print_r($product_by_brand);
        return view('front_page.product_by_brand')->with('product_by_brand',$product_by_brand);
    }

    public function view_product($id)
    {
        $one_product_details = DB::table('tbl_products')
                ->join('tbl_category', 'tbl_products.category_id', '=', 'tbl_category.category_id')
                ->join('tbl_manufacture', 'tbl_products.manufacture_id', '=', 'tbl_manufacture.manufacture_id')
                ->select('tbl_products.*', 'tbl_category.category_name', 'tbl_manufacture.manufacture_name')
                ->where('tbl_products.product_id', $id)
                ->where('tbl_products.publication_status',1)
                ->first();
        // echo "<pre>";
        // print_r($one_product_details);
        return view('pages.product.product_details')->with('product',$one_product_details);
    }


}
