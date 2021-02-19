<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// frontend
Route::get('/','HomeController@index');


// backend

// AdminController
Route::get('/backend','AdminController@index');
Route::get('/dashboard','SupperAdminController@index');
Route::post('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');


// SupperAdminController
Route::get('/logout', 'SupperAdminController@logout')->name('admin.logout');


// Category related route:
Route::get('/add-category', 'CategoryController@showCategoryForm');
Route::get('/all-category', 'CategoryController@all_category');
Route::post('/store/category', 'CategoryController@store')->name('save.category');
Route::get('/inactive_category/{id}', 'CategoryController@inactive_category');
Route::get('/active_category/{id}', 'CategoryController@active_category');
Route::get('/edit-category/{id}', 'CategoryController@edit_category');
Route::post('/update/category/{id}', 'CategoryController@update');
Route::get('/delete/category/{id}', 'CategoryController@delete_category');





// Brand or Manufecture
Route::get('/add/manufacture', 'ManufactureController@showManufectureForm');
Route::post('/store/manufacture', 'ManufactureController@store')->name('save.manufacture');
Route::get('/all/manufacture', 'ManufactureController@all_manufacture');
Route::get('/inactive_manufacture/{id}', 'ManufactureController@inactive_manufacture');
Route::get('/active_manufacture/{id}', 'ManufactureController@active_manufacture');
Route::get('/edit/manufacture/{id}', 'ManufactureController@edit_manufacture');
Route::post('/update/manufacture/{id}', 'ManufactureController@update_manufacture');
Route::get('/delete/manufacture/{id}', 'ManufactureController@delete_manufacture');



// Products related route here
Route::get('/add/product', 'ProductController@showProductForm');
Route::post('/store/product', 'ProductController@store')->name('save.product');
Route::get('/all/product', 'ProductController@all_product');

Route::get('/inactive_product/{id}', 'ProductController@inactive_product');
Route::get('/active_product/{id}', 'ProductController@active_product');
Route::get('/edit/product/{id}', 'ProductController@edit_product');
Route::post('/update/product/{id}', 'ProductController@update_product');
Route::get('/delete/product/{id}', 'ProductController@delete_product');

// product view releted route here
Route::get('/view-product/{id}', 'HomeController@view_product');


// Slider related route here
Route::get('/add/slider', 'SliderController@index');
Route::get('/all/slider', 'SliderController@all_slider');
Route::post('/store/slider', 'SliderController@store')->name('save.slider');

Route::get('/inactive_slider/{id}', 'SliderController@inactive_slider');
Route::get('/active_slider/{id}', 'SliderController@active_slider');
Route::get('/delete/slider/{id}', 'SliderController@delete_slider');


// Show category wise product here
Route::get('/product-by-category/{id}', 'HomeController@show_all_product_by_category');


// Show brand wise product here
Route::get('/product-by-manufacture/{id}', 'HomeController@show_all_product_by_manufacture');

// Cart Related route here
Route::post('/add-to-cart', 'CartController@index');















