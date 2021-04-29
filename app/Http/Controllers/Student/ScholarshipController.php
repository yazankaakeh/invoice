<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Student\StudentController;
use App\models\Student\Student;
use App\models\Student\Scholarship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ScholarshipController extends Controller
{

    public function storestudent(Request $request){
            $this->validate($request,[
            'student_id'=>'required',
            'scholar_name' => 'required',
            'scholar_type' => 'required',
            'scholar_value' => 'required',
            'scholar_source' => 'required'
         ]);
         //create new object of the model student and make mapping to the data
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;
         $x=1;
         $students->scholarship_statu = $x;
         $scholarships = new Scholarship;
         $scholarships -> student_id = $request->student_id;
         $scholarships -> scholar_name = $request->scholar_name;
         $scholarships -> scholar_type = $request->scholar_type;
         $scholarships -> scholar_value = $request->scholar_value;
         $scholarships -> scholar_source = $request->scholar_source;
         //write to the data base
         $students->save();
         $scholarships ->save();
         session()->flash('Add_Scholarship',  'تم اضافة المنحة للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('student.show'));


    }
    public function index()
    {
        $schol['schol'] = Scholarship::select('id','student_id','updated_at','scholar_name','scholar_type','scholar_value',
       'scholar_source')
       ->orderBy('id', 'DESC')
       ->get();
       return view('Student.scholarship.scholarship')->with($schol);    
    }

 

    public function update(Request $request){
            $this->validate($request,[
            'student_id'=>'required',
            'id'=>'required',
            'scholar_name' => 'required',
            'scholar_type' => 'required',
            'scholar_value' => 'required',
            'scholar_source' => 'required'
         ]);
         //create new object of the model student and make mapping to the data
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;

         $scholarships =  Scholarship::find($request->id);
         $scholarships -> student_id = $request->student_id;
         $scholarships -> scholar_name = $request->scholar_name;
         $scholarships -> scholar_type = $request->scholar_type;
         $scholarships -> scholar_value = $request->scholar_value;
         $scholarships -> scholar_source = $request->scholar_source;
         //write to the data base

         $scholarships ->save();
         session()->flash('Edit',  'تم تعديل المنحة للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('Scholarship.show'));
    } 



    public function show($id){
      $schol = Scholarship::where('student_id', $id)->get();
      return view('Student.scholarship.scholarship',compact('schol'));
    }


    public function destroy(Request $request)
    {
              /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $students =  Student::find($request->student_id);
        $x=0;
        $students->scholarship_statu = $x;
        $student_name = $students->student_name;
        Scholarship::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف معلومات المنحة الخاصة بالطالب  '. $student_name .' بنجاح ');
        $students->save();
        return redirect(route('Scholarship.show'));
    }
}
