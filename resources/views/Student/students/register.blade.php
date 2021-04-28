<?php

$enable = 5985;
?>

@extends('layouts.master')
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('title')
تسجيل الطلاب
@endsection
@if($enable == 1)


@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Basic Wizard With Validation
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>
								<div id="wizard3">
									<h3>المعلومات الشخصية</h3>
									<section>
										<p class="mg-b-20">المعلومات الشخصية حول الطالب !</p>
										<div class="row row-sm">
											<div class="col-md-5 col-lg-4">
												<label class="form-control-label">الاسم كامل: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="name" name="name" placeholder="Enter firstname" required="" type="text">
											</div>
											<div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">العمر: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="age" name="age" placeholder="Enter lastname" required="" type="text">
											</div>

									<div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
										<p class="mg-b-10">الحالة الاجتماعية</p><select class="form-control select2" name="form_select" id="test" onchange="showDiv(this)">
											<option label="test">
											</option>
											<option value="1" >
												متزوج
											</option>
											<option value="0" >
												اعزب
											</option>
										</select>
									</div>
                                         <div  class="row row-sm"id="hidden_div" style="display:none;"> {{-- display:flex  --}}
                                            <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">اسم الزوجة : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="wife_name" name="wife_name" placeholder="Enter lastname" required="" type="text">
											</div>
											<div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label"> هل الزوجة تدرس حالياً : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="wife_stud" name="wife_stud" placeholder="Enter lastname" required="" type="text">
											</div>
											<div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label"> هل دراستها مجانية  : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="wife_stud_free" name="wife_stud_free" placeholder="Enter lastname" required="" type="text">
											</div>
											<div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">ماذا تدرس الزوجة حالياً : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="wife_stud_type" name="wife_stud_type" placeholder="Enter lastname" required="" type="text">
											</div>
											<div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">هل الزوجة تعمل حالياً : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="wife_work" name="wife_work" placeholder="Enter lastname" required="" type="text">
											</div>
											<div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">ماذا تعمل الزوجة حالياً كم الراتب : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="wife_salay" name="wife_salay" placeholder="Enter lastname" required="" type="text">
											</div>
											<div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">هل لديك اطفال : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="have_child" name="have_child" placeholder="Enter lastname" required="" type="text">
											</div>
											<div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">اسماءهم مع أعمارهم بالسنوات  : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="child_name" name="child_name" placeholder="Enter lastname" required="" type="text">
											</div>
											<div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">هل يدرسون  : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="child_stud" name="child_stud" placeholder="Enter lastname" required="" type="text">
											</div>
											<div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">في أي مرحلة دراسية : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="child_stud_level" name="child_stud_level" placeholder="Enter lastname" required="" type="text">
											</div>
											<div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">اسم الصف الدراسي للمرحلة : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="child_stud_level_name" name="child_stud_level_name" placeholder="Enter lastname" required="" type="text">
											</div>
											<div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">مجاني او خاص  : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Free_private" name="Free_private" placeholder="Enter lastname" required="" type="text">
											</div>
											<div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">التكلفة الدراسية: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="study_cost_child" name="study_cost_child" placeholder="Enter lastname" required="" type="text">
											</div>

                                        </div>
                                            <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label"> نوع البطاقة الشخصية : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Type_id" name="Type_id" placeholder="Enter lastname" required="" type="text">
											</div>
											<div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label"> من اي محافظة صادرة : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="From_gover_iss" name="From_gover_isss" placeholder="Enter lastname" required="" type="text">
											</div>
											<div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label"> أمراض او شكوى مرضية : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Diseases_stu" name="Diseases_stu" placeholder="Enter lastname" required="" type="text">
											</div>
											<div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label"> اسم علاج يستخدم بشكل دائم  : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Permanently_used_medication_name" name="Permanently_used_medication_name" placeholder="Enter lastname" required="" type="text">
											</div>
											<div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label"> علاج مجاني أو رمزي : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Free_token" name="Free_token" placeholder="Enter lastname" required="" type="text">
											</div>
											<div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label"> مصاريف الأدوية الشهرية  : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Month_medic_expenses" name="Month_medic_expenses" placeholder="Enter lastname" required="" type="text">
											</div>
                                            <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">اسم الاب: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="fathername" name="fathername" placeholder="Enter lastname" required="" type="text">
											</div>
                                            <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">دراست والدك: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="fatherstudy" name="fatherstudy" placeholder="Enter lastname" required="" type="text">
											</div>
                                            <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">عمله في سوريا: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="fatherjobsyr" name="fatherjobsyr" placeholder="Enter lastname" required="" type="text">
											</div>
                                            <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">عمله في الحالي: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="fatherjob" name="fatherjob" placeholder="Enter lastname" required="" type="text">
											</div>
                                            <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">اسم الام: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="mothername" name="mothername" placeholder="Enter lastname" required="" type="text">
											</div>
                                            <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">دراستها : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="motherstudy" name="motherstudy" placeholder="Enter lastname" required="" type="text">
											</div>
                                            <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">عملها في سوريا: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="motherjobsyr" name="motherjobsyr" placeholder="Enter lastname" required="" type="text">
											</div>
                                            <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">عملها في الحالي: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="motherjob" name="motherjob" placeholder="Enter lastname" required="" type="text">
											</div>
                                            <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">الاصل من أي مدينة من سوريا: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="citysyr" name="citysyr" placeholder="Enter lastname" required="" type="text">
											</div>
                                            <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">اسم المنطقة: <span class="tx-danger">*</span></label> <input class="form-control" id="areasyr"  value="asd" name="areasyr" placeholder="Enter lastname" required type="text">
											</div>
                                             <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">مكان سكن الاهل الحالي: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="livenow" name="livenow" placeholder="Enter lastname" required="" type="text">
											</div>
                                              <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">مكان سكن الطالب الحالي: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="stu_livenow" name="stu_livenow" placeholder="Enter lastname" required="" type="text">
											</div>  <div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">سنة دخول الى تركيا  : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Ye_entry_Turkey" name="Ye_entry_Turkey" placeholder="Enter lastname" required="" type="text">
											</div>
											</div>
									</section>
									<h3>معلومات عائلية</h3>
									<section>
                                        <p>المعلومات حول العائلة للطالب.</p>
                                        <div class="row row-sm">
										<div class="col-md-5 col-lg-4">
											<label class="form-control-label">عدد الأخوة: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Nu_broth" name="Nu_broth" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label"> أسماء الذكور مع أعمارهم : <span class="tx-danger">*</span></label> <textarea  class="form-control" value="asd" id="Male_names" name="Male_names" placeholder="Enter lastname" required="" type="textarea"></textarea>
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">  اسماء الاناث مع أعمارهن: <span class="tx-danger">*</span></label> <textarea class="form-control" value="asd" id="Female_names" name="Female_names" placeholder="Enter lastname" required="" type="text"></textarea>
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label"> هل يدرسون: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Studying" name="Studying" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">ماذا يدرس كل واحد منهم  : <span class="tx-danger">*</span></label> <textarea class="form-control" value="asd" id="Wh_Studying" name="Wh_Studying" placeholder="Enter lastname" required="" type="text"></textarea>
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label"> هل قدم أحد منهم على منحه لدينا : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Scholarship_us" name="Scholarship_us" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label"> أذكر أسمه: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="its_name" name="its_name" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label"> هل بديك أخوة يعملون : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="have_bro_work" name="have_bro_work" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">  ماهو عملهم  : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="what_is_job" name="what_is_job" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">الراتب الشهري لهم: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="monthly_salary" name="monthly_salary" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label"> هل تعيشون معا في منزل واحد: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="One_house" name="One_house" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">  هل هناك منهم متزوجون مع ذكر اسمائهم : <span class="tx-danger">*</span></label> <textarea class="form-control" value="asd" id="Are_married" name="Are_married" placeholder="Enter lastname" required="" type="text"></textarea>
										</div>

										</div>
									</section>
									<h3>المعلومات الدراسية</h3>
									<section>
                                        <p>المعلومات الدراسية للطالب في الجامعة.</p>
                                        <div class="row row-sm">
										<div class="col-md-5 col-lg-4">
											<label class="form-control-label">في أي جامعة يدرس : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="which_univer_stud" name="which_univer_stud" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">مكان الجامعة : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Univer_loca" name="Univer_loca" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label"> الاختصاص: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="spec" name="spec" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">عدد سنوات: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Nu_years" name="Nu_years" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">كم المعدل الحالي : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Current_rate" name="Current_rate" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">المعدل التراكمي : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Cumul_average" name="Cumul_average" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">سنة تحضيري: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Prepar_year" name="Prepar_year" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">اللغة الدراسة: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="study_language" name="study_language" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">المستوى الحالي للغة : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="current_level_language" name="current_level_language" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">علامة المستوى السابق : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Mark_previous_level" name="Mark_previous_level" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">المعدل بالمستويات السابقة: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="rate_previous_levels" name="rate_previous_levels" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">طريقة قبول الجامعي: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Accept_univer" name="Accept_univer" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">معدل في شهادة القبول: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Rate_accept_certif" name="Rate_accept_certif" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">فرع جامعي آخر : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Another_univer_branch" name="Another_univer_branch" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">اختصاص بجامعة اخرى: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Another_specialty" name="Another_specialty" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">كيفية القبول بالجامعة الثانية: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="How_accept_second_univer" name="How_accept_second_univer" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">المعدل في جامعة ثانية: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Rate_univer" name="Rate_univer" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">هل يوجد منح دراسية  : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Are_there_scholarships" name="Are_there_scholarships" placeholder="Enter lastname" required="" type="text">
										</div>
                                         <div class="col-md-5 col-lg-4">
											<label class="form-control-label">اسم المنحة : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Name_scholarship" name="Name_scholarship" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">قيمة المنحة : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="value_Scholarship" name="value_Scholarship" placeholder="Enter lastname" required="" type="text">
										</div>
										<div class="col-md-5 col-lg-4">
											<label class="form-control-label"> لديك أقساط جامعية  : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Univer_tuition_fees" name="Univer_tuition_fees" placeholder="Enter lastname" required="" type="text">
										</div>
										<div class="col-md-5 col-lg-4">
											<label class="form-control-label">(بالفصل) كم القسط الجامعي: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="How_mat_univer_tuition_fees" name="How_mat_univer_tuition_fees" placeholder="Enter lastname" required="" type="text">
										</div>
										<div class="col-md-5 col-lg-4">
											<label class="form-control-label"> هل يوجد مصاريف جامعية أخرى : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Other_expenses" name="Other_expenses" placeholder="Enter lastname" required="" type="text">
										</div>
										<div class="col-md-5 col-lg-4">
											<label class="form-control-label"> ماهي المصاريف الجامعية  : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="What_expenses" name="What_expenses" placeholder="Enter lastname" required="" type="text">
										</div>
										<div class="col-md-5 col-lg-4">
											<label class="form-control-label"> هل تحفظ شيء من القرآن الكريم: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="memor_from_quran" name="memor_from_quran" placeholder="Enter lastname" required="" type="text">
										</div>
										<div class="col-md-5 col-lg-4">
											<label class="form-control-label">عدد الأجزاء : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Number_parts" name="Number_parts" placeholder="Enter lastname" required="" type="text">
										</div>
										<div class="col-md-5 col-lg-4">
											<label class="form-control-label">هل لديك إجازة بالقرآن الكريم  : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="You_have_leave" name="You_have_leave" placeholder="Enter lastname" required="" type="text">
										</div>
										<div class="col-md-5 col-lg-4">
											<label class="form-control-label"> مصدرها: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Its_source" name="Its_source" placeholder="Enter lastname" required="" type="text">
										</div>
										<div class="col-md-5 col-lg-4">
											<label class="form-control-label"> أسم الشيخ كاملاً: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Full_teacher_name" name="Full_teacher_name" placeholder="Enter lastname" required="" type="text">
										</div>
										<div class="col-md-5 col-lg-4">
											<label class="form-control-label"> هل اجازتك موجودة معك الآنً: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Your_leave_with_you" name="Your_leave_with_you" placeholder="Enter lastname" required="" type="text">
										</div>
                                        </div>
									</section>
									<h3>معلومات السكن</h3>
									<section>
									<p>المعلومات حول مكان سكن الطالب .</p>
                                        <div class="row row-sm">
										<div class="col-md-5 col-lg-4">
											<label class="form-control-label">هل تقيم في سكن طلابي جامعي  : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="live_univer_stud" name="live_univer_stud" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">هل السكن مجاني  : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="live_hous_free" name="live_hous_free" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label"> هل يقدم الطعام مجاناً: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="Is_food_free" name="Is_food_free" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">كم ايجار السكن الشهري: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="How_much_month_hous_rent" name="How_much_month_hous_rent" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">هل تقيم في سكن شبابي خاص  : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="live_special_hous" name="live_special_hous" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">نوع السكن الشبابي : <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="housing_type" name="housing_type" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-md-5 col-lg-4">
											<label class="form-control-label">كم ايجار الشهري في السكن شبابي: <span class="tx-danger">*</span></label> <input class="form-control" value="asd" id="How_much_monthly" name="How_much_monthly" placeholder="Enter lastname" required="" type="text">
										</div>
                                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
										<p class="mg-b-10">Single Select with Search *</p><select class="form-control select2"  id="test" name="test">
											<option label="Choose one">
											</option>
											<option value="Firefox">
												Firefox
											</option>
											<option value="Chrome">
												Chrome
											</option>
											<option value="Safari">
												Safari
											</option>
											<option value="Opera">
												Opera
											</option>
											<option value="Internet Explorer">
												Internet Explorer
											</option>
										</select>
									</div><!-- col-4 -->
									</section>
									<h3>معلومات العمل</h3>
									<section>
										<p class="mg-b-20">معلومات عن الأعمال للطالب أو العمل الحالي.</p>
										<div class="row row-sm">
											<div class="col-md-5 col-lg-4">
												<label class="form-control-label">هل يوجد عمل حالي: <span class="tx-danger">*</span></label> <input class="form-control" id="firstname" name="firstname" placeholder="Enter firstname" required="" type="text">
											</div>
											<div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label"> ماهو نوع العمل الحالي : <span class="tx-danger">*</span></label> <input class="form-control" id="lastname" name="lastname" placeholder="Enter lastname" required="" type="text">
											</div>
											<div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">ماهو نوع العمل السابق : <span class="tx-danger">*</span></label> <input class="form-control" id="lastname" name="lastname" placeholder="Enter lastname" required="" type="text">
											</div>
											<div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">كم الراتب الشهري: <span class="tx-danger">*</span></label> <input class="form-control" id="lastname" name="lastname" placeholder="Enter lastname" required="" type="text">
											</div>
											<div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">كل الأعمال التي عمل بها : <span class="tx-danger">*</span></label> <input class="form-control" id="lastname" name="lastname" placeholder="Enter lastname" required="" type="text">
											</div>
										</div>
									</section>
                                    <h3>Personal Information</h3>
									<section>
										<p class="mg-b-20">Try the keyboard navigation by clicking arrow left or right!</p>
										<div class="row row-sm">
											<div class="col-md-5 col-lg-4">
												<label class="form-control-label">Firstname: <span class="tx-danger">*</span></label> <input class="form-control" id="firstname" name="firstname" placeholder="Enter firstname" required="" type="text">
											</div>
											<div class="col-md-5 col-lg-4 mg-t-20 mg-md-t-0">
												<label class="form-control-label">Lastname: <span class="tx-danger">*</span></label> <input class="form-control" id="lastname" name="lastname" placeholder="Enter lastname" required="" type="text">
											</div>
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

<script type="text/javascript">
function showDiv(select){
   if(select.value==1){
    document.getElementById('hidden_div').style.display = "flex";
   } else{
    document.getElementById('hidden_div').style.display = "none";
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

@endif
