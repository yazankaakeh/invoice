<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Medical\MediaclController;
use App\Http\Controllers\Payment\Student_Payment;



Route::prefix('income')->group(function () {
    Route::get('/show', "Payment\IncomeController@index")->name('income.show')->middleware('auth');
    Route::post('/store', "Payment\IncomeController@store")->name('income.store')->middleware('auth');
    Route::get('/show/{id}', "Payment\IncomeController@show")->middleware('auth');
    Route::patch('/update', "Payment\IncomeController@update")->name('income.update')->middleware('auth');
    Route::delete('/delete', "Payment\IncomeController@destroy")->name('income.destroy')->middleware('auth');
});



///////////////////////////////////////// Payments
Route::prefix('pay')->group(function () {
    // Student
    Route::get('show', "Payment\StudentPaymentController@index")->name('pay.show')->middleware('auth');
    Route::post('store', "Payment\StudentPaymentController@storestudent")->name('pay.student.store')->middleware('auth');
    Route::patch('update', "Payment\StudentPaymentController@update")->name('pay.update')->middleware('auth');
    Route::get('/show/{id}', "Payment\StudentPaymentController@show")->middleware('auth')->name('pay.shows');
    Route::delete('destroy', "Payment\StudentPaymentController@destroy")->name('pay.destroy')->middleware('auth');

});

Route::prefix('medical_pay')->group(function () {
    ////// medical 
    Route::get('/show/medical', "Payment\StudentPaymentController@medical_ind")->middleware('auth')->name('show.medical.pay');
    Route::post('/store/medical', "Payment\StudentPaymentController@store_medical")->name('pay.store.medical')->middleware('auth');
    Route::patch('/update/medical', "Payment\StudentPaymentController@update_medical")->name('pay.update.medical')->middleware('auth');
    Route::get('/show/medical/{id}', "Payment\StudentPaymentController@show_medical")->middleware('auth')->name('pay.shows.medical');
    Route::delete('/destroy/medical', "Payment\StudentPaymentController@destroy_medical")->name('pay.destroy.medical')->middleware('auth');
});

Route::prefix('Family_pay')->group(function () {
    ////// Family 
    Route::get('/show/family', "Payment\StudentPaymentController@family_ind")->middleware('auth')->name('show.family.pay');
    Route::post('/store/family', "Payment\StudentPaymentController@store_family")->name('pay.store.family')->middleware('auth');
    Route::patch('/update/family', "Payment\StudentPaymentController@update_family")->name('pay.update.family')->middleware('auth');
    Route::get('/show/family/{id}', "Payment\StudentPaymentController@show_family")->middleware('auth')->name('pay.shows.family');
    Route::delete('/destroy/family', "Payment\StudentPaymentController@destroy_familys")->name('pay.destroy.family')->middleware('auth');
});

######################################################################

//////////////////////////////// Family Pay
Route::prefix('Family_usd')->group(function () {
    ////// Family 
    Route::get('/show/family/usd', "Payment\UsdController@family_ind_usd")->middleware('auth')->name('usd.family.pay');
    Route::post('/store/family/usd', "Payment\UsdController@store_family_usd")->name('usd.store.family')->middleware('auth');
    Route::patch('/update/family/usd', "Payment\UsdController@update_family_usd")->name('usd.update.family')->middleware('auth');
    Route::get('/show/family/usd/{id}', "Payment\UsdController@show_family_usd")->middleware('auth')->name('usd.shows.family');
    Route::delete('/destroy/family/usd', "Payment\UsdController@destroy_familys_usd")->name('usd.destroy.family')->middleware('auth');
});

Route::prefix('Family_euro')->group(function () {
    ////// Family 
    Route::get('/show/family/euro', "Payment\EuroController@family_ind_euro")->middleware('auth')->name('euro.family.pay');
    Route::post('/store/family/euro', "Payment\EuroController@store_family_euro")->name('euro.store.family')->middleware('auth');
    Route::patch('/update/family/euro', "Payment\EuroController@update_family_euro")->name('euro.update.family')->middleware('auth');
    Route::get('/show/family/euro/{id}', "Payment\EuroController@show_family_euro")->middleware('auth')->name('euro.shows.family');
    Route::delete('/destroy/family/euro', "Payment\EuroController@destroy_familys_euro")->name('euro.destroy.family')->middleware('auth');
});

