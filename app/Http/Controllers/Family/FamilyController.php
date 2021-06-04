<?php

namespace App\Http\Controllers\Family;

use App\models\Family\Family;
use App\models\Student\Student;
use App\models\Payment\Income;
use Illuminate\Http\Request;
use App\models\Publics\From;
use App\models\Medical\Medical;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;



class FamilyController extends Controller
{


function __construct()
{
$this->middleware('permission: قسم العائلات ', ['only' => ['index']]);
$this->middleware('permission: اضافة العائلات ', ['only' => ['store']]);
$this->middleware('permission: تعديل العائلات ', ['only' => ['update']]);
$this->middleware('permission: حذف العائلات ', ['only' => ['destroy']]);
//$this->middleware('permission: حذف مدرسة لطفل الطلاب ', ['only' => ['register']]);
$this->middleware('permission: فورم تسجيل العائلات ', ['only' => ['enable']]);

$this->middleware('permission: إضافة طالب العائلات ', ['only' => ['add_student']]);
$this->middleware('permission:  طالب العائلات ', ['only' => ['show_student']]);
$this->middleware('permission: حذف طالب العائلات ', ['only' => ['detroy_student']]);

$this->middleware('permission: إضافة مريض العائلات ', ['only' => ['add_medical']]);
$this->middleware('permission:  مريض العائلات ', ['only' => ['show_medical']]);
$this->middleware('permission: حذف مريض العائلات ', ['only' => ['detroy_medical']]);


}



    public function messages()
    {
        return $messages = [
            'family_Constraint.required' => 'لم يتم ادخال معلومات اسم صاحب الفيد المطلوبة !!',
            'family_number_member.required' => 'لم يتم ادخال معلومات عدد أفراد الأسرة المطلوبة !!',
            'family_breadwinner.required' => 'لم يتم ادخال معلومات اسم المعيل الأول المطلوبة !!',
            'family_an_breadwinner.required'=>'لم يتم ادخال معلومات اسم المعيل الثاني المطلوبة !!',
            'family_monthly_salary.required'=>'لم يتم ادخال معلومات الراتب الشهري المطلوبة !!',
            'email.required'=>'لم يتم ادخال معلومات الأيميل المطلوبة !!',
            'email.unique'=>'هذا الأيميل مسجل بالفعل لدينا يجب أضافة ايميل أخر!!',
            'phone.required'=>'لم يتم ادخال معلومات رقم الهاتف الأول المطلوبة !!',
            'phone.numeric'=>'يجب أدخال رقم الهاتف الأول حصراً أرقام  !!',
            'phone.unique'=>'الرقم المضاف موجود بالغعل يرجى أضافة رقم أخر !!',
            'sec_phone.unique'=>'الرقم المضاف موجود بالغعل يرجى أضافة رقم أخر !!',
            'sec_phone.numeric'=>'يجب أدخال رقم الهاتف الثاني حصراً أرقام !!',
            'sec_phone.required'=>'لم يتم ادخال معلومات رقم الهاتف الثاني المطلوبة !!',
            'family_what_aid.required'=>'لم يتم ادخال معلومات ماهي المساعدات المطلوبة !!',
            'family_aid.required'=>'لم يتم ادخال معلومات هل يوجد مساعدات المطلوبة !!',
            'aid_value.required'=>'لم يتم ادخال معلومات قيمة المساعدات المالية  المطلوبة !!',
            'work_an_breadwinner.required'=>'لم يتم ادخال معلومات عمل المعيل الثاني المطلوبة !!',
            'work_breadwinner.required'=>'لم يتم ادخال معلومات عمل المعيل الأول المطلوبة !!',
            'note.required'=>'يجب عليك ادخال ملاحظة او كتابة كلمة لايوجد !!',

        ];
    }

    public function index(Request $request)
    {
        $payments = Income::select('value_bim')->distinct()->get();
        $family = Family::all();
        return view('Family.family.family',compact('family','payments'));
    }


