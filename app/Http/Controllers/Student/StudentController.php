<?php

namespace App\Http\Controllers\Student ;

use App\models\Student\Student;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::all();

        return view('Student.students.students',compact('students'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'student_name' => 'required',
            'birthday' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'age' => 'required',
            'county_are_from' => 'required',
            'city_name' => 'required',
            'stu_Cur_housing' => 'required',
            'entry_turkey' => 'required',
            'Identity_type' => 'required',
            'Id_stud_source' => 'required'
         ]);
         //create new object of the model student and make mapping to the data
         $students = new Student;
         $students -> student_name = $request->student_name;
         $students -> birthday = $request->birthday;
         $students -> email = $request->email;
         $students -> phone = $request->phone;
         $students -> age = $request->age;
         $students -> county_are_from = $request->county_are_from;
         $students -> city_name = $request->city_name;
         $students -> stu_Cur_housing = $request->stu_Cur_housing;
         $students -> entry_turkey = $request->entry_turkey;
         $students -> Identity_type = $request->Identity_type;
         $students -> Id_stud_source = $request->Id_stud_source;
         $students -> gender = $request->gender;

         //write to the data base
         $students ->save();
         session()->flash('Add', 'تم اضافة الطالب بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('student.show'));
    }


    public function update(Request $request)
    {
        //we write this code with id validation to make sure it the same id and also allow the user to rename the same name for edite
        $id = $request->id;
        $this->validate($request, [
            'student_name' => 'required',
            'birthday' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'age' => 'required',
            'county_are_from' => 'required',
            'city_name' => 'required',
            'stu_Cur_housing' => 'required',
            'entry_turkey' => 'required',
            'Identity_type' => 'required',
            'Id_stud_source' => 'required'
        ]);
         //create new object of the model student and make mapping to the data ::find($request->id);
         $students =  Student::find($request->id);
         $students -> student_name = $request->student_name;
         $students -> birthday = $request->birthday;
         $students -> email = $request->email;
         $students -> phone = $request->phone;
         $students -> age = $request->age;
         $students -> county_are_from = $request->county_are_from;
         $students -> city_name = $request->city_name;
         $students -> stu_Cur_housing = $request->stu_Cur_housing;
         $students -> entry_turkey = $request->entry_turkey;
         $students -> Identity_type = $request->Identity_type;
         $students -> Id_stud_source = $request->Id_stud_source;


         //write to the data base
         $students ->save();
         session()->flash('Edit', 'تم تعديل الطالب بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('student.show'));

    }

    public function destroy(request $request)
    {
               /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        Student::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete', 'تم حذف القسم بنجاح ');
        return redirect(route('student.show'));
    }

    public function register(){
        return view('students.register');
    }
}
