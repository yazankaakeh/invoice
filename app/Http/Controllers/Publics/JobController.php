<?php

namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Student\StudentController;
use App\models\Student\Student;
use App\models\Publics\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class JobController extends Controller
{


    public function storestudent(Request $request){
            $this->validate($request,[
            'student_id'=>'required',
            'job_have' => 'required',
            'job_type' => 'required',
            'job_place' => 'required',
            'job_monthly_salary' => 'required',
            'job_last_have' => 'required',
            'job_last_type' => 'required',
            'job_last_salary' => 'required'
         ]);
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

    public function update(Request $request)
    {
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
         ]);
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
      $Jobs = Job::where('student_id', $id)->get();
      return view('Student.job.job_show',compact('Jobs'));
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
}