Route::prefix('Family_tr')->group(function () {
    ////// Family 
    Route::get('/show/family/tr', "Payment\TrController@family_ind_tr")->middleware('auth')->name('tr.family.pay');
    Route::post('/store/family/tr', "Payment\TrController@store_family_tr")->name('tr.store.family')->middleware('auth');
    Route::patch('/update/family/tr', "Payment\TrController@update_family_tr")->name('tr.update.family')->middleware('auth');
    Route::get('/show/family/tr/{id}', "Payment\TrController@show_family_tr")->middleware('auth')->name('tr.shows.family');
    Route::delete('/destroy/family/tr', "Payment\TrController@destroy_familys_tr")->name('tr.destroy.family')->middleware('auth');
});

Route::prefix('Family_bim')->group(function () {
    ////// Family 
    Route::get('/show/family/bim', "Payment\BimController@family_ind_bim")->middleware('auth')->name('bim.family.pay');
    Route::post('/store/family/bim', "Payment\BimController@store_family_bim")->name('bim.store.family')->middleware('auth');
    Route::patch('/update/family/bim', "Payment\BimController@update_family_bim")->name('bim.update.family')->middleware('auth');
    Route::get('/show/family/bim/{id}', "Payment\BimController@show_family_bim")->middleware('auth')->name('bim.shows.family');
    Route::delete('/delete/family/bim', "Payment\BimController@delete_familys_bim")->name('bim.destroy.family')->middleware('auth');
});

 


//////////////////////////////// Student Pay
Route::prefix('Student_usd')->group(function () {
    ////// Student 
    Route::get('/show/student/usd', "Payment\UsdController@student_ind_usd")->middleware('auth')->name('usd.student.pay');
    Route::post('/store/student/usd', "Payment\UsdController@store_student_usd")->name('usd.store.student')->middleware('auth');
    Route::patch('/update/student/usd', "Payment\UsdController@update_student_usd")->name('usd.update.student')->middleware('auth');
    Route::get('/show/student/usd/{id}', "Payment\UsdController@show_student_usd")->middleware('auth')->name('usd.shows.student');
    Route::delete('/destroy/student/usd', "Payment\UsdController@destroy_students_usd")->name('usd.destroy.student')->middleware('auth');
});

Route::prefix('Student_euro')->group(function () {
    ////// Student 
    Route::get('/show/student/euro', "Payment\EuroController@student_ind_euro")->middleware('auth')->name('euro.student.pay');
    Route::post('/store/student/euro', "Payment\EuroController@store_student_euro")->name('euro.store.student')->middleware('auth');
    Route::patch('/update/student/euro', "Payment\EuroController@update_student_euro")->name('euro.update.student')->middleware('auth');
    Route::get('/show/student/euro/{id}', "Payment\EuroController@show_student_euro")->middleware('auth')->name('euro.shows.student');
    Route::delete('/destroy/student/euro', "Payment\EuroController@destroy_students_euro")->name('euro.destroy.student')->middleware('auth');
});

Route::prefix('Student_tr')->group(function () {
    ////// Student 
    Route::get('/show/student/tr', "Payment\TrController@student_ind_tr")->middleware('auth')->name('tr.student.pay');
    Route::post('/store/student/tr', "Payment\TrController@store_student_tr")->name('tr.store.student')->middleware('auth');
    Route::patch('/update/student/tr', "Payment\TrController@update_student_tr")->name('tr.update.student')->middleware('auth');
    Route::get('/show/student/tr/{id}', "Payment\TrController@show_student_tr")->middleware('auth')->name('tr.shows.student');
    Route::delete('/destroy/student/tr', "Payment\TrController@destroy_students_tr")->name('tr.destroy.student')->middleware('auth');
});

