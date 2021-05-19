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
{{--  @dd($family)  --}}
@section('title')
قسم العائلات 
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="my-auto mb-0 content-title">قسم العائلات</h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">/الاقسام</span>
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
                                        <div class="col-sm-3 col-md-4 col-xl-2">
                                            <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo1">فورم تسجيل العائلات</a>
                                            <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">اضافة عائلة</a>
                                        </div>
                                     </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table key-buttons ">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">Id</th>
                                                    <th class="border-bottom-0">اسم  صاحب القيد</th>
                                                    <th class="border-bottom-0">عدد أفراد</th>
                                                    <th class="border-bottom-0"> اسم المعيل</th>
                                                    <th class="border-bottom-0">عمل المعيل</th>
                                                    <th class="border-bottom-0"> اسم المعيل الثاني</th>
                                                    <th class="border-bottom-0">عمل المعيل الثاني</th>
                                                    <th class="border-bottom-0"> الراتب الشهري</th>


                                                    <th class="border-bottom-0">مساعدات</th>
                                                    <th class="border-bottom-0">نوع المساعدات</th>
                                                    <th class="border-bottom-0">قيمة المساعدات</th>

                                                    <th class="border-bottom-0">رقم هاتف</th>
                                                    <th class="border-bottom-0">رقم هاتف ثاني</th>
                                                    <th class="border-bottom-0">ملاحظات</th>
                                                    <th class="border-bottom-0"> اضافة دفعة بالدولار</th>
                                                    <th class="border-bottom-0">اضافة دفعة تركي</th>
                                                    <th class="border-bottom-0">اضافة دفعة يورو</th>
                                                    <th class="border-bottom-0">اضافة كروت بيم</th>
                                                    <th class="border-bottom-0">اضافة زوج وزوجة</th>
                                                    <th class="border-bottom-0">حذف عائلة</th>
                                                    <th class="border-bottom-0">تعديل عائلة</th>
                                                    <th class="border-bottom-0">اضافة اطفال</th>

                                                    <th class="border-bottom-0">إضافة السكن</th>



                                                    <th class="border-bottom-0">إضافة طالب</th>
                                                    <th class="border-bottom-0">إضافة مريض</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($family as $x)
                                                <tr>
                                                {{--  @dd($family)  --}}
                                                    <td>{{$x->id}}</td>
                                                    <td>{{$x->family_Constraint}}</td>
                                                    <td>{{$x->family_number_member}}</td>
                                                    <td>{{$x->family_breadwinner}}</td>
                                                    <td>{{$x->work_breadwinner}}</td>
                                                    <td>{{$x->family_an_breadwinner}}</td>
                                                    <td>{{$x->work_an_breadwinner}}</td>
                                                    <td>{{$x->family_monthly_salary}}</td>
                                                    <td>{{$x->family_has_aid}}</td>
                                                    <td>{{$x->family_what_aid}}</td>
                                                    <td>{{$x->aid_value}}</td>
                                                    <td>{{$x->phone}}</td>
                                                    <td>{{$x->sec_phone}}</td>
                                                    <td>{{$x->note}}</td>


                                                <td>
                                                    {{-- Add_Dollar--}}
                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                        data-family_constraint="{{$x->family_Constraint}}"  data-id="{{ $x->id }}"
                                                        data-description="" data-toggle="modal"
                                                        href="#exampleModa23" title="دفع بالدولار">
                                                        <i class="cf cf-zec"  style="font-size: 20px;"></i>
                                                    </a>
                                                    @if($x->usd_statu != 0)
                                                    <hr style="padding:0px; margin:5px 0px 5px 0px!important; margin-top:5px; margin-bottom:5px;">

                                                    <a class=" btn btn-sm btn-info" href="/Family_pay/show/family/{{$x->id}}"><i class="far fa-eye"  style="font-size: 17px;"></i> </a>

                                                    <a class=" btn btn-sm btn-info" href="/Family_usd/show/family/usd/{{$x->id}}"><i class="far fa-eye"  style="font-size: 17px;"></i> </a>                                                        
                                                    @endif
                                                </td>                                                

                                                <td>
                                                    {{-- Add_Tr--}}
                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                        data-family_constraint="{{$x->family_Constraint}}"  data-id="{{ $x->id }}"
                                                        data-description="" data-toggle="modal"
                                                        href="#exampleModa24" title="دفع بالتركي">
                                                        <i class="cf cf-zec"  style="font-size: 20px;"></i>
                                                    </a>
                                                    @if($x->tr_statu != 0)
                                                    <a class=" btn btn-sm btn-info" href="/Family_tr/show/family/tr/{{$x->id}}"><i class="far fa-eye"  style="font-size: 17px;"></i> </a>                                                        

                                                    @endif
                                                </td>  

                                                <td>
                                                    {{-- Add_Euro--}}
                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                        data-family_constraint="{{$x->family_Constraint}}"  data-id="{{ $x->id }}"
                                                        data-description="" data-toggle="modal"
                                                        href="#exampleModa25" title="دفع باليورو">
                                                        <i class="cf cf-zec"  style="font-size: 20px;"></i>
                                                    </a>
                                                    @if($x->euro_statu != 0)
                                                    <a class=" btn btn-sm btn-info" href="/Family_euro/show/family/euro/{{$x->id}}"><i class="far fa-eye"  style="font-size: 17px;"></i> </a>                                                        
                                                    @endif
                                                </td>    

                                                <td>
                                                    {{-- Add_Bim--}}
                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                        data-family_constraint="{{$x->family_Constraint}}"  data-id="{{ $x->id }}"
                                                        data-description="" data-toggle="modal"
                                                        href="#exampleModa26" title="دفع كروت">
                                                        <i class="cf cf-zec"  style="font-size: 20px;"></i>
                                                    </a>
                                                    @if($x->bim_statu != 0)
                                                    <a class=" btn btn-sm btn-info" href="/Family_bim/show/family/bim/{{$x->id}}/"><i class="far fa-eye"  style="font-size: 17px;"></i> </a>                                                        
                                                    @endif
                                                </td>  
                                                                                                                                              
                                                    {{-- wife and husband  --}}
                                                    @if($x->husband_wife_statu == 1)
                                                    <td>
                                                        <a class="btn btn-sm btn-info" href="/husband_Wife_family/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    </td>
                                                    @elseif($x->husband_wife_statu == 0)
                                                    <td>
                                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                            data-family_id="{{$x->id}}"
                                                            data-toggle="modal"
                                                            href="#exampleModal111" title="إضافة زوج و زوجة">
                                                            <i class="mdi mdi-account-multiple-plus" style="font-size: 18px;"></i>
                                                        </a>
                                                    </td>
                                                    @endif


                                                    <td>
                                                    {{-- delete Family  --}}
                                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                            data-id="{{$x->id}}" data-family_constraint="{{$x->family_Constraint}}"
                                                            data-toggle="modal" href="#modaldemo9" title="حذف">
                                                            <i class="las la-trash"  style="font-size: 20px;"> </i>
                                                        </a>
                                                    </td>

                                                    <td>
                                                    {{-- edit Family  --}}
                                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                            data-family_constraint="{{$x->family_Constraint}}"
                                                            data-family_number_member="{{$x->family_number_member}}" data-family_breadwinner="{{$x->family_breadwinner}}"
                                                            data-family_an_breadwinner="{{$x->family_an_breadwinner}}"
                                                            data-stu_cur_housing="{{$x->stu_Cur_housing}}" data-family_monthly_salary="{{$x->family_monthly_salary}}"
                                                            data-county_are_from="{{$x->county_are_from}}" data-family_aid="{{$x->family_has_aid}}"
                                                            data-phone="{{$x->phone}}"
                                                            data-aid_value="{{$x->aid_value}}"
                                                            data-sec_phone="{{$x->sec_phone}}"
                                                            data-work_an_breadwinner="{{$x->work_an_breadwinner}}"
                                                            data-work_breadwinner="{{$x->work_breadwinner}}"
                                                            data-id="{{$x->id}}" data-family_what_aid="{{$x->family_what_aid}}" data-note="{{$x->note}}"
                                                            data-description="" data-toggle="modal" href="#exampleModal2" title="تعديل">
                                                            <i class="las la-pen"  style="font-size: 20px;"></i>
                                                        </a>
                                                    </td>


                                                    {{-- add children  --}}
                                                    <td>
                                                    @if($x->child_statu != 0)
                                                        <a class=" btn btn-sm btn-info" href="/children_family/show/child/family/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    @endif
                                                        <a class="modal-effect btn btnsm btn-info" data-effect="effect-scale"
                                                            data-family_id="{{$x->id}}"  data-description="" data-toggle="modal"
                                                            href="#exampleModal4" title="إضافة طفل">
                                                            <i class="las la-child"  style="font-size: 20px;"></i>
                                                        </a>
                                                    </td>



                                                    @if($x->residance_statu == 1)
                                                    <td>
                                                        <a class=" btn btn-sm btn-info" href="/address_family/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>

                                                    </td>
                                                    @elseif($x->residance_statu == 0)
                                                    {{-- Stduent_Residance  --}}
                                                    <td>
                                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                            data-family_id="{{$x->id}}"  data-description="" data-toggle="modal"
                                                            href="#exampleModal6" title="إضافة سكن للطالب">
                                                            <i class=" las la-home"  style="font-size: 20px;"></i>
                                                        </a>
                                                    </td>
                                                    @endif

                                                     {{-- Student  --}}

                                                    <td>
                                                    @if($x->student_statu  !=  0)

                                                        <a class=" btn btn-sm btn-info" href=" {{route('family.student.show', ['id'=> $x->id])}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    @endif
                                                        <a class="modal-effect btn btnsm btn-info" data-effect="effect-scale"
                                                            data-family_id="{{$x->id}}"  data-description="" data-toggle="modal"
                                                            href="#exampleModa20" title="إضافة طفل">
                                                            <i class="las la-child"  style="font-size: 20px;"></i>
                                                        </a>
                                                    </td>

                                                    {{--  Add_Patient_id  --}}
                                                    @if($x->patient_statu == 1)
                                                    <td>
                                                        <a class=" btn btn-sm btn-info" href="/family/show/medical/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    </td>
                                                    @elseif($x->patient_statu == 0)
                                                    <td>
                                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                            data-family_id="{{$x->id}}"  data-description="" data-toggle="modal"
                                                            href="#exampleModal92" title="إضافة مريض">
                                                            <i class="fas fa-briefcase"  style="font-size: 20px;"></i>
                                                        </a>
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

                            @if (session()->has('Warning'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Warning') }}</strong>
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

                            @if (session()->has('Add_student_error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_student_error') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if (session()->has('Add_medical'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_medical') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if (session()->has('Add_medical_error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_medical_error') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if (session()->has('Add_student'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_student') }}</strong>
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

                            @if (session()->has('Add_StudentResidences'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_StudentResidences') }}</strong>
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

                            @if (session()->has('Add_Address'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_Address') }}</strong>
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


                        {{-- Job --}}

                                 
                        {{--  Job
                        <div class="modal fade" id="exampleModal13" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">العمل</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('job.family.store') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="modal-body">

                                <input type="hidden" name="family_id" id="family_id" readonly>
                                    <div class="form-group">
                                    <p class="mg-b-10">هل تعمل؟</p>
                                    <select class="form-control select2" name="job_have" id="job_have">
                                    <option value="نعم" >
                                        نعم
                                    </option>
                                    <option value="لا" >
                                        لا
                                    </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">ماهو عملك ؟ </label>
                                <input type="text" class="form-control" id="job_type" name="job_type" placeholder="   أكتب ماهو العملك ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">مكان العمل؟</label>
                                <input type="text" class="form-control" id="job_place" name="job_place" placeholder="   أكتب ماهو العملك ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">الراتب الشهري؟</label>
                                <input type="text" class="form-control" id="job_monthly_salary" name="job_monthly_salary" placeholder="   أكتب ماهو العملك ">
                                </div>
                                <div class="form-group">
                                   <p class="mg-b-10">هل لديك عمل سابق؟</p>
                                   <select class="form-control select2" name="job_last_have" id="job_last_have" >
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
                                <div class="form-group">
                                <label for="exampleInputEmail">نوع عملك السابق؟</label>
                                <input type="text" class="form-control" id="job_last_type" name="job_last_type" placeholder="   أكتب ماهو العملك السابق ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">كم راتبك السابق بعملك السابق؟</label>
                                <input type="text" class="form-control" id="job_last_salary" name="job_last_salary" placeholder="   كم ماهو الراتبك بالعمل السابق">
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
                            </div>
                         </div>
				        </div>
                        </div>  --}}

                        {{-- Add_Dollar --}}
                        <div class="modal fade" id="exampleModa23" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">العمل</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('usd.store.family') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="form-group">
                                <input type="hidden" name="family_id" id="id" readonly>
                                <label for="exampleInputEmail">اسم صاحب القيد</label>
                                <input type="text" class="form-control" id="family_constraint" name="family_constraint" readonly>
                                </div>                                
                                <div class="form-group">
                                <label for="exampleInputEmail">المبلغ المدفوع بالدولار</label>
                                <input type="text" class="form-control" id="family_value_usd" name="family_value_usd" placeholder="   أكنب ماهو العملك السابق ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">ملاحظات</label>
                                <input type="text" class="form-control" id="note" name="note" placeholder="   كم ماهو الراتبك بالعمل السابق">
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
                            </div>
                         </div>
				        </div>
                        </div>

                        {{-- Add_Tr --}}
                        <div class="modal fade" id="exampleModa24" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">العمل</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('tr.store.family') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="form-group">
                                <input type="hidden" name="family_id" id="id" readonly>
                                <label for="exampleInputEmail">اسم صاحب القيد</label>
                                <input type="text" class="form-control" id="family_constraint" name="family_constraint" readonly>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">المبلغ المدفوع بالتركي</label>
                                <input type="text" class="form-control" id="family_value" name="family_value_tr" placeholder="   أكنب ماهو العملك السابق ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">ملاحظات</label>
                                <input type="text" class="form-control" id="note" name="note" placeholder="   كم ماهو الراتبك بالعمل السابق">
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
                            </div>
                         </div>
				        </div>
                        </div>

                        {{-- Add_Euro --}}
                        <div class="modal fade" id="exampleModa25" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">العمل</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('euro.store.family') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="form-group">
                                <input type="hidden" name="family_id" id="id" readonly>
                                <label for="exampleInputEmail">اسم صاحب القيد</label>
                                <input type="text" class="form-control" id="family_constraint" name="family_constraint" readonly>
                                </div>                                
                                <div class="form-group">
                                <label for="exampleInputEmail">المبلغ المدفوع باليورو</label>
                                <input type="text" class="form-control" id="family_value_euro" name="family_value_euro" placeholder="   أكنب ماهو العملك السابق ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">ملاحظات</label>
                                <input type="text" class="form-control" id="note" name="note" placeholder="   كم ماهو الراتبك بالعمل السابق">
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
                            </div>
                         </div>
				        </div>
                        </div>

                        {{-- Add_Bim --}}
                        <div class="modal fade" id="exampleModa26" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">العمل</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('bim.store.family') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="form-group">
                                <input type="hidden" name="id" id="id" readonly>
                                <label for="exampleInputEmail">اسم صاحب القيد</label>
                                <input type="text" class="form-control" id="family_constraint" name="family_constraint" readonly>
                                </div>                                
                                <div class="form-group">
                                <label for="exampleInputEmail">عدد كروت البيم</label>
                                <input type="hidden" name="family_id" id="id" readonly>
                                <input type="text" class="form-control" id="number_bim_family" name="number_bim_family" placeholder="   أكنب ماهو العملك السابق ">
                                </div>
                                <div class="modal-body">
                                    <p class="mg-b-10">قيمة الكروت</p>
                                    <select class="form-control select2" name="value_bim_family" id="value_bim_family" >
                                            @foreach($payments as $a)
                                                <option value="{{$a->value_bim}}" >
                                                    {{$a->value_bim}}
                                                </option>                                                   
                                            @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">ملاحظات</label>
                                <input type="text" class="form-control" id="note" name="note" placeholder="   كم ماهو الراتبك بالعمل السابق">
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
                            </div>
                         </div>
				        </div>
                        </div>

                        {{-- Address --}}
                        <div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">السكن</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('address.family.store') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                   <div class="modal-body">
                                <div class="form-group">
                                <input type="hidden" name="family_id" id="family_id"  readonly>
                                <label for="exampleInputEmail"> اسم المحافظة الولاية</label>
                                <select type="text" class="form-control" id="address_country" name="address_country" placeholder="">
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
                                <div class="form-group">
                                <label for="exampleInputEmail">اسم الحي</label>
                                <input type="text" class="form-control" id="address_city" name="address_city" placeholder=" أكتب اسم الحي ">
                                </div>

                                 <div class="form-group">
                                <label for="exampleInputEmail">العنوان كما في الفاتورة</label>
                                <input type="text" class="form-control" id="address_like_bill" name="address_like_bill" placeholder=" أكتب العنوان  كما في الفاتورة ">
                                </div>

                                 <div class="form-group">
                                <label for="exampleInputEmail">العنوان السابق</label>
                                <input type="text" class="form-control" id="address_last" name="address_last" placeholder=" أكتب العنوان السابق ">
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
                            </div>
                         </div>
				        </div>
                        </div>

                       {{-- children --}}
                        <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">اضافة الأطفال</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('children.store.family') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="modal-body">
                                <div class="form-group">
                                <input type="hidden" name="family_id" id="family_id" readonly>
                                <label for="exampleInputEmail">اسم  الطفل</label>
                                <input type="text" class="form-control" id="childre_name" name="childre_name" placeholder=" أكتب اسم الطفل ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">العمر</label>
                                <input type="number" class="form-control" id="childre_age" name="childre_age" placeholder=" أكتب  العمر بالرقم ">
                                </div>
                                <div class="form-group">{{-- it must be select options  --}}
                                    <p class="mg-b-10">الجنس</p>
                                    <select class="form-control select2" name="childre_gender" id="childre_gender" placeholder=" أكتب الجنس الطفل ">
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
                                <div class="form-group">
                                <label for="exampleInputEmail">المرحلة الدراسية</label>
                                <select type="text" class="form-control" id="childre_educa_leve" name="childre_educa_leve" placeholder=" أكتب المرحلة الدراسية ">
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
                                 <div class="form-group">
                                    <p class="mg-b-10">هل يوجد لديك اي أمراض</p>
                                    <select class="form-control select2" name="medical_stat" id="medical_stat">
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
                                 <div class="form-group">
                                <label for="exampleInputEmail"> رقم الصف الدراسي </label>
                                <input type="text" class="form-control" id="childre_class_number" name="childre_class_number" placeholder="  أكتب رقم الصف الدراسي ">
                                </div>
                                <div class="form-group">{{-- it must be select options  --}}
                                    <p class="mg-b-10">الهوية الشخصية من اي ولاية</p>
                                    <select class="form-control select2" name="childre_id_extr" id="childre_id_extr" placeholder=" حدد من فضلك من اسم  الولاية الصادرة منها الكملك ">
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
                                 <div class="form-group">{{-- it must be select options  --}}
                                    <p class="mg-b-10">هل يعيشون معكم</p>
                                    <select class="form-control select2" name="childre_live_with" id="childre_live_with" placeholder=" هل الأطفال يعيشون معكم ">
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
                                <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">تاكيد</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                </div>
                                </form>
                                </div>
                                </div>
                                </div>
                                </div>
                            </div>
                            </div>
				        </d
                        </div>

                        {{--  enable  --}}
                        <div class="modal" id="modaldemo1">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">قسم العائلات.</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>

                                <form action="{{ route('family.enable') }}" method="GET">
                                {{ method_field('GET') }}
                                {{ csrf_field() }}
                                 <div class="modal-body">
                                  <div class="form-group">{{-- it must be select options  --}}
                                    <p class="mg-b-10">تفعيل فورم التسجيل العائلات ؟</p>
                                    <select class="form-control select2" name="enable" id="enable" placeholder="  ">
                                    <option value="1" >
                                        تغعيل
                                    </option>
                                    <option value="2" >
                                        إبطال
                                    </option>
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

                        {{--  Add Student Id  --}}
                        <div class="modal" id="exampleModa20">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">اضافة طالب للعائلة.</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>

                                <form action="{{ route('family.student.add') }}" method="GET">
                                {{ method_field('GET') }}
                                {{ csrf_field() }}
                                 <div class="modal-body">
                                <div class="form-group">
                                <input type="hidden" name="family_id" id="family_id"  readonly>
                                <label for="exampleInputEmail">رقم الطالب</label>
                                <input type="text" class="form-control" id="student_id" name="student_id" placeholder=" أكتب رقم ">
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

                        {{--  Add_Patient_id   --}}
                        <div class="modal" id="exampleModal92">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">اضافة قسم</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>

                                <form action="{{ route('family.medical.add') }}" method="GET">
                                {{ method_field('GET') }}
                                {{ csrf_field() }}     
                                 <div class="modal-body">         
                                <div class="form-group">
                                <input type="hidden" name="family_id" id="family_id"  readonly>
                                <label for="exampleInputEmail">رقم المريض</label>
                                <input type="text" class="form-control" id="medical_id" name="medical_id" placeholder=" أكتب رقم ">
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


                        {{-- Husband and Wife --}}
                        <div class="modal fade" id="exampleModal111" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">اضافة زوج و زوجة</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('husband_Wife.family.store') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}


                                <div  class="row row-sm"id="hidden_div" style="display:flex;"> {{-- display:flex  --}}

                                <div class="form-group">
                                <input type="hidden" name="family_id" id="family_id"  readonly>
                                <label for="exampleInputEmail">اسم  الزوجة</label>
                                <input type="text" class="form-control" id="wife_name" name="wife_name" placeholder=" أكتب اسم  الزوجة ">
                                </div>

                                 <div class="form-group">
                                <label for="exampleInputEmail">تاريخ ميلاد الزوجة</label>
                                <input type="date" class="form-control" id="wife_birth" name="wife_birth" placeholder=" أكتب تاريخ الميلاد">
                                </div>

                                 <div class="form-group">
                                <label for="exampleInputEmail">من اي محافظة من سوريا؟</label>
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
                                <div class="form-group">
                                    <p class="mg-b-10">هل يوجد لديك اي أمراض</p>
                                    <select class="form-control select2" name="medical_mom" id="medical_mom">
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
                                <div class="form-group">
                                    <label for="exampleInputEmail">من اي مدينة؟</label>
                                    <input type="text" class="form-control" id="wife_district" name="wife_district" placeholder=" أكتب اسم المدينة ">
                                </div>
                               <div class="form-group">{{-- it must be select options  --}}
                                    <p class="mg-b-10"> الحالة الأجتماعية للزوجة  </p>
                                    <select class="form-control select2" name="wife_mar_stat" id="wife_mar_stat" placeholder=" أكتب الحالة الأجتماعية ">
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
                                 <div class="form-group">
                                <label for="exampleInputEmail">المستوى التعليمي للزوجة</label>
                                <select class="form-control" id="wife_academicel" name="wife_academicel" placeholder=" أكتب المستوى التعليمي  ">
                                    <option label="test">
                                        حدد من فضلك المستوى التعليمي </option>
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

                                <div class="form-group">
                                <label for="exampleInputEmail">اختصاص دراسة الزوجة</label>
                                <input type="text" class="form-control" id="wife_special" name="wife_special" placeholder="أكتب اسم الأختصاص">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">هل تعمل الزوجة؟</label>
                                <select class="form-control select2" name="wife_is_work" id="wife_is_work" placeholder="">
                               <option label="test">
											حدد من فضلك  </option>
                                    <option value="تعمل" >
                                    تعمل
                                </option>
                                <option value="لاتعمل" >
                                    لاتعمل
                                </option>
								</select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">العمل الحالي للزوجة</label>
                                <input type="text" class="form-control" id="wife_now_work" name="wife_now_work" placeholder=" أكتب العمل الحالي ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">العمل السابق للزوجة</label>
                                <input type="text" class="form-control" id="wife_Pre_work" name="wife_Pre_work" placeholder=" أكتب العمل السابق  ">
                                </div>
                               </div>
                                <hr>
                                {{--  Husband Part  --}}

                                <div  class="row row-sm"id="hidden1_div" style="display:flex;"> {{-- display:flex  --}}
                                <div class="form-group">
                                <label for="exampleInputEmail">اسم  الزوج</label>
                                <input type="text" class="form-control" id="husb_name" name="husb_name" placeholder=" أكتب اسم  الزوج ">
                                </div>
                                 <div class="form-group">
                                <label for="exampleInputEmail">تاريخ ميلاد الزوج</label>
                                <input type="date" class="form-control" id="husb_birth" name="husb_birth" placeholder=" أكتب تاريخ الميلاد">
                                </div>
                                 <div class="form-group">
                                <label for="exampleInputEmail">من اي محافظة من سوريا؟</label>
                                <select class="form-control" id="husb_Orig_city" name="husb_Orig_city" placeholder=" أكتب اسم  محافظة ">
                                    <option label="test">
                                        حدد من فضلك اسم  المحافظة </option>
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
                                    <label for="exampleInputEmail">من اي مدينة؟</label>
                                    <input type="text" class="form-control" id="husb_district" name="husb_district" placeholder=" أكتب اسم  المدينة ">
                                </div>
                                <div class="form-group">{{-- it must be select options  --}}
                                    <p class="mg-b-10">الحالة الاجتماعية للزوج</p>
                                    <select class="form-control select2" name="husb_mar_stat" id="husb_mar_stat" placeholder=" أكتب الحالة الاجتماعية ">
                                        <option label="test">
											حدد من فضلك الحالة الأجتماعية </option>
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
                                <div class="form-group">
                                <label for="exampleInputEmail">المستوى التعليمي للزوج</label>
                                <select class="form-control" id="husb_academicel" name="husb_academicel" placeholder=" أكتب المستوى التعليمي ">
                                   <option label="test">
											حدد من فضلك المستوى التعليمي </option>
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
                                <div class="form-group">
                                    <p class="mg-b-10">هل يوجد لديك اي أمراض</p>
                                    <select class="form-control select2" name="medical_dad" id="medical_dad">
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
                                <div class="form-group">
                                <label for="exampleInputEmail">اختصاص دراسة الزوج</label>
                                <input type="text" class="form-control" id="husb_special" name="husb_special" placeholder=" أكتب اسم  اختصاص ">
                                </div>

                                <div class="form-group">
                                <label for="exampleInputEmail">هل يعمل الزوج؟</label>
                                <select class="form-control select2" name="husb_is_work" id="husb_is_work" placeholder="">
                              <option label="test">
									حدد من فضلك   </option>
                                    <option value="يعمل" >
                                    يعمل
                                </option>
                                <option value="لايعمل" >
                                    لايعمل
                                </option>
								</select>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputEmail">العمل الحالي للزوج</label>
                                <input type="text" class="form-control" id="husb_now_work" name="husb_now_work" placeholder=" أكتب العمل الحالي ">
                                </div>

                                <div class="form-group">
                                <label for="exampleInputEmail">العمل السابق للزوج</label>
                                <input type="text" class="form-control" id="husb_Pre_work" name="husb_Pre_work" placeholder=" أكتب العمل السابق ">
                                </div>
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
                            </div>
                            </div>
				        </div>
                        </div>

                        {{-- Pay --}}
                        {{--  <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">اضافة دفعة مالية للعائلة  </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('pay.store.family') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="modal-body">
                                <div class="form-group">
                                <input type="hidden" name="id" id="id" readonly>
                                <label for="exampleInputEmail">اسم  صاحب القيد</label>
                                <input type="text" class="form-control" id="family_constraint" name="family_constraint" readonly>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">المبلغ المدفوع</label>
                                <input type="text" class="form-control" id="family_value" name="family_value"  placeholder=" أكتب قيمة البملغ المدفوع ">
                                </div>
                                <div class="form-group">
                                <label for="recipient-name" class="col-form-label">المبلغ بالدولار</label>
                                <input class="form-control" name="family_value_usd" id="family_value_usd" type="text" >
                                </div>
                                <div class="form-group">
                                <label for="recipient-name" class="col-form-label">المبلغ باليورو</label>
                                <input class="form-control" name="family_value_euro" id="family_value_euro" type="text" >
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">عدد الكروت</label>
                                    <input class="form-control" name="number_bim_family" id="number_bim_family" type="text" >
                                </div>

                                <div class="modal-body">
                                    <p class="mg-b-10">قيمة الكروت</p>
                                    <select class="form-control select2" name="value_bim_family" id="value_bim_family" >
                                            @foreach($payments as $a)
                                                <option value="{{$a->value_bim}}" >
                                                    {{$a->value_bim}}
                                                </option>                                                   
                                            @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputEmail">ملاحظات</label>
                                <input type="text" class="form-control" id="note" name="note"  placeholder=" أكتب ملاخظات ان وجد ">
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
                            </div>
                         </div>
				        </div>
                        </div>  --}}

                        {{-- add --}}
                        <div class="modal" id="modaldemo8">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">اضافة معلومات عائلة</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="{{ route('family.store') }}" method="POST">
                                        {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="form-group">
                                        <label for="exampleInputEmail">اسم  صاحب القيد</label>
                                        <input type="text" class="form-control" id="family_constraint" name="family_Constraint" placeholder="أكتب اسم صاحب القيد ">
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail">  عدد أفراد العائلة</label>
                                        <input type="number" class="form-control" id="family_number_member" name="family_number_member" placeholder="أكتب  عدد أفراد العائلة  ">
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail"> اسم المعيل الأول</label>
                                        <input type="text" class="form-control" id="family_breadwinner" name="family_breadwinner" placeholder="أكتب اسم المعيل الأول  ">
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail"> عمل المعيل الأول</label>
                                        <input type="text" class="form-control" id="work_breadwinner" name="work_breadwinner" placeholder="أكتب عمل المعيل الأول ">
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail">  اسم المعيل الثاني</label>
                                        <input type="text" class="form-control" id="family_an_breadwinner" name="family_an_breadwinner" placeholder="أكتب اسم المعيل الثاني   ">
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail"> عمل المعيل الثاني</label>
                                        <input type="text" class="form-control" id="work_an_breadwinner" name="work_an_breadwinner" placeholder="أكتب عمل المعيل الثاني  ">
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail">الدخل الشهري من العمل </label>
                                        <input type="text" class="form-control" id="family_monthly_salary" name="family_monthly_salary" placeholder=" أكتب الدخل الشهري  ">
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail">هل يوجد مساعدات</label>
                                        <select class="form-control" id="family_aid" name="family_has_aid"  placeholder="">
                                            <option label="test">
                                                حدد من فضلك </option>
                                            <option value="	يوجد">
                                                يوجد</option>
                                            <option value="	لا يوجد">
                                                لا يوجد</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail"> ماهي المساعدات أو قيمتها</label>
                                        <input type="text" class="form-control" id="family_what_aid" name="family_what_aid"  placeholder=" أكتب ما هي المساعدات أو قيمتها    ">
                                        </div>
                                        <div class="form-group">

                                        <label for="exampleInputEmail"> رقم هاتف الأول </label>
                                        <input type="text" class="form-control" id="phone" name="phone"  placeholder=" أكتب رقم الهاتف بدءً من 05 ">

                                        <label for="exampleInputEmail"> ماهي قيمة المساعدات</label>
                                        <input type="text" class="form-control" id="aid_value" name="aid_value"  placeholder=" أكنب أسم المدينة  ">
                                        </div>                                        
                                        <div class="form-group">
                                        <label for="exampleInputEmail">هاتف</label>
                                        <input type="text" class="form-control" id="phone" name="phone"  placeholder=" أكنب تاريخ الدخول الى تركيا ">
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail"> رقم هاتف ثاني</label>
                                        <input type="text" class="form-control" id="sec_phone" name="sec_phone"  placeholder=" أكتب رقم هاتف ثاني بدءً من 05 ">
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail">ملاحظات</label>
                                        <input type="text" class="form-control" id="note" name="note"  placeholder=" أكتب ملاحظات ان وجد ">
                                        </div>
                                        </div>
                                    <div class="modal-footer">
                                        <button class="btn ripple btn-primary" type="submit">حفظ المعلومات</button>
                                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">اغلاق</button>
                                    </div>
                            </form>
                            </div>
                            </div>
                        </div>

                        {{-- delete --}}
                        <div class="modal" id="modaldemo9">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">حذف العائلة من السجل</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                            type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="{{ route('family.destroy') }}" method="post">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <p>هل انت متاكد من عملية الحذف لهذه العائلة ؟</p><br>
                                            <input type="hidden" name="id" id="id" value="">
                                            <input class="form-control" name="family_Constraint" id="family_constraint" type="text" readonly>
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
                                        <h5 class="modal-title" id="exampleModalLabel">تعديل معلومات العائلة</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ route('family.update') }}" method="post" autocomplete="off">
                                        {{ method_field('patch') }}
                                        {{ csrf_field() }}
                                     <div class="modal-body">
                                        <div class="form-group">
                                        <input type="hidden" class="form-control" id="id" name="id" >
                                        <label for="exampleInputEmail">اسم  صاحب القيد</label>
                                        <input type="text" class="form-control" id="family_constraint" name="family_Constraint" placeholder="أكتب اسم الطالب ">
                                        </div>

                                        <div class="form-group">
                                        <label for="exampleInputEmail">  عدد أفراد</label>
                                        <input type="number" class="form-control" id="family_number_member" name="family_number_member" placeholder="أكتب تاريخ الميلاد ">
                                        </div>

                                        <div class="form-group">
                                        <label for="exampleInputEmail"> المعيل الأول</label>
                                        <input type="text" class="form-control" id="family_breadwinner" name="family_breadwinner" placeholder="أكتب تاريخ الميلاد ">
                                        </div>

                                        <div class="form-group">
                                        <label for="exampleInputEmail"> عمل المعيل الأول</label>
                                        <input type="text" class="form-control" id="work_breadwinner" name="work_breadwinner" placeholder="أكتب تاريخ الميلاد ">
                                        </div>

                                        <div class="form-group">
                                        <label for="exampleInputEmail"> المعيل الثاني</label>
                                        <input type="text" class="form-control" id="family_an_breadwinner" name="family_an_breadwinner" placeholder="أكتب العمر بأرقام ">
                                        </div>

                                        <div class="form-group">
                                        <label for="exampleInputEmail"> عمل المعيل الثاني</label>
                                        <input type="text" class="form-control" id="work_an_breadwinner" name="work_an_breadwinner" placeholder="أكتب العمر بأرقام ">
                                        </div>

                                        <div class="form-group">
                                        <label for="exampleInputEmail">الدخل الشهري</label>
                                        <input type="text" class="form-control" id="family_monthly_salary" name="family_monthly_salary" placeholder=" أكتب البريد الإلكتروني ">
                                        </div>

                                        <div class="form-group">
                                        <label for="exampleInputEmail">هل يوجد مساعدات</label>
                                        <select class="form-control" id="family_aid" name="family_has_aid"  placeholder=" أكتب اسم  المحافظة الأصل ">
                                            <option label="test">

                                                حدد من فضلك اسم المحافظة </option>
                                            <option value="	يوجد">

                                                اختر أسم المحافظة </option>
                                            <option value="يوجد">

                                                يوجد</option>
                                            <option value="لا يوجد">
                                                لا يوجد</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                        <label for="exampleInputEmail"> ماهي المساعدات</label>
                                        <input type="text" class="form-control" id="family_what_aid" name="family_what_aid"  placeholder=" أكتب اسم المدينة  ">
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail"> ماهي قيمة المساعدات</label>
                                        <input type="text" class="form-control" id="aid_value" name="aid_value"  placeholder=" أكنب أسم المدينة  ">
                                        </div>      
                                        <div class="form-group">
                                        <label for="exampleInputEmail">هاتف</label>
                                        <input type="text" class="form-control" id="phone" name="phone"  placeholder=" أكتب تاريخ الدخول الى تركيا ">
                                        </div>

                                        <div class="form-group">
                                        <label for="exampleInputEmail">هاتف ثاني</label>
                                        <input type="text" class="form-control" id="sec_phone" name="sec_phone"  placeholder=" أكتب تاريخ الدخول الى تركيا ">
                                        </div>

                                        <div class="form-group">
                                        <label for="exampleInputEmail">ملاحظات</label>
                                        <input type="text" class="form-control" id="note" name="note"  placeholder=" أكتب تاريخ الدخول الى تركيا ">
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
        var family_constraint = button.data('family_constraint')
        var family_number_member = button.data('family_number_member')
        var family_breadwinner = button.data('family_breadwinner')
        var family_an_breadwinner = button.data('family_an_breadwinner')
        var family_monthly_salary = button.data('family_monthly_salary')
        var family_aid = button.data('family_aid')
        var family_what_aid = button.data('family_what_aid')
        var work_breadwinner = button.data('work_breadwinner')
        var work_an_breadwinner = button.data('work_an_breadwinner')
        var aid_value = button.data('aid_value')
        var phone = button.data('phone')
        var sec_phone = button.data('sec_phone')
        var note = button.data('note')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #family_constraint').val(family_constraint);
        modal.find('.modal-body #family_number_member').val(family_number_member);
        modal.find('.modal-body #family_breadwinner').val(family_breadwinner);
        modal.find('.modal-body #family_an_breadwinner').val(family_an_breadwinner);
        modal.find('.modal-body #family_monthly_salary').val(family_monthly_salary);
        modal.find('.modal-body #family_aid').val(family_aid);
        modal.find('.modal-body #aid_value').val(aid_value);
        modal.find('.modal-body #family_what_aid').val(family_what_aid);
        modal.find('.modal-body #sec_phone').val(sec_phone);
        modal.find('.modal-body #work_breadwinner').val(work_breadwinner);
        modal.find('.modal-body #phone').val(phone);
        modal.find('.modal-body #work_an_breadwinner').val(work_an_breadwinner);
        modal.find('.modal-body #note').val(note);
    })
</script>

{{--  delete Student Jquery  --}}
<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var family_constraint = button.data('family_constraint')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #family_constraint').val(family_constraint);
    })
</script>

{{--  Add Student ID   --}}
<script>
    $('#exampleModa20').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var family_id = button.data('family_id')
        var modal = $(this)
        modal.find('.modal-body #family_id').val(family_id);

})
</script>

