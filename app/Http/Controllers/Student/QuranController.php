<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Student\StudentController;
use App\models\Student\Student;
use App\models\Student\Quran;
use App\models\Publics\Children;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;


class QuranController extends Controller
{

    function __construct()
    {
    $this->middleware('permission: قسم القرأن الطلاب ', ['only' => ['index']]);
    $this->middleware('permission: قسم القرأن الطلاب ', ['only' => ['show']]);
    $this->middleware('permission: اضافة القرأن الطلاب ', ['only' => ['storestudent']]);
    $this->middleware('permission: تعديل قسم القرأن الطلاب ', ['only' => ['update']]);
    $this->middleware('permission:حذف قسم القرأن الطلاب ', ['only' => ['destroy']]);

    $this->middleware('permission:قرآن الطفل العائلة', ['only' => ['index_child']]);
    $this->middleware('permission:قرآن الطفل العائلة', ['only' => ['show_child']]);
    $this->middleware('permission:اضافة قرآن الطفل العائلة ', ['only' => ['store_child']]);
    $this->middleware('permission:تعديل قرآن الطفل العائلة', ['only' => ['update_child']]);
    $this->middleware('permission:حذف قرآن الطفل العائلة ', ['only' => ['destroy_child']]);

    }
    public function messages()
    {
        return $messages = [
        'student_id.required' => '',
        'quran_memorize.required' => 'لم يتم ادخال معلومات هل تحفظ القرأن المطلوبة !!',
        'quran_parts.required' => 'لم يتم ادخال معلومات عدد الأجزاء المطلوبة !!',
        'quran_teacher.required'=>'لم يتم ادخال معلومات أسم الشيخ المطلوبة !!',
        'quran_have_certif.required'=>'لم يتم ادخال معلومات  شهادة حفظ قرآن المطلوبة !!',
        'quran_Certif_essuer.required'=>'لم يتم ادخال معلومات مصدر الشهادة المطلوبة !!',
        'quran_with_Certif.unique'=>'لم يتم ادخال معلومات الشهادة معك المطلوبة !!',


        ];
    }
    public function storestudent(Request $request){

          $messages = $this->messages();
            $this->validate($request,[
            'student_id'=>'required',
            'quran_memorize' => 'required',
            'quran_parts' => 'required',
            'quran_teacher' => 'required',
            'quran_have_certif' => 'required',
            'quran_Certif_essuer' => 'required',
            'quran_with_Certif' => 'required'
        ],$messages);
         //create new object of the model student and make mapping to the data
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;
         $x=1;
         $students->quran_statu = $x;
         $quran = new Quran;
         $quran ->student_id = $request->student_id;
         $quran -> quran_memorize = $request->quran_memorize;
         $quran -> quran_parts = $request->quran_parts;
         $quran -> quran_teacher = $request->quran_teacher;
         $quran -> quran_have_certif = $request->quran_have_certif;
         $quran -> quran_Certif_essuer = $request->quran_Certif_essuer;
         $quran -> quran_with_Certif = $request->quran_with_Certif;
         //write to the data base
         $students->save();
         $quran ->save();
         session()->flash('Add_Quran',  'تم اضافة معلومات القرآن للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('student.show'));

    }

    public function index()
    {
       $qurans = Quran::all();
       return view('Student.quran.quran_show', compact('qurans'));//->with($qurans);
    }

    public function show($id)
    {
      $qurans = Quran::all();
      return view('Student.quran.quran_show' , compact('qurans'));
    }

    public function messages_update()
{
    return $messages_update = [
        'student_id.required' => '',
        'quran_memorize.required' => 'لم يتم ادخال معلومات هل تحفظ القرأن المطلوبة !!',
        'quran_parts.required' => 'لم يتم ادخال معلومات عدد الأجزاء المطلوبة !!',
        'quran_teacher.required'=>'لم يتم ادخال معلومات أسم الشيخ المطلوبة !!',
        'quran_have_certif.required'=>'لم يتم ادخال معلومات  شهادة حفظ قرآن المطلوبة !!',
        'quran_Certif_essuer.required'=>'لم يتم ادخال معلومات مصدر الشهادة المطلوبة !!',
        'quran_with_Certif.unique'=>'لم يتم ادخال معلومات الشهادة معك المطلوبة !!',


    ];
}
    public function update(Request $request)
    {
        $messages = $this->messages_update();
        $this->validate($request,[
            'student_id'=>'required',
            'quran_memorize' => 'required',
            'quran_parts' => 'required',
            'quran_teacher' => 'required',
            'quran_have_certif' => 'required',
            'quran_Certif_essuer' => 'required',
            'quran_with_Certif' => 'required'
        ],$messages);

         //create new object of the model student and make mapping to the data
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;
         $quran =  Quran::find($request->id);
         $quran ->student_id = $request->student_id;
         $quran -> quran_memorize = $request->quran_memorize;
         $quran -> quran_parts = $request->quran_parts;
         $quran -> quran_teacher = $request->quran_teacher;
         $quran -> quran_have_certif = $request->quran_have_certif;
         $quran -> quran_Certif_essuer = $request->quran_Certif_essuer;
         $quran -> quran_with_Certif = $request->quran_with_Certif;
         //write to the data base
         $quran ->save();
         session()->flash('Edit',  'تم تعديل معلومات القرآن للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('Quran.show'));
    }

    public function destroy(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $students =  Student::find($request->student_id);
        $x=0;
        $students->quran_statu = $x;
        $student_name = $students->student_name;



        Quran::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف معلومات القرآن الخاصة بالطالب  '. $student_name .' بنجاح ');
        $students->save();
        return redirect(route('Quran.show'));
    }
///////////////////////////////////////////////// child Start ////////////////////////

    public function store_child(Request $request){

          $messages = $this->messages();
            $this->validate($request,[
            'child_id'=>'required',
            'quran_memorize' => 'required',
            'quran_parts' => 'required',
            'quran_teacher' => 'required',
            'quran_have_certif' => 'required',
            'quran_Certif_essuer' => 'required',
            'quran_with_Certif' => 'required'
        ],$messages);
         //create new object of the model student and make mapping to the data
         $childs =  Children::find($request->child_id);
         $childs_name = $childs->childre_name;
         $x=1;
         $childs->quran_statu = $x;
         $quran = new Quran;
         $quran ->children_id = $request->child_id;
         $quran -> quran_memorize = $request->quran_memorize;
         $quran -> quran_parts = $request->quran_parts;
         $quran -> quran_teacher = $request->quran_teacher;
         $quran -> quran_have_certif = $request->quran_have_certif;
         $quran -> quran_Certif_essuer = $request->quran_Certif_essuer;
         $quran -> quran_with_Certif = $request->quran_with_Certif;
         //write to the data base
         $childs->save();
         $quran ->save();
         session()->flash('Add_Quran',  'تم اضافة معلومات القرآن للطفل  '. $childs_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('children.show.family'));
    }

    public function update_child(Request $request)
    {
        $this->validate($request,[
            'child_id'=>'required',
            'quran_memorize' => 'required',
            'quran_parts' => 'required',
            'quran_teacher' => 'required',
            'quran_have_certif' => 'required',
            'quran_Certif_essuer' => 'required',
            'quran_with_Certif' => 'required'
         ]);
         //create new object of the model student and make mapping to the data
         $childs =  Children::find($request->child_id);
         $childs_name = $childs->childre_name;
         $quran =  Quran::find($request->id);
         $quran ->children_id = $request->child_id;
         $quran -> quran_memorize = $request->quran_memorize;
         $quran -> quran_parts = $request->quran_parts;
         $quran -> quran_teacher = $request->quran_teacher;
         $quran -> quran_have_certif = $request->quran_have_certif;
         $quran -> quran_Certif_essuer = $request->quran_Certif_essuer;
         $quran -> quran_with_Certif = $request->quran_with_Certif;
         //write to the data base
         $quran ->save();
         session()->flash('Edit',  'تم تعديل معلومات القرآن للطفل  '. $childs_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('quran.show.family'));
    }

    public function destroy_child(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $childs =  Children::find($request->child_id);
        $childs_name = $childs->childre_name;
        $x=0;
        $childs->quran_statu = $x;

        Quran::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف معلومات القرآن الخاصة بالطفل  '. $childs_name .' بنجاح ');
        $childs->save();
        return redirect(route('quran.show.family'));
    }

    public function index_child()
    {
        $qurans['qurans'] = Quran::select('id','children_id','updated_at','quran_memorize','quran_parts',
       'quran_teacher','quran_have_certif','quran_Certif_essuer','quran_with_Certif')
       ->orderBy('id', 'DESC')
       ->get();

       return view('Family.child.quran_child')->with($qurans);
    }

    public function show_child($id)
    {
      $qurans = Quran::where('children_id', $id)->get();
      return view('Family.child.quran_child',compact('qurans'));
    }
///////////////////////////////////////////////// child Finish ////////////////////////

}