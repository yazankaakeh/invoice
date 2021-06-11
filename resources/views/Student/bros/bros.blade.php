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
قسم  الأخوة للطالب
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="my-auto mb-0 content-title">اقسام عامة</h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">/قسم الأخوة و الأخوات</span>
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
                                        قائمة معلومات الأخوة و الأخوات  .
                                    </div>
                                    <p class="mg-b-20">معلومات الأخوة و الأخوات للطلاب .</p>
                                    <div class="table-responsive">
                                        <table id="example" class="table key-buttons text-md-nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">رقم الطالب</th>
                                                    <th class="border-bottom-0">اسم الطالب</th>
                                                    <th class="border-bottom-0">رقم الاخ</th>
                                                    <th class="border-bottom-0">اسم الأخ</th>
                                                    <th class="border-bottom-0">العمر</th>
                                                    <th class="border-bottom-0">الجنس</th>
                                                    <th class="border-bottom-0">المرحلة الدراسية</th>
                                                    <th class="border-bottom-0">الاختصاص الدراسي</th>
                                                    <th class="border-bottom-0">العمل</th>
                                                    <th class="border-bottom-0">الراتب</th>
                                                    <th class="border-bottom-0">تاريخ الدفع</th>
                                                    <th class="border-bottom-0">عمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($bros as $x)
                                                <tr>
                                                    <td>{{$x->student_id}}</td>
                                                    <td>{{$x->student->student_name}}</td>
                                                    <td>{{$x->id}}</td>
                                                    <td>{{$x->name}}</td>
                                                    <td>{{$x->age}}</td>
                                                    <td>{{$x->gender}}</td>
                                                    <td>{{$x->academicel}}</td>
                                                    <td>{{$x->special}}</td>
                                                    <td>{{$x->work}}</td>
                                                    <td>{{$x->salary}}</td>
                                                    <td>{{$x->updated_at}}</td>
                                                    <td>
                                                            {{-- Edite --}}
                                                            @can(' تعديل قسم الأخوة الطلاب ')

                                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                                data-id="{{$x->id}}" data-special="{{$x->special}}"
                                                                data-name="{{$x->name }}" data-academicel="{{$x->academicel}}"
                                                                data-gender="{{$x->gender}}" data-salary="{{$x->salary}}"
                                                                data-age="{{$x->age}}"
                                                                data-work="{{$x->work}}" data-student_name="{{$x->student->student_name}}"
                                                                data-student_id="{{$x->student_id}}"
                                                                data-toggle="modal"
                                                                href="#exampleModal2" title="تعديل">
                                                                <i class="las la-pen"></i>
                                                            </a>
                                                            @endcan
                                                            {{-- Delete --}}
                                                            @can('حذف قسم الأخوة الطلاب ')
                                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                                data-id="{{ $x->id }}"  data-name="{{$x->name }}" data-student_id="{{$x->student_id}}"
                                                                data-toggle="modal" href="#modaldemo9" title="حذف">
                                                                <i class="las la-trash"> </i>
                                                            @endcan
                                                            </a>
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
                                    <strong>ملاحظة !</strong> {{ $error }}
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
                                    <h6 class="modal-title">حذف معلومات الأخوة للطالب</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                        type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="{{ Route('Sister_and_Brother.destroy') }}" method="post">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                        <div class="form-group">
                                        <input type="hidden" name="student_id" id="student_id" readonly>
                                        <input type="hidden" name="id" id="id"  readonly>
                                        <label for="exampleInputEmail">الاسم الأخ أو الأخت.</label>
                                        <input class="form-control" name="name" id="name" type="text" readonly>
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
                                    <h5 class="modal-title" id="exampleModalLabel">تعديل معلومات الأخوة للطالب</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                 <form action="{{ route('Sister_and_Brother.update') }}" method="post">
                                {{ method_field('patch') }}
                                {{ csrf_field() }}
                                <div class="modal-body">
                                <input type="hidden" name="id" id="id" readonly>
                                <input type="hidden" name="student_id" id="student_id" readonly>
                                <div class="form-group">
                                <label for="exampleInputEmail">الاسم </label>
                                <input type="text" class="form-control" id="name" name="name" placeholder=" أكتب الأسم بالكامل">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">العمر</label>
                                <input type="text" class="form-control" id="age" name="age" placeholder=" أكتب العمر بأرقام ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">الجنس </label>
                                <select type="text" class="form-control" id="gender" name="gender" >
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
                                <input type="text" class="form-control" id="academicel" name="academicel" placeholder="   كم قيمة المنحة المالية">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">الأختصاص </label>
                                <input type="text" class="form-control" id="special" name="special" placeholder=" أكتب اسم الأختصاص">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">ما هو نوع العمل </label>
                                <input type="text" class="form-control" id="work" name="work" placeholder=" أكتب نوع العمل ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">كم الراتب </label>
                                <input type="text" class="form-control" id="salary" name="salary" placeholder=" أكتب قينة الراتب الشهري   ">
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
        var special = button.data('special')
        var academicel = button.data('academicel')
        var age = button.data('age')
        var student_id = button.data('student_id')
        var name = button.data('name')
        var salary = button.data('salary')
        var gender = button.data('gender')
        var work = button.data('work')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #special').val(special);
        modal.find('.modal-body #academicel').val(academicel);
        modal.find('.modal-body #student_id').val(student_id);
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #salary').val(salary);
        modal.find('.modal-body #age').val(age);
        modal.find('.modal-body #gender').val(gender);
        modal.find('.modal-body #work').val(work);
    })
</script>

<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var student_id = button.data('student_id')
        var name = button.data('name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #student_id').val(student_id);
        modal.find('.modal-body #name').val(name);
    })
</script>
@endsection



