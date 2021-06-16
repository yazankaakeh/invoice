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
@if($enable->family_form != 2 )


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
									<h3> تسجيل العائلة.</h3>
									<section>
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
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
										<p class="mg-b-20">يرجى إدخال المعلومات الشخصية الخاصة بك !</p>
										<div class="border shadow-none card card-body pd-20 pd-md-40">
                                            <h3> المعلومات الشخصية.</h3>
                                             <div class="col-sm-12">
                                                 <label class="form-control-label"> اسم صاحب القيد: <span class="tx-danger">*</span></label>
                                                 <input class="form-control" value="" id="family_constraint" name="family_Constraint" placeholder="أكتب اسم صاحب القيد" required="" type="text"required>
                                                <input class="form-control" value="register"  name="register" type="hidden">
                                             </div>
                                             <div class="col-sm-12"> {{-- it must be select options  --}}
                                                 <p class="form-control-label">  الجنس: <span class="tx-danger">*</span></p>
                                                 <select class="form-control select2" name="gender" id="gender"required>
                                                    <option label="test">
                                                        حدد من فضلك  </option>
                                                 <option value="ذكر">
                                                     ذكر
                                                     </option>
                                                 <option value="انثى">
                                                     انثى
                                                      </option>
                                                 </select>
                                             </div>

                                            <div class="col-sm-12">
                                            <label class="exampleInputEmail">من اي محافظة من سوريا؟ : <span class="tx-danger">*</span></label>
                                            <select class="form-control" id="city" name="city" placeholder=" أكتب اسم المحافظة "required>
                                            <option label="test">
                                                حدد من فضلك   </option>
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
                                            <div class="col-sm-12">
                                                <label class="exampleInputEmail">من اي مدينةأو الحي؟</label>
                                                <input type="text" class="form-control" id="district" name="district" placeholder=" أكتب أسم المدينة أو الحي أو القرية ">
                                            </div>
                                             <div  class="col-sm-12">
                                                 <label class="form-control-label"> عدد أفراد العائلة : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="family_number_member" name="family_number_member" placeholder="أكتب عدد أفراد العائلة " required="" type="text"required>
                                             </div>
                                             <div class="col-sm-12">
                                                 <label class="form-control-label"> اسم المعيل الأول : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="family_breadwinner" name="family_breadwinner" placeholder="أكتب اسم المعيل الأول  " required="" type="text"required>
                                             </div>
                                             <div class="col-sm-12">
                                                 <label class="form-control-label">  عمل المعيل الأول : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="work_breadwinner" name="work_breadwinner" placeholder="أكتب عمل المعيل الثاني" required="" type="text"required>
                                             </div>
                                             <div class="col-sm-12">
                                                 <label class="form-control-label"> اسم المعيل الثاني : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="family_an_breadwinner" name="family_an_breadwinner" placeholder="أكتب اسم المعيل الثاني" required="" type="text"required>
                                             </div>
                                             <div class="col-sm-12">
                                                 <label class="form-control-label"> عمل المعيل الثاني : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="work_an_breadwinner" name="work_an_breadwinner" placeholder="أكتب عمل معيل الثاني " required="" type="text"required>
                                             </div>
                                             <div class="col-sm-12">
                                                 <label class="form-control-label"> الدخل الشهري من العمل للأسرة : <span class="tx-danger">*</span></label> <input class="form-control" value="" id="family_monthly_salary" name="family_monthly_salary" placeholder="أكتب الدخل الشهري للأسرة باليرة التركية  " required="" type="text"required>
                                             </div>
                                             <div class="col-sm-12"> {{-- it must be select options  --}}
                                                 <p class="form-control-label">   هل يوجد  مساعدات :<span class="tx-danger">*</span></p><select class="form-control select2" name="family_has_aid" id="family_aid"required>
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
                                            <div class="col-sm-12" id="family_what_aid">
                                            <label class="exampleInputEmail"> نوع المساعادات </label>
                                            <select class="form-control" id="family_what_aid" name="family_what_aid"
                                            onchange = "showDivs(this)">
                                            <option label="test">
                                                حدد من فضلك  </option>
                                            <option value="كرت هلال">
                                                كرت هلال</option>
                                            <option value="كرت زراعات">
                                            كرت زراعات</option>
                                            <option value="سلة غذائية">
                                                سلة غذائية</option>
                                            <option value="مساعدة مالية ">
                                                مساعدة مالية</option>
                                                <option value="أخرى">
                                                أخرى</option>
                                            </select>
                                            </div>

                                    <script type="text/javascript">
                                    function showDivs(select){
                                    if(select.value == 'أخرى'){
                                        document.getElementById('family_what_aid1').style.display = "block";
                                    } else{
                                        document.getElementById('family_what_aid1').style.display = "none";
                                    }

                                    }
                                    </script>

                                        <div class="form-group" style="display:none;" id="family_what_aid1" >
                                        <label class="exampleInputEmail"> نوع مساعادت الأخرى</label>
                                        <input type="text" class="form-control"  id="family_wha t_aid1" name="family_what_aid1" placeholder=" أكتب اسم أو نوع مساعدات الأخرى ">
                                        </div>


                                            <div class="col-sm-12">
                                            <label class="exampleInputEmail"> ماهي قيمة المساعدات : <span class="tx-danger">*</span></label>
                                            <input type="text" class="form-control" id="aid_value" name="aid_value"  placeholder=" أكنب أسم المدينة  "required>
                                            </div>
                                            <div class="col-sm-12">
                                            <label class="exampleInputEmail">المستوى التعليمي : <span class="tx-danger">*</span></label>
                                            <select class="form-control" id="academicel" name="academicel" placeholder=" أكتب المستوى التعليمي  "required>
                                            <option label="test">
                                                حدد من فضلك  </option>
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
                                                دوكتورا </option>
                                            </select>
                                            </div>
                                            <div class="col-sm-12">
                                            <label class="exampleInputEmail">العمل الحالي: <span class="tx-danger">*</span></label>
                                            <input type="text" class="form-control" id="now_work" name="now_work" placeholder=" أكتب العمل الحالي "required>
                                            </div>
                                            <div class="col-sm-12">
                                            <label class="exampleInputEmail">العمل السابق : <span class="tx-danger">*</span> </label>
                                            <input type="text" class="form-control" id="work" name="work" placeholder=" أكتب العمل السابق  ">
                                            </div>
                                             <div class="col-sm-12">
                                                 <label class="form-control-label"> رقم هاتف الأول: <span class="tx-danger">*</span></label> <input class="form-control" value="" id="phone" name="phone" placeholder="أكتب رقم الهاتف بدءً من 05 " required="" type="text"required>
                                             </div>
                                             <div class="col-sm-12">
                                                 <label class="form-control-label">رقم هاتف ثاني: <span class="tx-danger">*</span></label> <input class="form-control" value="" id="sec_phone" name="sec_phone" placeholder="أكتب  رقم الهاتف بدءً من 05 يجب أن لايكون مكرر  " required="" type="text"required>
                                             </div>
                                            </form>
                                            <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">تاكيد</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                            </div>

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
@endsection
@else
		<!-- Main-error-wrapper -->
		<div class="main-error-wrapper">

			<h2 style="font-size: 75px;">لقد تم إيقاف الرابط بشكل مؤقت</h2>
			<h2> يرجى المحاولة لاحقا وشكرا</h6>
		</div>
@endif
