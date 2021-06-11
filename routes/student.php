<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Student\SchoolController;
use App\Http\Controllers\Medical\MediaclController;
use App\Http\Controllers\Payment\Student_Payment;

Route::prefix('turkey')->group(function () {
    Route::post('/edit', "Publics\TurkeyController@edit")->name('turkey.edit')->middleware('auth');
});


Route::prefix('student/statu')->group(function () {
    Route::get('/new', "Student\StudentController@new_student")->name('student.new')->middleware('auth');
    Route::get('/archievd', "Student\StudentController@archive_student")->name('student.archive')->middleware('auth');
    Route::get('/rejected', "Student\StudentController@reject_student")->name('student.reject')->middleware('auth');
    Route::get('/delayed', "Student\StudentController@delayed_student")->name('student.delayed')->middleware('auth');
    Route::get('/show', "Student\StudentController@index")->name('student.show')->middleware('auth');
    Route::post('/statu', "Student\StudentController@student_statu")->name('student.statu')->middleware('auth');
});

Route::prefix('student')->group(function () {
    Route::post('store', "Student\StudentController@store")->name('student.store');
    Route::patch('update', "Student\StudentController@update")->name('student.update')->middleware('auth');
    Route::delete('update', "Student\StudentController@destroy")->name('student.destroy')->middleware('auth');
    Route::get('register', "Student\StudentController@register")->name('student.register');
    Route::post('register', "Student\StudentController@store_register")->name('store.register');
    Route::get('enable', "Student\StudentController@enable")->name('student.enable')->middleware('auth');
    Route::get('disable', "Student\StudentController@disable")->name('student.disable')->middleware('auth');
});

Route::prefix('pay')->group(function () {
    // Student
    Route::get('show', "Payment\StudentPaymentController@index")->name('pay.show')->middleware('auth');
    Route::post('store', "Payment\StudentPaymentController@storestudent")->name('pay.student.store')->middleware('auth');
    Route::patch('update', "Payment\StudentPaymentController@update")->name('pay.update')->middleware('auth');
    Route::get('/show/{id}', "Payment\StudentPaymentController@show")->middleware('auth')->name('pay.shows');
    Route::delete('destroy', "Payment\StudentPaymentController@destroy")->name('pay.destroy')->middleware('auth');

});

Route::prefix('children')->group(function () {
    Route::get('show', "Publics\childrenController@index")->name('children.show')->middleware('auth');
    Route::post('store', "Publics\childrenController@store_student_children")->name('children.student.store')->middleware('auth');
    Route::get('/show/{id}', "Publics\childrenController@show")->middleware('auth');
    Route::patch('/update', "Publics\childrenController@update")->name('children.update')->middleware('auth');
    Route::delete('/delete', "Publics\childrenController@destroy")->name('children.destroy')->middleware('auth');
});

Route::prefix('father_and_mother')->group(function () {
    Route::get('/show', "Publics\FatherandMotherController@index")->name('FatherandMother.show')->middleware('auth');
    Route::post('/store', "Publics\FatherandMotherController@storestudent")->name('FatherandMother.student.store')->middleware('auth');
    Route::get('/show/{id}', "Publics\FatherandMotherController@show")->middleware('auth');
    Route::patch('/update', "Publics\FatherandMotherController@update")->name('FatherandMother.update')->middleware('auth');
    Route::delete('/delete', "Publics\FatherandMotherController@destroy")->name('FatherandMother.destroy')->middleware('auth');
});

Route::prefix('Medical_Statu')->group(function () {
    Route::get('show', "Publics\MedicalStatusController@index")->name('Medical_Statu.show')->middleware('auth');
    Route::post('store', "Publics\MedicalStatusController@storestudent")->name('Medical_Statu.student.store')->middleware('auth');
    Route::patch('update', "Publics\MedicalStatusController@update")->name('Medical_Statu.update')->middleware('auth');
    Route::get('/show/{id}', "Publics\MedicalStatusController@show")->middleware('auth');
    Route::delete('delete', "Publics\MedicalStatusController@destroy")->name('Medical_Statu.destroy')->middleware('auth');
});

Route::prefix('Student_Residance')->group(function () {
    Route::get('show', "Student\StudentResidenceController@index")->name('Student_Residence.show')->middleware('auth');
    Route::post('store', "Student\StudentResidenceController@storestudent")->name('Student_Residence.student.store')->middleware('auth');
    Route::get('/show/{id}', "Student\StudentResidenceController@show")->middleware('auth');
    Route::patch('update', "Student\StudentResidenceController@update")->name('Student_Residence.update')->middleware('auth');
    Route::delete('delete', "Student\StudentResidenceController@destroy")->name('Student_Residence.destroy')->middleware('auth');
});

