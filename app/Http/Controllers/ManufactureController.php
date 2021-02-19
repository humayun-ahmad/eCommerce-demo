<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// newly added
use Illuminate\support\Facades\Redirect;
use DB;
use Session;
session_start();

class ManufactureController extends Controller
{
    public function showManufectureForm()
    {
        // $this->AdminAuthCheck();
    	return view('admin.manufacture.add_manufacture');
    }

    public function store(Request $request)
    {
        // $this->AdminAuthCheck();
    	$data = array();

    	$data['manufacture_name'] = $request->manufacture_name;
    	$data['manufacture_description'] = $request->manufacture_description;
    	$data['publication_status'] = $request->publication_status;

    	DB::table('tbl_manufacture')->insert($data);

    	Session::put('message', 'Manufacture added successfully!');

    	return Redirect::to('/add/manufacture');
    }


    public function all_manufacture()
    {
        // $this->AdminAuthCheck();
    	$all_manufacture = DB::table('tbl_manufacture')
    			->get();

    	return view('admin.manufacture.all_manufacture')->with('all_manufacture',$all_manufacture);
    }


    public function inactive_manufacture($id)
    {
        // $this->AdminAuthCheck();
    	$data = DB::table('tbl_manufacture')->where('manufacture_id', $id)->update(['publication_status'=>0]);

    	return Redirect::to('/all/manufacture');
    }


    public function active_manufacture($id)
    {
        // $this->AdminAuthCheck();
    	$data = DB::table('tbl_manufacture')->where('manufacture_id', $id)->update(['publication_status'=>1]);
    	
    	return Redirect::to('/all/manufacture');
    }

    public function edit_manufacture($id)
    {
        // $this->AdminAuthCheck();
    	$manufacture = DB::table('tbl_manufacture')->where('manufacture_id',$id)->first();

    	return view('admin.manufacture.edit_manufacture')->with('manufacture', $manufacture);
    }

    public function update_manufacture(Request $request, $id)
    {
        // $this->AdminAuthCheck();
    	$data = array();

    	$data['manufacture_name'] = $request->manufacture_name;
    	$data['manufacture_description'] = $request->manufacture_description;
    	

    	DB::table('tbl_manufacture')->where('manufacture_id', $id)->update($data);

    	Session::put('message', 'manufacture updated successfully!');

    	return Redirect::to('/all/manufacture');


    }

    public function delete_manufacture($id)
    {
        // $this->AdminAuthCheck();
    	
    	DB::table('tbl_manufacture')->where('manufacture_id', $id)->delete();
    	return Redirect::to('/all/manufacture');
    }


    /*public function AdminAuthCheck()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return;
        }else{
            return Redirect::to('/backend')->send();
        }
    }*/


    
}
