<?php

namespace App\Http\Controllers\Payment;

use App\models\Medical\Medical;
use App\models\Family\Family;
use App\models\Payment\Income;
use App\models\Payment\Usd;
use Illuminate\Support\Facades\DB;
use App\models\Student\Student;
use App\models\Payment\Student_Payment;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;


use App\Http\Controllers\Controller;

class UsdController extends Controller
{
##################################################### Family start 
    public function family_ind_usd()
{
    $payments_income = Income::select('value_usd')->distinct()->get();
    $payments = Usd::with('family')->get();
    return view('payments.family.family_usd',compact("payments",'payments_income'));//->with($payments)
}

public function store_family_usd(Request $request)
{
    $this->validate($request,[
        'family_id' => 'required',
        'family_value_usd' => 'required',
        'note'=> 'required',
        ]);
    $s;
    if ($check = DB::table('incomes')->where('value_usd','!=', null)->where('value_usd','!=', 0)->latest()->first() != null) {
    $payments_cut = Income::where('value_usd','>', 0)
    //->having('family_value_usd', '>', 0)
    ->first();
    $s= $payments_cut->value_usd;
    $a=$request->family_value_usd;
    //dd($a);
    $m = $s - $a;
    if ($m < 0) {
    session()->flash('Warning','يامنيوك المبلغ المضاف غير كافي بقيمة الكروت يرجى الدفع على دفعتين القيمة المتبقية بالدولار هية:  '.$payments_cut->value_usd.'');
        //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('family.show')); 
    }
    else {
        $payments_cut->value_usd = $m;
        $payments_cut ->save();
    }

    //create new object of the model student and make mapping to the data
    $family =  Family::find($request->family_id);
    $x = $family->usd_statu;
    ++$x;
    $family->usd_statu = $x;
    $family_Constraint = $family->family_Constraint;
    $payments = new Usd;
    $payments -> family_id = $request -> family_id;
    $payments -> note = $request->note;         

    $payments -> family_value_usd = $request->family_value_usd;                                 
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

public function update_family_usd(Request $request)
{
    $this->validate($request, [
        'family_id' => 'required',
        'id' => 'required',
        'family_value_usd' => 'required',
        'family_value_usd1' => 'required',
        'note'=> 'required',
    ]);
    if ($request->family_value_usd1 != $request->family_value_usd) 
    {

    $payments_cut = Income::where('value_usd','>', 0)->first();

    $s= $payments_cut->value_usd;
    $a=$request->family_value_usd1;
    $m = $s + $a;
    $payments_cut->value_usd = $m;
    $m =0;

    $s= $payments_cut->value_usd;
    $a=$request->family_value_usd;
    $m = $s - $a;

    if ($m < 0) {
    session()->flash('Warning','يامنيوك المبلغ المضاف غير كافي بقيمة الكروت يرجى الدفع على دفعتين القيمة المتبقية بالدولار هية:  '.$payments_cut->value_usd.'');
        //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
        return redirect(route('usd.family.pay')); 
    }
    elseif ($m > 0) {
    $payments_cut->value_usd =$m  ;

    } 
    //create new object of the model student and make mapping to the data
    $family =  Family::find($request->family_id);
    $family_Constraint = $family->family_Constraint;
    $payments = Usd::find($request->id);
    $payments -> family_id = $request -> family_id;
    $payments -> note = $request->note;         
    $payments -> family_value_usd = $request->family_value_usd;                                 
    //write to the data base
    $payments ->save();
    $family ->save();
    $payments_cut ->save();
    session()->flash('Edit', 'تم تعديل المبلغ المالي للعائلة  '. $family_Constraint .' بنجاح ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('usd.family.pay'));
    }
    else {
    $family =  Family::find($request->family_id);
    $family_Constraint = $family->family_Constraint;
    session()->flash('Edit', 'لم يتم تعديل المبلغ المالي للعائلة  '. $family_Constraint .' يرجى التأكد من إضافة قيم جديدة ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('usd.family.pay'));
    }



}

public function show_family_usd($id)
{          
    $payments_income = Income::select('value_usd')->distinct()->get();
    $payments = Usd::where('family_id', $id)->get();
    // $child = DB::table('childrens')->where('student_id', $id)->get();
    return view('payments.family.family_usd',compact('payments','payments_income'));
}

public function destroy_familys_usd(Request $request)
{
    /* here we have sued the table students and searched about the id using the find and then delete the
    id using the id note: we have passed the id from the show using the route */
    $family =  Family::find($request->family_id);
    $x = $family->usd_statu;
    --$x;
    $family->usd_statu = $x;
    $family_Constraint = $family->family_Constraint;

    $s;
    $payments_cut = Income::where('value_usd','>', 0)->first();
    $s= $payments_cut->value_usd;
    $a=$request->family_value_usd;
    //dd($a);
    $m = $s + $a;
    //dd($m);
    $payments_cut->value_usd = $m;

    Usd::find($request->id)->delete();
    $payments_cut->save();
    $family->save();

    /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
    session()->flash('Delete','تم حذف المبلغ المالي للعائلة  '. $family_Constraint .' بنجاح ');
    return redirect(route('usd.family.pay'));
}

##################################################### Family end 
#########################################
#######################
#########################################
##################################################### medical start 

public function medical_ind_usd()
{
    $payments_income = Income::select('value_usd')->distinct()->get();
    $payments = Usd::with('medical')->get();
    return view('payments.medical.medical_usd',compact("payments",'payments_income'));//->with($payments)
}

public function store_medical_usd(Request $request)
{
    $this->validate($request,[
        'medical_id' => 'required',
        'medical_value_usd' => 'required',
        'note'=> 'required',
        ]);
    $s;
    if ($check = DB::table('incomes')->where('value_usd','!=', null)->where('value_usd','!=', 0)->latest()->first() != null) {
    $payments_cut = Income::where('value_usd','>', 0)
    //->having('medical_value_usd', '>', 0)
    ->first();
    $s= $payments_cut->value_usd;
    $a=$request->medical_value_usd;
    //dd($a);
    $m = $s - $a;
    if ($m < 0) {
    session()->flash('Warning','يامنيوك المبلغ المضاف غير كافي بقيمة الكروت يرجى الدفع على دفعتين القيمة المتبقية بالدولار هية:  '.$payments_cut->value_usd.'');
        //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('medical.show')); 
    }
    else {
        $payments_cut->value_usd = $m;
        $payments_cut ->save();
    }

    //create new object of the model student and make mapping to the data
    $medical =  Medical::find($request->medical_id);
    $x = $medical->usd_statu;
    ++$x;
    $medical->usd_statu = $x;
    $medical_Name = $medical->medical_Name;
    $payments = new Usd;
    $payments -> medical_id = $request -> medical_id;
    $payments -> note = $request->note;         

    $payments -> medical_value_usd = $request->medical_value_usd;                                 
    //write to the data base
    $payments ->save();
    $medical ->save();
    session()->flash('Edit', 'تم إضافة المبلغ المالي للعائلة  '. $medical_Name .' بنجاح ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('medical.show'));
    }
    else {
    session()->flash('Warning', 'لايوجد مبالغ مالية متوفرة ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('medical.show'));
    }
}

public function update_medical_usd(Request $request)
{
    $this->validate($request, [
        'medical_id' => 'required',
        'id' => 'required',
        'medical_value_usd' => 'required',
        'medical_value_usd1' => 'required',
        'note'=> 'required',
    ]);
    if ($request->medical_value_usd1 != $request->medical_value_usd) 
    {

    $payments_cut = Income::where('value_usd','>', 0)->first();

    $s= $payments_cut->value_usd;
    $a=$request->medical_value_usd1;
    $m = $s + $a;
    $payments_cut->value_usd = $m;
    $m =0;

    $s= $payments_cut->value_usd;
    $a=$request->medical_value_usd;
    $m = $s - $a;

    if ($m < 0) {
    session()->flash('Warning','يامنيوك المبلغ المضاف غير كافي بقيمة الكروت يرجى الدفع على دفعتين القيمة المتبقية بالدولار هية:  '.$payments_cut->value_usd.'');
        //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
        return redirect(route('usd.medical.pay')); 
    }
    elseif ($m > 0) {
    $payments_cut->value_usd =$m  ;

    } 
    //create new object of the model student and make mapping to the data
    $medical =  Medical::find($request->medical_id);
    $medical_Name = $medical->medical_Name;
    $payments = Usd::find($request->id);
    $payments -> medical_id = $request -> medical_id;
    $payments -> note = $request->note;         
    $payments -> medical_value_usd = $request->medical_value_usd;                                 
    //write to the data base
    $payments ->save();
    $medical ->save();
    $payments_cut ->save();
    session()->flash('Edit', 'تم تعديل المبلغ المالي للعائلة  '. $medical_Name .' بنجاح ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('usd.medical.pay'));
    }
    else {
    $medical =  Medical::find($request->medical_id);
    $medical_Name = $medical->medical_Name;
    session()->flash('Edit', 'لم يتم تعديل المبلغ المالي للعائلة  '. $medical_Name .' يرجى التأكد من إضافة قيم جديدة ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('usd.medical.pay'));
    }    
}

public function show_medical_usd($id)
{          
    $payments_income = Income::select('value_usd')->distinct()->get();
    $payments = Usd::where('medical_id', $id)->get();
    // $child = DB::table('childrens')->where('student_id', $id)->get();
    return view('payments.medical.medical_usd',compact('payments','payments_income'));
}

public function destroy_medicals_usd(Request $request)
{
    /* here we have sued the table students and searched about the id using the find and then delete the
    id using the id note: we have passed the id from the show using the route */
    $medical =  Medical::find($request->medical_id);
    $x = $medical->usd_statu;
    --$x;
    $medical->usd_statu = $x;
    $medical_Name = $medical->medical_Name;

    $s;
    $payments_cut = Income::where('value_usd','>', 0)->first();
    $s= $payments_cut->value_usd;
    $a=$request->medical_value_usd;
    //dd($a);
    $m = $s + $a;
    //dd($m);
    $payments_cut->value_usd = $m;

    Usd::find($request->id)->delete();
    $payments_cut->save();
    $medical->save();

    /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
    session()->flash('Delete','تم حذف المبلغ المالي للعائلة  '. $medical_Name .' بنجاح ');
    return redirect(route('usd.medical.pay'));
}

##################################################### medical End

##################################################### student start 
public function student_ind_usd()
{
    $payments_income = Income::select('value_usd')->distinct()->get();
    $payments = Usd::with('student')->get();
    return view('payments.student.student_usd',compact("payments",'payments_income'));//->with($payments)
}

public function show_student_usd($id)
{          
    $payments_income = Income::select('value_usd')->distinct()->get();
    $payments = Usd::where('student_id', $id)->get();
    // $child = DB::table('childrens')->where('student_id', $id)->get();
    return view('payments.student.student_usd',compact('payments','payments_income'));
}

public function store_student_usd(Request $request)
{
    $this->validate($request,[
        'student_id' => 'required',
        'student_value_usd' => 'required',
        'note'=> 'required',
        ]);
    $s;
    if ($check = DB::table('incomes')->where('value_usd','!=', null)->where('value_usd','!=', 0)->latest()->first() != null) {
    $payments_cut = Income::where('value_usd','>', 0)
    //->having('student_value_usd', '>', 0)
    ->first();
    $s= $payments_cut->value_usd;
    $a=$request->student_value_usd;
    //dd($a);
    $m = $s - $a;
    if ($m < 0) {
    session()->flash('Warning','يامنيوك المبلغ المضاف غير كافي بقيمة الكروت يرجى الدفع على دفعتين القيمة المتبقية بالدولار هية:  '.$payments_cut->value_usd.'');
        //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('student.show')); 
    }
    else {
        $payments_cut->value_usd = $m;
        $payments_cut ->save();
    }

    //create new object of the model student and make mapping to the data
    $student =  Student::find($request->student_id);
    $x = $student->usd_statu;
    ++$x;
    $student->usd_statu = $x;
    $student_Name = $student->student_Name;
    $payments = new Usd;
    $payments -> student_id = $request -> student_id;
    $payments -> note = $request->note;         
    $payments -> value_usd = $request->student_value_usd;                                 
    //write to the data base
    $payments ->save();
    $student ->save();
    session()->flash('Edit', 'تم إضافة المبلغ المالي للعائلة  '. $student_Name .' بنجاح ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('student.show'));
    }
    else {
    session()->flash('Warning', 'لايوجد مبالغ مالية متوفرة ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('student.show'));
    }
}

public function update_student_usd(Request $request)
{
    $this->validate($request, [
        'student_id' => 'required',
        'id' => 'required',
        'value_usd' => 'required',
        'value_usd' => 'required',
        'note'=> 'required',
    ]);
    if ($request->value_usd1 != $request->value_usd) 
    {

    $payments_cut = Income::where('value_usd','>', 0)->first();

    $s= $payments_cut->value_usd;
    $a=$request->value_usd1;
    $m = $s + $a;
    $payments_cut->value_usd = $m;
    $m =0;

    $s= $payments_cut->value_usd;
    $a=$request->value_usd;
    $m = $s - $a;

    if ($m < 0) {
    session()->flash('Warning','يامنيوك المبلغ المضاف غير كافي بقيمة الكروت يرجى الدفع على دفعتين القيمة المتبقية بالدولار هية:  '.$payments_cut->value_usd.'');
        //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
        return redirect(route('usd.student.pay')); 
    }
    elseif ($m > 0) {
    $payments_cut->value_usd =$m  ;

    } 
    //create new object of the model student and make mapping to the data
    $student =  Student::find($request->student_id);
    $student_Name = $student->student_Name;
    $payments = Usd::find($request->id);
    $payments -> student_id = $request -> student_id;
    $payments -> note = $request->note;         
    $payments -> value_usd = $request->value_usd;                                 
    //write to the data base
    $payments ->save();
    $student ->save();
    $payments_cut ->save();
    session()->flash('Edit', 'تم تعديل المبلغ المالي للعائلة  '. $student_Name .' بنجاح ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('usd.student.pay'));
    }
    else {
    $student =  Student::find($request->student_id);
    $student_Name = $student->student_Name;
    session()->flash('Edit', 'لم يتم تعديل المبلغ المالي للعائلة  '. $student_Name .' يرجى التأكد من إضافة قيم جديدة ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('usd.student.pay'));
    }    
}

public function destroy_students_usd(Request $request)
{
    /* here we have sued the table students and searched about the id using the find and then delete the
    id using the id note: we have passed the id from the show using the route */
    $student =  Student::find($request->student_id);
    $x = $student->usd_statu;
    --$x;
    $student->usd_statu = $x;
    $student_Name = $student->student_Name;

    $s;
    $payments_cut = Income::where('value_usd','>', 0)->first();
    $s= $payments_cut->value_usd;
    $a=$request->value_usd;
    //dd($a);
    $m = $s + $a;
    //dd($m);
    $payments_cut->value_usd = $m;

    Usd::find($request->id)->delete();
    $payments_cut->save();
    $student->save();

    /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
    session()->flash('Delete','تم حذف المبلغ المالي للعائلة  '. $student_Name .' بنجاح ');
    return redirect(route('usd.student.pay'));
}

##################################################### student End
}
