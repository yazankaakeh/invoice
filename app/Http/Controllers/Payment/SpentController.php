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

class SpentController extends Controller
{

  ##################################################### Family start
    public function euro()
    {
    $payments_income = Income::select('value_euro')->distinct()->get();
    $payments = Euro::with('family')->get();
    return view('payments.spent.family_euro',compact("payments",'payments_income'));//->with($payments)
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

    $payments_cut = Income::where('value_euro','>', 0)->first();

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
    $payments_cut = Income::where('value_euro','>', 0)->first();
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

}