Route::prefix('Student_bim')->group(function () {
    ////// Student 
    Route::get('/show/student/bim', "Payment\BimController@student_ind_bim")->middleware('auth')->name('bim.student.pay');
    Route::post('/store/student/bim', "Payment\BimController@store_student_bim")->name('bim.store.student')->middleware('auth');
    Route::patch('/update/student/bim', "Payment\BimController@update_student_bim")->name('bim.update.student')->middleware('auth');
    Route::get('/show/student/bim/{id}', "Payment\BimController@show_student_bim")->middleware('auth')->name('bim.shows.student');
    Route::delete('/delete/student/bim', "Payment\BimController@delete_students_bim")->name('bim.destroy.student')->middleware('auth');
});


//////////////////////////////// Medical Pay
Route::prefix('Medical_usd')->group(function () {
    ////// Medical 
    Route::get('/show/medical/usd', "Payment\UsdController@medical_ind_usd")->middleware('auth')->name('usd.medical.pay');
    Route::post('/store/medical/usd', "Payment\UsdController@store_medical_usd")->name('usd.store.medical')->middleware('auth');
    Route::patch('/update/medical/usd', "Payment\UsdController@update_medical_usd")->name('usd.update.medical')->middleware('auth');
    Route::get('/show/medical/usd/{id}', "Payment\UsdController@show_medical_usd")->middleware('auth')->name('usd.shows.medical');
    Route::delete('/destroy/medical/usd', "Payment\UsdController@destroy_medicals_usd")->name('usd.destroy.medical')->middleware('auth');
});

Route::prefix('Medical_euro')->group(function () {
    ////// Medical 
    Route::get('/show/medical/euro', "Payment\EuroController@medical_ind_euro")->middleware('auth')->name('euro.medical.pay');
    Route::post('/store/medical/euro', "Payment\EuroController@store_medical_euro")->name('euro.store.medical')->middleware('auth');
    Route::patch('/update/medical/euro', "Payment\EuroController@update_medical_euro")->name('euro.update.medical')->middleware('auth');
    Route::get('/show/medical/euro/{id}', "Payment\EuroController@show_medical_euro")->middleware('auth')->name('euro.shows.medical');
    Route::delete('/destroy/medical/euro', "Payment\EuroController@destroy_medicals_euro")->name('euro.destroy.medical')->middleware('auth');
});

Route::prefix('Medical_tr')->group(function () {
    ////// Medical 
    Route::get('/show/medical/tr', "Payment\TrController@medical_ind_tr")->middleware('auth')->name('tr.medical.pay');
    Route::post('/store/medical/tr', "Payment\TrController@store_medical_tr")->name('tr.store.medical')->middleware('auth');
    Route::patch('/update/medical/tr', "Payment\TrController@update_medical_tr")->name('tr.update.medical')->middleware('auth');
    Route::get('/show/medical/tr/{id}', "Payment\TrController@show_medical_tr")->middleware('auth')->name('tr.shows.medical');
    Route::delete('/destroy/medical/tr', "Payment\TrController@destroy_medicals_tr")->name('tr.destroy.medical')->middleware('auth');
});

Route::prefix('Medical_bim')->group(function () {
    ////// Medical 
    Route::get('/show/medical/bim', "Payment\BimController@medical_ind_bim")->middleware('auth')->name('bim.medical.pay');
    Route::post('/store/medical/bim', "Payment\BimController@store_medical_bim")->name('bim.store.medical')->middleware('auth');
    Route::patch('/update/medical/bim', "Payment\BimController@update_medical_bim")->name('bim.update.medical')->middleware('auth');
    Route::get('/show/medical/bim/{id}', "Payment\BimController@show_medical_bim")->middleware('auth')->name('bim.shows.medical');
    Route::delete('/delete/medical/bim', "Payment\BimController@delete_medicals_bim")->name('bim.destroy.medical')->middleware('auth');
});

///////////////////////////////////////// Payments
