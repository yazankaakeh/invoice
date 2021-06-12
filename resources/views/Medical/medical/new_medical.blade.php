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
قسم المرضى الجدد
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="my-auto mb-0 content-title">الأقسام </h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">/قسم المرضى الجدد </span>
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
                                                    <th class="border-bottom-0">حالة القبول</th>
                                                    <th class="border-bottom-0">العمر</th>
                                                    <th class="border-bottom-0">الجنس</th>
                                                    <th class="border-bottom-0">هل يوجد هوية</th>
                                                    <th class="border-bottom-0">الولاية</th>
                                                    <th class="border-bottom-0"> الهاتف</th>
                                                    <th class="border-bottom-0">ملاحظات</th>
                                                    <th class="border-bottom-0"> نوع المرض</th>
                                                    <th class="border-bottom-0"> اسم المرض</th>
                                                    <th class="border-bottom-0"> تقييم الحالة الصحية</th>
                                                    <th class="border-bottom-0"> اسم الدكتور</th>
                                                    <th class="border-bottom-0"> تكلفة العلاج</th>
                                                    <th class="border-bottom-0"> نوع العلاج</th>
                                                    <th class="border-bottom-0"> مدة العلاج</th>
                                                    <th class="border-bottom-0"> تاريخ البدء</th>
                                                    <th class="border-bottom-0"> تاريخ الانتهاء </th>
                                                    <th class="border-bottom-0"> طبيب آخر </th>
                                                    <th class="border-bottom-0"> تاريخ التسجيل</th>
                                                    <th class="border-bottom-0"> تعديل الحالة</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($medical as $x)
                                                @if ($x->medical_id != null && $x->medical->new_statu == 0 )
                                                <tr>
                                                    <td>{{$x->medical->id}}</td>
                                                    <td>{{$x->medical->medical_name}}</td>
                                                    <td>
                                                        <span class="label text-success d-flex">
                                                        <div  class="dot-label bg-success ml-1"></div>جديد
                                                        </span>
                                                    </td>
                                                    <td>{{$x->medical->medical_age}}</td>
                                                    <td>{{$x->medical->gender}}</td>
                                                    <td>{{$x->medical->medical_have_id}}</td>
                                                    <td>{{$x->medical->medical_id_extr}}</td>
                                                    <td>{{$x->medical->medical_number}}</td>
                                                    <td>{{$x->medical->note}}</td>
                                                    <td>{{$x->disease_type}}</td>
                                                    <td>{{$x->disease_name}}</td>
                                                    <td>{{$x->medical_rate}}</td>
                                                    <td>{{$x->dr_name}}</td>
                                                    <td>{{$x->treat_cost}}</td>
                                                    <td>{{$x->treat_type}}</td>
                                                    <td>{{$x->treat_Duratio}}</td>
                                                    <td>{{$x->date_accept}}</td>
                                                    <td>{{$x->date_end}}</td>
                                                    <td>{{$x->Trans_to_doctor}}</td>
                                                    <td>{{$x->created_at}}</td>

                                                    <td>
                                                        @can(' عرض حالة الطبي ')
                                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                        data-medical_name="{{$x->medical->medical_name}}"  data-medical_id="{{$x->medical->id}}"
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



