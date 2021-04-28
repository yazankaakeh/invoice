<?php

namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Student\StudentController;
use App\models\Student\Student;
use App\models\Publics\MedicalStatus;
use Illuminate\Http\Request;
//new route to exrend the controller
use App\Http\Controllers\Controller;



class MedicalStatusController extends Controller
{

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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MedicalStatus  $medicalStatus
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalStatus $medicalStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MedicalStatus  $medicalStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicalStatus $medicalStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MedicalStatus  $medicalStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedicalStatus $medicalStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MedicalStatus  $medicalStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalStatus $medicalStatus)
    {
        //
    }
}
