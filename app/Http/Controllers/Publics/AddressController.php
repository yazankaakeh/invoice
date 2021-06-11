<?php

namespace App\Http\Controllers\Publics;

use App\models\Publics\Address;
use App\models\Family\Family;
use App\models\Medical\Medical;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;


class AddressController extends Controller
{


function __construct()
{

    $this->middleware('permission: قسم السكن العائلات ', ['only' => ['index']]);
    $this->middleware('permission: قسم السكن العائلات ', ['only' => ['show']]);
    $this->middleware('permission: إضافة السكن العائلات ', ['only' => ['store_family_address']]);
    $this->middleware('permission: تعديل قسم السكن العائلات ', ['only' => ['update']]);
    $this->middleware('permission:حذف قسم السكن العائلات ', ['only' => ['destroy']]);

    $this->middleware('permission: قسم السكن الطبي ', ['only' => ['index_medical']]);
    $this->middleware('permission: قسم السكن الطبي ', ['only' => ['show_medical']]);
    $this->middleware('permission: إضافة السكن الطبي ', ['only' => ['store_medical_address']]);
    $this->middleware('permission: تعديل قسم السكن الطبي ', ['only' => ['update_medical']]);
    $this->middleware('permission:حذف قسم السكن الطبي ', ['only' => ['destroy_medical']]);

}


////////////////////////////////////////////////// Family Start ////////////////////////////////

    public function index()
    {
       $address['address'] = Address::select('id','updated_at','family_id','address_country',
       'address_city','address_like_bill','address_last')
       ->orderBy('id', 'DESC')
       ->get();
       return view('family.address.address_family')->with($address);
    }
    public function messages_family_address()
    {
    return $messages_family_address = [
        'family_id.required' => '!!',
        'address_country.required' => 'لم يتم ادخال اسم المحافظة   !!',
        'address_city.required' => 'لم يتم ادخال اسم المديتة  !!',
        'address_like_bill.required' => 'لم يتم ادخال العنوان   !!',
        'address_last.required'  => 'لم يتم ادخال العنوان السابق   !!',


    ];
    }
    public  function store_family_address(Request $request)
    {

        $messages = $this->messages_family_address();
        $this->validate($request,[
            'family_id'=>'required',
            'address_country' => 'required',
            'address_like_bill' => 'required',
            'address_last' => 'required',

        ],$messages);
        //create new object of the model student and make mapping to the data
         $familys =  Family::find($request->family_id);
         $family_Constraint = $familys->family_Constraint;
         $x=1;
         $familys->residance_statu = $x;
         if($request->address_city1 != null)
         {
         $Address = new Address;
         $Address -> family_id = $request->family_id;
         $Address -> address_country = $request->address_country;
         $Address -> address_city = $request->address_city1;
         $Address -> address_like_bill = $request->address_like_bill;
         $Address -> address_last = $request->address_last;
         //write to the data base
         $familys->save();
         $Address ->save();
         session()->flash('Add_Address',  'تم اضافة معلومات العنوان للعائلة  '. $family_Constraint .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('family.show'));
        }elseif ($request->address_city1 == null) {
         $Address = new Address;
         $Address -> family_id = $request->family_id;
         $Address -> address_country = $request->address_country;
         $Address -> address_city = $request->address_city;
         $Address -> address_like_bill = $request->address_like_bill;
         $Address -> address_last = $request->address_last;
         //write to the data base
         $familys->save();
         $Address ->save();
         session()->flash('Add_Address',  'تم اضافة معلومات العنوان للعائلة  '. $family_Constraint .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('family.show'));            
        }
        
    }

    public function show( $id)
    {
      $address = Address::where('family_id', $id)->get();
      return view('family.address.address_family',compact('address'));
    }

    public function destroy(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $familys =  Family::find($request->family_id);
        $x=0;
        $familys->residance_statu = $x;
        $family_Constraint = $familys->family_Constraint;

        Address::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف معلومات السكن الخاصة بالعائلة  '. $family_Constraint .' بنجاح ');
        $familys->save();
        return redirect(route('address.show'));
    }
    public function messages_family_update()
    {
    return $messages_family_update = [
        'family_id.required' => '!!',
        'address_country.required' => 'لم يتم ادخال اسم المحافظة   !!',
        'address_city.required' => 'لم يتم ادخال اسم المديتة  !!',
        'address_like_bill.required' => 'لم يتم ادخال العنوان   !!',
        'address_last.required'  => 'لم يتم ادخال العنوان السابق   !!',


    ];
    }