Route::prefix('Quran')->group(function () {
    Route::get('show', "Student\QuranController@index")->name('Quran.show')->middleware('auth');
    Route::post('store', "Student\QuranController@storestudent")->name('Quran.student.store')->middleware('auth');
    Route::patch('update', "Student\QuranController@update")->name('Quran.update')->middleware('auth');
    Route::get('/show/{id}', "Student\QuranController@show")->middleware('auth');
    Route::delete('delete', "Student\QuranController@destroy")->name('Quran.destroy')->middleware('auth');
});

Route::prefix('job')->group(function () {
    Route::get('show', "Publics\JobController@index")->name('job.show')->middleware('auth');
    Route::post('store', "Publics\JobController@storestudent")->name('job.student.store')->middleware('auth');
    Route::patch('update', "Publics\JobController@update")->name('job.update')->middleware('auth');
    Route::get('/show/{id}', "Publics\JobController@show")->middleware('auth');
    Route::delete('delete', "Publics\JobController@destroy")->name('job.destroy')->middleware('auth');
});


Route::prefix('Scholarship')->group(function () {
    Route::get('show', "Student\ScholarshipController@index")->name('Scholarship.show')->middleware('auth');
    Route::post('store', "Student\ScholarshipController@storestudent")->name('Scholarship.student.store')->middleware('auth');
    Route::patch('update', "Student\ScholarshipController@update")->name('Scholarship.update')->middleware('auth');
    Route::get('/show/{id}', "Student\ScholarshipController@show")->middleware('auth');
    Route::delete('delete', "Student\ScholarshipController@destroy")->name('Scholarship.destroy')->middleware('auth');
});

Route::prefix('University')->group(function () {
    Route::get('show', "Student\UniversityController@index")->name('University.show')->middleware('auth');
    Route::post('store', "Student\UniversityController@storestudent")->name('University.student.store')->middleware('auth');
    Route::patch('update', "Student\UniversityController@update")->name('University.update')->middleware('auth');
    Route::get('/show/{id}', "Student\UniversityController@show")->middleware('auth');
    Route::delete('delete', "Student\UniversityController@destroy")->name('University.destroy')->middleware('auth');
});


Route::prefix('Sister_and_Brother')->group(function () {
    Route::get('show', "Publics\SisterandBrotherController@index")->name('Sister_and_Brother.show')->middleware('auth');
    Route::post('store', "Publics\SisterandBrotherController@storestudent")->name('Sister_and_Brother.student.store')->middleware('auth');
    Route::patch('update', "Publics\SisterandBrotherController@update")->name('Sister_and_Brother.update')->middleware('auth');
    Route::get('/show/{id}', "Publics\SisterandBrotherController@show")->middleware('auth');
    Route::delete('delete', "Publics\SisterandBrotherController@destroy")->name('Sister_and_Brother.destroy')->middleware('auth');
});

Route::prefix('husband_Wife')->group(function () {
    Route::get('show', "Publics\HusbandandWifeController@index")->name('husband_Wife.show')->middleware('auth');
    Route::post('store', "Publics\HusbandandWifeController@store_student_husband_wife")->name('husband_Wife.student.store')->middleware('auth');
    Route::patch('update', "Publics\HusbandandWifeController@update")->name('husband_Wife.update')->middleware('auth');
    Route::get('/show/{id}', "Publics\HusbandandWifeController@show")->middleware('auth');
    Route::delete('delete', "Publics\HusbandandWifeController@destroy")->name('husband_Wife.destroy')->middleware('auth');
});

Route::prefix('school_student')->group(function () {
    Route::get('/show/school/', "Student\SchoolController@index_student")->name('school.show.student')->middleware('auth');
    Route::post('/store/school/', "Student\SchoolController@store_student")->name('school.student.store')->middleware('auth');
    Route::patch('/update/school/', "Student\SchoolController@update_student")->name('school.update.student')->middleware('auth');
    Route::get('/show/school/{id}', "Student\SchoolController@show_student")->middleware('auth');
    Route::delete('/delete/school/', "Student\SchoolController@destroy_student")->name('school.destroy.student')->middleware('auth');
});