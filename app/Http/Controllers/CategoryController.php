<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// newly added
use Illuminate\support\Facades\Redirect;
use DB;
use Session;
session_start();

class CategoryController extends Controller
{
    public function showCategoryForm()
    {
        // $this->AdminAuthCheck();
    	return view('admin.category.add_category');
    }

    public function all_category()
    {
        // $this->AdminAuthCheck();
    	$all_category = DB::table('tbl_category')
    			->get();

    	return view('admin.category.all_category')->with('all_category',$all_category);
    }

    public function store(Request $request)
    {
        // $this->AdminAuthCheck();

    	$data = array();

    	$data['category_name'] = $request->category_name;
    	$data['category_description'] = $request->category_description;
    	$data['publication_status'] = $request->publication_status;

    	DB::table('tbl_category')->insert($data);

    	Session::put('message', 'Category added successfully!');

    	return Redirect::to('/add-category');


    }

    public function inactive_category($id)
    {
        // $this->AdminAuthCheck();
    	$data = DB::table('tbl_category')->where('category_id', $id)->update(['publication_status'=>0]);

    	return Redirect::to('/all-category');
    }

    public function active_category($id)
    {
        // $this->AdminAuthCheck();
    	$data = DB::table('tbl_category')->where('category_id', $id)->update(['publication_status'=>1]);
    	
    	return Redirect::to('/all-category');
    }

    public function edit_category($id)
    {
        // $this->AdminAuthCheck();
    	$category = DB::table('tbl_category')->where('category_id',$id)->first();

    	return view('admin.category.edit_category')->with('category', $category);
    }

    public function update(Request $request, $id)
    {
        // $this->AdminAuthCheck();
    	$data = array();

    	$data['category_name'] = $request->category_name;
    	$data['category_description'] = $request->category_description;
    	

    	DB::table('tbl_category')->where('category_id', $id)->update($data);

    	Session::put('message', 'Category updated successfully!');

    	return Redirect::to('/all-category');


    }

    public function delete_category($id)
    {

        // $this->AdminAuthCheck();
    	DB::table('tbl_category')->where('category_id', $id)->delete();

    	return Redirect::to('/all-category');
    }

    // public function AdminAuthCheck()
    // {
    //     $admin_id = Session::get('admin_id');
    //     if($admin_id){
    //         return;
    //     }else{
    //         return Redirect::to('/backend')->send();
    //     }
    // }


}