{{--  Add_Patient_id   --}}
<script>
    $('#exampleModal92').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var family_id = button.data('family_id')
        var modal = $(this)
        modal.find('.modal-body #family_id').val(family_id);

})
</script>

{{--  payment   --}}
<script>
    $('#exampleModal0').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var family_id = button.data('family_id')
        var modal = $(this)
        modal.find('.modal-body #family_id').val(family_id);

})
</script>

{{--  Husband and Wife    --}}
<script>
    $('#exampleModal111').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var family_id = button.data('family_id')
        var modal = $(this)
        modal.find('.modal-body #family_id').val(family_id);
    })
</script>

{{--  children    --}}
<script>
    $('#exampleModal4').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var family_id = button.data('family_id')
        var modal = $(this)
        modal.find('.modal-body #family_id').val(family_id);
    })
</script>

{{--  Add_dollar  --}}
<script>
    $('#exampleModa23').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var family_constraint = button.data('family_constraint')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #family_constraint').val(family_constraint);
})
</script>

{{--  Add_tr  --}}
<script>
    $('#exampleModa24').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var family_constraint = button.data('family_constraint')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #family_constraint').val(family_constraint);
})
</script>


{{--  Add_euro  --}}
<script>
    $('#exampleModa25').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var family_constraint = button.data('family_constraint')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #family_constraint').val(family_constraint);
})
</script>

{{--  Add_bim  --}}
<script>
    $('#exampleModa26').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var family_constraint = button.data('family_constraint')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #family_constraint').val(family_constraint);
})
</script>


{{--  Family_Residance  --}}
<script>
    $('#exampleModal6').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var family_id = button.data('family_id')
        var modal = $(this)
        modal.find('.modal-body #family_id').val(family_id);})
</script>


{{--  Job
<script>
    $('#exampleModal13').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var family_id = button.data('family_id')
        var modal = $(this)
        modal.find('.modal-body #family_id').val(family_id);})
</script>  --}}

@endsection



