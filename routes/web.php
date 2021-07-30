<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Dashboard\CustomarController;
use Illuminate\Support\Facades\Auth;

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
Route::get('/',function(){
    return view('auth.login');
});

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function(){
    Auth::routes();
});

Route::get('/home', 'HomeController@index')->name('home');


            // ==================Admin Authentication================

Route::group(['prefix'=>'admin','middleware'=>['isAdmin','auth','PreventBackHistory']],function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
});
// For Medicine section
Route::group(['prefix'=>'medicine','middleware'=>['isAdmin','auth','PreventBackHistory']],function(){
    Route::get('/add','Dashboard\MedicineController@create');
    Route::post('/post','Dashboard\MedicineController@store');
    Route::get('/view','Dashboard\MedicineController@index');
});
    // import and Export Medicine By Excell
Route::group(['middleware'=>['isAdmin','auth','PreventBackHistory']],function(){
        Route::get('/import-medicine','Dashboard\MedicineController@importMedicine');
        Route::get('/export','Dashboard\MedicineController@export');
        Route::post('/import','Dashboard\MedicineController@import')->name('import');
});
    // for Employee
Route::group(['prefix'=>'employee','middleware'=>['isAdmin','auth','PreventBackHistory']],function(){
    Route::get('/add','Dashboard\EmployeeController@create');
    Route::get('/view','Dashboard\EmployeeController@index');
    Route::post('/view','Dashboard\EmployeeController@store');
    Route::get('/edit/{id}','Dashboard\EmployeeController@edit');
    Route::get('/delete/{id}','Dashboard\EmployeeController@destroy');
    Route::post('/update/{id}','Dashboard\EmployeeController@update');
});
// Customar Section
Route::group(['middleware'=>['isAdmin','auth','PreventBackHistory']],function(){
    Route::get('/customar/view','Dashboard\CustomarController@index');
    Route::get('/customar/edit/{id}','Dashboard\CustomarController@edit');
    Route::post('/customar/update/{id}','Dashboard\CustomarController@update');
});
// Category section
Route::group(['middleware'=>['isAdmin','auth','PreventBackHistory']],function(){
    Route::get('/category/','Dashboard\CategoryController@index');
    Route::get('/add/category','Dashboard\CategoryController@create');
    Route::post('/store/category','Dashboard\CategoryController@store')->name('store.category');
// Manufacturer  section
    Route::get('/manufacturer','Dashboard\ManufacturerController@index');
});
            // ==============Admin Authentication Finish===================


            //====================== USer Authintication Routes==============

Route::group(['prefix'=>'user','middleware'=>['isUser','auth','PreventBackHistory']],function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::get('profile',[UserController::class,'profile'])->name('user.profile');
});

Route::group(['middleware'=>['isUser','auth','PreventBackHistory']],function(){
    // pos Section
        Route::get('/pos','user\POSController@index');
    // Invoice Section
        Route::get('/invoice','user\InvoiceController@index');
    // Emplyoee section
        Route::get('/employee/add','Dashboard\EmployeeController@create');
        Route::post('/employee/view','Dashboard\EmployeeController@store');
    // Cart Controller section
        Route::post('/add-cart','user\CartController@index');
        Route::post('/cart-update/{rowId}','user\CartController@CartUpdate');
        Route::get('/cart-remove/{rowId}','user\CartController@CartRemove');
        Route::post('/create-invoice','user\CartController@CreateInvoice');
        Route::post('/final-invoice','user\CartController@FinalInvoice');
});

          //==================== USer Authintication Finish ================


    // =====================Common Route For User And Admin======================

Route::group(['prefix'=>'customar','middleware'=>['auth','PreventBackHistory']],function(){
    Route::get('/add','Dashboard\CustomarController@create')->name('add');
    Route::post('/store','Dashboard\CustomarController@store');
});

  // =====================Common Route For User And Admin finis======================
