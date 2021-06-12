<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Student\StudentController;
use App\models\Medical\Medical;
use App\models\Family\Family;
use App\models\Payment\Income;
use App\models\Payment\Euro;
use Illuminate\Support\Facades\DB;
use App\models\Student\Student;
use App\models\Payment\Student_Payment;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\Controller;

class EuroController extends Controller
{


function __construct()
{
$this->middleware('permission: مدفوعات باليورو العائلات ', ['only' => ['family_ind_euro']]);
$this->middleware('permission: مدفوعات باليورو العائلات ', ['only' => ['show_family_euro']]);
$this->middleware('permission: إضافة دفعة باليورو العائلات ', ['only' => ['store_family_euro']]);
$this->middleware('permission: تعديل دفعة باليورو العائلات ', ['only' => ['update_family_euro']]);
$this->middleware('permission: حذف دفعة باليورو العائلات ', ['only' => ['destroy_familys_euro']]);

$this->middleware('permission: مدفوعات باليورو الطلاب ', ['only' => ['student_ind_euro']]);
$this->middleware('permission: مدفوعات باليورو الطلاب ', ['only' => ['show_student_euro']]);
$this->middleware('permission: إضافة دفعة باليورو الطلاب ', ['only' => ['store_student_euro']]);
$this->middleware('permission: تعديل دفعة باليورو الطلاب ', ['only' => ['update_student_euro']]);
$this->middleware('permission: حذف دفعة باليورو الطلاب ', ['only' => ['destroy_students_euro']]);

$this->middleware('permission: مدفوعات باليورو الطبي ', ['only' => ['medical_ind_euro']]);
$this->middleware('permission: مدفوعات باليورو الطبي ', ['only' => ['show_medical_euro']]);
$this->middleware('permission: إضافة دفعة باليورو الطبي ', ['only' => ['store_medical_euro']]);
$this->middleware('permission: تعديل دفعة باليورو الطبي ', ['only' => ['update_medical_euro']]);
$this->middleware('permission: حذف دفعة باليورو الطبي ', ['only' => ['destroy_medicals_euro']]);


$this->middleware('permission: مدفوعات باليورو ', ['only' => ['spent_ind_euro']]);
$this->middleware('permission: مدفوعات باليورو ', ['only' => ['show_spent_euro']]);
$this->middleware('permission: اضافة مدفوعات باليورو ', ['only' => ['store_spent_euro']]);
$this->middleware('permission: تعديل مدفوعات باليورو ', ['only' => ['update_spent_euro']]);
$this->middleware('permission: حذف مدفوعات باليورو ', ['only' => ['destroy_spent_euro']]);
}

  ##################################################### Family start
public function family_ind_euro()
{
    $payments_income = Income::select('value_euro')->distinct()->get();
    $payments = Euro::with('family')->get();
    return view('payments.family.family_euro',compact("payments",'payments_income'));//->with($payments)
}


