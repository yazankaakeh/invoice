<?php

namespace App\Http\Controllers\Payment;


use App\models\Payment\Income;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class IncomeController extends Controller
{

function __construct()
{
$this->middleware('permission: قسم الدخل المالي ', ['only' => ['index']]);
$this->middleware('permission: إضافة دفعة قسم الدخل المالي ', ['only' => ['store']]);
$this->middleware('permission: حذف الدفعة قسم الدخل المالي ', ['only' => ['update']]);
$this->middleware('permission: تعديل الدفعة قسم الدخل المالي ', ['only' => ['destroy']]);
}


    public function index()
    {
        $income['income'] = Income::select('id','value_usd_fixed','value_euro_fixed','number_bim','number_bim_fixed','value_bim','value_tr_fixed','note','created_at','value_tr','value_usd','value_euro')
        ->orderBy('id', 'DESC')
        ->get();
        //dd($payments);
        return view('payments.income')->with($income);//
    }
    public function messages()
    {
    return $messages = [
        'value_tr.required' => '!لم يتم ادخال قيمة مالية بالتركي !',
        'value_euro.required' => 'لم يتم ادخال قيمة مالية باليورو  !!',
        'value_bim.required' => 'لم يتم ادخال قيمة   كرت البيم !!',
        'number_bim.required' => 'لم يتم ادخال قيمة  عدد كرت البيم !!',
        'value_usd.required' => 'لم يتم ادخال قيمة  مالية بالدولار   !!',
        'note.required' => 'يجب عليك ادخال ملاحظة او كتابة كلمة لايوجد  !!',


    ];
}
    public function store(Request $request)
    {
        $messages = $this->messages();
        $this->validate($request,[
            // 'value_tr' => 'required',
            // 'value_euro'=> 'required',
            // 'value_bim'=> 'required',
            // 'number_bim'=> 'required',
            // 'value_usd'=> 'required',
            // 'note'=> 'required',
        ],$messages);

         //create new object of the model student and make mapping to the data
         $incomes = new Income;
         $incomes -> value_tr = $request->value_tr;
         $incomes -> value_tr_fixed = $request->value_tr;
         $incomes -> note = $request->note;
         $incomes -> value_usd = $request->value_usd;
         $incomes -> value_usd_fixed = $request->value_usd;
         $incomes -> value_euro_fixed = $request->value_euro;
         $incomes -> value_euro = $request->value_euro;
         $incomes -> value_bim = $request->value_bim;
         $incomes -> number_bim_fixed = $request->number_bim;
         $incomes -> number_bim = $request->number_bim;
         //write to the data base
         $incomes ->save();
         session()->flash('Add','تم اضافة مبلغ مالي بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('income.show'));
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'value_tr' => 'required',
            'id'=> 'required',
            'value_euro'=> 'required',
            'value_usd'=> 'required',
            'value_bim'=> 'required',
            'number_bim'=> 'required',
            'note'=> 'required',
         ]);
         $incomes =  Income::find($request->id);

        $tr = $incomes -> value_tr_fixed  - $incomes -> value_tr ;
        $tr_fn = $request->value_tr - $tr;

        $eu = $incomes -> value_euro_fixed  - $incomes -> value_euro ;
        $eu_fn = $request->value_euro - $eu;

        $usd = $incomes -> value_usd_fixed  - $incomes -> value_usd ;
        $usd_fn = $request->value_usd - $usd;

        $bim = $incomes -> number_bim_fixed - $incomes -> number_bim  ;
        $bim_fn = $request->number_bim - $bim;

        if($bim_fn > 0  && $usd_fn  > 0 &&  $eu_fn > 0 && $tr_fn > 0 )
        {

         //create new object of the model student and make mapping to the data
         $incomes -> value_tr = $tr_fn;
         $incomes -> value_tr_fixed = $request->value_tr;
         $incomes -> note = $request->note;
         $incomes -> value_usd = $usd_fn;
         $incomes -> value_usd_fixed = $request->value_usd;
         $incomes -> value_euro_fixed = $request->value_euro;
         $incomes -> value_euro = $eu_fn;
         $incomes -> value_bim = $request->value_bim;
         $incomes -> number_bim_fixed = $request->number_bim;
         $incomes -> number_bim =  $bim_fn;

         //write to the data base
         $incomes ->save();
         session()->flash('Edit','تم تعديل المبلغ المالي بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('income.show'));
        }
        else {
         session()->flash('warning','التعديل الذي قمت به غير صالح');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('income.show'));
        }
    }

    public function destroy(Request $request)
    {
        $incomes =  Income::find($request->id);
        if($incomes->incomes_statu == 0){

        Income::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف المبلغ المالي  بنجاح ');
        return redirect(route('income.show'));
        }else {
        session()->flash('warning','لايمكن حذف المبلغ المالي بعد ان قمت بالسحب منه ');
        return redirect(route('income.show'));
        }
    }
}
