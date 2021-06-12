<?php

namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Student\StudentController;
use App\models\Student\Student;
use App\models\Publics\hoobies;
use App\models\Publics\Children;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class HoobiesController extends Controller
{

    function __construct()
{
        $this->middleware('permission:هوايات الطفل العائلة', ['only' => ['index_hoobies']]);
        $this->middleware('permission:اضافة هوايات الطفل العائلة ', ['only' => ['store_hoobies']]);
        $this->middleware('permission:تعديل هوايات الطفل العائلة', ['only' => ['update_hoobies']]);
        $this->middleware('permission:حذف هوايات الطفل العائلة ', ['only' => ['destroy_hoobies']]);
        $this->middleware('permission:هوايات الطفل العائلة', ['only' => ['show_hoobies']]);

}
public function messages()
{
    return $messages = [
        'skills.required' => 'لم يتم ادخال معلومات المهارات !!',
        'language.required' => 'لم يتم ادخال معلومات اللغات المفضلة !!',
        'fav_active.required'=>'لم يتم ادخال معلومات المهارات والمواهب المفضلة !!',
    ];
}
    public function store_hoobies(Request $request){

        $messages = $this->messages();
            $this->validate($request,[
            'children_id'=>'required',
            'skills' => 'required',
            'language' => 'required',
            'fav_active' => 'required',
        ],$messages);
         //create new object of the model student and make mapping to the data
         $childs =  Children::find($request->children_id);
         $childs_name = $childs->childre_name;
         $x=1;
         $childs->hoobie_statu = $x;
         $hoobies = new hoobies;
         $hoobies ->children_id = $request->children_id;
         $hoobies -> skills = $request->skills;
         $hoobies -> language = $request->language;
         $hoobies -> fav_active = $request->fav_active;
         //write to the data base
         $childs->save();
         $hoobies ->save();
         session()->flash('Add_hoobies',  'تم اضافة معلومات المهارات للطفل  '. $childs_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('children.show.family'));
    }

    public function update_hoobies(Request $request)
    {
        $this->validate($request,[
            'children_id'=>'required',
            'skills' => 'required',
            'language' => 'required',
            'fav_active' => 'required',
         ]);
         //create new object of the model student and make mapping to the data
         $childs =  Children::find($request->children_id);
         $childs_name = $childs->childre_name;
         $hoobies =  hoobies::find($request->id);
         $hoobies ->children_id = $request->children_id;
         $hoobies -> skills = $request->skills;
         $hoobies -> language = $request->language;
         $hoobies -> fav_active = $request->fav_active;
         //write to the data base
         $hoobies ->save();
         session()->flash('Edit',  'تم تعديل معلومات المهارات للطفل  '. $childs_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('hoobie.show.family'));
    }

    public function destroy_hoobies(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $childs =  Children::find($request->children_id);
        $childs_name = $childs->childre_name;
        $x=0;
        $childs->hoobie_statu = $x;

        hoobies::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف معلومات القرآن الخاصة بالطفل  '. $childs_name .' بنجاح ');
        $childs->save();
        return redirect(route('hoobie.show.family'));
    }

    public function index_hoobies()
    {
       $hoobie ['hoobie'] = Hoobies::select('id','children_id','created_at','language','fav_active',
       'skills')
       ->orderBy('id', 'DESC')
       ->get();

       return view('Family.child.hoobies')->with($hoobie );
    }

    public function show_hoobies($id)
    {
      $hoobie  = hoobies::where('children_id', $id)->get();
      return view('Family.child.hoobies',compact('hoobie'));
    }

}