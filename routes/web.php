<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Dashboard\ManufacturerController;
use App\Http\Controllers\Dashboard\Medicine\MedicineCategoryController;
use App\Http\Controllers\Dashboard\Medicine\MedicineUnitController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\UserController;
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

// Route::get('/', function () {
//     return view('frontend.index');
// });

// Route::get('/medicine/view','Dashboard\MedicineController@index');
// Route::get('/medicine/add','Dashboard\MedicineController@create');
// Route::post('/medicine/add','Dashboard\MedicineController@store');

Route::get('/', function () {
    // return view('welcome');
    return view('Auth.login');
});
// Route::get('/', function () {
//     return view('welcome');
// });
// For Medicine section

Route::prefix('medicine')->middleware('isAdmin')->group(function(){
    Route::get('/view','Dashboard\MedicineController@index');
    Route::get('/add','Dashboard\MedicineController@create');
    Route::post('/post','Dashboard\MedicineController@store');
});
// import and Export Medicine By Excell
Route::get('/import-medicine','Dashboard\MedicineController@importMedicine');
Route::get('/export','Dashboard\MedicineController@export');
Route::post('/import','Dashboard\MedicineController@import')->name('import');

// for Employee
Route::prefix('employee')->middleware('isAdmin')->group(function(){
    Route::get('/add','Dashboard\EmployeeController@create');
    Route::get('/view','Dashboard\EmployeeController@index');
    Route::post('/view','Dashboard\EmployeeController@store');
    Route::get('/edit/{id}','Dashboard\EmployeeController@edit');
    Route::get('/delete/{id}','Dashboard\EmployeeController@destroy');
    Route::post('/update/{id}','Dashboard\EmployeeController@update');
});


// pos Section

Route::get('/pos','user\POSController@index');


// Invoice Section
Route::get('/invoice','user\InvoiceController@index');

Route::prefix('/customar')->group(function(){
    Route::get('/add','Dashboard\CustomarController@create');
    Route::post('/store','Dashboard\CustomarController@store');
    Route::get('/view','Dashboard\CustomarController@index');
    Route::get('/edit/{id}','Dashboard\CustomarController@edit');
    Route::post('/update/{id}','Dashboard\CustomarController@update');
});

// Category section

Route::get('/category','Dashboard\CategoryController@index');
Route::get('/add/category','Dashboard\CategoryController@create');
Route::post('/store/category','Dashboard\CategoryController@store')->name('store.category');

// Manufacturer  section
Route::get('/manufacturer','Dashboard\ManufacturerController@index');

Auth::routes();
// Started Working 
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'admin','middleware'=>['isAdmin','auth','preventBackHistory']],function (){
    Route::get('/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
});
Route::group(['prefix'=>'user','middleware'=>['isUser','auth','preventBackHistory']],function (){
    Route::get('/dashboard',[UserController::class,'index'])->name('user.dashboard');
});
//  Route For Manufacturer
Route::middleware(['isAdmin','isUser']);
Route::prefix('manufacturer')->name('manufacturer.')->group(function(){
    Route::get('/view',[ManufacturerController::class,'index'])->name('index');
    Route::get('/add',[ManufacturerController::class,'create'])->name('create');
    Route::post('/store',[ManufacturerController::class,'store'])->name('store');
    Route::post('{id}/destroy',[ManufacturerController::class,'destroy'])->name('destroy');
    Route::get('{id}/edit',[ManufacturerController::class,'edit'])->name('edit');
    Route::put('{id}/update',[ManufacturerController::class,'update'])->name('update');
});
// Route For Medicine Category 
Route::prefix('medicineCategory')->name('medicineCategory.')->group(function(){
    Route::get('/view',[MedicineCategoryController::class,'index'])->name('index');
    Route::get('/add',[MedicineCategoryController::class,'create'])->name('create');
    Route::post('/store',[MedicineCategoryController::class,'store'])->name('store');
    Route::post('{id}/destroy',[MedicineCategoryController::class,'destroy'])->name('destroy');
    Route::get('{id}/edit',[MedicineCategoryController::class,'edit'])->name('edit');
    Route::put('{id}/update',[MedicineCategoryController::class,'update'])->name('update');
});
// Route For Medicine Unit
Route::prefix('medicineUnit')->name('medicineUnit.')->group(function(){
    Route::get('/view',[MedicineUnitController::class,'index'])->name('index');
    Route::get('/add',[MedicineUnitController::class,'create'])->name('create');
    Route::post('/store',[MedicineUnitController::class,'store'])->name('store');
    Route::post('{id}/destroy',[MedicineUnitController::class,'destroy'])->name('destroy');
    Route::get('{id}/edit',[MedicineUnitController::class,'edit'])->name('edit');
    Route::put('{id}/update',[MedicineUnitController::class,'update'])->name('update');
});
