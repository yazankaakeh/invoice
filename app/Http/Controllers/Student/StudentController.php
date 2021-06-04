<?php

namespace App\Http\Controllers\Student ;

use App\models\Student\Student;
use App\models\Family\Family;
use Illuminate\Http\Request;
use App\models\Payment\Income;
use App\models\Publics\From;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

class StudentController extends Controller
{

function __construct()
{
$this->middleware('permission: قسم الطلاب ', ['only' => ['index']]);
$this->middleware('permission: إضافة الطلاب ', ['only' => ['store']]);
$this->middleware('permission: تعديل الطلاب ', ['only' => ['update']]);
$this->middleware('permission: حذف الطلاب ', ['only' => ['destroy']]);
//$this->middleware('permission: حذف مدرسة لطفل الطلاب ', ['only' => ['register']]);
$this->middleware('permission: فورم تسجيل الطلاب ', ['only' => ['enable']]);


}

    public function messages()
    {
        return $messages = [
            'student_name.required' => 'لم يتم أدخال معلومات اسم الطالب المطلوبة  !!',
            'birthday.required' => 'لم يتم أدخال معلومات تاريخ الميلاد المطلوبة!!',
            'age.required' => 'لم يتم أدخال معلومات عمر المطلوبة!!',
            'age.numeric'=>'معلومات العمر يجب أن تكون حصراً أرقام !!',
            'email.unique'=>'هذا الأيميل مسجل بالفعل لدينا يجب أضافة ايميل أخر!!',
            'email.required'=>'لم يتم ادخال معلومات الأيميل المطلوبة !!',
            'phone.required'=>'لم يتم أدخال معلومات الهاتف المطلوبة !!',
            'phone.numeric'=>'يجب أن يكون رقم الهاتف حصراً من أرقام !!',
            'phone.unique'=>'الرقم المسجل موجود بالغعل يرجى أدخال رقم أخر  !!',
            'county_are_from.required'=>'لم يتم أدخال معلومات اسم المحافظة المطلوبة !!',
            'city_name.required'=>'لم يتم أدخال معلومات اسم المدينة المطلوبة !!',
            'stu_Cur_housing.required'=>'لم يتم أدخال معلومات اسم الولاية المطلوبة!!',
            'entry_turkey.required'=>'لم يتم أدخال معلومات تاريخ دخول تركياالمطلوبة!!',
            'Identity_type.required'=>'لم يتم أدخال معلومات نوع الهوية المطلوبة  !!',
            'Id_stud_source.required'=>'لم يتم أدخال معلومات اسم الولاية للكملك المطلوية!!',
        ];
    }

    public function index()
    {
        $payments = Income::select('value_bim')->distinct()->get();
        $students = Student::all();
        //dd($students);
        return view('Student.students.students',compact('students','payments'));
    }

    public function store(Request $request)
    {
        $messages = $this->messages();
        $this->validate($request,[
            'student_name' => 'required',
            'birthday' => 'required|date',
            'email' => 'required',
            'phone' => 'required|unique:students',
            'age' => 'required|numeric',
            'county_are_from' => 'required',
            'city_name' => 'required',
            'stu_Cur_housing' => 'required',
            'entry_turkey' => 'required',
            'Identity_type' => 'required',
            'Id_stud_source' => 'required'
        ],$messages);
         //create new object of the model student and make mapping to the data
         $students = new Student;
         $students -> student_name = $request->student_name;
         $students -> birthday = $request->birthday;
         $students -> email = $request->email;
         $students -> phone = $request->phone;
         $students -> age = $request->age;
         $students -> county_are_from = $request->county_are_from;
         $students -> city_name = $request->city_name;
         $students -> stu_Cur_housing = $request->stu_Cur_housing;
         $students -> entry_turkey = $request->entry_turkey;
         $students -> Identity_type = $request->Identity_type;
         $students -> Id_stud_source = $request->Id_stud_source;
         $students -> gender = $request->gender;

         //write to the data base
         $students ->save();
         if ($request->register == "admin") {
         session()->flash('Add', 'تم اضافة الطالب '. $request->student_name.' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('student.show'));
         }elseif ($request->register == "register") {

        $enable = From::find(1);
        session()->flash('Add', 'تم اضافة الطالب '. $request->student_name.' بنجاح ');
        $request=null;
        return view('student.students.register',compact('enable'));
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         }

    }


    public function update(Request $request)
    {
        //we write this code with id validation to make sure it the same id and also allow the user to rename the same name for edite
        $id = $request->id;
        $this->validate($request, [
            'student_name' => 'required',
            'birthday' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'age' => 'required',
            'county_are_from' => 'required',
            'city_name' => 'required',
            'stu_Cur_housing' => 'required',
            'entry_turkey' => 'required',
            'Identity_type' => 'required',
            'Id_stud_source' => 'required'
        ]);
         //create new object of the model student and make mapping to the data ::find($request->id);
         $students =  Student::find($request->id);
         $students -> student_name = $request->student_name;
         $students -> birthday = $request->birthday;
         $students -> email = $request->email;
         $students -> phone = $request->phone;
         $students -> age = $request->age;
         $students -> county_are_from = $request->county_are_from;
         $students -> city_name = $request->city_name;
         $students -> stu_Cur_housing = $request->stu_Cur_housing;
         $students -> entry_turkey = $request->entry_turkey;
         $students -> Identity_type = $request->Identity_type;
         $students -> Id_stud_source = $request->Id_stud_source;


         //write to the data base
         $students ->save();
         session()->flash('Edit', 'تم تعديل الطالب بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('student.show'));

    }

    public function destroy(request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $user = DB::table('students')->where('id', $request->id )->value('family_id');
        //dd($user);
        if ($user == null) {
        Student::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete', 'تم حذف القسم بنجاح ');
        return redirect(route('student.show'));
        }
        else {
        $families = Family::find($user);
        $x=0;
        $x = $families->student_statu ;
        -- $x ;
        $families->student_statu = $x;
        $families->save();
        Student::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete', 'تم حذف العلاقة بين الطالب والعائلة بنجاح ');
        return redirect(route('student.show'));
        }


    }

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

        return view('student.students.register',compact('enable'));
        }
        else {
        $enable = From::find(1);
        //dd($enable);
        return view('student.students.register',compact('enable'));

        }

    }

    public function enable(Request $request){

        $check = From::all();
        if($check->isEmpty())
        {
        $form = From::create([
            'student_form' => 0,
            'family_form' => 0,
            'medical_form' => 0,

        ]);
        $this->validate($request,[
            'enable' => 'required'
         ]);
         $enable = From::find('1');
         $enable->student_form = $request->enable;

         $enable->save();
         session()->flash('Form', 'تم تعديل حالة قائمة تسجيل الطالب بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('student.show'));
        }
        else {
        $this->validate($request,[
            'enable' => 'required'
         ]);
         $enable = From::find('1');
         $enable->student_form = $request->enable;

         $enable->save();
         session()->flash('Form', 'تم تعديل حالة قائمة تسجيل الطالب بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('student.show'));
        }
    }




}
