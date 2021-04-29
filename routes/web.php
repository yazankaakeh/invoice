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



Route::prefix('student')->group(function () {
    Route::get('show', "Student\StudentController@index")->name('student.show')->middleware('auth');
    Route::post('store', "Student\StudentController@store")->name('student.store')->middleware('auth');
    Route::patch('update', "Student\StudentController@update")->name('student.update')->middleware('auth');
    Route::delete('update', "Student\StudentController@destroy")->name('student.destroy')->middleware('auth');
    Route::get('register', "Student\StudentController@register")->name('student.register')->middleware('auth');
});

Route::prefix('pay')->group(function () {
    Route::get('show', "Payment\StudentPaymentController@index")->name('pay.show')->middleware('auth');
    Route::post('store', "Payment\StudentPaymentController@storestudent")->name('pay.student.store')->middleware('auth');
    Route::patch('update', "Payment\StudentPaymentController@update")->name('pay.update')->middleware('auth');
    Route::get('/show/{id}', "Payment\StudentPaymentController@show")->middleware('auth');
    Route::delete('update', "Payment\StudentPaymentController@destroy")->name('pay.destroy')->middleware('auth');
});

Route::prefix('husband_Wife')->group(function () {
    Route::get('show', "Publics\HusbandandWifeController@index")->name('husband_Wife.show')->middleware('auth');
    Route::post('store', "Publics\HusbandandWifeController@store_student_husband_wife")->name('husband_Wife.student.store')->middleware('auth');
    Route::patch('update', "Publics\HusbandandWifeController@update")->name('husband_Wife.update')->middleware('auth');
    Route::get('/show/{id}', "Publics\HusbandandWifeController@show")->middleware('auth');
    Route::delete('update', "Publics\HusbandandWifeController@destroy")->name('husband_Wife.destroy')->middleware('auth');
});

Route::prefix('children')->group(function () {
    Route::get('show', "Publics\childrenController@index")->name('children.show')->middleware('auth');
    Route::post('store', "Publics\childrenController@store_student_children")->name('children.student.store')->middleware('auth');
    Route::get('/show/{id}', "Publics\childrenController@show")->middleware('auth');
    Route::patch('update', "Publics\childrenController@update")->name('children.update')->middleware('auth');
    Route::delete('update', "Publics\childrenController@destroy")->name('children.destroy')->middleware('auth');
});

Route::prefix('father_and_mother')->group(function () {
    Route::get('show', "Publics\FatherandMotherController@index")->name('FatherandMother.show')->middleware('auth');
    Route::post('store', "Publics\FatherandMotherController@storestudent")->name('FatherandMother.student.store')->middleware('auth');
    Route::get('/show/{id}', "Publics\FatherandMotherController@show")->middleware('auth');
    Route::patch('update', "Publics\FatherandMotherController@update")->name('FatherandMother.update')->middleware('auth');
    Route::delete('update', "Publics\FatherandMotherController@destroy")->name('FatherandMother.destroy')->middleware('auth');
});

Route::prefix('Medical_Statu')->group(function () {
    Route::get('show', "Publics\MedicalStatusController@index")->name('Medical_Statu.show')->middleware('auth');
    Route::post('store', "Publics\MedicalStatusController@storestudent")->name('Medical_Statu.student.store')->middleware('auth');
    Route::patch('update', "Publics\MedicalStatusController@update")->name('Medical_Statu.update')->middleware('auth');
    Route::get('/show/{id}', "Publics\MedicalStatusController@show")->middleware('auth');
    Route::delete('update', "Publics\MedicalStatusController@destroy")->name('Medical_Statu.destroy')->middleware('auth');
});

