<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{

$permissions = [


        ' قسم الدخل المالي ',
        ' إضافة دفعة قسم الدخل المالي ',
        ' حذف الدفعة قسم الدخل المالي ',
        ' تعديل الدفعة قسم الدخل المالي ',

        ' مدفوعات بالدولار ',
        ' حذف مدفوعات بالدولار ',
        ' تعديل مدفوعات بالدولار ',
        ' اضافة مدفوعات بالدولار ',

        ' مدفوعات باليورو ',
        ' حذف مدفوعات باليورو ',
        ' تعديل مدفوعات باليورو ',
        ' اضافة مدفوعات باليورو ',

        ' مدفوعات بالتركي ',
        ' حذف مدفوعات بالتركي ',
        ' تعديل مدفوعات بالتركي ',
        ' اضافة مدفوعات بالتركي ',

        ///////////////////////// الطلاب ////////////////////////////
        ' قسم الطلاب ',
        ' إضافة الطلاب ',
        ' فورم تسجيل الطلاب ',
        ' حذف الطلاب ',
        ' تعديل الطلاب ',
        ' مدفوعات الطلاب ',

        ' عرض الولاية المتاحة الطلاب ',
        ' عرض الطلاب الجدد',
        ' عرض الطلاب المؤرشفة ',
        ' عرض الطلاب المؤجلين ',
        ' عرض الطلاب المرفوضين ',
        ' عرض حالةالطلاب ',

        ' إضافة دفعة بالدولار الطلاب ',
        ' إضافة دفعة بالتركي الطلاب ',
        ' إضافة دفعة باليورو الطلاب ',
        ' إضافة دفعة بالكرت البيم الطلاب ',

        ' مدفوعات بالدولار الطلاب ',
        ' مدفوعات بالتركي الطلاب ',
        ' مدفوعات باليورو الطلاب ',
        ' مدفوعات بالكرت البيم الطلاب ',

        ' تعديل دفعة بالدولار الطلاب ',
        ' حذف دفعة بالدولار الطلاب ',

        ' تعديل دفعة بالتركي الطلاب ',
        ' حذف دفعة بالتركي الطلاب ',

        ' تعديل دفعة باليورو الطلاب ',
        ' حذف دفعة باليورو الطلاب ',

        ' تعديل دفعة بالكرت البيم الطلاب ',
        ' حذف دفعة بالكرت البيم الطلاب ',

        ' قسم الأطفال الطلاب ',
        ' اضافة قسم الأطفال الطلاب ',
        ' تعديل قسم الأطفال الطلاب ',
        'حذف قسم الأطفال الطلاب ',

        ' اضافة الزوج والزوجة الطلاب ',
        ' قسم الزوج والزوجة الطلاب ',
        ' تعديل قسم الزوج والزوجة الطلاب ',
        'حذف قسم الزوج والزوجة الطلاب ',

        ' قسم  المنح المؤجلة ',
        ' تعديل قسم المنح المؤجلة ',
        'حذف قسم المنح المؤجلة',
        ' اضافة  المنح المؤجلة ',

        ' قسم الأخوة الطلاب ',
        ' اضافة الأخوة الطلاب ',
        ' تعديل قسم الأخوة الطلاب ',
        'حذف قسم الأخوة الطلاب ',

        ' اضافة الأب والأم الطلاب ',
        ' قسم الأب والأم الطلاب ',
        ' تعديل قسم الأب و الأم الطلاب ',
        'حذف قسم الأب و الأم الطلاب ',

        ' قسم الجامعة الطلاب ',
        ' اضافة الجامعة الطلاب ',
        ' تعديل قسم الجامعة الطلاب ',
        'حذف قسم الجامعة الطلاب ',

        ' اضافة المنح الدراسية الطلاب ',
        ' قسم المنح الدراسية الطلاب ',
        ' تعديل قسم المنح الدراسية الطلاب ',
        'حذف قسم المنح الدراسية الطلاب ',

        ' اضافة الحالة الصحية الطلاب ',
        ' قسم الحالة الصحية الطلاب ',
        ' تعديل قسم الحالة الصحية الطلاب ',
        'حذف قسم الحالة الصحية الطلاب ',

        ' قسم سكن الطلاب ',
        ' اضافة سكن الطلاب ',
        ' تعديل قسم سكن الطلاب ',
        'حذف قسم سكن الطلاب ',

        ' اضافة القرأن الطلاب ',
        ' قسم القرأن الطلاب ',
        ' تعديل قسم القرأن الطلاب ',
        'حذف قسم القرأن الطلاب ',

        ' اضافة العمل الطلاب ',
        ' قسم العمل الطلاب ',
        ' تعديل قسم العمل الطلاب ',
        'حذف قسم العمل الطلاب ',

        '  مدرسة لطفل الطلاب ',
        ' إضافة مدرسة لطفل الطلاب ',
        ' حذف مدرسة لطفل الطلاب ',
        ' تعديل مدرسة لطفل الطلاب ',


        /////////////////////////////////////////    العائلات     /////////////////////////////

        ' قسم العائلات ',
        ' اضافة العائلات ',
        ' فورم تسجيل العائلات ',
        ' حذف العائلات ',
        ' تعديل العائلات ',

        ' عرض العائلات الجدد',
        ' عرض العائلات المؤرشفة ',
        ' عرض العائلات المؤجلة ',
        ' عرض العائلات المرفوضة ',
        ' عرض حالة العائلات ',

        ' إضافة طالب العائلات ',
        '  طالب العائلات ',
        ' حذف طالب العائلات ',

        ' إضافة مريض العائلات ',
        ' حذف مريض العائلات ',
        '  مريض العائلات ',

        '  مدرسة لطفل العائلات ',
        ' إضافة مدرسة لطفل العائلات ',
        ' حذف مدرسة لطفل العائلات ',
        ' تعديل مدرسة لطفل العائلات ',

        ' إضافة دفعة بالدولار العائلات ',
        ' إضافة دفعة بالتركي العائلات ',
        ' إضافة دفعة باليورو العائلات ',
        ' إضافة دفعة بالكرت البيم العائلات ',

        ' مدفوعات بالدولار العائلات ',
        ' مدفوعات بالتركي العائلات ',
        ' مدفوعات باليورو العائلات ',
        ' مدفوعات بالكرت البيم العائلات ',

        ' تعديل دفعة بالدولار العائلات ',
        ' حذف دفعة بالدولار العائلات ',

        ' تعديل دفعة بالتركي العائلات ',
        ' حذف دفعة بالتركي العائلات ',

        ' تعديل دفعة باليورو العائلات ',
        ' حذف دفعة باليورو العائلات ',

        ' تعديل دفعة بالكرت البيم العائلات ',
        ' حذف دفعة بالكرت البيم العائلات ',

        ' قسم الأطفال العائلات ',
        ' إضافة قسم لطفل العائلات ',

        ' تعديل قسم الأطفال العائلات ',
        'حذف قسم الأطفال العائلات ',

        ' قسم الزوج والزوجة العائلات ',
        ' إضافة الزوج والزوجة العائلات ',

        ' تعديل قسم الزوج والزوجة العائلات ',
        'حذف قسم  الزوج والزوجة العائلات ',

        ' قسم السكن العائلات ',
        ' إضافة السكن العائلات ',

        ' تعديل قسم السكن العائلات ',
        'حذف قسم السكن العائلات ',

        ' قسم العمل العائلات ',
        ' إضافة العمل العائلات ',
        ' تعديل قسم العمل العائلات ',
        'حذف قسم العمل العائلات ',

        'هوايات الطفل العائلة',
        'تعديل هوايات الطفل العائلة',
        'حذف هوايات الطفل العائلة ',
        'اضافة هوايات الطفل العائلة ',

        'قرآن الطفل العائلة',
        'تعديل قرآن الطفل العائلة',
        'حذف قرآن الطفل العائلة ',
        'اضافة قرآن الطفل العائلة ',


        ///////////////////////////////// الطبي //////////////////////////////////////////

        ' قسم الطبي ',
        ' اضافة قسم الطبي ',
        ' فورم تسجيل الطبي ',
        ' حذف الطبي ',
        ' تعديل الطبي ',

        ' عرض الطبي الجدد',
        ' عرض الطبي المؤرشفة ',
        ' عرض الطبي المؤجلة ',
        ' عرض الطبي المرفوضة ',
        ' عرض حالة الطبي ',


        ' مدفوعات قسم الطبي ',
        ' إضافة دفعة بالدولار الطبي ',
        ' إضافة دفعة بالتركي الطبي ',
        ' إضافة دفعة باليورو الطبي ',
        ' إضافة دفعة بالكرت البيم الطبي ',

        ' مدفوعات بالدولار الطبي ',
        ' مدفوعات بالتركي الطبي ',
        ' مدفوعات باليورو الطبي ',
        ' مدفوعات بالكرت البيم الطبي ',

        ' تعديل دفعة بالدولار الطبي ',
        ' حذف دفعة بالدولار الطبي ',

        ' تعديل دفعة بالتركي الطبي ',
        ' حذف دفعة بالتركي الطبي ',

        ' تعديل دفعة باليورو الطبي ',
        ' حذف دفعة باليورو الطبي ',

        ' تعديل دفعة بالكرت البيم الطبي ',
        ' حذف دفعة بالكرت البيم الطبي ',

        ' قسم السكن الطبي ',
        ' إضافة السكن الطبي ',
        ' تعديل قسم السكن الطبي ',
        'حذف قسم السكن الطبي ',

        ' قسم العمل الطبي ',
        ' إضافة العمل الطبي ',
        ' تعديل قسم العمل الطبي ',
        'حذف قسم العمل الطبي ',

        ' قسم الأب والأم الطبي ',
        ' إضافة الأب والأم الطبي ',
        ' تعديل قسم الأب و الأم الطبي ',
        'حذف قسم الأب و الأم الطبي ',

        ' قسم الحالة الصحية الطبي ',
        ' إضافة الحالة الصحية الطبي ',
        ' تعديل قسم الحالة الصحية الطبي ',
        'حذف قسم الحالة الصحية الطبي ',

        'المستخدمين',
        'قائمة المستخدمين',
        'صلاحيات المستخدمين',
        'اضافة مستخدم',
        'تعديل مستخدم',
        'حذف مستخدم',

        'عرض صلاحية',
        'اضافة صلاحية',
        'تعديل صلاحية',
        'حذف صلاحية',

];


foreach ($permissions as $permission) {

Permission::create(['name' => $permission]);
}


}
}