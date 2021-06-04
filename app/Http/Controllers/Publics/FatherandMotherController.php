<?php

namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Student\StudentController;
use App\models\Student\Student;
use App\models\Publics\FatherandMother;
use App\models\Medical\Medical;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class FatherandMotherController extends Controller
{


function __construct()
{

    $this->middleware('permission: قسم الأب والأم الطبي ', ['only' => ['show_medical']]);
    $this->middleware('permission: قسم الأب والأم الطبي ', ['only' => ['index_medical']]);
    $this->middleware('permission: إضافة الأب والأم الطبي ', ['only' => ['store_medical']]);
    $this->middleware('permission: تعديل قسم الأب و الأم الطبي ', ['only' => ['medical_edit']]);
    $this->middleware('permission:حذف قسم الأب و الأم الطبي ', ['only' => ['destroy_medical']]);

    $this->middleware('permission: قسم الأب والأم الطلاب ', ['only' => ['index']]);
    $this->middleware('permission: قسم الأب والأم الطلاب ', ['only' => ['show']]);
    $this->middleware('permission: اضافة الأب والأم الطلاب ', ['only' => ['storestudent']]);
    $this->middleware('permission: تعديل قسم الأب و الأم الطلاب ', ['only' => ['update']]);
    $this->middleware('permission:حذف قسم الأب و الأم الطلاب ', ['only' => ['destroy']]);

}


////////////////////////////////////// Student Start /////////////////////////////////
public function messages_family()
{
return $messages_family = [
    'student_id.required' => '!!',
    'mother_name.required' => 'لم يتم ادخال اسم الأم    !!',
    'mother_birth.required' => 'لم يتم ادخال  تاريخ ميلاد الأم  !!',
    'mother_origin.required' => 'لم يتم اسم المحافظة  الأم   !!',
    'mother_origin_city.required'  => 'لم يتم ادخال اسم المدينة الأم    !!',
    'mother_academicel.required'  => 'لم يتم ادخال المستوى التعليمي للأم   !!',
    'mother_special.required'  => 'لم يتم ادخال اختصاص دراسة الأم    !!',
    'mother_is_work.required'  => 'لم يتم ادخال خانه عل تعمل الأم     !!',
    'mother_now_work.required'  => 'لم يتم ادخال  العمل الحالي للأم   !!',
    'mother_salary.required'  => 'لم يتم ادخال الراتب الشهري للأم    !!',
        /////////////////////////////////////////////////////////////////////
    'father_name.required'  => 'لم يتم ادخال اسم الأب    !!',
    'father_birth.required' => 'لم يتم ادخال  تاريخ ميلاد الأب  !!',
    'father_origin.required' => 'لم يتم اسم المحافظة  الأب   !!',
    'father_origin_city.required'  => 'لم يتم ادخال اسم المدينة الأب    !!',
    'father_academicel.required'  => 'لم يتم ادخال المستوى التعليمي الأب   !!',
    'father_special.required'  => 'لم يتم ادخال اختصاص دراسة الأب    !!',
    'father_is_work.required'  => 'لم يتم ادخال خانه عل تعمل الأب     !!',
    'father_now_work.required' => 'لم يتم ادخال  العمل الحالي الأب   !!',
    'father_salary.required' => 'لم يتم ادخال الراتب الشهري الأب    !!',
];
}
    public function storestudent(Request $request)
    {
        $messages = $this->messages_family();
        $this->validate($request,[
            'student_id'=> 'required',
            'mother_name' => 'required',
            'mother_birth' => 'required',
            'mother_origin' => 'required',
            'mother_origin_city' => 'required',
            'mother_academicel' => 'required',
            'mother_special' => 'required',
            'mother_is_work' => 'required',
            'mother_now_work' => 'required',
            'mother_salary' => 'required',
            // ////////////////////////////////////////////////
            'father_name' => 'required',
            'father_birth' => 'required',
            'father_origin' => 'required',
            'father_origin_city' => 'required',
            'father_academicel' => 'required',
            'father_special' => 'required',
            'father_is_work' => 'required',
            'father_now_work' => 'required',
            'father_salary' => 'required'
        ],$messages);
        //create new object of the model student and make mapping to the data
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;
         $x=1;
         $students->father_mother_statu = $x;
         $FatherandMothers = new FatherandMother;
         $FatherandMothers -> student_id = $request->student_id;
         $FatherandMothers -> mother_name = $request->mother_name;
         $FatherandMothers -> mother_birth = $request->mother_birth;
         $FatherandMothers -> mother_origin = $request->mother_origin;
         $FatherandMothers -> mother_origin_city = $request->mother_origin_city;
         $FatherandMothers -> mother_academicel = $request->mother_academicel;
         $FatherandMothers -> mother_special = $request->mother_special;
         $FatherandMothers -> mother_is_work = $request->mother_is_work;
         $FatherandMothers -> mother_now_work = $request->mother_now_work;
         $FatherandMothers -> mother_salary = $request->mother_salary;
         ///////////////////////////////////////////
         $FatherandMothers -> father_name = $request->father_name;
         $FatherandMothers -> father_birth = $request->father_birth;
         $FatherandMothers -> father_origin = $request->father_origin;
         $FatherandMothers -> father_origin_city = $request->father_origin_city;
         $FatherandMothers -> father_academicel = $request->father_academicel;
         $FatherandMothers -> father_special = $request->father_special;
         $FatherandMothers -> father_is_work = $request->father_is_work;
         $FatherandMothers -> father_now_work = $request->father_now_work;
         $FatherandMothers -> father_salary = $request->father_salary;
         //write to the data base
         $students->save();
         $FatherandMothers ->save();
         session()->flash('Add_fatherandmother',  'تم اضافة معلومات الأب و الأم للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('student.show'));

    }

    public function show($id){
      $fath = FatherandMother::where('student_id', $id)->get();
      return view('Student.father_mother.father_mother',compact('fath'));
    }
    public function index()
    {
       $fath['fath'] = FatherandMother::select('id','mother_name','student_id','updated_at','mother_origin','mother_birth',
       'mother_origin_city','mother_academicel','mother_special','mother_is_work',
       'mother_now_work','mother_salary','father_name','father_birth',
       'father_origin','father_origin_city','father_academicel','father_special',
       'father_is_work','father_now_work','father_salary')
       ->orderBy('id', 'DESC')
       ->get();
       return view('Student.father_mother.father_mother')->with($fath);
    }
    public function messages_family_update()
    {
    return $messages_family_update = [
        'id.required' => '!!',
        'student_id.required' => '!!',
        'mother_name.required' => 'لم يتم ادخال اسم الأم    !!',
        'mother_birth.required' => 'لم يتم ادخال  تاريخ ميلاد الأم  !!',
        'mother_origin.required' => 'لم يتم اسم المحافظة  الأم   !!',
        'mother_origin_city.required'  => 'لم يتم ادخال اسم المدينة الأم    !!',
        'mother_academicel.required'  => 'لم يتم ادخال المستوى التعليمي للأم   !!',
        'mother_special.required'  => 'لم يتم ادخال اختصاص دراسة الأم    !!',
        'mother_is_work.required'  => 'لم يتم ادخال خانه عل تعمل الأم     !!',
        'mother_now_work.required'  => 'لم يتم ادخال  العمل الحالي للأم   !!',
        'mother_salary.required'  => 'لم يتم ادخال الراتب الشهري للأم    !!',
            /////////////////////////////////////////////////////////////////////
        'father_name.required'  => 'لم يتم ادخال اسم الأب    !!',
        'father_birth.required' => 'لم يتم ادخال  تاريخ ميلاد الأب  !!',
        'father_origin.required' => 'لم يتم اسم المحافظة  الأب   !!',
        'father_origin_city.required'  => 'لم يتم ادخال اسم المدينة الأب    !!',
        'father_academicel.required'  => 'لم يتم ادخال المستوى التعليمي الأب   !!',
        'father_special.required'  => 'لم يتم ادخال اختصاص دراسة الأب    !!',
        'father_is_work.required'  => 'لم يتم ادخال خانه عل تعمل الأب     !!',
        'father_now_work.required' => 'لم يتم ادخال  العمل الحالي الأب   !!',
        'father_salary.required' => 'لم يتم ادخال الراتب الشهري الأب    !!',
    ];
    }
    public function update(Request $request)
    {
        $messages = $this->messages_family_update();
        $this->validate($request,[
              'id'=> 'required',
            'student_id'=> 'required',
            'mother_name' => 'required',
            'mother_birth' => 'required',
            'mother_origin' => 'required',
            'mother_origin_city' => 'required',
            'mother_academicel' => 'required',
            'mother_special' => 'required',
            'mother_is_work' => 'required',
            'mother_now_work' => 'required',
            'mother_salary' => 'required',
            // ////////////////////////////////////////////////
            'father_name' => 'required',
            'father_birth' => 'required',
            'father_origin' => 'required',
            'father_origin_city' => 'required',
            'father_academicel' => 'required',
            'father_special' => 'required',
            'father_is_work' => 'required',
            'father_now_work' => 'required',
            'father_salary' => 'required'
        ],$messages);
        //create new object of the model student and make mapping to the data
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;
         $FatherandMothers =  FatherandMother::find($request->id);
         $FatherandMothers -> student_id = $request->student_id;
         $FatherandMothers -> mother_name = $request->mother_name;
         $FatherandMothers -> mother_birth = $request->mother_birth;
         $FatherandMothers -> mother_origin = $request->mother_origin;
         $FatherandMothers -> mother_origin_city = $request->mother_origin_city;
         $FatherandMothers -> mother_academicel = $request->mother_academicel;
         $FatherandMothers -> mother_special = $request->mother_special;
         $FatherandMothers -> mother_is_work = $request->mother_is_work;
         $FatherandMothers -> mother_now_work = $request->mother_now_work;
         $FatherandMothers -> mother_salary = $request->mother_salary;
         ///////////////////////////////////////////
         $FatherandMothers -> father_name = $request->father_name;
         $FatherandMothers -> father_birth = $request->father_birth;
         $FatherandMothers -> father_origin = $request->father_origin;
         $FatherandMothers -> father_origin_city = $request->father_origin_city;
         $FatherandMothers -> father_academicel = $request->father_academicel;
         $FatherandMothers -> father_special = $request->father_special;
         $FatherandMothers -> father_is_work = $request->father_is_work;
         $FatherandMothers -> father_now_work = $request->father_now_work;
         $FatherandMothers -> father_salary = $request->father_salary;
         //write to the data base
         $FatherandMothers ->save();
         session()->flash('Edit', 'تم تعديل تفاصيل الأب و الأم للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('FatherandMother.show'));

    }

    public function destroy(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $students =  Student::find($request->student_id);
        $x=0;
        $students->father_mother_statu = $x;
        $student_name = $students->student_name;
        FatherandMother::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف معلومات الأم و الأب الخاصة بالطالب  '. $student_name .' بنجاح ');
        $students->save();
        return redirect(route('FatherandMother.show'));
    }
////////////////////////////////////// Student End /////////////////////////////////


////////////////////////////////////// Medical Start /////////////////////////////////
public function messages_medical()
{
return $messages_medical = [
    'medical_id.required' => '!!',
    'mother_name.required' => 'لم يتم ادخال اسم الأم    !!',
    'mother_birth.required' => 'لم يتم ادخال  تاريخ ميلاد الأم  !!',
    'mother_origin.required' => 'لم يتم اسم المحافظة  الأم   !!',
    'mother_origin_city.required'  => 'لم يتم ادخال اسم المدينة الأم    !!',
    'mother_academicel.required'  => 'لم يتم ادخال المستوى التعليمي للأم   !!',
    'mother_special.required'  => 'لم يتم ادخال اختصاص دراسة الأم    !!',
    'mother_is_work.required'  => 'لم يتم ادخال خانه عل تعمل الأم     !!',
    'mother_now_work.required'  => 'لم يتم ادخال  العمل الحالي للأم   !!',
    'mother_salary.required'  => 'لم يتم ادخال الراتب الشهري للأم    !!',
        /////////////////////////////////////////////////////////////////////
    'father_name.required'  => 'لم يتم ادخال اسم الأب    !!',
    'father_birth.required' => 'لم يتم ادخال  تاريخ ميلاد الأب  !!',
    'father_origin.required' => 'لم يتم اسم المحافظة  الأب   !!',
    'father_origin_city.required'  => 'لم يتم ادخال اسم المدينة الأب    !!',
    'father_academicel.required'  => 'لم يتم ادخال المستوى التعليمي الأب   !!',
    'father_special.required'  => 'لم يتم ادخال اختصاص دراسة الأب    !!',
    'father_is_work.required'  => 'لم يتم ادخال خانه عل تعمل الأب     !!',
    'father_now_work.required' => 'لم يتم ادخال  العمل الحالي الأب   !!',
    'father_salary.required' => 'لم يتم ادخال الراتب الشهري الأب    !!',
];
}
    public function store_medical(Request $request)
    {
        $messages = $this->messages_medical();
        $this->validate($request,[
            'medical_id'=> 'required',
            'mother_name' => 'required',
            'mother_birth' => 'required',
            'mother_origin' => 'required',
            'mother_origin_city' => 'required',
            'mother_academicel' => 'required',
            'mother_special' => 'required',
            'mother_is_work' => 'required',
            'mother_now_work' => 'required',
            'medical_mom' => 'required',
            'mother_salary' => 'required',
            // ////////////////////////////////////////////////
            'father_name' => 'required',
            'father_birth' => 'required',
            'father_origin' => 'required',
            'father_origin_city' => 'required',
            'father_academicel' => 'required',
            'father_special' => 'required',
            'father_is_work' => 'required',
            'medical_dad' => 'required',
            'father_now_work' => 'required',
            'father_salary' => 'required'
        ],$messages);
        //create new object of the model student and make mapping to the data
         $Medicals =  Medical::find($request->medical_id);
         $Medical_name = $Medicals->Medical_name;
         $x=1;
         $Medicals->father_mother_statu = $x;
         $FatherandMothers = new FatherandMother;
         $FatherandMothers -> medical_id = $request->medical_id;
         $FatherandMothers -> mother_name = $request->mother_name;
         $FatherandMothers -> mother_birth = $request->mother_birth;
         $FatherandMothers -> mother_origin = $request->mother_origin;
         $FatherandMothers -> mother_origin_city = $request->mother_origin_city;
         $FatherandMothers -> mother_academicel = $request->mother_academicel;
         $FatherandMothers -> mother_special = $request->mother_special;
         $FatherandMothers -> mother_is_work = $request->mother_is_work;
         $FatherandMothers -> mother_now_work = $request->mother_now_work;
         $FatherandMothers -> medical_mom = $request->medical_mom;
         $FatherandMothers -> mother_salary = $request->mother_salary;
         ///////////////////////////////////////////
         $FatherandMothers -> father_name = $request->father_name;
         $FatherandMothers -> father_birth = $request->father_birth;
         $FatherandMothers -> father_origin = $request->father_origin;
         $FatherandMothers -> father_origin_city = $request->father_origin_city;
         $FatherandMothers -> father_academicel = $request->father_academicel;
         $FatherandMothers -> father_special = $request->father_special;
         $FatherandMothers -> father_is_work = $request->father_is_work;
         $FatherandMothers -> father_now_work = $request->father_now_work;
         $FatherandMothers -> father_salary = $request->father_salary;
         $FatherandMothers -> medical_dad = $request->medical_dad;
         //write to the data base
         $Medicals->save();
         $FatherandMothers ->save();
         session()->flash('Add_fatherandmother',  'تم اضافة معلومات الأب و الأم للطالب  '. $Medical_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Medical Successfully')
         return redirect(route('medical.show'));

    }

    public function show_medical($id){

      $fath = FatherandMother::where('medical_id', $id)->get();

      return view('Medical.father_mother.father_medical',compact('fath'));
    }

    public function index_medical()
    {
       $fath['fath'] = FatherandMother::select('id','mother_name','medical_id','updated_at','mother_origin','mother_birth',
       'mother_origin_city','mother_academicel','mother_special','mother_is_work',
       'mother_now_work','mother_salary','father_name','father_birth',
       'father_origin','father_origin_city','father_academicel','father_special',
       'father_is_work','father_now_work','father_salary','medical_dad','medical_mom')
       ->orderBy('id', 'DESC')
       ->get();
       return view('Medical.father_mother.father_medical')->with($fath);
    }
    public function messages_medical_update()
    {
    return $messages_medical_update = [
        'id.required' => '!!',
        'medical_id.required' => '!!',
        'mother_name.required' => 'لم يتم ادخال اسم الأم    !!',
        'mother_birth.required' => 'لم يتم ادخال  تاريخ ميلاد الأم  !!',
        'mother_origin.required' => 'لم يتم اسم المحافظة  الأم   !!',
        'mother_origin_city.required'  => 'لم يتم ادخال اسم المدينة الأم    !!',
        'mother_academicel.required'  => 'لم يتم ادخال المستوى التعليمي للأم   !!',
        'mother_special.required'  => 'لم يتم ادخال اختصاص دراسة الأم    !!',
        'mother_is_work.required'  => 'لم يتم ادخال خانه عل تعمل الأم     !!',
        'mother_now_work.required'  => 'لم يتم ادخال  العمل الحالي للأم   !!',
        'mother_salary.required'  => 'لم يتم ادخال الراتب الشهري للأم    !!',
            /////////////////////////////////////////////////////////////////////
        'father_name.required'  => 'لم يتم ادخال اسم الأب    !!',
        'father_birth.required' => 'لم يتم ادخال  تاريخ ميلاد الأب  !!',
        'father_origin.required' => 'لم يتم اسم المحافظة  الأب   !!',
        'father_origin_city.required'  => 'لم يتم ادخال اسم المدينة الأب    !!',
        'father_academicel.required'  => 'لم يتم ادخال المستوى التعليمي الأب   !!',
        'father_special.required'  => 'لم يتم ادخال اختصاص دراسة الأب    !!',
        'father_is_work.required'  => 'لم يتم ادخال خانه عل تعمل الأب     !!',
        'father_now_work.required' => 'لم يتم ادخال  العمل الحالي الأب   !!',
        'father_salary.required' => 'لم يتم ادخال الراتب الشهري الأب    !!',
    ];
    }
    public function medical_edit(Request $request)
    {
        $messages = $this->messages_medical_update();
        $this->validate($request,[
            'id'=> 'required',
            'medical_id'=> 'required',
            'mother_name' => 'required',
            'mother_birth' => 'required',
            'mother_origin' => 'required',
            'mother_origin_city' => 'required',
            'mother_academicel' => 'required',
            'mother_special' => 'required',
            'mother_is_work' => 'required',
            'mother_now_work' => 'required',
            'mother_salary' => 'required',
            // ////////////////////////////////////////////////
            'father_name' => 'required',
            'father_birth' => 'required',
            'father_origin' => 'required',
            'father_origin_city' => 'required',
            'father_academicel' => 'required',
            'father_special' => 'required',
            'father_is_work' => 'required',
            'father_now_work' => 'required',
            'father_salary' => 'required'
        ],$messages);
        //create new object of the model Medical and make mapping to the data
         $Medicals =  Medical::find($request->medical_id);
         $Medical_name = $Medicals->Medical_name;
         $FatherandMothers =  FatherandMother::find($request->id);
         $FatherandMothers -> medical_id = $request->medical_id;
         $FatherandMothers -> mother_name = $request->mother_name;
         $FatherandMothers -> mother_birth = $request->mother_birth;
         $FatherandMothers -> mother_origin = $request->mother_origin;
         $FatherandMothers -> mother_origin_city = $request->mother_origin_city;
         $FatherandMothers -> mother_academicel = $request->mother_academicel;
         $FatherandMothers -> mother_special = $request->mother_special;
         $FatherandMothers -> mother_is_work = $request->mother_is_work;
         $FatherandMothers -> mother_now_work = $request->mother_now_work;
         $FatherandMothers -> mother_salary = $request->mother_salary;
         ///////////////////////////////////////////
         $FatherandMothers -> father_name = $request->father_name;
         $FatherandMothers -> father_birth = $request->father_birth;
         $FatherandMothers -> father_origin = $request->father_origin;
         $FatherandMothers -> father_origin_city = $request->father_origin_city;
         $FatherandMothers -> father_academicel = $request->father_academicel;
         $FatherandMothers -> father_special = $request->father_special;
         $FatherandMothers -> father_is_work = $request->father_is_work;
         $FatherandMothers -> father_now_work = $request->father_now_work;
         $FatherandMothers -> father_salary = $request->father_salary;
         //write to the data base
         $FatherandMothers ->save();
         session()->flash('Edit', 'تم تعديل تفاصيل الأب و الأم للمريض  '. $Medical_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Medical Successfully')
         return redirect(route('FatherandMother.show.medical'));

    }

    public function destroy_medical(Request $request)
    {
        /* here we have sued the table Medicals and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $Medicals =  Medical::find($request->medical_id);
        $x=0;
        $Medicals->father_mother_statu = $x;
        $Medical_name = $Medicals->Medical_name;
        FatherandMother::find($request->id)->delete();
        /*after delete the Medical by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Medical Successfully')*/
        session()->flash('Delete','تم حذف معلومات الأم و الأب الخاصة بالطالب  '. $Medical_name .' بنجاح ');
        $Medicals->save();
        return redirect(route('FatherandMother.show'));
    }

    ////////////////////////////////////// Medical End /////////////////////////////////


}
