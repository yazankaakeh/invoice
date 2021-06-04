<?php

namespace App\Http\Controllers\Publics;
use App\Http\Controllers\Student\StudentController;
use App\models\Student\Student;
use App\models\Publics\SisterandBrother;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;


class SisterandBrotherController extends Controller
{

function __construct()
{

    $this->middleware('permission: قسم الأخوة الطلاب ', ['only' => ['index']]);
    $this->middleware('permission: قسم الأخوة الطلاب ', ['only' => ['show']]);
    $this->middleware('permission: اضافة الأخوة الطلاب ', ['only' => ['storestudent']]);
    $this->middleware('permission: تعديل قسم الأخوة الطلاب ', ['only' => ['update']]);
    $this->middleware('permission:حذف قسم الأخوة الطلاب ', ['only' => ['destroy']]);

}



public function messages_student()
{
return $messages_student = [
    'student_id.required' => '!!',
    'name.required' => 'لم يتم ادخال اسم  !!',
    'age.required' => 'لم يتم ادخال  العمر   !!',
    'gender.required' => 'لم يتم الجنس    !!',
    'academicel.required'  => 'لم يتم ادخال مرحلة دراسية  !!',
    'special.required'  => 'لم يتم ادخال الأختصتص  !!',
    'work.required'  => 'لم يتم ادخال العمل !!',
    'salary.required'  => 'لم يتم ادخال الراتب الشهري !!',



];
}
    public function storestudent(Request $request)
    {
        $messages = $this->messages_student();
        $this->validate($request,[
            'student_id'=>'required',
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'academicel' => 'required',
            'special' => 'required',
            'work' => 'required',
            'salary' => 'required'
        ],$messages);
        //create new object of the model student and make mapping to the data
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;
         $x = $students->sis_statu;
         ++$x;
         $students->sis_statu = $x;
         $SisterandBrothers = new SisterandBrother;
         $SisterandBrothers -> student_id = $request->student_id;
         $SisterandBrothers -> name = $request->name;
         $SisterandBrothers -> age = $request->age;
         $SisterandBrothers -> gender = $request->gender;
         $SisterandBrothers -> special = $request->special;
         $SisterandBrothers -> academicel = $request->academicel;
         $SisterandBrothers -> work = $request->work;
         $SisterandBrothers -> salary = $request->salary;
         //write to the data base
         $SisterandBrothers ->save();
         $students ->save();
         session()->flash('Add_sister',  'تم اضافة أخوة للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('student.show'));

    }

    public function index()
    {
       $bros['bros'] = SisterandBrother::select('id','name','student_id','updated_at','salary','work','academicel','special','gender','age')
       ->orderBy('id', 'DESC')
       ->get();

       //dd($payments['payments']);
       return view('Student.bros.bros')->with($bros);
    }

    public function show($id)
    {
      $bros = SisterandBrother::where('student_id', $id)->get();
       return view('Student.bros.bros', compact('bros'));
       //->with($bros);
    }

    public function messages_update()
    {
    return $messages_update = [
        'name.required' => 'لم يتم ادخال اسم  !!',
        'age.required' => 'لم يتم ادخال  العمر   !!',
        'gender.required' => 'لم يتم الجنس    !!',
        'academicel.required'  => 'لم يتم ادخال مرحلة دراسية  !!',
        'special.required'  => 'لم يتم ادخال الأختصتص  !!',
        'work.required'  => 'لم يتم ادخال العمل !!',
        'salary.required'  => 'لم يتم ادخال الراتب الشهري !!',



    ];
    }
    public function update(Request $request, SisterandBrother $sisterandBrother)
    {
        $messages = $this->messages_update();
        $this->validate($request, [
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'academicel' => 'required',
            'special' => 'required',
            'work' => 'required',
            'salary' => 'required'
        ],$messages);
        //create new object of the model student and make mapping to the data ::find($request->id);
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;
         $SisterandBrothers =  SisterandBrother::find($request->id);
         $SisterandBrothers -> name = $request->name;
         $SisterandBrothers -> age = $request->age;
         $SisterandBrothers -> gender = $request->gender;
         $SisterandBrothers -> special = $request->special;
         $SisterandBrothers -> academicel = $request->academicel;
         $SisterandBrothers -> work = $request->work;
         $SisterandBrothers -> salary = $request->salary;

         //write to the data base
         $SisterandBrothers ->save();
         session()->flash('Edit', 'تم تعديل تفاصيل الأخوة للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('Sister_and_Brother.show'));
    }

    public function destroy(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $students =  Student::find($request->student_id);
        $student_name = $students->student_name;
        $x = $students->sis_statu;
        --$x;
        $students->sis_statu = $x;
        SisterandBrother::find($request->id)->delete();
        $students->save();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف معلومات الأخوة للطالب  '. $student_name .' بنجاح ');
        return redirect(route('Sister_and_Brother.show'));
    }
}
