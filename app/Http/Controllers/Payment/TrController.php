<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Student\StudentController;
use App\models\Medical\Medical;
use App\models\Family\Family;
use App\models\Payment\Income;
use App\models\Payment\Tr;
use Illuminate\Support\Facades\DB;
use App\models\Student\Student;
use App\models\Payment\Student_Payment;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\Controller;

class TrController extends Controller
{

function __construct()
{

$this->middleware('permission: مدفوعات بالتركي العائلات ', ['only' => ['family_ind_tr']]);
$this->middleware('permission: مدفوعات بالتركي العائلات ', ['only' => ['show_family_tr']]);
$this->middleware('permission: إضافة دفعة بالتركي العائلات ', ['only' => ['store_family_tr']]);
$this->middleware('permission: تعديل دفعة بالتركي العائلات ', ['only' => ['update_family_tr']]);
$this->middleware('permission: حذف دفعة بالتركي العائلات ', ['only' => ['destroy_familys_tr']]);

$this->middleware('permission: مدفوعات بالتركي الطلاب ', ['only' => ['student_ind_tr']]);
$this->middleware('permission: مدفوعات بالتركي الطلاب ', ['only' => ['show_student_tr']]);
$this->middleware('permission: إضافة دفعة بالتركي الطلاب ', ['only' => ['store_student_tr']]);
$this->middleware('permission: تعديل دفعة بالتركي الطلاب ', ['only' => ['update_student_tr']]);
$this->middleware('permission: حذف دفعة بالتركي الطلاب ', ['only' => ['destroy_students_tr']]);

$this->middleware('permission: مدفوعات بالتركي الطبي ', ['only' => ['medical_ind_tr']]);
$this->middleware('permission: مدفوعات بالتركي الطبي ', ['only' => ['show_medical_tr']]);
$this->middleware('permission: إضافة دفعة بالتركي الطبي ', ['only' => ['store_medical_tr']]);
$this->middleware('permission: تعديل دفعة بالتركي الطبي ', ['only' => ['update_medical_tr']]);
$this->middleware('permission: حذف دفعة بالتركي الطبي ', ['only' => ['destroy_medicals_tr']]);

}

