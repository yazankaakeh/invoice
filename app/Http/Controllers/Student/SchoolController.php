<?php

namespace App\Http\Controllers\Student;

use App\models\Student\School;
use App\models\Publics\Children;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class SchoolController extends Controller
{


function __construct()
{
$this->middleware('permission:  مدرسة لطفل الطلاب ', ['only' => ['index_student']]);
$this->middleware('permission:  مدرسة لطفل الطلاب ', ['only' => ['show_student']]);
$this->middleware('permission: إضافة مدرسة لطفل الطلاب ', ['only' => ['store_student']]);
$this->middleware('permission: تعديل مدرسة لطفل الطلاب ', ['only' => ['update_student']]);
$this->middleware('permission: حذف مدرسة لطفل الطلاب ', ['only' => ['destroy_student']]);

$this->middleware('permission:  مدرسة لطفل العائلات ', ['only' => ['index_family']]);
$this->middleware('permission:  مدرسة لطفل العائلات ', ['only' => ['show_family']]);
$this->middleware('permission: إضافة مدرسة لطفل العائلات ', ['only' => ['store_family']]);
$this->middleware('permission: تعديل مدرسة لطفل العائلات ', ['only' => ['update_family']]);
$this->middleware('permission: حذف مدرسة لطفل العائلات ', ['only' => ['destroy_family']]);
}

####################################### Student Start #############################
    public function index_student()
    {
        $school['school'] = School::select('id','School_name','children_id','updated_at','School_type','School_location',
       'School_fees','School_cost')
       ->orderBy('id', 'DESC')
       ->get();
       //dd($husb);
       return view('Student.school.school_student')->with($school);

      // $school = School::with('Children')->get();
      // dd($school);
      // return view('Student.school.school_student',compact("school"));
    }

    public function show_student($id)
    {
      $school = School::where('children_id', $id)->get();
      return view('Student.school.school_student',compact('school'));
    }

    public function messages_store_student()
    {
        return $messages_store_student = [
            'id.required' => '',
            'School_name.required' => 'لم يتم ادخال معلومات اسم المدرسة  !!',
            'School_type.required' => 'لم يتم ادخال معلومات نوع  المدرسة !!',
            'School_location.required'=>'لم يتم ادخال معلومات موقع المدرسة !!',
            'School_cost.required'=>'لم يتم ادخال معلومات أجور المدرسة !!',
            'School_fees.required'=>'لم يتم ادخال معلومات  مصدر المطلوبة !!',
            'School_fees.required'=>'لم يتم ادخال معلومات  مصدر مصاريف  !!',


        ];
    }
    public function store_student(Request $request)
    {
        $messages = $this->messages_store_student();
        $this->validate($request,[
            'id' => 'required',
            'School_name' => 'required',
            'School_type' => 'required',
            'School_location' => 'required',
            'School_cost' => 'required',
            'School_fees' => 'required',
        ],$messages);
        //create new object of the model student and make mapping to the data
         $childrens =  Children::find($request->id);
         $childrens_name = $childrens->childrens_name;
         $x = $childrens->student_statu;
         ++$x;
         $childrens->student_statu = $x;

         $schools = new School;
         $schools -> children_id = $request->id;
         $schools -> School_name = $request->School_name;
         $schools -> School_type = $request->School_type;
         $schools -> School_location = $request->School_location;
         $schools -> School_cost = $request->School_cost;
         $schools -> School_fees = $request->School_fees;
         //write to the data base
         $childrens->save();
         $schools ->save();
         session()->flash('Add_School', 'تم اضافة مدرسة للطفل  '. $childrens_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('children.show'));
    }

    public function messages_update_student()
    {
        return $messages_update_student = [
            'id.required' => '',
            'School_name.required' => 'لم يتم ادخال معلومات اسم المدرسة  !!',
            'School_type.required' => 'لم يتم ادخال معلومات نوع  المدرسة !!',
            'School_location.required'=>'لم يتم ادخال معلومات موقع المدرسة !!',
            'School_cost.required'=>'لم يتم ادخال معلومات أجور المدرسة !!',
            'School_fees.required'=>'لم يتم ادخال معلومات  مصدر المطلوبة !!',
            'School_fees.required'=>'لم يتم ادخال معلومات  مصدر مصاريف  !!',


        ];
    }
    public function update_student(Request $request)
    {
        $messages = $this->messages_update_student();
        $this->validate($request,[
            'children_id' => 'required',
            'id' => 'required',
            'School_name' => 'required',
            'School_type' => 'required',
            'School_location' => 'required',
            'School_cost' => 'required',
            'School_fees' => 'required',
        ],$messages);

         //create new object of the model student and make mapping to the data
         $childrens =  Children::find($request->children_id);
         $childrens_name = $childrens->childre_name;

         $schools =  School::find($request->id);
         $schools -> School_name = $request->School_name;
         $schools -> School_type = $request->School_type;
         $schools -> School_location = $request->School_location;
         $schools -> School_cost = $request->School_cost;
         $schools -> School_fees = $request->School_fees;
         //write to the data base
         $childrens->save();
         $schools ->save();
         session()->flash('Edit_School', 'تم تعديل معلومات المدرسة للطفل  '. $childrens_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('children.show'));
    }


    public function destroy_student(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $childrens =  Children::find($request->children_id);
        $x = $childrens->student_statu;
        --$x;
        $childrens->student_statu = $x;
        $children_name = $childrens->childre_name;

        School::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete',' تم حذف معلومات المدرسة للطفل '. $children_name .' بنجاح ');
        $childrens->save();
        return redirect(route('children.show'));
    }
####################################### Student End #############################
#################################################
######################
#######################
#################################################
####################################### Medical Start #############################

    // public function index_medical()
    // {
    //    $school = School::with('Children')->get();
    //    dd($school);
    //    return view('Medical.school.school_student',compact("school"));
    // }

    // public function show_medical($id)
    // {
    //     $school = Children::where('medical_id', $id)->get();
    //     dd($school);
    //     return view('Medical.school.school_student',compact('school'));
    // }

    // public function store_medical(Request $request)
    // {
    //      $this->validate($request,[
    //         'id' => 'required',
    //         'School_name' => 'required',
    //         'School_type' => 'required',
    //         'School_location' => 'required',
    //         'School_cost' => 'required',
    //         'School_fees' => 'required',
    //      ]);
    //      //create new object of the model student and make mapping to the data
    //      $childrens =  Children::find($request->id);
    //      $childrens_name = $childrens->childrens_name;
    //      $x = $childrens->medical_statu;
    //      ++$x;
    //      $childrens->child_statu = $x;

    //      $schools = new School;
    //      $schools -> children_id = $request->id;
    //      $schools -> School_name = $request->School_name;
    //      $schools -> School_type = $request->School_type;
    //      $schools -> School_location = $request->School_location;
    //      $schools -> School_cost = $request->School_cost;
    //      $schools -> School_fees = $request->School_fees;
    //      //write to the data base
    //      $childrens->save();
    //      $schools ->save();
    //      session()->flash('Add_School', 'تم اضافة مدرسة للطفل  '. $childrens_name .' بنجاح ');
    //      //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
    //      return redirect(route('Student.child.child'));

    // }

    // public function update_medical(Request $request)
    // {
    //     //
    // }



    // public function destroy_medical(School $school)
    // {
    //     //
    // }

####################################### Medical End #############################
#################################################
###################
###################
#################################################
####################################### Family Start #############################

    public function index_family()
    {
        $school['school'] = School::select('id','School_name','children_id','updated_at','School_type','School_location',
       'School_fees','School_cost')
       ->orderBy('id', 'DESC')
       ->get();
       //dd($husb);
       return view('Family.school.school_family')->with($school);
      // $school = School::with('Children')->get();
      // return view('Family.school.school_family')->with($school);
    }

    public function show_family($id)
    {
        $school = School::where('children_id', $id)->get();
        //dd($school);
        return view('Family.school.school_family',compact('school'));
    }

    public function messages_store_family()
    {
        return $messages_store_family = [
            'id.required' => '',
            'School_name.required' => 'لم يتم ادخال معلومات اسم المدرسة  !!',
            'School_type.required' => 'لم يتم ادخال معلومات نوع  المدرسة !!',
            'School_location.required'=>'لم يتم ادخال معلومات موقع المدرسة !!',
            'School_cost.required'=>'لم يتم ادخال معلومات أجور المدرسة !!',
            'School_fees.required'=>'لم يتم ادخال معلومات  مصدر المطلوبة !!',
            'School_fees.required'=>'لم يتم ادخال معلومات  مصدر مصاريف  !!',


        ];
    }
    public function store_family(Request $request)
    {
        $messages = $this->messages_store_family();
        $this->validate($request,[
            'id' => 'required',
            'School_name' => 'required',
            'School_type' => 'required',
            'School_location' => 'required',
            'School_cost' => 'required',
            'School_fees' => 'required',
        ],$messages);

         //create new object of the model student and make mapping to the data
         $childrens =  Children::find($request->id);
         $childrens_name = $childrens->childrens_name;
         $x = $childrens->family_statu;
         ++$x;
         $childrens->family_statu = $x;

         $schools = new School;
         $schools -> children_id = $request->id;
         $schools -> School_name = $request->School_name;
         $schools -> School_type = $request->School_type;
         $schools -> School_location = $request->School_location;
         $schools -> School_cost = $request->School_cost;
         $schools -> School_fees = $request->School_fees;
         //write to the data base
         $childrens->save();
         $schools ->save();
         session()->flash('Add_School', 'تم اضافة مدرسة للطفل  '. $childrens_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('children.show.family'));
    }

    public function messages_update_family()
    {
        return $messages_update_family = [
            'id.required' => '',
            'School_name.required' => 'لم يتم ادخال معلومات اسم المدرسة  !!',
            'School_type.required' => 'لم يتم ادخال معلومات نوع  المدرسة !!',
            'School_location.required'=>'لم يتم ادخال معلومات موقع المدرسة !!',
            'School_cost.required'=>'لم يتم ادخال معلومات أجور المدرسة !!',
            'School_fees.required'=>'لم يتم ادخال معلومات  مصدر المطلوبة !!',
            'School_fees.required'=>'لم يتم ادخال معلومات  مصدر مصاريف  !!',


        ];
    }
    public function update_family(Request $request)
    {
        $messages = $this->messages_update_family();
        $this->validate($request,[
            'children_id' => 'required',
            'id' => 'required',
            'School_name' => 'required',
            'School_type' => 'required',
            'School_location' => 'required',
            'School_cost' => 'required',
            'School_fees' => 'required',
        ],$messages);
        //create new object of the model student and make mapping to the data
         $childrens =  Children::find($request->children_id);
        // dd($childrens);
         $childrens_name = $childrens->childre_name;
         $x = $childrens->family_statu;
         ++$x;
         $childrens->family_statu = $x;

         $schools = School::find($request->id);
         $schools -> School_name = $request->School_name;
         $schools -> School_type = $request->School_type;
         $schools -> School_location = $request->School_location;
         $schools -> School_cost = $request->School_cost;
         $schools -> School_fees = $request->School_fees;
         //write to the data base
         $childrens->save();
         $schools ->save();
         session()->flash('Edit_School', 'تم تعديل معلومات المدرسة للطفل  '. $childrens_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('children.show.family'));
    }

    public function destroy_family(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $childrens =  Children::find($request->children_id);
        $x = $childrens->family_statu;
        --$x;
        $childrens->family_statu = $x;
        $children_name = $childrens->childre_name;

        School::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete',' تم حذف معلومات المدرسة للطفل'. $children_name .' بنجاح ');
        $childrens->save();
        return redirect(route('children.show.family'));
    }

####################################### Family End #############################


}
