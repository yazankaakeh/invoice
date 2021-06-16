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
{{--  @dd($medical)  --}}
@section('title')
قسم الطبي
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="my-auto mb-0 content-title">الأقسام </h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">/قسم الطبي </span>
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
                                        @can(' فورم تسجيل الطبي ')
                                            <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo1"> فورم التسجيل الطبي</a>
                                        @endcan
                                        @can(' اضافة قسم الطبي ')
                                            <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">اضافة مريض</a>
                                        @endcan
                                         </div>
                                    </div>
                                     <div class="pb-0 card-header">
                                        <div class="d-flex justify-content-between">
                                        <div class="dropdown">
                                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                        data-toggle="dropdown" id="dropdownMenuButton" type="button">المزيد من الخيارات <i class="btn btn-primary dropdown-toggle dropdown-toggle-split"></i></button>
                                        <div  class="dropdown-menu tx-13">
                                              @can(' عرض الطبي الجدد')
                                            <a class=" btn btn-outline-primary btn-block"  href="{{route("medical.new")}}"> عرض المرضى الجدد</a>
                                               @endcan
                                                @can(' عرض الطبي المؤجلة ')
                                            <a class=" btn btn-outline-primary btn-block"  href="{{route("medical.delayed")}}"> عرض المرضى المؤجلين</a>
                                                 @endcan
                                                @can(' عرض الطبي المؤرشفة ')
                                            <a class=" btn btn-outline-primary btn-block"  href="{{route("medical.archive")}}"> عرض المرضى المؤرشفين</a>
                                                 @endcan
                                              @can(' عرض الطبي المرفوضة ')
                                            <a class=" btn btn-outline-primary btn-block"  href="{{route("medical.reject")}}"> عرض المرضى المرفوضين</a>
                                             @endcan
                                    </div>
                                    </div>
                                     </div>
                                    </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table key-buttons ">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">Id</th>
                                                    <th class="border-bottom-0">اسم المريض</th>
                                                    <th class="border-bottom-0">العمر</th>
                                                    <th class="border-bottom-0">الجنس</th>
                                                    <th class="border-bottom-0">الحالة الأجتماعية</th>
                                                    <th class="border-bottom-0">المحافظة</th>
                                                    <th class="border-bottom-0">الحي أو المدينة</th>
                                                    <th class="border-bottom-0">هل يوجد هوية</th>
                                                    <th class="border-bottom-0">الولاية</th>
                                                    <th class="border-bottom-0"> الهاتف</th>
                                                    <th class="border-bottom-0">ملاحظات</th>
                                                    <th class="border-bottom-0">تاريخ الإضافة</th>
                                                    <th class="border-bottom-0"> اضافة دفعة بالدولار</th>
                                                    <th class="border-bottom-0">اضافة دفعة تركي</th>
                                                    <th class="border-bottom-0">اضافة دفعة يورو</th>
                                                    <th class="border-bottom-0">اضافة كروت بيم</th>
                                                    {{--  <th class="border-bottom-0">اضافة زوج وزوجة</th>  --}}
                                                    <th class="border-bottom-0">اضافة اب وام</th>
                                                    <th class="border-bottom-0">حذف المريض</th>
                                                    <th class="border-bottom-0">تعديل المريض</th>
                                                    {{--  <th class="border-bottom-0">اضافة اطفال</th>  --}}
                                                    <th class="border-bottom-0">السكن </th>
                                                    <th class="border-bottom-0">الحالة الطبية</th>
                                                    <th class="border-bottom-0">العمل</th>
                                                    <th class="border-bottom-0"> تعديل الحالة</th>
                                                    {{--  <th class="border-bottom-0">إضافة طالب</th>  --}}
                                                    {{--  <th class="border-bottom-0">إضافة مريض</th>  --}}

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($medical as $x)
                                                @if ($x->new_statu == 1)

                                                <tr>
                                                    <td>{{$x->id}}</td>
                                                    <td>{{$x->medical_name}}</td>
                                                    <td>{{$x->medical_age}}</td>
                                                    <td>{{$x->gender}}</td>
                                                    <td>{{$x->status}}</td>
                                                    <td>{{$x->Governorate}}</td>
                                                    <td>{{$x->city}}</td>
                                                    <td>{{$x->medical_have_id}}</td>
                                                    <td>{{$x->medical_id_extr}}</td>
                                                    <td>{{$x->medical_number}}</td>
                                                    <td>{{$x->note}}</td>
                                                    <td>{{$x->created_at}}</td>
                                                <td>
                                                @can(' إضافة دفعة بالدولار الطبي ')
                                                    {{-- Add_Dollar--}}
                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                        data-medical_name="{{$x->medical_name}}"  data-id="{{ $x->id }}"
                                                        data-description="" data-toggle="modal" data-medical_id="{{ $x->medical_id }}"
                                                        href="#exampleModa23" title="دفع بالدولار">
                                                        <i class="cf cf-zec"  style="font-size: 20px;"></i>
                                                    </a>
                                                @endcan
                                                @can( ' مدفوعات بالدولار الطبي ')
                                                    @if($x->usd_statu != 0)
                                                    <hr style="padding:0px; margin:5px 0px 5px 0px!important; margin-top:5px; margin-bottom:5px;">
                                                    <a class=" btn btn-sm btn-info" href="/Medical_usd/show/medical/usd/{{$x->id}}"><i class="far fa-eye"  style="font-size: 17px;"></i> </a>
                                                    @endif
                                                @endcan
                                                </td>

                                                <td>
                                                @can(' إضافة دفعة بالتركي الطبي ')
                                                    {{-- Add_Tr--}}
                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                        data-medical_name="{{$x->medical_name}}"  data-id="{{ $x->id }}"
                                                        data-medical_id="{{ $x->medical_id }}"
                                                        data-description="" data-toggle="modal"
                                                        href="#exampleModa24" title="دفع بالتركي">
                                                        <i class="cf cf-zec"  style="font-size: 20px;"></i>
                                                    </a>
                                                @endcan
                                                @can(' مدفوعات بالتركي الطبي ')
                                                    @if($x->tr_statu != 0)
                                                    <hr style="padding:0px; margin:5px 0px 5px 0px!important; margin-top:5px; margin-bottom:5px;">
                                                    <a class=" btn btn-sm btn-info" href="/Medical_tr/show/medical/tr/{{$x->id}}"><i class="far fa-eye"  style="font-size: 17px;"></i> </a>
                                                    @endif
                                                @endcan
                                                </td>

                                                <td>
                                                @can(' إضافة دفعة باليورو الطبي ')
                                                    {{-- Add_Euro--}}
                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                        data-medical_name="{{$x->medical_name}}"  data-id="{{ $x->id }}"
                                                        data-description="" data-toggle="modal"
                                                        href="#exampleModa25" title="دفع باليورو">
                                                        <i class="cf cf-zec"  style="font-size: 20px;"></i>
                                                    </a>
                                                @endcan
                                                @can(' مدفوعات باليورو الطبي ')
                                                    @if($x->euro_statu != 0)
                                                    <hr style="padding:0px; margin:5px 0px 5px 0px!important; margin-top:5px; margin-bottom:5px;">
                                                    <a class=" btn btn-sm btn-info" href="/Medical_euro/show/medical/euro/{{$x->id}}"><i class="far fa-eye"  style="font-size: 17px;"></i> </a>
                                                    @endif
                                                @endcan
                                                </td>

                                                <td>
                                                    {{-- Add_Bim--}}
                                                @can(' إضافة دفعة بالكرت البيم الطبي ')
                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                        data-medical_name="{{$x->medical_name}}"  data-id="{{ $x->id }}"
                                                        data-description="" data-toggle="modal"
                                                        href="#exampleModa26" title="دفع كروت">
                                                        <i class="cf cf-zec"  style="font-size: 20px;"></i>
                                                    </a>
                                                @endcan
                                                @can(' مدفوعات بالكرت البيم الطبي ')
                                                    @if($x->bim_statu != 0)
                                                    <hr style="padding:0px; margin:5px 0px 5px 0px!important; margin-top:5px; margin-bottom:5px;">
                                                    <a class=" btn btn-sm btn-info" href="/Medical_bim/show/medical/bim/{{$x->id}}/"><i class="far fa-eye"  style="font-size: 17px;"></i> </a>
                                                    @endif
                                                @endcan
                                                </td>

                                                    {{-- father and mother  --}}
                                                    @if($x->father_mother_statu == 1)
                                                    <td>
                                                @can(' قسم الأب والأم الطبي ')
                                                        <a class="btn btn-sm btn-info" href="/father_and_mother_medical/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                @endcan
                                                    </td>
                                                    @elseif($x->father_mother_statu == 0)
                                                    <td>
                                                @can(' إضافة الأب والأم الطبي ')
                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                        data-medical_id="{{$x->id}}"
                                                        data-toggle="modal"
                                                        href="#exampleModal0" title="إضافة زوج و زوجة">
                                                        <i class="mdi mdi-account-multiple-plus" style="font-size: 18px;"></i>
                                                    </a>
                                                @endcan
                                                    </td>
                                                    @endif


                                                    <td>
                                                    {{-- delete medical  --}}
                                                @can(' حذف الطبي ')
                                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                            data-id="{{$x->id}}" data-medical_name="{{$x->medical_name}}"
                                                            data-toggle="modal" href="#modaldemo9" title="حذف">
                                                            <i class="las la-trash"  style="font-size: 20px;"> </i>
                                                        </a>
                                                @endcan
                                                    </td>

                                                    <td>
                                                    {{-- edit medical  --}}
                                                @can(' تعديل الطبي ')
{{--
                                                    <td>{{$x->medical_name}}</td>
                                                    <td>{{$x->medical_age}}</td>
                                                    <td>{{$x->gender}}</td>
                                                    <td>{{$x->status}}</td>
                                                    <td>{{$x->Governorate}}</td>
                                                    <td>{{$x->city}}</td>
                                                    <td>{{$x->medical_have_id}}</td>
                                                    <td>{{$x->medical_id_extr}}</td>
                                                    <td>{{$x->medical_number}}</td>
                                                    <td>{{$x->note}}</td> --}}
                                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                            data-medical_name="{{$x->medical_name}}"
                                                            data-medical_age="{{$x->medical_age}}" data-medical_number="{{$x->medical_number}}"
                                                            data-medicalid="{{$x->medical_have_id}}" data-id="{{$x->id}}"
                                                            data-medical_id_extr="{{$x->medical_id_extr}}" data-gender="{{$x->gender}}"
                                                            data-status="{{$x->status}}"
                                                            data-governorate="{{$x->Governorate}}"
                                                            data-city="{{$x->city}}"
                                                            data-note="{{$x->note}}"
                                                            data-description="" data-toggle="modal" href="#exampleModal2" title="تعديل">
                                                            <i class="las la-pen"  style="font-size: 20px;"></i>
                                                        </a>
                                                @endcan
                                                    </td>

                                                    @if($x->residance_statu == 1)
                                                    <td>
                                                @can(' قسم السكن الطبي ')
                                                        <a class=" btn btn-sm btn-info" href="/address_medical/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>

                                                @endcan
                                                    </td>
                                                    @elseif($x->residance_statu == 0)
                                                    {{-- Stduent_Residance  --}}
                                                    <td>
                                                @can(' إضافة السكن الطبي ')
                                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                            data-medical_id="{{$x->id}}"  data-description="" data-toggle="modal"
                                                            href="#exampleModal6" title="إضافة سكن للطالب">
                                                            <i class=" las la-home"  style="font-size: 20px;"></i>
                                                        </a>
                                                @endcan
                                                    </td>
                                                    @endif

                                                    {{-- Medical_Status  --}}
                                                    @if($x->medical_statu == 1)
                                                    <td>
                                                @can(' قسم الحالة الصحية الطبي ')
                                                        <a class=" btn btn-sm btn-info" href="/Medical_Statu_Medical/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                @endcan
                                                    </td>
                                                    @elseif($x->medical_statu == 0)
                                                    <td>
                                                @can(' إضافة الحالة الصحية الطبي ')
                                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                            data-medical_id="{{$x->id}}"  data-description="" data-toggle="modal"
                                                            href="#exampleModal5" title="إضافة حالة طبية">
                                                            <i class="fas fa-heartbeat"  style="font-size: 20px;"></i>
                                                        </a>
                                                @endcan
                                                    </td>
                                                    @endif

                                                    {{-- Job  --}}
                                                    @if($x->job_statu == 1)
                                                    <td>
                                                @can(' قسم العمل الطبي ')
                                                        <a class=" btn btn-sm btn-info" href="/job_medical/show/medical/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                @endcan
                                                    </td>
                                                    @elseif($x->job_statu == 0)
                                                    <td>
                                                @can(' إضافة العمل الطبي ')
                                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                            data-medical_id="{{$x->id}}"  data-description="" data-toggle="modal"
                                                            href="#exampleModal13" title="إضافة معلومات العمل">
                                                            <i class="fas fa-briefcase"  style="font-size: 20px;"></i>
                                                        </a>
                                                @endcan
                                                    </td>
                                                    @endif
                                                    <td>
                                                        @can(' عرض حالة الطبي ')
                                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                        data-medical_name="{{$x->medical_name}}"  data-medical_id="{{$x->id}}"
                                                        data-description="" data-toggle="modal"
                                                        href="#exampleModal160" title="تعديل الحالة">
                                                        <i class="si si-user-follow"  style="font-size: 20px;"></i>
                                                    </a>
                                                    @endcan
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

                            @if (session()->has('Add_MedicalStatues'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_MedicalStatues') }}</strong>
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

                            @if (session()->has('Add_student_error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_student_error') }}</strong>
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

                            @if (session()->has('Add_fatherandmother'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_fatherandmother') }}</strong>
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

                        {{-- medical statu --}}
                        <div class="modal fade" id="exampleModal160" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">تعديل حالة المريض </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('medical.statu') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <p>أسم المريض</p>
                                <input type="text" class="form-control select2" id="medical_name" name="medical_name"  readonly>
                                <input type="hidden" name="medical_id" id="medical_id" readonly>
                                <div class="form-group">
                                <div class="modal-body">
                                <p class="mg-b-10">حالة المريض</p>
                                    <select class="form-control select2" name="statu" id="statu" >
                                    <option value="1" >
                                        مقبول
                                    </option>
                                    <option value="0" >
                                        جديد
                                    </option>
                                    <option value="3" >
                                        ارشيف
                                    </option>
                                    <option value="4" >
                                        مؤجل
                                    </option>
                                    <option value="2" >
                                        مرفوض
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
				        </div>
                        </div>

                        {{-- Add_Dollar --}}
                        <div class="modal fade" id="exampleModa23" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">اضافة دفعة بالجولار</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('usd.store.medical') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="form-group">
                                <input type="hidden" name="medical_id" id="id" readonly>
                                <label for="exampleInputEmail">اسم صاحب القيد</label>
                                <input type="text" class="form-control" id="medical_name" name="medical_name" readonly>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">المبلغ المدفوع بالدولار</label>
                                <input type="text" class="form-control" id="medical_value_usd" name="medical_value_usd" placeholder="   أكنب قيمة المبلغ بالدولار ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">ملاحظات</label>
                                <input type="textarea" class="form-control" id="note" name="note" placeholder=" أكتب ملاحظة ان وجد">
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
                                <h5 class="modal-title" id="exampleModalLabel">اضافة دفعة بالتركي</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('tr.store.medical') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="form-group">
                                <input type="hidden" name="medical_id" id="id" readonly>
                                <label for="exampleInputEmail">اسم صاحب القيد</label>
                                <input type="text" class="form-control" id="medical_name" name="medical_name" readonly>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">المبلغ المدفوع بالتركي</label>
                                <input type="text" class="form-control" id="medical_value" name="medical_value_tr" placeholder="   أكنب قيمة المبلغ بالتركي   ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">ملاحظات</label>
                                <input type="textarea" class="form-control" id="note" name="note" placeholder="أكتب ملاحظة ان وجد ">
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
                                <h5 class="modal-title" id="exampleModalLabel">اضافة دفعة باليورو</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('euro.store.medical') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="form-group">
                                <input type="hidden" name="medical_id" id="id" readonly>
                                <label for="exampleInputEmail">اسم صاحب القيد</label>
                                <input type="text" class="form-control" id="medical_name" name="medical_name" readonly>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">المبلغ المدفوع باليورو</label>
                                <input type="text" class="form-control" id="medical_value_euro" name="medical_value_euro" placeholder="   أكتب قيمة المبلغ باليورو ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">ملاحظات</label>
                                <input type="textarea" class="form-control" id="note" name="note" placeholder="   أكتب ملاحظة ان وجد">
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
                                <h5 class="modal-title" id="exampleModalLabel">اضافة كرت بيم </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('bim.store.medical') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="form-group">
                                <input type="hidden" name="medical_id" id="id" readonly>
                                <label for="exampleInputEmail">اسم صاحب القيد</label>
                                <input type="text" class="form-control" id="medical_name" name="medical_name" readonly>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">عدد كروت البيم</label>
                                <input type="text" class="form-control" id="number_bim_medical" name="number_bim_medical" placeholder="أكتب قيمة عدد كروت البيم ">
                                </div>
                                <div class="modal-body">
                                    <p class="mg-b-10">قيمة الكروت</p>
                                    <select class="form-control select2" name="value_bim_medical" id="value_bim_medical" >
                                            @foreach($payments as $a)
                                                <option value="{{$a->value_bim}}" >
                                                    {{$a->value_bim}}
                                                </option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">ملاحظات</label>
                                <input type="textarea" class="form-control" id="note" name="note" placeholder="  أكتب ملاحظة ان وجد">
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

                        {{-- Job --}}
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
                                <form action="{{ route('job.medical.store') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="modal-body">

                                <input type="hidden" name="medical_id" id="medical_id" readonly>
                                    <div class="form-group">
                                    <p class="mg-b-10">هل تعمل؟</p>
                                    <select class="form-control select2" name="job_have" id="job_have"required>
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
                                <input type="text" class="form-control" id="job_type" name="job_type" placeholder="   أكنب ماهو العملك "required>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">مكان العمل؟</label>
                                <input type="text" class="form-control" id="job_place" name="job_place" placeholder="   أكنب ماهو العملك "required>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">الراتب الشهري؟</label>
                                <input type="number" class="form-control" id="job_monthly_salary" name="job_monthly_salary" placeholder="   أكنب ماهو العملك "required>
                                </div>
                                <div class="form-group">
                                   <p class="mg-b-10">هل لديك عمل سابق؟</p>
                                   <select class="form-control select2" name="job_last_have" id="job_last_have"required >
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
                                <input type="text" class="form-control" id="job_last_type" name="job_last_type" placeholder="   أكنب ماهو العملك السابق "required>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">كم راتبك السابق بعملك السابق؟</label>
                                <input type="number" class="form-control" id="job_last_salary" name="job_last_salary" placeholder="   كم ماهو الراتبك بالعمل السابق"required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail">ملاحظة</label>
                                    <input type="text" class="form-control" id="note" name="note" placeholder=" أكتب ملاحظة ان وجد "required>
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

                        {{-- Medical_Status --}}
                        <div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">الحالة الصحية</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('Medical_Statu.medical.store') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="modal-body">
                                <div class="form-group">
                                <input type="hidden" name="medical_id" id="medical_id" readonly>
                                </div>
                                 <div class="form-group">{{-- it must be select options  --}}
                                    <p class="mg-b-10">هل يوجد لديك اي أمراض</p>
                                    <select class="form-control select2" name="disease_type" id="disease_type"required>
                                        <option label="test">
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
                                        <option value="لايوجد" >
                                            لايوجد
                                         </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">اسم المرض</label>
                                <input type="text" class="form-control" id="disease_name" name="disease_name" placeholder=" أكتب اسم المرض أو أسم الشكايه"required>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">اسم الدكتور</label>
                                <input type="text" class="form-control" id="dr_name" name="dr_name" placeholder=" أكتب اسم الطبيب"required>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">تكلفة العلاج</label>
                                <input type="text" class="form-control" id="treat_cost" name="treat_cost" placeholder="أكتب تكلفة العلاج "required>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">نوع العلاج</label>
                                <input type="text" class="form-control" id="treat_type" name="treat_type" placeholder=" أكتب نوع العلاج "required>
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
                               <div class="form-group">
                                <label for="exampleInputEmail">مدة العلاج</label>
                                <input type="text" class="form-control" id="treat_Duratio" name="treat_Duratio" placeholder=" أكتب مدة العلاج"required>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">تاريخ بدء العلاج</label>
                                <input type="date" class="form-control" id="date_accept" name="date_accept" placeholder=" أكتب تاريخ بدء العلاج"required>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">تاريخ الانتهاء من العلاج</label>
                                <input type="date" class="form-control" id="date_end" name="date_end" placeholder=" أكتب تاريخ الأنتهاء العلاج"required>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">  تحويل لطبيب آخر؟ مع ذكر الاسم </label>
                                <input type="text" class="form-control" id="Trans_to_doctor" name="Trans_to_doctor" placeholder=" أذكر اسم الطبيب ان وجد"required>
                                </div>
                                <div class="form-group">
                                 <label for="exampleInputEmail">ملاحظة</label>
                                 <Input type="text" class="form-control" id="note" name="note" placeholder=" أكتب ملاحظة ان وجد"required>
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
                                <form action="{{ route('address.medical.store') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                   <div class="modal-body">
                                <div class="form-group">
                                <input type="hidden" name="medical_id" id="medical_id"  readonly>
                                <label for="exampleInputEmail">اسم المحافظة</label>
                                <select type="text" class="form-control" id="address_country" name="address_country" placeholder=""required>
                                <option label="test">
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
                                <div class="form-group">
                                <label for="exampleInputEmail">اسم منطقة</label>
                                <input type="text" class="form-control" id="address_city" name="address_city" placeholder=" أكتب اسم منطقة "required>
                                </div>

                                 <div class="form-group">
                                <label for="exampleInputEmail">العنوان كما في الفاتورة</label>
                                <input type="text" class="form-control" id="address_like_bill" name="address_like_bill" placeholder=" أكتب عنوان كما في الفاتورة  "required>
                                </div>

                                 <div class="form-group">
                                <label for="exampleInputEmail">عنوان السكن السابق في سوريا</label>
                                <input type="text" class="form-control" id="address_last" name="address_last" placeholder=" أكتب عنوان السكن السابق في سوريا"required>
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
                                <form action="{{ route('children.store.medical') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="modal-body">
                                <div class="form-group">
                                <input type="hidden" name="medical_id" id="medical_id" readonly>
                                <label for="exampleInputEmail">اسم الطفل</label>
                                <input type="text" class="form-control" id="childre_name" name="childre_name" placeholder=" أكتب اسم الطفل "required>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">العمر</label>
                                <input type="number" class="form-control" id="childre_age" name="childre_age" placeholder=" أكتب  العمر بالرقم "required>
                                </div>
                                <div class="form-group">{{-- it must be select options  --}}
                                    <p class="mg-b-10">الجنس</p>
                                    <select class="form-control select2" name="childre_gender" id="childre_gender" placeholder=" "required>
                                        <option label="test">
											     </option>
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
                                <select type="text" class="form-control" id="childre_educa_leve" name="childre_educa_leve" placeholder=" "required>
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
                                 <option> value="دبلوم عالي ">
                                    دبلوم عالي </option>
                                 <option value="جامعي">
                                    جامعي </option>
                                <option value="مايجستير">
                                    مايجستير </option>
                                 <option value="دوكتورا">
                                    دوكتورا </option>
                                </select>
                                </div>
                                 <div class="form-group">
                                <label for="exampleInputEmail"> رقم الصف الدراسي </label>
                                <input type="text" class="form-control" id="childre_class_number" name="childre_class_number" placeholder="  أكتب رقم الصف الدراسي "required>
                                </div>
                                <div class="form-group">{{-- it must be select options  --}}
                                    <p class="mg-b-10">الهوية الشخصية من اي ولاية</p>
                                    <select class="form-control select2" name="childre_id_extr" id="childre_id_extr" placeholder=" أختر من اسم الولاية الصادرة منها الكملك "required>
                                        <option label="test">
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
                                 <div class="form-group">{{-- it must be select options  --}}
                                    <p class="mg-b-10">هل يعيشون معكم</p>
                                    <select class="form-control select2" name="childre_live_with" id="childre_live_with" placeholder=" هل الأطفال يعيشون معكم "required>
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

                        {{--  enable  --}}
                        <div class="modal" id="modaldemo1">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title"> قسم الطبي </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>

                                <form action="{{ route('medical.enable') }}" method="GET">
                                {{ method_field('GET') }}
                                {{ csrf_field() }}
                                 <div class="modal-body">
                                  <div class="form-group">{{-- it must be select options  --}}
                                    <p class="mg-b-10">تفعيل فورم التسجيل للطبي</p>
                                    <select class="form-control select2" name="enable" id="enable" placeholder=" أكتب الجنس الطفل ">
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

                        {{-- Father and Mother --}}
                        <div class="modal fade" id="exampleModal0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">اضافة الأب و الأم </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('FatherandMother.medical.store') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="modal-body">
                                <div class="form-group">
                                <input type="HIDDEN" name="medical_id" id="medical_id"  readonly>

                                <label for="exampleInputEmail">اسم الأم</label>
                                <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder=" أكتب اسم الأم  "required>
                                </div>

                                 <div class="form-group">
                                <label for="exampleInputEmail">تاريخ ميلاد الأم</label>
                                <input type="date" class="form-control" id="mother_birth" name="mother_birth" placeholder=" أكتب تاريخ الميلاد "required>
                                </div>

                                 <div class="form-group">
                                <label for="exampleInputEmail">من اي محافظة من سوريا؟</label>
                                <select class="form-control" id="mother_origin" name="mother_origin" placeholder=" أكتب اسم المحافظة "required>
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
                                    <input type="text" class="form-control" id="mother_origin_city" name="mother_origin_city" placeholder=" أكتب اسم المدينة"required>
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
                                 <div class="form-group">
                                <label for="exampleInputEmail">المستوى التعليمي للأم</label>
                                <select class="form-control" id="mother_academicel" name="mother_academicel" placeholder=" أكتب المستوى النعليمي "required>
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
                                <option value="مايجستير">
                                    مايجستير </option>
                                 <option value="دوكتورا">
                                    دوكتورا </option>
                                </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">اختصاص دراسة الأم</label>
                                <input type="text" class="form-control" id="mother_special" name="mother_special" placeholder=" أكتب اسم الأختصاص"required>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">هل تعمل الأم</label>
                                <select class="form-control select2" name="mother_is_work" id="mother_is_work" placeholder="هل الأم تعمل ام لا تعمل"required>
                                    <option label="test">
                                          </option>
                                    <option value="تعمل" >
                                    تعمل
                                </option>
                                <option value="لاتعمل" >
                                    لاتعمل
                                </option>
								</select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">العمل الحالي للأم</label>
                                <input type="text" class="form-control" id="mother_now_work" name="mother_now_work" placeholder=" أكتب العمل الحالي للأم"required>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">الراتب الشهري للأم</label>
                                <input type="text" class="form-control" id="mother_salary" name="mother_salary" placeholder="  أكتب الراتب الشهري للأم "required>
                                </div>

                                {{--  Father Part  --}}
                                <hr>
                                <h4> ادخل معلومات الأب: </h4>
                                <div class="form-group">
                                <label for="exampleInputEmail">اسم الأب</label>
                                <input type="text" class="form-control" id="father_name" name="father_name" placeholder=" أكتب اسم الأب "required>
                                </div>
                                 <div class="form-group">
                                <label for="exampleInputEmail">تاريخ ميلاد الأب</label>
                                <input type="date" class="form-control" id="father_birth" name="father_birth" placeholder=" أكتب تاريخ ميلاد الأب"required>
                                </div>
                                 <div class="form-group">
                                <label for="exampleInputEmail">من اي محافظة من سوريا؟</label>
                                <select class="form-control" id="father_origin" name="father_origin" placeholder=" أكتب اسم المحافظة "required>
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
                                    <input type="text" class="form-control" id="father_origin_city" name="father_origin_city" placeholder=" أكتب اسم المدينة"required>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">المستوى التعليمي للأب</label>
                                <select class="form-control" id="father_academicel" name="father_academicel" placeholder=" أكتب المستوى التعليمي "required>
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
                                <option value="مايجستير">
                                    مايجستير </option>
                                 <option value="دوكتورا">
                                    دوكتورا </option>
                                </select>
                                </div>
                                <div class="form-group">
                                    <p class="mg-b-10">هل يوجد لديك اي أمراض</p>
                                    <select class="form-control select2" name="medical_dad" id="medical_dad"required>
                                        <option label="test">
											  </option>
                                        <option value="لايوجد" >
                                        لايوجد
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
                                <div class="form-group">
                                <label for="exampleInputEmail">اختصاص دراسة الأب</label>
                                <input type="text" class="form-control" id="father_special" name="father_special" placeholder=" أكتب اسم الأختصاص"required>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputEmail">هل يعمل للأب</label>
                                <select class="form-control select2" name="father_is_work" id="father_is_work" placeholder=" "required>
                                    <option label="test">
                                           </option>
                                    <option value="يعمل" >
                                    يعمل
                                </option>
                                <option value="لايعمل" >
                                    لايعمل
                                </option>
								</select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">العمل الحالي للأب</label>
                                <input type="text" class="form-control" id="father_now_work" name="father_now_work" placeholder=" أكتب العمل الحالي للأب "required>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputEmail">الراتب الشهري للأب</label>
                                <input type="text" class="form-control" id="father_salary" name="father_salary" placeholder=" أكتب الراتب الشهري "required>
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

                        {{-- add --}}
                        <div class="modal" id="modaldemo8">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">اضافة معلومات المريض.</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="{{ route('medical.store') }}" method="POST">
                                        {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="form-group">
                                        <label for="exampleInputEmail">اسم المريض</label>
                                        <input type="text" class="form-control" id="medical_name" name="medical_name" placeholder="أكنب اسم المريض بالكامل "required>
                                        <input class="form-control" value="admin"  name="register" type="hidden">
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail">  عمر المريض</label>
                                        <input type="number" class="form-control" id="medical_age" name="medical_age" placeholder="أكنب العمر المريض بأرقام "required>
                                        </div>

                                        <div class="form-group">
                                        <label for="exampleInputEmail">جنس</label>
                                        <select class="form-control" id="gender" name="gender"  placeholder=""required>
                                            <option label="test">
                                                  </option>
                                            <option value="ذكر">
                                                ذكر</option>
                                            <option value="	انثى">
                                                انثى</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail">الحالة الأجتماعية</label>
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
                                         <div class="form-group">
                                        <label for="exampleInputEmail">من اي محافظة من سوريا؟</label>
                                         <select class="form-control" id="governorate" name="Governorate" placeholder=" أكتب اسم  محافظة "required>
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

                                <div class="form-group">
                                    <label for="exampleInputEmail">من اي مدينة؟</label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder=" أكتب اسم  المدينة أو الحي "required>
                                </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail">هل يوجد كملك</label>
                                        <select class="form-control" id="medical_have_id" name="medical_have_id"  placeholder=" "required>
                                            <option label="test">
                                                  </option>
                                            <option value="	يوجد">
                                                يوجد</option>
                                            <option value="	لا يوجد">
                                                لا يوجد</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                        <label for="exampleInputEmail"> الولاية</label>
                                        <select type="text" class="form-control" id="medical_id_extr" name="medical_id_extr" placeholder=""required>
                                        <option label="test">
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
                                        <div class="form-group">
                                        <label for="exampleInputEmail"> رقم هاتف المريض</label>
                                        <input type="text" class="form-control" id="medical_number" name="medical_number" placeholder="أكنب رقم الهاتف بدءً من 05"required>
                                        </div>

                                        <div class="form-group">
                                        <label for="exampleInputEmail">ملاحظات</label>
                                        <input type="textarea" class="form-control" id="note" name="note"  placeholder=" أكنب ملاحظات ان جد"required>
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
                                        <h6 class="modal-title">حذف المريض من السجل</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                            type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="{{ route('medical.destroy') }}" method="post">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <p>هل انت متاكد من عملية الحذف لهذا المريض ؟</p><br>
                                            <input type="hidden" name="id" id="id" value="">
                                            <input class="form-control" name="medical_name" id="medical_name" type="text" readonly>
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
                                        <h5 class="modal-title" id="exampleModalLabel">تعديل معلومات المريض</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ route('medical.update') }}" method="post" autocomplete="off">
                                        {{ method_field('patch') }}
                                        {{ csrf_field() }}
                                     <div class="modal-body">
                                        <div class="form-group">
                                        <label for="exampleInputEmail">اسم المريض</label>
                                        <input type="text" class="form-control" id="medical_name" name="medical_name" placeholder="أكنب اسم المريض ">
                                        <input type="hidden" class="form-control" id="id" name="id" placeholder="أكنب اسم المريض ">
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail">  عمر المريض</label>
                                        <input type="number" class="form-control" id="medical_age" name="medical_age" placeholder="أكنب عمر المريض  "required>
                                        </div>

                                        <div class="form-group">
                                        <label for="exampleInputEmail">الجنس</label>
                                        <select class="form-control" id="gender" name="gender"  placeholder=" "required>
                                            <option label="test">
                                                  </option>
                                            <option value="ذكر">
                                                ذكر</option>
                                            <option value="	انثى">
                                                انثى</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail">الحالة الأجتماعية</label>
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
                                                 أعزب/ة</option>
                                                </select>
                                            </div>

                                        <div class="form-group">
                                            <p class="exampleInputEmail">من اي محافظة من سوريا؟ </p>
                                            <select class="form-control select2" id="governorate" name="Governorate"  placeholder=" أكتب اسم  محافظة "required>
                                            <option label="test">
                                                </option>
                                            <option value="دمشق">
                                                دمشق</option>
                                            <option value="ريف دمشق">
                                                ريف دمشق</option>
                                            <opt\ion value="حلب ">
                                                حلب</option>
                                            <option value="حمص">
                                                حمص</option>
                                            <option value="حماه">
                                                حماه</option>
                                            <option value="درعا">
                                                درعا</option>
                                            <option value="ادلب">
                                                ادلب</option>
                                            <option value="سويداء">
                                                سويداء</option>
                                            <option value="ديرالزور">
                                                دير الزور</option>
                                            <option value="الرقة">
                                                الرقة</option>
                                            <option value="الحسكة">
                                                الحسكة</option>
                                            <option value="اللاذقية">
                                                اللاذقية</option>
                                            <option value="طرطوس">
                                                طرطوس</option>
                                            <option value="القنيطرة">
                                                القنيطرة</option>
                                            </select>
                                        </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail">من اي مدينة؟</label>
                                                <input type="text" class="form-control" id="city" name="city" placeholder=" أكتب اسم  المدينة "required>
                                            </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail">هل يوجد كملك</label>
                                        <select class="form-control" id="medicalid" name="medicalid"  placeholder=" أكنب اسم المحافظة الأصل "required>
                                            <option label="test">
                                                  </option>
                                            <option value="يوجد">
                                                يوجد</option>
                                            <option value="لا يوجد">
                                                لا يوجد</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                        <label for="exampleInputEmail"> الولاية</label>
                                        <select type="text" class="form-control" id="medical_id_extr" name="medical_id_extr" placeholder="أكنب اسم الولاية  "required>
                                        <option label="test">
                                        </option>
                                                <option value="لايوجد كملك" >
                                                    لايوجد كملك
                                                <option value="أضنة">
                                                    أضنة</option>
                                                <option value="أدي‌يمن">
                                                    أدي‌يمن</option>
                                                <option value="أفيون ‌قرةحصار">
                                                    أفيون ‌قرةحصار</option>
                                                <option value="أغري">
                                                    أغري</option>
                                                <option value="أماسيا">
                                                    أماسيا</option>
                                                <option value="أنقرة">
                                                    أنقرة</option>
                                                <option value="أنطاليا">
                                                    أنطاليا</option>
                                                <option value="أرتڤين">
                                                    أرتڤين</option>
                                                <option value="أيدين">
                                                    أيدين</option>
                                                <option value="بالكسير">
                                                    بالكسير</option>
                                                <option value="بيلجيك">
                                                    بيلجيك</option>
                                                <option value="بينگول">
                                                    بينگول</option>
                                                <option value="بيطليس">
                                                    بيطليس</option>
                                                <option value="بولو">
                                                    بولو</option>
                                                <option value="بوردور">
                                                    بوردور</option>
                                                <option value="بورصة">
                                                    بورصة</option>
                                                <option value="چنق‌قلعه">
                                                    چنق‌قلعه</option>
                                                <option value="شانكيري">
                                                    شانكيري</option>
                                                <option value="چوروم">
                                                    چوروم</option>
                                                <option value="دنيزلي">
                                                    دنيزلي</option>
                                                <option value="ديار بكر">
                                                    ديار بكر</option>
                                                <option value="إدرنه">
                                                    إدرنه</option>
                                                <option value="الازيغ">
                                                    الازيغ</option>
                                                <option value="إرزنجان">
                                                    إرزنجان</option>
                                                <option value="أرض‌ روم">
                                                    أرض‌ روم</option>
                                                <option value="إسكي‌ شهر">
                                                    إسكي‌ شهير</option>
                                                <option value="غازي‌عنتاپ">
                                                    غازي‌عنتاپ</option>
                                                <option value="گره‌سون">
                                                    گره‌سون</option>
                                                <option value="گوموش‌خانه">
                                                    گوموش‌خانه</option>
                                                <option value="حكاري">
                                                    حكاري</option>
                                                <option value="هاتاي">
                                                    هاتاي</option>
                                                <option value="إسبرطة">
                                                    إسبرطة</option>
                                                <option value="مرسين">
                                                    مرسين</option>
                                                <option value="إسطنبول">
                                                    إسطنبول</option>
                                                <option value="إزمير">
                                                    إزمير</option>
                                                <option value="قارص">
                                                    قارص</option>
                                                <option value="كاستامونو">
                                                    كاستامونو</option>
                                                <option value="قيصري">
                                                    قيصري</option>
                                                <option value="كريك‌قلعه">
                                                    كريك‌قلعه</option>
                                                <option value="كيرشهر">
                                                    كيرشهر</option>
                                                <option value="خوجةإلي">
                                                    خوجةإلي</option>
                                                <option value="قونيا">
                                                    قونيا</option>
                                                <option value="كوتاهيا">
                                                    كوتاهيا</option>
                                                <option value="ملاطيا">
                                                    ملاطيا</option>
                                                <option value="مانيسا">
                                                    مانيسا</option>
                                                <option value="كهرمان‌مرعش">
                                                    كهرمان‌مرعش</option>
                                                <option value="ماردين">
                                                    ماردين</option>
                                                <option value="موغلا">
                                                    موغلا</option>
                                                <option value="موش">
                                                    موش</option>
                                                <option value="نڤشهر">
                                                    نڤشهر</option>
                                                <option value="نيغدة">
                                                    نيغدة</option>
                                                <option value="أردو">
                                                    أردو</option>
                                                <option value="ريزه">
                                                    ريزه</option>
                                                <option value="ساكاريا">
                                                    ساكاريا</option>
                                                <option value="سامسون">
                                                    سامسون</option>
                                                <option value="سيرت">
                                                    سيرت</option>
                                                <option value="سينوپ">
                                                    سينوپ</option>
                                                <option value="سيڤاس">
                                                    سيڤاس</option>
                                                <option value="تكيرداغ">
                                                    تكيرداغ</option>
                                                <option value="توقاد">
                                                    توقاد</option>
                                                <option value="طرابزون">
                                                    طرابزون</option>
                                                <option value="تونج‌ايلي">
                                                    تونج‌ايلي</option>
                                                <option value="شانلي‌اورفا">
                                                    شانلي‌اورفا</option>
                                                <option value="عشاق">
                                                    عشاق</option>
                                                <option value="ڤان">
                                                    ڤان</option>
                                                <option value="يوزگات">
                                                    يوزگات</option>
                                                <option value="زونگولداك">
                                                    زونگولداك</option>
                                                <option value="أكساراي">
                                                    أكساراي</option>
                                                <option value="بايبورت">
                                                    بايبورت</option>
                                                <option value="قرةمان">
                                                    قرةمان</option>
                                                <option value="قريق‌قلعه">
                                                    قريق‌قلعه</option>
                                                <option value="بطمان">
                                                    بطمان</option>
                                                <option value="شرناق">
                                                    شرناق</option>
                                                <option value="بارتين">
                                                    بارتين</option>
                                                <option value="أرض‌خان">
                                                    أرض‌خان</option>
                                                <option value="إغدير">
                                                    إغدير</option>
                                                <option value="يالوڤا">
                                                    يالوڤا</option>
                                                <option value="قرةبوك">
                                                    قرةبوك</option>
                                                <option value="كلس">
                                                    كلس</option>
                                                <option value="عثمانية">
                                                    عثمانية</option>
                                                <option value="دوزجه">
                                                    دوزجه</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail"> رقم هاتف المريض</label>
                                        <input type="number" class="form-control" id="medical_number" name="medical_number" placeholder="أكنب رقم الهاتف  "required>
                                        </div>

                                        <div class="form-group">
                                        <label for="exampleInputEmail">ملاحظات</label>
                                        <input type="textarea" class="form-control" id="note" name="note"  placeholder=" أكتب ملاحظة ان وجد "required>
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
        var medical_name = button.data('medical_name')
        var medical_age = button.data('medical_age')
        var medical_number = button.data('medical_number')
        var medicalid = button.data('medicalid')
        var status = button.data('status')
        var medical_id_extr = button.data('medical_id_extr')
        var governorate = button.data('governorate')
        var gender = button.data('gender')
        var note = button.data('note')
        var city = button.data('city')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #medical_name').val(medical_name);
        modal.find('.modal-body #medical_age').val(medical_age);
        modal.find('.modal-body #medical_number').val(medical_number);
        modal.find('.modal-body #medicalid').val(medicalid);
        modal.find('.modal-body #gender').val(gender);
        modal.find('.modal-body #status').val(status);
        modal.find('.modal-body #medical_id_extr').val(medical_id_extr);
        modal.find('.modal-body #governorate').val(governorate);
        modal.find('.modal-body #gender').val(gender);
        modal.find('.modal-body #note').val(note);
        modal.find('.modal-body #city').val(city);
    })
