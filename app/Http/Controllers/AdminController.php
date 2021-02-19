<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// newly added
use Illuminate\support\Facades\Redirect;
use DB;
use Session;
session_start();

class AdminController extends Controller
{
    public function index()
    {
        // $this->AdminAuthCheck();
    	return view('admin.admin_login');
    }
    


    public function dashboard(Request $request)
    {
        // $this->AdminAuthCheck();
    	$admin_email = $request->admin_email;
    	$admin_password = md5($request->admin_password);

    	$result = DB::table('tbl_admin')
    				->where('admin_email', $admin_email)
    				->where('admin_password', $admin_password)
    				->first();
    	
    	if($result){
    		Session::put('admin_name', $result->admin_name);
    		Session::put('admin_id', $result->admin_id);
    		return Redirect::to('/dashboard');
    	}
    	else{
    		Session::put('message', "Email or password invalid!");
    		return Redirect::to('/backend');
    	}
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
