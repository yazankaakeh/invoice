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
قسم  الأم والأب للطالب
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="my-auto mb-0 content-title">اقسام عامة</h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">/قسم الأم و الأب</span>
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
                                        قائمة معلومات الأب و الأم  .
                                    </div>
                                    <p class="mg-b-20">معلومات الأب و الأم للطلاب.</p>
                                    <div class="table-responsive">
                                        <table id="example" class="table key-buttons text-md-nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">رقم الطالب</th>
                                                    <th class="border-bottom-0">اسم الطالب</th>
                                                    <th class="border-bottom-0">رقم </th>
                                                    <th class="border-bottom-0">اسم الأم</th>
                                                    <th class="border-bottom-0">المواليد</th>
                                                    <th class="border-bottom-0">المدينة</th>
                                                    <th class="border-bottom-0">الحي</th>
                                                    <th class="border-bottom-0">المستوى الدراسي</th>
                                                    <th class="border-bottom-0">الأختصاص</th>
                                                    <th class="border-bottom-0">حالة العمل</th>
                                                    <th class="border-bottom-0">العمل</th>
                                                    <th class="border-bottom-0">الراتب الشهري</th>
                                                    <th class="border-bottom-0">اسم الاب</th>
                                                    <th class="border-bottom-0">المواليد</th>
                                                    <th class="border-bottom-0">المدينة</th>
                                                    <th class="border-bottom-0">الحي</th>
                                                    <th class="border-bottom-0">المستوى الدراسي</th>
                                                    <th class="border-bottom-0">الأختصاص</th>
                                                    <th class="border-bottom-0">حالة العمل</th>
                                                    <th class="border-bottom-0">العمل</th>
                                                    <th class="border-bottom-0">الراتب الشهري</th>
                                                    <th class="border-bottom-0">تاريخ التعديل</th>
                                                    <th class="border-bottom-0">العمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($fath as $x)
                                                @if($x->student_id != null)
                                                <tr>
                                                    <td>{{$x->student_id}}</td>
                                                    <td>{{$x->student->student_name}}</td>
                                                    <td>{{$x->id}}</td>
                                                    <td>{{$x->mother_name}}</td>
                                                    <td>{{$x->mother_birth}}</td>
                                                    <td>{{$x->mother_origin}}</td>
                                                    <td>{{$x->mother_origin_city}}</td>
                                                    <td>{{$x->mother_academicel}}</td>
                                                    <td>{{$x->mother_special}}</td>
                                                    <td>{{$x->mother_is_work}}</td>
                                                    <td>{{$x->mother_now_work}}</td>
                                                    <td>{{$x->mother_salary}}</td>
                                                    <td>{{$x->father_name}}</td>
                                                    <td>{{$x->father_birth}}</td>
                                                    <td>{{$x->father_origin}}</td>
                                                    <td>{{$x->father_origin_city}}</td>
                                                    <td>{{$x->father_academicel}}</td>
                                                    <td>{{$x->father_special}}</td>
                                                    <td>{{$x->father_is_work}}</td>
                                                    <td>{{$x->father_now_work}}</td>
                                                    <td>{{$x->father_salary}}</td>
                                                    <td>{{$x->updated_at}}</td>
                                                    <td>
                                                    @can(' تعديل قسم الأب و الأم الطلاب ')

                                                            {{-- Edite --}}
                                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                                data-id="{{$x->id}}" data-mother_name="{{$x->mother_name}}"
                                                                data-mother_birth="{{$x->mother_birth }}" data-mother_origin="{{$x->mother_origin}}"
                                                                data-mother_origin_city="{{$x->mother_origin_city}}" data-mother_academicel="{{$x->mother_academicel}}"
                                                                data-mother_now_work="{{$x->mother_now_work }}" data-mother_is_work="{{$x->mother_is_work}}"
                                                                data-mother_salary="{{$x->mother_salary}}" data-mother_special="{{$x->mother_special }}"
                                                                data-father_name="{{$x->father_name}}"
                                                                data-father_birth="{{$x->father_birth}}" data-father_origin="{{$x->father_origin}}"
                                                                data-father_origin_city="{{$x->father_origin_city}}" data-father_academicel="{{$x->father_academicel}}"
                                                                data-father_special="{{$x->father_special}}"
                                                                data-father_is_work="{{$x->father_is_work}}" data-father_now_work="{{$x->father_now_work}}" data-father_salary="{{$x->father_salary}}"
                                                                 data-student_name="{{$x->student->student_name}}"   data-student_id="{{$x->student_id}}"
                                                                data-toggle="modal"
                                                                href="#exampleModal2" title="تعديل">
                                                                <i class="las la-pen"></i>
                                                            </a>
                                                    @endcan
                                                    @can('حذف قسم الأب و الأم الطلاب ')
                                                            {{-- Delete --}}
                                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                                data-id="{{ $x->id }}" data-student_name="{{$x->student->student_name}}"  data-student_id="{{$x->student_id}}"
                                                                data-toggle="modal" href="#modaldemo9" title="حذف">
                                                                <i class="las la-trash"> </i>
                                                            </a>
                                                    @endcan
                                                    </td>
                                                </tr>
                                                @endif
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
                                    <h6 class="modal-title">حذف معلومات الأب و الأم</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                        type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="{{ Route('FatherandMother.destroy') }}" method="post">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                        <div class="form-group">
                                        <input type="hidden" name="student_id" id="student_id" readonly>
                                        <input type="hidden" name="id" id="id"  readonly>
                                        <label for="exampleInputEmail">البيانات الأم و الأب للطالب. </label>
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
                                    <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات الأم والأب</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                 <form action="{{ route('FatherandMother.update') }}" method="post">
                                {{ method_field('patch') }}
                                {{ csrf_field() }}
                                <div class="modal-body">
                                <div class="form-group">
                                <input type="HIDDEN" name="student_id" id="student_id"  readonly>
                                <input type="HIDDEN" name="id" id="id"  readonly>

                                <label for="exampleInputEmail">اسم الأم</label>
                                <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder=" أكتب أسم الأم  ">
                                </div>

                                 <div class="form-group">
                                <label for="exampleInputEmail">تاريخ ميلاد الأم</label>
                                <input type="date" class="form-control" id="mother_birth" name="mother_birth" placeholder=" أكتب تاريخ الميلاد ">
                                </div>

                                 <div class="form-group">
                                <label for="exampleInputEmail">من اي محافظة من سوريا؟</label>
                                <input type="text" class="form-control" id="mother_origin" name="mother_origin" placeholder=" أكتب أسم المحافظة ">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail">من اي مدينة؟</label>
                                    <input type="text" class="form-control" id="mother_origin_city" name="mother_origin_city" placeholder=" أكتب أسم المدينة">
                                </div>
                                 <div class="form-group">
                                <label for="exampleInputEmail">المستوى التعليمي للأم</label>
                                <input type="text" class="form-control" id="mother_academicel" name="mother_academicel" placeholder=" أكتب المستوى النعليمي ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">اختصاص دراسة الأم</label>
                                <input type="text" class="form-control" id="mother_special" name="mother_special" placeholder=" أكتب أسم الأختصاص">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">هل تعمل الأم</label>
                                <select class="form-control select2" name="mother_is_work" id="mother_is_work" placeholder="هل الأم تعمل ام لا تعمل">
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
                                <input type="text" class="form-control" id="mother_salary" name="mother_salary" placeholder="  أكتب الراتب الشهري للأم ">
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
                                <input type="text" class="form-control" id="father_origin" name="father_origin" placeholder=" أكتب أسم المحافظة ">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail">من اي مدينة؟</label>
                                    <input type="text" class="form-control" id="father_origin_city" name="father_origin_city" placeholder=" أكتب أسم المدينة">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">المستوى التعليمي للأب</label>
                                <input type="text" class="form-control" id="father_academicel" name="father_academicel" placeholder=" أكتب المستوى التعليمي ">
                                </div>

                                <div class="form-group">
                                <label for="exampleInputEmail">اختصاص دراسة الأب</label>
                                <input type="text" class="form-control" id="father_special" name="father_special" placeholder=" أكتب أسم الأختصاص">
                                </div>

                                <div class="form-group">
                                <label for="exampleInputEmail">هل يعمل للأب</label>
                                <select class="form-control select2" name="father_is_work" id="father_is_work" placeholder="هل الأم تعمل ام لا تعمل">
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
                                <input type="text" class="form-control" id="father_salary" name="father_salary" placeholder=" أكتب الراتب الشهري ">
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
        var student_id = button.data('student_id')
        var id = button.data('id')
        var mother_name = button.data('mother_name')
        var mother_birth = button.data('mother_birth')
        var mother_origin = button.data('mother_origin')
        var mother_origin_city = button.data('mother_origin_city')
        var mother_academicel = button.data('mother_academicel')
        var mother_now_work = button.data('mother_now_work')
        var mother_is_work = button.data('mother_is_work')
        var mother_salary = button.data('mother_salary')
        var father_name = button.data('father_name')
        var father_birth = button.data('father_birth')
        var father_origin = button.data('father_origin')
        var father_origin_city = button.data('father_origin_city')
        var father_academicel = button.data('father_academicel')
        var father_special = button.data('father_special')
        var father_is_work = button.data('father_is_work')
        var father_now_work = button.data('father_now_work')
        var father_salary = button.data('father_salary')
        var mother_special = button.data('mother_special')
        var modal = $(this)
        modal.find('.modal-body #student_id').val(student_id);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #mother_name').val(mother_name);
        modal.find('.modal-body #mother_birth').val(mother_birth);
        modal.find('.modal-body #mother_origin').val(mother_origin);
        modal.find('.modal-body #mother_origin_city').val(mother_origin_city);
        modal.find('.modal-body #mother_academicel').val(mother_academicel);
        modal.find('.modal-body #mother_now_work').val(mother_now_work);
        modal.find('.modal-body #mother_is_work').val(mother_is_work);
        modal.find('.modal-body #mother_salary').val(mother_salary);
        modal.find('.modal-body #father_name').val(father_name);
        modal.find('.modal-body #father_birth').val(father_birth);
        modal.find('.modal-body #father_origin').val(father_origin);
        modal.find('.modal-body #father_origin_city').val(father_origin_city);
        modal.find('.modal-body #father_academicel').val(father_academicel);
        modal.find('.modal-body #father_special').val(father_special);
        modal.find('.modal-body #father_is_work').val(father_is_work);
        modal.find('.modal-body #father_now_work').val(father_now_work);
        modal.find('.modal-body #father_salary').val(father_salary);
        modal.find('.modal-body #mother_special').val(mother_special);
    })
</script>

{{-- Delete --}}
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



