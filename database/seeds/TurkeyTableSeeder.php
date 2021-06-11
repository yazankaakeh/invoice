<?php

use Illuminate\Database\Seeder;
use App\models\Publics\Turkey;

class TurkeyTableSeeder extends Seeder
{
    public function run()
    {
    $permissions = [
        "أنقرة",
        "سيواس",
        "ارضروم",
        "انطاليا",
        "وان",
        "شانلى أورفا",
        "قيصرية",
        "مرسين",
        "ديار بكر",
        "أفيون",
        "بالق أسير",
        "أضنة",
        "كارامان ",
        "يوركات",
        "أسكى شهر",
        "قسطمونى",
        "مانيسا",
        "جوروم",
        "موغلا",
        "ملاطية",
        "كوتاهيا",
        "ارزينجان",
        "أزمير",
        "دنيزلى",
        "أغرى",
        "بورصة",
        "بولو",
        "توكات",
        "جناكلى",
        "سامسون",
        "كارس ",
        "إلازغ",
        "ماردين",
        "قرة مان",
        "اسبرطة",
        "بيطليس",
        "جانقرى",
        "بينكل",
        "موس",
        "أق سراى",
        "أيطن",
        "حقارى ",
        "اديمان",
        "ارتوين",
        "تونجلى ",
        "نيدا",
        "شرناق ",
        "بوردور",
        "غارى عنتاب",
        "غيرسون",
        "قرشهر",
        "تكير طاغ ",
        "أدرنة",
        "كوموش خانة",
        "كريكلاريلى",
        "أوردو",
        "أماسيا",
        "خطاى",
        "أرض خانة",
        "سيرت ",
        "نوشهر",
        "اسطنبول",
        "اوشاك",
        "صقارية",
        "كيرك القلعة",
        "بتمان ",
        "طرابزون",
        "بيلة جك",
        "بايبورت ",
        "ريزه",
        "قوجة ايلى",
        "اوشاك",
        "زونغولداك",
        "إغدير",
        "عثمانية",
        "قرة بوك",
        "كيليس",
        "بارتين",
        "دورجة",
    ];
    foreach ($permissions as $permission) {
    Turkey::create(['name' => $permission]);
    }
    }
}