<?php

use App\Http\Controllers\Admin\AdminController;
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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=>['isAdmin','auth','preventBackHistory']],function (){
    Route::get('/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
});
Route::group(['prefix'=>'user','middleware'=>['isUser','auth','preventBackHistory']],function (){
    Route::get('/dashboard',[UserController::class,'index'])->name('user.dashboard');
});
