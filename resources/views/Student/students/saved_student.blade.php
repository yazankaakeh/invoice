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
قسم الطلاب
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="my-auto mb-0 content-title"> الأقسام</h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">/قسم الطلاب</span>
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
                                        <div class="col-sm-4 col-md-4 col-xl-2">
                                        @can(' فورم تسجيل الطلاب ')
                                            <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo1">فورم تسجيل الطلاب </a>
                                        @endcan
                                        @can(' إضافة الطلاب ')
                                            <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">اضافة طالب</a>
                                            @endcan
                                            @can(' عرض الولاية المتاحة الطلاب ')
                                            <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#exampleModal00">عرض الولايات المتاحة</a>
                                        @endcan
                                        </div>
                                     </div>
                                     <div class="pb-0 card-header">
                                        <div class="d-flex justify-content-between">
                                        <div class="dropdown">
                                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                        data-toggle="dropdown" id="dropdownMenuButton" type="button">المزيد من الخيارات <i class="btn btn-primary dropdown-toggle dropdown-toggle-split"></i></button>
                                        <div  class="dropdown-menu tx-13">
                                            @can(' عرض الطلاب الجدد')
                                            <a class=" btn btn-outline-primary btn-block"  href="{{route('student.new')}}">عرض الطلاب الجدد</a>
                                            @endcan
                                            @can( ' عرض الطلاب المؤرشفة ')
                                            <a class=" btn btn-outline-primary btn-block"  href="{{route('student.archive')}}">عرض الطلاب المؤرشفة</a>
                                            @endcan
                                            @can(' عرض الطلاب المؤجلين ')
                                            <a class=" btn btn-outline-primary btn-block"  href="{{route('student.delayed')}}">عرض الطلاب المؤجلين</a>
                                            @endcan
                                            @can(' عرض الطلاب المرفوضين ')
                                            <a class=" btn btn-outline-primary btn-block"  href="{{route('student.reject')}}">عرض الطلاب المرفوضين</a>
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
                                                    <th class="border-bottom-0">اسم الطالب</th>
                                                    <th class="border-bottom-0">الحالة</th>
                                                    <th class="border-bottom-0">تاريخ الميلاد</th>
                                                    <th class="border-bottom-0">العمر</th>
                                                    <th class="border-bottom-0">الحالةالاجتماعية</th>
                                                    <th class="border-bottom-0">البريد الإلكتروني</th>
                                                    <th class="border-bottom-0">رقم الهاتف</th>
                                                    <th class="border-bottom-0">من اي محافظة</th>
                                                    <th class="border-bottom-0">من اي مدينة</th>
                                                    <th class="border-bottom-0">السكن الحالي</th>
                                                    <th class="border-bottom-0">سنة الدخول</th>
                                                    <th class="border-bottom-0">نوع الإقامة</th>
                                                    <th class="border-bottom-0">الولاية</th>
                                                    <th class="border-bottom-0"> اضافة دفعة بالدولار</th>
                                                    <th class="border-bottom-0">اضافة دفعة تركي</th>
                                                    <th class="border-bottom-0">اضافة دفعة يورو</th>
                                                    <th class="border-bottom-0">اضافة كروت بيم</th>
                                                    <th class="border-bottom-0">اضافة زوج وزوجة</th>
                                                    <th class="border-bottom-0">اضافة اب وام</th>
                                                    <th class="border-bottom-0">حذف طالب</th>
                                                    <th class="border-bottom-0">تعديل طالب</th>
                                                    <th class="border-bottom-0">اضافة اطفال</th>
                                                    <th class="border-bottom-0">الحالة الطبية</th>
                                                    <th class="border-bottom-0">السكن الطلابي</th>
                                                    <th class="border-bottom-0">القرآن الكريم</th>
                                                    <th class="border-bottom-0">العمل</th>
                                                    <th class="border-bottom-0">المنحة الدراسية</th>
                                                    <th class="border-bottom-0">الجامعة</th>
                                                    <th class="border-bottom-0">الإخوة</th>
                                                    <th class="border-bottom-0">تحديث الحالة</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($students as $x)
                                                @if( $x->new_statu == 1)
                                                <tr>
                                                    <td>{{$x->id}}</td>
                                                    <td>{{$x->student_name}}</td>
                                                    <td>
                                                        <span class="label text-success d-flex">
                                                        <div  class="ml-1 dot-label bg-success"></div>
                                                        @if( $x->new_statu == 1)
                                                                مقبول
                                                        @endif
                                                        </span>
                                                    </td>
                                                    <td>{{$x->birthday}}</td>
                                                    <td>{{$x->age}}</td>
                                                    <td>{{$x->social_state}}</td>
                                                    <td>{{$x->email}}</td>
                                                    <td dir="ltr" lang="en">{{$x->phone}}</td>
                                                    <td>{{$x->county_are_from}}</td>
                                                    <td>{{$x->city_name}}</td>
                                                    <td>{{$x->stu_Cur_housing}}</td>
                                                    <td>{{$x->entry_turkey}}</td>
                                                    <td>{{$x->Identity_type}}</td>
                                                    <td>{{$x->Id_stud_source}}</td>

                                                <td>
                                                @can(' إضافة دفعة بالدولار الطلاب ')

                                                    {{-- Add_Dollar--}}
                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                        data-student_name="{{$x->student_name}}"  data-id="{{ $x->id }}"
                                                        data-description="" data-toggle="modal"
                                                        href="#exampleModa23" title="دفع بالدولار">
                                                        <i class="cf cf-zec"  style="font-size: 20px;"></i>
                                                    </a>
                                                @endcan
                                                @can(' مدفوعات بالدولار الطلاب ')
                                                    @if($x->usd_statu != 0)
                                                    <a class=" btn btn-sm btn-info" href="/Student_usd/show/student/usd/{{$x->id}}"><i class="far fa-eye"  style="font-size: 17px;"></i> </a>
                                                    @endif
                                                @endcan
                                                </td>

                                                <td>
                                                @can(' إضافة دفعة بالتركي الطلاب ')
                                                    {{-- Add_Tr--}}
                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                        data-student_name="{{$x->student_name}}"  data-id="{{ $x->id }}"
                                                         data-student_id="{{ $x->id }}"
                                                        data-description="" data-toggle="modal"
                                                        href="#exampleModa24" title="دفع بالتركي">
                                                        <i class="cf cf-zec"  style="font-size: 20px;"></i>
                                                    </a>
                                                @endcan
                                                @can(' مدفوعات بالتركي الطلاب ')
                                                    @if($x->tr_statu != 0)
                                                    <a class=" btn btn-sm btn-info" href="/Student_tr/show/student/tr/{{$x->id}}"><i class="far fa-eye"  style="font-size: 17px;"></i> </a>
                                                    @endif
                                                @endcan
                                                </td>


                                                <td>
                                                @can(' إضافة دفعة باليورو الطلاب ')
                                                    {{-- Add_Euro--}}
                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                        data-student_name="{{$x->student_name}}"  data-id="{{ $x->id }}"
                                                        data-description="" data-toggle="modal"
                                                        href="#exampleModa25" title="دفع باليورو">
                                                        <i class="cf cf-zec"  style="font-size: 20px;"></i>
                                                    </a>
                                                @endcan
                                                @can(' مدفوعات باليورو الطلاب ')
                                                    @if($x->euro_statu != 0)
                                                    <a class=" btn btn-sm btn-info" href="/Student_euro/show/student/euro/{{$x->id}}"><i class="far fa-eye"  style="font-size: 17px;"></i> </a>
                                                    @endif
                                                @endcan
                                                </td>

                                                <td>
                                                @can(' إضافة دفعة بالكرت البيم الطلاب ')
                                                    {{-- Add_Bim--}}
                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                        data-student_name="{{$x->student_name}}"  data-id="{{ $x->id }}"
                                                        data-description="" data-toggle="modal"
                                                        href="#exampleModa26" title="دفع كروت">
                                                        <i class="cf cf-zec"  style="font-size: 20px;"></i>
                                                    </a>
                                                @endcan
                                                @can(' مدفوعات بالكرت البيم الطلاب ')
                                                    @if($x->bim_statu != 0)
                                                    <a class=" btn btn-sm btn-info" href="/Student_bim/show/student/bim/{{$x->id}}/"><i class="far fa-eye"  style="font-size: 17px;"></i> </a>
                                                    @endif
                                                @endcan
                                                </td>

                                                    {{-- wife and husband  --}}
                                                    @if($x->husband_wife_statu == 1)
                                                    <td>
                                                    @can(' قسم الزوج والزوجة الطلاب ')
                                                        <a class="btn btn-sm btn-info" href="/husband_Wife/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    @endcan
                                                    </td>
                                                    @elseif($x->husband_wife_statu == 0)
                                                    <td>
                                                    @can(' اضافة الزوج والزوجة الطلاب ')
                                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                            data-student_id="{{$x->id}}"
                                                            data-toggle="modal"
                                                            href="#exampleModal111" title="إضافة زوج و زوجة">
                                                            <i class="mdi mdi-account-multiple-plus" style="font-size: 18px;"></i>
                                                        </a>
                                                    @endcan
                                                    </td>
                                                    @endif

                                                    {{-- father and mother  --}}
                                                    @if($x->father_mother_statu == 1)
                                                    <td>
                                                    @can(' قسم الأب والأم الطلاب ')
                                                        <a class="btn btn-sm btn-info" href="/father_and_mother/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    </td>
                                                    @endcan
                                                    @elseif($x->father_mother_statu == 0)
                                                    <td>
                                                    @can(' اضافة الأب والأم الطلاب ')
                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                        data-student_id="{{$x->id}}"
                                                        data-toggle="modal"
                                                        href="#exampleModal0" title="إضافة زوج و زوجة">
                                                        <i class="mdi mdi-account-multiple-plus" style="font-size: 18px;"></i>
                                                    </a>
                                                    @endcan
                                                    </td>
                                                    @endif

                                                    <td>
                                                    @can(' حذف الطلاب ')
                                                    {{-- delete Student  --}}
                                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                            data-id="{{$x->id}}" data-student_name="{{$x->student_name}}"
                                                            data-toggle="modal" href="#modaldemo9" title="حذف">
                                                            <i class="las la-trash"  style="font-size: 20px;"> </i>
                                                        </a>
                                                    @endcan
                                                    </td>

                                                    <td>
                                                    @can(' تعديل الطلاب ')

                                                    {{-- edit Student  --}}
                                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                            data-student_name="{{$x->student_name}}"
                                                            data-birthday="{{$x->birthday}}" data-email="{{$x->email}}" data-age="{{$x->age}}"
                                                            data-city_name="{{$x->city_name}}" data-stu_Cur_housing="{{$x->stu_Cur_housing}}" data-phone="{{$x->phone}}" data-county_are_from="{{$x->county_are_from}}"
                                                                data-entry_turkey="{{$x->entry_turkey}}" data-Identity_type="{{$x->Identity_type}}"
                                                            data-Id_stud_source="{{$x->Id_stud_source}}" data-id="{{$x->id}}" data-social_state="{{$x->social_state}}"
                                                            data-description="" data-toggle="modal"
                                                            href="#exampleModal2" title="تعديل">
                                                            <i class="las la-pen"  style="font-size: 20px;"></i>
                                                        </a>
                                                    @endcan
                                                    </td>

                                                    <td>

                                                    {{-- add children  --}}
                                                    @if($x->child_statu != 0)
                                                    @can(' قسم الأطفال الطلاب ')
                                                        <a class=" btn btn-sm btn-info" href="/children/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    @endcan
                                                    @endif
                                                    @can(' اضافة قسم الأطفال الطلاب ')
                                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                            data-student_id="{{$x->id}}"  data-description="" data-toggle="modal"
                                                            href="#exampleModal4" title="إضافة طفل">
                                                            <i class="las la-child"  style="font-size: 20px;"></i>
                                                        </a>
                                                    @endcan
                                                    </td>

                                                    {{-- Medical_Status  --}}
                                                    @if($x->medical_statu == 1)
                                                    <td>
                                                    @can(' اضافة الحالة الصحية الطلاب ')
                                                        <a class=" btn btn-sm btn-info" href="/Medical_Statu/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    @endcan
                                                    </td>
                                                    @elseif($x->medical_statu == 0)
                                                    <td>
                                                    @can(' قسم الحالة الصحية الطلاب ')
                                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                            data-student_id="{{$x->id}}"  data-description="" data-toggle="modal"
                                                            href="#exampleModal5" title="إضافة حالة طبية">
                                                            <i class="fas fa-heartbeat"  style="font-size: 20px;"></i>
                                                        </a>
                                                    @endcan
                                                    @endif
                                                    </td>

                                                    @if($x->residance_statu == 1)
                                                    <td>
                                                    @can(' قسم سكن الطلاب ')
                                                        <a class=" btn btn-sm btn-info" href="/Student_Residance/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    @endcan
                                                    </td>
                                                    @elseif($x->residance_statu == 0)
                                                    {{-- Stduent_Residance  --}}
                                                    <td>
                                                    @can(' اضافة سكن الطلاب ')
                                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                            data-student_id="{{$x->id}}"  data-description="" data-toggle="modal"
                                                            href="#exampleModal6" title="إضافة سكن للطالب">
                                                            <i class=" las la-home"  style="font-size: 20px;"></i>
                                                        </a>
                                                    @endcan
                                                    </td>
                                                    @endif

                                                         {{-- Quran  --}}
                                                        @if($x->quran_statu == 1)
                                                        <td>
                                                        @can(' قسم القرأن الطلاب ')
                                                        <a class=" btn btn-sm btn-info" href="/Quran/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                        @endcan
                                                        </td>
                                                        @elseif($x->quran_statu == 0)
                                                        <td>
                                                        @can(' اضافة القرأن الطلاب ')
                                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                                data-student_id="{{$x->id}}"  data-description="" data-toggle="modal"
                                                            href="#exampleModal7" title="إضافة معلومات القرآن">
                                                            <i class="fas fa-book-open" style="font-size: 20px;"></i>
                                                        </a>
                                                    @endcan
                                                    </td>
                                                    @endif

                                                    {{-- Job  --}}
                                                    @if($x->job_statu == 1)
                                                    <td>
                                                    @can(' قسم العمل الطلاب ')
                                                        <a class=" btn btn-sm btn-info" href="/job/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    @endcan
                                                    </td>
                                                    @elseif($x->job_statu == 0)
                                                    <td>
                                                    @can(' اضافة العمل الطلاب ')
                                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                            data-student_id="{{$x->id}}"  data-description="" data-toggle="modal"
                                                            href="#exampleModal13" title="إضافة معلومات العمل">
                                                            <i class="fas fa-briefcase"  style="font-size: 20px;"></i>
                                                        </a>
                                                    @endcan
                                                    </td>
                                                    @endif

                                                    {{-- Scholarship  --}}
                                                    @if($x->scholarship_statu == 1)
                                                    <td>
                                                    @can(' قسم المنح الدراسية الطلاب ')
                                                        <a class=" btn btn-sm btn-info" href="/Scholarship/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    @endcan
                                                    </td>
                                                    @elseif($x->scholarship_statu == 0)
                                                    <td>
                                                    @can(' اضافة المنح الدراسية الطلاب ')
                                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                            data-student_id="{{$x->id}}"  data-description="" data-toggle="modal"
                                                            href="#exampleModal14" title="إضافة معلومات المنح الدراسية">
                                                            <i class="fas fa-address-card"  style="font-size: 20px;"></i>
                                                        </a>
                                                    @endcan
                                                    </td>
                                                    @endif

                                                    {{-- University  --}}
                                                    @if($x->university_statu == 1)
                                                    <td>
                                                    @can(' قسم الجامعة الطلاب ')
                                                    <a class=" btn btn-sm btn-info" href="/University/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    @endcan
                                                    </td>
                                                    @elseif($x->university_statu == 0)
                                                    <td>
                                                    @can(' اضافة الجامعة الطلاب ')
                                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                            data-student_id="{{$x->id}}"  data-description="" data-toggle="modal"
                                                            href="#exampleModal15" title="إضافة جامعة">
                                                            <i class="fas fa-graduation-cap"  style="font-size: 20px;"></i>
                                                        </a>
                                                    @endcan
                                                    </td>
                                                    @endif

                                                    {{-- Sister and Brother  --}}

                                                    <td>
                                                    @can(' قسم الأخوة الطلاب ')
                                                    @if($x->sis_statu != 0)
                                                    <a class="btn btn-sm btn-info" href="/Sister_and_Brother/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    @endif
                                                    @endcan
                                                    @can(' اضافة الأخوة الطلاب ')
                                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                            data-student_id="{{$x->id}}"  data-description="" data-toggle="modal"
                                                            href="#exampleModal16" title="اضافة اخوة">
                                                            <i class="si si-user-follow"  style="font-size: 20px;"></i>
                                                        </a>
                                                    @endcan
                                                    </td>

                                                      <td>
                                                        @can(' عرض حالةالطلاب ')
                                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                        data-student_name="{{$x->student_name}}"  data-student_id="{{$x->id}}"
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

                             @if (session()->has('turkey'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('turkey') }}</strong>
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

                            @if (session()->has('Warning'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Warning') }}</strong>
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

                        {{-- student statu --}}
                        <div class="modal fade" id="exampleModal160" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">تعديل حالة الطالب </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('student.statu') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="modal-body">
                                <input type="text" class="form-control select2" id="student_name" name="student_name"  readonly>
                                <input type="hidden" name="student_id" id="student_id" readonly>
                                <div class="form-group">
                                <div class="modal-body">
                                <p class="mg-b-10">حالة الطالب</p>
                                    <select class="form-control select2" name="statu" id="statu" >
                                    <option value="1" >
                                        مقبول
                                    </option>
                                    <option value="0" >
                                        جديد
                                    </option>
                                    <option value="2" >
                                        مرفوض
                                    </option>
                                    <option value="3" >
                                        ارشيف
                                    </option>
                                    <option value="4" >
                                        مؤجل
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

                        {{-- Turkey sataes --}}
                        <div class="modal fade" id="exampleModal00" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">تعديل حالة الطالب </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('turkey.edit') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="modal-body">
                                @foreach($cities as $c)
                                <input type="checkbox" name="id[] " value="{{$c->id}}"
                                @if($c->show != 0 )
                                    checked>
                                @endif
                               <label for="vehicle3">{{ $c->name}} </label>
                                @endforeach

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
                                <h5 class="modal-title" id="exampleModalLabel">اضافة دفعة بالدولار</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('usd.store.student') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="form-group">
                                <label for="exampleInputEmail">اسم الطالب</label>
                                <input type="hidden" name="student_id" id="id" readonly>
                                <input type="text" class="form-control" id="student_name" name="student_name" placeholder="  " readonly>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">المبلغ المدفوع بالدولار</label>
                                <input type="text" class="form-control" id="student_value_usd" name="student_value_usd" placeholder="   أكنب قيمة المبلغ المالي  ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">ملاحظات</label>
                                <input type="textarea" class="form-control" id="note" name="note" placeholder=" أكتب ملاحظة ان وجد ">
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
                                <form action="{{ route('tr.store.student') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="form-group">
                                <label for="exampleInputEmail">اسم الطالب</label>
                                <input type="text" class="form-control" id="student_name" name="student_name" placeholder=" " readonly>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">المبلغ المدفوع بالتركي</label>
                                <input type="hidden" name="student_id" id="student_id" readonly>
                                <input type="text" class="form-control" id="student_value" name="student_value" placeholder=" أكنب قيمة المبلغ المالي ">
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
                                <form action="{{ route('euro.store.student') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="form-group">
                                <label for="exampleInputEmail">اسم الطالب</label>
                                <input type="text" class="form-control" id="student_name" name="student_name" placeholder="    " readonly>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">المبلغ المدفوع باليورو</label>
                                <input type="hidden" name="student_id" id="id" readonly>
                                <input type="text" class="form-control" id="student_value" name="student_value" placeholder="   أكنب قيمة المبلغ المالي ">
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

                        {{-- Add_Bim --}}
                        <div class="modal fade" id="exampleModa26" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">اضافة دفعة كرت بيم </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('bim.store.student') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="form-group">
                                <label for="exampleInputEmail">اسم الطالب</label>
                                <input type="text" class="form-control" id="student_name" name="student_name" placeholder="  " readonly>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">عدد كروت البيم</label>
                                <input type="hidden" name="student_id" id="id" readonly>
                                <input type="text" class="form-control" id="number_bim_student" name="number_bim_student" placeholder=" أكتب قيمة عدد الكروت  ">
                                </div>
                                <div class="modal-body">
                                    <p class="mg-b-10">قيمة الكروت</p>
                                    <select class="form-control select2" name="value_bim_student" id="value_bim_student" >
                                            @foreach($payments as $a)
                                                <option value="{{$a->value_bim}}" >
                                                    {{$a->value_bim}}
                                                </option>
                                            @endforeach
                                    </select>
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

                        {{-- Sister and Brother --}}
                        <div class="modal fade" id="exampleModal16" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">إضافة اخوة واخوات </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('Sister_and_Brother.student.store') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="modal-body">

                                <input type="hidden" name="student_id" id="student_id" readonly>
                                <div class="form-group">
                                <label for="exampleInputEmail">الأسم بالكامل </label>
                                <input type="text" class="form-control" id="name" name="name" placeholder=" أكتب الأسم كامل">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">العمر</label>
                                <input type="text" class="form-control" id="age" name="age" placeholder=" العمر">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">الجنس </label>
                                <select type="text" class="form-control" id="gender" name="gender" >
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
                                <label for="exampleInputEmail">المستوى الدراسي</label>
                                <select class="form-control" id="academicel" name="academicel" placeholder="">
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
                                 <option value="ديكتورا">
                                    ديكتورا </option>
                                </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">الأختصاص </label>
                                <input type="text" class="form-control" id="special" name="special" placeholder=" أكتب أسم الأختصاص">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">ما هو نوع العمل </label>
                                <input type="text" class="form-control" id="work" name="work" placeholder=" أكتب أسم العمل">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">كم الراتب </label>
                                <input type="number" class="form-control" id="salary" name="salary" placeholder=" أكتب قيمة الراتب">
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

                        {{-- universities --}}
                        <div class="modal fade" id="exampleModal15" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> الجامعة</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('University.student.store') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="modal-body">

                                <input type="hidden" name="student_id" id="student_id" readonly>
                                <div class="form-group">
                                <label for="exampleInputEmail">اسم الجامعة </label>
                                <input type="text" class="form-control" id="univer_name" name="univer_name" placeholder="   أكتب اسم الجامعة ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">مكان الجامعة</label>
                                <select type="text" class="form-control" id="univer_location" name="univer_location" placeholder="   أكتب مكان الجامعة ">
                                    <option label="test">
                                           </option>
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
                                <label for="exampleInputEmail">أختصاص الجامعي</label>
                                <input type="text" class="form-control" id="univer_special" name="univer_special" placeholder="   أكتب أسم أختصاص الجامعي ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">عدد سنوات الدراسة </label>
                                <input type="text" class="form-control" id="Number_years" name="Number_years" placeholder="   أكتب عدد سنوات الدراسة ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">السنة الدراسية الحالية </label>
                                <select type="text" class="form-control" id="Schoo_year" name="Schoo_year" >
                                    <option label="test">
                                            </option>
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
                                <div class="form-group">
                                <label for="exampleInputEmail">المعدل الحالي  </label>
                                <input type="text" class="form-control" id="Current_rate" name="Current_rate" placeholder="   أكتب لمعدل الحالي ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">المعدل التراكمي </label>
                                <input type="text" class="form-control" id="Cumulative_rate" name="Cumulative_rate" placeholder="   أكتب المعدل التراكمي ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">اللغة الدراسية </label>
                                <select type="text" class="form-control" id="language_name" name="language_name">
                                    <option label="test">
                                            </option>
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
                                <div class="form-group">
                                <label for="exampleInputEmail"> المستوى الحالي للغة </label>
                                <input type="text" class="form-control" id="Current_level" name="Current_level" placeholder="   أكتب المستوى الحالي للغة ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">معدل المستوى الحالي للغة </label>
                                <input type="text" class="form-control" id="Curr_level_rate" name="Curr_level_rate" placeholder="   أكتب معدل المستوى الحالي للغة ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">معدل المستوى السابق للغة </label>
                                <input type="text" class="form-control" id="Previ_level_rate" name="Previ_level_rate" placeholder="   أكتب معدل المستوى السابق للغة ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">طريقة قبول الجامعي </label>
                                <input type="text" class="form-control" id="Univer_Accept" name="Univer_Accept" placeholder="   أكتب طريقة قبول الجامعي ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">معدل القبول الجامعي </label>
                                <input type="text" class="form-control" id="Accept_rate" name="Accept_rate" placeholder="   أكتب معدل القبول الجامعي ">
                                </div>
                                <div class="form-group">
                                    <p class="mg-b-10"> هل يوجد جامعة ثانية</p>
                                    <select class="form-control select2" name="are_you_univer" id="are_you_univer" onchange="showDiv(this)">
                                        <option label="test">
                                                  </option>
                                        <option value="يوجد" >
                                            يوجد
                                        </option>
                                        <option value="لايوجد" >
                                            لايوجد
                                        </option>
                                    </select>
                                </div>
                                <div  class="row row-sm"id="hidden3_div" style="display:none;"> {{-- display:flex  --}}
                                <div class="form-group">
                                <label for="exampleInputEmail">اسم الجامعة الثانية </label>
                                <input type="text" class="form-control" id="Ano_univer_name" name="Ano_univer_name" placeholder="   أكتب اسم الجامعة الثانية ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">الأختصاص الثاني </label>
                                <input type="text" class="form-control" id="Ano_univer_special" name="Ano_univer_special" placeholder="   أكتب الأختصاص بالجامعة الثانية ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">طريقة القبول بالجامعة الثانية </label>
                                <input type="text" class="form-control" id="Ano_univer_Accept" name="Ano_univer_Accept" placeholder="   أكتب طريقة القبول ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">معدل القبول  للجامعة الثانية </label>
                                <input type="text" class="form-control" id="Ano_accept_rate" name="Ano_accept_rate" placeholder="   أكتب معدل القبول ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">  السنة الدراسية بالجامعة الثانية   </label>
                                <select type="text" class="form-control" id="Ano_Schoo_year" name="Ano_Schoo_year">
                                    <option>
                                         </option>
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
                                <div class="form-group">
                                <label for="exampleInputEmail">المعدل بالجامعة الثانية </label>
                                <input type="text" class="form-control" id="Ano_Current_rate" name="Ano_Current_rate" placeholder="   أكتب المعدل بالجامعة الثانية ">
                                </div>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputEmail">الأفساط الجامعية </label>
                                <input type="text" class="form-control" id="univer_Premiums" name="univer_Premiums" placeholder="  أكتب قيمة الأقساط الجامعية بالسنة ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">ماهي مصاريف الجامعية </label>
                                <input type="textarea" class="form-control" id="univer_fees" name="univer_fees" placeholder="    أكتب ماهي مصاريف الجامعية ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">كم قيمة المصاريف الجامعية  </label>
                                <input type="text" class="form-control" id="univer_fees_value" name="univer_fees_value" placeholder="   أكتب قيمة المصاريف الجامعية ">
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

                        {{-- Scholarship --}}
                        <div class="modal fade" id="exampleModal14" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">المنح الدراسية </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('Scholarship.student.store') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="modal-body">

                                <input type="hidden" name="student_id" id="student_id" readonly>
                                <div class="form-group">
                                <label for="exampleInputEmail">اسم المنحة </label>
                                <input type="text" class="form-control" id="scholar_name" name="scholar_name" placeholder=" أكتب أسم المنحة">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">نوع المنحة</label>
                                <input type="text" class="form-control" id="scholar_type" name="scholar_type" placeholder="   أكتب نوع المنحة">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">قيمة المنحة</label>
                                <input type="text" class="form-control" id="scholar_value" name="scholar_value" placeholder="   كم قيمة المنحة المالية">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">مصدر المنحة أو الجهة المانحة </label>
                                <input type="text" class="form-control" id="scholar_source" name="scholar_source" placeholder=" أكتب مصدر المنحة او أسم الجهة المانحة">
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
                                <form action="{{ route('job.student.store') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="modal-body">

                                <input type="hidden" name="student_id" id="student_id" readonly>
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
                                <input type="number" class="form-control" id="job_monthly_salary" name="job_monthly_salary" placeholder="   أكتب ماهو العملك ">
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
                                <input type="number" class="form-control" id="job_last_salary" name="job_last_salary" placeholder="   كم ماهو الراتبك بالعمل السابق">
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

                        {{-- Holy Quran --}}
                        <div class="modal fade" id="exampleModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">القرآن الكريم</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('Quran.student.store') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="modal-body">

                                <input type="hidden" name="student_id" id="student_id" readonly>
                                    <div class="form-group">
                                    <p class="mg-b-10">هل تحفظ القرآن</p>
                                    <select class="form-control select2" name="quran_memorize" id="quran_memorize">
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
                                <label for="exampleInputEmail">عدد الأجزاء التي أتممت حفظها </label>
                                <input type="text" class="form-control" id="quran_parts" name="quran_parts" placeholder="    أكتب عدد الأجزاء المحفوظة ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">أسم الشيخ الذي درسك</label>
                                <input type="text" class="form-control" id="quran_teacher" name="quran_teacher" placeholder="   أكتب أسم الشيخ ">
                                </div>
                                <div class="form-group">
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
                                <div class="form-group">
                                <label for="exampleInputEmail">مصدر الشهادة</label>
                                <input type="text" class="form-control" id="quran_Certif_essuer" name="quran_Certif_essuer" placeholder="   أكتب مصدر الشهادة ">
                                </div>
                                <div class="form-group">
                                <p class="mg-b-10">هل الشهادة معك؟</p>
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

                        {{-- Student_Residance --}}
                        <div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> سكن الطلاب</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('Student_Residence.student.store') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="modal-body">

                                <input type="hidden" name="student_id" id="student_id" readonly>
                                 <div class="form-group">
                                    <p class="mg-b-10">نوع السكن</p>
                                    <select class="form-control select2" name="stud_type_housing" id="stud_type_housing">
                                        <option label="test">
											     </option>
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
                                <div class="form-group">
                                <label for="exampleInputEmail">كم مبلغ الآجار</label>
                                <input type="text" class="form-control" id="stud_rent_housing" name="stud_rent_housing" placeholder=" أكتب مبلغ أيجار المنزل">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">الموقع</label>
                                <input type="text" class="form-control" id="stud_Place_housing" name="stud_Place_housing" placeholder="  أكتب الموقع الحالي كما في الفاتورة ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">مصاريف السكن الطلابي</label>
                                <input type="text" class="form-control" id="stud_expen" name="stud_expen"  placeholder="  أكتب ماهي  السكن الطلابي ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">قيمت مصاريف السكن</label>
                                <input type="text" class="form-control" id="stud_valu_expen" name="stud_valu_expen" placeholder="   أكتب قيمة مصاريف السكن  ">
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
                                <h5 class="modal-title" id="exampleModalLabel">الحالة الصحية للطالب.</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('Medical_Statu.student.store') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="modal-body">
                                <div class="form-group">
                                <input type="hidden" name="student_id" id="student_id" readonly>
                                </div>
                                 <div class="form-group">{{-- it must be select options  --}}
                                    <p class="mg-b-10">هل يوجد لديك اي أمراض</p>
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
                                <div class="form-group">
                                <label for="exampleInputEmail">اسم المرض</label>
                                <input type="text" class="form-control" id="disease_name" name="disease_name" placeholder=" أكتب أسم المرض">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">اسم الدكتور</label>
                                <input type="text" class="form-control" id="dr_name" name="dr_name" placeholder=" أكتب أسم الطبيب">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">تكلفة العلاج</label>
                                <input type="text" class="form-control" id="treat_cost" name="treat_cost" placeholder="أكتب تكلفة العلاج ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">نوع العلاج</label>
                                <input type="text" class="form-control" id="treat_type" name="treat_type" placeholder=" أكتب نوع العلاج ">
                                </div>
                               <div class="form-group">
                                <label for="exampleInputEmail">مدة العلاج</label>
                                <input type="text" class="form-control" id="treat_Duratio" name="treat_Duratio" placeholder=" أكتب مدة العلاج">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">تاريخ بدء العلاج</label>
                                <input type="date" class="form-control" id="date_accept" name="date_accept" placeholder=" أكتب تاريخ بدء العلاج">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">تاريخ الانتهاء من العلاج</label>
                                <input type="date" class="form-control" id="date_end" name="date_end" placeholder=" أكتب تاريخ الأنتهاء العلاج">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">هل تم تحويلك لطبيب آخر؟ مع ذكر الأسم إن وجد</label>
                                <input type="text" class="form-control" id="Trans_to_doctor" name="Trans_to_doctor" placeholder=" أذكر أسم الطبيب ان وجد">
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
                                <form action="{{ route('FatherandMother.student.store') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="modal-body">
                                <div class="form-group">
                                <input type="HIDDEN" name="student_id" id="student_id"  readonly>

                                <label for="exampleInputEmail">اسم الأم</label>
                                <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder=" أكتب أسم الأم  ">
                                </div>

                                 <div class="form-group">
                                <label for="exampleInputEmail">تاريخ ميلاد الأم</label>
                                <input type="date" class="form-control" id="mother_birth" name="mother_birth" placeholder=" أكتب تاريخ الميلاد ">
                                </div>

                                 <div class="form-group">
                                <label for="exampleInputEmail">من اي محافظة من سوريا؟</label>
                                <select class="form-control" id="mother_origin" name="mother_origin" placeholder=" أكتب أسم المحافظة ">
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
                                    <input type="text" class="form-control" id="mother_origin_city" name="mother_origin_city" placeholder=" أكتب أسم المدينة">
                                </div>
                                 <div class="form-group">
                                <label for="exampleInputEmail">المستوى التعليمي للأم</label>
                                <select class="form-control" id="mother_academicel" name="mother_academicel" placeholder=" أكتب المستوى النعليمي ">
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
                                 <option value="ديكتورا">
                                    ديكتورا </option>
                                </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">اختصاص دراسة الأم</label>
                                <input type="text" class="form-control" id="mother_special" name="mother_special" placeholder=" أكتب أسم الأختصاص">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">هل تعمل الأم</label>
                                <select class="form-control select2" name="mother_is_work" id="mother_is_work" placeholder="هل الأم تعمل ام لا تعمل">
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
                                <input type="text" class="form-control" id="mother_now_work" name="mother_now_work" placeholder=" أكتب العمل الحالي للأم">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">الراتب الشهري للأم</label>
                                <input type="number" class="form-control" id="mother_salary" name="mother_salary" placeholder="  أكتب الراتب الشهري للأم ">
                                </div>

                                {{--  Father Part  --}}
                                <hr>
                                <div class="form-group">
                                <label for="exampleInputEmail">اسم الأب</label>
                                <input type="text" class="form-control" id="father_name" name="father_name" placeholder=" أكتب أسم الأب ">
                                </div>
                                 <div class="form-group">
                                <label for="exampleInputEmail">تاريخ ميلاد الأب</label>
                                <input type="date" class="form-control" id="father_birth" name="father_birth" placeholder=" أكتب تاريخ ميلاد الأب">
                                </div>
                                 <div class="form-group">
                                <label for="exampleInputEmail">من اي محافظة من سوريا؟</label>
                                <select class="form-control" id="father_origin" name="father_origin" placeholder=" أكتب أسم المحافظة ">
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
                                    <input type="text" class="form-control" id="father_origin_city" name="father_origin_city" placeholder=" أكتب أسم المدينة">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">المستوى التعليمي للأب</label>
                                <select class="form-control" id="father_academicel" name="father_academicel" placeholder=" أكتب المستوى التعليمي ">
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
                                 <option value="ديكتورا">
                                    ديكتورا </option>
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputEmail">اختصاص دراسة الأب</label>
                                <input type="text" class="form-control" id="father_special" name="father_special" placeholder=" أكتب أسم الأختصاص">
                                </div>

                                <div class="form-group">
                                <label for="exampleInputEmail">هل يعمل للأب</label>
                                <select class="form-control select2" name="father_is_work" id="father_is_work" placeholder=" هل الأب يعمل ام لا يعمل  ">
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
                                <input type="text" class="form-control" id="father_now_work" name="father_now_work" placeholder=" أكتب العمل الحالي للأب ">
                                </div>

                                <div class="form-group">
                                <label for="exampleInputEmail">الراتب الشهري للأب</label>
                                <input type="number" class="form-control" id="father_salary" name="father_salary" placeholder=" أكتب الراتب الشهري ">
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
                                <form action="{{ route('children.student.store') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="modal-body">
                                <div class="form-group">
                                <input type="hidden" name="student_id" id="student_id" readonly>
                                <label for="exampleInputEmail">اسم الطفل</label>
                                <input type="text" class="form-control" id="childre_name" name="childre_name" placeholder=" أكتب أسم الطفل ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">العمر</label>
                                <input type="number" class="form-control" id="childre_age" name="childre_age" placeholder=" أكتب  العمر بالرقم ">
                                </div>
                                <div class="form-group">{{-- it must be select options  --}}
                                    <p class="mg-b-10">الجنس</p>
                                    <select class="form-control select2" name="childre_gender" id="childre_gender" placeholder=" أكتب الجنس الطفل ">
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
                                <select type="text" class="form-control" id="childre_educa_leve" name="childre_educa_leve" placeholder=" أكتب المرحلة الدراسية ">
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
                                 دبلوم عالي   </option>
                                 <option value="جامعي">
                                    جامعي </option>
                                <option value="مايجستير">
                                    مايجستير </option>
                                 <option value="ديكتورا">
                                    ديكتورا </option>
                                </select>
                                </div>
                                 <div class="form-group">
                                <label for="exampleInputEmail"> رقم الصف الدراسي </label>
                                <input type="text" class="form-control" id="childre_class_number" name="childre_class_number" placeholder="  أكتب رقم الصف الدراسي ">
                                </div>
                                <div class="form-group">{{-- it must be select options  --}}
                                    <p class="mg-b-10">الهوية الشخصية من اي ولاية</p>
                                    <select class="form-control select2" name="childre_id_extr" id="childre_id_extr" placeholder=" أختر من اسم الولاية الصادرة منها الكملك ">
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
                                    <select class="form-control select2" name="childre_live_with" id="childre_live_with" placeholder=" هل الأطفال يعيشون معكم ">
                                   <option label="test">
									              </option>
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
                                        <h6 class="modal-title"> قسم الطلاب.</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>

                                <form action="{{ route('student.enable') }}" method="GET">
                                {{ method_field('GET') }}
                                {{ csrf_field() }}
                                 <div class="modal-body">
                                  <div class="form-group">{{-- it must be select options  --}}
                                    <p class="mg-b-10">تفعيل فورم التسجيل للطلاب؟</p>
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


                        {{-- Husband and Wife --}}
                        <div class="modal fade" id="exampleModal111" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">اضافة زوج أو زوجة</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('husband_Wife.student.store') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="modal-body">
                                <div class="form-group">
                                <label for="exampleInputEmail">الجنس </label>
                                <select type="text" class="form-control" id="gender" name="gender" >
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
                                <hr>
                                <div  class="row row-sm"id="hidden_div" style="display:flex;"> {{-- display:flex  --}}

                                <div class="form-group">
                                <input type="hidden" name="student_id" id="student_id"  readonly>
                                <label for="exampleInputEmail">اسم الزوج/ة</label>
                                <input type="text" class="form-control" id="wife_name" name="wife_name" placeholder=" أكتب اسم الزوج/ة ">
                                </div>

                                 <div class="form-group">
                                <label for="exampleInputEmail">تاريخ ميلاد الزوج/ة</label>
                                <input type="date" class="form-control" id="wife_birth" name="wife_birth" placeholder=" أكتب تاريخ الميلاد">
                                </div>

                                 <div class="form-group">
                                <label for="exampleInputEmail">من اي محافظة من سوريا؟</label>
                                <select class="form-control" id="wife_city" name="wife_city" placeholder=" أكتب أسم المحافظة ">
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
                                    <input type="text" class="form-control" id="wife_district" name="wife_district" placeholder=" أكتب أسم المدينة ">
                                </div>
                                 <div class="form-group">
                                <label for="exampleInputEmail">المستوى التعليمي للزوج/ة</label>
                                <select class="form-control" id="wife_academicel" name="wife_academicel" placeholder=" ">
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
                                 <option value="ديكتورا">
                                    ديكتورا </option>
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputEmail">اختصاص دراسة الزوج/ة</label>
                                <input type="text" class="form-control" id="wife_special" name="wife_special" placeholder="أكتب أسم الأختصاص">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">هل تعمل الزوج/ة؟</label>
                                <select class="form-control select2" name="wife_is_work" id="wife_is_work" placeholder="  ">
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
                                <label for="exampleInputEmail">العمل الحالي للزوج/ة</label>
                                <input type="text" class="form-control" id="wife_now_work" name="wife_now_work" placeholder=" أكتب العمل الحالي ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">العمل السابق للزوج/ة</label>
                                <input type="text" class="form-control" id="wife_Pre_work" name="wife_Pre_work" placeholder=" أكتب العمل السابق  ">
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
                                        <h6 class="modal-title">اضافة طالب .</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="{{ route('student.store') }}" method="POST">
                                        {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="form-group">
                                        <label for="exampleInputEmail">اسم الطالب</label>
                                        <input class="form-control" value="admin"  name="register" type="hidden">
                                        <input type="text" class="form-control" id="student_name" name="student_name" placeholder="أكتب أسم الطالب ">
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail">تاريخ الميلاد </label>
                                        <input type="date" class="form-control" id="birthday" name="birthday" placeholder="أكتب تاريخ الميلاد ">
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail">الجنس </label>{{-- unCmoplete --}}
                                        <select class="form-control select2" name="gender" id="gender" >
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
                                        <div class="col-sm-12">{{-- it must be select options  --}}
                                                <p class="mg-b-10"> الحالة الأجتماعي :    </p>
                                                <select class="form-control select2" name="social_state" id="social_state" placeholder=" أكتب الحالة الأجتماعية ">
                                                <option label="test">
                                                           </option>
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
                                        <div class="form-group">
                                        <label for="exampleInputEmail">العمر</label>
                                        <input type="number" class="form-control" id="age" name="age" placeholder="أكتب العمر بأرقام ">
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail">البريد الإلكتروني</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder=" أكتب البريد الإلكتروني ">
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail">رقم الهاتف</label>
                                        <input type="text" class="form-control" id="phone" name="phone"  placeholder=" أكتب رقم الهاتف بداً من 05  ">
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail">من اي محافظة</label>
                                        <select class="form-control" id="county_are_from" name="county_are_from"  placeholder=" أكتب اسم المحافظة الأصل ">
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
                                        <label for="exampleInputEmail">من اي مدينة</label>
                                        <input type="text" class="form-control" id="city_name" name="city_name"  placeholder=" أكتب أسم المدينة  ">
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail">السكن الحال في اي الولاية </label>{{-- unCmoplete --}}
                                        <select class="form-control select2" name="stu_Cur_housing" id="stu_Cur_housing" >
                                          <option label="test">
											 </option>
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
                                        <input type="date" class="form-control" id="entry_turkey" name="entry_turkey"  placeholder=" أكتب تاريخ الدخول الى تركيا ">
                                        </div>
                                        <div class="form-group">
                                        <p class="mg-b-10">هل يوجد لديك الهوية </p>
                                        <select class="form-control select2" name="Identity_type" id="Identity_type">
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
                                    </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail">اسم الولاية </label>{{-- unCmoplete --}}
                                        <select class="form-control select2" name="Id_stud_source" id="Id_stud_source">
                                           <option label="test">
										 </option>
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

                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn ripple btn-primary" type="submit"> حفظ المعلومات</button>
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
                                        <h6 class="modal-title">حذف الطالب من السجل</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                            type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="{{ route('student.destroy') }}" method="post">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <p>هل انت متاكد من عملية الحذف لهذا الطالب  ؟</p><br>
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
                                        <h5 class="modal-title" id="exampleModalLabel">تعديل معلومات الطالب.</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                    <form action="{{ route('student.update') }}" method="post" autocomplete="off">
                                        {{ method_field('patch') }}
                                        {{ csrf_field() }}

                                    <div class="modal-body">
                                    <div class="form-group">
                                    <input type="hidden" name="id" id="id"  readonly>
                                    <label for="exampleInputEmail">اسم الطالب</label>
                                    <input type="text" class="form-control" id="student_name" name="student_name">
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail">تاريخ الميلاد</label>
                                    <input type="date" class="form-control" id="birthday" name="birthday">
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail">العمر</label>
                                    <input type="number" class="form-control" id="age" name="age">
                                    </div>
                                    <div class="col-sm-12">
                                                <p class="mg-b-10"> الحالة الأجتماعي :    </p>
                                                <select class="form-control select2" name="social_state" id="social_state" placeholder=" أكتب الحالة الأجتماعية ">
                                                <option label="test">
                                                             </option>
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
                                                <option value="يتيم/ة" >
                                                    يتيم/ة
                                                </option>
                                                </select>
                                            </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail">البريد الإلكتروني</label>
                                    <input type="text" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail">رقم الهاتف</label>
                                    <input type="text" class="form-control" id="phone" name="phone">
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail">من اي محافظة</label>
                                    <select class="form-control" id="county_are_from" name="county_are_from">
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
                                    <label for="exampleInputEmail">من اي مدينة</label>
                                    <input type="text" class="form-control" id="city_name" name="city_name">
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail">السكن الحالي أي ولاية</label>
                                    <select class="form-control" id="stu_Cur_housing" name="stu_Cur_housing">
                                    <option label="test">
											 </option>
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
                                    <input type="date" class="form-control" id="entry_turkey" name="entry_turkey">
                                    </div>
                                    <div class="form-group">
                                    <p class="mg-b-10">هل يوجد لديك هوية </p>
                                    <select class="form-control select2" name="Identity_type" id="Identity_type">
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
                                </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail">اسم الولاية </label>{{-- unCmoplete --}}
                                    <select class="form-control select2" name="Id_stud_source" id="Id_stud_source">
                                        <option label="test">
											    </option>
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
                                <div class="modal-body">
                                <p class="mg-b-10">حالة الطالب</p>
                                    <select class="form-control select2" name="statu" id="statu" >
                                    <option value="1" >
                                        مقبول
                                    </option>
                                    <option value="0" >
                                        جديد
                                    </option>
                                    <option value="2" >
                                        مرفوض
                                    </option>
                                    <option value="3" >
                                        ارشيف
                                    </option>
                                    <option value="4" >
                                        مؤجل
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
        var social_state = button.data('social_state')
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
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #social_state').val(social_state);
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
    })
</script>

{{--  delete Student Jquery  --}}
<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var student_name = button.data('student_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #student_name').val(student_name);
    })
</script>

{{--  father and Mother   --}}
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

{{--  Add_dollar  --}}
<script>
    $('#exampleModa23').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var student_name = button.data('student_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #student_name').val(student_name);
})
</script>

{{--  Add_tr  --}}
<script>
    $('#exampleModa24').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var student_id = button.data('student_id')
        var student_name = button.data('student_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #student_id').val(student_id);
        modal.find('.modal-body #student_name').val(student_name);
})
</script>


{{--  Add_euro  --}}
<script>
    $('#exampleModa25').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var student_name = button.data('student_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #student_name').val(student_name);
})
</script>

{{--  Add_bim  --}}
<script>
    $('#exampleModa26').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var student_name = button.data('student_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #student_name').val(student_name);
})
</script>

{{-- student statu --}}
<script>
    $('#exampleModal160').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var student_id = button.data('student_id')
        var student_name = button.data('student_name')
        var modal = $(this)
        modal.find('.modal-body #student_id').val(student_id);
        modal.find('.modal-body #student_name').val(student_name);
})
</script>

@endsection



