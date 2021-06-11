<?php

namespace App\Http\Controllers\Student ;

use App\models\Student\Student;
use App\models\Family\Family;
use Illuminate\Http\Request;
use App\models\Payment\Income;
use App\models\Publics\From;
use App\models\Publics\Turkey;
use Illuminate\Support\Facades\DB;
use App\models\Publics\HusbandandWife;
use App\models\Student\University;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

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

$this->middleware('permission: عرض الطلاب المرفوضين ', ['only' => ['reject_student']]);
$this->middleware('permission: عرض الطلاب المؤرشفة ', ['only' => ['archive_student']]);
$this->middleware('permission: عرض الطلاب المؤجلين ', ['only' => ['delayed_student']]);
$this->middleware('permission: عرض الطلاب الجدد', ['only' => ['new_student']]);


}

public function messages_store_register()
{
    return $messages_store_register = [
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
        'univer_name.required'=>'لم يتم أدخال معلومات اسم الجامعة!!',
        'univer_location.required'=>'لم يتم أدخال معلومات موقع الجامعة!!',
        'univer_special.required'=>'لم يتم أدخال معلومات اختصاص الجامعة!!',
        'current_rate.required'=>'لم يتم أدخال معلومات المعدل الحالي!!',
    ];
}
    public function store_register(Request $request)
    {
        $messages = $this->messages_store_register();
        $this->validate($request,[
            'student_name' => 'required',
            'birthday' => 'required|date',
            'email' => 'required',
            'phone' => 'required|unique:students',
            'age' => 'required|numeric',
            'county_are_from' => 'required',
            'city_name' => 'required',
            'social_state' => 'required',
            'stu_Cur_housing' => 'required',
            'entry_turkey' => 'required',
            'Identity_type' => 'required',
            'univer_name' => 'required',
            'univer_location' => 'required',
            'univer_special' => 'required',
            'schoo_year' => 'required',
            'current_rate' => 'required',
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
         $students -> social_state = $request->social_state;
         $students -> stu_Cur_housing = $request->stu_Cur_housing;
         $students -> entry_turkey = $request->entry_turkey;
         $students -> Identity_type = $request->Identity_type;
         $students -> Id_stud_source = $request->Id_stud_source;
         $students -> gender = $request->gender;
         $students ->save();
        // dd($students->id);

         $s = Student::where('phone', $request->phone)->get();
        //  dd($s);
         $University = new University;
         $University->student_id = $students->id;
         $University->univer_name = $request->univer_name;
         $University->univer_location = $request->univer_location;
         $University->univer_special = $request->univer_special;
         $University->number_years = $request->number_years;
         $University->schoo_year = $request->schoo_year;

        $cities = Turkey::where('show', 1)->get();

         //write to the data base
         $University ->save();
         $request=null;
         $enable = From::find(1);
         session()->flash('Add', 'تم تسجيل الطالب '.  $students -> student_name.'  بنجاح سيتم التواصل معكم قريبا');
         return view('student.students.register',compact('enable','cities'));
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
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
            'univer_name.required'=>'لم يتم أدخال معلومات اسم الجامعة!!',
            'univer_location.required'=>'لم يتم أدخال معلومات موقع الجامعة!!',
            'univer_special.required'=>'لم يتم أدخال معلومات اختصاص الجامعة!!',
            'current_rate.required'=>'لم يتم أدخال معلومات المعدل الحالي!!',
        ];
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
            'social_state' => 'required',
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
         $students -> social_state = $request->social_state;
         $students -> county_are_from = $request->county_are_from;
         $students -> city_name = $request->city_name;
         $students -> stu_Cur_housing = $request->stu_Cur_housing;
         $students -> entry_turkey = $request->entry_turkey;
         $students -> Identity_type = $request->Identity_type;
         $students -> Id_stud_source = $request->Id_stud_source;
         $students -> gender = $request->gender;
         $students->new_statu = 1;
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


    public function messages_update()
    {
        return $messages_update = [
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
            'univer_name.required'=>'لم يتم أدخال معلومات اسم الجامعة!!',
            'univer_location.required'=>'لم يتم أدخال معلومات موقع الجامعة!!',
            'univer_special.required'=>'لم يتم أدخال معلومات اختصاص الجامعة!!',
            'current_rate.required'=>'لم يتم أدخال معلومات المعدل الحالي!!',
        ];
    }
    public function update(Request $request)
    {
        //we write this code with id validation to make sure it the same id and also allow the user to rename the same name for edite
        $messages = $this->messages_update();
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
        ],$messages);

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

    //Form register and Enable :D
    public function register(){
        $check = From::all();
        $cities = Turkey::where('show', 1)->get();
        if($check->isEmpty())
        {
        $form = From::create([
            'student_form' => 0,
            'family_form' => 0,
            'medical_form' => 0,

        ]);
        $enable = From::find(1);
        //dd($enable);

        return view('student.students.register',compact('enable','cities'));
        }
        else {
        $enable = From::find(1);
        //dd($enable);
        return view('student.students.register',compact('enable','cities'));

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

    //student statu
    public function student_statu(Request $request)
    {
        if($request->statu == 1)
        {
        $students = Student::find($request->student_id);
        $students->new_statu = $request->statu;
        session()->flash('accepted', 'تم تعديل حالة الطالب '. $request->student_name .' لمقيول  ');
        $students->save();
        return back();
        }

        if($request->statu == 2)
        {
        $students = Student::find($request->student_id);
        $students->new_statu = $request->statu;
        session()->flash('rejected', 'تم تعديل حالة الطالب '. $request->student_name .' لمرفوض  ');
        $students->save();
        return back();
        }

        if($request->statu == 3)
        {
        $students = Student::find($request->student_id);
        $students->new_statu = $request->statu;
        session()->flash('archived', 'تم تعديل حالة الطالب '. $request->student_name .' للأرشفة  ');
        $students->save();
        return back();
        }

        if($request->statu == 4)
        {
        $students = Student::find($request->student_id);
        $students->new_statu = $request->statu;
        session()->flash('delayed', 'تم تعديل حالة الطالب '. $request->student_name .' للمؤجل  ');
        $students->save();
        return back();
        }

        if($request->statu == 0)
        {
        $students = Student::find($request->student_id);
        $students->new_statu = $request->statu;
        session()->flash('new', 'تم تعديل حالة الطالب '. $request->student_name .' للجديد  ');
        $students->save();
        return back();
        }
    }

    // show students type
    public function reject_student()
    {
        $payments = Income::select('value_bim')->distinct()->get();
        $univ = University::all();
        return view('Student.students.rejected_students',compact('payments','univ'));
    }

    public function archive_student()
    {
        $payments = Income::select('value_bim')->distinct()->get();
        $univ = University::all();
        return view('Student.students.archived_students',compact('payments','univ'));
    }

    public function delayed_student()
    {
        $payments = Income::select('value_bim')->distinct()->get();
        $univ = University::all();
        return view('Student.students.delayed_students',compact('payments','univ'));
    }

    public function index()
    {
        //$cities = Turkey::all();
        $cities = Turkey::all();
        $payments = Income::select('value_bim')->distinct()->get();
        $students = Student::all();
        //dd($cities);
        return view('Student.students.saved_student',compact('students','payments','cities'));
    }

    public function new_student()
    {
        $univ = University::all();
        return view('Student.students.students',compact('univ'));
    }
    // show students type

}
