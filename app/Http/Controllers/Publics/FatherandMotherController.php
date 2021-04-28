<?php

namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Student\StudentController;
use App\models\Student\Student;
use App\models\Publics\FatherandMother;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class FatherandMotherController extends Controller
{

    public function storestudent(Request $request)
    {
            $this->validate($request,[
            'student_id'=> 'required',
            'mother_name' => 'required',
            'mother_birth' => 'required',
            'mother_origin' => 'required',
            'mother_origin_city' => 'required',
            'mother_academicel' => 'required',
            'mother_special' => 'required',
            'mother_is_work' => 'required',
            'mother_now_work' => 'required',
            'mother_salary' => 'required',
            // ////////////////////////////////////////////////
            'father_name' => 'required',
            'father_birth' => 'required',
            'father_origin' => 'required',
            'father_origin_city' => 'required',
            'father_academicel' => 'required',
            'father_special' => 'required',
            'father_is_work' => 'required',
            'father_now_work' => 'required',
            'father_salary' => 'required'
         ]);
         //create new object of the model student and make mapping to the data
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;
         $x=1;
         $students->father_mother_statu = $x;
         $FatherandMothers = new FatherandMother;
         $FatherandMothers -> student_id = $request->student_id;
         $FatherandMothers -> mother_name = $request->mother_name;
         $FatherandMothers -> mother_birth = $request->mother_birth;
         $FatherandMothers -> mother_origin = $request->mother_origin;
         $FatherandMothers -> mother_origin_city = $request->mother_origin_city;
         $FatherandMothers -> mother_academicel = $request->mother_academicel;
         $FatherandMothers -> mother_special = $request->mother_special;
         $FatherandMothers -> mother_is_work = $request->mother_is_work;
         $FatherandMothers -> mother_now_work = $request->mother_now_work;
         $FatherandMothers -> mother_salary = $request->mother_salary;
         ///////////////////////////////////////////
         $FatherandMothers -> father_name = $request->father_name;
         $FatherandMothers -> father_birth = $request->father_birth;
         $FatherandMothers -> father_origin = $request->father_origin;
         $FatherandMothers -> father_origin_city = $request->father_origin_city;
         $FatherandMothers -> father_academicel = $request->father_academicel;
         $FatherandMothers -> father_special = $request->father_special;
         $FatherandMothers -> father_is_work = $request->father_is_work;
         $FatherandMothers -> father_now_work = $request->father_now_work;
         $FatherandMothers -> father_salary = $request->father_salary;
         //write to the data base
         $students->save();
         $FatherandMothers ->save();
         session()->flash('Add_fatherandmother',  'تم اضافة معلومات الأب و الأم للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('student.show'));

    }
    public function index()
    {
       $fath['fath'] = FatherandMother::select('id','mother_name','student_id','updated_at','mother_origin','mother_birth',
       'mother_origin_city','mother_academicel','mother_special','mother_is_work',
       'mother_now_work','mother_salary','father_name','father_birth',
       'father_origin','father_origin_city','father_academicel','father_special',
       'father_is_work','father_now_work','father_salary')
       ->orderBy('id', 'DESC')
       ->get();
       return view('Student.father_mother.father_mother')->with($fath);
    }


    public function update(Request $request)
    {
          $this->validate($request,[
              'id'=> 'required',
            'student_id'=> 'required',
            'mother_name' => 'required',
            'mother_birth' => 'required',
            'mother_origin' => 'required',
            'mother_origin_city' => 'required',
            'mother_academicel' => 'required',
            'mother_special' => 'required',
            'mother_is_work' => 'required',
            'mother_now_work' => 'required',
            'mother_salary' => 'required',
            // ////////////////////////////////////////////////
            'father_name' => 'required',
            'father_birth' => 'required',
            'father_origin' => 'required',
            'father_origin_city' => 'required',
            'father_academicel' => 'required',
            'father_special' => 'required',
            'father_is_work' => 'required',
            'father_now_work' => 'required',
            'father_salary' => 'required'
         ]);
         //create new object of the model student and make mapping to the data
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;
         $FatherandMothers =  FatherandMother::find($request->id);
         $FatherandMothers -> student_id = $request->student_id;
         $FatherandMothers -> mother_name = $request->mother_name;
         $FatherandMothers -> mother_birth = $request->mother_birth;
         $FatherandMothers -> mother_origin = $request->mother_origin;
         $FatherandMothers -> mother_origin_city = $request->mother_origin_city;
         $FatherandMothers -> mother_academicel = $request->mother_academicel;
         $FatherandMothers -> mother_special = $request->mother_special;
         $FatherandMothers -> mother_is_work = $request->mother_is_work;
         $FatherandMothers -> mother_now_work = $request->mother_now_work;
         $FatherandMothers -> mother_salary = $request->mother_salary;
         ///////////////////////////////////////////
         $FatherandMothers -> father_name = $request->father_name;
         $FatherandMothers -> father_birth = $request->father_birth;
         $FatherandMothers -> father_origin = $request->father_origin;
         $FatherandMothers -> father_origin_city = $request->father_origin_city;
         $FatherandMothers -> father_academicel = $request->father_academicel;
         $FatherandMothers -> father_special = $request->father_special;
         $FatherandMothers -> father_is_work = $request->father_is_work;
         $FatherandMothers -> father_now_work = $request->father_now_work;
         $FatherandMothers -> father_salary = $request->father_salary;
         //write to the data base
         $FatherandMothers ->save();
         session()->flash('Edit', 'تم تعديل تفاصيل الأب و الأم للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('FatherandMother.show'));

    }

    public function destroy(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $students =  Student::find($request->student_id);
        $x=0;
        $students->father_mother_statu = $x;
        $student_name = $students->student_name;



        FatherandMother::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف معلومات الأم و الأب الخاصة بالطالب  '. $student_name .' بنجاح ');
        $students->save();
        return redirect(route('FatherandMother.show'));
    }
}
