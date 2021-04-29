<?php

namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Student\StudentController;
use App\models\Student\Student;
use Illuminate\Support\Facades\DB;
use App\models\Publics\MedicalStatus;
use Illuminate\Http\Request;
//new route to exrend the controller
use App\Http\Controllers\Controller;



class MedicalStatusController extends Controller
{


    public function show($id){
      $med = MedicalStatus::where('student_id', $id)->get();
      return view('Student.med_sta.med_sta',compact('med')); 
    }
    public function storestudent(Request $request){
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
         ]);

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
   
  
    public function update(Request $request, MedicalStatus $medicalStatus)
    {  $this->validate($request,[
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
         ]);

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
}