Route::prefix('Student_Residance')->group(function () {
    Route::get('show', "Student\StudentResidenceController@index")->name('Student_Residence.show')->middleware('auth');
    Route::post('store', "Student\StudentResidenceController@storestudent")->name('Student_Residence.student.store')->middleware('auth');
    Route::get('/show/{id}', "Student\StudentResidenceController@show")->middleware('auth');
    Route::patch('update', "Student\StudentResidenceController@update")->name('Student_Residence.update')->middleware('auth');
    Route::delete('update', "Student\StudentResidenceController@destroy")->name('Student_Residence.destroy')->middleware('auth');
});

Route::prefix('Quran')->group(function () {
    Route::get('show', "Student\QuranController@index")->name('Quran.show')->middleware('auth');
    Route::post('store', "Student\QuranController@storestudent")->name('Quran.student.store')->middleware('auth');
    Route::patch('update', "Student\QuranController@update")->name('Quran.update')->middleware('auth');
    Route::get('/show/{id}', "Student\QuranController@show")->middleware('auth');
    Route::delete('update', "Student\QuranController@destroy")->name('Quran.destroy')->middleware('auth');
});

Route::prefix('job')->group(function () {
    Route::get('show', "Publics\JobController@index")->name('job.show')->middleware('auth');
    Route::post('store', "Publics\JobController@storestudent")->name('job.student.store')->middleware('auth');
    Route::patch('update', "Publics\JobController@update")->name('job.update')->middleware('auth');
    Route::get('/show/{id}', "Publics\JobController@show")->middleware('auth');
    Route::delete('update', "Publics\JobController@destroy")->name('job.destroy')->middleware('auth');
});


Route::prefix('Scholarship')->group(function () {
    Route::get('show', "Student\ScholarshipController@index")->name('Scholarship.show')->middleware('auth');
    Route::post('store', "Student\ScholarshipController@storestudent")->name('Scholarship.student.store')->middleware('auth');
    Route::patch('update', "Student\ScholarshipController@update")->name('Scholarship.update')->middleware('auth');
    Route::get('/show/{id}', "Student\ScholarshipController@show")->middleware('auth');
    Route::delete('update', "Student\ScholarshipController@destroy")->name('Scholarship.destroy')->middleware('auth');
});

Route::prefix('University')->group(function () {
    Route::get('show', "Student\UniversityController@index")->name('University.show')->middleware('auth');
    Route::post('store', "Student\UniversityController@storestudent")->name('University.student.store')->middleware('auth');
    Route::patch('update', "Student\UniversityController@update")->name('University.update')->middleware('auth');
    Route::get('/show/{id}', "Student\UniversityController@show")->middleware('auth');
    Route::delete('update', "Student\UniversityController@destroy")->name('University.destroy')->middleware('auth');
});

Route::prefix('school')->group(function () {
    Route::get('show', "Student\SchoolController@index")->name('School.student.show')->middleware('auth');
    Route::post('store', "Student\SchoolController@storestudent")->name('School.student.store')->middleware('auth');
    Route::patch('update', "Student\SchoolController@update")->name('School.update')->middleware('auth');
    Route::get('/show/{id}', "Student\SchoolController@show")->middleware('auth');
    Route::delete('update', "Student\SchoolController@destroy")->name('School.destroy')->middleware('auth');
});

Route::prefix('Sister_and_Brother')->group(function () {
    Route::get('show', "Publics\SisterandBrotherController@index")->name('Sister_and_Brother.show')->middleware('auth');
    Route::post('store', "Publics\SisterandBrotherController@storestudent")->name('Sister_and_Brother.student.store')->middleware('auth');
    Route::patch('update', "Publics\SisterandBrotherController@update")->name('Sister_and_Brother.update')->middleware('auth');
    Route::get('/show/{id}', "Publics\SisterandBrotherController@show")->middleware('auth');
    Route::delete('update', "Publics\SisterandBrotherController@destroy")->name('Sister_and_Brother.destroy')->middleware('auth');
});


Route::prefix('Setting')->group(function () {
    Route::get('tests', function () {
        $enable = 0;
        return view('students.register',compact('enable'));

    })->name('tests');
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

