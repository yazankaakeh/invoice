<?php
?>

@extends('layouts.master2')
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('title')
تسجيل الطلاب
@endsection
<style>
body{
    background-image:url('/assets/img/student.jpg');
      background-position: center;
      background-size: cover;
}
.form-control-label{
    padding-top:20px;
}
</style>
@if($enable->student_form != 2)



@section('content')

				<div class="container" >
				<!-- row -->
				<div class="row" style="padding-top:75; " >
					<div class="col-lg-5">
						<div class="card">
							<div class="card-body">
                                <form action="{{ route('store.register') }}" method="post">
								<div id="">
									<h3> المعلومات الشخصية.</h3>
									<section>
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
										<p class="mg-b-20">يرجى إدخال المعلومات الشخصية الخاصة بك !</p>
										<div class="border shadow-none card card-body pd-20 pd-md-40">

											<div class="col-sm-12">
												<label class="form-control-label">الاسم الطالب بالكامل:
                                                <span class="tx-danger">*</span></label>
                                                <input class="form-control" value="" id="student_name" name="student_name" placeholder="أكتب اسم الطالب" required="" type="text">
                                                <input class="form-control" value="register"  name="register" type="hidden">
											</div>

                                            <div class="col-sm-12">
                                                <label class="form-control-label">تاريخ الميلاد : <span class="tx-danger">*</span> </label>
                                                <input type="date" class="form-control" id="birthday" name="birthday" placeholder="">
                                            </div>

											<div class="col-sm-12">
												<label class="form-control-label"> العمر : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="age" name="age" placeholder="أكتب العمر بأرقام" required="" type="text">
											</div>

                                            <div class="col-sm-12">
                                                <p class="form-control-label">  الجنس : <span class="tx-danger">*</span></p><select class="form-control select2" name="gender" id="gender">
                                                <option label="test">
                                                    حدد من فضلك نوع الجنس </option>
                                                <option value="ذكر" >
                                                ذكر
                                            </option>
                                            <option value="انثى" >
                                                انثى
                                              </option>
                                            </select>
											</div>

                                            <div class="col-sm-12">{{-- it must be select options  --}}
                                                <p class="form-control-label"> الحالة الأجتماعي :<span class="tx-danger">*</span>  </p>
                                                <select class="form-control select2" name="social_state" id="social_state" placeholder=" أكتب الحالة الأجتماعية ">
                                                <option label="test">
                                                          حدد من فضلك الحالة الأجتماعية   </option>
                                                <option value="متزوج/ة" >
                                                متزوج/ة
                                                </option>
                                                <option value="ارمل/ة" >
                                                    ارمل/ة
                                                </option>
                                                <option value="يتيم/ة" >
                                                    يتيم/ة
                                                </option>
                                                <option value="مطلق/ة" >
                                                    مطلق/ة
                                                </option>
                                                </select>
                                            </div>

											<div class="col-sm-12">
												<label class="form-control-label"> البريد الإلكتروني : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="email" name="email" placeholder="أكتب البريد الألكتروني" required="" type="text">
											</div>

											<div class="col-sm-12">
												<label class="form-control-label"> رقم الهاتف  : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="phone" name="phone" placeholder="أكتب رقم الهاتف بدءً من 05" required="" type="text">
											</div>

											<div class="col-sm-12">
                                                <p class="form-control-label"> من اي محافظة الأصل :<span class="tx-danger">*</span></p><select class="form-control select2" name="county_are_from" id="county_are_from">
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
											<div class="col-sm-12">
												<label class="form-control-label"> من اي مدينة: <span class="tx-danger">*</span></label> <input class="form-control" value="" id="city_name" name="city_name" placeholder="أكتب اسم المدينة أو اسم الحي " required="" type="text">
											</div>

                                            <div class="col-sm-12">
                                                <p class="form-control-label"> السكن الحال في اي الولاية: <span class="tx-danger">*</span></p><select class="form-control select2" name="stu_Cur_housing" id="stu_Cur_housing">
                                                <option label="test">
                                                    حدد من فضلك اسم الولاية </option>
                                                    @foreach($cities as $c)
                                                    <option value="{{$c->name}}">
                                                      {{$c->name}}
                                                      </option>
                                                    @endforeach

                                                </select>
                                            </div>

                                            <div class="col-sm-12">
                                                <p class="form-control-label">هل يوجد لديك كملك <span class="tx-danger">*</span></p><select class="form-control select2" name="Identity_type" id="Identity_type">
											    <option label="test">
                                                    حدد من فضلك نوع الهوية  </option>
                                                   <option value="كملك" >
                                                   كملك
                                               </option>
                                               <option value="اقامة سياحية" >
                                                   اقامة سياحية
                                               </option>
                                               <option value="اقامة دراسية" >
                                                   اقامة دراسية
                                               </option>
                                               <option value="لايوجد" >
                                                   لايوجد
                                               </option>
                                               </select>
                                            </div>

                                            <div class="col-sm-12">
                                                <p class="form-control-label">اسم الولاية <span class="tx-danger">*</span></p><select class="form-control select2" name="Id_stud_source" id="Id_stud_source">
                                                <option label="test">
                                                    حدد من فضلك اسم الولاية </option>
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
                                        <label class="form-control-label">تاريخ الدخول لتركيا : <span class="tx-danger">*</span> </label>
                                        <input type="date" class="form-control" id="entry_turkey" name="entry_turkey"  placeholder=" أكتب تاريخ الدخول الى تركيا ">
                                        </div>
                                          <div class="col-sm-12">
                                        <label class="form-control-label">اسم الجامعة: <span class="tx-danger">*</span>  </label>
                                        <input type="text" class="form-control" id="univer_name" name="univer_name" placeholder="   أكنب اسم الجامعة ">
                                        </div>
                                        <div class="col-sm-12">
                                        <label class="form-control-label">مكان الجامعة : <span class="tx-danger">*</span> </label>
                                        <input type="text" class="form-control" id="univer_location" name="univer_location" placeholder="   أكنب مكان الجامعة ">
                                        </div>
                                        <div class="col-sm-12">
                                        <label class="form-control-label">أختصاص الجامعي : <span class="tx-danger">*</span> </label>
                                        <input type="text" class="form-control" id="univer_special" name="univer_special" placeholder="   أكنب أسم أختصاص الجامعي ">
                                        </div>

                                        <div class="col-sm-12">
                                        <label class="form-control-label">السنة الدراسية الحالية : <span class="tx-danger">*</span>  </label>
                                        <select type="text" class="form-control" id="schoo_year" name="schoo_year" >
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
                                        <div class="col-sm-12">
                                        <label class="form-control-label">المعدل الحالي: <span class="tx-danger">*</span>  </label>
                                        <input type="text" class="form-control" id="current_rate" name="current_rate" placeholder="   أكنب لمعدل الحالي ">
                                        </div>
                                        {!! NoCaptcha::display() !!}
									</section>

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
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->

                        </div>
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
    function show99Div(select){
       if(select.value==1){
        document.getElementById('hidde99_div').style.display = "flex";
       } else{
        document.getElementById('hidde99_div').style.display = "none";
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
{!! NoCaptcha::renderJs() !!}
@endsection
@else
		<!-- Main-error-wrapper -->
		<div class="main-error-wrapper page page-h ">

			<h2 style="font-size: 75px;">لقد تم إيقاف الرابط بشكل مؤقت</h2>
			<h2> يرجى المحاولة لاحقا وشكرا</h6>
		</div>
@endif
