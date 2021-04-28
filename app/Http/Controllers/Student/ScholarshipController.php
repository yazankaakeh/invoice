<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Student\StudentController;
use App\models\Student\Student;
use App\models\Student\Scholarship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ScholarshipController extends Controller
{

    public function storestudent(Request $request){
            $this->validate($request,[
            'student_id'=>'required',
            'scholar_name' => 'required',
            'scholar_type' => 'required',
            'scholar_value' => 'required',
            'scholar_source' => 'required'
         ]);
         //create new object of the model student and make mapping to the data
         $students =  Student::find($request->student_id);
         $student_name = $students->student_name;
         $x=1;
         $students->scholarship_statu = $x;
         $scholarships = new Scholarship;
         $scholarships -> student_id = $request->student_id;
         $scholarships -> scholar_name = $request->scholar_name;
         $scholarships -> scholar_type = $request->scholar_type;
         $scholarships -> scholar_value = $request->scholar_value;
         $scholarships -> scholar_source = $request->scholar_source;
         //write to the data base
         $students->save();
         $scholarships ->save();
         session()->flash('Add_Scholarship',  'تم اضافة المنحة للطالب  '. $student_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('student.show'));


    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show($id){
      $Scholarships = Scholarship::where('student_id', $id)->get();
      return view('Student.Scholarship.Scholarship_show',compact('Scholarships'));
    }

    public function edit(Scholarship $scholarship)
    {
        //
    }

    public function update(Request $request, Scholarship $scholarship)
    {
        //
    }

    public function destroy(Scholarship $scholarship)
    {
        //
    }
}
