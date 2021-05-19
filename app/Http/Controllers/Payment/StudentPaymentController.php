<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Student\StudentController;
use App\models\Medical\Medical;
use App\models\Family\Family;
use App\models\Payment\Income;
use Illuminate\Support\Facades\DB;
use App\models\Student\Student;
use App\models\Payment\Student_Payment;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
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
       $payments_income = Income::select('value_bim')->distinct()->get();
       $payments = Student_Payment::with('student')->get();
       return view('payments.student_payments',compact("payments",'payments_income'));//->with($payments)
    }

    public function storestudent(Request $request)
    {
        $this->validate($request,[
            'value' => 'required',
            'id'=> 'required',
            'value_euro'=> 'required',
            'value_usd'=> 'required',
            'number_bim_student'=> 'required',
            'value_bim_student'=> 'required',
            'note'=> 'required',
         ]);
        $s;
        $payments_cut = Income::where('value_bim',$request->value_bim_student )
        ->having('number_bim', '>', 0)
        ->get();
            dd($payments_cut);
        if ($payments_cut->number_bim != 0) {

        $s= $payments_cut->number_bim;
        $a=$request->number_bim_student;
        //dd($a);
        $m = $s - $a;
        if ($m < 0) {
        session()->flash('Warning','يامنيوك المبلغ المضاف غير كافي بقيمة الكروت يرجى الدفع على دفعتين القيمة المتبقية بالكرت هية:  '.$payments_cut->number_bim.'');
            //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
        return redirect(route('student.show')); 
        }
        else {
            $payments_cut->number_bim = $m;
        }
        $payments_cut->save();

        }
      
         //create new object of the model student and make mapping to the data
         $students =  Student::find($request->id);
         $x = $students->pay_statu;
         ++$x;
         $students->pay_statu = $x;
         $student_name = $students->student_name;
         $payments = new Student_Payment;
         $payments -> value = $request->value;
         $payments -> note = $request->note;
         $payments -> value_usd = $request->value_usd;
         $payments -> value_euro = $request->value_euro;      
         $payments -> value_bim_student = $request->value_bim_student;
         $payments -> number_bim_student = $request->number_bim_student;
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
            'value_euro'=> 'required',
            'value_usd'=> 'required',
            'note' => 'required',
            'value_bim_student' => 'required',
            'number_bim_student' => 'required',
        ]);
        if ($request->number_bim_student1 != $request->number_bim_student) {
    
        $payments_cut = Income::where('value_bim',$request->value_bim_student )
        ->get()
        ->first();
        $s= $payments_cut->number_bim;
        $a=$request->number_bim_student1;
        //dd($request->number_bim_student1);
        $m = $s + $a;
        $payments_cut->number_bim = $m;
        //dd($payments_cut->number_bim);
        $m =0;
        $s= $payments_cut->number_bim;
        $a=$request->number_bim_student;
        //dd($a);
        $m = $s - $a;
        //dd($m);
        
        if ($m < 0) {
        session()->flash('Warning','يامنيوك المبلغ المضاف غير كافي بقيمة الكروت يرجى الدفع على دفعتين القيمة المتبقية بالكرت هية:  '.$payments_cut->number_bim.'');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('pay.show')); 
        }
        else {
        $payments_cut->number_bim = $m;
        }
         $payments_cut ->save();
        }

        //dd($payments_cut->number_bim);
        //dd($payments_cut->number_bim);
         //create new object of the model student and make mapping to the data ::find($request->id);
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;
         $payments =  Student_Payment::find($request->id);
         $payments -> student_id = $request -> student_id;
         $payments -> note = $request->note;
         $payments -> value = $request->value;
         $payments -> value_usd = $request->value_usd;
         $payments -> value_euro = $request->value_euro;
         $payments -> value_euro = $request->value_euro;      
         $payments -> value_bim_student = $request->value_bim_student;
         $payments -> number_bim_student = $request->number_bim_student;
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

        $s;
        $payments_cut = Income::where('value_bim',$request->value_bim_student )
        ->get()
        ->first();
        $s= $payments_cut->number_bim;
        $a=$request->number_bim_student;
        //dd($a);
        $m = $s + $a;
        //dd($m);
        $payments_cut->number_bim = $m;
        Student_Payment::find($request->id)->delete();
        $students->save();
        $payments_cut->save();

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
            'id'=> 'required',
            'family_value_usd' => 'required',
            'value_bim_family' => 'required',
            'number_bim_family' => 'required',
            'family_value_euro' => 'required',
         ]);
        $s;
        $payments_cut = Income::where('value_bim',$request->value_bim_family )
        ->get()
        ->first();
        $s= $payments_cut->number_bim;
        $a=$request->number_bim_family;
        //dd($a);
        $m = $s - $a;
        if ($m < 0) {
        session()->flash('Warning','يامنيوك المبلغ المضاف غير كافي بقيمة الكروت يرجى الدفع على دفعتين القيمة المتبقية بالكرت هية:  '.$payments_cut->number_bim.'');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('family.show')); 
        }
        else {
            $payments_cut->number_bim = $m;
        }

         //create new object of the model student and make mapping to the data
         $families =  Family::find($request->id);
         $x = $families->pay_statu;
         ++$x;
         $families->pay_statu = $x;
         $family_name = $families->family_Constraint;
         $payments = new Student_Payment;
         $payments -> family_value = $request->family_value;
         $payments -> family_value_usd = $request->family_value_usd;
         $payments -> family_value_euro = $request->family_value_euro;
         $payments -> value_bim_family = $request->value_bim_family;
         $payments -> number_bim_family = $request->number_bim_family;
         $payments -> note = $request->note;
         $payments -> family_id = $request->id;


         //write to the data base
         $payments_cut->save();
         $families ->save();
         $payments ->save();
         session()->flash('Add Money','تم اضافة مبلغ مالي للعائلة  '. $family_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('family.show'));
    }

    public function family_ind()
    {
        $payments_income = Income::select('value_bim')->distinct()->get();
        $payments ['payments'] = Student_Payment::select('id','family_value','family_value_usd','family_value_euro','family_id','updated_at','Note','number_bim_family','value_bim_family')
        ->orderBy('id', 'DESC')
        ->get();
        //dd($payments);  
        return view('payments.family_payments',compact('payments_income'))->with($payments);//
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
            'family_value_usd' => 'required',
            'family_value_euro' => 'required',
            'family_id' => 'required',
            'id' => 'required',
            'value_bim_family' => 'required',
            'number_bim_family' => 'required',

        ]);
        $s;
        $payments_cut = Income::where('value_bim',$request->value_bim_family )
        ->get()
        ->first();
        $s= $payments_cut->number_bim;
        $a=$request->number_bim_family1;
        //dd($a);
        $m = $s + $a;
        $payments_cut->number_bim = $m;
            $m =0;
        $s= $payments_cut->number_bim;
        $a=$request->number_bim_family;
        //dd($a);
        $m = $s - $a;
        $payments_cut->number_bim = $m;
         //create new object of the model student and make mapping to the data ::find($request->id);
         $family =  Family::find($request->family_id);
         $family_Constraint = $family->family_Constraint;
         $payments =  Student_Payment::find($request->id);
         $payments -> family_id = $request -> family_id;
         $payments -> note = $request->note;         
         $payments -> family_value_usd = $request->family_value_usd;
         $payments -> family_value_euro = $request->family_value_euro;
         $payments -> family_value = $request->family_value;
         $payments -> value_bim_family = $request->value_bim_family;
         $payments -> number_bim_family = $request->number_bim_family;                                 
         //write to the data base
         $payments_cut ->save();
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

        $s;
        $payments_cut = Income::where('value_bim',$request->value_bim_family )
        ->get()
        ->first();
        $s= $payments_cut->number_bim;
        $a=$request->number_bim_family;
        //dd($a);
        $m = $s + $a;
        //dd($m);
        $payments_cut->number_bim = $m;

        Student_Payment::find($request->id)->delete();
        $payments_cut->save();
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
            'id'=> 'required',           
            'medical_value_usd' => 'required',
            'medical_value_euro' => 'required',
            'value_bim_medical' => 'required',
            'number_bim_medical' => 'required',
         ]);
        $s;
        $payments_cut = Income::where('value_bim',$request->value_bim_medical )
        ->get()
        ->first();
        $s= $payments_cut->number_bim;
        $a=$request->number_bim_medical;
        //dd($a);
        $m = $s - $a;
        if ($m < 0) {
        session()->flash('Warning','يامنيوك المبلغ المضاف غير كافي بقيمة الكروت يرجى الدفع على دفعتين القيمة المتبقية بالكرت هية:  '.$payments_cut->number_bim.'');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('medical.show')); 
        }
        else {
            $payments_cut->number_bim = $m;
        }


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
         $payments -> medical_value_usd = $request->medical_value_usd;
         $payments -> medical_value_euro = $request->medical_value_euro;
         $payments -> value_bim_medical = $request->value_bim_medical;
         $payments -> number_bim_medical = $request->number_bim_medical;


         //write to the data base
         $payments_cut->save();
         $medicals ->save();
         $payments ->save();
         session()->flash('Add Money','تم اضافة مبلغ مالي للمريض  '. $medical_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('medical.show'));
    }

    public function medical_ind()
    {
        $payments_income = Income::select('value_bim')->distinct()->get();
        $payments['payments'] = Student_Payment::select('id','medical_value','medical_value_euro','medical_value_usd','medical_id','updated_at','Note','value_bim_medical','number_bim_medical')
        ->orderBy('id', 'DESC')
        ->get();
        return view('payments.medical_payments',compact('payments_income'))->with($payments);//
    }

    public function show_medical($id){
      $payments = Student_Payment::where('medical_id', $id)->get();
     // $child = DB::table('childrens')->where('student_id', $id)->get();
       return view('payments.medical_payments',compact('payments'));
    }

    public function update_medical(Request $request)
    {
        $this->validate($request, [
            'medical_value' => 'required',
            'medical_id' => 'required',
            'medical_value_usd' => 'required',
            'medical_value_euro' => 'required',
            'id' => 'required',
            'value_bim_medical' => 'required',
            'number_bim_medical' => 'required',

        ]);

        $s;
        $payments_cut = Income::where('value_bim',$request->value_bim_medical )
        ->get()
        ->first();
        $s= $payments_cut->number_bim;
        $a=$request->number_bim_medical1;
        //dd($a);
        $m = $s + $a;
        $payments_cut->number_bim = $m;
            $m =0;
        $s= $payments_cut->number_bim;
        $a=$request->number_bim_medical;
        //dd($a);
        $m = $s - $a;
        $payments_cut->number_bim = $m;
        //dd($payments_cut->number_bim);
         //create new object of the model student and make mapping to the data ::find($request->id);
         $medicals =  Medical::find($request->medical_id);
         $medical_name = $medicals->medical_name;
         $payments =  Student_Payment::find($request->id);
         $payments -> medical_id = $request -> medical_id;
         $payments -> note = $request->note;
         $payments -> medical_value = $request->medical_value;
         $payments -> medical_value_usd = $request->medical_value_usd;
         $payments -> medical_value_euro = $request->medical_value_euro;
         $payments -> value_bim_medical = $request->value_bim_medical;
         $payments -> number_bim_medical = $request->number_bim_medical;
                                     
         //write to the data base
         $payments_cut ->save();
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

        $s;
        $payments_cut = Income::where('value_bim',$request->value_bim_medical )
        ->get()
        ->first();
        $s= $payments_cut->number_bim;
        $a=$request->number_bim_medical;
        //dd($a);
        $m = $s + $a;
        //dd($m);
        $payments_cut->number_bim = $m;

        Student_Payment::find($request->id)->delete();
        $payments_cut->save();
        $medicals->save();

        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف المبلغ المالي للمريض  '. $medical_name .' بنجاح ');
        return redirect(route('show.medical.pay'));
    }

///////////////////////////////////////////////////// Medical End //////////////////////////////////////


}
