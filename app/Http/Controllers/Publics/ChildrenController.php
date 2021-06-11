<?php

namespace App\Http\Controllers\Publics;
use App\Http\Controllers\Student\StudentController;
use App\models\Family\Family;
use App\models\Medical\Medical;
use App\models\Student\Student;
use Illuminate\Support\Facades\DB;
//use App\models\Student\Student;
use App\models\Payment\Student_Payment;

use App\models\Publics\Children;
use Illuminate\Http\Request;


use App\Http\Controllers\Controller;

class ChildrenController extends Controller
{

function __construct()
{

    $this->middleware('permission: قسم الأطفال العائلات ', ['only' => ['index_family']]);
    $this->middleware('permission: قسم الأطفال العائلات ', ['only' => ['show_family']]);
    $this->middleware('permission: إضافة قسم لطفل العائلات ', ['only' => ['store_family_children']]);
    $this->middleware('permission: تعديل قسم الأطفال العائلات ', ['only' => ['update_family']]);
    $this->middleware('permission:حذف قسم الأطفال العائلات ', ['only' => ['delete_family']]);

    $this->middleware('permission: قسم الأطفال الطلاب ', ['only' => ['index']]);
    $this->middleware('permission: قسم الأطفال الطلاب ', ['only' => ['show']]);
    $this->middleware('permission: اضافة قسم الأطفال الطلاب ', ['only' => ['store_student_children']]);
    $this->middleware('permission: تعديل قسم الأطفال الطلاب ', ['only' => ['update']]);
    $this->middleware('permission:حذف قسم الأطفال الطلاب ', ['only' => ['destroy']]);

}



/////////////////////////////////////////////////////////// Student Start////////////////////////////////////////

    public function show($id){
      $child = Children::where('student_id', $id)->get();
     // $child = DB::table('childrens')->where('student_id', $id)->get();
       return view('Student.child.child',compact('child'));
       // using compant with where
       //->with($child);

    }

    public function index()
    {
        $child['child'] = Children::select('id','student_id','updated_at','childre_name','childre_age',
       'childre_gender','childre_educa_leve','childre_class_number','childre_id_extr',
       'childre_live_with','student_statu','family_statu','medical_statu')
       ->orderBy('id', 'DESC')
       ->get();
       return view('Student.child.child')->with($child);
       //use (with) for passing the data with select
    }
    public function messages_student_children()
    {
    return $messages_student_children = [
        'student_id.required' => '!!',
        'childre_name.required' => 'لم يتم ادخال اسم الطفل   !!',
        'childre_age.required' => 'لم يتم ادخال العمر   !!',
        'childre_gender.required' => 'لم يتم ادخال الجنس   !!',
        'childre_educa_leve.required'  => 'لم يتم ادخال المرحلة الدراسية    !!',
        'childre_class_number.required'  => 'لم يتم ادخال  رقم الصف الدراسي   !!',
        'childre_id_extr.required'  => 'لم يتم ادخال  لهوية الشخصية  !!',
        'childre_live_with.required'  => 'لم يتم ادخال معلومات خانة  هل يعيشون معكم  !!',


    ];
    }