    ##################################################### Family start
public function family_ind_tr()
{
    $payments_income = Income::select('value_tr')->distinct()->get();
    $payments = Tr::with('family')->get();
    return view('payments.family.family_tr',compact("payments",'payments_income'));//->with($payments)
}
public function messages_family_tr()
{
return $messages_family_tr = [
    'family_id.required' => '!!',
    'family_value_tr.required' => 'لم يتم ادخال قيمة  بالتركي  !!',
    'note.required' => 'يجب عليك ادخال ملاحظة او كتابة كلمة لايوجد  !!',


];
}
public function store_family_tr(Request $request)
{
    $messages = $this->messages_family_tr();
    $this->validate($request,[
        'family_id' => 'required',
        'family_value_tr' => 'required',
        'note'=> 'required',
    ],$messages);
    $s;
    if ($check = DB::table('incomes')->where('value_tr','!=', null)->where('value_tr','!=', 0)->latest()->first() != null) {
    $payments_cut = Income::where('value_tr','>', 0)
    //->having('family_value_tr', '>', 0)
    ->first();
    $s= $payments_cut->value_tr;
    $a=$request->family_value_tr;
    //dd($a);
    $m = $s - $a;
    if ($m < 0) {
    session()->flash('Warning','  المبلغ المضاف غير كافي بقيمة التركي يرجى الدفع على دفعتين القيمة المتبقية بالتركي  هي:  '.$payments_cut->value_tr.'');
        //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('family.show'));
    }
    else {
        $sta = $payments_cut->incomes_statu;
        ++$sta;
        $payments_cut->incomes_statu = $sta;
        $payments_cut->value_tr = $m;
        $payments_cut ->save();
    }

    //create new object of the model student and make mapping to the data
    $family =  Family::find($request->family_id);
    $x = $family->tr_statu;
    ++$x;
    $family->tr_statu = $x;
    $family_Constraint = $family->family_Constraint;
    $payments = new Tr;
    $payments -> family_id = $request -> family_id;
    $payments -> note = $request->note;

    $payments -> family_value = $request->family_value_tr;
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
public function messages_update_family_tr()
{
return $messages_update_family_tr = [
    'family_id.required' => '!!',
    'family_value_tr.required' => 'لم يتم ادخال قيمة  بالتركي  !!',
    'note.required' => 'يجب عليك ادخال ملاحظة او كتابة كلمة لايوجد  !!',


];
}
public function update_family_tr(Request $request)
{
    $messages = $this->messages_update_family_tr();
    $this->validate($request, [
        'family_id' => 'required',
        'id' => 'required',
        'family_value_tr' => 'required',
        'family_value_tr1' => 'required',
        'note'=> 'required',
    ],$messages);
    if ($request->family_value_tr1 != $request->family_value_tr)
    {

    $payments_cut = Income::where('value_tr','>', 0)->first();

    $s= $payments_cut->value_tr;
    $a=$request->family_value_tr1;
    $m = $s + $a;
    $payments_cut->value_tr = $m;
    $m =0;

    $s= $payments_cut->value_tr;
    $a=$request->family_value_tr;
    $m = $s - $a;

    if ($m < 0) {
    session()->flash('Warning','  المبلغ المضاف غير كافي بقيمة التركي يرجى الدفع على دفعتين القيمة المتبقية بالتركي  هي:  '.$payments_cut->value_tr.'');
        //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
        return redirect(route('tr.family.pay'));
    }
    elseif ($m > 0) {
    $payments_cut->value_tr =$m  ;

    }
    //create new object of the model student and make mapping to the data
    $family =  Family::find($request->family_id);
    $family_Constraint = $family->family_Constraint;
    $payments = Tr::find($request->id);
    $payments -> family_id = $request -> family_id;
    $payments -> note = $request->note;
    $payments -> family_value = $request->family_value_tr;
    //write to the data base
    $payments ->save();
    $family ->save();
    $payments_cut ->save();
    session()->flash('Edit', 'تم تعديل المبلغ المالي للعائلة  '. $family_Constraint .' بنجاح ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('tr.family.pay'));
    }
    else {
    $family =  Family::find($request->family_id);
    $family_Constraint = $family->family_Constraint;
    session()->flash('Edit', 'لم يتم تعديل المبلغ المالي للعائلة  '. $family_Constraint .' يرجى التأكد من إضافة قيم جديدة ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('tr.family.pay'));
    }



}
public function show_family_tr($id)
{
    $payments_income = Income::select('value_tr')->distinct()->get();
    $payments = Tr::where('family_id', $id)->get();
    // $child = DB::table('childrens')->where('student_id', $id)->get();
    return view('payments.family.family_tr',compact('payments','payments_income'));
}

public function destroy_familys_tr(Request $request)
{
    /* here we have sued the table students and searched about the id using the find and then delete the
    id using the id note: we have passed the id from the show using the route */
    $family =  Family::find($request->family_id);
    $x = $family->tr_statu;
    --$x;
    $family->tr_statu = $x;
    $family_Constraint = $family->family_Constraint;

    $s;
    $payments_cut = Income::where('value_tr','>', 0)->first();
    $sta = $payments_cut->incomes_statu;
    --$sta;
    $payments_cut->incomes_statu = $sta;
    $s= $payments_cut->value_tr;
    $a=$request->family_value_tr;
    //dd($a);
    $m = $s + $a;
    //dd($m);
    $payments_cut->value_tr = $m;

    Tr::find($request->id)->delete();
    $payments_cut->save();
    $family->save();

    /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
    session()->flash('Delete','تم حذف المبلغ المالي للعائلة  '. $family_Constraint .' بنجاح ');
    return redirect(route('tr.family.pay'));
}

##################################################### Family end
#########################################
#######################
#########################################
##################################################### medical start

public function medical_ind_tr()
{
    $payments_income = Income::select('value_tr')->distinct()->get();
    $payments = Tr::with('medical')->get();
    return view('payments.medical.medical_tr',compact("payments",'payments_income'));//->with($payments)
}
public function messages_medical_tr()
{
return $messages_medical_tr = [
    'medical_id.required' => '!!',
    'medical_value_tr.required' => 'لم يتم ادخال قيمة  بالتركي  !!',
    'note.required' => 'يجب عليك ادخال ملاحظة او كتابة كلمة لايوجد  !!',


];
}
public function store_medical_tr(Request $request)
{
    $messages = $this->messages_medical_tr();
    $this->validate($request,[
        'medical_id' => 'required',
        'medical_value_tr' => 'required',
        'note'=> 'required',
    ],$messages);
    $s;
    if ($check = DB::table('incomes')->where('value_tr','!=', null)->where('value_tr','!=', 0)->latest()->first() != null) {
    $payments_cut = Income::where('value_tr','>', 0)
    //->having('medical_value_tr', '>', 0)
    ->first();
    $s= $payments_cut->value_tr;
    $a=$request->medical_value_tr;
    //dd($a);
    $m = $s - $a;
    if ($m < 0) {
    session()->flash('Warning','  المبلغ المضاف غير كافي بقيمة التركي يرجى الدفع على دفعتين القيمة المتبقية بالتركي  هي:  '.$payments_cut->value_tr.'');
        //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('medical.show'));
    }
    else {
        $sta = $payments_cut->incomes_statu;
        ++$sta;
        $payments_cut->incomes_statu = $sta;
        $payments_cut->value_tr = $m;
        $payments_cut ->save();
    }

    //create new object of the model student and make mapping to the data
    $medical =  Medical::find($request->medical_id);
    $x = $medical->tr_statu;
    ++$x;
    $medical->tr_statu = $x;
    $medical_Name = $medical->medical_Name;
    $payments = new Tr;
    $payments -> medical_id = $request -> medical_id;
    $payments -> note = $request->note;
    $payments -> medical_value	 = $request->medical_value_tr;
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
public function messages_update_medical_tr()
{
return $messages_update_medical_tr = [
    'medical_id.required' => '!!',
    'medical_value_tr.required' => 'لم يتم ادخال قيمة  بالتركي  !!',
    'note.required' => 'يجب عليك ادخال ملاحظة او كتابة كلمة لايوجد  !!',


];
}
public function update_medical_tr(Request $request)
{
    $messages = $this->messages_update_medical_tr();
    $this->validate($request, [
        'medical_id' => 'required',
        'id' => 'required',
        'medical_value_tr' => 'required',
        'medical_value_tr1' => 'required',
        'note'=> 'required',
    ],$messages);
    if ($request->medical_value_tr1 != $request->medical_value_tr)
    {

    $payments_cut = Income::where('value_tr','>', 0)->first();

    $s= $payments_cut->value_tr;
    $a=$request->medical_value_tr1;
    $m = $s + $a;
    $payments_cut->value_tr = $m;
    $m =0;

    $s= $payments_cut->value_tr;
    $a=$request->medical_value_tr;
    $m = $s - $a;

    if ($m < 0) {
    session()->flash('Warning','  المبلغ المضاف غير كافي بقيمة التركي يرجى الدفع على دفعتين القيمة المتبقية بالتركي  هي:  '.$payments_cut->value_tr.'');
        //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
        return redirect(route('tr.medical.pay'));
    }
    elseif ($m > 0) {
    $payments_cut->value_tr =$m  ;

    }
    //create new object of the model student and make mapping to the data
    $medical =  Medical::find($request->medical_id);
    $medical_Name = $medical->medical_Name;
    $payments = Tr::find($request->id);
    $payments -> medical_id = $request -> medical_id;
    $payments -> note = $request->note;
    $payments -> medical_value = $request->medical_value_tr;
    //write to the data base
    $payments ->save();
    $medical ->save();
    $payments_cut ->save();
    session()->flash('Edit', 'تم تعديل المبلغ المالي للعائلة  '. $medical_Name .' بنجاح ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('tr.medical.pay'));
    }
    else {
    $medical =  Medical::find($request->medical_id);
    $medical_Name = $medical->medical_Name;
    session()->flash('Edit', 'لم يتم تعديل المبلغ المالي للعائلة  '. $medical_Name .' يرجى التأكد من إضافة قيم جديدة ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('tr.medical.pay'));
    }
}
public function show_medical_tr($id)
{
    $payments_income = Income::select('value_tr')->distinct()->get();
    $payments = Tr::where('medical_id', $id)->get();
    // $child = DB::table('childrens')->where('student_id', $id)->get();
    return view('payments.medical.medical_tr',compact('payments','payments_income'));
}

public function destroy_medicals_tr(Request $request)
{
    $this->validate($request, [
        'medical_id' => 'required',
        'id' => 'required',
        'medical_value_tr' => 'required',
        'note'=> 'required',
    ]);
    /* here we have sued the table students and searched about the id using the find and then delete the
    id using the id note: we have passed the id from the show using the route */
    $medical =  Medical::find($request->medical_id);
    $x = $medical->tr_statu;
    --$x;
    $medical->tr_statu = $x;
    $medical_Name = $medical->medical_Name;



    $s;
    $payments_cut = Income::where('value_tr','>', 0)->first();
    $sta = $payments_cut->incomes_statu;
    --$sta;
    $payments_cut->incomes_statu = $sta;
    $s= $payments_cut->value_tr;
    $a=$request->medical_value_tr;
    //dd($a);
    $m = $s + $a;
    //dd($m);
    $payments_cut->value_tr = $m;

    Tr::find($request->id)->delete();
    $payments_cut->save();
    $medical->save();

    /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
    session()->flash('Delete','تم حذف المبلغ المالي للعائلة  '. $medical_Name .' بنجاح ');
    return redirect(route('tr.medical.pay'));
}

##################################################### medical End
#########################################
#######################
#########################################
##################################################### student start

public function student_ind_tr()
{
    $payments_income = Income::select('value_tr')->distinct()->get();
    $payments = Tr::with('student')->get();
    return view('payments.student.student_tr',compact("payments",'payments_income'));//->with($payments)
}

public function show_student_tr($id)
{
    $payments_income = Income::select('value_tr')->distinct()->get();
    $payments = Tr::where('student_id', $id)->get();
    // $child = DB::table('childrens')->where('student_id', $id)->get();
    return view('payments.student.student_tr',compact('payments','payments_income'));
}
public function messages_student_tr()
{
return $messages_student_tr = [
    'student_id.required' => '!!',
    'student_value.required' => 'لم يتم ادخال قيمة  بالتركي  !!',
    'note.required' => 'يجب عليك ادخال ملاحظة او كتابة كلمة لايوجد  !!',


];
}
public function store_student_tr(Request $request)
{
    $messages = $this->messages_student_tr();
    $this->validate($request,[
        'student_id' => 'required',
        'student_value' => 'required',
        'note'=> 'required',
    ],$messages);

    $s;
    if ($check = DB::table('incomes')->where('value_tr','!=', null)->where('value_tr','!=', 0)->latest()->first() != null) {
    $payments_cut = Income::where('value_tr','>', 0)
    //->having('student_value_tr', '>', 0)
    ->first();
    $s= $payments_cut->value_tr;
    $a=$request->student_value;
    //dd($a);
    $m = $s - $a;
    if ($m < 0) {
    session()->flash('Warning',' المبلغ المضاف غير كافي بقيمة التركي يرجى الدفع على دفعتين القيمة المتبقية بالتركي  هي:  '.$payments_cut->value_tr.'');
        //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('student.show'));
    }
    else {
        $sta = $payments_cut->incomes_statu;
        ++$sta;
        $payments_cut->incomes_statu = $sta;
        $payments_cut->value_tr = $m;
        $payments_cut ->save();
    }

    //create new object of the model student and make mapping to the data
    $student =  Student::find($request->student_id);
    $x = $student->tr_statu;
    ++$x;
    $student->tr_statu = $x;
    $student_Name = $student->student_name;
    $payments = new Tr;
    $payments -> student_id = $request -> student_id;
    $payments -> note = $request->note;
    $payments -> value = $request->student_value;
    //write to the data base
    $payments ->save();
    $student ->save();
    session()->flash('Edit', 'تم إضافة المبلغ المالي للطالب  '. $student_Name .' بنجاح ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('student.show'));
    }
    else {
    session()->flash('Warning', 'لايوجد مبالغ مالية متوفرة ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('student.show'));
    }
}
public function messages_update_student_tr()
{
return $messages_update_student_tr = [
    'student_id.required' => '!!',
    'student_value.required' => 'لم يتم ادخال قيمة  بالتركي  !!',
    'note.required' => 'يجب عليك ادخال ملاحظة او كتابة كلمة لايوجد  !!',


];
}
public function update_student_tr(Request $request)
{
    $messages = $this->messages_update_student_tr();
    $this->validate($request, [
        'student_id' => 'required',
        'id' => 'required',
        'student_value1' => 'required',
        'student_value' => 'required',
        'note'=> 'required',
    ],$messages);
    if ($request->student_value1 != $request->student_value)
    {

    $payments_cut = Income::where('value_tr','>', 0)->first();

    $s= $payments_cut->value_tr;
    $a=$request->student_value1;
    $m = $s + $a;
    $payments_cut->value_tr = $m;
    $m =0;

    $s= $payments_cut->value_tr;
    $a=$request->student_value;
    $m = $s - $a;

    if ($m < 0) {
    session()->flash('Warning','  المبلغ المضاف غير كافي بقيمة التركي يرجى الدفع على دفعتين القيمة المتبقية بالتركي  هي:  '.$payments_cut->value_tr.'');
        //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
        return redirect(route('tr.student.pay'));
    }
    elseif ($m > 0) {
    $payments_cut->value_tr =$m  ;

    }
    //create new object of the model student and make mapping to the data
    $student =  Student::find($request->student_id);
    $student_Name = $student->student_Name;
    $payments = Tr::find($request->id);
    $payments -> student_id = $request -> student_id;
    $payments -> note = $request->note;
    $payments -> value = $request->student_value;
    //write to the data base
    $payments ->save();
    $student ->save();
    $payments_cut ->save();
    session()->flash('Edit', 'تم تعديل المبلغ المالي للعائلة  '. $student_Name .' بنجاح ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('tr.student.pay'));
    }
    else {
    $student =  Student::find($request->student_id);
    $student_Name = $student->student_Name;
    session()->flash('Edit', 'لم يتم تعديل المبلغ المالي للعائلة  '. $student_Name .' يرجى التأكد من إضافة قيم جديدة ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('tr.student.pay'));
    }
}

public function destroy_students_tr(Request $request)
{
    /* here we have sued the table students and searched about the id using the find and then delete the
    id using the id note: we have passed the id from the show using the route */
    $student =  Student::find($request->student_id);
    $x = $student->tr_statu;
    --$x;
    $student->tr_statu = $x;
    $student_Name = $student->student_Name;



    $s;
    $payments_cut = Income::where('value_tr','>', 0)->first();
    $sta = $payments_cut->incomes_statu;
    --$sta;
    $payments_cut->incomes_statu = $sta;
    $s= $payments_cut->value_tr;
    $a=$request->student_value;
    //dd($a);
    $m = $s + $a;
    //dd($m);
    $payments_cut->value_tr = $m;

    Tr::find($request->id)->delete();
    $payments_cut->save();
    $student->save();

    /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
    session()->flash('Delete','تم حذف المبلغ المالي للعائلة  '. $student_Name .' بنجاح ');
    return redirect(route('tr.student.pay'));
}
##################################################### student End
}
