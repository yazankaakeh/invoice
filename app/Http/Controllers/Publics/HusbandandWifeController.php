<?php

namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Student\StudentController;
use App\models\Student\Student;
use App\models\Publics\HusbandandWife;
use Illuminate\Http\Request;
use App\models\Medical\Medical;
use App\models\Family\Family;
use App\Http\Controllers\Controller;


class HusbandandWifeController extends Controller
{


function __construct()
{

    $this->middleware('permission: قسم الزوج والزوجة الطلاب ', ['only' => ['index']]);
    $this->middleware('permission: قسم الزوج والزوجة الطلاب ', ['only' => ['show']]);
    $this->middleware('permission: اضافة الزوج والزوجة الطلاب ', ['only' => ['store_student_husband_wife']]);
    $this->middleware('permission: تعديل قسم الزوج والزوجة الطلاب ', ['only' => ['update']]);
    $this->middleware('permission:حذف قسم الزوج والزوجة الطلاب ', ['only' => ['destroy']]);

    $this->middleware('permission: قسم الزوج والزوجة العائلات ', ['only' => ['index_family']]);
    $this->middleware('permission: قسم الزوج والزوجة العائلات ', ['only' => ['show_family']]);
    $this->middleware('permission: إضافة الزوج والزوجة العائلات ', ['only' => ['store_family_husband_wife']]);
    $this->middleware('permission: تعديل قسم الزوج والزوجة العائلات ', ['only' => ['update_family']]);
    $this->middleware('permission:حذف قسم  الزوج والزوجة العائلات ', ['only' => ['destroy_family']]);

}



/////////////////////////////////////////// Student Start /////////////////////////////////////////////
public function messages_student_husband_wife()
{
return $messages_student_husband_wife = [
    'student_id.required' => '!!',
    'gender.required' => 'لم يتم ادخال  الجنس   !!',
    'wife_name.required' => 'لم يتم ادخال اسم اسم الزوج/ة  !!',
    'wife_birth.required' => 'لم يتم  تاريخ ميلاد الزوج/ة   !!',
    'wife_city.required'  => 'لم يتم ادخال اسم المحافظة    !!',
    'wife_district.required'  => 'لم يتم ادخال اسم مدينة   !!',
    'wife_academicel.required'  => 'لم يتم ادخال المستوى التعليمي    !!',
    'wife_special.required'  => 'لم يتم ادخال اختصاص دراسة    !!',
    'wife_is_work.required'  => 'لم يتم ادخال خانة هل تعمل   !!',
    'wife_now_work.required'  => 'لم يتم ادخال العمل الحالي   !!',
    'wife_Pre_work.required'  => 'لم يتم ادخال العمل السابق    !!',


];
}
    public  function store_student_husband_wife(Request $request)
    {
        $messages = $this->messages_student_husband_wife();
        $this->validate($request,[
            'student_id'=>'required',
            'gender'=>'required',
            'wife_name' => 'required',
            'wife_birth' => 'required',
            'wife_city' => 'required',
            'wife_district' => 'required',
            'wife_academicel' => 'required',
            'wife_special' => 'required',
            'wife_is_work' => 'required',
            'wife_now_work' => 'required',
            'wife_Pre_work' => 'required',
        ],$messages);
        //create new object of the model student and make mapping to the data
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;
         $x=1;
         $students->husband_wife_statu = $x;
         $husbandandWife = new HusbandandWife;
         $husbandandWife -> student_id = $request->student_id;
         $husbandandWife -> gender = $request->gender;
         $husbandandWife -> wife_name = $request->wife_name;
         $husbandandWife -> wife_birth = $request->wife_birth;
         $husbandandWife -> wife_city = $request->wife_city;
         $husbandandWife -> wife_district = $request->wife_district;
         $husbandandWife -> wife_academicel = $request->wife_academicel;
         $husbandandWife -> wife_special = $request->wife_special;
         $husbandandWife -> wife_is_work = $request->wife_is_work;
         $husbandandWife -> wife_now_work = $request->wife_now_work;
         $husbandandWife -> wife_Pre_work = $request->wife_Pre_work;
         //write to the data base
         $students->save();
         $husbandandWife ->save();
         session()->flash('Add_husbandandWife',  'تم اضافة معلومات الزوج أو الزوجة للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('student.show'));

    }

    public function index()
    {
       $husb['husb'] = HusbandandWife::select('id','wife_name','gender','student_id','updated_at','wife_birth','wife_city',
       'wife_district','wife_mar_stat','wife_academicel','wife_special',
       'wife_is_work','wife_now_work','wife_Pre_work')
       ->orderBy('id', 'DESC')
       ->get();
       return view('Student.husb.husb')->with($husb);
    }

    public function show( $id)
    {
      $husb = HusbandandWife::where('student_id', $id)->get();
      return view('Student.husb.husb',compact('husb'));
    }
    public function messages_student_husband_wife_update()
    {
    return $messages_student_husband_wife_update = [
        'student_id.required' => '!!',
        'gender.required' => 'لم يتم ادخال  الجنس   !!',
        'wife_name.required' => 'لم يتم ادخال اسم اسم الزوج/ة  !!',
        'wife_birth.required' => 'لم يتم  تاريخ ميلاد الزوج/ة   !!',
        'wife_city.required'  => 'لم يتم ادخال اسم المحافظة    !!',
        'wife_district.required'  => 'لم يتم ادخال اسم مدينة   !!',
        'wife_academicel.required'  => 'لم يتم ادخال المستوى التعليمي    !!',
        'wife_special.required'  => 'لم يتم ادخال اختصاص دراسة    !!',
        'wife_is_work.required'  => 'لم يتم ادخال خانة هل تعمل   !!',
        'wife_now_work.required'  => 'لم يتم ادخال العمل الحالي   !!',
        'wife_Pre_work.required'  => 'لم يتم ادخال العمل السابق    !!',


    ];
    }
    public function update(Request $request)
    {
        $messages = $this->messages_student_husband_wife_update();
        $this->validate($request,[
            'student_id'=>'required',
            'gender' => 'required',
            'wife_name' => 'required',
            'wife_birth' => 'required',
            'wife_city' => 'required',
            'wife_district' => 'required',
            'wife_academicel' => 'required',
            'wife_special' => 'required',
            'wife_is_work' => 'required',
            'wife_now_work' => 'required',
            'wife_Pre_work' => 'required',
        ],$messages);
        //create new object of the model student and make mapping to the data
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;

         $husbandandWife =  HusbandandWife::find($request->id);
       //  $husbandandWife -> student_id = $request->student_id;
         $husbandandWife -> gender = $request->gender;
         $husbandandWife -> wife_name = $request->wife_name;
         $husbandandWife -> wife_birth = $request->wife_birth;
         $husbandandWife -> wife_city = $request->wife_city;
         $husbandandWife -> wife_district = $request->wife_district;
         $husbandandWife -> wife_academicel = $request->wife_academicel;
         $husbandandWife -> wife_special = $request->wife_special;
         $husbandandWife -> wife_is_work = $request->wife_is_work;
         $husbandandWife -> wife_now_work = $request->wife_now_work;
         $husbandandWife -> wife_Pre_work = $request->wife_Pre_work;
         //write to the data base
         $husbandandWife ->save();
         session()->flash('Edit',  'تم تعديل معلومات الزوج و الزوجة للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('husband_Wife.show'));
    }

    public function destroy(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $students =  Student::find($request->student_id);
        $x=0;
        $students->husband_wife_statu = $x;
        $student_name = $students->student_name;

        HusbandandWife::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف معلومات الزوج و الزوجة الخاصة بالطالب  '. $student_name .' بنجاح ');
        $students->save();
        return redirect(route('FatherandMother.show'));
    }

/////////////////////////////////////////// Student End /////////////////////////////////////////////

/////////////////////////////////////////// Family   Start///////////////////////////////////////////
public function messages_family_husband_wife()
{
return $messages_family_husband_wife = [
    'family_id.required' => '!!',
    'gender.required' => 'لم يتم ادخال  الجنس الزوجة  !!',
    'wife_name.required' => 'لم يتم ادخال اسم اسم الزوجة  !!',
    'wife_birth.required' => 'لم يتم  تاريخ ميلاد الزوجة   !!',
    'wife_city.required'  => 'لم يتم ادخال اسم المحافظة الزوجة   !!',
    'wife_district.required'  => 'لم يتم ادخال اسم مدينةالزوجة   !!',
    'wife_academicel.required'  => 'لم يتم ادخال المستوى التعليمي الزوجة   !!',
    'wife_special.required'  => 'لم يتم ادخال اختصاص دراسة الزوجة   !!',
    'wife_is_work.required'  => 'لم يتم ادخال خانة هل تعمل الزوجة  !!',
    'wife_now_work.required'  => 'لم يتم ادخال العمل الحالي الزوجة  !!',
    'wife_Pre_work.required'  => 'لم يتم ادخال العمل السابق الزوجة   !!',
      ///////////////////////////////////////////////////////////
      'gender.required' => 'لم يتم ادخال الجنس الزوج  !!',
      'husb_name.required' => 'لم يتم ادخال اسم اسم الزوج  !!',
      'husb_birth.required' => 'لم يتم  تاريخ ميلاد الزوج   !!',
      'husb_city.required'  => 'لم يتم ادخال اسم المحافظةالزوج    !!',
      'husb_district.required'  => 'لم يتم ادخال اسم مدينة الزوج  !!',
      'husb_academicel.required'  => 'لم يتم ادخال المستوى التعليمي الزوج   !!',
      'husb_special.required'  => 'لم يتم ادخال اختصاص دراسة الزوج   !!',
      'husb_is_work.required'  => 'لم يتم ادخال خانة هل تعمل  الزوج !!',
      'husb_now_work.required'  => 'لم يتم ادخال العمل الحالي الزوج  !!',
      'husb_Pre_work.required'  => 'لم يتم ادخال العمل السابق الزوج   !!',
];
}
    public  function store_family_husband_wife(Request $request)
    {
        $messages = $this->messages_family_husband_wife();
        $this->validate($request,[
            'family_id'=>'required',
            'wife_name' => 'required',
            'wife_birth' => 'required',
            'wife_city' => 'required',
            'wife_district' => 'required',
            'wife_academicel' => 'required',
            'wife_special' => 'required',
            'wife_is_work' => 'required',
            'husb_mar_stat' => 'required',
            'wife_now_work' => 'required',
            'wife_Pre_work' => 'required',
            'medical_mom' => 'required',
            // ////////////////////////////////////////////////
            'husb_name' => 'required',
            'husb_birth' => 'required',
            'husb_Orig_city' => 'required',
            'husb_district' => 'required',
            'husb_academicel' => 'required',
            'husb_special' => 'required',
            'husb_is_work' => 'required',
            'wife_mar_stat' => 'required',
            'husb_now_work' => 'required',
            'medical_dad' => 'required',
            'husb_Pre_work' => 'required'
        ],$messages);
        //create new object of the model student and make mapping to the data
         $familys =  Family::find($request->family_id);
         $family_Constraint = $familys->family_Constraint;
         $x=1;
         $familys->husband_wife_statu = $x;
         $husbandandWife = new HusbandandWife;
         $husbandandWife -> family_id = $request->family_id;
         $husbandandWife -> wife_name = $request->wife_name;
         $husbandandWife -> wife_birth = $request->wife_birth;
         $husbandandWife -> wife_city = $request->wife_city;
         $husbandandWife -> wife_district = $request->wife_district;
         $husbandandWife -> wife_academicel = $request->wife_academicel;
         $husbandandWife -> wife_special = $request->wife_special;
         $husbandandWife -> wife_is_work = $request->wife_is_work;
         $husbandandWife -> medical_mom = $request->medical_mom;
         $husbandandWife -> wife_mar_stat = $request->wife_mar_stat;
         $husbandandWife -> wife_now_work = $request->wife_now_work;
         $husbandandWife -> wife_Pre_work = $request->wife_Pre_work;
         ///////////////////////////////////////////
         $husbandandWife -> husb_name = $request->husb_name;
         $husbandandWife -> husb_birth = $request->husb_birth;
         $husbandandWife -> husb_Orig_city = $request->husb_Orig_city;
         $husbandandWife -> husb_district = $request->husb_district;
         $husbandandWife -> husb_academicel = $request->husb_academicel;
         $husbandandWife -> husb_special = $request->husb_special;
         $husbandandWife -> husb_is_work = $request->husb_is_work;
         $husbandandWife -> husb_now_work = $request->husb_now_work;
         $husbandandWife -> husb_mar_stat = $request->husb_mar_stat;
         $husbandandWife -> medical_dad = $request->medical_dad;
         $husbandandWife -> husb_Pre_work = $request->husb_Pre_work;
         //write to the data base
         $familys->save();
         $husbandandWife ->save();
         session()->flash('Add_husbandandWife',  'تم اضافة معلومات الزوج و الزوجة للعائلة  '. $family_Constraint .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('family.show'));
    }

    public function show_family( $id)
    {
      $husb = HusbandandWife::where('family_id', $id)->get();
      return view('family.husb.husb_family',compact('husb'));
    }
    public function messages_family_husband_wife_update()
    {
    return $messages_family_husband_wife_update = [
        'family_id.required' => '!!',
        'gender.required' => 'لم يتم ادخال  الجنس الزوجة  !!',
        'wife_name.required' => 'لم يتم ادخال اسم اسم الزوجة  !!',
        'wife_birth.required' => 'لم يتم  تاريخ ميلاد الزوجة   !!',
        'wife_city.required'  => 'لم يتم ادخال اسم المحافظة الزوجة   !!',
        'wife_district.required'  => 'لم يتم ادخال اسم مدينةالزوجة   !!',
        'wife_academicel.required'  => 'لم يتم ادخال المستوى التعليمي الزوجة   !!',
        'wife_special.required'  => 'لم يتم ادخال اختصاص دراسة الزوجة   !!',
        'wife_is_work.required'  => 'لم يتم ادخال خانة هل تعمل الزوجة  !!',
        'wife_now_work.required'  => 'لم يتم ادخال العمل الحالي الزوجة  !!',
        'wife_Pre_work.required'  => 'لم يتم ادخال العمل السابق الزوجة   !!',
          ///////////////////////////////////////////////////////////
          'gender.required' => 'لم يتم ادخال الجنس الزوج  !!',
          'husb_name.required' => 'لم يتم ادخال اسم اسم الزوج  !!',
          'husb_birth.required' => 'لم يتم  تاريخ ميلاد الزوج   !!',
          'husb_city.required'  => 'لم يتم ادخال اسم المحافظةالزوج    !!',
          'husb_district.required'  => 'لم يتم ادخال اسم مدينة الزوج  !!',
          'husb_academicel.required'  => 'لم يتم ادخال المستوى التعليمي الزوج   !!',
          'husb_special.required'  => 'لم يتم ادخال اختصاص دراسة الزوج   !!',
          'husb_is_work.required'  => 'لم يتم ادخال خانة هل تعمل  الزوج !!',
          'husb_now_work.required'  => 'لم يتم ادخال العمل الحالي الزوج  !!',
          'husb_Pre_work.required'  => 'لم يتم ادخال العمل السابق الزوج   !!',
    ];
    }
    public function update_family(Request $request)
    {
        $messages = $this->messages_family_husband_wife_update();
        $this->validate($request,[
            'family_id'=>'required',
            'wife_name' => 'required',
            'wife_birth' => 'required',
            'wife_city' => 'required',
            'wife_district' => 'required',
            'wife_academicel' => 'required',
            'wife_special' => 'required',
            'wife_is_work' => 'required',
            'wife_now_work' => 'required',
            'medical_mom' => 'required',
            'husb_mar_stat' => 'required',
            'wife_Pre_work' => 'required',
            // ////////////////////////////////////////////////
            'husb_name' => 'required',
            'husb_birth' => 'required',
            'husb_Orig_city' => 'required',
            'husb_district' => 'required',
            'husb_academicel' => 'required',
            'husb_special' => 'required',
            'husb_is_work' => 'required',
            'husb_now_work' => 'required',
            'medical_dad' => 'required',
            'wife_mar_stat' => 'required',
            'husb_Pre_work' => 'required'
        ],$messages);
        //create new object of the model student and make mapping to the data
         $familys =  Family::find($request->family_id);
         $family_Constraint = $familys->family_Constraint;

         $husbandandWife =  HusbandandWife::find($request->id);
       //  $husbandandWife -> student_id = $request->student_id;
         $husbandandWife -> wife_name = $request->wife_name;
         $husbandandWife -> wife_birth = $request->wife_birth;
         $husbandandWife -> wife_city = $request->wife_city;
         $husbandandWife -> wife_district = $request->wife_district;
         $husbandandWife -> medical_mom = $request->medical_mom;
         $husbandandWife -> wife_academicel = $request->wife_academicel;
         $husbandandWife -> wife_special = $request->wife_special;
         $husbandandWife -> wife_is_work = $request->wife_is_work;
         $husbandandWife -> wife_now_work = $request->wife_now_work;
         $husbandandWife -> wife_mar_stat = $request->wife_mar_stat;
         $husbandandWife -> wife_Pre_work = $request->wife_Pre_work;
         ///////////////////////////////////////////
         $husbandandWife -> husb_name = $request->husb_name;
         $husbandandWife -> husb_birth = $request->husb_birth;
         $husbandandWife -> husb_Orig_city = $request->husb_Orig_city;
         $husbandandWife -> husb_district = $request->husb_district;
         $husbandandWife -> medical_dad = $request->medical_dad;
         $husbandandWife -> husb_academicel = $request->husb_academicel;
         $husbandandWife -> husb_special = $request->husb_special;
         $husbandandWife -> husb_is_work = $request->husb_is_work;
         $husbandandWife -> husb_now_work = $request->husb_now_work;
         $husbandandWife -> husb_mar_stat = $request->husb_mar_stat;
         $husbandandWife -> husb_Pre_work = $request->husb_Pre_work;
         //write to the data base
         $husbandandWife ->save();
         session()->flash('Edit',  'تم تعديل معلومات الزوج و الزوجة للعائلة  '. $family_Constraint .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('husband_Wife.show.family'));
    }

    public function index_family()
    {
       $husb['husb'] = HusbandandWife::select('id','wife_name','family_id','updated_at','wife_birth','wife_city',
       'wife_district','wife_mar_stat','wife_academicel','wife_special',
       'wife_is_work','wife_now_work','wife_Pre_work','husb_mar_stat',
       'husb_birth','husb_Orig_city','husb_district','husb_name',
       'husb_academicel','husb_special','husb_is_work','husb_now_work','husb_Pre_work','medical_dad','medical_mom')
       ->orderBy('id', 'DESC')
       ->get();
       //dd($husb);
       return view('family.husb.husb_family')->with($husb);
    }

    public function destroy_family(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $familys =  Family::find($request->family_id);
        $x=0;
        $familys->husband_wife_statu = $x;
        $family_Constraint = $familys->family_Constraint;

        HusbandandWife::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف معلومات الزوج و الزوجة الخاصة بالعائلة  '. $family_Constraint .' بنجاح ');
        $familys->save();
        return redirect(route('husband_Wife.show.family'));
    }
/////////////////////////////////////////// Family   End///////////////////////////////////////////

/////////////////////////////////////////// Medical   Start///////////////////////////////////////////
public function messages_medical_husband_wife()
{
return $messages_medical_husband_wife = [
    'medical_id.required' => '!!',
    'gender.required' => 'لم يتم ادخال  الجنس   !!',
    'wife_name.required' => 'لم يتم ادخال اسم اسم الزوج/ة  !!',
    'wife_birth.required' => 'لم يتم  تاريخ ميلاد الزوج/ة   !!',
    'wife_city.required'  => 'لم يتم ادخال اسم المحافظة    !!',
    'wife_district.required'  => 'لم يتم ادخال اسم مدينة   !!',
    'wife_academicel.required'  => 'لم يتم ادخال المستوى التعليمي    !!',
    'wife_special.required'  => 'لم يتم ادخال اختصاص دراسة    !!',
    'wife_is_work.required'  => 'لم يتم ادخال خانة هل تعمل   !!',
    'wife_now_work.required'  => 'لم يتم ادخال العمل الحالي   !!',
    'wife_Pre_work.required'  => 'لم يتم ادخال العمل السابق    !!',


];
}
    public  function store_medical_husband_wife(Request $request)
    {
        $messages = $this->messages_medical_husband_wife();
        $this->validate($request,[
            'medical_id'=>'required',
            'wife_name' => 'required',
            'wife_birth' => 'required',
            'wife_city' => 'required',
            'wife_district' => 'required',
            'wife_academicel' => 'required',
            'wife_special' => 'required',
            'wife_is_work' => 'required',
            'gender'=>'required',
      //      'husb_mar_stat' => 'required',
            'wife_now_work' => 'required',
            'wife_Pre_work' => 'required',
        ],$messages);
        //create new object of the model student and make mapping to the data
         $medicals =  Medical::find($request->medical_id);
         $medical_name = $medicals->medical_name;
         $x=1;
         $medicals->husband_wife_statu = $x;
         $husbandandWife = new HusbandandWife;
         $husbandandWife -> medical_id = $request->medical_id;
         $husbandandWife -> wife_name = $request->wife_name;
         $husbandandWife -> wife_birth = $request->wife_birth;
         $husbandandWife -> wife_city = $request->wife_city;
         $husbandandWife -> gender = $request->gender;
         $husbandandWife -> wife_district = $request->wife_district;
         $husbandandWife -> wife_academicel = $request->wife_academicel;
         $husbandandWife -> wife_special = $request->wife_special;
         $husbandandWife -> wife_is_work = $request->wife_is_work;
         $husbandandWife -> wife_mar_stat = $request->wife_mar_stat;
         $husbandandWife -> wife_now_work = $request->wife_now_work;
         $husbandandWife -> wife_Pre_work = $request->wife_Pre_work;
         //write to the data base
         $medicals->save();
         $husbandandWife ->save();
         session()->flash('Add_husbandandWife',  'تم اضافة معلومات الزوج و الزوجة للعائلة  '. $medical_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('medical.show'));
    }

    public function show_medical( $id)
    {
      $husb = HusbandandWife::where('medical_id', $id)->get();
      return view('medical.husb.husb_medical',compact('husb'));
    }
    public function messages_medical_husband_wife_update()
    {
    return $messages_medical_husband_wife_update = [
        'medical_id.required' => '!!',
        'gender.required' => 'لم يتم ادخال  الجنس   !!',
        'wife_name.required' => 'لم يتم ادخال اسم اسم الزوج/ة  !!',
        'wife_birth.required' => 'لم يتم  تاريخ ميلاد الزوج/ة   !!',
        'wife_city.required'  => 'لم يتم ادخال اسم المحافظة    !!',
        'wife_district.required'  => 'لم يتم ادخال اسم مدينة   !!',
        'wife_academicel.required'  => 'لم يتم ادخال المستوى التعليمي    !!',
        'wife_special.required'  => 'لم يتم ادخال اختصاص دراسة    !!',
        'wife_is_work.required'  => 'لم يتم ادخال خانة هل تعمل   !!',
        'wife_now_work.required'  => 'لم يتم ادخال العمل الحالي   !!',
        'wife_Pre_work.required'  => 'لم يتم ادخال العمل السابق    !!',


    ];
    }
    public function update_medical(Request $request)
    {
        $messages = $this->messages_medical_husband_wife_update();
        $this->validate($request,[
            'medical_id'=>'required',
            'wife_name' => 'required',
            'wife_birth' => 'required',
            'wife_city' => 'required',
            'wife_district' => 'required',
            'wife_academicel' => 'required',
            'wife_special' => 'required',
            'wife_is_work' => 'required',
            'wife_now_work' => 'required',
            'gender'=>'required',

         //   'husb_mar_stat' => 'required',
            'wife_Pre_work' => 'required',
            // ////////////////////////////////////////////////

        ],$messages);
        //create new object of the model student and make mapping to the data
         $medicals =  Medical::find($request->medical_id);
         $medical_name = $medicals->medical_name;

         $husbandandWife =  HusbandandWife::find($request->id);
       //  $husbandandWife -> student_id = $request->student_id;
         $husbandandWife -> wife_name = $request->wife_name;
         $husbandandWife -> gender = $request->gender;
         $husbandandWife -> wife_birth = $request->wife_birth;
         $husbandandWife -> wife_city = $request->wife_city;
         $husbandandWife -> wife_district = $request->wife_district;
         $husbandandWife -> wife_academicel = $request->wife_academicel;
         $husbandandWife -> wife_special = $request->wife_special;
         $husbandandWife -> wife_is_work = $request->wife_is_work;
         $husbandandWife -> wife_now_work = $request->wife_now_work;
         $husbandandWife -> wife_mar_stat = $request->wife_mar_stat;
         $husbandandWife -> wife_Pre_work = $request->wife_Pre_work;
         ///////////////////////////////////////////
         //write to the data base
         $husbandandWife ->save();
         session()->flash('Edit',  'تم تعديل معلومات الزوج و الزوجة للعائلة  '. $medical_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('husband_Wife.show.medical'));
    }

    public function index_medical()
    {
       $husb['husb'] = HusbandandWife::select('id','wife_name','medical_id','updated_at','wife_birth','wife_city',
       'wife_district','wife_mar_stat','wife_academicel','wife_special',
       'wife_is_work','wife_now_work','wife_Pre_work','gender')
       ->orderBy('id', 'DESC')
       ->get();
       //dd($husb);
       return view('medical.husb.husb_medical')->with($husb);
    }

    public function destroy_medical(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $medicals =  Medical::find($request->medical_id);
        $x=0;
        $medicals->husband_wife_statu = $x;
        $medical_name = $medicals->medical_name;

        HusbandandWife::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف معلومات الزوج و الزوجة الخاصة بالعائلة  '. $medical_name .' بنجاح ');
        $medicals->save();
        return redirect(route('husband_Wife.show.medical'));
    }
/////////////////////////////////////////// Family   End///////////////////////////////////////////


}
