<?php

namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Student\StudentController;
use App\models\Medical\Medical;
use App\models\Student\Student;
use Illuminate\Support\Facades\DB;
use App\models\Publics\MedicalStatus;
use Illuminate\Http\Request;
//new route to exrend the controller
use App\Http\Controllers\Controller;



class MedicalStatusController extends Controller
{


function __construct()
{

    $this->middleware('permission: قسم الحالة الصحية الطبي ', ['only' => ['show_medical']]);
    $this->middleware('permission: قسم الحالة الصحية الطبي ', ['only' => ['index_medical']]);
    $this->middleware('permission: إضافة الحالة الصحية الطبي ', ['only' => ['store_medical']]);
    $this->middleware('permission: تعديل قسم الحالة الصحية الطبي ', ['only' => ['update_medical']]);
    $this->middleware('permission:حذف قسم العمل الطبي ', ['only' => ['destroy_medical']]);

    $this->middleware('permission: قسم الحالة الصحية الطلاب ', ['only' => ['index']]);
    $this->middleware('permission: قسم الحالة الصحية الطلاب ', ['only' => ['show']]);
    $this->middleware('permission: اضافة الحالة الصحية الطلاب ', ['only' => ['storestudent']]);
    $this->middleware('permission: تعديل قسم الحالة الصحية الطلاب ', ['only' => ['update']]);
    $this->middleware('permission:حذف قسم الحالة الصحية الطبي ', ['only' => ['destroy']]);

}


///////////////////////////////////////// Student Start //////////////////////////////////////////