    public function store_student_children(Request $request)
    {

        $messages = $this->messages_student_children();
        $this->validate($request,[
            'student_id' => 'required',
            'childre_name' => 'required',
            'childre_age' => 'required',
            'childre_gender' => 'required',
            'childre_educa_leve' => 'required',
            'childre_class_number' => 'required',
            'childre_id_extr' => 'required',
            'childre_live_with' => 'required'
         ],$messages);

         //create new object of the model student and make mapping to the data
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;
         $x = $students->child_statu;
         ++$x;
         $students->child_statu = $x;

         $Childrens = new Children;
         $Childrens -> student_id = $request->student_id;
         $Childrens -> childre_name = $request->childre_name;
         $Childrens -> childre_age = $request->childre_age;
         $Childrens -> childre_gender = $request->childre_gender;
         $Childrens -> childre_educa_leve = $request->childre_educa_leve;
         $Childrens -> childre_class_number = $request->childre_class_number;
         $Childrens -> childre_id_extr = $request->childre_id_extr;
         $Childrens -> childre_live_with = $request->childre_live_with;
         //write to the data base
         $students->save();
         $Childrens ->save();
         session()->flash('Add_Child', 'تم اضافة طفل للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('student.show'));

    }
    public function messages_update()
    {
    return $messages_update = [
        'student_id.required' => '!!',
        'id.required' => '!!',
        'childre_name.required' => 'لم يتم ادخال اسم الطفل   !!',
        'childre_age.required' => 'لم يتم ادخال العمر   !!',
        'childre_gender.required' => 'لم يتم ادخال الجنس   !!',
        'childre_educa_leve.required'  => 'لم يتم ادخال المرحلة الدراسية    !!',
        'childre_class_number.required'  => 'لم يتم ادخال  رقم الصف الدراسي   !!',
        'childre_id_extr.required'  => 'لم يتم ادخال  لهوية الشخصية  !!',
        'childre_live_with.required'  => 'لم يتم ادخال معلومات خانة  هل يعيشون معكم  !!',


    ];
    }
    public function update(Request $request)
    {
        $messages = $this->messages_update();
        $this->validate($request,[
            'student_id' => 'required',
            'id' => 'required',
            'childre_name' => 'required',
            'childre_age' => 'required',
            'childre_gender' => 'required',
            'childre_educa_leve' => 'required',
            'childre_class_number' => 'required',
            'childre_id_extr' => 'required',
            'childre_live_with' => 'required'
        ],$messages);
        //create new object of the model student and make mapping to the data
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;
         $Childrens =  Children::find($request->id);
         $Childrens -> student_id = $request->student_id;
         $Childrens -> childre_name = $request->childre_name;
         $Childrens -> childre_age = $request->childre_age;
         $Childrens -> childre_gender = $request->childre_gender;
         $Childrens -> childre_educa_leve = $request->childre_educa_leve;
         $Childrens -> childre_class_number = $request->childre_class_number;
         $Childrens -> childre_id_extr = $request->childre_id_extr;
         $Childrens -> childre_live_with = $request->childre_live_with;
         //write to the data base
         $Childrens ->save();
         session()->flash('Edit', 'تم تعديل بيانات الطفل '. $request->childre_name.' للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('children.show'));
    }

    public function destroy(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $students =  Student::find($request->student_id);
        $x = $students->child_statu;
        --$x;
        $students->child_statu = $x;
        $student_name = $students->student_name;

        Children::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف معلومات الطفل  '.$request->childre_name.' الخاصة بالطالب  '. $student_name .' بنجاح ');
        $students->save();
        return redirect(route('children.show'));
    }

/////////////////////////////////////////////////////////// Student end////////////////////////////////////////


/////////////////////////////////////////////////////////// Family Start////////////////////////////////////////

    public function show_family($id){
      $child = Children::where('family_id', $id)->get();
     // $child = DB::table('childrens')->where('student_id', $id)->get();
       return view('family.child.child_family',compact('child'));
       // using compant with where
       //->with($child);

    }

    public function index_family()
    {
       $child = Children::all();
       return view('family.child.child_family',compact('child'));//->with($child);//
    }
    public function messages_family_children()
    {
    return $messages_family_children = [
        'family_id.required' => '!!',
        'childre_name.required' => 'لم يتم ادخال اسم الطفل   !!',
        'childre_age.required' => 'لم يتم ادخال العمر   !!',
        'childre_gender.required' => 'لم يتم ادخال الجنس   !!',
        'childre_educa_leve.required'  => 'لم يتم ادخال المرحلة الدراسية    !!',
        'childre_class_number.required'  => 'لم يتم ادخال  رقم الصف الدراسي   !!',
        'childre_id_extr.required'  => 'لم يتم ادخال  لهوية الشخصية  !!',
        'medical_stat.required'  => 'لم يتم ادخال  الحالة الصحية  !!',
        'status.required'  => 'لم يتم ادخال  الحالة الأجتماعية  !!',
        'childre_live_with.required'  => 'لم يتم ادخال معلومات خانة  هل يعيشون معكم  !!',


    ];
    }
    public function store_family_children(Request $request)
    {
        $messages = $this->messages_family_children();
        $this->validate($request,[
            'family_id' => 'required',
            'childre_name' => 'required',
            'childre_age' => 'required',
            'childre_gender' => 'required',
            'childre_educa_leve' => 'required',
            'childre_class_number' => 'required',
            'medical_stat' => 'required',
            'status' => 'required',
            'childre_id_extr' => 'required',
            'childre_live_with' => 'required'
        ],$messages);
        //create new object of the model student and make mapping to the data
         $familys =  Family::find($request->family_id);
         $family_Constraint = $familys->family_Constraint;
         $x = $familys->child_statu;
         ++$x;
         $familys->child_statu = $x;
         $Childrens = new Children;
         $Childrens -> family_id = $request->family_id;
         $Childrens -> childre_name = $request->childre_name;
         $Childrens -> status = $request->status;
         $Childrens -> childre_age = $request->childre_age;
         $Childrens -> childre_gender = $request->childre_gender;
         $Childrens -> childre_educa_leve = $request->childre_educa_leve;
         $Childrens -> childre_class_number = $request->childre_class_number;
         $Childrens -> medical_stat = $request->medical_stat;
         $Childrens -> childre_id_extr = $request->childre_id_extr;
         $Childrens -> childre_live_with = $request->childre_live_with;
         //write to the data base
         $familys->save();
         $Childrens ->save();
         session()->flash('Add_Child', 'تم اضافة طفل للعائلة  '. $family_Constraint .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('family.show'));

    }
    public function messages_update_family_children()
    {
    return $messages_update_family_children = [
        'family_id.required' => '!!',
        'id.required' => '!!',
        'childre_name.required' => 'لم يتم ادخال اسم الطفل   !!',
        'childre_age.required' => 'لم يتم ادخال العمر   !!',
        'childre_gender.required' => 'لم يتم ادخال الجنس   !!',
        'childre_educa_leve.required'  => 'لم يتم ادخال المرحلة الدراسية    !!',
        'childre_class_number.required'  => 'لم يتم ادخال  رقم الصف الدراسي   !!',
        'status.required'  => 'لم يتم ادخال  الحالة الأجتماعية  !!',
        'childre_id_extr.required'  => 'لم يتم ادخال  لهوية الشخصية  !!',
        'childre_live_with.required'  => 'لم يتم ادخال معلومات خانة  هل يعيشون معكم  !!',


    ];
    }
    public function update_family(Request $request)
    {
        $messages = $this->messages_update_family_children();
        $this->validate($request,[
            'family_id' => 'required',
            'id' => 'required',
            'childre_name' => 'required',
            'childre_age' => 'required',
            'childre_gender' => 'required',
            'medical_stat' => 'required',
            'childre_educa_leve' => 'required',
            'status' => 'required',
            'childre_class_number' => 'required',
            'childre_id_extr' => 'required',
            'childre_live_with' => 'required'
        ],$messages);

         //create new object of the model student and make mapping to the data
         $familys =  Family::find($request->family_id);
         $family_Constraint = $familys->family_Constraint;
         $Childrens =  Children::find($request->id);
         $Childrens -> family_id = $request->family_id;
         $Childrens -> childre_name = $request->childre_name;
         $Childrens -> childre_age = $request->childre_age;
         $Childrens -> medical_stat = $request->medical_stat;
         $Childrens -> status = $request->status;
         $Childrens -> childre_gender = $request->childre_gender;
         $Childrens -> childre_educa_leve = $request->childre_educa_leve;
         $Childrens -> childre_class_number = $request->childre_class_number;
         $Childrens -> childre_id_extr = $request->childre_id_extr;
         $Childrens -> childre_live_with = $request->childre_live_with;
         //write to the data base
         $Childrens ->save();
         session()->flash('Edit', 'تم تعديل بيانات الطفل '. $request->childre_name.' للعائلة  '. $family_Constraint .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('children.show.family'));
    }

    public function delete_family(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $familys =  Family::find($request->family_id);
        $x = $familys->child_statu;
        --$x;
        $familys->child_statu = $x;
        $family_Constraint = $familys->family_Constraint;

        Children::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف معلومات الطفل  '.$request->family_Constraint.' الخاصة بالعائلة  '. $family_Constraint .' بنجاح ');
        $familys->save();
        return redirect(route('children.show.family'));
    }
/////////////////////////////////////////////////////////// Family End////////////////////////////////////////


    public function show_medical($id){
      $child = Children::where('medical_id', $id)->get();
     // $child = DB::table('childrens')->where('student_id', $id)->get();
       return view('medical.child.child_medical',compact('child'));
       // using compant with where
       //->with($child);

    }

    public function index_medical()
    {
       $child = Children::all();
       return view('medical.child.child_medical',compact('child'));//->with($child);//
    }
    public function messages_medical_children()
    {
    return $messages_medical_children = [
        'medical_id.required' => '!!',
        'childre_name.required' => 'لم يتم ادخال اسم الطفل   !!',
        'childre_age.required' => 'لم يتم ادخال العمر   !!',
        'childre_gender.required' => 'لم يتم ادخال الجنس   !!',
        'childre_educa_leve.required'  => 'لم يتم ادخال المرحلة الدراسية    !!',
        'childre_class_number.required'  => 'لم يتم ادخال  رقم الصف الدراسي   !!',
        'childre_id_extr.required'  => 'لم يتم ادخال  لهوية الشخصية  !!',
        'childre_live_with.required'  => 'لم يتم ادخال معلومات خانة  هل يعيشون معكم  !!',


    ];
    }
    public function store_medical_children(Request $request)
    {

        $messages = $this->messages_medical_children();
        $this->validate($request,[
            'medical_id' => 'required',
            'childre_name' => 'required',
            'childre_age' => 'required',
            'childre_gender' => 'required',
            'childre_educa_leve' => 'required',
            'childre_class_number' => 'required',
            'childre_id_extr' => 'required',
            'childre_live_with' => 'required'
        ],$messages);
        //create new object of the model student and make mapping to the data
         $medicals =  Medical::find($request->medical_id);
         $medical_name = $medicals->medical_name;
         $x = $medicals->child_statu;
         ++$x;
         $medicals->child_statu = $x;
         $Childrens = new Children;
         $Childrens -> medical_id = $request->medical_id;
         $Childrens -> childre_name = $request->childre_name;
         $Childrens -> childre_age = $request->childre_age;
         $Childrens -> childre_gender = $request->childre_gender;
         $Childrens -> childre_educa_leve = $request->childre_educa_leve;
         $Childrens -> childre_class_number = $request->childre_class_number;
         $Childrens -> childre_id_extr = $request->childre_id_extr;
         $Childrens -> childre_live_with = $request->childre_live_with;
         //write to the data base
         $medicals->save();
         $Childrens ->save();
         session()->flash('Add_Child', 'تم اضافة طفل للعائلة  '. $medical_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('medical.show'));

    }
    public function messages_update_medical()
    {
    return $messages_update_medical = [
        'medical_id.required' => '!!',
        'id.required' => '!!',
        'childre_name.required' => 'لم يتم ادخال اسم الطفل   !!',
        'childre_age.required' => 'لم يتم ادخال العمر   !!',
        'childre_gender.required' => 'لم يتم ادخال الجنس   !!',
        'childre_educa_leve.required'  => 'لم يتم ادخال المرحلة الدراسية    !!',
        'childre_class_number.required'  => 'لم يتم ادخال  رقم الصف الدراسي   !!',
        'childre_id_extr.required'  => 'لم يتم ادخال  لهوية الشخصية  !!',
        'childre_live_with.required'  => 'لم يتم ادخال معلومات خانة  هل يعيشون معكم  !!',


    ];
    }
    public function update_medical(Request $request)
    {
        $messages = $this->messages_update_medical();
        $this->validate($request,[
            'medical_id' => 'required',
            'id' => 'required',
            'childre_name' => 'required',
            'childre_age' => 'required',
            'childre_gender' => 'required',
            'childre_educa_leve' => 'required',
            'childre_class_number' => 'required',
            'childre_id_extr' => 'required',
            'childre_live_with' => 'required'
        ],$messages);

         //create new object of the model student and make mapping to the data
         $medicals =  medical::find($request->medical_id);
         $medical_Constraint = $medicals->medical_Constraint;
         $Childrens =  Children::find($request->id);
         $Childrens -> medical_id = $request->medical_id;
         $Childrens -> childre_name = $request->childre_name;
         $Childrens -> childre_age = $request->childre_age;
         $Childrens -> childre_gender = $request->childre_gender;
         $Childrens -> childre_educa_leve = $request->childre_educa_leve;
         $Childrens -> childre_class_number = $request->childre_class_number;
         $Childrens -> childre_id_extr = $request->childre_id_extr;
         $Childrens -> childre_live_with = $request->childre_live_with;
         //write to the data base
         $Childrens ->save();
         session()->flash('Edit', 'تم تعديل بيانات الطفل '. $request->childre_name.' للعائلة  '. $medical_Constraint .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('children.show.medical'));
    }

    public function delete_medical(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $medicals =  medical::find($request->medical_id);
        $x = $medicals->child_statu;
        --$x;
        $medicals->child_statu = $x;
        $medical_Constraint = $medicals->medical_Constraint;

        Children::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف معلومات الطفل  '.$request->medical_Constraint.' الخاصة بالعائلة  '. $medical_Constraint .' بنجاح ');
        $medicals->save();
        return redirect(route('children.show.medical'));
    }


}
