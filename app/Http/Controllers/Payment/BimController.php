<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Student\StudentController;
use App\models\Medical\Medical;
use App\models\Family\Family;
use App\models\Payment\Income;
use App\models\Payment\Bim;
use Illuminate\Support\Facades\DB;
use App\models\Student\Student;
use App\models\Payment\Student_Payment;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

use App\Http\Controllers\Controller;

class BimController extends Controller
{
##################################################### Family Start

    public function family_ind_bim()
    {
       $payments_income = Income::select('value_bim')->distinct()->get();
       $payments = Bim::with('student')->get();
       return view('payments.family.family_bim',compact("payments",'payments_income'));//->with($payments)
    }

    public function store_family_bim(Request $request)
    {
     $this->validate($request,[
            'family_id' => 'required',
            'value_bim_family' => 'required',
            'number_bim_family' => 'required',
            'note'=> 'required',
         ]);
        $s;
        if ($check = DB::table('incomes')->where('value_bim','!=', null)->where('value_bim','!=', 0)->latest()->first() != null) {
        $payments_cut = Income::where('value_bim',$request->value_bim_family )
        ->having('number_bim', '>', 0)
        ->first();
        $s= $payments_cut->number_bim;
        $a=$request->number_bim_family;
        //dd($a);
        $m = $s - $a;
        if ($m < 0) {
        session()->flash('Warning','يامنيوك المبلغ المضاف غير كافي بقيمة الكروت يرجى الدفع على دفعتين القيمة المتبقية بالكرت هية:  '.$payments_cut->number_bim.'');
            //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
        return redirect(route('bim.family.pay')); 
        }
        else {
            $payments_cut->number_bim = $m;
            $payments_cut ->save();
        }

        //create new object of the model student and make mapping to the data
        $family =  Family::find($request->family_id);
        $x = $family->bim_statu;
        ++$x;
        $family->bim_statu = $x;
        $family_Constraint = $family->family_Constraint;
        $payments = new Bim;
        $payments -> family_id = $request -> family_id;
        $payments -> note = $request->note;         
        $payments -> value_bim_family = $request->value_bim_family;
        $payments -> number_bim_family = $request->number_bim_family;                                 
        //write to the data base
        $payments ->save();
        $family ->save();
        session()->flash('Edit', 'تم إضافة المبلغ المالي للعائلة  '. $family_Constraint .' بنجاح ');
        //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
        return redirect(route('family.show'));
    }
    else {
    session()->flash('Warning', 'لايوجد مبالغ مالية متوفرة ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('family.show'));
    }
    }

    public function show_family_bim($id)
    {          
      $payments_income = Income::select('value_bim')->distinct()->get();
      $payments = Bim::where('family_id', $id)->get();
     // $child = DB::table('childrens')->where('student_id', $id)->get();
       return view('payments.family.family_bim',compact('payments','payments_income'));
    }

    public function update_family_bim(Request $request)
    {
        $this->validate($request, [
            'family_id' => 'required',
            'value_bim_family' => 'required',
            'number_bim_family' => 'required',
            'note'=> 'required',
        ]);
        if ($request->number_bim_family1 != $request->number_bim_family) 
        {

        $payments_cut = Income::where('value_bim',$request->value_bim_family )
        ->having('number_bim', '>', 0)
        ->first();
        $s= $payments_cut->number_bim;
        $a=$request->number_bim_family1;
        $m = $s + $a;
        $payments_cut->number_bim = $m;
        //dd($payments_cut->number_bim);
        $m =0;
        $s= $payments_cut->number_bim;
        $a=$request->number_bim_family;
        //dd($a);
        $m = $s - $a;
        //dd($m);
        //dd($m);
        if ($m < 0) {
        session()->flash('Warning','يامنيوك المبلغ المضاف غير كافي بقيمة الكروت يرجى الدفع على دفعتين القيمة المتبقية بالكرت هية:  '.$payments_cut->number_bim.'');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('bim.family.pay')); 
        }
        elseif ($m > 0) {
        $payments_cut->number_bim =$m  ;
           // dd($payments_cut->number_bim);
        } 
        //dd($m);
              //create new object of the model student and make mapping to the data
        $family =  Family::find($request->family_id);
        $family_Constraint = $family->family_Constraint;
        $payments = Bim::find($request->id);
        $payments -> family_id = $request -> family_id;
        $payments -> note = $request->note;         
        $payments -> value_bim_family = $request->value_bim_family;
        $payments -> number_bim_family = $request->number_bim_family;                                 
        //write to the data base
        $payments ->save();
        $family ->save();
        $payments_cut ->save();
        session()->flash('Edit', 'تم تعديل المبلغ المالي للعائلة  '. $family_Constraint .' بنجاح ');
        //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
        return redirect(route('bim.family.pay'));
        }
        else {
        $family =  Family::find($request->family_id);
        $family_Constraint = $family->family_Constraint;
        session()->flash('Edit', 'لم يتم تعديل المبلغ المالي للعائلة  '. $family_Constraint .' يرجى التأكد من إضافة قيم جديدة ');
        //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
        return redirect(route('bim.family.pay'));
        }

  
    
    }