    public function show($id){
      $med = MedicalStatus::where('student_id', $id)->get();
      return view('Student.med_sta.med_sta',compact('med'));
    }
    public function messages_student()
    {
    return $messages_student = [
        'student_id.required' => '!!',
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
    public function storestudent(Request $request)
    {
        $messages = $this->messages_student();
        $this->validate($request,[
            'student_id'=>'required',
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
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;
         $x=1;
         $students->medical_statu = $x;

         $MedicalStatues = new MedicalStatus;
         $MedicalStatues -> student_id = $request->student_id;
         $MedicalStatues -> disease_name = $request->disease_name;
         $MedicalStatues -> disease_type = $request->disease_type;
         $MedicalStatues -> dr_name = $request->dr_name;
         $MedicalStatues -> treat_cost = $request->treat_cost;
         $MedicalStatues -> treat_type = $request->treat_type;
         $MedicalStatues -> treat_Duratio = $request->treat_Duratio;
         $MedicalStatues -> date_accept = $request->date_accept;
         $MedicalStatues -> date_end = $request->date_end;
         $MedicalStatues -> Trans_to_doctor = $request->Trans_to_doctor;
         //write to the data base
         $students ->save();
         $MedicalStatues ->save();
         session()->flash('Add_MedicalStatues',  'تم اضافة الحالة الطبية للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('student.show'));

    }

    public function index()
    {
        $med['med'] = MedicalStatus::select('id','student_id','updated_at','disease_type','disease_name',
       'dr_name','treat_type','treat_cost',
       'treat_Duratio','date_accept','date_end','Trans_to_doctor'
       )
       ->orderBy('id', 'DESC')
       ->get();
       return view('Student.med_sta.med_sta')->with($med);
    }
    public function messages_update()
    {
    return $messages_update = [
        'student_id.required' => '!!',
        'id.required' => '!!',
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
    public function update(Request $request, MedicalStatus $medicalStatus)
    {

        $messages = $this->messages_update();
        $this->validate($request,[
            'student_id'=>'required',
            'id'=>'required',
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
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;

         $MedicalStatues = MedicalStatus::find($request->id);
         $MedicalStatues -> student_id = $request->student_id;
         $MedicalStatues -> disease_name = $request->disease_name;
         $MedicalStatues -> disease_type = $request->disease_type;
         $MedicalStatues -> dr_name = $request->dr_name;
         $MedicalStatues -> treat_cost = $request->treat_cost;
         $MedicalStatues -> treat_type = $request->treat_type;
         $MedicalStatues -> treat_Duratio = $request->treat_Duratio;
         $MedicalStatues -> date_accept = $request->date_accept;
         $MedicalStatues -> date_end = $request->date_end;
         $MedicalStatues -> Trans_to_doctor = $request->Trans_to_doctor;
         //write to the data base
         $MedicalStatues ->save();
         session()->flash('Edit',  'تم تعديل الحالة الطبية للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('Medical_Statu.show'));

    }

    public function destroy(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $students =  Student::find($request->student_id);
        $x=0;
        $students->medical_statu = $x;
        $student_name = $students->student_name;

        MedicalStatus::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف معلومات الحالة الطبية  '.$request->childre_name.' الخاصة بالطالب  '. $student_name .' بنجاح ');
        $students->save();
        return redirect(route('Medical_Statu.show'));
    }

    ///////////////////////////////////////// Student End //////////////////////////////////////////

    ///////////////////////////////////////// medical Start //////////////////////////////////////////

    public function show_medical($id){
      $med = MedicalStatus::where('medical_id', $id)->get();
      return view('Medical.med_sta.med_sta',compact('med'));
    }
    public function messages_medical()
    {
    return $messages_medical = [
        'medical_id.required' => '!!',
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
    public function store_medical(Request $request)
    {

        $messages = $this->messages_medical();
        $this->validate($request,[
            'medical_id'=>'required',
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

         //create new object of the model medical and make mapping to the data
         $medicals =  Medical::find($request->medical_id);
         $medical_name = $medicals->medical_name;
         $x=1;
         $medicals->medical_statu = $x;

         $MedicalStatues = new MedicalStatus;
         $MedicalStatues -> medical_id = $request->medical_id;
         $MedicalStatues -> disease_name = $request->disease_name;
         $MedicalStatues -> disease_type = $request->disease_type;
         $MedicalStatues -> dr_name = $request->dr_name;
         $MedicalStatues -> treat_cost = $request->treat_cost;
         $MedicalStatues -> treat_type = $request->treat_type;
         $MedicalStatues -> treat_Duratio = $request->treat_Duratio;
         $MedicalStatues -> date_accept = $request->date_accept;
         $MedicalStatues -> date_end = $request->date_end;
         $MedicalStatues -> Trans_to_doctor = $request->Trans_to_doctor;
         //write to the data base
         $medicals ->save();
         $MedicalStatues ->save();
         session()->flash('Add_MedicalStatues',  'تم اضافة الحالة الطبية للطالب  '. $medical_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Medical Successfully')
         return redirect(route('medical.show'));

    }

    public function index_medical()
    {
        $med['med'] = MedicalStatus::select('id','medical_id','updated_at','disease_type','disease_name',
       'dr_name','treat_type','treat_cost',
       'treat_Duratio','date_accept','date_end','Trans_to_doctor'
       )
       ->orderBy('id', 'DESC')
       ->get();
       return view('Medical.med_sta.med_sta')->with($med);
    }
    public function messages_update_medical()
    {
    return $messages_update_medical = [
        'medical_id.required' => '!!',
        'id.required' => '!!',
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
    public function update_medical(Request $request, MedicalStatus $medicalStatus)
    {

        $messages = $this->messages_update_medical();
        $this->validate($request,[
            'medical_id'=>'required',
            'id'=>'required',
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

         //create new object of the model medical and make mapping to the data
         $medicals =  Medical::find($request->medical_id);
         $medical_name = $medicals->medical_name;

         $MedicalStatues = MedicalStatus::find($request->id);
         $MedicalStatues -> medical_id = $request->medical_id;
         $MedicalStatues -> disease_name = $request->disease_name;
         $MedicalStatues -> disease_type = $request->disease_type;
         $MedicalStatues -> dr_name = $request->dr_name;
         $MedicalStatues -> treat_cost = $request->treat_cost;
         $MedicalStatues -> treat_type = $request->treat_type;
         $MedicalStatues -> treat_Duratio = $request->treat_Duratio;
         $MedicalStatues -> date_accept = $request->date_accept;
         $MedicalStatues -> date_end = $request->date_end;
         $MedicalStatues -> Trans_to_doctor = $request->Trans_to_doctor;
         //write to the data base
         $MedicalStatues ->save();
         session()->flash('Edit',  'تم تعديل الحالة الطبية للطالب  '. $medical_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Medical Successfully')
         return redirect(route('Medical_Statu.show.medical'));

    }

    public function destroy_medical(Request $request)
    {
        /* here we have sued the table medicals and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $medicals =  Medical::find($request->medical_id);
        $x=0;
        $medicals->medical_statu = $x;
        $medical_name = $medicals->medical_name;

        MedicalStatus::find($request->id)->delete();
        /*after delete the medical by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Medical Successfully')*/
        session()->flash('Delete','تم حذف معلومات الحالة الطبية  '.$request->childre_name.' الخاصة بالطالب  '. $medical_name .' بنجاح ');
        $medicals->save();
        return redirect(route('Medical_Statu.show'));
    }

    ///////////////////////////////////////// medical End //////////////////////////////////////////

}
