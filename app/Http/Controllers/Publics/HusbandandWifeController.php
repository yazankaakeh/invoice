<?php

namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Student\StudentController;
use App\models\Student\Student;
use App\models\Publics\HusbandandWife;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HusbandandWifeController extends Controller
{

    public  function store_student_husband_wife(Request $request)
    {
           $this->validate($request,[
            'student_id'=>'required',
            'wife_name' => 'required',
            'wife_birth' => 'required',
            'wife_city' => 'required',
            'wife_district' => 'required',
            'wife_academicel' => 'required',
            'wife_special' => 'required',
            'wife_is_work' => 'required',
            'wife_now_work' => 'required',
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
            'husb_Pre_work' => 'required'
         ]);
         //create new object of the model student and make mapping to the data
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;
         $x=1;
         $students->husband_wife_statu = $x;
         $husbandandWife = new HusbandandWife;
         $husbandandWife -> student_id = $request->student_id;
         $husbandandWife -> wife_name = $request->wife_name;
         $husbandandWife -> wife_birth = $request->wife_birth;
         $husbandandWife -> wife_city = $request->wife_city;
         $husbandandWife -> wife_district = $request->wife_district;
         $husbandandWife -> wife_academicel = $request->wife_academicel;
         $husbandandWife -> wife_special = $request->wife_special;
         $husbandandWife -> wife_is_work = $request->wife_is_work;
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
         $husbandandWife -> husb_Pre_work = $request->husb_Pre_work;
         //write to the data base
         $students->save();
         $husbandandWife ->save();
         session()->flash('Add_husbandandWife',  'تم اضافة معلومات الزوج و الزوجة للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('student.show'));

    }

    public function index()
    {
       $husb['husb'] = HusbandandWife::select('id','wife_name','student_id','updated_at','wife_birth','wife_city',
       'wife_district','wife_mar_stat','wife_academicel','wife_special',
       'wife_is_work','wife_now_work','wife_Pre_work','husb_mar_stat',
       'husb_birth','husb_Orig_city','husb_district','husb_name',
       'husb_academicel','husb_special','husb_is_work','husb_now_work','husb_Pre_work')
       ->orderBy('id', 'DESC')
       ->get();
       return view('husb.husb')->with($husb);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(HusbandandWife $husbandandWife)
    {
        //
    }

    public function edit(HusbandandWife $husbandandWife)
    {
        //
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'student_id'=>'required',
            'wife_name' => 'required',
            'wife_birth' => 'required',
            'wife_city' => 'required',
            'wife_district' => 'required',
            'wife_academicel' => 'required',
            'wife_special' => 'required',
            'wife_is_work' => 'required',
            'wife_now_work' => 'required',
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
            'husb_Pre_work' => 'required'
         ]);
         //create new object of the model student and make mapping to the data
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;

         $husbandandWife =  HusbandandWife::find($request->id);
       //  $husbandandWife -> student_id = $request->student_id;
         $husbandandWife -> wife_name = $request->wife_name;
         $husbandandWife -> wife_birth = $request->wife_birth;
         $husbandandWife -> wife_city = $request->wife_city;
         $husbandandWife -> wife_district = $request->wife_district;
         $husbandandWife -> wife_academicel = $request->wife_academicel;
         $husbandandWife -> wife_special = $request->wife_special;
         $husbandandWife -> wife_is_work = $request->wife_is_work;
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
         $husbandandWife -> husb_Pre_work = $request->husb_Pre_work;
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
}
