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
    Route::get('/view','Dashboard\MedicineController@index');
    Route::get('/add','Dashboard\MedicineController@create');
    Route::post('/post','Dashboard\MedicineController@store');
    Route::get('/post/edit/{id}','Dashboard\MedicineController@edit');
    Route::post('/post/{id}/','Dashboard\MedicineController@update');
    Route::get('/post/delete/{id}','Dashboard\MedicineController@destroy');
    Route::get('/show/{id}','Dashboard\MedicineController@show');

});
    // import and Export Medicine By Excell
Route::group(['middleware'=>['isAdmin','auth','PreventBackHistory']],function(){
        Route::get('/import-medicine','Dashboard\MedicineController@importMedicine');

        Route::post('/import','Dashboard\MedicineController@import')->name('import');

        // Emplyoee section
        // Route::get('/employee/add','Dashboard\EmployeeController@create');
        // Route::post('/employee/view','Dashboard\EmployeeController@store');
        // Route::get('register',[UserController::class,'index']);
});
Route::group(['middleware'=>['isAdmin','auth']],function(){

    Route::get('/export','Dashboard\MedicineController@export');
});


    // for Employee
Route::group(['prefix'=>'employee','middleware'=>['isAdmin','auth','PreventBackHistory']],function(){

    Route::get('/view','UserController@view');

    Route::get('edit/{id}/','UserController@edit');

    Route::post('/{id}','UserController@update');

    Route::get('/delete/{id}','UserController@delete');

    // Route::get('/add','Dashboard\EmployeeController@create');
    // Route::post('/view','Dashboard\EmployeeController@store');
    // Route::get('/edit/{id}','Dashboard\EmployeeController@edit');
    // Route::get('/delete/{id}','Dashboard\EmployeeController@destroy');
    // Route::post('/update/{id}','Dashboard\EmployeeController@update');
});
// Customar Section
Route::group(['middleware'=>['isAdmin','auth','PreventBackHistory']],function(){

    Route::get('/customar/view','Dashboard\CustomarController@index');

    Route::get('/customar/edit/{id}','Dashboard\CustomarController@edit');

    Route::post('/customar/{id}','Dashboard\CustomarController@update');

    Route::get('/customar/delete/{id}','Dashboard\CustomarController@destroy');
});

// Category section
Route::group(['middleware'=>['isAdmin','auth','PreventBackHistory']],function(){

    Route::get('/category/','Dashboard\CategoryController@index');

    Route::get('/add/category','Dashboard\CategoryController@create');

    Route::post('/store/category','Dashboard\CategoryController@store')->name('store.category');

    Route::get('/category/edit/{id}','Dashboard\CategoryController@edit');

    Route::post('/category/{id}/','Dashboard\CategoryController@update');

    Route::get('/category/delete/{id}','Dashboard\CategoryController@destroy');

// Manufacturer  section
    Route::get('/manufacturer','Dashboard\ManufacturerController@index');

    // Report
    Route::get('/report/see','ReportController@index')->name('report.see');
    Route::post('/report','ReportController@Report')->name('report');
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

    // Cart Controller section
        Route::post('/add-cart','user\CartController@index');

        Route::post('/cart-update/{rowId}','user\CartController@CartUpdate');

        Route::get('/cart-remove/{rowId}','user\CartController@CartRemove');

        Route::post('/create-invoice','user\CartController@CreateInvoice');

        Route::post('/final-invoice','user\CartController@FinalInvoice');


});

          //==================== USer Authintication Finish ================


    // =====================Common Route For User And Admin======================

Route::group(['middleware'=>['auth','PreventBackHistory']],function(){
    Route::get('customar/add','Dashboard\CustomarController@create')->name('add');

    Route::post('customar','Dashboard\CustomarController@store');

    // Route::post('dashboard','Dashboard\CustomarController@Today_Sell');
    // Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');


// Employee Profile edit
    Route::get('{id}/edit','UserController@edit');

    Route::post('/{id}','UserController@update');

});

  // =====================Common Route For User And Admin finis======================

//    Route::get('/user/dashboard','OrderController@index');

// Route::get('cus/post','Dashboard\CustomarController@store');