    public function store(Request $request)
    {
        $messages = $this->messages();
        $this->validate($request,[
            'family_Constraint' => 'required',
            'family_number_member' => 'required',
            'family_breadwinner' => 'required',
            'family_an_breadwinner' => 'required',
            'family_monthly_salary' => 'required',
            'family_what_aid' => 'required',
            'aid_value' => 'required',
            'note' => 'required',
            'sec_phone' => 'required|unique:families',
            'phone' => 'required|unique:families',
            'work_an_breadwinner' => 'required',
            'work_breadwinner' => 'required'
         ],$messages);
         //create new object of the model student and make mapping to the data
         $families = new Family;
         $families -> family_Constraint = $request->family_Constraint;
         $families -> phone = $request->phone;
         $families -> sec_phone = $request->sec_phone;
         $families -> family_number_member = $request->family_number_member;
         $families -> family_breadwinner = $request->family_breadwinner;
         $families -> family_an_breadwinner = $request->family_an_breadwinner;
         $families -> aid_value = $request->aid_value;
         $families -> work_breadwinner = $request->work_breadwinner;
         $families -> work_an_breadwinner = $request->work_an_breadwinner;
         $families -> family_monthly_salary = $request->family_monthly_salary;
         $families -> family_what_aid = $request->family_what_aid;
         $families -> family_has_aid = $request->family_has_aid;
         $families -> note = $request->note;

         //write to the data base
         $families ->save();
         //dd($request);
         if ($request->register == "admin") {
         session()->flash('Add', 'تم اضافة العائلة '. $request->family_Constraint .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         $request=null;
         return redirect(route('family.show'));
         }

         if ($request->register == "register") {
            $enable = From::find(1);
            session()->flash('Add', 'تم اضافة العائلة '. $request->family_Constraint .' بنجاح ');
            $request=null;
            return view('Family.family.register',compact('enable'));
        }
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
            'sec_phone' => 'required|unique:familys',
            'aid_value' => 'required',
            'phone' => 'required|unique:familys',
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
         $families -> aid_value = $request->aid_value;
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
        if ($last != null) {
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
         session()->flash('Add_student_error', 'حدث حطأ اثناء اضافة طالب للعائلة '. $family_Constraint .' يرجى التأكد من الرقم المدخل ان يكون صحيح  ');
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

///////////////////////////////////////////    Medical   ///////////////////////////////////

    public function add_medical(Request $request)
    {
        $this->validate($request,[
         'family_id' => 'required',
         'medical_id' => 'required',
         ]);
         $last = DB::table('medicals')->latest()->first();
        //  dd($last)c;
        if ($last != null) {

         if (  $request->medical_id <= $last->id ) {

         //create new object of the model student and make mapping to the data
         $medicals = Medical::find($request->medical_id);
         if ($medicals ->family_id  == null) {
         $familys =  Family::find($request->family_id);
         $family_Constraint = $familys->family_Constraint;
         $x = $familys->patient_statu;
         ++$x;
         $familys->patient_statu = $x;
         $medicals ->family_id = $request->family_id;
         //write to the data base
         $familys ->save();
         $medicals -> save();
         session()->flash('Add_medical', 'تم اضافة طالب للعائلة '. $family_Constraint .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added medical Successfully')
         return redirect(route('family.show'));
         }

         else {
         $familys =  Family::find($request->family_id);
         $family_Constraint = $familys->family_Constraint;
         session()->flash('Add_medical_error', 'حدث حطأ اثناء اضافة طالب للعائلة '. $family_Constraint .' يرجى التأكد من الرقم المدخل ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added medical Successfully')
         return redirect(route('family.show'));
         }

         }
         else {
         $familys =  Family::find($request->family_id);
         $family_Constraint = $familys->family_Constraint;
         session()->flash('Add_medical_error', 'حدث حطأ اثناء اضافة طالب للعائلة '. $family_Constraint .' يرجى التأكد من الرقم المدخل ان يكون صحيح يامسخم ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added medical Successfully')
         return redirect(route('family.show'));
         }
         }
        else {
         $familys =  Family::find($request->family_id);
         $family_Constraint = $familys->family_Constraint;
         session()->flash('Add_medical_error', 'حدث حطأ اثناء اضافة طالب للعائلة '. $family_Constraint .' يرجى التأكد من الرقم المدخل ان يكون صحيح يامسخم ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added medical Successfully')
         return redirect(route('family.show'));
         }

    }

    public function show_medical($id)
    {
        $medicals = medical::where('family_id', $id)->get();
        return view('family.medical.medical_family',compact('medicals'));
    }

    public function detroy_medical(Request $request)
    {
        $families = Family::find($request->family_id);
        $x=0;
        $x = $families->patient_statu ;
        -- $x ;
        $families->patient_statu = $x;
        $families->save();
        $medicals = Medical::find($request->id);
        $medicals->family_id = null;
        $medicals->save();
        /*after delete the medical by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the medical Successfully')*/
        session()->flash('Delete', 'تم حذف القسم بنجاح ');
        return  redirect()->route('family.medical.show', [$request->family_id]);

    }

    }
