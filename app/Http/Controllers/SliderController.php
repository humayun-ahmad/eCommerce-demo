<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// newly added
use Illuminate\Support\Str;
use Illuminate\support\Facades\Redirect;
use DB;
use Session;
session_start();


class SliderController extends Controller
{
    public function index()
    {
    	return view('admin.slider.add_slider');
    }
    public function store(Request $request)
    {
 		$data = array();
 		$data['publication_status'] = $request->publication_status;

    	$image = $request->file('slider_image');

		if($image){
			$image_name = Str::random(40);
			$extention_name = strtolower($image->getClientOriginalExtension());
			$image_full_name = $image_name.'.'.$extention_name;
			$upload_path = 'slider_image/';

			$image_url = $upload_path.$image_full_name;
			$success = $image->move($upload_path,$image_full_name);

			if($success){
				$data['slider_image'] = $image_url;
				
				DB::table('tbl_slider')->insert($data);
				Session::put('message', 'Data inserted successfully!');
				return Redirect::to('/add/slider');
			}

		}
				$data['slider_image'] = '';
				Session::put('message', 'Data inserted without image successfully!');
				DB::table('tbl_slider')->insert($data);
				return Redirect::to('/add/slider');
    }

    public function all_slider()
    {
    	$all_slider = DB::table('tbl_slider')->get();

		return view('admin.slider.all_slider')->with('all_slider',$all_slider);
    }


    public function inactive_slider($id)
    {
    	// $this->AdminAuthCheck();
    	$data = DB::table('tbl_slider')->where('slider_id', $id)->update(['publication_status'=>0]);

    	// echo "<pre>";
    	// print_r($data);
    	return Redirect::to('/all/slider');
    }

    public function active_slider($id)
    {
    	// $this->AdminAuthCheck();
    	$data = DB::table('tbl_slider')->where('slider_id', $id)->update(['publication_status'=>1]);
    	
    	return Redirect::to('/all/slider');
    }

    public function delete_slider($id)
    {

    	// $this->AdminAuthCheck();
    	DB::table('tbl_slider')->where('slider_id', $id)->delete();

    	return Redirect::to('/all/slider');
    }
    
}
