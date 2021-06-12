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
طلاب الارشيف
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="my-auto mb-0 content-title"> الأقسام</h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">طلاب الارشيف/قسم الطلاب</span>
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
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                                data-toggle="dropdown" id="dropdownMenuButton" type="button">المزيد من الخيارات <i class="btn btn-primary dropdown-toggle dropdown-toggle-split"></i></button>
                                                <div  class="dropdown-menu tx-13">
                                            @can(' عرض الطلاب المؤجلين ')
                                            <a class=" btn btn-outline-primary btn-block"  href="{{route('student.delayed')}}">عرض الطلاب المؤجلين</a>
                                            @endcan
                                            @can(' عرض الطلاب الجدد')
                                            <a class=" btn btn-outline-primary btn-block"  href="{{route('student.new')}}">عرض الطلاب الجدد</a>
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
                                                    <th class="border-bottom-0">الحالة الاجنماعية</th>
                                                    <th class="border-bottom-0">من اي مدينة</th>
                                                    <th class="border-bottom-0">السكن الحالي</th>
                                                    <th class="border-bottom-0">سنة الدخول</th>
                                                    <th class="border-bottom-0">نوع الإقامة</th>
                                                    <th class="border-bottom-0">الولاية</th>

                                                    <th class="border-bottom-0">اسم الجامعة</th>
                                                    <th class="border-bottom-0"> موقع الجامعة</th>
                                                    <th class="border-bottom-0">أختصاص</th>
                                                    <th class="border-bottom-0">السنة الدراسية</th>
                                                    <th class="border-bottom-0"> المعدل الدراسي</th>

                                                    <th class="border-bottom-0"> اضافة دفعة بالدولار</th>
                                                    <th class="border-bottom-0">اضافة دفعة تركي</th>
                                                    <th class="border-bottom-0">اضافة دفعة يورو</th>
                                                    <th class="border-bottom-0">اضافة كروت بيم</th>
                                                    <th class="border-bottom-0">اضافة زوج وزوجة</th>
                                                    <th class="border-bottom-0">اضافة اب وام</th>
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
                                                @foreach($univ as $x)
                                                @if($x->student_id != null && $x->student->new_statu == 3)

                                                <tr>
                                                    <td>{{$x->student->id}}</td>
                                                    <td>{{$x->student->student_name}}</td>
                                                    <td>
                                                        <span class="label text-warning d-flex">
                                                        <div class="dot-label bg-warning ml-1"></div>مؤرشف
                                                        </span>
                                                    </td>
                                                    <td>{{$x->student->birthday}}</td>
                                                    <td>{{$x->student->age}}</td>
                                                    <td>{{$x->student->social_state}}</td>
                                                    <td>{{$x->student->email}}</td>
                                                    <td dir="ltr" lang="en">{{$x->student->phone}}</td>
                                                    <td>{{$x->student->county_are_from}}</td>
                                                    <td>{{$x->student->social_state}}</td>
                                                    <td>{{$x->student->city_name}}</td>
                                                    <td>{{$x->student->stu_Cur_housing}}</td>
                                                    <td>{{$x->student->entry_turkey}}</td>
                                                    <td>{{$x->student->Identity_type}}</td>
                                                    <td>{{$x->student->Id_stud_source}}</td>

                                                    <td>{{$x->univer_name}}</td>
                                                    <td>{{$x->univer_location}}</td>
                                                    <td>{{$x->univer_special}}</td>
                                                    <td>{{$x->Schoo_year}}</td>
                                                    <td>{{$x->Current_rate}}</td>


                                                <td>
                                                @can(' مدفوعات بالدولار الطلاب ')
                                                    @if($x->student->usd_statu != 0)
                                                    <a class=" btn btn-sm btn-info" href="/Student_usd/show/student/usd/{{$x->id}}"><i class="far fa-eye"  style="font-size: 17px;"></i> </a>
                                                    @endif
                                                @endcan
                                                </td>

                                                <td>
                                                @can(' مدفوعات بالتركي الطلاب ')
                                                    @if($x->student->tr_statu != 0)
                                                    <a class=" btn btn-sm btn-info" href="/Student_tr/show/student/tr/{{$x->id}}"><i class="far fa-eye"  style="font-size: 17px;"></i> </a>
                                                    @endif
                                                @endcan
                                                </td>


                                                <td>
                                                @can(' مدفوعات باليورو الطلاب ')
                                                    @if($x->student->euro_statu != 0)
                                                    <a class=" btn btn-sm btn-info" href="/Student_euro/show/student/euro/{{$x->id}}"><i class="far fa-eye"  style="font-size: 17px;"></i> </a>
                                                    @endif
                                                @endcan
                                                </td>

                                                <td>
                                                @can(' مدفوعات بالكرت البيم الطلاب ')
                                                    @if($x->student->bim_statu != 0)
                                                    <a class=" btn btn-sm btn-info" href="/Student_bim/show/student/bim/{{$x->id}}/"><i class="far fa-eye"  style="font-size: 17px;"></i> </a>
                                                    @endif
                                                @endcan
                                                </td>

                                                    {{-- wife and husband  --}}
                                                    <td>
                                                    @if($x->student->husband_wife_statu == 1)
                                                    @can(' قسم الزوج والزوجة الطلاب ')
                                                        <a class="btn btn-sm btn-info" href="/husband_Wife/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    @endcan
                                                    @endif
                                                    </td>

                                                    {{-- father and mother  --}}
                                                    <td>
                                                    @if($x->student->father_mother_statu == 1)
                                                    @can(' قسم الأب والأم الطلاب ')
                                                        <a class="btn btn-sm btn-info" href="/father_and_mother/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    @endcan
                                                    @endif
                                                    </td>


                                                    <td>
                                                    {{-- add children  --}}
                                                    @if($x->student->child_statu != 0)
                                                    @can(' قسم الأطفال الطلاب ')
                                                        <a class=" btn btn-sm btn-info" href="/children/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    @endcan
                                                    @endif
                                                    </td>

                                                    {{-- Medical_Status  --}}
                                                    <td>
                                                    @if($x->student->medical_statu == 1)
                                                    @can(' اضافة الحالة الصحية الطلاب ')
                                                        <a class=" btn btn-sm btn-info" href="/Medical_Statu/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    @endcan
                                                    @endif
                                                    </td>

                                                    <td>
                                                    @if($x->student->residance_statu == 1)
                                                    @can(' قسم سكن الطلاب ')
                                                        <a class=" btn btn-sm btn-info" href="/Student_Residance/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    @endcan
                                                    @endif
                                                    </td>

                                                        {{-- Quran  --}}
                                                    <td>
                                                    @if($x->student->quran_statu == 1)
                                                    @can(' قسم القرأن الطلاب ')
                                                    <a class=" btn btn-sm btn-info" href="/Quran/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    @endcan
                                                    @endif
                                                    </td>

                                                    {{-- Job  --}}
                                                    <td>
                                                    @if($x->student->job_statu == 1)
                                                    @can(' قسم العمل الطلاب ')
                                                        <a class=" btn btn-sm btn-info" href="/job/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    @endcan
                                                    @endif
                                                    </td>

                                                    {{-- Scholarship  --}}
                                                    <td>
                                                    @if($x->student->scholarship_statu == 1)
                                                    @can(' قسم المنح الدراسية الطلاب ')
                                                        <a class=" btn btn-sm btn-info" href="/Scholarship/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    @endcan
                                                    @endif
                                                    </td>

                                                    {{-- University  --}}
                                                    <td>
                                                    @if($x->student->university_statu == 1)
                                                    @can(' قسم الجامعة الطلاب ')
                                                    <a class=" btn btn-sm btn-info" href="/University/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    @endcan
                                                    @endif
                                                    </td>

                                                    {{-- Sister and Brother  --}}

                                                    <td>
                                                    @can(' قسم الأخوة الطلاب ')
                                                    @if($x->student->sis_statu != 0)
                                                    <a class="btn btn-sm btn-info" href="/Sister_and_Brother/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                    @endif
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

                            @if (session()->has('accepted'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('accepted') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if (session()->has('rejected'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('rejected') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if (session()->has('archived'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('archived') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if (session()->has('delayed'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('delayed') }}</strong>
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
                                    <option value="2" >
                                        مرفوض
                                    </option>
                                    <option value="0" >
                                        جديد
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



