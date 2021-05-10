<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Medical\MediaclController;
use App\Http\Controllers\Payment\Student_Payment;



Route::prefix('medical')->group(function () {
    Route::get('show', "medical\medicalController@index")->name('medical.show')->middleware('auth');
    Route::post('store', "medical\medicalController@store")->name('medical.store')->middleware('auth');
    Route::patch('update', "medical\medicalController@update")->name('medical.update')->middleware('auth');
    Route::delete('update', "medical\medicalController@destroy")->name('medical.destroy')->middleware('auth');
    Route::get('register', "medical\medicalController@register")->name('medical.register')->middleware('auth');
    Route::get('enable', "medical\medicalController@enable")->name('medical.enable')->middleware('auth');
    Route::get('/add/student', "medical\medicalController@add_student")->name('medical.student.add')->middleware('auth');
    Route::get('disable', "medical\medicalController@disable")->name('medical.disable')->middleware('auth');
    Route::get('/show/student/{id}/', "medical\medicalController@show_student")->name('medical.student.show')->middleware('auth');
    Route::delete('/destroy/student/', "medical\medicalController@detroy_student")->name('student.medical.destroy')->middleware('auth');
});

Route::prefix('address_medical')->group(function () {
    Route::get('show', "Publics\AddressController@index_medical")->name('address.medical.show')->middleware('auth');
    Route::post('store', "Publics\AddressController@store_medical_address")->name('address.medical.store')->middleware('auth');
    Route::get('/show/{id}', "Publics\AddressController@show_medical")->middleware('auth');
    Route::patch('/update', "Publics\AddressController@update_medical")->name('address.medical.update')->middleware('auth');
    Route::delete('/delete', "Publics\AddressController@destroy_medical")->name('address.medical.destroy')->middleware('auth');
});

Route::prefix('medical_pay')->group(function () {
    ////// medical 
    Route::get('/show/medical', "Payment\StudentPaymentController@medical_ind")->middleware('auth')->name('show.medical.pay');
    Route::post('/store/medical', "Payment\StudentPaymentController@store_medical")->name('pay.store.medical')->middleware('auth');
    Route::patch('/update/medical', "Payment\StudentPaymentController@update_medical")->name('pay.update.medical')->middleware('auth');
    Route::get('/show/medical/{id}', "Payment\StudentPaymentController@show_medical")->middleware('auth')->name('pay.shows.medical');
    Route::delete('/destroy/medical', "Payment\StudentPaymentController@destroy_medical")->name('pay.destroy.medical')->middleware('auth');
});

Route::prefix('job_medical')->group(function () {
    Route::get('/show/medical/', "Publics\JobController@index_medical")->name('job.show.medical')->middleware('auth');
    Route::post('/store/medical/', "Publics\JobController@store_medical")->name('job.medical.store')->middleware('auth');
    Route::patch('/update/medical/', "Publics\JobController@update_medical")->name('job.update.medical')->middleware('auth');
    Route::get('/show/medical/{id}', "Publics\JobController@show_medical")->middleware('auth');
    Route::delete('/delete/medical/', "Publics\JobController@destroy_medical")->name('job.destroy.medical')->middleware('auth');
});

Route::prefix('husband_Wife_medical_medical')->group(function () {
    Route::get('show', "Publics\HusbandandWifeController@index_medical")->name('husband_Wife.show.medical')->middleware('auth');
    Route::post('store', "Publics\HusbandandWifeController@store_medical_husband_wife")->name('husband_Wife.medical.store')->middleware('auth');
    Route::patch('update', "Publics\HusbandandWifeController@update_medical")->name('husband_Wife.update.medical')->middleware('auth');
    Route::get('/show/{id}', "Publics\HusbandandWifeController@show_medical")->middleware('auth');
    Route::delete('destroy', "Publics\HusbandandWifeController@destroy_medical")->name('husband_Wife.destroy.medical')->middleware('auth');
});

Route::prefix('children_medical')->group(function () {
    /////////////////////////////////////medical
    Route::get('/show/child', "Publics\childrenController@index_medical")->name('children.show.medical')->middleware('auth');
    Route::delete('/delete/medical', "Publics\childrenController@delete_medical")->name('children.delete.medical')->middleware('auth');
    Route::post('/store/medical', "Publics\childrenController@store_medical_children")->name('children.store.medical')->middleware('auth');
    Route::patch('/update/medical', "Publics\childrenController@update_medical")->name('children.update.medical')->middleware('auth');
    Route::get('/show/child/medical/{id}', "Publics\childrenController@show_medical")->middleware('auth');
});

Route::prefix('father_and_mother_medical')->group(function () {
    Route::patch('/update/medical/', "Publics\FatherandMotherController@medical_edit")->name('FatherandMother.update.medical')->middleware('auth');
    Route::get('/show', "Publics\FatherandMotherController@index_medical")->name('FatherandMother.show.medical')->middleware('auth');
    Route::post('store', "Publics\FatherandMotherController@store_medical")->name('FatherandMother.medical.store')->middleware('auth');
    Route::get('/show/{id}', "Publics\FatherandMotherController@show_medical")->middleware('auth');
    Route::delete('/destroy/medical', "Publics\FatherandMotherController@destroy_medical")->name('FatherandMother.destroy.medical')->middleware('auth');
});

Route::prefix('Medical_Statu_Medical')->group(function () {
    Route::get('/show', "Publics\MedicalStatusController@index_medical")->name('Medical_Statu.show.medical')->middleware('auth');
    Route::post('/store', "Publics\MedicalStatusController@store_medical")->name('Medical_Statu.medical.store')->middleware('auth');
    Route::patch('/update', "Publics\MedicalStatusController@update_medical")->name('Medical_Statu.update.medical')->middleware('auth');
    Route::get('/show/{id}', "Publics\MedicalStatusController@show_medical")->middleware('auth');
    Route::delete('/delete', "Publics\MedicalStatusController@destroy_medical")->name('Medical_Statu.destroy.medical')->middleware('auth');
});
