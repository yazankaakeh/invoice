<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Student\StudentController;
use App\models\Student\Student;
use App\models\Student\University;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\models\Student\DelayedScholar;


class DelayedScholarController extends Controller
{


    function __construct()
    {
    $this->middleware('permission: قسم  المنح المؤجلة ', ['only' => ['index']]);
    $this->middleware('permission: قسم  المنح المؤجلة ', ['only' => ['show']]);
    $this->middleware('permission: اضافة  المنح المؤجلة ', ['only' => ['store']]);
    $this->middleware('permission: تعديل قسم المنح المؤجلة ', ['only' => ['update']]);
    $this->middleware('permission:حذف قسم المنح المؤجلة', ['only' => ['destroy']]);


    }


    public function show($id)
    {
      $delayed = DelayedScholar::where('student_id', $id)->get();
      return view('Student.delayed_scholar.delayed_scholar',compact('delayed'));
    }

    public function store(Request $request)
    {
        $messages = $this->messages();
        $this->validate($request,[
            'student_id'=>'required',
            'value' => 'required',
            'date' => 'required',
            'note' => 'required',
        ],$messages);
         //create new object of the model student and make mapping to the data
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;
         $x=1;
         $students->old_statu = $x;
         $DelayedScholars = new DelayedScholar;
         $DelayedScholars -> student_id = $request->student_id;
         $DelayedScholars -> value = $request->value;
         $DelayedScholars -> date = $request->date;
         $DelayedScholars -> note = $request->note;
        //write to the data base
         $students->save();
         $DelayedScholars ->save();
         session()->flash('Add_delayed_scholar',  'تم اضافة منحة مؤجلة للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('student.show'));

    }
    public function index()
    {
      $delayed = DelayedScholar::all();
      return view('Student.delayed_scholar.delayed_scholar',compact('delayed'));
    }

    public function messages()
    {
        return $messages = [
            'student_id.required' => '',
            'univer_name.required' => 'لم يتم أدخال معلومات اسم الجامعة المطلوبة  !!',
            'univer_location.required' => 'لم يتم أدخال معلومات تاريخ موقع الجامعة المطلوبة!!',
            'univer_special.required' => 'لم يتم أدخال معلومات أختصاص المطلوبة!!',
            'Number_years.numeric'=>'لم يتم أجخال معلومات عدد السنوات يجب    أن تكون حصراً أرقام !!',
            'Schoo_year.numeric'=>'لم يتم أدخال معلومات السنه الدراسية المطلوبة!!',
            'Current_rate.required'=>'لم يتم ادخال معلومات المعدل الحالي المطلوبة !!',
            'Cumulative_rate.required'=>'لم يتم أدخال معلومات المعدل التراكمي المطلوبة !!',
            'language_name.required'=>' لم يتم أدخال نوع اللغة الدراسية المطلوبة !!',
            'Current_level.required'=>'لم يتم أدخال معدل المستوى الحالي للغة المطلوبة!!',
            'Curr_level_rate.required'=>'لم يتم أدخال معدل المستوى السابق المطلوبة !!',
            'Previ_level_rate.required'=>'لم يتم أدخال معلومات المطلوبة !!',
            'Univer_Accept.required'=>'لم يتم أدخال معلومات طريقة القبول بالجامعة المطلوبة!!',
            'Accept_rate.required'=>'لم يتم أدخال معلومات معدل القبول المطلوبة!!',
            'are_you_univer.required'=>'لم يتم أدخال معلومات هل انت يجامعة أخرى المطلوبة  !!',
            'univer_Premiums.required'=>'لم يتم أدخال معلومات  اقساط جامعية  المطلوية!!',
            'univer_fees.required'=>'لم يتم أدخال معلومات مصاريف جامعية الجامعة!!',
            'univer_fees_value.required'=>'لم يتم أدخال معلومات كم مصاريف الجامعة!!',

        ];
    }
    public function update(Request $request)
    {
            $messages = $this->messages();
            $this->validate($request,[
                'student_id'=>'required',
                'value' => 'required',
                'date' => 'required',
                'note' => 'required',
            ],$messages);

            //create new object of the model student and make mapping to the data
            $students =  Student::find($request->student_id);
            $student_name = $students->student_name;
            $DelayedScholars =  DelayedScholar::find($request->id);
            $DelayedScholars -> student_id = $request->student_id;
            $DelayedScholars -> value = $request->value;
            $DelayedScholars -> date = $request->date;
            $DelayedScholars -> note = $request->note;
            //write to the data base
            $students->save();
            $DelayedScholars ->save();
            session()->flash('Edit',  'تم تعديل معلومات المنح المؤجلة للطالب  '. $student_name .' بنجاح ');
            //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
            return redirect(route('delayed_scholar.show'));
    }

    public function destroy(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $students =  Student::find($request->student_id);
        $x=0;
        $students->old_statu = $x;
        $student_name = $students->student_name;



        DelayedScholar::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف معلومات المنحة المؤجلة الخاصة بالطالب  '. $student_name .' بنجاح ');
        $students->save();
        return redirect(route('delayed_scholar.show'));

    }

      /**
       * Set the value of delayed
       *
       * @return  self
       */
      public function setDelayed($delayed)
      {
            $this->delayed = $delayed;

            return $this;
      }
}