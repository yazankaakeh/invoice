@extends('layouts.master')
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!---Internal Owl Carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
<!---Internal  Multislider css-->
<link href="{{URL::asset('assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
<!--- Select2 css -->

@section('title')
الطلاب
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="my-auto mb-0 content-title">الاعدادات</h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">/الاقسام</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                        <div class="col-xl-12">
                            <div class="card mg-b-20">
                                <div class="pb-0 card-header">
                                    <div class="d-flex justify-content-between">

                                     </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table key-buttons ">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">Id</th>
                                                    <th class="border-bottom-0">اسم الطالب</th>
                                                    <th class="border-bottom-0">رقم العائلة</th>
                                                    <th class="border-bottom-0">اسم العائلة</th>
                                                    <th class="border-bottom-0">تاريخ الميلاد</th>
                                                    <th class="border-bottom-0">العمر</th>
                                                    <th class="border-bottom-0">البريد الإلكتروني</th>
                                                    <th class="border-bottom-0">رقم الهاتف</th>
                                                    <th class="border-bottom-0">من اي محافظة</th>
                                                    <th class="border-bottom-0">من اي مدينة</th>
                                                    <th class="border-bottom-0">السكن الحالي</th>
                                                    <th class="border-bottom-0">سنة الدخول</th>
                                                    <th class="border-bottom-0">نوع الإقامة</th>
                                                    <th class="border-bottom-0">الولاية</th>
                                                    <th class="border-bottom-0">اضافة دفعة</th>
                                                    <th class="border-bottom-0">اضافة زوج وزوجة</th>
                                                    <th class="border-bottom-0">اضافة اب وام</th>
                                                    <th class="border-bottom-0">حذف الارتباط بالعائلة</th>
                                                    <th class="border-bottom-0">تعديل الأرتباط بالعائلة</th>
                                                    <th class="border-bottom-0">اضافة اطفال</th>
                                                    <th class="border-bottom-0">الحالة الطبية</th>
                                                    <th class="border-bottom-0">السكن الطلابي</th>
                                                    <th class="border-bottom-0">القرآن الكريم</th>
                                                    <th class="border-bottom-0">العمل</th>
                                                    <th class="border-bottom-0">المنحة الدراسية</th>
                                                    <th class="border-bottom-0">الجامعة</th>
                                                    <th class="border-bottom-0">الإخوة</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($students as $x)
                                            @if($x->family_id != null)
                                                <tr>
                                                    <td>{{$x->id}}</td>
                                                    <td>{{$x->student_name}}</td>
                                                    <td>{{$x->family_id}}</td>
                                                    <td>{{$x->family->family_Constraint}}</td>
                                                    <td>{{$x->birthday}}</td>
                                                    <td>{{$x->age}}</td>
                                                    <td>{{$x->email}}</td>
                                                    <td dir="ltr" lang="en">{{$x->phone}}</td>
                                                    <td>{{$x->county_are_from}}</td>
                                                    <td>{{$x->city_name}}</td>
                                                    <td>{{$x->stu_Cur_housing}}</td>
                                                    <td>{{$x->entry_turkey}}</td>
                                                    <td>{{$x->Identity_type}}</td>
                                                    <td>{{$x->Id_stud_source}}</td>

                                                   <td>
                                                    {{-- Pay Student--}}

                                                    </a>
                                                    @if($x->pay_statu != 0)
                                                    <a class=" btn btn-sm btn-info" href="/pay/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 17px;"></i> </a>                                                        
                                                    @endif

                                                    </td>

                                                    {{-- wife and husband  --}}
                                                    @if($x->husband_wife_statu == 1)
                                                    <td>
                                                        <a class="btn btn-sm btn-info" href="/husband_Wife/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    </td>
                                                    @elseif($x->husband_wife_statu == 0)
                                                    <td>

                                                    </td>
                                                    @endif
                                                    {{-- father and mother  --}}
                                                    @if($x->father_mother_statu == 1)
                                                    <td>
                                                        <a class="btn btn-sm btn-info" href="/father_and_mother/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    </td>
                                                    @elseif($x->father_mother_statu == 0)
                                                    <td>

                                                    </td>
                                                    @endif

                                                    <td>
                                                    {{-- delete Student  --}}
                                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                            data-id="{{$x->id}}" data-student_name="{{$x->student_name}}"
                                                            data-family_id="{{$x->family_id}}"
                                                            data-toggle="modal" href="#modaldemo9" title="حذف">
                                                            <i class="las la-trash"  style="font-size: 20px;"> </i>
                                                        </a>
                                                    </td>

                                                    <td>
                                                    {{-- edit Student  --}}
                                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                            data-student_name="{{$x->student_name}}"
                                                            data-birthday="{{$x->birthday}}" data-email="{{$x->email}}" data-age="{{$x->age}}"
                                                            data-city_name="{{$x->city_name}}" data-stu_Cur_housing="{{$x->stu_Cur_housing}}" data-phone="{{$x->phone}}" data-county_are_from="{{$x->county_are_from}}"
                                                                data-entry_turkey="{{$x->entry_turkey}}" data-Identity_type="{{$x->Identity_type}}"
                                                            data-Id_stud_source="{{$x->Id_stud_source}}" data-id="{{$x->id}}"
                                                            data-description="" data-toggle="modal"
                                                            href="#exampleModal2" title="تعديل">
                                                            <i class="las la-pen"  style="font-size: 20px;"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                    {{-- add children  --}}
                                                    @if($x->child_statu != 0)
                                                        <a class=" btn btn-sm btn-info" href="/children/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    @endif

                                                    </td>
                                                    {{-- Medical_Status  --}}
                                                    @if($x->medical_statu == 1)
                                                    <td>
                                                        <a class=" btn btn-sm btn-info" href="/Medical_Statu/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    </td>
                                                    @elseif($x->medical_statu == 0)
                                                    <td>

                                                    </td>
                                                    @endif

                                                    @if($x->residance_statu == 1)
                                                    <td>
                                                        <a class=" btn btn-sm btn-info" href="/Student_Residance/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>

                                                    </td>
                                                    @elseif($x->residance_statu == 0)
                                                    {{-- Stduent_Residance  --}}
                                                    <td>

                                                    </td>
                                                    @endif

                                                    {{-- Quran  --}}
                                                    @if($x->quran_statu == 1)
                                                    <td>
                                                    <a class=" btn btn-sm btn-info" href="/Quran/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    </td>
                                                    @elseif($x->quran_statu == 0)
                                                    <td>

                                                    </td>
                                                    @endif

                                                    {{-- Job  --}}
                                                    @if($x->job_statu == 1)
                                                    <td>
                                                        <a class=" btn btn-sm btn-info" href="/job/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    </td>
                                                    @elseif($x->job_statu == 0)
                                                    <td>

                                                    </td>
                                                    @endif

                                                    {{-- Scholarship  --}}
                                                    @if($x->scholarship_statu == 1)
                                                    <td>
                                                        <a class=" btn btn-sm btn-info" href="/Scholarship/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    </td>
                                                    @elseif($x->scholarship_statu == 0)
                                                    <td>

                                                    </td>
                                                    @endif

                                                    {{-- University  --}}
                                                    @if($x->university_statu == 1)
                                                    <td>
                                                    <a class=" btn btn-sm btn-info" href="/University/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    </td>
                                                    @elseif($x->university_statu == 0)
                                                    <td>

                                                    </td>
                                                    @endif
    
                                                    {{-- Sister and Brother  --}}

                                                    <td>
                                                    @if($x->sis_statu != 0)
                                                    <a class="btn btn-sm btn-info" href="/Sister_and_Brother/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    @endif

                                                    </td>

                                                 @endif
                                            @endforeach
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                           <div> 
                            @if (session()->has('Add'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                                                        
                            @if (session()->has('Form'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Form') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if (session()->has('Edit'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Edit') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                             @if (session()->has('Add Money'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add Money') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if (session()->has('Delete'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Delete') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif


                            @if (session()->has('Add_husbandandWife'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_husbandandWife') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if (session()->has('Add_Child'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_Child') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if (session()->has('Add_fatherandmother'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_fatherandmother') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if (session()->has('Add_MedicalStatues'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_MedicalStatues') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if (session()->has('Add_StudentResidences'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_StudentResidences') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if (session()->has('Add_Quran'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_Quran') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if (session()->has('Add_jobs'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_jobs') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if (session()->has('Add_Scholarship'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_Scholarship') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if (session()->has('Add_University'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_University') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if (session()->has('Add_sister'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_sister') }}</strong>
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
                        
                        





                        {{-- delete --}}
                        <div class="modal" id="modaldemo9">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">حذف القسم</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                            type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="{{ route('student.family.destroy') }}" method="post">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                            <input type="hidden" name="family_id" id="family_id" value="">
                                            <input type="hidden" name="id" id="id" value="">
                                            <input class="form-control" name="student_name" id="student_name" type="text" readonly>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                            <button type="submit" class="btn btn-danger">تاكيد</button>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>

                        {{-- edit --}}
                        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">تعديل القسم</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                    <form action="{{ route('student.family.update') }}" method="post" autocomplete="off">
                                        {{ method_field('patch') }}
                                        {{ csrf_field() }}

                                    <div class="modal-body">
                                    <div class="form-group">
                                    <label for="exampleInputEmail">رقم العائلة</label>
                                    <input type="text" class="form-control" name="family_id" id="family_id"  >
                                    </div>
                                    <div class="form-group">
                                    <input type="hidden" name="id" id="id"  readonly>

                                    <label for="exampleInputEmail">اسم الطالب</label>
                                    <input type="text" class="form-control" id="student_name" name="student_name" readonly>
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail">الميلاد</label>
                                    <input type="date" class="form-control" id="birthday" name="birthday" readonly>
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail">العمر</label>
                                    <input type="number" class="form-control" id="age" name="age" readonly>
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail">البريد الإلكتروني</label>
                                    <input type="text" class="form-control" id="email" name="email" readonly>
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail">رقم الهاتف</label>
                                    <input type="text" class="form-control" id="phone" name="phone" readonly>
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail">من اي محافظة</label>
                                    <select class="form-control" id="county_are_from" name="county_are_from" readonly>
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
                                    <div class="form-group">
                                    <label for="exampleInputEmail">من اي مدينة</label>
                                    <input type="text" class="form-control" id="city_name" name="city_name" readonly>
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail">السكن الحالي أي ولاية</label>
                                    <select class="form-control" id="stu_Cur_housing" name="stu_Cur_housing" readonly>
                                    <option label="test">
											اختر أسم الولاية </option>
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
                                    <div class="form-group">
                                    <label for="exampleInputEmail">تاريخ الدخول لتركيا</label>
                                    <input type="date" class="form-control" id="entry_turkey" name="entry_turkey" readonly>
                                    </div>
                                    <div class="form-group">
                                    <p class="mg-b-10">هل يوجد لديك كملك </p>
                                    <select class="form-control select2" name="Identity_type" id="Identity_type" readonly>
                                    <option label="test">
											  </option>
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
                                    <div class="form-group">
                                    <label for="exampleInputEmail">اسم الولاية </label>{{-- unCmoplete --}}
                                    <select class="form-control select2" name="Id_stud_source" id="Id_stud_source" readonly>
                                        <option label="test">
											اختر أسم الولاية </option>
                                        <option value="أضنة">
                                            أضنة</option>
                                        <option value="	أدي‌يمن">
                                            أدي‌يمن</option>
                                        <option value="	أفيون‌ قرةحصار">
                                            أفيون‌ قرةحصار</option>
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
                                    </div>

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
		<!-- main-content closed -->
@endsection
@section('js')
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/js/modal.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
{{--  edit student Jquery  --}}
<script>
    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var student_name = button.data('student_name')
        var birthday = button.data('birthday')
        var age = button.data('age')
        var phone = button.data('phone')
        var email = button.data('email')
        var county_are_from = button.data('county_are_from')
        var city_name = button.data('city_name')
        var stu_Cur_housing = button.data('stu_Cur_housing')
        var entry_turkey = button.data('entry_turkey')
        var Identity_type = button.data('Identity_type')
        var Id_stud_source = button.data('Id_stud_source')
        var family_id = button.data('family_id')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #student_name').val(student_name);
        modal.find('.modal-body #birthday').val(birthday);
        modal.find('.modal-body #age').val(age);
        modal.find('.modal-body #phone').val(phone);
        modal.find('.modal-body #stu_Cur_housing').val(stu_Cur_housing);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #county_are_from').val(county_are_from);
        modal.find('.modal-body #city_name').val(city_name);
        modal.find('.modal-body #entry_turkey').val(entry_turkey);
        modal.find('.modal-body #Identity_type').val(Identity_type);
        modal.find('.modal-body #Id_stud_source').val(Id_stud_source);
        modal.find('.modal-body #family_id').val(family_id);
    })
</script>

{{--  delete Student Jquery  --}}
<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var student_name = button.data('student_name')
        var family_id = button.data('family_id')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #student_name').val(student_name);
        modal.find('.modal-body #family_id').val(family_id);
    })
</script>

{{--  payment   --}}
<script>
    $('#exampleModal0').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var student_id = button.data('student_id')
        var modal = $(this)
        modal.find('.modal-body #student_id').val(student_id);

})
</script>

{{--  Husband and Wife    --}}
<script>
    $('#exampleModal111').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var student_id = button.data('student_id')
        var modal = $(this)
        modal.find('.modal-body #student_id').val(student_id);
    })