</script>

{{--  delete Student Jquery  --}}
<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var medical_name = button.data('medical_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #medical_name').val(medical_name);
    })
</script>


{{--  Add_dollar  --}}
<script>
    $('#exampleModa23').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var medical_id = button.data('medical_id')
        var id = button.data('id')
        var medical_name = button.data('medical_name')
        var modal = $(this)
        modal.find('.modal-body #medical_id').val(medical_id);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #medical_name').val(medical_name);
})
</script>

{{--  Add_tr  --}}
<script>
    $('#exampleModa24').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var medical_name = button.data('medical_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #medical_name').val(medical_name);
})
</script>


{{--  Add_euro  --}}
<script>
    $('#exampleModa25').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var medical_name = button.data('medical_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #medical_name').val(medical_name);
})
</script>

{{--  Add_bim  --}}
<script>
    $('#exampleModa26').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var medical_name = button.data('medical_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #medical_name').val(medical_name);
})
</script>

{{--  Add Student ID   --}}
<script>
    $('#exampleModa20').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var medical_id = button.data('medical_id')
        var modal = $(this)
        modal.find('.modal-body #medical_id').val(medical_id);

})
</script>


{{--  Husband and Wife    --}}
<script>
    $('#exampleModal111').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var medical_id = button.data('medical_id')
        var modal = $(this)
        modal.find('.modal-body #medical_id').val(medical_id);
    })