      public function delete_familys_bim(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $family =  Family::find($request->family_id);
        $x = $family->bim_statu;
        --$x;
        $family->bim_statu = $x;
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

        Bim::find($request->id)->delete();
        $payments_cut->save();
        $family->save();

        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف المبلغ المالي للعائلة  '. $family_Constraint .' بنجاح ');
        return redirect(route('bim.family.pay'));
    }

##################################################### Family End
#########################3########################
##########################
#########################3########################
##################################################### Medical Start

    public function medical_ind_bim()
    {
       $payments_income = Income::select('value_bim')->distinct()->get();
       $payments = Bim::with('medical')->get();
       return view('payments.medical.medical_bim',compact("payments",'payments_income'));//->with($payments)
    }

    public function store_medical_bim(Request $request)
    {
     $this->validate($request,[
            'medical_id' => 'required',
            'value_bim_medical' => 'required',
            'number_bim_medical' => 'required',
            'note'=> 'required',
         ]);
        $s;
        if ($check = DB::table('incomes')->where('value_bim','!=', null)->where('value_bim','!=', 0)->latest()->first() != null) {
        $payments_cut = Income::where('value_bim',$request->value_bim_medical )
        ->having('number_bim', '>', 0)
        ->first();
        $s= $payments_cut->number_bim;
        $a=$request->number_bim_medical;
        //dd($a);
        $m = $s - $a;
        if ($m < 0) {
        session()->flash('Warning','يامنيوك المبلغ المضاف غير كافي بقيمة الكروت يرجى الدفع على دفعتين القيمة المتبقية بالكرت هية:  '.$payments_cut->number_bim.'');
            //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
        return redirect(route('bim.medical.pay')); 
        }
        else {
            $payments_cut->number_bim = $m;
            $payments_cut ->save();
        }

        //create new object of the model student and make mapping to the data
        $medical =  Medical::find($request->medical_id);
        $x = $medical->bim_statu;
        ++$x;
        $medical->bim_statu = $x;
        $medical_name = $medical->medical_name;
        $payments = new Bim;
        $payments -> medical_id = $request -> medical_id;
        $payments -> note = $request->note;         
        $payments -> value_bim_medical = $request->value_bim_medical;
        $payments -> number_bim_medical = $request->number_bim_medical;                                 
        //write to the data base
        $payments ->save();
        $medical ->save();
        session()->flash('Edit', 'تم إضافة المبلغ المالي للعائلة  '. $medical_name .' بنجاح ');
        //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
        return redirect(route('medical.show'));
    }
    else {
    session()->flash('Warning', 'لايوجد مبالغ مالية متوفرة ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('medical.show'));
    }
    }

    public function show_medical_bim($id)
    {
              
      $payments_income = Income::select('value_bim')->distinct()->get();
      $payments = Bim::where('medical_id', $id)->get();
     // $child = DB::table('childrens')->where('student_id', $id)->get();
       return view('payments.medical.medical_bim',compact('payments','payments_income'));
    }

    public function update_medical_bim(Request $request)
    {
        $this->validate($request, [
            'medical_id' => 'required',
            'value_bim_medical' => 'required',
            'number_bim_medical' => 'required',
            'note'=> 'required',
        ]);
        if ($request->number_bim_medical1 != $request->number_bim_medical) 
        {

        $payments_cut = Income::where('value_bim',$request->value_bim_medical )
        ->having('number_bim', '>', 0)
        ->first();
        $s= $payments_cut->number_bim;
        $a=$request->number_bim_medical1;
        $m = $s + $a;
        $payments_cut->number_bim = $m;
        //dd($payments_cut->number_bim);
        $m =0;
        $s= $payments_cut->number_bim;
        $a=$request->number_bim_medical;
        //dd($a);
        $m = $s - $a;
        //dd($m);
        //dd($m);
        if ($m < 0) {
        session()->flash('Warning','يامنيوك المبلغ المضاف غير كافي بقيمة الكروت يرجى الدفع على دفعتين القيمة المتبقية بالكرت هية:  '.$payments_cut->number_bim.'');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('bim.medical.pay')); 
        }
        elseif ($m > 0) {
        $payments_cut->number_bim =$m  ;
           // dd($payments_cut->number_bim);
        } 
        //dd($m);
              //create new object of the model student and make mapping to the data
        $medical =  Medical::find($request->medical_id);
        $medical_name = $medical->medical_name;
        $payments = Bim::find($request->id);
        $payments -> medical_id = $request -> medical_id;
        $payments -> note = $request->note;         
        $payments -> value_bim_medical = $request->value_bim_medical;
        $payments -> number_bim_medical = $request->number_bim_medical;                                 
        //write to the data base
        $payments ->save();
        $medical ->save();
        $payments_cut ->save();
        session()->flash('Edit', 'تم تعديل المبلغ المالي للعائلة  '. $medical_name .' بنجاح ');
        //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
        return redirect(route('bim.medical.pay'));
        }
        else {
        $medical =  Medical::find($request->medical_id);
        $medical_name = $medical->medical_name;
        session()->flash('Edit', 'لم يتم تعديل المبلغ المالي للعائلة  '. $medical_name .' يرجى التأكد من إضافة قيم جديدة ');
        //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
        return redirect(route('bim.medical.pay'));
        }

  
    
    }

