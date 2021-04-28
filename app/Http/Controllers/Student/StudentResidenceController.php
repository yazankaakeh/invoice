<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Student\StudentController;
use App\models\Student\Student;

use App\models\Student\Student_Residence;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class StudentResidenceController extends Controller
{


    public function storestudent(Request $request){
            $this->validate($request,[
            'student_id'=>'required',
            'stud_type_housing' => 'required',
            'stud_rent_housing' => 'required',
            'stud_Place_housing' => 'required',
            'stud_expen' => 'required',
            'stud_valu_expen' => 'required',
         ]);
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
        //
    }


    public function show(Student_Residence $student_Residence)
    {
        //
    }

    public function update(Request $request, Student_Residence $student_Residence)
    {
        //
    }

    public function destroy(Student_Residence $student_Residence)
    {
        //
    }
}
