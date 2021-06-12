<?php

namespace App\Http\Controllers\Medical;

use App\Http\Controllers\Student\StudentController;
use App\models\Student\Student;
use App\models\Payment\Income;
use App\models\Medical\Medical;
use App\models\Publics\MedicalStatus;
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

    public function store_register(Request $request)
    {
        $messages = $this->messages();
        $this->validate($request,[
            'medical_name' => 'required',
            'medical_age' => 'required',
            'gender' => 'required',
            'medical_have_id' => 'required',
            'medical_id_extr' => 'required',
            'medical_number' => 'required|numeric|unique:medicals',
            'note' => 'required',
            'disease_type' => 'required',
            'disease_name' => 'required',
            'dr_name' => 'required',
            'treat_cost' => 'required',
            'treat_type' => 'required',
            'treat_Duratio' => 'required',
            'date_accept' => 'required',
            'date_end' => 'required',
            'Trans_to_doctor' => 'required'
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

         $medicals ->save();

         $MedicalStatues = new MedicalStatus;
         $MedicalStatues -> medical_id = $medicals->id;
         $MedicalStatues -> disease_name = $request->disease_name;
         $MedicalStatues -> disease_type = $request->disease_type;
         $MedicalStatues -> dr_name = $request->dr_name;
         $MedicalStatues -> medical_rate = $request->medical_rate;
         $MedicalStatues -> treat_cost = $request->treat_cost;
         $MedicalStatues -> treat_type = $request->treat_type;
         $MedicalStatues -> treat_Duratio = $request->treat_Duratio;
         $MedicalStatues -> date_accept = $request->date_accept;
         $MedicalStatues -> date_end = $request->date_end;
         $MedicalStatues -> Trans_to_doctor = $request->Trans_to_doctor;
         //write to the data base
         $MedicalStatues ->save();

         //write to the data base



        $enable = From::find(1);
        session()->flash('Add', 'تم اضافة المريض '. $request->student_name .' بنجاح ');
        return back()->with('enable');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')

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
            'disease_type.required' => 'لم يتم ادخال نوع المرض !!',
            'disease_name.required' => 'لم يتم ادخال  اسم المريض  !!',
            'dr_name.required' => 'لم يتم اسم الطبيب   !!',
            'treat_cost.required'  => 'لم يتم ادخال تكلفة العلاج  !!',
            'treat_type.required'  => 'لم يتم ادخال  نوع العلاج  !!',
            'treat_Duratio.required'  => 'لم يتم ادخال نوع مدة العلاج   !!',
            'date_accept.required'  => 'لم يتم ادخال  تاريخ البدء    !!',
            'date_end.required'  => 'لم يتم ادخال  تاريخ الأنهاء    !!',
            'Trans_to_doctor.required'  => 'لم يتم ادخال  اسم طيب أخر ان وجد او أكتب لايوجد!!',
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
         $medicals -> new_statu = 1;

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
        $id = $request->id;
        $messages = $this->messages();
        $this->validate($request,[

            'medical_name' => 'required',
            'medical_age' => 'required',
            'gender' => 'required',
            'medical_have_id' => 'required',
            'medical_id_extr' => 'required',
            'medical_number' => 'required|numeric|unique:medicals,medical_number,$id',
            'note' => 'required'
         ],$messages);
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


    public function medical_statu(Request $request)
    {
        if($request->statu == 1)
        {
        $medicals = Medical::find($request->medical_id);
        $medicals->new_statu = $request->statu;
        session()->flash('accepted', 'تم تعديل حالة المريض '. $request->medical_name .' لمقيول  ');
        $medicals->save();
        return back();
        }

        if($request->statu == 2)
        {
        $medicals = Medical::find($request->medical_id);
        $medicals->new_statu = $request->statu;
        session()->flash('rejected', 'تم تعديل حالة المريض '. $request->medical_name .' لمرفوض  ');
        $medicals->save();
        return back();
        }

        if($request->statu == 3)
        {
        $medicals = Medical::find($request->medical_id);
        $medicals->new_statu = $request->statu;
        session()->flash('archived', 'تم تعديل حالة المريض '. $request->medical_name .' للأرشفة  ');
        $medicals->save();
        return back();
        }

        if($request->statu == 4)
        {
        $medicals = Medical::find($request->medical_id);
        $medicals->new_statu = $request->statu;
        session()->flash('delayed', 'تم تعديل حالة المريض '. $request->medical_name .' للمؤجل  ');
        $medicals->save();
        return back();
        }

        if($request->statu == 0)
        {
        $medicals = medical::find($request->medical_id);
        $medicals->new_statu = $request->statu;
        session()->flash('new', 'تم تعديل حالة الطالب '. $request->medical_name .' للجديد  ');
        $students->save();
        return back();
        }
    }


    public function rejected_medical()
    {
        $medical = MedicalStatus::all();
        return view('Medical.medical.rejected_medical',compact('medical'));
    }

    public function delayed_medical()
    {
        $medical = MedicalStatus::all();
        return view('Medical.medical.delayed_medical',compact('medical'));
    }

    public function new_medical()
    {
        $medical = MedicalStatus::all();
        return view('Medical.medical.new_medical',compact('medical'));
    }

    public function archievd_medical()
    {
        $medical = MedicalStatus::all();
        return view('Medical.medical.archievd_medical',compact('medical'));
    }

}
