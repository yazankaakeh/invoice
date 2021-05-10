<?php

namespace App\Http\Controllers\Family;

use App\models\Family\Family;
use App\models\Student\Student;
use Illuminate\Http\Request;
use App\models\Publics\From;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;



class FamilyController extends Controller
{

    public function index(Request $request)
    {
        $family = Family::all();
        //dd($students);
        return view('Family.family.family',compact('family'));
    }
  

    public function store(Request $request)
    {
        $this->validate($request,[
            'family_Constraint' => 'required',
            'family_number_member' => 'required',
            'family_breadwinner' => 'required',
            'family_an_breadwinner' => 'required',
            'family_monthly_salary' => 'required',
            'family_monthly_salary' => 'required',
            'family_what_aid' => 'required',
            'note' => 'required',
            'sec_phone' => 'required',
            'phone' => 'required',
            'work_an_breadwinner' => 'required',
            'work_breadwinner' => 'required'
         ]);
         //create new object of the model student and make mapping to the data
         $families = new Family;
         $families -> family_Constraint = $request->family_Constraint;
         $families -> phone = $request->phone;
         $families -> sec_phone = $request->sec_phone;
         $families -> family_number_member = $request->family_number_member;
         $families -> family_breadwinner = $request->family_breadwinner;
         $families -> family_an_breadwinner = $request->family_an_breadwinner;
         $families -> work_breadwinner = $request->work_breadwinner;
         $families -> work_an_breadwinner = $request->work_an_breadwinner;
         $families -> family_monthly_salary = $request->family_monthly_salary;
         $families -> family_what_aid = $request->family_what_aid;
         $families -> family_has_aid = $request->family_has_aid;
         $families -> note = $request->note;

         //write to the data base
         $families ->save();
         session()->flash('Add', 'تم اضافة العائلة بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('family.show'));
    }


    public function update(Request $request)
    {
        $this->validate($request,[
            'family_Constraint' => 'required',
            'family_number_member' => 'required',
            'id' => 'required',
            'family_breadwinner' => 'required',
            'family_an_breadwinner' => 'required',
            'family_monthly_salary' => 'required',
            'family_monthly_salary' => 'required',
            'family_what_aid' => 'required',
            'sec_phone' => 'required',
            'phone' => 'required',
            'work_an_breadwinner' => 'required',
            'work_breadwinner' => 'required',
            'note' => 'required'
         ]);
         //create new object of the model student and make mapping to the data
         $families = Family::find($request->id);
         $families -> phone = $request->phone;
         $families -> sec_phone = $request->sec_phone;
         $families -> family_Constraint = $request->family_Constraint;
         $families -> family_number_member = $request->family_number_member;
         $families -> family_breadwinner = $request->family_breadwinner;
         $families -> family_an_breadwinner = $request->family_an_breadwinner;
         $families -> family_monthly_salary = $request->family_monthly_salary;
         $families -> family_what_aid = $request->family_what_aid;         
         $families -> work_breadwinner = $request->work_breadwinner;
         $families -> work_an_breadwinner = $request->work_an_breadwinner;
         $families -> family_has_aid = $request->family_has_aid;
         $families -> note = $request->note;

         //write to the data base
         $families ->save();
         session()->flash('Edit', 'تم تعديل معلومات العائلة بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('family.show'));
    }

    public function destroy(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        
        $user = DB::table('students')->where('family_id', $request->id )->value('family_id');
      //  dd($user);
        if ($user == null) {
            $familys =  Family::find($request->id);
            $family_Constraint = $familys->family_Constraint;         
            Family::find($request->id)->delete();
            session()->flash('Delete','تم حذف معلومات العائلة  '. $family_Constraint .' بنجاح ');
            return redirect(route('family.show'));
        }else {
        DB::table('students')->where('family_id', $request->id)->update(['family_id' => null]);
        $familys =  Family::find($request->id);
        $family_Constraint = $familys->family_Constraint;

        Family::find($request->id)->delete();

        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف معلومات العائلة  '. $family_Constraint .' بنجاح ');
        return redirect(route('family.show'));
        }
        

    }

////////////////////////////////////////////////////////// Form /////////////////////////
    
    public function register(){    
        $check = From::all();

        if($check->isEmpty())
        {
        $form = From::create([
            'student_form' => 0,
            'family_form' => 0,
            'medical_form' => 0,
     
        ]);
        $enable = From::find(1);
        //dd($enable);

        return view('Family.family.register',compact('enable'));
        }
        else {
        $enable = From::find(1);
        //dd($enable);
        return view('Family.family.register',compact('enable'));

        }
    }

    public function enable(Request $request){
        $this->validate($request,[
            'enable' => 'required'
         ]);
         $enable = From::find('1');
         $enable->family_form = $request->enable;

         $enable->save();
         session()->flash('Form', 'تم تعديل حالة قائمة تسجيل العائلات بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('family.show'));
    }  



///////////////////////////////////////////    Student /////////////////////////////////


    public function add_student(Request $request)
    {
        $this->validate($request,[
         'family_id' => 'required',
         'student_id' => 'required',  
         ]);
         $last = DB::table('students')->latest()->first();
        //  dd($last);
         if ($request->student_id <= $last->id ) {
        
         //create new object of the model student and make mapping to the data
         $students = Student::find($request->student_id);
         if ($students ->family_id  == null) {
         $familys =  Family::find($request->family_id);
         $family_Constraint = $familys->family_Constraint;
         $x = $familys->student_statu;
         ++$x;
         $familys->student_statu = $x;
         $students ->family_id = $request->family_id;
         //write to the data base
         $familys ->save();
         $students -> save();
         session()->flash('Add_student', 'تم اضافة طالب للعائلة '. $family_Constraint .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('family.show'));
         }
         else {
         $familys =  Family::find($request->family_id);
         $family_Constraint = $familys->family_Constraint;
         session()->flash('Add_student_error', 'حدث حطأ اثناء اضافة طالب للعائلة '. $family_Constraint .' يرجى التأكد من الرقم المدخل ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('family.show'));
         }
         }
         else {
         $familys =  Family::find($request->family_id);
         $family_Constraint = $familys->family_Constraint;
         session()->flash('Add_student_error', 'حدث حطأ اثناء اضافة طالب للعائلة '. $family_Constraint .' يرجى التأكد من الرقم المدخل ان يكون صحيح يامسخم ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('family.show'));
         }

    }

    public function show_student($id)
    {
        $students = Student::where('family_id', $id)->get();
        return view('family.students.students_family',compact('students'));
    }

    public function detroy_student(Request $request)
    {
        $families = Family::find($request->family_id);
        $x=0;
        $x = $families->student_statu ;
        -- $x ;
        $families->student_statu = $x;
        $families->save();
        $students = Student::find($request->id);
        $students->family_id = null;
        $students->save();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete', 'تم حذف القسم بنجاح ');
        return  redirect()->route('family.student.show', [$request->family_id]);

    }
    }
