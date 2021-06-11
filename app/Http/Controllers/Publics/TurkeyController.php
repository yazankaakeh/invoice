<?php


namespace App\Http\Controllers\Publics;
use App\Http\Controllers\Student\StudentController;
use App\models\Student\Student;
use App\models\Publics\SisterandBrother;
use App\models\Payment\Income;
use Illuminate\Http\Request;
use App\models\Publics\Turkey;

use App\Http\Controllers\Controller;

class TurkeyController extends Controller
{
    public function edit(Request $request)
    {
     //   $cities = find($request->name);
    //  dd($request);
     foreach($request->id as $x){
        $cities = Turkey::find($x);
        $cities->show = 1;
        $cities->save();     
        // dd($cities);
     }
        //$cities = Turkey::all();
        $cities = Turkey::all();
        $payments = Income::select('value_bim')->distinct()->get();
        $students = Student::all();
        session()->flash('turkey', ' تم تعديل الولايات التركية');
        //dd($cities);
        $request= null;
        return back();
        return view('Student.students.saved_student',compact('students','payments','cities'));
    }     


}