      public function delete_medicals_bim(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $medical =  Medical::find($request->medical_id);
        $x = $medical->bim_statu;
        --$x;
        $medical->bim_statu = $x;
        $medical_name = $medical->medical_name;

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

        Bim::find($request->id)->delete();
        $payments_cut->save();
        $medical->save();

        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف المبلغ المالي للعائلة  '. $medical_name .' بنجاح ');
        return redirect(route('bim.medical.pay'));
    }


##################################################### Medical End

##################################################### Student Start


    public function student_ind_bim()
    {
       $payments_income = Income::select('value_bim')->distinct()->get();
       $payments = Bim::with('student')->get();
       return view('payments.student.student_bim',compact("payments",'payments_income'));//->with($payments)
    }

    public function store_student_bim(Request $request)
    {
     $this->validate($request,[
            'student_id' => 'required',
            'value_bim_student' => 'required',
            'number_bim_student' => 'required',
            'note'=> 'required',
         ]);
        $s;
        if ($check = DB::table('incomes')->where('value_bim','!=', null)->where('value_bim','!=', 0)->latest()->first() != null) {
        $payments_cut = Income::where('value_bim',$request->value_bim_student )
        ->having('number_bim', '>', 0)
        ->first();
        $s= $payments_cut->number_bim;
        $a=$request->number_bim_student;
        //dd($a);
        $m = $s - $a;
        if ($m < 0) {
        session()->flash('Warning','يامنيوك المبلغ المضاف غير كافي بقيمة الكروت يرجى الدفع على دفعتين القيمة المتبقية بالكرت هية:  '.$payments_cut->number_bim.'');
            //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
        return redirect(route('bim.student.pay')); 
        }
        else {
            $payments_cut->number_bim = $m;
            $payments_cut ->save();
        }

        //create new object of the model student and make mapping to the data
        $student =  Student::find($request->student_id);
        $x = $student->bim_statu;
        ++$x;
        $student->bim_statu = $x;
        $student_name = $student->student_name;
        $payments = new Bim;
        $payments -> student_id = $request -> student_id;
        $payments -> note = $request->note;         
        $payments -> value_bim_student = $request->value_bim_student;
        $payments -> number_bim_student = $request->number_bim_student;                                 
        //write to the data base
        $payments ->save();
        $student ->save();
        session()->flash('Edit', 'تم إضافة المبلغ المالي للعائلة  '. $student_name .' بنجاح ');
        //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
        return redirect(route('student.show'));
    }
    else {
    session()->flash('Warning', 'لايوجد مبالغ مالية متوفرة ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('student.show'));
    }
    }

    public function show_student_bim($id)
    {
              
      $payments_income = Income::select('value_bim')->distinct()->get();
      $payments = Bim::where('student_id', $id)->get();
     // $child = DB::table('childrens')->where('student_id', $id)->get();
       return view('payments.student.student_bim',compact('payments','payments_income'));
    }

    public function update_student_bim(Request $request)
    {
        $this->validate($request, [
            'student_id' => 'required',
            'value_bim_student' => 'required',
            'number_bim_student' => 'required',
            'note'=> 'required',
        ]);
        if ($request->number_bim_student1 != $request->number_bim_student) 
        {

        $payments_cut = Income::where('value_bim',$request->value_bim_student )
        ->having('number_bim', '>', 0)
        ->first();
        $s= $payments_cut->number_bim;
        $a=$request->number_bim_student1;
        $m = $s + $a;
        $payments_cut->number_bim = $m;
        //dd($payments_cut->number_bim);
        $m =0;
        $s= $payments_cut->number_bim;
        $a=$request->number_bim_student;
        //dd($a);
        $m = $s - $a;
        //dd($m);
        //dd($m);
        if ($m < 0) {
        session()->flash('Warning','يامنيوك المبلغ المضاف غير كافي بقيمة الكروت يرجى الدفع على دفعتين القيمة المتبقية بالكرت هية:  '.$payments_cut->number_bim.'');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('bim.student.pay')); 
        }
        elseif ($m > 0) {
        $payments_cut->number_bim =$m  ;
           // dd($payments_cut->number_bim);
        } 
        //dd($m);
              //create new object of the model student and make mapping to the data
        $student =  Student::find($request->student_id);
        $student_name = $student->student_name;
        $payments = Bim::find($request->id);
        $payments -> student_id = $request -> student_id;
        $payments -> note = $request->note;         
        $payments -> value_bim_student = $request->value_bim_student;
        $payments -> number_bim_student = $request->number_bim_student;                                 
        //write to the data base
        $payments ->save();
        $student ->save();
        $payments_cut ->save();
        session()->flash('Edit', 'تم تعديل المبلغ المالي للعائلة  '. $student_name .' بنجاح ');
        //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
        return redirect(route('bim.student.pay'));
        }
        else {
        $student =  Student::find($request->student_id);
        $student_name = $student->student_name;
        session()->flash('Edit', 'لم يتم تعديل المبلغ المالي للعائلة  '. $student_name .' يرجى التأكد من إضافة قيم جديدة ');
        //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
        return redirect(route('bim.student.pay'));
        }
    }

      public function delete_students_bim(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $student =  Student::find($request->student_id);
        $x = $student->bim_statu;
        --$x;
        $student->bim_statu = $x;
        $student_name = $student->student_name;

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

        Bim::find($request->id)->delete();
        $payments_cut->save();
        $student->save();

        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف المبلغ المالي للعائلة  '. $student_name .' بنجاح ');
        return redirect(route('bim.student.pay'));
    }


##################################################### Student End

}