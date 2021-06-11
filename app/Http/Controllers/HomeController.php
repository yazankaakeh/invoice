<?php

namespace App\Http\Controllers;
use \App\models\Publics\HusbandandWife;
use App\models\Student\Student;
use App\models\Publics\Address;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $damas=HusbandandWife::where("husb_Orig_city","دمشق" )->count();
        $r_damas=HusbandandWife::where("husb_Orig_city","ريف دمشق" )->count();
        $alippo=HusbandandWife::where("husb_Orig_city","حلب" )->count();
        $homs=HusbandandWife::where("husb_Orig_city","حمص" )->count();
        $hama=HusbandandWife::where("husb_Orig_city","حماه" )->count();
        $draa=HusbandandWife::where("husb_Orig_city","درعا" )->count();
        $idlib=HusbandandWife::where("husb_Orig_city","ادلب" )->count();
        $soudaa=HusbandandWife::where("husb_Orig_city","سويداء" )->count();
        $der=HusbandandWife::where("husb_Orig_city","ديرالزور" )->count();
        $raqa=HusbandandWife::where("husb_Orig_city","الرقة" )->count();
        $hasaka=HusbandandWife::where("husb_Orig_city","الحسكة" )->count();
        $lat=HusbandandWife::where("husb_Orig_city","اللاذقية" )->count();
        $tartous=HusbandandWife::where("husb_Orig_city","طرطوس" )->count();
        $qon=HusbandandWife::where("husb_Orig_city","القنيطرة" )->count();

        $chartjs = app()->chartjs
        ->name('pieChartTest')
        ->type('pie')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['دمشق', 'ريف دمشق','حلب','حمص' ,'حماه' ,'درعا' ,'سويداء' ,'ديرالزور' ,'الرقة' ,'الحسكة' ,'الحسكة','اللاذقية','طرطوس','القنيطرة'])
        ->datasets([
            [
                'backgroundColor' => ['#E4FFF9', '#B5FBDD','#76FEC5','#45D090','#F2F2E5','#414042','#48CFAF','#00848C','#AEE8E4','#00DFC8','#004156','#00DFC8','#004156','#2398f'],
                'hoverBackgroundColor' => ['#E4FFF9', '#B5FBDD','#76FEC5' ,'#45D090','#F2F2E5','#414042','#48CFAF','#00848C','#AEE8E4','#00DFC8','#004156','#00DFC8','#004156','#2398f'],
            //    'data' => [20,10,5]
                'data' => [ $damas , $r_damas , $alippo , $homs , $hama , $draa , $idlib , $soudaa , $der, $raqa, $hasaka, $lat, $tartous, $qon]
            ]
        ])
        ->options([]);


        $damas_student=Student::where("county_are_from","دمشق" )->count();
        $r_damas_student=Student::where("county_are_from","ريف دمشق" )->count();
        $alippo_student=Student::where("county_are_from","حلب" )->count();
        $homs_student=Student::where("county_are_from","حمص" )->count();
        $hama_student=Student::where("county_are_from","حماه" )->count();
        $draa_student=Student::where("county_are_from","درعا" )->count();
        $idlib_student=Student::where("county_are_from","ادلب" )->count();
        $soudaa_student=Student::where("county_are_from","سويداء" )->count();
        $der_student=Student::where("county_are_from","ديرالزور" )->count();
        $raqa_student=Student::where("county_are_from","الرقة" )->count();
        $hasaka_student=Student::where("county_are_from","الحسكة" )->count();
        $lat_student=Student::where("county_are_from","اللاذقية" )->count();
        $tartous_student=Student::where("county_are_from","طرطوس" )->count();
        $qon_student=Student::where("county_are_from","القنيطرة" )->count();

        $chartjs1 = app()->chartjs
        ->name('pieChart_student')
        ->type('pie')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['دمشق', 'ريف دمشق','حلب','حمص' ,'حماه' ,'درعا' ,'ادلب','سويداء' ,'ديرالزور' ,'الرقة'  ,'الحسكة','اللاذقية','طرطوس','القنيطرة'])
        ->datasets([
            [
                'backgroundColor' => ['#E4FFF9', '#B5FBDD','#76FEC5','#45D090','#F2F2E5','#414042','#48CFAF','#00848C','#AEE8E4','#00DFC8','#004156','#00DFC8','#004156','#2398f'],
                'hoverBackgroundColor' => ['#E4FFF9', '#B5FBDD','#76FEC5' ,'#45D090','#F2F2E5','#414042','#48CFAF','#00848C','#AEE8E4','#00DFC8','#004156','#00DFC8','#004156','#2398f'],
               // 'data' => [20,10,5]
                'data' => [ $damas_student , $r_damas_student , $alippo_student , $homs_student , $hama_student , $draa_student , $idlib_student , $soudaa_student , $der_student, $raqa_student, $hasaka_student, $lat_student, $tartous_student, $qon_student]
            ]
        ])
        ->options([]);

        // $damas_student=Address::where("address_city","Adalar" )->count();
        // $r_damas_Address=Address::where("address_city","ريف دمشق" )->count();
        // $alippo_Address=Address::where("address_city","حلب" )->count();
        // $homs_Address=Address::where("address_city","حمص" )->count();
        // $hama_Address=Address::where("address_city","حماه" )->count();
        // $draa_Address=Address::where("address_city","درعا" )->count();
        // $idlib_Address=Address::where("address_city","ادلب" )->count();
        // $soudaa_Address=Address::where("address_city","سويداء" )->count();
        // $der_Address=Address::where("address_city","ديرالزور" )->count();
        // $raqa_Address=Address::where("address_city","الرقة" )->count();
        // $hasaka_Address=Address::where("address_city","الحسكة" )->count();
        // $lat_Address=Address::where("address_city","اللاذقية" )->count();
        // $tartous_Address=Address::where("address_city","طرطوس" )->count();
        // $qon_Address=Address::where("address_city","القنيطرة" )->count();

        // $chartjs2 = app()->chartjs
        // ->name('pieChart_student')
        // ->type('pie')
        // ->size(['width' => 400, 'height' => 200])
        // ->labels(['دمشق', 'ريف دمشق','حلب','حمص' ,'حماه' ,'درعا' ,'ادلب','سويداء' ,'ديرالزور' ,'الرقة'  ,'الحسكة','اللاذقية','طرطوس','القنيطرة'])
        // ->datasets([
        //     [
        //         'backgroundColor' => ['#E4FFF9', '#B5FBDD','#76FEC5','#45D090','#F2F2E5','#414042','#48CFAF','#00848C','#AEE8E4','#00DFC8','#004156','#00DFC8','#004156','#2398f'],
        //         'hoverBackgroundColor' => ['#E4FFF9', '#B5FBDD','#76FEC5' ,'#45D090','#F2F2E5','#414042','#48CFAF','#00848C','#AEE8E4','#00DFC8','#004156','#00DFC8','#004156','#2398f'],
        //        // 'data' => [20,10,5]
        //         'data' => [ $damas_student , $r_damas_student , $alippo_student , $homs_student , $hama_student , $draa_student , $idlib_student , $soudaa_student , $der_student, $raqa_student, $hasaka_student, $lat_student, $tartous_student, $qon_student]
        //     ]
        // ])
        // ->options([]);        

        return view('index', compact('chartjs','chartjs1'));
      //  return view('home');
    }
}
