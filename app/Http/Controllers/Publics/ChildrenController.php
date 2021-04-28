<?php

namespace App\Http\Controllers\Publics;
use App\Http\Controllers\Student\StudentController;
use App\models\Student\Student;

use App\models\Publics\Children;
use Illuminate\Http\Request;


use App\Http\Controllers\Controller;

class ChildrenController extends Controller
{

    public function index()
    {
        $child['child'] = Children::select('id','student_id','updated_at','childre_name','childre_age',
       'childre_gender','childre_educa_leve','childre_class_number','childre_id_extr',
       'childre_live_with')
       ->orderBy('id', 'DESC')
       ->get();
       return view('Student.child.child')->with($child);
    }

    public function store_student_children(Request $request){
            $this->validate($request,[
            'student_id' => 'required',
            'childre_name' => 'required',
            'childre_age' => 'required',
            'childre_gender' => 'required',
            'childre_educa_leve' => 'required',
            'childre_class_number' => 'required',
            'childre_id_extr' => 'required',
            'childre_live_with' => 'required'
         ]);
         //create new object of the model student and make mapping to the data
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;
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
         $Childrens ->save();
         session()->flash('Add_Child', 'تم اضافة طفل للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('student.show'));

    }

    public function show($id){
      $child = Children::where('student_id', $id)->get();
      return view('Student.child.child_show',compact('child'));
    }

    public function update(Request $request)
    {
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
         ]);
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
         session()->flash('Add', 'تم تعديل بيانات الطفل '. $request->childre_name.' للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('children.show'));
    }

    public function destroy(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $students =  Student::find($request->student_id);
        // $x=0;
        // $students->husband_wife_statu = $x;
        $student_name = $students->student_name;

        Children::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف معلومات الطفل  '.$request->childre_name.' الخاصة بالطالب  '. $student_name .' بنجاح ');
        // $students->save();
        return redirect(route('children.show'));
    }
}
