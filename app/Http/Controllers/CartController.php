<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// newly added
use Illuminate\Support\Str;
use Illuminate\support\Facades\Redirect;
use DB;
use Session;
session_start();

class CartController extends Controller
{
    public function index(Request $request)
    {
    	$quantity = $request->quantity;

    	$product_id = $request->product_id;

    	$product_information = DB::table('tbl_products')->where('product_id', $product_id)->first();


    	$data = array();

    	$data['id'] = $product_id;
    	$data['name'] = $product_information->product_name;
    	$data['quantity'] = $quantity;
    	$data['price'] = $product_information->product_price;
    	$data['option']['image'] = $product_information->product_image;


    	 
    	echo "<pre>";
    	print_r($product_information);
    	// return view('pages.cart.add_to_cart');
    }
}
