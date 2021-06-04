<?php

namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Student\StudentController;
use App\models\Student\Student;
use App\models\Medical\Medical;
use App\models\Publics\Job;
use Illuminate\Http\Request;
use App\models\Family\Family;
use Illuminate\Support\Facades\DB;
//use App\models\Student\Student;
use App\models\Payment\Student_Payment;

use App\models\Publics\Children;
use App\Http\Controllers\Controller;


class JobController extends Controller
{


function __construct()
{

    $this->middleware('permission: قسم العمل الطبي ', ['only' => ['show_medical']]);
    $this->middleware('permission: قسم العمل الطبي ', ['only' => ['index_medical']]);
    $this->middleware('permission: إضافة العمل الطبي ', ['only' => ['store_Medical']]);
    $this->middleware('permission: تعديل قسم العمل الطبي ', ['only' => ['update_medical']]);
    $this->middleware('permission:حذف قسم العمل الطبي ', ['only' => ['destroy_medical']]);

    $this->middleware('permission: قسم العمل الطلاب ', ['only' => ['index']]);
    $this->middleware('permission: قسم العمل الطلاب ', ['only' => ['show']]);
    $this->middleware('permission: اضافة العمل الطلاب ', ['only' => ['store_student_husband_wife']]);
    $this->middleware('permission: تعديل قسم العمل الطلاب ', ['only' => ['update']]);
    $this->middleware('permission:حذف قسم العمل الطلاب ', ['only' => ['destroy']]);

    $this->middleware('permission: قسم العمل العائلات ', ['only' => ['index_family']]);
    $this->middleware('permission: قسم العمل العائلات ', ['only' => ['show_family']]);
    $this->middleware('permission: إضافة العمل العائلات ', ['only' => ['store_family']]);
    $this->middleware('permission: تعديل قسم العمل العائلات ', ['only' => ['update_family']]);
    $this->middleware('permission:حذف قسم العمل العائلات ', ['only' => ['destroy_family']]);

}


///////////////////////////////////// Student Start ////////////////////////////////////////
public function messages_student()
{
return $messages_student = [
    'student_id.required' => '!!',
    'job_have.required' => 'لم يتم ادخال خانه هل يعمل   !!',
    'job_type.required' => 'لم يتم ادخال  نوع العمل  !!',
    'job_place.required' => 'لم يتم ادخال مكان العمل   !!',
    'job_monthly_salary.required'  => 'لم يتم ادخال الراتب     !!',
    'job_last_have.required'  => 'لم يتم ادخال  العمل السابق   !!',
    'job_last_type.required'  => 'لم يتم ادخال نوع العمل السابق   !!',
    'job_last_salary.required'  => 'لم يتم ادخال  الراتب السابق    !!',


];
}
    public function storestudent(Request $request)
    {
        $messages = $this->messages_student();
        $this->validate($request,[
            'student_id'=>'required',
            'job_have' => 'required',
            'job_type' => 'required',
            'job_place' => 'required',
            'job_monthly_salary' => 'required',
            'job_last_have' => 'required',
            'job_last_type' => 'required',
            'job_last_salary' => 'required'
        ],$messages);
        //create new object of the model student and make mapping to the data
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;
         $x=1;
         $students->job_statu = $x;
         $jobs = new Job;
         $jobs -> student_id = $request->student_id;
         $jobs -> job_have = $request->job_have;
         $jobs -> job_type = $request->job_type;
         $jobs -> job_place = $request->job_place;
         $jobs -> job_monthly_salary = $request->job_monthly_salary;
         $jobs -> job_last_have = $request->job_last_have;
         $jobs -> job_last_type = $request->job_last_type;
         $jobs -> job_last_salary = $request->job_last_salary;
         //write to the data base
         $students->save();
         $jobs ->save();
         session()->flash('Add_jobs',  'تم اضافة خبرات العمل للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('student.show'));
    }

    public function index()
    {
        $job['job'] = Job::select('id','student_id','updated_at','job_have','job_type',
       'job_place','job_monthly_salary','job_last_have','job_last_type',
       'job_last_salary')
       ->orderBy('id', 'DESC')
       ->get();
       return view('Student.job.job')->with($job);
    }
    public function messages_student_update()
    {
    return $messages_student_update = [
        'id.required' => '!!',
        'student_id.required' => '!!',
        'job_have.required' => 'لم يتم ادخال خانه هل يعمل   !!',
        'job_type.required' => 'لم يتم ادخال  نوع العمل  !!',
        'job_place.required' => 'لم يتم ادخال مكان العمل   !!',
        'job_monthly_salary.required'  => 'لم يتم ادخال الراتب     !!',
        'job_last_have.required'  => 'لم يتم ادخال  العمل السابق   !!',
        'job_last_type.required'  => 'لم يتم ادخال نوع العمل السابق   !!',
        'job_last_salary.required'  => 'لم يتم ادخال  الراتب السابق    !!',


    ];
    }
    public function update(Request $request)
    {
        $messages = $this->messages_student_update();
        $this->validate($request,[
            'id'=>'required',
            'student_id'=>'required',
            'job_have' => 'required',
            'job_type' => 'required',
            'job_place' => 'required',
            'job_monthly_salary' => 'required',
            'job_last_have' => 'required',
            'job_last_type' => 'required',
            'job_last_salary' => 'required'
        ],$messages);

         //create new object of the model student and make mapping to the data
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;
         $jobs =  Job::find($request->id);
         $jobs -> student_id = $request->student_id;
         $jobs -> job_have = $request->job_have;
         $jobs -> job_type = $request->job_type;
         $jobs -> job_place = $request->job_place;
         $jobs -> job_monthly_salary = $request->job_monthly_salary;
         $jobs -> job_last_have = $request->job_last_have;
         $jobs -> job_last_type = $request->job_last_type;
         $jobs -> job_last_salary = $request->job_last_salary;
         //write to the data base
         $jobs ->save();
         session()->flash('Edit',  'تم تعديل خبرات العمل للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('job.show'));
    }


    public function show($id){
      $job = Job::where('student_id', $id)->get();
      return view('Student.job.job',compact('job'));
    }


    public function destroy(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $students =  Student::find($request->student_id);
        $x=0;
        $students->job_statu = $x;
        $student_name = $students->student_name;
        Job::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف معلومات العمل الخاصة بالطالب  '. $student_name .' بنجاح ');
        $students->save();
        return redirect(route('job.show'));
    }

///////////////////////////////////// Student End ////////////////////////////////////////


//////////////////////////////// Family Start ///////////////////////////////////////////////
public function messages_family()
{
return $messages_family = [
    'family_id.required' => '!!',
    'job_have.required' => 'لم يتم ادخال خانه هل يعمل   !!',
    'job_type.required' => 'لم يتم ادخال  نوع العمل  !!',
    'job_place.required' => 'لم يتم ادخال مكان العمل   !!',
    'job_monthly_salary.required'  => 'لم يتم ادخال الراتب     !!',
    'job_last_have.required'  => 'لم يتم ادخال  العمل السابق   !!',
    'job_last_type.required'  => 'لم يتم ادخال نوع العمل السابق   !!',
    'job_last_salary.required'  => 'لم يتم ادخال  الراتب السابق    !!',


];
}
public function store_family(Request $request)
{
    $messages = $this->messages_family();
    $this->validate($request,[
            'family_id'=>'required',
            'job_have' => 'required',
            'job_type' => 'required',
            'job_place' => 'required',
            'job_monthly_salary' => 'required',
            'job_last_have' => 'required',
            'job_last_type' => 'required',
            'job_last_salary' => 'required'
        ],$messages);
        //create new object of the model student and make mapping to the data
         $familys =  Family::find($request->family_id);
         $family_Constraint = $familys->family_Constraint;
         $x=1;
         $familys->job_statu = $x;
         $jobs = new Job;
         $jobs -> family_id = $request->family_id;
         $jobs -> job_have = $request->job_have;
         $jobs -> job_type = $request->job_type;
         $jobs -> job_place = $request->job_place;
         $jobs -> job_monthly_salary = $request->job_monthly_salary;
         $jobs -> job_last_have = $request->job_last_have;
         $jobs -> job_last_type = $request->job_last_type;
         $jobs -> job_last_salary = $request->job_last_salary;
         //write to the data base
         $familys->save();
         $jobs ->save();
         session()->flash('Add_jobs',  'تم اضافة خبرات العمل للعائلة  '. $family_Constraint .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('family.show'));
    }

    public function show_family($id){
      $job = Job::where('family_id', $id)->get();
      return view('family.job.job_family',compact('job'));
    }

    public function index_family()
    {
       $job = Job::all();
       return view('family.job.job_family',compact('job'));
    }

    public function destroy_family(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $familys =  Family::find($request->family_id);
        $x=0;
        $familys->job_statu = $x;
        $family_Constraint = $familys->family_Constraint;
        Job::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف معلومات العمل الخاصة العائلة  '. $family_Constraint .' بنجاح ');
        $familys->save();
        return redirect(route('job.show.family'));
    }
    public function messages_update_family()
    {
    return $messages_update_family = [
        'id.required' => '!!',
        'family_id.required' => '!!',
        'job_have.required' => 'لم يتم ادخال خانه هل يعمل   !!',
        'job_type.required' => 'لم يتم ادخال  نوع العمل  !!',
        'job_place.required' => 'لم يتم ادخال مكان العمل   !!',
        'job_monthly_salary.required'  => 'لم يتم ادخال الراتب     !!',
        'job_last_have.required'  => 'لم يتم ادخال  العمل السابق   !!',
        'job_last_type.required'  => 'لم يتم ادخال نوع العمل السابق   !!',
        'job_last_salary.required'  => 'لم يتم ادخال  الراتب السابق    !!',


    ];
    }
    public function update_family(Request $request)
    {
        $messages = $this->messages_update_family();
        $this->validate($request,[
            'id'=>'required',
            'family_id'=>'required',
            'job_have' => 'required',
            'job_type' => 'required',
            'job_place' => 'required',
            'job_monthly_salary' => 'required',
            'job_last_have' => 'required',
            'job_last_type' => 'required',
            'job_last_salary' => 'required'
        ],$messages);

         //create new object of the model student and make mapping to the data
         $familys =  Family::find($request->family_id);
         $family_Constraint = $familys->family_Constraint;
         $jobs =  Job::find($request->id);
         $jobs -> family_id = $request->family_id;
         $jobs -> job_have = $request->job_have;
         $jobs -> job_type = $request->job_type;
         $jobs -> job_place = $request->job_place;
         $jobs -> job_monthly_salary = $request->job_monthly_salary;
         $jobs -> job_last_have = $request->job_last_have;
         $jobs -> job_last_type = $request->job_last_type;
         $jobs -> job_last_salary = $request->job_last_salary;
         //write to the data base
         $jobs ->save();
         session()->flash('Edit',  'تم تعديل خبرات العمل للعائلة  '. $family_Constraint .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('job.show.family'));
    }

//////////////////////////////// Family End ///////////////////////////////////////////////


//////////////////////////////// Medical Start ///////////////////////////////////////////////
public function messages_Medical()
{
return $messages_Medical = [
    'medical_id.required' => '!!',
    'job_have.required' => 'لم يتم ادخال خانه هل يعمل   !!',
    'job_type.required' => 'لم يتم ادخال  نوع العمل  !!',
    'job_place.required' => 'لم يتم ادخال مكان العمل   !!',
    'job_monthly_salary.required'  => 'لم يتم ادخال الراتب     !!',
    'job_last_have.required'  => 'لم يتم ادخال  العمل السابق   !!',
    'job_last_type.required'  => 'لم يتم ادخال نوع العمل السابق   !!',
    'job_last_salary.required'  => 'لم يتم ادخال  الراتب السابق    !!',


];
}
    public function store_Medical(Request $request)
    {

        $messages = $this->messages_Medical();
        $this->validate($request,[
            'medical_id'=>'required',
            'job_have' => 'required',
            'job_type' => 'required',
            'job_place' => 'required',
            'job_monthly_salary' => 'required',
            'job_last_have' => 'required',
            'job_last_type' => 'required',
            'job_last_salary' => 'required'
        ],$messages);
        //create new object of the model student and make mapping to the data
         $Medicals =  Medical::find($request->medical_id);
         $Medical_name = $Medicals->medical_name;
         $x=1;
         $Medicals->job_statu = $x;
         $jobs = new Job;
         $jobs -> medical_id = $request->medical_id;
         $jobs -> job_have = $request->job_have;
         $jobs -> job_type = $request->job_type;
         $jobs -> job_place = $request->job_place;
         $jobs -> job_monthly_salary = $request->job_monthly_salary;
         $jobs -> job_last_have = $request->job_last_have;
         $jobs -> job_last_type = $request->job_last_type;
         $jobs -> job_last_salary = $request->job_last_salary;
         //write to the data base
         $Medicals->save();
         $jobs ->save();
         session()->flash('Add_jobs',  'تم اضافة خبرات العمل للمريض  '. $Medical_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('medical.show'));
    }

    public function show_medical($id){
      $job = Job::where('medical_id', $id)->get();
      return view('medical.job.job_medical',compact('job'));
    }

    public function index_medical()
    {

        $job = Job::all();
       return view('medical.job.job_medical',compact('job'));
    }

    public function destroy_medical(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $medicals =  Medical::find($request->medical_id);
        $x=0;
        $medicals->job_statu = $x;
        $medical_Constraint = $medicals->medical_Constraint;
        Job::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف معلومات العمل الخاصة العائلة  '. $medical_Constraint .' بنجاح ');
        $medicals->save();
        return redirect(route('job.show.medical'));
    }
    public function messages_medical_update()
    {
    return $messages_medical_update = [
        'id.required' => '!!',
        'medical_id.required' => '!!',
        'job_have.required' => 'لم يتم ادخال خانه هل يعمل   !!',
        'job_type.required' => 'لم يتم ادخال  نوع العمل  !!',
        'job_place.required' => 'لم يتم ادخال مكان العمل   !!',
        'job_monthly_salary.required'  => 'لم يتم ادخال الراتب     !!',
        'job_last_have.required'  => 'لم يتم ادخال  العمل السابق   !!',
        'job_last_type.required'  => 'لم يتم ادخال نوع العمل السابق   !!',
        'job_last_salary.required'  => 'لم يتم ادخال  الراتب السابق    !!',


    ];
    }
    public function update_medical(Request $request)
    {
        $messages = $this->messages_medical_update();
        $this->validate($request,[
            'id'=>'required',
            'medical_id'=>'required',
            'job_have' => 'required',
            'job_type' => 'required',
            'job_place' => 'required',
            'job_monthly_salary' => 'required',
            'job_last_have' => 'required',
            'job_last_type' => 'required',
            'job_last_salary' => 'required'
        ],$messages);
        //create new object of the model student and make mapping to the data
         $medicals =  Medical::find($request->medical_id);
         $medical_Constraint = $medicals->medical_Constraint;
         $jobs =  Job::find($request->id);
         $jobs -> medical_id = $request->medical_id;
         $jobs -> job_have = $request->job_have;
         $jobs -> job_type = $request->job_type;
         $jobs -> job_place = $request->job_place;
         $jobs -> job_monthly_salary = $request->job_monthly_salary;
         $jobs -> job_last_have = $request->job_last_have;
         $jobs -> job_last_type = $request->job_last_type;
         $jobs -> job_last_salary = $request->job_last_salary;
         //write to the data base
         $jobs ->save();
         session()->flash('Edit',  'تم تعديل خبرات العمل للعائلة  '. $medical_Constraint .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('job.show.medical'));
    }

//////////////////////////////// Medical End ///////////////////////////////////////////////

}
