<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Dashboard\Customer\CustomerController;
use App\Http\Controllers\Dashboard\ManufacturerController;
use App\Http\Controllers\Dashboard\Medicine\MedicineCategoryController;
use App\Http\Controllers\Dashboard\Medicine\MedicineController;
use App\Http\Controllers\Dashboard\Medicine\MedicineLeafController;
use App\Http\Controllers\Dashboard\Medicine\MedicineTypeController;
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


Route::get('/', function () {
    return view('Auth.login');
});

// for Employee
Route::prefix('employee')->middleware('isAdmin')->group(function(){
    Route::get('/add','Dashboard\EmployeeController@create');
    Route::get('/view','Dashboard\EmployeeController@index');
    Route::post('/view','Dashboard\EmployeeController@store');
    Route::get('/edit/{id}','Dashboard\EmployeeController@edit');
    Route::get('/delete/{id}','Dashboard\EmployeeController@destroy');
    Route::post('/update/{id}','Dashboard\EmployeeController@update');
});

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
// Route For Medicine Type 
Route::prefix('medicineType')->name('medicineType.')->group(function(){
    Route::get('/view',[MedicineTypeController::class,'index'])->name('index');
    Route::get('/add',[MedicineTypeController::class,'create'])->name('create');
    Route::post('/store',[MedicineTypeController::class,'store'])->name('store');
    Route::post('{id}/destroy',[MedicineTypeController::class,'destroy'])->name('destroy');
    Route::get('{id}/edit',[MedicineTypeController::class,'edit'])->name('edit');
    Route::put('{id}/update',[MedicineTypeController::class,'update'])->name('update');
});
// Route For Medicine Leaf 
Route::prefix('medicineLeaf')->name('medicineLeaf.')->group(function(){
    Route::get('/view',[MedicineLeafController::class,'index'])->name('index');
    Route::get('/add',[MedicineLeafController::class,'create'])->name('create');
    Route::post('/store',[MedicineLeafController::class,'store'])->name('store');
    Route::post('{id}/destroy',[MedicineLeafController::class,'destroy'])->name('destroy');
    Route::get('{id}/edit',[MedicineLeafController::class,'edit'])->name('edit');
    Route::put('{id}/update',[MedicineLeafController::class,'update'])->name('update');
});
// Route For Medicine 
Route::prefix('medicine')->name('medicine.')->group(function(){
    Route::get('/view',[MedicineController::class,'index'])->name('index');
    Route::get('/add',[MedicineController::class,'create'])->name('create');
    Route::post('/store',[MedicineController::class,'store'])->name('store');
    Route::post('{id}/destroy',[MedicineController::class,'destroy'])->name('destroy');
    Route::get('{id}/edit',[MedicineController::class,'edit'])->name('edit');
    Route::put('{id}/update',[MedicineController::class,'update'])->name('update');
});
// Route For Customer
Route::prefix('customer')->name('customer.')->group(function(){
    Route::get('/view',[CustomerController::class,'index'])->name('index');
    Route::get('/credit',[CustomerController::class,'credit'])->name('credit');
    Route::get('/paid',[CustomerController::class,'paid'])->name('paid');
    Route::get('/add',[CustomerController::class,'create'])->name('create');
    Route::post('/store',[CustomerController::class,'store'])->name('store');
    Route::post('{id}/destroy',[CustomerController::class,'destroy'])->name('destroy');
    Route::get('{id}/edit',[CustomerController::class,'edit'])->name('edit');
    Route::put('{id}/update',[CustomerController::class,'update'])->name('update');
});
