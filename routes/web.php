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

Route::get('/', function () {
    return view('frontend.index');
});
// Route::get('/', function () {
//     return view('welcome');
// });
// For Medicine section
Route::get('/medicine/view','Dashboard\MedicineController@index');
Route::get('/medicine/add','Dashboard\MedicineController@create');
Route::post('/medicine/post','Dashboard\MedicineController@store');

// for Employee
Route::get('/employee/add','Dashboard\EmployeeController@create');
Route::get('/employee/view','Dashboard\EmployeeController@index');
Route::post('/employee/view','Dashboard\EmployeeController@store');
Route::get('/employee/edit/{id}','Dashboard\EmployeeController@edit');
Route::get('/employee/delete/{id}','Dashboard\EmployeeController@destroy');
Route::post('/employee/update/{id}','Dashboard\EmployeeController@update');

// pos Section

Route::get('/pos','user\POSController@index');


// Invoice Section
Route::get('/invoice','user\InvoiceController@index');


// Customar Section
Route::get('/customar/add','Dashboard\CustomarController@create');
Route::post('/customar/store','Dashboard\CustomarController@store');
Route::get('/customar/view','Dashboard\CustomarController@index');
Route::get('/customar/edit/{id}','Dashboard\CustomarController@edit');
Route::post('/customar/update/{id}','Dashboard\CustomarController@update');

// Category section
Route::get('/category/','Dashboard\CategoryController@index');

// Manufacturer  section
Route::get('/manufacturer','Dashboard\ManufacturerController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Cart Controller section
Route::post('/add-cart','user\CartController@index');
Route::post('/cart-update/{rowId}','user\CartController@CartUpdate');
Route::get('/cart-remove/{rowId}','user\CartController@CartRemove');
Route::post('/create-invoice','user\CartController@CreateInvoice');
