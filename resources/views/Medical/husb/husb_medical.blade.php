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
 قسم الزوج و الزوجة للطبي
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="my-auto mb-0 content-title">اقسام عامة</h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">/معلومات الأم و الأب</span>
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
                                        قائمة معلومات الزوج    .
                                    </div>
                                    <p class="mg-b-20">معلومات السكن للطلاب .</p>
                                    <div class="table-responsive">
                                        <table id="example" class="table key-buttons text-md-nowrap">
                                            <thead>
                                                <tr>
                                                    <th dir="rtl" class="border-bottom-0">رقم المريض/ة</th>
                                                    <th class="border-bottom-0">اسم المريض/ة</th>
                                                    <th class="border-bottom-0">رقم </th>
                                                    <th class="border-bottom-0">الجنس</th>
                                                    <th class="border-bottom-0">اسم الزوج/ة</th>
                                                    <th class="border-bottom-0">المواليد</th>
                                                    <th class="border-bottom-0">المدينة</th>
                                                    <th class="border-bottom-0">الحي</th>
                                                    <th class="border-bottom-0">المستوى الدراسي</th>
                                                    <th class="border-bottom-0">الأختصاص</th>
                                                    <th class="border-bottom-0">حالة العمل</th>
                                                    <th class="border-bottom-0">العمل</th>
                                                    <th class="border-bottom-0">العمل القديم</th>
                                                    <th class="border-bottom-0">تاريخ التعديل</th>
                                                    <th class="border-bottom-0">العمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($husb as $x)
                                                @if($x->medical_id != null)
                                                <tr>
                                                    <td>{{$x->medical_id}}</td>
                                                    <td>{{$x->medical->medical_name}}</td>
                                                    <td>{{$x->id}}</td>
                                                    <td>{{$x->gender}}</td>
                                                    <td>{{$x->wife_name}}</td>
                                                    <td>{{$x->wife_birth}}</td>
                                                    <td>{{$x->wife_city}}</td>
                                                    <td>{{$x->wife_district}}</td>
                                                    {{-- <td>{{$x->wife_mar_stat}}</td> --}}
                                                    <td>{{$x->wife_academicel}}</td>
                                                    <td>{{$x->wife_special}}</td>
                                                    <td>{{$x->wife_is_work}}</td>
                                                    <td>{{$x->wife_now_work}}</td>
                                                    <td>{{$x->wife_Pre_work}}</td>
                                                    <td>{{$x->updated_at}}</td>
                                                    <td>
                                                            {{-- Edite --}}
                                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                                data-id="{{$x->id}}" data-wife_name="{{$x->wife_name}}"
                                                                data-wife_birth="{{$x->wife_birth }}" data-wife_city="{{$x->wife_city}}"
                                                                data-wife_district="{{$x->wife_district}}"
                                                                 {{-- data-wife_mar_stat="{{$x->wife_mar_stat}}" --}}
                                                                data-wife_academicel="{{$x->wife_academicel }}" data-wife_special="{{$x->wife_special}}"
                                                                data-wife_is_work="{{$x->wife_is_work}}" data-wife_now_work="{{$x->wife_now_work }}"
                                                                data-wife_pre_work="{{$x->wife_Pre_work}}"
                                                                data-gender="{{$x->gender}}"
                                                                data-medical_name="{{$x->medical->medical_name}}"   data-medical_id="{{$x->medical_id}}"
                                                                data-toggle="modal"
                                                                href="#exampleModal2" title="تعديل">
                                                                <i class="las la-pen"></i>
                                                            </a>
                                                            {{-- Delete --}}
                                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                                data-id="{{ $x->id }}" data-medical_name="{{$x->medical->medical_name}}"  data-medical_id="{{$x->medical_id}}"
                                                                data-toggle="modal" href="#modaldemo9" title="حذف">
                                                                <i class="las la-trash"> </i>
                                                            </a>
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
                                    <h6 class="modal-title">حذف الدفع</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                        type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="{{ Route('husband_Wife.destroy.medical') }}" method="post">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                        <div class="form-group">
                                        <input type="hidden" name="medical_id" id="medical_id" readonly>
                                        <input type="hidden" name="id" id="id"  readonly>
                                        <label for="exampleInputEmail">البيانات المتعلقة بهذا الطالب </label>
                                        <input class="form-control" name="medical_name" id="medical_name" type="text" readonly>
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
                                    <h5 class="modal-title" id="exampleModalLabel">تعديل القسم</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                 <form action="{{ route('husband_Wife.update.medical') }}" method="post">
                                {{ method_field('patch') }}
                                {{ csrf_field() }}
                               <div class="modal-body">
                                <div class="form-group">
                                <label for="exampleInputEmail">الجنس </label>
                                <select type="text" class="form-control" id="gender" name="gender" >
                                    <option label="test">
                                        اختر نوع الجنس </option>
                                    <option value="ذكر" >
                                   ذكر
                                </option>
                                <option value="انثى" >
                                    انثى
                                </option>
								</select>
                                </div>
                                <div class="form-group">
                                <input type="hidden" name="medical_id" id="medical_id"  readonly>
                                <input type="hidden" name="id" id="id"  readonly>
                                <label for="exampleInputEmail">اسم الزوجة</label>
                                <input type="text" class="form-control" id="wife_name" name="wife_name" placeholder=" أكتب اسم الزوجة ">
                                </div>

                                 <div class="form-group">
                                <label for="exampleInputEmail">تاريخ ميلاد الزوجة</label>
                                <input type="date" class="form-control" id="wife_birth" name="wife_birth" placeholder=" أكتب تاريخ الميلاد">
                                </div>

                                 <div class="form-group">
                                <label for="exampleInputEmail">من اي محافظة من سوريا؟</label>
                                <input type="text" class="form-control" id="wife_city" name="wife_city" placeholder=" أكتب أسم المحافظة ">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail">من اي مدينة؟</label>
                                    <input type="text" class="form-control" id="wife_district" name="wife_district" placeholder=" أكتب أسم المدينة ">
                                </div>

                                 <div class="form-group">
                                <label for="exampleInputEmail">المستوى التعليمي للزوجة</label>
                                <input type="text" class="form-control" id="wife_academicel" name="wife_academicel" placeholder=" أكتب المستوى التعليمي  ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">اختصاص دراسة الزوجة</label>
                                <input type="text" class="form-control" id="wife_special" name="wife_special" placeholder="أكتب أسم الأختصاص">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">هل تعمل الزوجة؟</label>
                                <select class="form-control select2" name="wife_is_work" id="wife_is_work" placeholder=" هل الزوجة تعمل ام لاتعمل ">
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
                                <input type="text" class="form-control" id="wife_pre_work" name="wife_Pre_work" placeholder=" أكتب العمل السابق  ">
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
        var medical_id = button.data('medical_id')
        var id = button.data('id')
        var wife_name = button.data('wife_name')
        var wife_birth = button.data('wife_birth')
        var wife_city = button.data('wife_city')
        var wife_district = button.data('wife_district')
        var wife_mar_stat = button.data('wife_mar_stat')
        var wife_academicel = button.data('wife_academicel')
        var wife_special = button.data('wife_special')
        var wife_is_work = button.data('wife_is_work')
        var wife_now_work = button.data('wife_now_work')
        var wife_pre_work = button.data('wife_pre_work')
        var gender = button.data('gender')
        var modal = $(this)
        modal.find('.modal-body #medical_id').val(medical_id);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #wife_name').val(wife_name);
        modal.find('.modal-body #wife_birth').val(wife_birth);
        modal.find('.modal-body #wife_city').val(wife_city);
        modal.find('.modal-body #wife_district').val(wife_district);
        modal.find('.modal-body #wife_mar_stat').val(wife_mar_stat);
        modal.find('.modal-body #wife_academicel').val(wife_academicel);
        modal.find('.modal-body #wife_special').val(wife_special);
        modal.find('.modal-body #wife_is_work').val(wife_is_work);
        modal.find('.modal-body #wife_now_work').val(wife_now_work);
        modal.find('.modal-body #wife_pre_work').val(wife_pre_work);
        modal.find('.modal-body #gender').val(gender);
    })
</script>

{{-- Delete --}}
<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var medical_id = button.data('medical_id')
        var medical_name = button.data('medical_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #medical_id').val(medical_id);
        modal.find('.modal-body #medical_name').val(medical_name);
    })
</script>
@endsection



