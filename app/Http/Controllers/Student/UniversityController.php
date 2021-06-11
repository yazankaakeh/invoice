<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Student\StudentController;
use App\models\Student\Student;
use App\models\Student\University;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;


class UniversityController extends Controller
{


function __construct()
{
$this->middleware('permission: قسم الجامعة الطلاب ', ['only' => ['index']]);
$this->middleware('permission: قسم الجامعة الطلاب ', ['only' => ['show']]);
$this->middleware('permission: اضافة الجامعة الطلاب ', ['only' => ['storestudent']]);
$this->middleware('permission: تعديل قسم الجامعة الطلاب ', ['only' => ['update']]);
$this->middleware('permission:حذف قسم الجامعة الطلاب ', ['only' => ['destroy']]);


}


    public function show($id){
      $univ = University::where('student_id', $id)->get();
      return view('Student.university.university',compact('univ'));
    }

    public function messages_storestudent()
{
    return $messages_storestudent = [
        'student_id.required' => '',
        'univer_name.required' => 'لم يتم أدخال معلومات اسم الجامعة المطلوبة  !!',
        'univer_location.required' => 'لم يتم أدخال معلومات تاريخ موقع الجامعة المطلوبة!!',
        'univer_special.required' => 'لم يتم أدخال معلومات أختصاص المطلوبة!!',
        'Number_years.numeric'=>'لم يتم أجخال معلومات عدد السنوات يجب    أن تكون حصراً أرقام !!',
        'Schoo_year.numeric'=>'لم يتم أدخال معلومات السنه الدراسية المطلوبة!!',
        'Current_rate.required'=>'لم يتم ادخال معلومات المعدل الحالي المطلوبة !!',
        'Cumulative_rate.required'=>'لم يتم أدخال معلومات المعدل التراكمي المطلوبة !!',
        'language_name.required'=>' لم يتم أدخال نوع اللغة الدراسية المطلوبة !!',
        'Current_level.required'=>'لم يتم أدخال معدل المستوى الحالي للغة المطلوبة!!',
        'Curr_level_rate.required'=>'لم يتم أدخال معدل المستوى السابق المطلوبة !!',
        'Previ_level_rate.required'=>'لم يتم أدخال معلومات المطلوبة !!',
        'Univer_Accept.required'=>'لم يتم أدخال معلومات طريقة القبول بالجامعة المطلوبة!!',
        'Accept_rate.required'=>'لم يتم أدخال معلومات معدل القبول المطلوبة!!',
        'are_you_univer.required'=>'لم يتم أدخال معلومات هل انت يجامعة أخرى المطلوبة  !!',
        'univer_Premiums.required'=>'لم يتم أدخال معلومات  اقساط جامعية  المطلوية!!',
        'univer_fees.required'=>'لم يتم أدخال معلومات مصاريف جامعية الجامعة!!',
        'univer_fees_value.required'=>'لم يتم أدخال معلومات كم مصاريف الجامعة!!',
    ];
}
    public function storestudent(Request $request)
    {
        $messages = $this->messages_storestudent();
        $this->validate($request,[
            'student_id'=>'required',
            'univer_name' => 'required',
            'univer_location' => 'required',
            'univer_special' => 'required',
            'Number_years' => 'required',
            'Schoo_year' => 'required',
            'Current_rate' => 'required',
            'Cumulative_rate' => 'required',
            'language_name' => 'required',
            'Current_level' => 'required',
            'Curr_level_rate' => 'required',
            'Previ_level_rate' => 'required',
            'Univer_Accept' => 'required',
            'Accept_rate' => 'required',
            'are_you_univer' => 'required',
            // 'Ano_univer_name' => 'required',
            // 'Ano_univer_special' => 'required',
            // 'Ano_univer_Accept' => 'required',
            // 'Ano_accept_rate' => 'required',
            // 'Ano_Schoo_year' => 'required',
            // 'Ano_Current_rate' => 'required',
            'univer_Premiums' => 'required',
            'univer_fees' => 'required',
            'univer_fees_value' => 'required'
        ],$messages);

         //create new object of the model student and make mapping to the data
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;
         $x=1;
         $students->university_statu = $x;
         $Universitys = new University;
         $Universitys -> student_id = $request->student_id;
         $Universitys -> univer_name = $request->univer_name;
         $Universitys -> univer_location = $request->univer_location;
         $Universitys -> univer_special = $request->univer_special;
         $Universitys -> Number_years = $request->Number_years;
         $Universitys -> Schoo_year = $request->Schoo_year;
         $Universitys -> Current_rate = $request->Current_rate;
         $Universitys -> Cumulative_rate = $request->Cumulative_rate;
         $Universitys -> language_name = $request->language_name;
         $Universitys -> Current_level = $request->Current_level;
         $Universitys -> Curr_level_rate = $request->Curr_level_rate;
         $Universitys -> Previ_level_rate = $request->Previ_level_rate;
         $Universitys -> Univer_Accept = $request->Univer_Accept;
         $Universitys -> Accept_rate = $request->Accept_rate;
         $Universitys -> are_you_univer = $request->are_you_univer;
         $Universitys -> Ano_univer_name = $request->Ano_univer_name;
         $Universitys -> Ano_univer_special = $request->Ano_univer_special;
         $Universitys -> Ano_univer_Accept = $request->Ano_univer_Accept;
         $Universitys -> Ano_accept_rate = $request->Ano_accept_rate;
         $Universitys -> Ano_Schoo_year = $request->Ano_Schoo_year;
         $Universitys -> Ano_Current_rate = $request->Ano_Current_rate;
         $Universitys -> univer_Premiums = $request->univer_Premiums;
         $Universitys -> univer_fees = $request->univer_fees;
         $Universitys -> univer_fees_value = $request->univer_fees_value;
         //write to the data base
         $students->save();
         $Universitys ->save();
         session()->flash('Add_University',  'تم اضافة الجامعة للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('student.show'));

    }
    public function index()
    {
       $univ['univ'] = University::select('id','student_id','updated_at','univer_name','univer_location','univer_special',
       'Number_years','Schoo_year','Current_rate','Cumulative_rate',
       'language_name','Current_level','Curr_level_rate','Previ_level_rate'
       ,'Univer_Accept','Accept_rate','are_you_univer','Ano_univer_name',
       'Ano_univer_special','Ano_univer_Accept','Ano_accept_rate',
       'Ano_Schoo_year','Ano_Current_rate','univer_Premiums',
       'univer_fees','univer_fees_value'
       )
       ->orderBy('id', 'DESC')
       ->get();
       return view('Student.university.university')->with($univ);
    }

    public function messages_storestudent_update()
{
    return $messages_storestudent_update = [
        'student_id.required' => '',
        'univer_name.required' => 'لم يتم أدخال معلومات اسم الجامعة المطلوبة  !!',
        'univer_location.required' => 'لم يتم أدخال معلومات تاريخ موقع الجامعة المطلوبة!!',
        'univer_special.required' => 'لم يتم أدخال معلومات أختصاص المطلوبة!!',
        'Number_years.numeric'=>'لم يتم أجخال معلومات عدد السنوات يجب    أن تكون حصراً أرقام !!',
        'Schoo_year.numeric'=>'لم يتم أدخال معلومات السنه الدراسية المطلوبة!!',
        'Current_rate.required'=>'لم يتم ادخال معلومات المعدل الحالي المطلوبة !!',
        'Cumulative_rate.required'=>'لم يتم أدخال معلومات المعدل التراكمي المطلوبة !!',
        'language_name.required'=>' لم يتم أدخال نوع اللغة الدراسية المطلوبة !!',
        'Current_level.required'=>'لم يتم أدخال معدل المستوى الحالي للغة المطلوبة!!',
        'Curr_level_rate.required'=>'لم يتم أدخال معدل المستوى السابق المطلوبة !!',
        'Previ_level_rate.required'=>'لم يتم أدخال معلومات المطلوبة !!',
        'Univer_Accept.required'=>'لم يتم أدخال معلومات طريقة القبول بالجامعة المطلوبة!!',
        'Accept_rate.required'=>'لم يتم أدخال معلومات معدل القبول المطلوبة!!',
        'are_you_univer.required'=>'لم يتم أدخال معلومات هل انت يجامعة أخرى المطلوبة  !!',
        'univer_Premiums.required'=>'لم يتم أدخال معلومات  اقساط جامعية  المطلوية!!',
        'univer_fees.required'=>'لم يتم أدخال معلومات مصاريف جامعية الجامعة!!',
        'univer_fees_value.required'=>'لم يتم أدخال معلومات كم مصاريف الجامعة!!',

    ];
}
    public function update(Request $request)
    {
        $messages = $this->messages_storestudent_update();
        $this->validate($request,[
            'student_id'=>'required',
            'univer_name' => 'required',
            'univer_location' => 'required',
            'univer_special' => 'required',
            'Number_years' => 'required',
            'Schoo_year' => 'required',
            'Current_rate' => 'required',
            'Cumulative_rate' => 'required',
            'language_name' => 'required',
            'Current_level' => 'required',
            'Curr_level_rate' => 'required',
            'Previ_level_rate' => 'required',
            'Univer_Accept' => 'required',
            'Accept_rate' => 'required',
            'are_you_univer' => 'required',
            // 'Ano_univer_name' => 'required',
            // 'Ano_univer_special' => 'required',
            // 'Ano_univer_Accept' => 'required',
            // 'Ano_accept_rate' => 'required',
            // 'Ano_Schoo_year' => 'required',
            // 'Ano_Current_rate' => 'required',
            'univer_Premiums' => 'required',
            'univer_fees' => 'required',
            'univer_fees_value' => 'required'
        ],$messages);

            //create new object of the model student and make mapping to the data
            $students =  Student::find($request->student_id);
            $student_name = $students->student_name;
            $x=1;
            $students->university_statu = $x;
            $Universitys =  University::find($request->id);
            $Universitys -> student_id = $request->student_id;
            $Universitys -> univer_name = $request->univer_name;
            $Universitys -> univer_location = $request->univer_location;
            $Universitys -> univer_special = $request->univer_special;
            $Universitys -> Number_years = $request->Number_years;
            $Universitys -> Schoo_year = $request->Schoo_year;
            $Universitys -> Current_rate = $request->Current_rate;
            $Universitys -> Cumulative_rate = $request->Cumulative_rate;
            $Universitys -> language_name = $request->language_name;
            $Universitys -> Current_level = $request->Current_level;
            $Universitys -> Curr_level_rate = $request->Curr_level_rate;
            $Universitys -> Previ_level_rate = $request->Previ_level_rate;
            $Universitys -> Univer_Accept = $request->Univer_Accept;
            $Universitys -> Accept_rate = $request->Accept_rate;
            $Universitys -> are_you_univer = $request->are_you_univer;
            $Universitys -> Ano_univer_name = $request->Ano_univer_name;
            $Universitys -> Ano_univer_special = $request->Ano_univer_special;
            $Universitys -> Ano_univer_Accept = $request->Ano_univer_Accept;
            $Universitys -> Ano_accept_rate = $request->Ano_accept_rate;
            $Universitys -> Ano_Schoo_year = $request->Ano_Schoo_year;
            $Universitys -> Ano_Current_rate = $request->Ano_Current_rate;
            $Universitys -> univer_Premiums = $request->univer_Premiums;
            $Universitys -> univer_fees = $request->univer_fees;
            $Universitys -> univer_fees_value = $request->univer_fees_value;
            //write to the data base
            $students->save();
            $Universitys ->save();
            session()->flash('Edit',  'تم تعديل معلومات الجامعة للطالب  '. $student_name .' بنجاح ');
            //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
            return redirect(route('University.show'));
    }


    public function destroy(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $students =  Student::find($request->student_id);
        $x=0;
        $students->university_statu = $x;
        $student_name = $students->student_name;



        University::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف معلومات الجامعة الخاصة بالطالب  '. $student_name .' بنجاح ');
        $students->save();
        return redirect(route('University.show'));

    }
}