    public function messages_family()
    {
    return $messages_family = [
        'family_id.required' => '!!',
        'family_value_euro.required' => 'لم يتم ادخال البملغ المالي باليورو !!',
        'note.required' => 'يجب عليك ادخال ملاحظة او كتابة كلمة لايوجد  !!',


    ];
}
public function store_family_euro(Request $request)
{
    $messages = $this->messages_family();
    $this->validate($request,[
        'family_id' => 'required',
        'family_value_euro' => 'required',
        'note'=> 'required',
    ],$messages);
    $s;
    if ($check = DB::table('incomes')->where('value_euro','!=', null)->where('value_euro','!=', 0)->latest()->first() != null) {
    $payments_cut = Income::where('value_euro','>', 0)
    //->having('family_value_euro', '>', 0)
    ->first();
    $s= $payments_cut->value_euro;
    $a=$request->family_value_euro;
    //dd($a);
    $m = $s - $a;
    if ($m < 0) {
    session()->flash('Warning','  المبلغ المضاف غير كافي بقيمة اليورو يرجى الدفع على دفعتين القيمة باليورو هي:  '.$payments_cut->value_euro.'');
        //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('family.show'));
    }
    else {
        $payments_cut->value_euro = $m;
        $sta = $payments_cut->incomes_statu;
        ++$sta;
        $payments_cut->incomes_statu = $sta;
        $payments_cut ->save();
    }

    //create new object of the model student and make mapping to the data
    $family =  Family::find($request->family_id);
    $x = $family->euro_statu;
    ++$x;
    $family->euro_statu = $x;
    $family_Conseuroaint = $family->family_Conseuroaint;
    $payments = new Euro;
    $payments -> family_id = $request -> family_id;
    $payments -> note = $request->note;

    $payments -> family_value_euro = $request->family_value_euro;
    //write to the data base
    $payments ->save();
    $family ->save();
    session()->flash('Edit', 'تم إضافة المبلغ المالي للعائلة  '. $family_Conseuroaint .' بنجاح ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('family.show'));
    }
    else {
    session()->flash('Warning', 'لايوجد مبالغ مالية متوفرة ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('family.show'));
    }
}
public function messages_update_family()
{
return $messages_update_family = [
    'family_id.required' => '!!',
    'family_value_euro.required' => 'لم يتم ادخال البملغ المالي باليورو !!',
    'note.required' => 'يجب عليك ادخال ملاحظة او كتابة كلمة لايوجد  !!',


];
}
public function update_family_euro(Request $request)
{
    $messages = $this->messages_update_family();
    $this->validate($request, [
        'family_id' => 'required',
        'id' => 'required',
        'family_value_euro' => 'required',
        'family_value_euro1' => 'required',
        'note'=> 'required',
    ],$messages);

    if ($request->family_value_euro1 != $request->family_value_euro)
    {

    $payments_cut = Income::where('value_euro','>=', 0)->first();

    $s= $payments_cut->value_euro;
    $a=$request->family_value_euro1;
    $m = $s + $a;
    $payments_cut->value_euro = $m;
    $m =0;

    $s= $payments_cut->value_euro;
    $a=$request->family_value_euro;
    $m = $s - $a;

    if ($m < 0) {
    session()->flash('Warning','  المبلغ المضاف غير كافي بقيمة اليورو يرجى الدفع على دفعتين القيمة المتبقية باليورو هي :  '.$payments_cut->value_euro.'');
        //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
        return redirect(route('euro.family.pay'));
    }
    elseif ($m > 0) {
    $payments_cut->value_euro =$m  ;

    }
    //create new object of the model student and make mapping to the data
    $family =  Family::find($request->family_id);
    $family_Conseuroaint = $family->family_Conseuroaint;
    $payments = Euro::find($request->id);
    $payments -> family_id = $request -> family_id;
    $payments -> note = $request->note;
    $payments -> family_value_euro = $request->family_value_euro;
    //write to the data base
    $payments ->save();
    $family ->save();
    $payments_cut ->save();
    session()->flash('Edit', 'تم تعديل المبلغ المالي للعائلة  '. $family_Conseuroaint .' بنجاح ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('euro.family.pay'));
    }
    else {
    $family =  Family::find($request->family_id);
    $family_Conseuroaint = $family->family_Conseuroaint;
    session()->flash('Edit', 'لم يتم تعديل المبلغ المالي للعائلة  '. $family_Conseuroaint .' يرجى التأكد من إضافة قيم جديدة ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('euro.family.pay'));
    }



}

public function show_family_euro($id)
{
    $payments_income = Income::select('value_euro')->distinct()->get();
    $payments = Euro::where('family_id', $id)->get();
    // $child = DB::table('childrens')->where('student_id', $id)->get();
    return view('payments.family.family_euro',compact('payments','payments_income'));
}

public function destroy_familys_euro(Request $request)
{
    /* here we have sued the table students and searched about the id using the find and then delete the
    id using the id note: we have passed the id from the show using the route */
    $family =  Family::find($request->family_id);
    $x = $family->euro_statu;
    --$x;
    $family->euro_statu = $x;
    $family_Conseuroaint = $family->family_Conseuroaint;

    $s;
    $payments_cut = Income::where('value_euro','>=', 0)->first();
    $sta = $payments_cut->incomes_statu;
    --$sta;
    $payments_cut->incomes_statu = $sta;
    $s= $payments_cut->value_euro;
    $a=$request->family_value_euro;
    //dd($a);
    $m = $s + $a;
    //dd($m);
    $payments_cut->value_euro = $m;

    Euro::find($request->id)->delete();
    $payments_cut->save();
    $family->save();

    /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
    session()->flash('Delete','تم حذف المبلغ المالي للعائلة  '. $family_Conseuroaint .' بنجاح ');
    return redirect(route('euro.family.pay'));
}

##################################################### Family end
#########################################
#######################
#########################################
##################################################### medical start

public function medical_ind_euro()
{
    $payments_income = Income::select('value_euro')->distinct()->get();
    $payments = Euro::with('medical')->get();
    return view('payments.medical.medical_euro',compact("payments",'payments_income'));//->with($payments)
}
public function messages_medical_euro()
{
return $messages_medical_euro = [
    'medical_id.required' => '!!',
    'medical_value_euro.required' => 'لم يتم ادخال البملغ المالي باليورو !!',
    'note.required' => 'يجب عليك ادخال ملاحظة او كتابة كلمة لايوجد  !!',


];
}
public function store_medical_euro(Request $request)
{
    $messages = $this->messages_medical_euro();
    $this->validate($request,[
        'medical_id' => 'required',
        'medical_value_euro' => 'required',
        'note'=> 'required',
    ],$messages);
    $s;
    if ($check = DB::table('incomes')->where('value_euro','!=', null)->where('value_euro','!=', 0)->latest()->first() != null) {
    $payments_cut = Income::where('value_euro','>', 0)
    //->having('medical_value_euro', '>', 0)
    ->first();
    $s= $payments_cut->value_euro;
    $a=$request->medical_value_euro;
    //dd($a);
    $m = $s - $a;
    if ($m < 0) {
    session()->flash('Warning','  المبلغ المضاف غير كافي بقيمة اليورو يرجى الدفع على دفعتين القيمة المتبقية باليورو هي:  '.$payments_cut->value_euro.'');
        //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('medical.show'));
    }
    else {
        $payments_cut->value_euro = $m;
        $sta = $payments_cut->incomes_statu;
        ++$sta;
        $payments_cut->incomes_statu = $sta;
        $payments_cut ->save();
    }

    //create new object of the model student and make mapping to the data
    $medical =  Medical::find($request->medical_id);
    $x = $medical->euro_statu;
    ++$x;
    $medical->euro_statu = $x;
    $medical_Name = $medical->medical_Name;
    $payments = new Euro;
    $payments -> medical_id = $request -> medical_id;
    $payments -> note = $request->note;
    $payments -> medical_value_euro = $request->medical_value_euro;
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
public function messages_medical()
{
return $messages_medical = [
    'medical_id.required' => '!!',
    'medical_value_euro.required' => 'لم يتم ادخال البملغ المالي باليورو !!',
    'note.required' => 'يجب عليك ادخال ملاحظة او كتابة كلمة لايوجد  !!',


];
}

public function update_medical_euro(Request $request)
{
    $messages = $this->messages_medical();
    $this->validate($request, [
        'medical_id' => 'required',
        'id' => 'required',
        'medical_value_euro' => 'required',
        'medical_value_euro1' => 'required',
        'note'=> 'required',
        ],$messages);
    if ($request->medical_value_euro1 != $request->medical_value_euro)
    {

    $payments_cut = Income::where('value_euro','>=', 0)->first();

    $s= $payments_cut->value_euro;
    $a=$request->medical_value_euro1;
    $m = $s + $a;
    $payments_cut->value_euro = $m;
    $m =0;

    $s= $payments_cut->value_euro;
    $a=$request->medical_value_euro;
    $m = $s - $a;

    if ($m < 0) {
    session()->flash('Warning','    المبلغ المضاف غير كافي بقيمة اليورو يرجى الدفع على دفعتين القيمة المتبقية باليورو هي:  '.$payments_cut->value_euro.'');
        //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
        return redirect(route('euro.medical.pay'));
    }
    elseif ($m > 0) {
    $payments_cut->value_euro = $m ;

    }
    //create new object of the model student and make mapping to the data
    $medical =  Medical::find($request->medical_id);
    $medical_Name = $medical->medical_Name;
    $payments = Euro::find($request->id);
    $payments -> medical_id = $request -> medical_id;
    $payments -> note = $request->note;
    $payments -> medical_value_euro = $request->medical_value_euro;
    //write to the data base
    $payments ->save();
    $medical ->save();
    $payments_cut ->save();
    session()->flash('Edit', 'تم تعديل المبلغ المالي للعائلة  '. $medical_Name .' بنجاح ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('euro.medical.pay'));
    }
    else {
    $medical =  Medical::find($request->medical_id);
    $medical_Name = $medical->medical_Name;
    session()->flash('Edit', 'لم يتم تعديل المبلغ المالي للعائلة  '. $medical_Name .' يرجى التأكد من إضافة قيم جديدة ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('euro.medical.pay'));
    }
}

public function show_medical_euro($id)
{
    $payments_income = Income::select('value_euro')->distinct()->get();
    $payments = Euro::where('medical_id', $id)->get();
    // $child = DB::table('childrens')->where('student_id', $id)->get();
    return view('payments.medical.medical_euro',compact('payments','payments_income'));
}

public function destroy_medicals_euro(Request $request)
{
    $this->validate($request, [
        'medical_id' => 'required',
        'id' => 'required',
        'medical_value_euro' => 'required',
        'note'=> 'required',
    ]);
    /* here we have sued the table students and searched about the id using the find and then delete the
    id using the id note: we have passed the id from the show using the route */
    $medical =  Medical::find($request->medical_id);
    $x = $medical->euro_statu;
    --$x;
    $medical->euro_statu = $x;
    $medical_Name = $medical->medical_Name;

    $s;
    $payments_cut = Income::where('value_euro','>=', 0)->first();
    $sta = $payments_cut->incomes_statu;
    --$sta;
    $payments_cut->incomes_statu = $sta;
    $s= $payments_cut->value_euro;
    $a=$request->medical_value_euro;
    //dd($a);
    $m = $s + $a;
    //dd($m);
    $payments_cut->value_euro = $m;

    Euro::find($request->id)->delete();
    $payments_cut->save();
    $medical->save();

    /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
    session()->flash('Delete','تم حذف المبلغ المالي للعائلة  '. $medical_Name .' بنجاح ');
    return redirect(route('euro.medical.pay'));
}

##################################################### medical End
#########################################
#######################
#########################################
##################################################### student start

public function student_ind_euro()
{
    $payments_income = Income::select('value_euro')->distinct()->get();
    $payments = Euro::with('student')->get();
    return view('payments.student.student_euro',compact("payments",'payments_income'));//->with($payments)
}

public function show_student_euro($id)
{
    $payments_income = Income::select('value_euro')->distinct()->get();
    $payments = Euro::where('student_id', $id)->get();
    // $child = DB::table('childrens')->where('student_id', $id)->get();
    return view('payments.student.student_euro',compact('payments','payments_income'));
}

public function messages_student_euro()
{
return $messages_student_euro = [
    'student_id.required' => '!!',
    'student_value.required' => 'لم يتم ادخال البملغ المالي باليورو !!',
    'note.required' => 'يجب عليك ادخال ملاحظة او كتابة كلمة لايوجد  !!',


];
}
public function store_student_euro(Request $request)
{
    $messages = $this->messages_student_euro();
    $this->validate($request,[
        'student_id' => 'required',
        'student_value' => 'required',
        'note'=> 'required',
    ],$messages);
    $s;
    if ($check = DB::table('incomes')->where('value_euro','!=', null)->where('value_euro','!=', 0)->latest()->first() != null) {
    $payments_cut = Income::where('value_euro','>', 0)
    //->having('student_value_euro', '>', 0)
    ->first();
    $s= $payments_cut->value_euro;
    $a=$request->student_value;
    //dd($a);
    $m = $s - $a;
    if ($m < 0) {
    session()->flash('Warning','  المبلغ المضاف غير كافي بقيمة اليورو يرجى الدفع على دفعتين القيمة المتبقية باليورو هي:  '.$payments_cut->value_euro.'');
        //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('student.show'));
    }
    else {
        $payments_cut->value_euro = $m;
        $sta = $payments_cut->incomes_statu;
        ++$sta;
        $payments_cut->incomes_statu = $sta;
        $payments_cut ->save();
    }

    //create new object of the model student and make mapping to the data
    $student =  Student::find($request->student_id);
    $x = $student->euro_statu;
    ++$x;
    $student->euro_statu = $x;
    $student_Name = $student->student_name;
    $payments = new Euro;
    $payments -> student_id = $request -> student_id;
    $payments -> note = $request->note;
    $payments -> value_euro = $request->student_value;
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
public function messages_updat_student_euro()
{
    return $messages_updat_student_euro = [
    'student_id.required' => '!!',
    'student_value.required' => 'لم يتم ادخال البملغ المالي باليورو !!',
    'note.required' => 'يجب عليك ادخال ملاحظة او كتابة كلمة لايوجد  !!',


];
}
public function update_student_euro(Request $request)
{
    $messages = $this->messages_updat_student_euro();
    $this->validate($request, [
        'student_id' => 'required',
        'id' => 'required',
        'student_value1' => 'required',
        'student_value' => 'required',
        'note'=> 'required',
    ],$messages);
    if ($request->student_value1 != $request->student_value)
    {

    $payments_cut = Income::where('value_euro','>=', 0)->first();

    $s= $payments_cut->value_euro;
    $a=$request->student_value1;
    $m = $s + $a;
    $payments_cut->value_euro = $m;
    $m =0;

    $s= $payments_cut->value_euro;
    $a=$request->student_value;
    $m = $s - $a;

    if ($m < 0) {
    session()->flash('Warning','  المبلغ المضاف غير كافي بقيمة اليورو يرجى الدفع على دفعتين القيمة المتبقية باليورو هي:  '.$payments_cut->value_euro.'');
        //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
        return redirect(route('euro.student.pay'));
    }
    elseif ($m > 0) {
    $payments_cut->value_euro =$m  ;

    }
    //create new object of the model student and make mapping to the data
    $student =  Student::find($request->student_id);
    $student_Name = $student->student_name;
    $payments = Euro::find($request->id);
    $payments -> student_id = $request -> student_id;
    $payments -> note = $request->note;
    $payments -> value_euro = $request->student_value;
    //write to the data base
    $payments ->save();
    $student ->save();
    $payments_cut ->save();
    session()->flash('Edit', 'تم تعديل المبلغ المالي للطالب  '. $student_Name .' بنجاح ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('euro.student.pay'));
    }
    else {
    $student =  Student::find($request->student_id);
    $student_Name = $student->student_name;
    session()->flash('Edit', 'لم يتم تعديل المبلغ المالي للطالب  '. $student_Name .' يرجى التأكد من إضافة قيم جديدة ');
    //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    return redirect(route('euro.student.pay'));
    }
}

public function destroy_students_euro(Request $request)
{
    /* here we have sued the table students and searched about the id using the find and then delete the
    id using the id note: we have passed the id from the show using the route */
    $student =  Student::find($request->student_id);
    $x = $student->euro_statu;
    --$x;
    $student->euro_statu = $x;
    $student_Name = $student->student_name;

    $s;
    $payments_cut = Income::where('value_euro','>=', 0)->first();
    $sta = $payments_cut->incomes_statu;
    --$sta;
    $payments_cut->incomes_statu = $sta;
    $s= $payments_cut->value_euro;
    $a=$request->student_value;
    //dd($a);
    $m = $s + $a;
    //dd($m);
    $payments_cut->value_euro = $m;

    Euro::find($request->id)->delete();
    $payments_cut->save();
    $student->save();

    /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
    session()->flash('Delete','تم حذف المبلغ المالي للطالب  '. $student_Name .' بنجاح ');
    return redirect(route('euro.student.pay'));
}

##################################################### student End
#############################################
########################
#############################################
##################################################### Spent Euro

       public function spent_ind_euro()
        {
            $payments = Euro::all();
            return view('payments.spent.Euro',compact("payments"));//->with($payments)
        }

            public function show_spent_euro($id)
        {
            $payments = Euro::where('id', $id)->get();
            return view('payments.spent.Euro',compact("payments"));//->with($payments)
        }

            public function messages_spent_euro()
        {
            return $messages_student_Euro = [
            'spent_value_Euro.required' => 'ادخال يجب ان اكون قيمة الدولار ارقام فقط !!',
            'spent_value_Euro.numeric' => 'لم يتم ادخال قيمة  بالدولار  !!',
            'desc.required' => 'يجب عليك ادخال معلومات الفاتورة !!',
            'note.required' => 'يجب عليك ادخال ملاحظة او كتابة كلمة لايوجد  !!',
            ];
        }

            public function store_spent_euro(Request $request)
        {
           // dd($request);
            $messages = $this->messages_student_Euro();
            $this->validate($request,[
                'user_name' => 'required',
                'spent_value_euro' => 'required|numeric',
                'desc'=> 'required',
                'note'=> 'required',
            ],$messages);
            $s;
            if ($check = DB::table('incomes')->where('value_euro','!=', null)->where('value_euro','!=', 0)->latest()->first() != null)
            {
            $payments_cut = Income::where('value_euro','>=', 0)->first();

            $s= $payments_cut->value_euro;
            $a=$request->spent_value_euro;
            //dd($a);

            $m = $s - $a;
            if ($m < 0) {
            session()->flash('Warning','  المبلغ المضاف غير كافي بقيمة الدولار يرجى الدفع على دفعتين القيمة المتبقية بالدولار  هي:  '.$payments_cut->value_Euro.'');
                //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
            return redirect(route('euro.pay'));
            }
            else {
                // Subtract from incomes
                // incomes status
                $sta = $payments_cut->incomes_statu;
                ++$sta;
                $payments_cut->incomes_statu = $sta;
                // incomes status
                $payments_cut->value_euro = $m;
                $payments_cut ->save();
            }

            //create new object of the model student and make mapping to the data
            $payments = new Euro;
            $payments -> note = $request->note;
            $payments -> spent_value_euro = $request->spent_value_euro;
            $payments -> user_name = $request->user_name;
            $payments -> desc = $request->desc;
            //write to the data base
            $payments ->save();
            session()->flash('Edit', 'تم إضافة المبلغ بنجاح');
            //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
            return redirect(route('euro.pay'));
            }
            else {
            session()->flash('Warning', 'لايوجد مبالغ مالية متوفرة ');
            //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
            return redirect(route('euro.pay'));
            }
        }

            public function messages_update_spent_euro()
        {
            return $messages_update_spent_euro = [
            'spent_value_Euro.required' => 'ادخال يجب ان اكون قيمة باليورو ارقام فقط !!',
            'spent_value_Euro.numeric' => 'لم يتم ادخال قيمة  باليورو  !!',
            'desc.required' => 'يجب عليك ادخال معلومات الفاتورة !!',
            'note.required' => 'يجب عليك ادخال ملاحظة او كتابة كلمة لايوجد  !!',
            ];
        }
            public function update_spent_euro(Request $request)
        {
            $messages = $this->messages_update_spent_euro ();
            $this->validate($request, [
                'user_name' => 'required',
                'id' => 'required',
                'spent_value_euro' => 'required|numeric',
                'spent_value_euro1' => 'required|numeric',
                'desc'=> 'required',
                'note'=> 'required',
            ],$messages);

            if ($request->spent_value_euro1 != $request->spent_value_euro)
            {

            $payments_cut = Income::where('value_euro','>=', 0)->first();

            $s= $payments_cut->value_euro;
            $a=$request->spent_value_euro1;
            $m = $s + $a;
            $payments_cut->value_euro = $m;
            $m =0;

            $s= $payments_cut->value_euro;
            $a=$request->spent_value_euro;
            $m = $s - $a;

            if ($m < 0) {
            session()->flash('Warning','  المبلغ المضاف غير كافي بقيمة الدولار يرجى الدفع على دفعتين القيمة المتبقية باليورو  هي:  '.$payments_cut->value_euro.'');
                //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
                return redirect(route('euro.pay'));
            }
            elseif ($m > 0) {
            $payments_cut->value_euro = $m  ;

            }
            //create new object of the model student and make mapping to the data
            $payments = Euro::find($request->id);
            $payments -> note = $request->note;
            $payments -> spent_value_euro = $request->spent_value_euro;
            $payments -> user_name = $request->user_name;
            $payments -> desc = $request->desc;
            //write to the data base
            $payments ->save();
            $payments_cut ->save();
            session()->flash('Edit', 'تم تعديل المبلغ المالي بنجاح ');
            //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
            return redirect(route('euro.pay'));
            }
            else {

            session()->flash('Edit', 'لم يتم تعديل المبلغ المالي  يرجى التأكد من إضافة قيم جديدة ');
            //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
            return redirect(route('euro.pay'));
            }
        }

            public function destroy_spent_euro(Request $request)
        {
            /* here we have sued the table students and searched about the id using the find and then delete the
            id using the id note: we have passed the id from the show using the route */
            $s;
            $payments_cut = Income::where('value_euro','>=', 0)->first();
            $sta = $payments_cut->incomes_statu;
            --$sta;

            $payments_cut->incomes_statu = $sta;
            $s= $payments_cut->value_euro;
            $a=$request->spent_value_euro;

            //dd($a);
            $m = $s + $a;
            //dd($m);
            $payments_cut->value_euro = $m;

            Euro::find($request->id)->delete();
            $payments_cut->save();

            /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
            session()->flash('Delete','تم حذف المبلغ المالي بنجاح ');
            return redirect(route('euro.pay'));
        }

}