    public function update(Request $request)
    {
        $messages = $this->messages_update();
        $this->validate($request,[
            'family_id'=>'required',
            'address_country' => 'required',
            'address_city' => 'required',
            'address_like_bill' => 'required',
            'address_last' => 'required',
        ],$messages);
        //create new object of the model student and make mapping to the data
         $familys =  Family::find($request->family_id);
         $family_Constraint = $familys->family_Constraint;

         $Address =  Address::find($request->id);
         $Address -> family_id = $request->family_id;
         $Address -> address_country = $request->address_country;
         $Address -> address_city = $request->address_city;
         $Address -> address_like_bill = $request->address_like_bill;
         $Address -> address_last = $request->address_last;
         ///////////////////////////////////////////
         //write to the data base
         $Address ->save();
         session()->flash('Edit',  'تم تعديل معلومات السكن للعائلة  '. $family_Constraint .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('address.show'));
    }

////////////////////////////////////////////////// Family end ////////////////////////////////


//////////////////////////////////////////////// Medical start ////////////////////////////////


    public function index_medical()
    {
       $address['address'] = Address::select('id','updated_at','medical_id','address_country',
       'address_city','address_like_bill','address_last')
       ->orderBy('id', 'DESC')
       ->get();
       //$address = Address::all();
       return view('medical.address.address_medical')->with($address);
    }
    public function messages_medical_update()
    {
    return $messages_medical_update = [
        'medical_id.required' => '!!',
        'address_country.required' => 'لم يتم ادخال اسم المحافظة   !!',
        'address_city.required' => 'لم يتم ادخال اسم المديتة  !!',
        'address_like_bill.required' => 'لم يتم ادخال العنوان   !!',
        'address_last.required'  => 'لم يتم ادخال العنوان السابق   !!',


    ];
    }
    public  function store_medical_address(Request $request)
    {
        $messages = $this->messages_medical_update();
        $this->validate($request,[
            'medical_id'=>'required',
            'address_country' => 'required',
            'address_city' => 'required',
            'address_like_bill' => 'required',
            'address_last' => 'required',
        ],$messages);

         //create new object of the model student and make mapping to the data
         $medicals =  Medical::find($request->medical_id);
         $medical_name = $medicals->medical_name;
         $x=1;
         $medicals->residance_statu = $x;
         $Address = new Address;
         $Address -> medical_id = $request->medical_id;
         $Address -> address_country = $request->address_country;
         $Address -> address_city = $request->address_city;
         $Address -> address_like_bill = $request->address_like_bill;
         $Address -> address_last = $request->address_last;
         //write to the data base
         $medicals->save();
         $Address ->save();
         session()->flash('Add_Address',  'تم اضافة معلومات العنوان للمريض  '. $medical_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('medical.show'));
    }
    public function messages_update_medical()
    {
    return $messages_update_medical = [
        'medical_id.required' => '!!',
        'address_country.required' => 'لم يتم ادخال اسم المحافظة   !!',
        'address_city.required' => 'لم يتم ادخال اسم المديتة  !!',
        'address_like_bill.required' => 'لم يتم ادخال العنوان   !!',
        'address_last.required'  => 'لم يتم ادخال العنوان السابق   !!',


    ];
    }
    public function update_medical(Request $request)
    {
        $messages = $this->messages_update_medical();
        $this->validate($request,[
            'medical_id'=>'required',
            'address_country' => 'required',
            'address_city' => 'required',
            'address_like_bill' => 'required',
            'address_last' => 'required',
        ],$messages);
        //create new object of the model student and make mapping to the data
         $medicals =  Medical::find($request->medical_id);
         $medical_name = $medicals->medical_name;

         $Address =  Address::find($request->id);
         $Address -> medical_id = $request->medical_id;
         $Address -> address_country = $request->address_country;
         $Address -> address_city = $request->address_city;
         $Address -> address_like_bill = $request->address_like_bill;
         $Address -> address_last = $request->address_last;
         ///////////////////////////////////////////
         //write to the data base
         $Address ->save();
         session()->flash('Edit',  'تم تعديل معلومات السكن للمريض  '. $medical_name .' بنجاح ');
         //redirect after adding and saving the data with success msg ->with('SuccessMsg', 'You Have added Student Successfully')
         return redirect(route('address.medical.show'));
    }

    public function show_medical( $id)
    {
      $address = Address::where('medical_id', $id)->get();
      return view('medical.address.address_medical',compact('address'));
    }

    public function destroy_medical(Request $request)
    {
        /* here we have sued the table students and searched about the id using the find and then delete the
        id using the id note: we have passed the id from the show using the route */
        $medicals =  Medical::find($request->medical_id);
        $x=0;
        $medicals->residance_statu = $x;
        $medical_name = $medicals->medical_name;

        Address::find($request->id)->delete();
        /*after delete the student by id we will redirect the to show and we will path deleting msg ->with('DeleteMsg', 'You Have Deleted the Student Successfully')*/
        session()->flash('Delete','تم حذف معلومات السكن الخاصة بالمريض  '. $medical_name .' بنجاح ');
        $medicals->save();
        return redirect(route('medical.show'));
    }


////////////////////////////////////////////////// Medical End ////////////////////////////////


}
