
@extends('layouts.master2')
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('title')
تسجيل المرضى
@endsection
<style>
body{
    background-image:url('/assets/img/medical.jpg');
      background-position: center;
      background-size: cover;
}
</style>
@if($enable->medical_form != 2)  


@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="my-auto mb-0 content-title">قسم التسجيل  </h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">/ معلومات المرضى</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

				<div class="container" >
				<!-- row -->
				<div class="row" style="padding-top:75; " >
					<div class="col-lg-5 col-lg-5">
						<div class="card">
							<div class="card-body">
                                <form action="{{ route('medical.store') }}" method="POST">
								<div id="">
									<h3> المعلومات الشخصية.</h3>
									<section>
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
										<p class="mg-b-20">المعلومات الشخصية حول المريض !</p>
										<div class="card card-body pd-20 pd-md-40 border shadow-none">
											<div class="col-sm-12 col-sm-12">
												<label class="form-control-label">اسم المريض: <span class="tx-danger">*</span></label> 
                                                <input class="form-control" value="" id="medical_name" name="medical_name" placeholder="أكتب أسم المريض بالكامل" required="" type="text">
                                                <input class="form-control" value="register"  name="register" type="hidden">
											</div>
                                            <div class="col-sm-12 col-sm-12">
												<label class="form-control-label">عمر المريض: <span class="tx-danger">*</span></label> <input class="form-control" value="" id="medical_age" name="medical_age" placeholder="أكتب عمر المريض بأرقام" required="" type="text">
											</div>
                                            <div class="col-sm-12 col-sm-12 mg-t-20 mg-md-t-0">
                                                <p class="form-control-label">  الجنس: <span class="tx-danger">*</span></p><select class="form-control select2" name="gender" id="gender">
                                                <option label="test">
                                                    حدد من فضلك </option>
                                                <option value="ذكر" >
                                                ذكر
                                            </option>
                                            <option value="انثى" >
                                                انثى
                                              </option>
                                            </select>
											</div>
                                            <div class="col-sm-12 col-sm-12 mg-t-20 mg-md-t-0">
                                                <p class="form-control-label">  هل يوجد كملك: <span class="tx-danger">*</span></p><select class="form-control select2" name="medical_have_id" id="medical_have_id">
                                                <option label="test">
                                                    حدد من فضلك </option>
                                                <option value="يوجد" >
                                                    يوجد
                                            </option>
                                            <option value="لا يوجد" >
                                                لا يوجد
                                              </option>
                                            </select>
											</div>
                                            <div class="col-sm-12 col-sm-12 mg-t-20 mg-md-t-0">
                                                <p class="form-control-label"> الولاية: <span class="tx-danger">*</span></p><select class="form-control select2" name="medical_id_extr" id="medical_id_extr">
                                                    <option label="test">
                                                        حدد من فضلك  اسم ولاية </option>
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
											<div class="col-sm-12 col-sm-12 mg-t-20 mg-md-t-0">
												<label class="form-control-label"> رقم هاتف المريض : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="medical_number" name="medical_number" placeholder="أكنب رقم الهاتف بدءً من 05  " required="" type="text">
											</div>
                                            <div class="col-sm-12 col-sm-12 mg-t-20 mg-md-t-0">
												<label class="form-control-label"> يرجى كتابة أي ملاحظة في حال وجدة : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="note" name="note" placeholder="إكتب الملاحظات إن وجد " required="" type="text">
											</div>
                            @if (session()->has('Add'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
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
                                <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">تاكيد</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                </div>
                                </form>                                            
									</section>
                                                                                               
                                    

                                                        {{--  ملاحظة هامة لم يتم تعديل القسم الذي في الأسفل فقط تم أخفاءه      --}}

                                              {{--  Important note that the section in the down has not been modified, only it has been hidden  --}}
                                                                           

                                    {{--  معلومات حول عائلة الطالب  
                                    
									<h3>معلومات عائلية</h3>
									<section>
                                        <p>المعلومات حول العائلة للطالب.</p>
                                        {{--  Mother  part Begin 
                                        <div class="row row-sm">
										<div class="col-md-5 col-lg-4">            
											<label class="form-control-label"> أسم الأم: <span class="tx-danger">*</span></label> <input class="form-control" value="" id="mother_name" name="mother_name" placeholder="أكتب أسم الأم بالكامل" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
                                            <label for="exampleInputEmail">تاريخ ميلاد الأم <span class="tx-danger">*</span></label>
                                            <input type="date" class="form-control" id="mother_birth" name="mother_birth" placeholder="أكتب تاريخ ميلاد ">
                                            </div>
                                            <div class="col-md-5 col-lg-4">
                                                <label for="exampleInputEmail">من اي محافظة من سوريا؟ <span class="tx-danger">*</span></label>
                                                <select class="form-control" id="mother_origin" name="mother_origin" placeholder="">
                                                    <option label="test">
                                                        اختر المحافظة </option>
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
                                                <div class="col-md-5 col-lg-4">
                                                    <label for="exampleInputEmail">من اي مدينة؟ <span class="tx-danger">*</span></label>
                                                    <input type="text" class="form-control" id="mother_origin_city" name="mother_origin_city" placeholder=" أكتب أسم المدينة">
                                                </div>
                                                 <div class="col-md-5 col-lg-4">
                                                <label for="exampleInputEmail">المستوى التعليمي للأم: <span class="tx-danger">*</span></label>
                                                <select class="form-control" id="mother_academicel" name="mother_academicel" placeholder=" أكتب المستوى النعليمي للأم  ">
                                                  <option label="test">
                                                            اختر المستوى التعليمي </option>
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
                                                 <option value="دبلوم ">
                                                    دبلوم </option>
                                                 <option value="جامعي">
                                                    جامعي </option>
                                                <option value="مايجستير">
                                                    مايجستير </option>
                                                 <option value="ديكتورا">
                                                    ديكتورا </option>
                                                </select>
                                                </div>
                                                <div class="col-md-5 col-lg-4">
                                                <label for="exampleInputEmail">اختصاص دراسة الأم: <span class="tx-danger">*</span></label>
                                                <input type="text" class="form-control" id="mother_special" name="mother_special" placeholder=" أكتب أسم الأختصاص">
                                                </div>
                                                <div class="col-md-5 col-lg-4">
                                                <label for="exampleInputEmail">هل تعمل الأم؟ <span class="tx-danger">*</span></label>
                                                <select class="form-control select2" name="mother_is_work" id="mother_is_work" placeholder="هل الأم تعمل ام لا تعمل">
                                                    <option label="test">
                                                        أختر تعمل أو لاتعمل  </option>
                                                    <option value="تعمل" >
                                                    تعمل
                                                </option>
                                                <option value="لاتعمل" >
                                                    لاتعمل
                                                </option>
                                                </select>
                                                </div>
                                                <div class="col-md-5 col-lg-4">
                                                <label for="exampleInputEmail">العمل الحالي للأم: <span class="tx-danger">*</span></label>
                                                <input type="text" class="form-control" id="mother_now_work" name="mother_now_work" placeholder=" أكتب العمل الحالي للأم">
                                                </div>
                                                <div class="col-md-5 col-lg-4">
                                                <label for="exampleInputEmail">الراتب الشهري للأم: <span class="tx-danger">*</span></label>
                                                <input type="text" class="form-control" id="mother_salary" name="mother_salary" placeholder="  أكتب الراتب الشهري للأم ">
                                                </div>
                                                
                                               {{--  Mother  part End --}}
                                               
                                               {{--  Father Part Begin  
                                               
                                                <div class="col-md-5 col-lg-4">
                                               <label for="exampleInputEmail">اسم الأب: <span class="tx-danger">*</span></label>
                                               <input type="text" class="form-control" id="father_name" name="father_name" placeholder=" أكتب أسم الأب ">
                                               </div>
                                               <div class="col-md-5 col-lg-4">
                                               <label for="exampleInputEmail">تاريخ ميلاد الأب: <span class="tx-danger">*</span></label>
                                              <input type="date" class="form-control" id="father_birth" name="father_birth" placeholder=" أكتب تاريخ ميلاد الأب">
                                              </div>
                                              <div class="col-md-5 col-lg-4">
                                             <label for="exampleInputEmail">من اي محافظة من سوريا؟ <span class="tx-danger">*</span></label>
                                             <select class="form-control" id="father_origin" name="father_origin" placeholder=" أكتب أسم المحافظة ">
                                             <option label="test">
                                            اختر أسم المحافظة </option>
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
                                        <div class="col-md-5 col-lg-4">
                                            <label for="exampleInputEmail">من اي مدينة؟ <span class="tx-danger">*</span></label>
                                            <input type="text" class="form-control" id="father_origin_city" name="father_origin_city" placeholder=" أكتب أسم المدينة">
                                        </div>
                                        <div class="col-md-5 col-lg-4">
                                        <label for="exampleInputEmail">المستوى التعليمي للأب :<span class="tx-danger">*</span></label>
                                        <select class="form-control" id="father_academicel" name="father_academicel" placeholder=" أكتب المستوى التعليمي ">
                                            <option label="test">
                                                اختر المستورى التعليمي </option>
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
                                         <option value="دبلوم ">
                                            دبلوم </option>
                                         <option value="جامعي">
                                            جامعي </option>
                                        <option value="مايجستير">
                                            مايجستير </option>
                                         <option value="ديكتورا">
                                            ديكتورا </option>
                                        </select>
                                        </div>
        
                                        <div class="col-md-5 col-lg-4">
                                        <label for="exampleInputEmail">اختصاص دراسة الأب: <span class="tx-danger">*</span></label>
                                        <input type="text" class="form-control" id="father_special" name="father_special" placeholder=" أكتب أسم الأختصاص">
                                        </div>
        
                                        <div class="col-md-5 col-lg-4">
                                        <label for="exampleInputEmail">هل يعمل للأب؟ <span class="tx-danger">*</span></label>
                                        <select class="form-control select2" name="father_is_work" id="father_is_work" placeholder=" هل الأب يعمل ام لا يعمل  ">
                                            <option label="test">
                                              أختر يعمل أو لايعمل</option>
                                            <option value="يعمل" >
                                            يعمل
                                        </option>
                                        <option value="لايعمل" >
                                            لايعمل
                                        </option>
                                        </select>
                                        </div>
                                        <div class="col-md-5 col-lg-4">
                                        <label for="exampleInputEmail">العمل الحالي للأب: <span class="tx-danger">*</span></label>
                                        <input type="text" class="form-control" id="father_now_work" name="father_now_work" placeholder=" أكتب العمل الحالي للأب ">
                                        </div>
                                        <div class="col-md-5 col-lg-4">
                                        <label for="exampleInputEmail">الراتب الشهري للأب؟ <span class="tx-danger">*</span></label>
                                        <input type="text" class="form-control" id="father_salary" name="father_salary" placeholder=" أكتب الراتب الشهري ">
                                        </div>
                                        </div>
                                       <hr>
                                 {{--  Father part End  --}}
                                 
                                 {{--  sister and brother part Begin  
                                 <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
                                    <p class="mg-b-10">هل لديك أخوة وأخوات؟ <span class="tx-danger">*</span></p><select class="form-control select2" name="form_select" id="sist_broth" onchange="show2Div(this)">
                                        <option label="test">
                                        أختر يوجد او لايوجد</option>
                                        <option value="1" >
                                            يوجد
                                        </option>
                                        <option value="0" >
                                            لايوجد
                                        </option>
                                    </select>
                                </div>
                                <div  class="row row-sm"id="hidde_div" style="display:none;"> {{-- display:flex 
                                 <div class="col-md-5 col-lg-4">
                                    <label for="exampleInputEmail">الأسم بالكامل </label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder=" أكتب الأسم كامل">
                                    </div>
                                    <div class="col-md-5 col-lg-4">
                                    <label for="exampleInputEmail">العمر</label>
                                    <input type="text" class="form-control" id="age" name="age" placeholder=" العمر">
                                    </div>
                                    <div class="col-md-5 col-lg-4">
                                    <label for="exampleInputEmail">الجنس </label>
                                    <select type="text" class="form-control" id="gender" name="gender" >
                                        <option label="test">
                                            اختر نوع الجنس </option>
                                        <option value="ذكر" >
                                       ذكر
                                    </option>
                                    <option value="انثى" >
                                        انثى
                                    </option>
                                    </select>
                                    </div>
                                    <div class="col-md-5 col-lg-4">
                                    <label for="exampleInputEmail">المستوى الدراسي</label>
                                    <select class="form-control" id="academicel" name="academicel" placeholder="">
                                        <option label="test">
                                            اختر المستوى التعليمي  </option>
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
                                     <option value="دبلوم ">
                                        دبلوم </option>
                                     <option value="جامعي">
                                        جامعي </option>
                                    <option value="مايجستير">
                                        مايجستير </option>
                                     <option value="ديكتورا">
                                        ديكتورا </option>
                                    </select>
                                    </div>
                                    <div class="col-md-5 col-lg-4">
                                    <label for="exampleInputEmail">الأختصاص </label>
                                    <input type="text" class="form-control" id="special" name="special" placeholder=" أكتب الأختصاص">
                                    </div>
                                    <div class="col-md-5 col-lg-4">
                                    <label for="exampleInputEmail">ما هو نوع العمل </label>
                                    <input type="text" class="form-control" id="work" name="work" placeholder="أكتب أسم العمل">
                                    </div>
                                    <div class="col-md-5 col-lg-4">
                                    <label for="exampleInputEmail">كم الراتب </label>
                                    <input type="text" class="form-control" id="salary" name="salary" placeholder=" أكتب قيمة الراتب">
                                    </div>
                                </div>
                                <hr>
                                     {{--    sister and brother End --}}
                                     
                                     {{--    wife and has part Begin 
                                     
                                        <div class="col-md-5 col-lg-4">
                                            <p class="mg-b-10">هل انت متزوج/ة  </p><select class="form-control select2" name="form_select" id="wife_has" onchange="showDive22(this)">
                                                <option label="test">
                                                  بيانات الزوج او الزوجة</option>
                                                <option value="1" >
                                                    الزوجة
                                                </option>
                                                <option value="0" >
                                                    الزوج
                                                </option>
                                            </select>
                                        </div>
                                        {{--  wife Part  
                                    <hr>
                                    <div  class="row row-sm"id="hidden_div" style="display:none;"> {{-- display:flex  
                                    <div class="col-md-5 col-lg-4">
                                    <input type="hidden" name="student_id" id="student_id"  readonly>
                                    <label for="exampleInputEmail">اسم الزوجة: <span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" id="wife_name" name="wife_name" placeholder=" أكتب اسم الزوجة ">
                                    </div>
                                    
                                     <div class="col-md-5 col-lg-4">
                                    <label for="exampleInputEmail">تاريخ ميلاد الزوجة: <span class="tx-danger">*</span></label>
                                    <input type="date" class="form-control" id="wife_birth" name="wife_birth" placeholder=" أكتب تاريخ الميلاد">
                                    </div>
    
                                     <div class="col-md-5 col-lg-4">
                                    <label for="exampleInputEmail">من اي محافظة من سوريا؟ <span class="tx-danger">*</span></label>
                                    <select class="form-control" id="wife_city" name="wife_city" placeholder=" أكتب أسم المحافظة ">
                                      <option label="test">
                                                اختر اسم المحافظة </option>
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
    
                                    <div class="col-md-5 col-lg-4">
                                        <label for="exampleInputEmail">من اي مدينة؟ <span class="tx-danger">*</span></label>
                                        <input type="text" class="form-control" id="wife_district" name="wife_district" placeholder=" أكتب أسم المدينة ">
                                    </div>
                                   <div class="col-md-5 col-lg-4">{{-- it must be select options  
                                        <p class="mg-b-10">الحالة الاجتماعية للزوجة</p>
                                        <select class="form-control select2" name="wife_mar_stat" id="wife_mar_stat" placeholder=" أكتب الحالة الأجتماعية ">
                                            <option label="test">
                                                اختر الحالة الأجتماعية </option>
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
                                     <div class="col-md-5 col-lg-4">
                                    <label for="exampleInputEmail">المستوى التعليمي للزوجة</label>
                                    <select class="form-control" id="wife_academicel" name="wife_academicel" placeholder=" أكتب المستوى التعليمي  ">
                                        <option label="test">
                                            اختر المستوى التعليمي </option>
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
                                     <option value="دبلوم ">
                                        دبلوم </option>
                                     <option value="جامعي">
                                        جامعي </option>
                                    <option value="مايجستير">
                                        مايجستير </option>
                                     <option value="ديكتورا">
                                        ديكتورا </option>
                                    </select>
                                    </div>
    
                                    <div class="col-md-5 col-lg-4">
                                    <label for="exampleInputEmail">اختصاص دراسة الزوجة</label>
                                    <input type="text" class="form-control" id="wife_special" name="wife_special" placeholder="أكتب أسم الأختصاص">
                                    </div>
                                    <div class="col-md-5 col-lg-4">
                                    <label for="exampleInputEmail">هل تعمل الزوجة؟</label>
                                    <select class="form-control select2" name="wife_is_work" id="wife_is_work" placeholder=" هل الزوجة تعمل ام لاتعمل ">
                                   <option label="test">
                                                اختر تعمل او لاتعمل </option>
                                        <option value="تعمل" >
                                        تعمل
                                    </option>
                                    <option value="لاتعمل" >
                                        لاتعمل
                                    </option>
                                    </select>
                                    </div>
                                    <div class="col-md-5 col-lg-4">
                                    <label for="exampleInputEmail">العمل الحالي للزوجة: <span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" id="wife_now_work" name="wife_now_work" placeholder=" أكتب العمل الحالي ">
                                    </div>
                                    <div class="col-md-5 col-lg-4">
                                    <label for="exampleInputEmail">العمل السابق للزوجة: <span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" id="wife_Pre_work" name="wife_Pre_work" placeholder=" أكتب العمل السابق  ">
                                    </div>
                                   </div>

                                    {{--  Husband Part  
                                    
                                    <div  class="row row-sm"id="hidden1_div" style="display:none;"> {{-- display:flex  
                                    <div class="col-md-5 col-lg-4">
                                    <label for="exampleInputEmail">اسم الزوج: <span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" id="husb_name" name="husb_name" placeholder=" أكتب اسم الزوج ">
                                    </div>
                                     <div class="col-md-5 col-lg-4">
                                    <label for="exampleInputEmail">تاريخ ميلاد الزوج:<span class="tx-danger">*</span></label>
                                    <input type="date" class="form-control" id="husb_birth" name="husb_birth" placeholder=" أكتب تاريخ الميلاد">
                                    </div>
                                     <div class="col-md-5 col-lg-4">
                                    <label for="exampleInputEmail">من اي محافظة من سوريا؟ <span class="tx-danger">*</span></label>
                                    <select class="form-control" id="husb_Orig_city" name="husb_Orig_city" placeholder=" أكتب اسم محافظة ">
                                        <option label="test">
                                            اختر اسم المحافظة </option>
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
                                    <div class="col-md-5 col-lg-4">
                                        <label for="exampleInputEmail">من اي مدينة؟ <span class="tx-danger">*</span></label>
                                        <input type="text" class="form-control" id="husb_district" name="husb_district" placeholder=" أكتب اسم المدينة ">
                                    </div>
                                    <div class="col-md-5 col-lg-4">{{-- it must be select options  
                                        <p class="mg-b-10">الحالة الاجتماعية للزوج: <span class="tx-danger">*</span></p>
                                        <select class="form-control select2" name="husb_mar_stat" id="husb_mar_stat" placeholder=" أكتب الحالة الاجتماعية ">
                                            <option label="test">
                                                اختر الحالة الأجتماعية </option>
                                            <option value="معتقل" >
                                            معتقل
                                        </option>
                                        <option value="متوفي" >
                                            متوفي
                                        </option>
                                        <option value="مفقود" >
                                            مفقود
                                        </option>
                                        <option value="متزوج" >
                                            متزوج
                                        </option>
                                        </select>
                                    </div>
                                    <div class="col-md-5 col-lg-4">
                                    <label for="exampleInputEmail">المستوى التعليمي للزوج: <span class="tx-danger">*</span></label>
                                    <select class="form-control" id="husb_academicel" name="husb_academicel" placeholder=" أكتب المستوى التعليمي ">
                                       <option label="test">
                                                اختر المستوى التعليمي </option>
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
                                     <option value="دبلوم ">
                                        دبلوم </option>
                                     <option value="جامعي">
                                        جامعي </option>
                                    <option value="مايجستير">
                                        مايجستير </option>
                                     <option value="ديكتورا">
                                        ديكتورا </option>
                                    </select>
                                    </div>
    
                                    <div class="col-md-5 col-lg-4">
                                    <label for="exampleInputEmail">اختصاص دراسة الزوج :<span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" id="husb_special" name="husb_special" placeholder=" أكتب اسم اختصاص ">
                                    </div>
    
                                    <div class="col-md-5 col-lg-4">
                                    <label for="exampleInputEmail">هل تعمل الزوج؟ <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" name="husb_is_work" id="husb_is_work" placeholder=" هل الزوج يعمل ام لايعمل">
                                    <option label="test">
                                  اختر يعمل أو لايعمل </option>
                                        <option value="يعمل" >
                                        يعمل
                                    </option>
                                    <option value="لايعمل" >
                                        لايعمل
                                    </option>
                                    </select>
                                    </div>
    
                                    <div class="col-md-5 col-lg-4">
                                    <label for="exampleInputEmail">العمل الحالي للزوج: <span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" id="husb_now_work" name="husb_now_work" placeholder=" أكتب العمل الحالي ">
                                    </div>
    
                                    <div class="col-md-5 col-lg-4">
                                    <label for="exampleInputEmail">العمل السابق للزوج: <span class="tx-danger">*</span></label>
                                    <input type="text" class="form-control" id="husb_Pre_work" name="husb_Pre_work" placeholder=" أكتب العمل السابق ">
                                    </div>
                                    </div> 
                                    
                                           {{--  wife and has part End  --}}
                                           
                                           {{--  children  part Begin  
                                            
                                           <div class="col-md-5 col-lg-4">
                                            <p class="mg-b-10">هل يوجد أطفال؟ <span class="tx-danger">*</span></p><select class="form-control select2" name="form_select" id="child" onchange="show22Div(this)">
                                                <option label="test">
                                                   أدخل بيانات أطفال</option>
                                                <option value="1" >
                                                    يوجد
                                                </option>
                                                <option value="0" >
                                                    لايوجد
                                                </option>
                                            </select>
                                        </div>
                                        
                                        <div  class="row row-sm"id="hidde33_div" style="display:none;"> {{-- display:flex 
                                           <div class="col-md-5 col-lg-4">
                                            <input type="hidden" name="student_id" id="student_id" readonly>
                                            <label for="exampleInputEmail">اسم الطفل: <span class="tx-danger">*</span></label>
                                            <input type="text" class="form-control" id="childre_name" name="childre_name" placeholder=" أكتب أسم الطفل ">
                                            </div>
                                            <div class="col-md-5 col-lg-4">
                                            <label for="exampleInputEmail">العمر: <span class="tx-danger">*</span></label>
                                            <input type="number" class="form-control" id="childre_age" name="childre_age" placeholder=" أكتب  العمر بالرقم ">
                                            </div>
                                            <div class="col-md-5 col-lg-4">{{-- it must be select options  
                                                <p class="mg-b-10">الجنس:<span class="tx-danger">*</span></p>
                                                <select class="form-control select2" name="childre_gender" id="childre_gender" placeholder=" أكتب الجنس الطفل ">
                                                    <option label="test">
                                                        اختر نوع الجنس </option>
                                                    <option value="ذكر" >
                                                    ذكر
                                                </option>
                                                <option value="انثى" >
                                                    انثى
                                                </option>
                                                </select>
                                            </div>
                                            <div class="col-md-5 col-lg-4">
                                            <label for="exampleInputEmail">المرحلة الدراسية: <span class="tx-danger">*</span></label>
                                            <select type="text" class="form-control" id="childre_educa_leve" name="childre_educa_leve" placeholder=" أكتب المرحلة الدراسية ">
                                                <option label="test">
                                                    اختر المرحلة الدراسية </option>
                                                <option value=" الأمِّيِّ">
                                                    الأمِّيِّ </option>
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
                                             <option> value="دبلوم ">
                                                دبلوم </option>
                                             <option value="جامعي">
                                                جامعي </option>
                                            <option value="مايجستير">
                                                مايجستير </option>
                                             <option value="ديكتورا">
                                                ديكتورا </option>
                                            </select>
                                            </div>
                                             <div class="col-md-5 col-lg-4">
                                            <label for="exampleInputEmail"> رقم الصف الدراسي: <span class="tx-danger">*</span> </label>
                                            <input type="text" class="form-control" id="childre_class_number" name="childre_class_number" placeholder="  أكتب رقم الصف الدراسي ">
                                            </div>
                                            <div class="col-md-5 col-lg-4">{{-- it must be select options  
                                                <p class="mg-b-10">الهوية الشخصية من اي ولاية: <span class="tx-danger">*</span></p>
                                                <select class="form-control select2" name="childre_id_extr" id="childre_id_extr" placeholder=" أختر من اسم الولاية الصادرة منها الكملك ">
                                                    <option label="test">
                                                        اختر اسم ولاية </option>
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
                                             <div class="col-md-5 col-lg-4">{{-- it must be select options  
                                                <p class="mg-b-10">هل يعيشون معكم؟ <span class="tx-danger">*</span></p>
                                                <select class="form-control select2" name="childre_live_with" id="childre_live_with" placeholder=" هل الأطفال يعيشون معكم ">
                                               <option label="test">
                                                        أختر نعم او لا  </option>
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
                                         {{--  children  part End  --}}

                                 
                                                {{--  المعلومات الدراسية للطالب في الجامعة  

									<h3>المعلومات الدراسية</h3>
									<section>
                                        <p>المعلومات الدراسية للطالب في الجامعة.</p>
                                        <div class="row row-sm">
										<div class="col-md-5 col-lg-4">
											<label class="form-control-label"> أسم الجامعة : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="univer_location" name="univer_location" placeholder="أكتب أسم الجامعة " required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">مكان الجامعة : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="Univer_loca" name="Univer_loca" placeholder="أكتب موقع الجامعة في أي ولاية " required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label"> أختصاص الجامعي: <span class="tx-danger">*</span></label> <input class="form-control" value="" id="univer_special" name="univer_special" placeholder="أكتب الأختصاص الجامعي" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
                                            <label for="exampleInputEmail">السنة الدراسية الحالية: <span class="tx-danger">*</span> </label>
                                            <select type="text" class="form-control" id="Schoo_year" name="Schoo_year" >
                                                <option label="test">
                                                    اختر نوع السنة الدراسية </option>
                                                <option value="تحضيري" >
                                               تحضيري
                                            </option>
                                            <option value="سنة الأولى" >
                                                سنة الأولى
                                            </option><option value="سنة الثانية" >
                                                سنة الثانية
                                            </option><option value="سنة الثالثة" >
                                                سنة الثالثة
                                            </option><option value="سنة الرابعة" >
                                                سنة الرابعة
                                            </option>
                                            </select>
                                            </div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label"> المعدل الحالي : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="Current_rate" name="Current_rate" placeholder="أكتب المعدل الحالي" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">المعدل التراكمي : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="Cumulative_rate" name="Cumulative_rate" placeholder="أكتب المعدل التراكمي" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
                                            <label for="exampleInputEmail">اللغة الدراسية:  <span class="tx-danger">*</span></label>
                                            <select type="text" class="form-control" id="language_name" name="language_name">
                                                <option label="test">
                                                    اختر اللغة الدراسية </option>
                                                <option value="العربية" >
                                               العربية
                                            </option>
                                            <option value=" التركية" >
                                                التركية
                                            </option><option value="الأنكليزية " >
                                                 الأنكليزية
                                            </option>
                                            </select>
                                            </div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label"> المستوى الحالي للغة: <span class="tx-danger">*</span></label> <input class="form-control" value="" id="Current_level" name="Current_level" placeholder="أكتب المستوى الحالي للغة " required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">معدل المستوى الحالي للغة: <span class="tx-danger">*</span></label> <input class="form-control" value="" id="Curr_level_rate" name="Curr_level_rate" placeholder="أكتب معدل المستوى الحالي" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">معدل المستوى السابق للغة : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="Previ_level_rate" name="Previ_level_rate" placeholder="أكتب معدل المستوى السابق" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">طريقة قبول الجامعي: <span class="tx-danger">*</span></label> <input class="form-control" value="" id="Univer_Accept" name="Univer_Accept" placeholder="أكتب طريقة القبول الجامعي" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">معدل قبول الجامعي: <span class="tx-danger">*</span></label> <input class="form-control" value="" id="Accept_rate" name="Accept_rate" placeholder="أكتب معدل القبول الجامعي" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">الأفساط الجامعية : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="univer_Premiums" name="univer_Premiums" placeholder="أكتب قيمة الأقساط الجامعية بالسنة" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">ماهي مصاريف الجامعية  : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="univer_fees" name="univer_fees" placeholder="أكتب ماهي المصاريف الجامعية" required="" type="text">
										</div>
										<div class="col-md-5 col-lg-4">
											<label class="form-control-label">كم قيمة المصاريف الجامعية: <span class="tx-danger">*</span></label> <input class="form-control" value="" id="univer_fees_value" name="univer_fees_value" placeholder="أكتب ثيمة المصاريف الجامعية" required="" type="text">
										</div>
                                        </div>
                                        <hr>
                                    {{--  قسم الجامعة الثانية 
                                        <div class="col-md-5 col-lg-4">
                                            <p class="mg-b-10"> هل يوجد جامعة ثانية؟ <span class="tx-danger">*</span></p><select class="form-control select2" name="form_select" id="secend_un" onchange="showDiv(this)">
                                                      <option label="test">
                                                أختر  يوجد او لايوجد  </option>
                                                <option value="1" >
                                                    يوجد
                                                </option>
                                                <option value="0" >
                                                    لايوجد
                                                </option>
                                            </select>
                                        </div>
                                        <div  class="row row-sm"id="hidden3_div" style="display:none;"> {{-- display:flex  
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">اسم الجامعة الثانية: <span class="tx-danger">*</span></label> <input class="form-control" value="" id="Ano_univer_name" name="Ano_univer_name" placeholder="أكتب أسم الجامعة الثانية" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">الأختصاص الثاني: <span class="tx-danger">*</span></label> <input class="form-control" value="" id="Ano_univer_special" name="Ano_univer_special" placeholder="أكتب أسم الأختصتاص الثاني" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">طريقة القبول بالجامعة الثانية: <span class="tx-danger">*</span></label> <input class="form-control" value="" id="Ano_univer_Accept" name="Ano_univer_Accept" placeholder="أكتب طريقة القبول الجامعة الثانية" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">معدل القبول  للجامعة الثانية: <span class="tx-danger">*</span></label> <input class="form-control" value="" id="Ano_accept_rate" name="Ano_accept_rate" placeholder="أكتب معدل القبول بالجامعة الثانية" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
                                            <label for="exampleInputEmail">  السنة الدراسية بالجامعة الثانية: <span class="tx-danger">*</span>  </label>
                                            <select type="text" class="form-control" id="Ano_Schoo_year" name="Ano_Schoo_year">
                                                <option label="test">
                                                    اختر السنة الدراسية </option>
                                                <option value="تحضيري" >
                                               تحضيري
                                            </option>
                                            <option value="سنة الأولى" >
                                                سنة الأولى
                                            </option><option value="سنة الثانية" >
                                                سنة الثانية
                                            </option><option value="سنة الثالثة" >
                                                سنة الثالثة
                                            </option><option value="سنة الرابعة" >
                                                سنة الرابعة
                                            </option>
                                            </select>
                                            </div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">المعدل بالجامعة الثانية  : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="Ano_Current_rate" name="Ano_Current_rate" placeholder="أكتب المعدل بالجامعة الثانية" required="" type="text">
										</div>
                                        </div>
									    <hr>
                                        {{--  قسم المنحة الدراسية  

                                        <div class="col-md-5 col-lg-4">
                                            <p class="mg-b-10"> هل يوجد منحة  دراسية؟ <span class="tx-danger">*</span></p><select class="form-control select2" name="form_select" id="secend_un" onchange="showDivv3(this)">
                                               <option label="test">
                                                أختر  يوجد او لايوجد  </option>
                                                <option value="1" >
                                                    يوجد
                                                </option>
                                                <option value="0" >
                                                    لايوجد
                                                </option>
                                            </select>
                                        </div>
                                        <div  class="row row-sm"id="hidden3_div3" style="display:none;"> {{-- display:flex  
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">اسم المنحة  : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="scholar_name" name="scholar_name" placeholder="أكتب أسم المنحة" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label"> نوع المنحة: <span class="tx-danger">*</span></label> <input class="form-control" value="" id="scholar_type" name="scholar_type" placeholder="أكتب نوع المنحة" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label"> قيمة المنحة : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="scholar_value" name="scholar_value" placeholder="أكتب قيمة المنحة" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">مصدر المنحة أو الجهة المانحة: <span class="tx-danger">*</span></label> <input class="form-control" value="" id="scholar_source" name="scholar_source" placeholder="أكتب أسم مصدر المنحة او الجهة المانحة" required="" type="text">
										</div>
                                        </div>
                                        <hr>
                                        
                                        {{--  قسم القرأن الكريم  
                                        <div class="col-md-5 col-lg-4">
                                            <p class="mg-b-10"> هل تحفظ القرأن الكريم:: <span class="tx-danger">*</span></p><select class="form-control select2" name="form_select" id="secend_un" onchange="showDivv33(this)">
                                               <option label="test">
                                                أختر  يوجد او لايوجد  </option>
                                                <option value="1" >
                                                    يوجد
                                                </option>
                                                <option value="0" >
                                                    لايوجد
                                                </option>
                                            </select>
                                        </div>
                                        <div  class="row row-sm"id="hidden3_div33" style="display:none;"> {{-- display:flex  
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label"> عدد الأجزاء التي أتممت حفظها  : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="quran_parts" name="quran_parts" placeholder="أكتب عدد الأجزاء المحفوظة" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">  أسم الشيخ الذي درسك: <span class="tx-danger">*</span></label> <input class="form-control" value="" id="quran_teacher" name="quran_teacher" placeholder="أكتب أسم الشيخ " required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
                                            <p class="mg-b-10">هل لديك شهادة حفظ قرآن</p>
                                            <select class="form-control select2" name="quran_have_certif" id="quran_have_certif">
                                                <option label="test">
                                                      </option>
                                                <option value="نعم" >
                                                نعم
                                            </option>
                                            <option value="لا" >
                                                لا
                                            </option>
                                            </select>
                                            </div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">  مصدر الشهادة : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="quran_Certif_essuer" name="quran_Certif_essuer" placeholder="أكتب مصدر الشهادة" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
                                            <p class="mg-b-10">هل الشهادة معك؟ <span class="tx-danger">*</span></p>
                                            <select class="form-control select2" name="quran_with_Certif" id="quran_with_Certif" >
                                                <option label="test">
                                                      </option>
                                                <option value="نعم" >
                                                نعم
                                            </option>
                                            <option value="لا" >
                                                لا
                                            </option>
                                            </select>
                                            </div>
                                            
                                        </div>
                                        <hr>
									</section>
                                    {{--  university part End 
                                    
									<h3>معلومات السكن</h3>
									<section>
									<p>المعلومات حول مكان سكن الطالب .</p>
                                        <div class="row row-sm">
                                            <div class="col-md-5 col-lg-4">
                                                <p class="mg-b-10">نوع السكن: <span class="tx-danger">*</span></p>
                                                <select class="form-control select2" name="stud_type_housing" id="stud_type_housing">
                                                    <option label="test">
                                                        اختر نوع السكن  </option>
                                                    <option value="يورت" >
                                                    يورت
                                                </option> <option value="وقف" >
                                                    وقف
                                                </option>
                                                <option value="سكن جامعي" >
                                                    سكن جامعي
                                                </option>
                                                <option value=" غرفة في منزل" >
                                                    غرفة في منزل
                                                </option>
                                                <option value="تخت واحد" >
                                                    تخت واحد
                                                </option>
                                                </select>
                                            </div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">  كم مبلغ الآجار  : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="stud_rent_housing" name="stud_rent_housing" placeholder="أكتب كم مبلغ الأجار" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label"> الموقع : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="Is_food_free" name="Is_food_free" placeholder="أكتب الموقع" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label"> ماهي مصاريف السكن الطلابي: <span class="tx-danger">*</span></label> <input class="form-control" value="" id="stud_expen" name="stud_expen" placeholder="أكتب ماهي مصاريف السكن" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">قيمت مصاريف السكن  : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="stud_valu_expen" name="stud_valu_expen" placeholder="أكتب قيمة مصاريف السكن " required="" type="text">
										</div>
                                        </div>
									</section>
                                
                                    {{--  معلومات حول العمل للطالب  
                                    
									<h3>معلومات العمل</h3>
									<section>
										<p class="mg-b-20">معلومات عن أعمال الطالب أو العمل الحالي.</p>
										<div class="row row-sm">
                                            <div class="col-md-5 col-lg-4">
                                                <p class="mg-b-10">هل تعمل؟ <span class="tx-danger">*</span></p>
                                                <select class="form-control select2" name="job_have" id="job_have">
                                                <option value="نعم" >
                                                    نعم
                                                </option>
                                                <option value="لا" >
                                                    لا
                                                </option>
                                                </select>
                                            </div>
											<div class="col-md-5 col-lg-4">
												<label class="form-control-label">مكان العمل : <span class="tx-danger">*</span></label> <input class="form-control" id="job_place" name="job_place" placeholder="أكتب مكان العمل" required="" type="text">
											</div>
											<div class="col-md-5 col-lg-4">
												<label class="form-control-label"> الراتب الشهري: <span class="tx-danger">*</span></label> <input class="form-control" id="job_monthly_salary" name="job_monthly_salary" placeholder="أكتب ثيمة الراتب الشهري" required="" type="text">
											</div>
                                            <div class="col-md-5 col-lg-4">
                                                <p class="mg-b-10">هل لديك عمل سابق؟ <span class="tx-danger">*</span></p>
                                                <select class="form-control select2" name="job_last_have" id="job_last_have" >
                                                 <option label="test">
                                                      أختر نعم او لا </option>
                                                 <option value="نعم" >
                                                    نعم
                                                </option>
                                                <option value="لا" >
                                                    لا
                                                </option>
                                                </select>
                                             </div>
											<div class="col-md-5 col-lg-4">
												<label class="form-control-label">نوع عملك السابق؟  <span class="tx-danger">*</span></label> <input class="form-control" id="job_last_type" name="job_last_type" placeholder="أكتب أسم العمل السابق" required="" type="text">
											</div>
                                            <div class="col-md-5 col-lg-4">
												<label class="form-control-label">كم راتبك السابق بعملك السابق؟ <span class="tx-danger">*</span></label> <input class="form-control" id="job_last_salary" name="job_last_salary" placeholder="أكتب قيمة الراتب في العمل السابق" required="" type="text">
											</div>
										</div>
									</section>

                                      {{--  معلومات حول الحالة  الصحية للطالب  
                                    <h3>معلومات الحالة الصحية</h3>
									<section>
										<p class="mg-b-20">المعلومات حول الحالة الصحية للطالب! <span class="tx-danger">*</span></p>
                                        <div class="row row-sm">
                                        <div class="col-md-5 col-lg-4">{{-- it must be select options  
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
											<div class="col-md-5 col-lg-4">
												<label class="form-control-label">أسم المرض: <span class="tx-danger">*</span></label> <input class="form-control" id="disease_name" name="disease_name" placeholder="أكتب أسم المرض" required="" type="text">
											</div>
                                            <div class="col-md-5 col-lg-4">
												<label class="form-control-label">أسم الدكتور: <span class="tx-danger">*</span></label> <input class="form-control" id="dr_name" name="dr_name" placeholder="أكتب أسم الدكتور" required="" type="text">
											</div>
											<div class="col-md-5 col-lg-4">
												<label class="form-control-label">تكلفة العلاج: <span class="tx-danger">*</span></label> <input class="form-control" id="treat_cost" name="treat_cost" placeholder=" أكتب تكلفة العلاج" required="" type="text">
											</div>
                                            <div class="col-md-5 col-lg-4">
												<label class="form-control-label">نوع العلاج: <span class="tx-danger">*</span></label> <input class="form-control" id="treat_type" name="treat_type" placeholder="أكتب نوع العلاج" required="" type="text">
											</div>
                                            <div class="col-md-5 col-lg-4">
												<label class="form-control-label">مدة العلاج: <span class="tx-danger">*</span></label> <input class="form-control" id="treat_Duratio" name="treat_Duratio" placeholder="أكتب مدة العلاج" required="" type="text">
											</div>
                                            <div class="col-md-5 col-lg-4">
                                                <label for="exampleInputEmail">تاريخ بدء العلاج :<span class="tx-danger">*</span></label>
                                                <input type="date" class="form-control" id="date_accept" name="date_accept" placeholder=" أكتب تاريخ بدء العلاج">
                                                </div>
                                                <div class="col-md-5 col-lg-4">
                                                <label for="exampleInputEmail">تاريخ الانتهاء من العلاج :<span class="tx-danger">*</span></label>
                                                <input type="date" class="form-control" id="date_end" name="date_end" placeholder=" أكتب تاريخ الأنتهاء العلاج">
                                                </div>
                                            <div class="col-md-5 col-lg-4">
												<label class="form-control-label">هل تم تحويلك لطبيب آخر؟ مع ذكر الأسم إن وجد: <span class="tx-danger">*</span></label> <input class="form-control" id="Trans_to_doctor" name="Trans_to_doctor" placeholder="" required="" type="text">
											</div>
										</div>
									      </section>  --}}
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
@else
		<!-- Main-error-wrapper -->
		<div class="main-error-wrapper  page page-h ">

			<h2 style="font-size: 75px;">لقد تم إيقاف الرابط بشكل مؤقت</h2>
			<h2> يرجى المحاولة لاحقا وشكرا</h6>
		</div>
@endif  
