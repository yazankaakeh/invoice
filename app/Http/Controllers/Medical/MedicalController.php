<?php

namespace App\Http\Controllers\Medical;

use App\Http\Controllers\Student\StudentController;
use App\models\Student\Student;
use App\models\Payment\Income;
use App\models\Medical\Medical;
use App\models\Publics\From;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MedicalController extends Controller
{


function __construct()
{
$this->middleware('permission: قسم الطبي ', ['only' => ['index']]);
$this->middleware('permission: اضافة قسم الطبي ', ['only' => ['store']]);
$this->middleware('permission: تعديل الطبي ', ['only' => ['update']]);
$this->middleware('permission: حذف الطبي ', ['only' => ['destroy']]);
//$this->middleware('permission: حذف مدرسة لطفل الطلاب ', ['only' => ['register']]);
$this->middleware('permission: فورم تسجيل الطبي ', ['only' => ['enable']]);


}



    public function messages()
    {
        return $messages = [
            'medical_name.required' => 'لم يتم أدخال  معلومات اسم المريض المطلوبة !!',
            'medical_age.required' => 'لم يتم أدخال  معلومات العمر للمريض  المطلوبة !!',
            'medical_age.numeric' => 'يجب أدخال العمر حصراً بالأرقام!!',
            'gender.required' => '    لم يتم أدخال  معلومات جنس المريض المطلوبة!!',
            'medical_have_id.required'=>'ادخل البريد اللإلكتروني هذه الخانة مطلوبة !!',
            'medical_id_extr.required'=>'لم يتم ادخال معلومات الهاتف هذه الخانة مطلوبة !!',
            'medical_number.required'=>'لم يتم أدخال معلومات الرقم الهاتف المطلوبة !!',
            'medical_number.unique'=>'الرقم موجود بالفعل يرجى كتابة رقم أخر !!',
            'medical_number.numeric'=>'يجب ان يكون الرقم فقط أرقام !!',
            'note.required'=>'يجب عليك ادخال ملاحظة او كتابة كلمة لايوجد !!',
        ];
    }

    public function index()
    {
        $payments = Income::select('value_bim')->distinct()->get();
        $medical = Medical::all();
        //dd($medical);
        //dd($students);
        return view('Medical.medical.medical',compact('medical','payments'));

    }


    public function store(Request $request)
    {
        $messages = $this->messages();
        $this->validate($request,[
            'medical_name' => 'required',
            'medical_age' => 'required',
            'gender' => 'required',
            'medical_have_id' => 'required',
            'medical_id_extr' => 'required',
            'medical_number' => 'required|numeric|unique:medicals',
            'note' => 'required'
         ],$messages);
         //create new object of the model student and make mapping to the data
         $medicals = new Medical;
         $medicals -> medical_name = $request->medical_name;
         $medicals -> medical_age = $request->medical_age;
         $medicals -> gender = $request->gender;
         $medicals -> medical_have_id = $request->medical_have_id;
         $medicals -> medical_id_extr = $request->medical_id_extr;
         $medicals -> medical_number = $request->medical_number;
         $medicals -> note = $request->note;

         //write to the data base
         $medicals ->save();
         if ($request->register == "admin") {
         session()->flash('Add', 'تم اضافة المريض ' . $request->medical_name . ' بنجاح ');
        $request=null;
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('medical.show'));
        }
        if($request->register == "register") {
        $enable = From::find(1);
        session()->flash('Add', 'تم اضافة المريض '. $request->student_name .' بنجاح ');
        $request=null;
        return view('Medical.medical.register_medical',compact('enable'));
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         }
    }

    public function update(Request $request)
    {

        $this->validate($request,[
            'medical_name' => 'required',
            'medical_age' => 'required',
            'gender' => 'required',
            'medical_have_id' => 'required',
            'medical_id_extr' => 'required',
            'medical_number' => 'required|numeric|unique:medicals',
            'note' => 'required'
         ]);
         //create new object of the model student and make mapping to the data
         $medicals =  Medical::find($request->id);
         $medicals -> medical_name = $request->medical_name;
         $medicals -> medical_age = $request->medical_age;
         $medicals -> gender = $request->gender;
         $medicals -> medical_have_id = $request->medical_have_id;
         $medicals -> medical_id_extr = $request->medical_id_extr;
         $medicals -> medical_number = $request->medical_number;
         $medicals -> note = $request->note;

         //write to the data base
         $medicals ->save();
         session()->flash('Add', 'تم تعديل المريض '.$request->medical_name.' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('medical.show'));
    }

    public function destroy(Request $request)
    {
        $medical =  Medical::find($request->id);
        $medical_name = $medical->medical_name;

        Medical::find($request->id)->delete();

        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف معلومات المريض  '. $medical_name .' بنجاح ');
        return redirect(route('medical.show'));
    }

    public function register(){
        $check = From::all();

    if($check->isEmpty())
        {
        $form = From::create([
            'student_form' => 0,
            'medical_form' => 0,
            'medical_form' => 0,

        ]);
        $enable = From::find(1);
        //dd($enable);

        return view('Medical.medical.register_medical',compact('enable'));
        }
        else {
        $enable = From::find(1);
        //dd($enable);
        return view('Medical.medical.register_medical',compact('enable'));

        }
    }

    public function enable(Request $request){
        $this->validate($request,[
            'enable' => 'required'
         ]);
         $enable = From::find('1');
         $enable->medical_form = $request->enable;

         $enable->save();
         session()->flash('Form', 'تم تعديل حالة قائمة تسجيل العائلات بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('medical.show'));
    }

}
