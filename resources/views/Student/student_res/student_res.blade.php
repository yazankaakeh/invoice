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
قسم معلومات السكن للطالب
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="my-auto mb-0 content-title">اقسام عامة</h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">/ قسم السكن للطلاب</span>
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
                                </div>
                                <div class="card-body">
                                    <div class="main-content-label mg-b-5">
                                        قائمة معلومات السكن   .
                                    </div>
                                    <p class="mg-b-20">معلومات السكن للطلاب .</p>
                                    <div class="table-responsive">
                                        <table id="example" class="table key-buttons text-md-nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">رقم الطالب</th>
                                                    <th class="border-bottom-0">اسم الطالب</th>
                                                    <th class="border-bottom-0">رقم</th>
                                                    <th class="border-bottom-0"> نوع السكن</th>
                                                    <th class="border-bottom-0">اجار السكن</th>
                                                    <th class="border-bottom-0">الولاية </th>
                                                    <th class="border-bottom-0">مستلزمات جامعية</th>
                                                    <th class="border-bottom-0">المصاريفك الجامعية</th>
                                                    <th class="border-bottom-0">تاريخ الإضافة</th>
                                                    <th class="border-bottom-0">عمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($res as $x)
                                                <tr>
                                                    <td>{{$x->student_id}}</td>
                                                    <td>{{$x->student->student_name}}</td>
                                                    <td>{{$x->id}}</td>
                                                    <td>{{$x->stud_type_housing}}</td>
                                                    <td>{{$x->stud_rent_housing}}</td>
                                                    <td>{{$x->stud_Place_housing}}</td>
                                                    <td>{{$x->stud_expen}}</td>
                                                    <td>{{$x->stud_valu_expen}}</td>
                                                    <td>{{$x->updated_at}}</td>
                                                    <td>
                                                    @can(' تعديل قسم سكن الطلاب ')
                                                            {{-- Edite --}}
                                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                                data-id="{{$x->id}}" data-stud_type_housing="{{$x->stud_type_housing}}"
                                                                data-stud_rent_housing="{{$x->stud_rent_housing }}" data-stud_expen="{{$x->stud_expen}}"
                                                                data-stud_place_housing="{{$x->stud_Place_housing}}"
                                                                data-stud_valu_expen="{{$x->stud_valu_expen}}" data-student_name="{{$x->student->student_name}}"
                                                                data-student_id="{{$x->student_id}}"
                                                                data-toggle="modal"
                                                                href="#exampleModal2" title="تعديل">
                                                                <i class="las la-pen"></i>
                                                            </a>
                                                    @endcan
                                                    @can('حذف قسم سكن الطلاب ')
                                                            {{-- Delete --}}
                                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                                data-id="{{ $x->id }}"  data-student_name="{{$x->student->student_name}}" data-student_id="{{$x->student_id}}"
                                                                data-toggle="modal" href="#modaldemo9" title="حذف">
                                                                <i class="las la-trash"> </i>
                                                            </a>
                                                    @endcan
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>
                            @if (session()->has('Edit'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Edit') }}</strong>
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

                    </div>
				</div>

                    {{-- delete --}}
                    <div class="modal" id="modaldemo9">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">حذف بيانات سكن الطالب</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                        type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="{{ Route('Student_Residence.destroy') }}" method="post">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                        <div class="form-group">
                                        {{--  <input type="" name="student_id" id="student_id" readonly>
                                        <input type="" name="id" id="id"  readonly>  --}}
                                        <input type="hidden" name="student_id" id="student_id" readonly>
                                        <input type="hidden" name="id" id="id" readonly>
                                        <label for="exampleInputEmail">اسم الطالب</label>
                                        <input class="form-control" name="student_name" id="student_name" type="text" readonly>
                                        </div>
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
                                    <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات سكن الطالب</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                 <form action="{{ route('Student_Residence.update') }}" method="post">
                                {{ method_field('patch') }}
                                {{ csrf_field() }}
                                <div class="modal-body">
                                <input type="hidden" name="student_id" id="student_id" readonly>
                                <input type="hidden" name="id" id="id" readonly>
                                 <div class="form-group">
                                    <p class="mg-b-10">نوع السكن</p>
                                    <select class="form-control select2" name="stud_type_housing" id="stud_type_housing">
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
                                <input type="text" class="form-control" id="stud_Place_housing" name="stud_Place_housing" placeholder="  أكنب الموقع الحالي ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">مصاريف جامعية</label>
                                <input type="text" class="form-control" id="stud_expen" name="stud_expen"  placeholder="  أكنب مصاريف جامعية ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">قيمتها</label>
                                <input type="text" class="form-control" id="stud_valu_expen" name="stud_valu_expen" placeholder="   أكنب قيمة جامعية ">
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
{{--  Edit  --}}
<script>
    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var stud_type_housing = button.data('stud_type_housing')
        var stud_rent_housing = button.data('stud_rent_housing')
        var stud_expen = button.data('stud_expen')
        var student_id = button.data('student_id')
        var stud_place_housing = button.data('stud_place_housing')
        var stud_valu_expen = button.data('stud_valu_expen')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #stud_type_housing').val(stud_type_housing);
        modal.find('.modal-body #stud_rent_housing').val(stud_rent_housing);
        modal.find('.modal-body #student_id').val(student_id);
        modal.find('.modal-body #stud_expen').val(stud_expen);
        modal.find('.modal-body #stud_place_housing').val(stud_place_housing);
        modal.find('.modal-body #stud_valu_expen').val(stud_valu_expen);
    })
</script>


<script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
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
@endsection



