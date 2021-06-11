<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Student\SchoolController;
use App\Http\Controllers\Medical\MediaclController;
use App\Http\Controllers\Payment\Student_Payment;
use App\Http\Controllers\Family\FamilyController;

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

Route::prefix('family/statu')->group(function () {
    Route::get('/new', "family\FamilyController@new_family")->name('new.family')->middleware('auth');
    Route::get('/archievd', "family\FamilyController@archievd_family")->name('family.archive')->middleware('auth');
    Route::get('/rejected', "family\FamilyController@rejected_family")->name('family.reject')->middleware('auth');
    Route::get('/delayed', "family\FamilyController@delayed_family")->name('family.delayed')->middleware('auth');
    Route::get('/show', "family\FamilyController@index")->name('family.show')->middleware('auth');
    Route::post('/statu', "family\FamilyController@family_statu")->name('family.statu')->middleware('auth');
});

Route::prefix('family')->group(function () {
    Route::get('show', "Family\FamilyController@index")->name('family.show')->middleware('auth');
    Route::post('store', "Family\FamilyController@store")->name('family.store')->middleware('auth');
    Route::POST('/new/register', "Family\FamilyController@store_register")->name('family.new')->middleware('auth');
    Route::patch('update', "Family\FamilyController@update")->name('family.update')->middleware('auth');
    Route::delete('update', "Family\FamilyController@destroy")->name('family.destroy')->middleware('auth');
    Route::get('register', "Family\FamilyController@register")->name('family.register');
    Route::get('enable', "Family\FamilyController@enable")->name('family.enable')->middleware('auth');
    Route::get('disable', "Family\FamilyController@disable")->name('family.disable')->middleware('auth');
    Route::get('/add/student', "Family\FamilyController@add_student")->name('family.student.add')->middleware('auth');
    Route::get('/show/student/{id}/', "Family\FamilyController@show_student")->name('family.student.show')->middleware('auth');
   // Route::patch('/update/student/{id}/', "Family\FamilyController@show_student")->name('family.student.show')->middleware('auth');
    Route::delete('/destroy/student/', "Family\FamilyController@detroy_student")->name('student.family.destroy')->middleware('auth');
    Route::get('/add/medical', "Family\FamilyController@add_medical")->name('family.medical.add')->middleware('auth');
    Route::get('/show/medical/{id}/', "Family\FamilyController@show_medical")->name('family.medical.show')->middleware('auth');
    Route::delete('/destroy/medical/', "Family\FamilyController@detroy_medical")->name('medical.family.destroy')->middleware('auth');
});

Route::prefix('husband_Wife_family')->group(function () {
    Route::get('show', "Publics\HusbandandWifeController@index_family")->name('husband_Wife.show.family')->middleware('auth');
    Route::post('store', "Publics\HusbandandWifeController@store_family_husband_wife")->name('husband_Wife.family.store')->middleware('auth');
    Route::patch('update', "Publics\HusbandandWifeController@update_family")->name('husband_Wife.update.family')->middleware('auth');
    Route::get('/show/{id}', "Publics\HusbandandWifeController@show_family")->middleware('auth');
    Route::delete('destroy', "Publics\HusbandandWifeController@destroy_family")->name('husband_Wife.destroy.family')->middleware('auth');
});

Route::prefix('children_family')->group(function () {
    /////////////////////////////////////family
    Route::get('/show/child', "Publics\childrenController@index_family")->name('children.show.family')->middleware('auth');
    Route::delete('/delete/family', "Publics\childrenController@delete_family")->name('children.delete.family')->middleware('auth');
    Route::post('/store/family', "Publics\childrenController@store_family_children")->name('children.store.family')->middleware('auth');
    Route::patch('/update/family', "Publics\childrenController@update_family")->name('children.update.family')->middleware('auth');
    Route::get('/show/child/family/{id}', "Publics\childrenController@show_family")->middleware('auth');
});

Route::prefix('address_family')->group(function () {
    Route::get('show', "Publics\AddressController@index")->name('address.show')->middleware('auth');
    Route::post('store', "Publics\AddressController@store_family_address")->name('address.family.store')->middleware('auth');
    Route::get('/show/{id}', "Publics\AddressController@show")->middleware('auth');
    Route::patch('/update', "Publics\AddressController@update")->name('address.update')->middleware('auth');
    Route::delete('/delete', "Publics\AddressController@destroy")->name('address.destroy')->middleware('auth');
});

Route::prefix('job_family')->group(function () {
    Route::get('/show/family/', "Publics\JobController@index_family")->name('job.show.family')->middleware('auth');
    Route::post('/store/family/', "Publics\JobController@store_family")->name('job.family.store')->middleware('auth');
    Route::patch('/update/family/', "Publics\JobController@update_family")->name('job.update.family')->middleware('auth');
    Route::get('/show/family/{id}', "Publics\JobController@show_family")->middleware('auth');
    Route::delete('/delete/family/', "Publics\JobController@destroy_family")->name('job.destroy.family')->middleware('auth');
});


Route::prefix('school_family')->group(function () {
    Route::get('/show/school/', "Student\SchoolController@index_family")->name('school.show.family')->middleware('auth');
    Route::post('/store/school/', "Student\SchoolController@store_family")->name('school.family.store')->middleware('auth');
    Route::patch('/update/school/', "Student\SchoolController@update_family")->name('school.update.family')->middleware('auth');
    Route::get('/show/school/{id}', "Student\SchoolController@show_family")->middleware('auth');
    Route::delete('/delete/school/', "Student\SchoolController@destroy_family")->name('school.destroy.family')->middleware('auth');
});