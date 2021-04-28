<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Student\StudentController;
use App\models\Student\Student;
use App\models\Student\Quran;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;


class QuranController extends Controller
{

    public function storestudent(Request $request){
            $this->validate($request,[
            'student_id'=>'required',
            'quran_memorize' => 'required',
            'quran_parts' => 'required',
            'quran_teacher' => 'required',
            'quran_have_certif' => 'required',
            'quran_Certif_essuer' => 'required',
            'quran_with_Certif' => 'required'
         ]);
         //create new object of the model student and make mapping to the data
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;
         $x=1;
         $students->quran_statu = $x;
         $quran = new Quran;
         $quran ->student_id = $request->student_id;
         $quran -> quran_memorize = $request->quran_memorize;
         $quran -> quran_parts = $request->quran_parts;
         $quran -> quran_teacher = $request->quran_teacher;
         $quran -> quran_have_certif = $request->quran_have_certif;
         $quran -> quran_Certif_essuer = $request->quran_Certif_essuer;
         $quran -> quran_with_Certif = $request->quran_with_Certif;
         //write to the data base
         $students->save();
         $quran ->save();
         session()->flash('Add_Quran',  'تم اضافة معلومات القرآن للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('student.show'));

    }


    public function index()
    {
        $qurans['qurans'] = Quran::select('id','student_id','updated_at','quran_memorize','quran_parts',
       'quran_teacher','quran_have_certif','quran_Certif_essuer','quran_with_Certif')
       ->orderBy('id', 'DESC')
       ->get();
       return view('Student.quran.quran')->with($qurans);
    }



    public function show($id)
    {
      $qurans = Quran::where('student_id', $id)->get();
      return view('Student.quran.quran_show',compact('qurans'));
    }


    public function update(Request $request)
    {
        $this->validate($request,[
            'student_id'=>'required',
            'quran_memorize' => 'required',
            'quran_parts' => 'required',
            'quran_teacher' => 'required',
            'quran_have_certif' => 'required',
            'quran_Certif_essuer' => 'required',
            'quran_with_Certif' => 'required'
         ]);
         //create new object of the model student and make mapping to the data
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;
         $quran =  Quran::find($request->id);
         $quran ->student_id = $request->student_id;
         $quran -> quran_memorize = $request->quran_memorize;
         $quran -> quran_parts = $request->quran_parts;
         $quran -> quran_teacher = $request->quran_teacher;
         $quran -> quran_have_certif = $request->quran_have_certif;
         $quran -> quran_Certif_essuer = $request->quran_Certif_essuer;
         $quran -> quran_with_Certif = $request->quran_with_Certif;
         //write to the data base
         $quran ->save();
         session()->flash('Edit',  'تم تعديل معلومات القرآن للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('Quran.show'));
    }

    public function destroy(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $students =  Student::find($request->student_id);
        $x=0;
        $students->quran_statu = $x;
        $student_name = $students->student_name;



        Quran::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف معلومات القرآن الخاصة بالطالب  '. $student_name .' بنجاح ');
        $students->save();
        return redirect(route('job.show'));
    }
}
