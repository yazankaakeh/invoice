<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Medical\MediaclController;
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



Route::prefix('medical_pay')->group(function () {
    ////// Family 
    Route::get('/show/medical_pay/{id}', "Payment\StudentPaymentController@show_medical")->middleware('auth')->name('pay.shows.medical');
    Route::get('/show/medical_pay', "Payment\StudentPaymentController@medical_ind")->middleware('auth')->name('show.medical.pay');
    Route::post('/store/medical_pay', "Payment\StudentPaymentController@store_medical")->name('pay.store.medical')->middleware('auth');
    Route::patch('/update/medical_pay', "Payment\StudentPaymentController@update_medical")->name('pay.update.medical')->middleware('auth');
    Route::delete('/destroy/medical_pay', "Payment\StudentPaymentController@destroy_medical")->name('pay.destroy.medical')->middleware('auth');
});








Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//Auth::routes(['register'=>false]);

Route::get('/index', function () {
    return view('index');
})->middleware('auth');

Route::get('/{page}', 'AdminController@index')->middleware('auth');



Route::get('/home', 'HomeController@index')->middleware('auth');

