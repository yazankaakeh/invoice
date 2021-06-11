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
قسم العائلات المرفوضة
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="my-auto mb-0 content-title"> الأقسام </h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">/قسم العائلات المرفوضة</span>
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
                                            @can(' عرض العائلات المؤرشفة ')
                                            <a class=" btn btn-outline-primary btn-block"  href="{{route('family.archive')}}">عرض العائلات المؤرشفة</a>
                                            @endcan
                                            @can(' عرض العائلات المؤجلة ')
                                            <a class=" btn btn-outline-primary btn-block"  href="{{route('family.delayed')}}">عرض العائلات المؤجلة</a>
                                            @endcan
                                            @can(' عرض العائلات الجدد')
                                            <a class=" btn btn-outline-primary btn-block"  href="{{route('new.family')}}">عرض العائلات الجدد</a>
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
                                                    <th class="border-bottom-0">اسم  صاحب القيد</th>
                                                    <th class="border-bottom-0">الحالة</th>
                                                    <th class="border-bottom-0">الجنس</th>
                                                    <th class="border-bottom-0">المدينة</th>
                                                    <th class="border-bottom-0">عدد أفراد</th>
                                                    <th class="border-bottom-0"> اسم المعيل</th>
                                                    <th class="border-bottom-0">عمل المعيل</th>
                                                    <th class="border-bottom-0"> اسم المعيل الثاني</th>
                                                    <th class="border-bottom-0">عمل المعيل الثاني</th>
                                                    <th class="border-bottom-0"> الراتب الشهري</th>
                                                    <th class="border-bottom-0">المستوى النعليمي</th>
                                                    <th class="border-bottom-0">العمل الحالي</th>
                                                    <th class="border-bottom-0">العمل السابق</th>
                                                    <th class="border-bottom-0">مساعدات</th>
                                                    <th class="border-bottom-0">نوع المساعدات</th>
                                                    <th class="border-bottom-0">قيمة المساعدات</th>
                                                    <th class="border-bottom-0">رقم هاتف</th>
                                                    <th class="border-bottom-0">رقم هاتف ثاني</th>
                                                    <th class="border-bottom-0">ملاحظات</th>
                                                    <th class="border-bottom-0">تحديث الحالة</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($family as $x)
                                                <tr>
                                                {{--  @dd($family)  --}}
                                                    <td>{{$x->id}}</td>
                                                    <td>{{$x->family_Constraint}}</td>
                                                    <td>
                                                        <span class="label text-danger d-flex">
                                                        <div  class="ml-1 dot-label bg-danger"></div>مرفوض
                                                        </span>
                                                    </td>
                                                    <td>{{$x->gender}}</td>
                                                    <td>{{$x->city}}</td>
                                                    <td>{{$x->family_number_member}}</td>
                                                    <td>{{$x->family_breadwinner}}</td>
                                                    <td>{{$x->work_breadwinner}}</td>
                                                    <td>{{$x->family_an_breadwinner}}</td>
                                                    <td>{{$x->work_an_breadwinner}}</td>
                                                    <td>{{$x->family_monthly_salary}}</td>
                                                    <td>{{$x->academicel}}</td>
                                                    <td>{{$x->now_work}}</td>
                                                    <td>{{$x->work}}</td>
                                                    <td>{{$x->family_has_aid}}</td>
                                                    <td>{{$x->family_what_aid}}</td>
                                                    <td>{{$x->aid_value}}</td>
                                                    <td>{{$x->phone}}</td>
                                                    <td>{{$x->sec_phone}}</td>
                                                    <td>{{$x->note}}</td>

                                                    <td>
                                                        @can(' عرض حالة العائلات ')
                                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                        data-family_name="{{$x->family_Constraint}}"  data-family_id="{{$x->id}}"
                                                        data-description="" data-toggle="modal"
                                                        href="#exampleModal160" title="تعديل الحالة">
                                                        <i class="si si-user-follow"  style="font-size: 20px;"></i>
                                                    </a>
                                                    @endcan
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
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
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

                        {{-- family statu --}}
                        <div class="modal fade" id="exampleModal160" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">تعديل حالة العائلة </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('family.statu') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="modal-body">
                                <input type="text" class="form-control select2" id="family_name" name="family_name"  readonly>
                                <input type="hidden" name="family_id" id="family_id" readonly>
                                <div class="form-group">
                                <div class="modal-body">
                                <p class="mg-b-10">حالة العائلة</p>
                                    <select class="form-control select2" name="statu" id="statu" >
                                    <option value="0" >
                                        جديد
                                    </option>
                                    <option value="1" >
                                        مقبول
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
{{-- family statu --}}
<script>
    $('#exampleModal160').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var family_id = button.data('family_id')
        var family_name = button.data('family_name')
        var modal = $(this)
        modal.find('.modal-body #family_id').val(family_id);
        modal.find('.modal-body #family_name').val(family_name);
})
</script>



@endsection