</script>

{{--  children    --}}
<script>
    $('#exampleModal4').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var student_id = button.data('student_id')
        var modal = $(this)
        modal.find('.modal-body #student_id').val(student_id);
    })
</script>

{{--  Pay  --}}
<script>
    $('#exampleModal3').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var student_name = button.data('student_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #student_name').val(student_name);
})
</script>

{{--  Medical_Status  --}}
<script>
    $('#exampleModal5').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var student_id = button.data('student_id')
        var modal = $(this)
        modal.find('.modal-body #student_id').val(student_id);
})
</script>

{{--  Student_Residance  --}}
<script>
    $('#exampleModal6').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var student_id = button.data('student_id')
        var modal = $(this)
        modal.find('.modal-body #student_id').val(student_id);})
</script>

{{--  Quran  --}}
<script>
    $('#exampleModal7').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var student_id = button.data('student_id')
        var modal = $(this)
        modal.find('.modal-body #student_id').val(student_id);})
</script>

{{--  Job  --}}
<script>
    $('#exampleModal13').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var student_id = button.data('student_id')
        var modal = $(this)
        modal.find('.modal-body #student_id').val(student_id);})
</script>

{{--  Scholarship  --}}
<script>
    $('#exampleModal14').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var student_id = button.data('student_id')
        var modal = $(this)
        modal.find('.modal-body #student_id').val(student_id);})
</script>

{{--  universities  --}}
<script>
    $('#exampleModal15').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var student_id = button.data('student_id')
        var modal = $(this)
        modal.find('.modal-body #student_id').val(student_id);})
</script>

{{-- Sister and Brother --}}
<script>
    $('#exampleModal16').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var student_id = button.data('student_id')
        var modal = $(this)
        modal.find('.modal-body #student_id').val(student_id);})
</script>

<script type="text/javascript">
    function showDiv1(select){
       if(select.value==1){
        document.getElementById('hidden_div').style.display = "flex";
        document.getElementById('hidden1_div').style.display = "none";
       } else{
        document.getElementById('hidden_div').style.display = "none";
        document.getElementById('hidden1_div').style.display = "flex";

       }
    }
    </script>
    
    <script type="text/javascript">
        function showDiv(select){
           if(select.value=='يوجد'){
            document.getElementById('hidden3_div').style.display = "flex";
           } else{
            document.getElementById('hidden3_div').style.display = "none";    
           }
        }
        </script>
@endsection



