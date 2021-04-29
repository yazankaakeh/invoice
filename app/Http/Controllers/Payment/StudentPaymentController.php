<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Student\StudentController;
use App\models\Student\Student;
use App\models\Payment\Student_Payment;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;



class StudentPaymentController extends Controller
{


    public function show($id){
      $payments = Student_Payment::where('student_id', $id)->get();
     // $child = DB::table('childrens')->where('student_id', $id)->get();
       return view('payments.student_payments',compact('payments'));
       // using compant with where 
       //->with($child);

    }

    public function index()
    {
       $payments['payments'] = Student_Payment::select('id','value','student_id','updated_at','note')
       ->orderBy('id', 'DESC')
       ->get();

       //dd($payments['payments']);
       return view('payments.student_payments')->with($payments);//
    }


    public function storestudent(Request $request)
    {
        $this->validate($request,[
            'value' => 'required',
            'id'=> 'required'
         ]);

         //create new object of the model student and make mapping to the data
         $students =  Student::find($request->id);
         $x = $students->pay_statu;
         ++$x;
         $students->pay_statu = $x;
         $student_name = $students->student_name;
         $payments = new Student_Payment;
         $payments -> value = $request->value;
         $payments -> note = $request->note;
         $payments -> student_id = $request->id;


         //write to the data base
         $payments ->save();
         $students ->save();
         session()->flash('Add Money','تم اضافة مبلغ مالي للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('student.show'));
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'value' => 'required'
        ]);
         //create new object of the model student and make mapping to the data ::find($request->id);
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;
         $payments =  Student_Payment::find($request->id);
         $payments -> student_id = $request -> student_id;
         $payments -> note = $request->note;
         $payments -> value = $request->value;

         //write to the data base
         $payments ->save();
         session()->flash('Edit', 'تم تعديل المبلغ المالي للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('pay.show'));
    }

    public function destroy(request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $students =  Student::find($request->student_id);
        $x = $students->pay_statu;
        --$x;
        $students->pay_statu = $x;
        $student_name = $students->student_name;
        Student_Payment::find($request->id)->delete();
        $students->save();

        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف المبلغ المالي للطالب  '. $student_name .' بنجاح ');
        return redirect(route('pay.show'));
    }
}
