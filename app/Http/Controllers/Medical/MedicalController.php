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
        $this->validate($request,[
            'medical_name' => 'required',
            'medical_age' => 'required',
            'gender' => 'required',
            'medical_have_id' => 'required',
            'medical_id_extr' => 'required',
            'medical_number' => 'required',
            'note' => 'required'
         ]);
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
         session()->flash('Add', 'تم اضافة المريض '.$request->medical_name.' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('medical.show'));
    }

    public function update(Request $request)
    {
    $this->validate($request,[
            'medical_name' => 'required',
            'medical_age' => 'required',
            'gender' => 'required',
            'medical_have_id' => 'required',
            'medical_id_extr' => 'required',
            'medical_number' => 'required',
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

    public function destroy(Medical $medical)
    {
        //
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
