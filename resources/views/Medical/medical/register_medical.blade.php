
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
					<div class="col-lg-5">
						<div class="card">
							<div class="card-body">
                                <form action="{{ route('medical.register') }}" method="POST">
								<div id="">
									<h3> تسجيل الطبي.</h3>
									<section>
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <p class="mg-b-20">يرجى إدخال المعلومات الشخصية الخاصة بك !</p>
                                    <div class="border shadow-none card card-body pd-20 pd-md-40">
                                            <h3> المعلومات الشخصية.</h3>
											<div class="col-sm-12">
												<label class="form-control-label">اسم المريض: <span class="tx-danger">*</span></label>
                                                <input class="form-control" value="" id="medical_name" name="medical_name" placeholder="أكتب أسم المريض بالكامل" required="" type="text"required>
                                                <input class="form-control" value="register"  name="register" type="hidden">
											</div>
                                            <div class="col-sm-12">
												<label class="exampleInputEmail">عمر المريض: <span class="tx-danger">*</span></label> <input class="form-control" value="" id="medical_age" name="medical_age" placeholder="أكتب عمر المريض بأرقام" required="" type="text"required>
											</div>
                                            <div class="col-sm-12 mg-t-20 mg-md-t-0">
                                                <p class="exampleInputEmail">  الجنس: <span class="tx-danger">*</span></p><select class="form-control select2" name="gender" id="gender"required>
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
                                            <div class="col-sm-12 mg-t-20 mg-md-t-0">
                                                <label class="exampleInputEmail">الحالة الأجتماعية<span class="tx-danger">*</span></p></label>
                                                <select class="form-control" id="status" name="status"  placeholder=""required>
                                                    <option label="test">
                                                          </option>
                                                    <option value="متزوج/ة">
                                                        متزوج/ة</option>
                                                    <option value="	مطلق/ة">
                                                        مطلق/ة</option>
                                                     <option value="أعزب/ة">
                                                     أعزب/ة</option>
                                                     option value="أرمل/ة">
                                                     أرمل/ة</option>
                                                     <option value=" مطلق و متزوج/ة">
                                                        مطلق و متزوج/ة</option>
                                                     <option value=" أرمل و متزوج/ة">
                                                        أرمل و متزوج/ة</option>
                                                    </select>
                                                </div>
                                            <div class="col-sm-12 mg-t-20 mg-md-t-0">
                                            <label for="exampleInputEmail">من اي محافظة من سوريا؟<span class="tx-danger">*</span></p></label>
                                            <select class="form-control" id="Governorate" name="Governorate" placeholder=" أكتب اسم  محافظة "required>
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

                                   <div class="col-sm-12 mg-t-20 mg-md-t-0">
                                       <label for="exampleInputEmail">من اي مدينة؟<span class="tx-danger">*</span></p></label>
                                       <input type="text" class="form-control" id="city" name="city" placeholder=" أكتب اسم  المدينة أو الحي "required>
                                   </div>
                                            <div class="col-sm-12 mg-t-20 mg-md-t-0">
                                                <p class="exampleInputEmail">  هل يوجد كملك: <span class="tx-danger">*</span></p><select class="form-control select2" name="medical_have_id" id="medical_have_id"required>
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
                                            <div class="col-sm-12 mg-t-20 mg-md-t-0">
                                                <p class="exampleInputEmail"> الولاية: <span class="tx-danger">*</span></p><select class="form-control select2" name="medical_id_extr" id="medical_id_extr"required>
                                                    <option label="test">
                                                        حدد من فضلك
                                                      </option>
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
											<div class="col-sm-12 mg-t-20 mg-md-t-0">
												<label class="exampleInputEmail"> رقم هاتف المريض : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="medical_number" name="medical_number" placeholder="أكنب رقم الهاتف بدءً من 05  " required="" type="text">
											</div>
                                            {{-- medical_Statu --}}
                                             <div class="col-sm-12 mg-t-20 mg-md-t-0">
                                                <p class="exampleInputEmail">نوع المرض</p>
                                                <select class="form-control select2" name="disease_type" id="disease_type">
                                                    <option label="test">
                                                        حدد من فضلك
                                                      </option>
                                                    <option value="اصابة حرب" >
                                                    اصابة حرب
                                                </option>
                                                <option value="اصابة حادة" >
                                                    اصابة حادة
                                                </option>
                                                <option value="مرض مزمن" >
                                                    مرض مزمن
                                                </option>
                                                <option value=" أخرى" >
                                                    أخرى
                                                </option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 mg-t-20 mg-md-t-0">
                                            <label for="exampleInputEmail">اسم المرض</label>
                                            <input type="text" class="form-control" id="disease_name" name="disease_name" placeholder=" أكتب أسم المرض"required>
                                            </div>
                                             <div class="col-sm-12 mg-t-20 mg-md-t-0">
                                                <p class="exampleInputEmail">تقييم الحالة المرضية</p>
                                                <select class="form-control select2" name="medical_rate" id="medical_rate"required>
                                                  <option label="test">
                                                    حدد من فضلك
                                                  </option>
                                                 <option value="خطرة جدا" >
                                                خطرة جدا
                                                </option>
                                                <option value="خطرة" >
                                                خطرة
                                                </option>
                                                <option value="متوسطة" >
                                                متوسطة
                                                </option>
                                                <option value="عادية">
                                                عادية
                                                </option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 mg-t-20 mg-md-t-0">
                                            <label class="exampleInputEmail">اسم الدكتور</label>
                                            <input type="text" class="form-control" id="dr_name" name="dr_name" placeholder=" أكتب أسم الطبيب">
                                            </div>
                                            <div class="col-sm-12 mg-t-20 mg-md-t-0">
                                            <label class="exampleInputEmail">تكلفة العلاج</label>
                                            <input type="text" class="form-control" id="treat_cost" name="treat_cost" placeholder="أكتب تكلفة العلاج ">
                                            </div>
                                            <div class="col-sm-12 mg-t-20 mg-md-t-0">
                                            <label class="exampleInputEmail">نوع العلاج</label>
                                            <input type="text" class="form-control" id="treat_type" name="treat_type" placeholder=" أكتب نوع العلاج "required>
                                            </div>
                                            <div class="col-sm-12 mg-t-20 mg-md-t-0">
                                            <label class="exampleInputEmail">مدة العلاج</label>
                                            <input type="text" class="form-control" id="treat_Duratio" name="treat_Duratio" placeholder=" أكتب مدة العلاج"required>
                                            </div>
                                            <div class="col-sm-12 mg-t-20 mg-md-t-0">
                                            <label class="exampleInputEmail">تاريخ بدء العلاج</label>
                                            <input type="date" class="form-control" id="date_accept" name="date_accept" placeholder=" أكتب تاريخ بدء العلاج"required>
                                            </div>
                                            <div class="col-sm-12 mg-t-20 mg-md-t-0">
                                            <label class="exampleInputEmail">تاريخ الانتهاء من العلاج</label>
                                            <input type="date" class="form-control" id="date_end" name="date_end" placeholder=" أكتب تاريخ الأنتهاء العلاج"required>
                                            </div>
                                            <div class="col-sm-12 mg-t-20 mg-md-t-0">
                                            <label class="exampleInputEmail">هل تم تحويلك لطبيب آخر؟ مع ذكر الأسم إن وجد</label>
                                            <input type="text" class="form-control" id="Trans_to_doctor" name="Trans_to_doctor" placeholder=" أذكر أسم الطبيب ان وجد"required>
                                            </div>
                                            <div class="col-sm-12 mg-t-20 mg-md-t-0">
												<label class="exampleInputEmail"> يرجى كتابة أي ملاحظة في حال وجدة : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="note" name="note" placeholder="إكتب الملاحظات إن وجد " required="" type="text"required>
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
							</div>
                                <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">تاكيد</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                </div>
                                </form>
							</section>



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
		<div class="main-error-wrapper page page-h ">

			<h2 style="font-size: 75px;">لقد تم إيقاف الرابط بشكل مؤقت</h2>
			<h2> يرجى المحاولة لاحقا وشكرا</h6>
		</div>
@endif
