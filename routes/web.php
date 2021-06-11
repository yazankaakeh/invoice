<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Medical\MediaclController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Payment\Student_Payment;

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
    Route::get('invoices', "InvoiceController@index")->middleware('auth');
    //////////////////////////////////// Payment


    Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    });


    Route::get('/', 'HomeController@index')->middleware('auth');

    //Auth::routes(['verify' => true]);
    Auth::routes(['register'=>false]);

    Route::get('/index', 'HomeController@index')->middleware('auth');

    Route::get('/{page}', 'AdminController@index')->middleware('auth');

    Route::get('/home', 'HomeController@index')->middleware('auth');

