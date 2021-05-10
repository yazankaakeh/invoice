<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Student\StudentController;
use App\models\Medical\Medical;
use App\models\Family\Family;
use App\models\Student\Student;
use App\models\Payment\Student_Payment;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;



class StudentPaymentController extends Controller
{
///////////////////////////////////////////////////// Student Start  //////////////////////////////////////

    public function show($id){
      $payments = Student_Payment::where('student_id', $id)->get();
     // $child = DB::table('childrens')->where('student_id', $id)->get();
       return view('payments.student_payments',compact('payments'));
    }

    public function index()
    {
        $payments = Student_Payment::with('student')->get();
       return view('payments.student_payments',compact("payments"));//->with($payments)
    }

    public function storestudent(Request $request)
    {
        $this->validate($request,[
            'value' => 'required',
            'id'=> 'required',
            'note'=> 'required',
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
            'value' => 'required',
            'note' => 'required',
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
         //redirect after adding and saving the data with succeass msg ->with('SuccessMsg', 'You Have added Student Successfully')
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
    
///////////////////////////////////////////////////// Student End  //////////////////////////////////////


///////////////////////////////////////////////////// Family Start //////////////////////////////////////

    public function store_family(Request $request)
    {
        $this->validate($request,[
            'family_value' => 'required',
            'id'=> 'required'
         ]);

         //create new object of the model student and make mapping to the data
         $families =  Family::find($request->id);
         $x = $families->pay_statu;
         ++$x;
         $families->pay_statu = $x;
         $family_name = $families->family_Constraint;
         $payments = new Student_Payment;
         $payments -> family_value = $request->family_value;
         $payments -> note = $request->note;
         $payments -> family_id = $request->id;


         //write to the data base
         $families ->save();
         $payments ->save();
         session()->flash('Add Money','تم اضافة مبلغ مالي للعائلة  '. $family_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('family.show'));
    }

    public function family_ind()
    {
        $payments['payments'] = Student_Payment::select('id','family_value','family_id','updated_at','note')
        ->orderBy('id', 'DESC')
        ->get();
        return view('payments.family_payments')->with($payments);//
    }

    public function show_family($id){
      $payments = Student_Payment::where('family_id', $id)->get();
     // $child = DB::table('childrens')->where('student_id', $id)->get();
       return view('payments.family_payments',compact('payments'));
    }

    public function update_family(Request $request)
    {
        $this->validate($request, [
            'family_value' => 'required',
            'family_id' => 'required',
            'id' => 'required',

        ]);
         //create new object of the model student and make mapping to the data ::find($request->id);
         $family =  Family::find($request->family_id);
         $family_Constraint = $family->family_Constraint;
         $payments =  Student_Payment::find($request->id);
         $payments -> family_id = $request -> family_id;
         $payments -> note = $request->note;
         $payments -> family_value = $request->family_value;
                                     
         //write to the data base
         $payments ->save();
         session()->flash('Edit', 'تم تعديل المبلغ المالي للعائلة  '. $family_Constraint .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('show.family.pay'));
    }

    public function destroy_familys(request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $family =  Family::find($request->family_id);
        $x = $family->pay_statu;
        --$x;
        $family->pay_statu = $x;
        $family_Constraint = $family->family_Constraint;
        Student_Payment::find($request->id)->delete();
        $family->save();

        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف المبلغ المالي للعائلة  '. $family_Constraint .' بنجاح ');
        return redirect(route('show.family.pay'));
    }

///////////////////////////////////////////////////// Family End //////////////////////////////////////


///////////////////////////////////////////////////// Medical Start //////////////////////////////////////

    public function store_medical(Request $request)
    {
        $this->validate($request,[
            'medical_value' => 'required',
            'id'=> 'required'
         ]);

         //create new object of the model student and make mapping to the data
         $medicals =  Medical::find($request->id);
         $x = $medicals->pay_statu;
         ++$x;
         $medicals->pay_statu = $x;
         $medical_name = $medicals->medical_name;
         $payments = new Student_Payment;
         $payments -> medical_value = $request->medical_value;
         $payments -> note = $request->note;
         $payments -> medical_id = $request->id;


         //write to the data base
         $medicals ->save();
         $payments ->save();
         session()->flash('Add Money','تم اضافة مبلغ مالي للمريض  '. $medical_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('medical.show'));
    }

    public function medical_ind()
    {
        $payments['payments'] = Student_Payment::select('id','medical_value','medical_id','updated_at','note')
        ->orderBy('id', 'DESC')
        ->get();
        return view('payments.medical_payments')->with($payments);//
    }

    public function show_medical($id){
      $payments = Student_Payment::where('medical_id', $id)->get();
     // $child = DB::table('childrens')->where('student_id', $id)->get();
    // dd($payments);
       return view('payments.medical_payments',compact('payments'));
    }

    public function update_medical(Request $request)
    {
        $this->validate($request, [
            'medical_value' => 'required',
            'medical_id' => 'required',
            'id' => 'required',

        ]);
         //create new object of the model student and make mapping to the data ::find($request->id);
         $medicals =  Medical::find($request->medical_id);
         $medical_name = $medicals->medical_name;
         $payments =  Student_Payment::find($request->id);
         $payments -> medical_id = $request -> medical_id;
         $payments -> note = $request->note;
         $payments -> medical_value = $request->medical_value;
                                     
         //write to the data base
         $payments ->save();
         session()->flash('Edit', 'تم تعديل المبلغ المالي للمريض  '. $medical_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('show.medical.pay'));
    }

    public function destroy_medical(request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $medicals =  Medical::find($request->medical_id);
        $x = $medicals->pay_statu;
        --$x;
        $medicals->pay_statu = $x;
        $medical_name = $medicals->medical_name;
        Student_Payment::find($request->id)->delete();
        $medicals->save();

        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف المبلغ المالي للمريض  '. $medical_name .' بنجاح ');
        return redirect(route('show.medical.pay'));
    }

///////////////////////////////////////////////////// Medical End //////////////////////////////////////


}
