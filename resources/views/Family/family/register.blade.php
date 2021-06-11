<?php
?>

@extends('layouts.master2')
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('title')
تسجيل العائلات
@endsection
<style>
body{
    background-image:url('/assets/img/family.jpg');
      background-position: center;
      background-size: cover;
}
</style>
@if($enable->family_form != 2)


@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="my-auto mb-0 content-title">قسم التسجيل  </h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">/ معلومات العائلة</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

				<div class="container" >
				<!-- row -->
				<div class="row" style="padding-top:75; " >
					<div class="col-lg-5">
						<div class="card">
							<div class="card-body">
                                <form action="{{ route('family.new') }}" method="post">
								<div id="">
									<h3> المعلومات الشخصية.</h3>
									<section>
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
										<p class="mg-b-20">يرجى إدخال المعلومات الشخصية الخاصة بك !</p>
										<div class="border shadow-none card card-body pd-20 pd-md-40">
                                             <div class="col-sm-12">
                                                 <label class="form-control-label"> اسم صاحب القيد: <span class="tx-danger">*</span></label>
                                                 <input class="form-control" value="" id="family_constraint" name="family_Constraint" placeholder="أكتب اسم صاحب القيد" required="" type="text">
                                                <input class="form-control" value="register"  name="register" type="hidden">
                                             </div>
                                             <div class="col-sm-12"> {{-- it must be select options  --}}
                                                 <p class="form-control-label">  الجنس </p>
                                                 <select class="form-control select2" name="gender" id="gender">
                                                    <option label="test">
                                                    </option>
                                                 <option value="ذكر">
                                                     ذكر
                                                     </option>
                                                 <option value="انثى">
                                                     انثى
                                                      </option>
                                                 </select>
                                             </div>
                                            <div class="col-sm-12">
                                            <label for="exampleInputEmail">من اي محافظة من سوريا؟ : <span class="tx-danger">*</span></label>
                                            <select class="form-control" id="city" name="city" placeholder=" أكتب اسم المحافظة ">
                                            <option label="test">
                                                    </option>
                                                <option value="	دمشق">
                                                    دمشق</option>
                                                <option value="ريف دمشق">
                                                    ريف دمشق</option>
                                                <option value="	حلب ">
                                                    حلب</option>
                                                <option value="حمص">
                                                    حمص</option>
                                                <option value="حماه">
                                                    حماه</option>
                                                <option value="	درعا">
                                                    درعا</option>
                                                <option value="	ادلب">
                                                    ادلب</option>
                                                <option value="	سويداء">
                                                    سويداء</option>
                                                <option value="	ديرالزور">
                                                    دير الزور</option>
                                                <option value="	الرقة">
                                                    الرقة</option>
                                                <option value="الحسكة">
                                                    الحسكة</option>
                                                <option value="	اللاذقية">
                                                    اللاذقية</option>
                                                <option value="	طرطوس">
                                                    طرطوس</option>
                                                <option value="	القنيطرة">
                                                    القنيطرة</option>
                                                </select>
                                            </div>
                                             <div  class="col-sm-12">
                                                 <label class="form-control-label"> عدد أفراد العائلة : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="family_number_member" name="family_number_member" placeholder="أكتب عدد أفراد العائلة " required="" type="text">
                                             </div>
                                             <div class="col-sm-12">
                                                 <label class="form-control-label"> اسم المعيل الأول : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="family_breadwinner" name="family_breadwinner" placeholder="أكتب اسم المعيل الأول  " required="" type="text">
                                             </div>
                                             <div class="col-sm-12">
                                                 <label class="form-control-label">  عمل المعيل الأول : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="work_breadwinner" name="work_breadwinner" placeholder="أكتب عمل المعيل الثاني" required="" type="text">
                                             </div>
                                             <div class="col-sm-12">
                                                 <label class="form-control-label"> اسم المعيل الثاني : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="family_an_breadwinner" name="family_an_breadwinner" placeholder="أكتب اسم المعيل الثاني" required="" type="text">
                                             </div>
                                             <div class="col-sm-12">
                                                 <label class="form-control-label"> عمل المعيل الثاني : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="work_an_breadwinner" name="work_an_breadwinner" placeholder="أكتب عمل معيل الثاني " required="" type="text">
                                             </div>
                                             <div class="col-sm-12">
                                                 <label class="form-control-label"> الدخل الشهري من العمل للأسرة : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="family_monthly_salary" name="family_monthly_salary" placeholder="أكتب الدخل الشهري للأسرة باليرة التركية  " required="" type="text">
                                             </div>
                                             <div class="col-sm-12"> {{-- it must be select options  --}}
                                                 <p class="form-control-label">   هل يوجد  مساعدات :<span class="tx-danger">*</span></p><select class="form-control select2" name="family_has_aid" id="family_aid">
                                                 <option label="test">
                                                     حدد من فضلك
                                                     </option>
                                                 <option value="	يوجد">
                                                     يوجد
                                                     </option>
                                                 <option value=" لايوجد">
                                                     لايوجد
                                                      </option>
                                                 </select>
                                             </div>
                                             <div class="col-sm-12">
                                                 <label class="form-control-label">ماهي المساعدات : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="family_what_aid" name="family_what_aid" placeholder="أكتب ماهي المساعدات أو قيمتها " required="" type="text">
                                             </div>

                                            <div class="col-sm-12">
                                            <label for="exampleInputEmail"> ماهي قيمة المساعدات : <span class="tx-danger">*</span></label>
                                            <input type="text" class="form-control" id="aid_value" name="aid_value"  placeholder=" أكنب أسم المدينة  ">
                                            </div>
                                            <div class="col-sm-12">
                                            <label for="exampleInputEmail">المستوى التعليمي : <span class="tx-danger">*</span></label>
                                            <select class="form-control" id="academicel" name="academicel" placeholder=" أكتب المستوى التعليمي  ">
                                            <option label="test">
                                                    </option>
                                            <option value=" الأمِّيِّ">
                                                الأمِّيِّ </option>
                                            <option value="حضانة">
                                                حضانة </option>
                                            <option value="روضة">
                                                روضة </option>
                                            <option value="ابتدائي">
                                                ابتدائي </option>
                                            <option value="اعدادي">
                                                اعدادي </option>
                                            <option value="ثانوي">
                                                ثانوي </option>
                                            <option value="دبلوم عالي ">
                                                دبلوم عالي </option>
                                            <option value="جامعي">
                                                جامعي </option>
                                            <option value="ماجستير">
                                                مايجستير </option>
                                            <option value="دكتورا">
                                                ديكتورا </option>
                                            </select>
                                            </div>
                                            <div class="col-sm-12">
                                            <label for="exampleInputEmail">العمل الحالي: <span class="tx-danger">*</span></label>
                                            <input type="text" class="form-control" id="now_work" name="now_work" placeholder=" أكتب العمل الحالي ">
                                            </div>
                                            <div class="col-sm-12">
                                            <label for="exampleInputEmail">العمل السابق : <span class="tx-danger">*</span> </label>
                                            <input type="text" class="form-control" id="work" name="work" placeholder=" أكتب العمل السابق  ">
                                            </div>
                                             <div class="col-sm-12">
                                                 <label class="form-control-label"> رقم هاتف الأول: <span class="tx-danger">*</span></label> <input class="form-control" value="" id="phone" name="phone" placeholder="أكتب رقم الهاتف بدءً من 05 " required="" type="text">
                                             </div>
                                             <div class="col-sm-12">
                                                 <label class="form-control-label">رقم هاتف ثاني: <span class="tx-danger">*</span></label> <input class="form-control" value="" id="sec_phone" name="sec_phone" placeholder="أكتب  رقم الهاتف بدءً من 05 يجب أن لايكون مكرر  " required="" type="text">
                                             </div>
                                             <div class="col-sm-12">
                                                 <label class="form-control-label">أي ملاحظات: <span class="tx-danger">*</span></label> <input class="form-control" value="" id="note" name="note" placeholder="يرجى كتابة أي ملاحظة " required="" type="text">
                                             </div>
                                            </form>

                                            <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">تاكيد</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                            </div>

                            @if (session()->has('Add'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <br>
                            @endif

                            @if ($errors->any())
                            <div class="alert alert-danger mg-b-0" role="alert">
                                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                <ul>
                                @foreach ($errors->all() as $error)
                                <strong>ملاحظة!</strong> {{ $error }}
                                @endforeach
                                </ul>
                            </div>
                            @endif
                            </section>
                                    {{--  General info for registered family part 1 End   --}}

                                     {{-- Husband and wife info  family part 2  Begin--}}

                                     {{--  <h3>معلومات الزوج والزوجة. </h3>
                                     <section>
                                         <p>المعلومات حول الزوج والزوجة للعائلة.</p>

                                         {{--  wife  part Begin
                                         <div class="row row-sm">
                                         <div class="col-sm-12 ">
                                             <label class="form-control-label"> اسم الزوجة: <span class="tx-danger">*</span></label> <input class="form-control" value="" id="wife_name" name="wife_name" placeholder="أكتب اسم الزوجة  بالكامل" required="" type="text">
                                         </div>
                                         <div class="col-sm-12 ">
                                             <label for="exampleInputEmail">تاريخ ميلاد الزوجة :<span class="tx-danger">*</span></label>
                                             <input type="date" class="form-control" id="wife_birth" name="wife_birth" placeholder="أكتب تاريخ ميلاد الزوجة ">
                                             </div>
                                         <div class="col-sm-12 ">
                                         <label for="exampleInputEmail">من اي محافظة من سوريا؟ <span class="tx-danger">*</span></label>
                                         <select class="form-control" id="wife_city" name="wife_city" placeholder=" أكتب اسم المحافظة ">
                                       <option label="test">
                                         حدد من فضلك اسم المحافظة </option>
                                         <option value="	دمشق">
                                             دمشق</option>
                                         <option value="ريف دمشق">
                                             ريف دمشق</option>
                                         <option value="	حلب ">
                                             حلب</option>
                                         <option value="حمص">
                                             حمص</option>
                                         <option value="حماه">
                                             حماه</option>
                                         <option value="	درعا">
                                             درعا</option>
                                         <option value="	ادالب">
                                             ادلب</option>
                                         <option value="	سويداء">
                                             سويداء</option>
                                         <option value="	ديرالزور">
                                             دير الزور</option>
                                         <option value="	الرقة">
                                             الرقة</option>
                                         <option value="الحسكة">
                                             الحسكة</option>
                                         <option value="	اللاذقية">
                                             اللاذقية</option>
                                         <option value="	طرطوس">
                                             طرطوس</option>
                                         <option value="	القنيطرة">
                                             القنيطرة</option>
                                         </select>
                                     </div>

                                     <div class="col-sm-12 ">
                                         <label for="exampleInputEmail">من اي مدينة؟ <span class="tx-danger">*</span></label>
                                         <input type="text" class="form-control" id="wife_district" name="wife_district" placeholder=" أكتب اسم المدينة ">
                                     </div>
                                             <div class="col-sm-12 ">   {{-- it must be select options
                                                 <label for="exampleInputEmail">الحالة الأجتماعية للزوجة:<span class="tx-danger">*</span></label>
                                                 <select class="form-control" id="wife_mar_stat" name="wife_mar_stat" placeholder="">
                                                     <option label="test">
                                                         حدد من فضلك  الحالة الأجتماعية </option>
                                                     <option value="متزوجة" >
                                                     متزوجة
                                                 </option>
                                                 <option value="متوفية" >
                                                     متوفية
                                                 </option>
                                                 <option value="ارملة" >
                                                     ارملة
                                                 </option>
                                                 <option value="مطلقة" >
                                                     مطلقة
                                                 </option>
                                                 </select>
                                                 </div>
                                                 <div class="col-sm-12"> {{-- it must be select options
                                                 <label for="exampleInputEmail">المستوى التعليمي للزوجة: <span class="tx-danger">*</span></label>
                                                 <select class="form-control" id="wife_academicel" name="wife_academicel" placeholder=" أكتب المستوى النعليمي للزوجة  ">
                                                   <option label="test">
                                                             حدد من فضلك  المستوى التعليمي </option>
                                                     <option value=" الأمِّيِّ">
                                                         الأمِّيِّ </option>
                                                  <option value="حضانة">
                                                     حضانة </option>
                                                  <option value="روضة">
                                                     روضة </option>
                                                  <option value="ابتدائي">
                                                     ابتدائي </option>
                                                 <option value="اعدادي">
                                                     اعدادي </option>
                                                 <option value="ثانوي">
                                                     ثانوي </option>
                                                  <option value="دبلوم عالي ">
                                                     دبلوم عالي </option>
                                                  <option value="جامعي">
                                                     جامعي </option>
                                                 <option value="مايجستير">
                                                     مايجستير </option>
                                                  <option value="ديكتورا">
                                                     ديكتورا </option>
                                                 </select>
                                                 </div>
                                                 <div class="col-sm-12">
                                                     <label for="exampleInputEmail">اختصاص دراسة الزوجة: <span class="tx-danger">*</span></label>
                                                 <input type="text" class="form-control" id="wife_special" name="wife_special" placeholder=" أكتب اسم الأختصاص">
                                                 </div>
                                                 <div class="col-sm-12">
                                                     <label for="exampleInputEmail">هل تعمل الزوجة؟ <span class="tx-danger">*</span></label>
                                                 <select class="form-control select2" name="wife_is_work" id="wife_is_work" placeholder="هل الزوجة تعمل ام لا تعمل">
                                                     <option label="test">
                                                         حدد من فضلك تعمل أو لاتعمل  </option>
                                                     <option value="تعمل" >
                                                     تعمل
                                                 </option>
                                                 <option value="لاتعمل" >
                                                     لاتعمل
                                                 </option>
                                                 </select>
                                                 </div>
                                                 <div class="col-sm-12">
                                                     <label for="exampleInputEmail">العمل الحالي للزوجة: <span class="tx-danger">*</span></label>
                                                 <input type="text" class="form-control" id="wife_now_work" name="wife_now_work" placeholder=" أكتب العمل الحالي للزوجة">
                                                 </div>
                                                 <div class="col-sm-12">
                                                     <label for="exampleInputEmail">العمل السابق للزوجة: <span class="tx-danger">*</span></label>
                                                 <input type="text" class="form-control" id="wife_Pre_work" name="wife_Pre_work" placeholder="  أكتب العمل  السابق للزوجة ">
                                                 </div>
                                                </div>
                                                <hr>
                                                {{--  wife  part End  --}}

                                                {{--  Husband  part Begin

                                                <div class="row row-sm">
                                                    <div class="col-sm-12 ">
                                                        <label class="form-control-label"> اسم الزوج: <span class="tx-danger">*</span></label> <input class="form-control" value="" id="husb_name" name="husb_name" placeholder="أكتب اسم الزوج  بالكامل" required="" type="text">
                                                    </div>
                                                    <div class="col-sm-12 ">
                                                        <label for="exampleInputEmail">تاريخ ميلاد الزوج :<span class="tx-danger">*</span></label>
                                                        <input type="date" class="form-control" id="husb_birth" name="husb_birth" placeholder="أكتب تاريخ ميلاد للزوج ">
                                                        </div>
                                                    <div class="col-sm-12 ">
                                                    <label for="exampleInputEmail">من اي محافظة من سوريا؟ <span class="tx-danger">*</span></label>
                                                    <select class="form-control" id="husb_Orig_city" name="husb_Orig_city" placeholder=" أكتب اسم المحافظة ">
                                                  <option label="test">
                                                    حدد من فضلك اسم المحافظة </option>
                                                    <option value="	دمشق">
                                                        دمشق</option>
                                                    <option value="ريف دمشق">
                                                        ريف دمشق</option>
                                                    <option value="	حلب ">
                                                        حلب</option>
                                                    <option value="حمص">
                                                        حمص</option>
                                                    <option value="حماه">
                                                        حماه</option>
                                                    <option value="	درعا">
                                                        درعا</option>
                                                    <option value="	ادالب">
                                                        ادلب</option>
                                                    <option value="	سويداء">
                                                        سويداء</option>
                                                    <option value="	ديرالزور">
                                                        دير الزور</option>
                                                    <option value="	الرقة">
                                                        الرقة</option>
                                                    <option value="الحسكة">
                                                        الحسكة</option>
                                                    <option value="	اللاذقية">
                                                        اللاذقية</option>
                                                    <option value="	طرطوس">
                                                        طرطوس</option>
                                                    <option value="	القنيطرة">
                                                        القنيطرة</option>
                                                    </select>
                                                </div>

                                                <div class="col-sm-12 ">
                                                    <label for="exampleInputEmail">من اي مدينة؟ <span class="tx-danger">*</span></label>
                                                    <input type="text" class="form-control" id="husb_district" name="husb_district" placeholder=" أكتب اسم المدينة ">
                                                </div>
                                                        <div class="col-sm-12 ">   {{-- it must be select options
                                                            <label for="exampleInputEmail">الحالة الأجتماعية للزوج:<span class="tx-danger">*</span></label>
                                                            <select class="form-control" id="husb_mar_stat" name="husb_mar_stat" placeholder="">
                                                                <option label="test">
                                                                    حدد من فضلك  الحالة الأجتماعية </option>
                                                                <option value="متزوجة" >
                                                                متزوجة
                                                            </option>
                                                            <option value="متوفية" >
                                                                متوفية
                                                            </option>
                                                            <option value="ارملة" >
                                                                ارملة
                                                            </option>
                                                            <option value="مطلقة" >
                                                                مطلقة
                                                            </option>
                                                            </select>
                                                            </div>
                                                            <div class="col-sm-12"> {{-- it must be select options
                                                            <label for="exampleInputEmail">المستوى التعليمي للزوج: <span class="tx-danger">*</span></label>
                                                            <select class="form-control" id="husb_academicel" name="husb_academicel" placeholder=" أكتب المستوى النعليمي للزوج  ">
                                                              <option label="test">
                                                                        حدد من فضلك  المستوى التعليمي </option>
                                                                <option value=" الأمِّيِّ">
                                                                    الأمِّيِّ </option>
                                                             <option value="حضانة">
                                                                حضانة </option>
                                                             <option value="روضة">
                                                                روضة </option>
                                                             <option value="ابتدائي">
                                                                ابتدائي </option>
                                                            <option value="اعدادي">
                                                                اعدادي </option>
                                                            <option value="ثانوي">
                                                                ثانوي </option>
                                                             <option value="دبلوم عالي ">
                                                                دبلوم عالي </option>
                                                             <option value="جامعي">
                                                                جامعي </option>
                                                            <option value="مايجستير">
                                                                مايجستير </option>
                                                             <option value="ديكتورا">
                                                                ديكتورا </option>
                                                            </select>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label for="exampleInputEmail">اختصاص دراسة للزوج: <span class="tx-danger">*</span></label>
                                                            <input type="text" class="form-control" id="husb_special" name="husb_special" placeholder=" أكتب اسم الأختصاص">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label for="exampleInputEmail">هل يعمل للزوج؟ <span class="tx-danger">*</span></label>
                                                            <select class="form-control select2" name="husb_is_work" id="husb_is_work" placeholder="هل الزوج يعمل ام لا يعمل">
                                                                <option label="test">
                                                                    حدد من فضلك     </option>
                                                                <option value="يعمل" >
                                                                يعمل
                                                            </option>
                                                            <option value="لايعمل" >
                                                                لايعمل
                                                            </option>
                                                            </select>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label for="exampleInputEmail">العمل الحالي للزوج: <span class="tx-danger">*</span></label>
                                                            <input type="text" class="form-control" id="husb_now_work" name="husb_now_work" placeholder=" أكتب العمل الحالي للزوج">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label for="exampleInputEmail">العمل السابق للزوج: <span class="tx-danger">*</span></label>
                                                            <input type="text" class="form-control" id="husb_Pre_work" name="husb_Pre_work" placeholder="  أكتب العمل  السابق للزوج ">
                                                            </div>
                                                            </section>
                                                 {{--  Husband  part End  --}}

                                                  {{-- Husband and wife info  family part 2  End--}}

                                                {{--  Children's information for the family part 3 Begin

									<h3>معلومات الأطفال للعائلة. </h3>
									<section>
                                        <p class="mg-b-20">المعلومات  حول الاطفال للعائلة !</p>
                                        <div class="row row-sm">
										<div class="col-sm-12">
											<label class="form-control-label"> اسم الطفل : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="childre_name" name="childre_name" placeholder="أكتب اسم الطفل " required="" type="text">
										</div>
                                        <div class="col-sm-12">
											<label class="form-control-label"> العمر : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="childre_age" name="childre_age" placeholder="أكتب  العمر بالرقم" required="" type="text">
										</div>
                                        <div class="col-sm-12"> {{-- it must be select options

                                            <label for="exampleInputEmail">  الجنس: <span class="tx-danger">*</span> </label>
                                            <select type="text" class="form-control" id="childre_gender" name="childre_gender" >
                                                <option label="test">
                                                    حدد من فضلك  نوع الجنس  </option>
                                                <option value="ذكر" >
                                               ذكر
                                            </option>
                                            <option value=" انثى" >
                                                 انثى
                                            </option>
                                            </select>
                                            </div>
                                            <div class="col-sm-12"> {{-- it must be select options

                                                <label for="exampleInputEmail">  المرحلة الدراسية: <span class="tx-danger">*</span> </label>
                                                <select type="text" class="form-control" id="childre_educa_leve" name="childre_educa_leve" >
                                                    <option label="test">
                                                        حدد من فضلك المرحلة الدراسية </option>
                                                    <option value=" الأمِّيِّ">
                                                        الأمِّيِّ </option>
                                                 <option value="حضانة">
                                                    حضانة </option>
                                                 <option value="روضة">
                                                    روضة </option>
                                                 <option value="ابتدائي">
                                                    ابتدائي </option>
                                                <option value="اعدادي">
                                                    اعدادي </option>
                                                <option value="ثانوي">
                                                    ثانوي </option>
                                                 <option> value="دبلوم عالي ">
                                                    دبلوم عالي </option>
                                                 <option value="جامعي">
                                                    جامعي </option>
                                                <option value="مايجستير">
                                                    مايجستير </option>
                                                 <option value="ديكتورا">
                                                    ديكتورا </option>
                                                </select>
                                                </div>
                                        <div class="col-sm-12">
											<label class="form-control-label"> رقم الصف الدراسي : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="childre_class_number" name="childre_class_number" placeholder="أكتب رقم الصف الدراسي  " required="" type="text">
										</div>
                                        <div class="col-sm-12">
											<label class="form-control-label"> الهوية الشخصية من اي ولاية : <span class="tx-danger">*</span></label>
                                            <select class="form-control" value="" id="childre_id_extr" name="childre_id_extr" placeholder="" required="" type="text">
                                            <option label="test">
                                                حدد من فضلك اسم  ولاية </option>
                                            <option value="لايوجد كملك" >
                                             لايوجد كملك
                                            <option value="أضنة">
                                                أضنة</option>
                                            <option value="	أدي‌يمن">
                                                أدي‌يمن</option>
                                            <option value="	أفيون ‌قرةحصار">
                                                أفيون ‌قرةحصار</option>
                                            <option value="	أغري">
                                                أغري</option>
                                            <option value="	أماسيا">
                                                أماسيا</option>
                                            <option value="	أنقرة">
                                                أنقرة</option>
                                            <option value="	أنطاليا">
                                                أنطاليا</option>
                                            <option value="	أرتڤين">
                                                أرتڤين</option>
                                            <option value="	أيدين">
                                                أيدين</option>
                                            <option value="	بالكسير">
                                                بالكسير</option>
                                            <option value="	بيلجيك">
                                                بيلجيك</option>
                                            <option value="	بينگول">
                                                بينگول</option>
                                            <option value="	بيطليس">
                                                بيطليس</option>
                                            <option value="بولو">
                                                بولو</option>
                                            <option value="	بوردور">
                                                بوردور</option>
                                            <option value="	بورصة">
                                                بورصة</option>
                                            <option value="	چنق‌قلعه">
                                                چنق‌قلعه</option>
                                            <option value="	شانكيري">
                                                شانكيري</option>
                                            <option value="	چوروم">
                                                چوروم</option>
                                            <option value="	دنيزلي">
                                                دنيزلي</option>
                                            <option value="	ديار بكر">
                                                ديار بكر</option>
                                            <option value="	إدرنه">
                                                إدرنه</option>
                                            <option value="	الازيغ">
                                                الازيغ</option>
                                            <option value="إرزنجان">
                                                إرزنجان</option>
                                            <option value="	أرض‌ روم">
                                                أرض‌ روم</option>
                                            <option value="	إسكي‌ شهر">
                                                إسكي‌ شهير</option>
                                            <option value="	غازي‌عنتاپ">
                                                غازي‌عنتاپ</option>
                                            <option value="	گره‌سون">
                                                گره‌سون</option>
                                            <option value="	گوموش‌خانه">
                                                گوموش‌خانه</option>
                                            <option value="حكاري">
                                                حكاري</option>
                                            <option value="	هاتاي">
                                                هاتاي</option>
                                            <option value="	إسبرطة">
                                                إسبرطة</option>
                                            <option value="	مرسين">
                                                مرسين</option>
                                            <option value="	إسطنبول">
                                                إسطنبول</option>
                                            <option value="	إزمير">
                                                إزمير</option>
                                            <option value="	قارص">
                                                قارص</option>
                                            <option value="	كاستامونو">
                                                كاستامونو</option>
                                            <option value="	قيصري">
                                                قيصري</option>
                                            <option value="	كريك‌قلعه">
                                                كريك‌قلعه</option>
                                            <option value="	كيرشهر">
                                                كيرشهر</option>
                                            <option value="	خوجةإلي">
                                                خوجةإلي</option>
                                            <option value="قونيا">
                                                قونيا</option>
                                            <option value="	كوتاهيا">
                                                كوتاهيا</option>
                                            <option value="	ملاطيا">
                                                ملاطيا</option>
                                            <option value="	مانيسا">
                                                مانيسا</option>
                                            <option value="	كهرمان‌مرعش">
                                                كهرمان‌مرعش</option>
                                            <option value="	ماردين">
                                                ماردين</option>
                                            <option value="	موغلا">
                                                موغلا</option>
                                            <option value="	موش">
                                                موش</option>
                                            <option value="	نڤشهر">
                                                نڤشهر</option>
                                            <option value="	نيغدة">
                                                نيغدة</option>
                                            <option value="	أردو">
                                                أردو</option>
                                            <option value="	ريزه">
                                                ريزه</option>
                                            <option value="	ساكاريا">
                                                ساكاريا</option>
                                            <option value="سامسون">
                                                سامسون</option>
                                            <option value="سيرت">
                                                سيرت</option>
                                            <option value="سينوپ">
                                                سينوپ</option>
                                            <option value="	سيڤاس">
                                                سيڤاس</option>
                                            <option value="	تكيرداغ">
                                                تكيرداغ</option>
                                            <option value="توقاد">
                                                توقاد</option>
                                            <option value="	طرابزون">
                                                طرابزون</option>
                                            <option value="تونج‌ايلي">
                                                تونج‌ايلي</option>
                                            <option value="شانلي‌اورفا">
                                                شانلي‌اورفا</option>
                                            <option value="	عشاق">
                                                عشاق</option>
                                            <option value="	ڤان">
                                                ڤان</option>
                                            <option value="	يوزگات">
                                                يوزگات</option>
                                            <option value="	زونگولداك">
                                                زونگولداك</option>
                                            <option value="	أكساراي">
                                                أكساراي</option>
                                            <option value="بايبورت">
                                                بايبورت</option>
                                            <option value="	قرةمان">
                                                قرةمان</option>
                                            <option value="	قريق‌قلعه">
                                                قريق‌قلعه</option>
                                            <option value="	بطمان">
                                                بطمان</option>
                                            <option value="	شرناق">
                                                شرناق</option>
                                            <option value="	بارتين">
                                                بارتين</option>
                                            <option value="	أرض‌خان">
                                                أرض‌خان</option>
                                            <option value="	إغدير">
                                                إغدير</option>
                                            <option value="	يالوڤا">
                                                يالوڤا</option>
                                            <option value="	قرةبوك">
                                                قرةبوك</option>
                                            <option value="	كلس">
                                                كلس</option>
                                            <option value="	عثمانية">
                                                عثمانية</option>
                                            <option value="	دوزجه">
                                                دوزجه</option>
                                        </select>
                                    </div>
                                        <div class="col-sm-12">
                                            <label for="exampleInputEmail">هل الأطفال يعيشون معكم :  <span class="tx-danger">*</span></label>
                                            <select type="text" class="form-control" id="childre_live_with" name="childre_live_with">
                                                <option label="test">
                                                    حدد من فضلك نعم او لا  </option>
                                                <option value="لا" >
                                                لا
                                            </option>
                                            <option value="نعم" >
                                                نعم
                                            </option>
                                            </select>
                                        </div>
                                    </div>
									</section>
                                                {{--  Children's information for the family part 3 End  --}}

                                                {{--  info for Family housing info part 4 Begin
									<h3>معلومات السكن للعائلة .</h3>
									<section>
									<p>المعلومات حول مكان سكن العائلة .</p>
                                        <div class="row row-sm">
                                            <div class="col-sm-12">
                                                <p class="mg-b-10">اسم المحافظة الولاية: <span class="tx-danger">*</span></p>
                                                <select class="form-control select2" name="address_country" id="address_country">
                                                    <option label="test">
                                                        حدد من فضلك اسم  ولاية </option>
                                                    <option value="لايوجد كملك" >
                                                     لايوجد كملك
                                                    <option value="أضنة">
                                                        أضنة</option>
                                                    <option value="	أدي‌يمن">
                                                        أدي‌يمن</option>
                                                    <option value="	أفيون ‌قرةحصار">
                                                        أفيون ‌قرةحصار</option>
                                                    <option value="	أغري">
                                                        أغري</option>
                                                    <option value="	أماسيا">
                                                        أماسيا</option>
                                                    <option value="	أنقرة">
                                                        أنقرة</option>
                                                    <option value="	أنطاليا">
                                                        أنطاليا</option>
                                                    <option value="	أرتڤين">
                                                        أرتڤين</option>
                                                    <option value="	أيدين">
                                                        أيدين</option>
                                                    <option value="	بالكسير">
                                                        بالكسير</option>
                                                    <option value="	بيلجيك">
                                                        بيلجيك</option>
                                                    <option value="	بينگول">
                                                        بينگول</option>
                                                    <option value="	بيطليس">
                                                        بيطليس</option>
                                                    <option value="بولو">
                                                        بولو</option>
                                                    <option value="	بوردور">
                                                        بوردور</option>
                                                    <option value="	بورصة">
                                                        بورصة</option>
                                                    <option value="	چنق‌قلعه">
                                                        چنق‌قلعه</option>
                                                    <option value="	شانكيري">
                                                        شانكيري</option>
                                                    <option value="	چوروم">
                                                        چوروم</option>
                                                    <option value="	دنيزلي">
                                                        دنيزلي</option>
                                                    <option value="	ديار بكر">
                                                        ديار بكر</option>
                                                    <option value="	إدرنه">
                                                        إدرنه</option>
                                                    <option value="	الازيغ">
                                                        الازيغ</option>
                                                    <option value="إرزنجان">
                                                        إرزنجان</option>
                                                    <option value="	أرض‌ روم">
                                                        أرض‌ روم</option>
                                                    <option value="	إسكي‌ شهر">
                                                        إسكي‌ شهير</option>
                                                    <option value="	غازي‌عنتاپ">
                                                        غازي‌عنتاپ</option>
                                                    <option value="	گره‌سون">
                                                        گره‌سون</option>
                                                    <option value="	گوموش‌خانه">
                                                        گوموش‌خانه</option>
                                                    <option value="حكاري">
                                                        حكاري</option>
                                                    <option value="	هاتاي">
                                                        هاتاي</option>
                                                    <option value="	إسبرطة">
                                                        إسبرطة</option>
                                                    <option value="	مرسين">
                                                        مرسين</option>
                                                    <option value="	إسطنبول">
                                                        إسطنبول</option>
                                                    <option value="	إزمير">
                                                        إزمير</option>
                                                    <option value="	قارص">
                                                        قارص</option>
                                                    <option value="	كاستامونو">
                                                        كاستامونو</option>
                                                    <option value="	قيصري">
                                                        قيصري</option>
                                                    <option value="	كريك‌قلعه">
                                                        كريك‌قلعه</option>
                                                    <option value="	كيرشهر">
                                                        كيرشهر</option>
                                                    <option value="	خوجةإلي">
                                                        خوجةإلي</option>
                                                    <option value="قونيا">
                                                        قونيا</option>
                                                    <option value="	كوتاهيا">
                                                        كوتاهيا</option>
                                                    <option value="	ملاطيا">
                                                        ملاطيا</option>
                                                    <option value="	مانيسا">
                                                        مانيسا</option>
                                                    <option value="	كهرمان‌مرعش">
                                                        كهرمان‌مرعش</option>
                                                    <option value="	ماردين">
                                                        ماردين</option>
                                                    <option value="	موغلا">
                                                        موغلا</option>
                                                    <option value="	موش">
                                                        موش</option>
                                                    <option value="	نڤشهر">
                                                        نڤشهر</option>
                                                    <option value="	نيغدة">
                                                        نيغدة</option>
                                                    <option value="	أردو">
                                                        أردو</option>
                                                    <option value="	ريزه">
                                                        ريزه</option>
                                                    <option value="	ساكاريا">
                                                        ساكاريا</option>
                                                    <option value="سامسون">
                                                        سامسون</option>
                                                    <option value="سيرت">
                                                        سيرت</option>
                                                    <option value="سينوپ">
                                                        سينوپ</option>
                                                    <option value="	سيڤاس">
                                                        سيڤاس</option>
                                                    <option value="	تكيرداغ">
                                                        تكيرداغ</option>
                                                    <option value="توقاد">
                                                        توقاد</option>
                                                    <option value="	طرابزون">
                                                        طرابزون</option>
                                                    <option value="تونج‌ايلي">
                                                        تونج‌ايلي</option>
                                                    <option value="شانلي‌اورفا">
                                                        شانلي‌اورفا</option>
                                                    <option value="	عشاق">
                                                        عشاق</option>
                                                    <option value="	ڤان">
                                                        ڤان</option>
                                                    <option value="	يوزگات">
                                                        يوزگات</option>
                                                    <option value="	زونگولداك">
                                                        زونگولداك</option>
                                                    <option value="	أكساراي">
                                                        أكساراي</option>
                                                    <option value="بايبورت">
                                                        بايبورت</option>
                                                    <option value="	قرةمان">
                                                        قرةمان</option>
                                                    <option value="	قريق‌قلعه">
                                                        قريق‌قلعه</option>
                                                    <option value="	بطمان">
                                                        بطمان</option>
                                                    <option value="	شرناق">
                                                        شرناق</option>
                                                    <option value="	بارتين">
                                                        بارتين</option>
                                                    <option value="	أرض‌خان">
                                                        أرض‌خان</option>
                                                    <option value="	إغدير">
                                                        إغدير</option>
                                                    <option value="	يالوڤا">
                                                        يالوڤا</option>
                                                    <option value="	قرةبوك">
                                                        قرةبوك</option>
                                                    <option value="	كلس">
                                                        كلس</option>
                                                    <option value="	عثمانية">
                                                        عثمانية</option>
                                                    <option value="	دوزجه">
                                                        دوزجه</option>
                                                </select>
                                            </div>
                                        <div class="col-sm-12">
											<label class="form-control-label">اسم الحي: <span class="tx-danger">*</span></label> <input class="form-control" value="" id="address_city" name="address_city" placeholder="أكتب اسم الحي" required="" type="text">
										</div>
                                        <div class="col-sm-12">
											<label class="form-control-label"> العنوان كما في الفاتورة : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="address_like_bill" name="address_like_bill" placeholder="أكتب العنوان كما في الفاتورة" required="" type="text">
										</div>
                                        <div class="col-sm-12">
											<label class="form-control-label"> العنوان السابق: <span class="tx-danger">*</span></label> <input class="form-control" value="" id="address_last" name="address_last" placeholder="أكتب العنوان السابق " required="" type="text">
										</div>
                                        </div>
									</section>

                                              {{--  info for Family housing info part 4 End  --}}

                                      {{--  معلومات حول الحالة  الصحية للطالب
                                    <h3>معلومات الحالة الصحية</h3>
									<section>
										<p class="mg-b-20">المعلومات حول الحالة الصحية للطالب! <span class="tx-danger">*</span></p>
                                        <div class="row row-sm">
                                        <div class="col-sm-12">{{-- it must be select options
                                            <p class="mg-b-10">هل يوجد لديك اي أمراض: <span class="tx-danger">*</span></p>
                                            <select class="form-control select2" name="disease_type" id="disease_type">
                                                <option label="test">
                                                      </option>
                                                <option value="لايوجد" >
                                                لايوجد
                                            </option>
                                            <option value="اصابة حرب" >
                                                اصابة حرب
                                            </option>
                                            <option value="وباء" >
                                                وباء
                                            </option>
                                            <option value="مرض مزمن" >
                                                مرض مزمن
                                            </option>
                                            </select>
                                        </div>
											<div class="col-sm-12">
												<label class="form-control-label">اسم المرض: <span class="tx-danger">*</span></label> <input class="form-control" id="disease_name" name="disease_name" placeholder="أكتب اسم المرض" required="" type="text">
											</div>
                                            <div class="col-sm-12">
												<label class="form-control-label">اسم الدكتور: <span class="tx-danger">*</span></label> <input class="form-control" id="dr_name" name="dr_name" placeholder="أكتب اسم الدكتور" required="" type="text">
											</div>
											<div class="col-sm-12">
												<label class="form-control-label">تكلفة العلاج: <span class="tx-danger">*</span></label> <input class="form-control" id="treat_cost" name="treat_cost" placeholder=" أكتب تكلفة العلاج" required="" type="text">
											</div>
                                            <div class="col-sm-12">
												<label class="form-control-label">نوع العلاج: <span class="tx-danger">*</span></label> <input class="form-control" id="treat_type" name="treat_type" placeholder="أكتب نوع العلاج" required="" type="text">
											</div>
                                            <div class="col-sm-12">
												<label class="form-control-label">مدة العلاج: <span class="tx-danger">*</span></label> <input class="form-control" id="treat_Duratio" name="treat_Duratio" placeholder="أكتب مدة العلاج" required="" type="text">
											</div>
                                            <div class="col-sm-12">
                                                <label for="exampleInputEmail">تاريخ بدء العلاج :<span class="tx-danger">*</span></label>
                                                <input type="date" class="form-control" id="date_accept" name="date_accept" placeholder=" أكتب تاريخ بدء العلاج">
                                                </div>
                                                <div class="col-sm-12">
                                                <label for="exampleInputEmail">تاريخ الانتهاء من العلاج :<span class="tx-danger">*</span></label>
                                                <input type="date" class="form-control" id="date_end" name="date_end" placeholder=" أكتب تاريخ الأنتهاء العلاج">
                                                </div>
                                            <div class="col-sm-12">
												<label class="form-control-label">هل تم تحويلك لطبيب آخر؟ مع ذكر الاسم إن وجد: <span class="tx-danger">*</span></label> <input class="form-control" id="Trans_to_doctor" name="Trans_to_doctor" placeholder="" required="" type="text">
											</div>
										</div>
								    </section>   --}}
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
{{--  if code for sister and breother  --}}
<script type="text/javascript">
    function show2Div(select){
       if(select.value==1){
        document.getElementById('hidde_div').style.display = "flex";
       } else{
        document.getElementById('hidde_div').style.display = "none";
       }
    }
    </script>

{{--  if code for wife and hasb  --}}
    <script type="text/javascript">
        function showDive22(select){
           if(select.value==1){
            document.getElementById('hidden_div').style.display = "flex";
            document.getElementById('hidden1_div').style.display = "none";
           } else{
            document.getElementById('hidden_div').style.display = "none";
            document.getElementById('hidden1_div').style.display = "flex";

           }
        }
        </script>
        {{--  if code for  children --}}
<script type="text/javascript">
    function show22Div(select){
       if(select.value==1){
        document.getElementById('hidde33_div').style.display = "flex";
       } else{
        document.getElementById('hidde33_div').style.display = "none";
       }
    }
    </script>

    <script type="text/javascript">
        function showDiv(select){
           if(select.value==1){
            document.getElementById('hidden3_div').style.display = "flex";
           } else{
            document.getElementById('hidden3_div').style.display = "none";
           }
        }
        </script>
        {{--  if for  Scholarship --}}
        <script type="text/javascript">
            function showDivv3(select){
               if(select.value==1){
                document.getElementById('hidden3_div3').style.display = "flex";
               } else{
                document.getElementById('hidden3_div3').style.display = "none";
               }
            }
            </script>
               {{--  if for quran  --}}
            <script type="text/javascript">
                function showDivv33(select){
                   if(select.value==1){
                    document.getElementById('hidden3_div33').style.display = "flex";
                   } else{
                    document.getElementById('hidden3_div33').style.display = "none";
                   }
                }
                </script>

@section('js')
<!--Internal  Select2 js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Jquery.steps js -->
<script src="{{URL::asset('assets/plugins/jquery-steps/jquery.steps.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!--Internal  Form-wizard js -->
<script src="{{URL::asset('assets/js/form-wizard.js')}}"></script>
@endsection
@else
		<!-- Main-error-wrapper -->
		<div class="main-error-wrapper">

			<h2 style="font-size: 75px;">لقد تم إيقاف الرابط بشكل مؤقت</h2>
			<h2> يرجى المحاولة لاحقا وشكرا</h6>
		</div>
@endif
