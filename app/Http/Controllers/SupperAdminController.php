<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// newly added
use Illuminate\support\Facades\Redirect;
use DB;
use Session;
session_start();

class SupperAdminController extends Controller
{

	public function index()
	{	
		// $this->AdminAuthCheck();
		return view('admin.admin_dashboard');
	}

    public function logout()
    {
    	// $this->AdminAuthCheck();
    	// Session::put('admin_name',null); // only admin_name will be null
    	// Session::put('admin_id', null); // only admin_id will be null

    	Session::flush(); // all session data will be null if we use Session::flush();
    	return Redirect::to('/backend');
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