</script>

{{--  children    --}}
<script>
    $('#exampleModal4').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var medical_id = button.data('medical_id')
        var modal = $(this)
        modal.find('.modal-body #medical_id').val(medical_id);
    })
</script>

{{--  Pay  --}}
<script>
    $('#exampleModal3').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var medical_name = button.data('medical_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #medical_name').val(medical_name);
})
</script>


{{--  medical_Residance  --}}
<script>
    $('#exampleModal6').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var medical_id = button.data('medical_id')
        var modal = $(this)
        modal.find('.modal-body #medical_id').val(medical_id);})
</script>

{{--  father and Mother   --}}
<script>
    $('#exampleModal0').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var medical_id = button.data('medical_id')
        var modal = $(this)
        modal.find('.modal-body #medical_id').val(medical_id);

})
</script>

{{--  Medical_Status  --}}
<script>
    $('#exampleModal5').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var medical_id = button.data('medical_id')
        var modal = $(this)
        modal.find('.modal-body #medical_id').val(medical_id);
})
</script>

{{--  Job  --}}
<script>
    $('#exampleModal13').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var medical_id = button.data('medical_id')
        var modal = $(this)
        modal.find('.modal-body #medical_id').val(medical_id);})
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

<script>
    $('#exampleModal160').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var medical_id = button.data('medical_id')
        var medical_name = button.data('medical_name')
        var modal = $(this)
        modal.find('.modal-body #medical_id').val(medical_id);
        modal.find('.modal-body #medical_name').val(medical_name);
})
</script>

@endsection



