<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Student\StudentController;
use App\models\Student\Student;

use App\models\Student\Student_Residence;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class StudentResidenceController extends Controller
{

function __construct()
{
$this->middleware('permission: قسم سكن الطلاب ', ['only' => ['index']]);
$this->middleware('permission: قسم سكن الطلاب ', ['only' => ['show']]);
$this->middleware('permission: اضافة سكن الطلاب ', ['only' => ['storestudent']]);
$this->middleware('permission: تعديل قسم سكن الطلاب ', ['only' => ['update']]);
$this->middleware('permission:حذف قسم سكن الطلاب ', ['only' => ['destroy']]);


}
public function messages_storestudent()
{
    return $messages_storestudent = [
        'student_id.required' => '',
        'stud_type_housing.required' => 'لم يتم ادخال معلومات نوع السكن  !!',
        'stud_rent_housing.required' => 'لم يتم ادخال معلومات ايجار السكن !!',
        'stud_Place_housing.required'=>'لم يتم ادخال معلومات موقع السكن !!',
        'stud_expen.required'=>'لم يتم ادخال معلومات مصاريف السكن !!',
        'stud_valu_expen.required'=>'لم يتم ادخال معلومات  قيمة السكن !!',


    ];
}
    public function storestudent(Request $request)
    {

             $messages = $this->messages_storestudent();
             $this->validate($request,[
            'student_id'=>'required',
            'stud_type_housing' => 'required',
            'stud_rent_housing' => 'required',
            'stud_Place_housing' => 'required',
            'stud_expen' => 'required',
            'stud_valu_expen' => 'required',
        ],$messages);

         //create new object of the model student and make mapping to the data
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;
         $x=1;
         $students->residance_statu = $x;
         $StudentResidences = new Student_Residence;
         $StudentResidences -> student_id = $request->student_id;
         $StudentResidences -> stud_type_housing = $request->stud_type_housing;
         $StudentResidences -> stud_rent_housing = $request->stud_rent_housing;
         $StudentResidences -> stud_Place_housing = $request->stud_Place_housing;
         $StudentResidences -> stud_expen = $request->stud_expen;
         $StudentResidences -> stud_valu_expen = $request->stud_valu_expen;
         //write to the data base
         $students->save();
         $StudentResidences ->save();
         session()->flash('Add_StudentResidences',  'تم اضافة سكن  للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('student.show'));

    }

    public function index()
    {
        $res['res'] = Student_Residence::select('id','student_id','updated_at','stud_type_housing','stud_rent_housing',
       'stud_Place_housing','stud_expen','stud_valu_expen')
       ->orderBy('id', 'DESC')
       ->get();
       return view('student.student_res.student_res')->with($res);
    }


    public function show($id)
    {
      $res = Student_Residence::where('student_id', $id)->get();
      return view('Student.student_res.student_res',compact('res'));
    }
    public function messages_storestuden_updatet()
    {
        return $messages_storestuden_updatet = [
            'student_id.required' => '',
            'stud_type_housing.required' => 'لم يتم ادخال معلومات نوع السكن  !!',
            'stud_rent_housing.required' => 'لم يتم ادخال معلومات ايجار السكن !!',
            'stud_Place_housing.required'=>'لم يتم ادخال معلومات موقع السكن !!',
            'stud_expen.required'=>'لم يتم ادخال معلومات مصاريف السكن !!',
            'stud_valu_expen.required'=>'لم يتم ادخال معلومات  قيمة السكن !!',


        ];
    }
    public function update(Request $request, Student_Residence $student_Residence)
    {
            $messages = $this->messages_storestuden_updatet();
            $this->validate($request,[
            'student_id'=>'required',
            'stud_type_housing' => 'required',
            'stud_rent_housing' => 'required',
            'stud_Place_housing' => 'required',
            'stud_expen' => 'required',
            'stud_valu_expen' => 'required',
        ],$messages);

         //create new object of the model student and make mapping to the data
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;
         $StudentResidences = Student_Residence::find($request->id);
         $StudentResidences -> student_id = $request->student_id;
         $StudentResidences -> stud_type_housing = $request->stud_type_housing;
         $StudentResidences -> stud_rent_housing = $request->stud_rent_housing;
         $StudentResidences -> stud_Place_housing = $request->stud_Place_housing;
         $StudentResidences -> stud_expen = $request->stud_expen;
         $StudentResidences -> stud_valu_expen = $request->stud_valu_expen;
         //write to the data base
         $StudentResidences ->save();
         session()->flash('Edit',  'تم تعديل سكن  للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('Student_Residence.show'));
    }

    public function destroy(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $students =  Student::find($request->student_id);
        $x=0;
        $students->residance_statu = $x;
        $student_name = $students->student_name;
        Student_Residence::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف معلومات السكن الخاصة بالطالب  '. $student_name .' بنجاح ');
        $students->save();
        return redirect(route('Student_Residence.show'));
    }
}
