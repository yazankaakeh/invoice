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
قسم  الجامعة للطالب
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="my-auto mb-0 content-title">اقسام عامة</h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">/قسم الجامعة</span>
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
                                        قائمة معلومات الجامعة  .
                                    </div>
                                    <p class="mg-b-20">معلومات الجامعة للطلاب .</p>
                                    <div class="table-responsive">
                                        <table id="example" class="table key-buttons text-md-nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">رقم الطالب</th>
                                                    <th class="border-bottom-0">اسم الطالب</th>
                                                    <th class="border-bottom-0">رقم </th>
                                                    <th class="border-bottom-0">اسم الجامعة</th>
                                                    <th class="border-bottom-0"> موقع الجامعة</th>
                                                    <th class="border-bottom-0">أختصاص</th>
                                                    <th class="border-bottom-0">عدد السنوات</th>
                                                    <th class="border-bottom-0">السنة الدراسية</th>
                                                    <th class="border-bottom-0">المعدل الحالي</th>
                                                    <th class="border-bottom-0"> المعدل التراكمي</th>
                                                    <th class="border-bottom-0">اللعة الدراسية</th>
                                                    <th class="border-bottom-0">المستوى الحالي للغة</th>
                                                    <th class="border-bottom-0"> معدل المستوى الحالي للغة</th>
                                                    <th class="border-bottom-0">معدل المستوى السابق للغة</th>
                                                    <th class="border-bottom-0"> طريقة القبول بالجامعة</th>
                                                    <th class="border-bottom-0">معدل القبول</th>
                                                    <th class="border-bottom-0"> هل انت يجامعة أخرى</th>
                                                    <th class="border-bottom-0"> جامعة أخرى أسم</th>
                                                    <th class="border-bottom-0">اسم أختصاص أخر</th>
                                                    <th class="border-bottom-0">كيفية القبول بالجامعة الأخرى</th>
                                                    <th class="border-bottom-0">معدل القبول جامعة الأخرى</th>
                                                    <th class="border-bottom-0">السنة الدراسية الأخرى</th>
                                                    <th class="border-bottom-0">المعدل للحامعة الأخرى</th>
                                                    <th class="border-bottom-0">اقساط جامعية</th>
                                                    <th class="border-bottom-0">مصاريف جامعية</th>
                                                    <th class="border-bottom-0">كم مصاريف جامعية</th>
                                                    <th class="border-bottom-0">تاريخ التعديل</th>
                                                    <th class="border-bottom-0">العمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($univ as $x)
                                                <tr>
                                                    <td>{{$x->student_id}}</td>
                                                    <td>{{$x->student->student_name}}</td>
                                                    <td>{{$x->id}}</td>
                                                    <td>{{$x->univer_name}}</td>
                                                    <td>{{$x->univer_location}}</td>
                                                    <td>{{$x->univer_special}}</td>
                                                    <td>{{$x->Number_years}}</td>
                                                    <td>{{$x->Schoo_year}}</td>
                                                    <td>{{$x->Current_rate}}</td>
                                                    <td>{{$x->Cumulative_rate}}</td>
                                                    <td>{{$x->language_name}}</td>
                                                    <td>{{$x->Current_level}}</td>
                                                    <td>{{$x->Curr_level_rate}}</td>
                                                    <td>{{$x->Previ_level_rate}}</td>
                                                    <td>{{$x->Univer_Accept}}</td>
                                                    <td>{{$x->Accept_rate}}</td>
                                                    <td>{{$x->are_you_univer}}</td>
                                                    <td>{{$x->Ano_univer_name}}</td>
                                                    <td>{{$x->Ano_univer_special}}</td>
                                                    <td>{{$x->Ano_univer_Accept}}</td>
                                                    <td>{{$x->Ano_accept_rate}}</td>
                                                    <td>{{$x->Ano_Schoo_year}}</td>
                                                    <td>{{$x->Ano_Current_rate}}</td>
                                                    <td>{{$x->univer_Premiums}}</td>
                                                    <td>{{$x->univer_fees}}</td>
                                                    <td>{{$x->univer_fees_value}}</td>
                                                    <td>{{$x->updated_at}}</td>
                                                    <td>
                                                    @can(' تعديل قسم الجامعة الطلاب ')
                                                            {{-- Edite --}}
                                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                                data-id="{{$x->id}}" data-univer_name="{{$x->univer_name}}"
                                                                data-univer_location="{{$x->univer_location }}"  data-univer_special="{{$x->univer_special}}"
                                                                data-number_years="{{$x->Number_years}}"
                                                                data-schoo_year="{{$x->Schoo_year}}"  data-current_rate="{{$x->Current_rate}}"
                                                                data-cumulative_rate="{{$x->Cumulative_rate}}"  data-language_name="{{$x->language_name }}"
                                                                data-current_level="{{$x->Current_level}}"  data-curr_level_rate="{{$x->Curr_level_rate}}"
                                                                data-previ_level_rate="{{$x->Previ_level_rate}}"  data-accept_rate="{{$x->Accept_rate}}"
                                                                data-ano_univer_name="{{$x->Ano_univer_name}}"  data-are_you_univer="{{$x->are_you_univer}}"
                                                                data-ano_schoo_year="{{$x->Ano_Schoo_year}}"  data-ano_univer_special="{{$x->Ano_univer_special}}"
                                                                data-ano_univer_accept="{{$x->Ano_univer_Accept}}"  data-ano_accept_rate="{{$x->Ano_accept_rate}}"
                                                                data-ano_Current_rate="{{$x->Ano_Current_rate}} " data-univer_premiums="{{$x->univer_Premiums}}"
                                                                data-univer_accept="{{$x->Univer_Accept}}"
                                                                data-univer_fees="{{$x->univer_fees}}"  data-univer_fees_value="{{$x->univer_fees_value}}"
                                                                data-student_name="{{$x->student->student_name}}"   data-student_id="{{$x->student_id}}"
                                                                data-id="{{$x->id}}"
                                                                 data-id="{{ $x->id }}" data-student_name="{{$x->student->student_name}}"  data-student_id="{{$x->student_id}}"
                                                                data-toggle="modal" href="#exampleModal2" title="تعديل">
                                                                <i class="las la-pen"></i>
                                                            </a>
                                                    @endcan
                                                    @can('حذف قسم الجامعة الطلاب ')
                                                            {{-- Delete --}}
                                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                                data-id="{{ $x->id }}" data-student_name="{{$x->student->student_name}}"  data-student_id="{{$x->student_id}}"
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
                                    <h6 class="modal-title">حذف بيانات الجامعة للطالب</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                        type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="{{ Route('University.destroy') }}" method="post">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                        <div class="form-group">
                                        <input type="hidden" name="student_id" id="student_id" readonly>
                                        <input type="hidden" name="id" id="id"  readonly>
                                        <label for="exampleInputEmail">اسم الطالب.</label>
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
                                    <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات الجامعة للطالب</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                 <form action="{{ route('University.update') }}" method="post">
                                {{ method_field('patch') }}
                                {{ csrf_field() }}

                                <input type="hidden" name="id" id="id" readonly>
                                <input type="hidden" name="student_id" id="student_id" readonly>
                                <div class="form-group">
                                <label for="exampleInputEmail">اسم الجامعة </label>
                                <input type="text" class="form-control" id="univer_name" name="univer_name" placeholder="   أكنب اسم الجامعة ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">مكان الجامعة</label>
                                <input type="text" class="form-control" id="univer_location" name="univer_location" placeholder="   أكنب مكان الجامعة ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">أختصاص الجامعي</label>
                                <input type="text" class="form-control" id="univer_special" name="univer_special" placeholder="   أكنب أسم أختصاص الجامعي ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">عدد سنوات الدراسة </label>
                                <input type="text" class="form-control" id="number_years" name="Number_years" placeholder="   أكنب عدد سنوات الدراسة ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">السنة الدراسية الحالية </label>
                                <select type="text" class="form-control" id="schoo_year" name="Schoo_year" >
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
                                <input type="text" class="form-control" id="current_rate" name="Current_rate" placeholder="   أكنب لمعدل الحالي ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">المعدل التراكمي </label>
                                <input type="text" class="form-control" id="cumulative_rate" name="Cumulative_rate" placeholder="   أكنب المعدل التراكمي ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">اللغة الدراسية </label>
                                <select type="text" class="form-control" id="language_name" name="language_name">
                                <option value="العربية" >
                                   العربية
                                </option>
                                <option value="التركية">
                                    التركية
                                </option>
                                <option value="الأنكليزية" >
                                     الأنكليزية
                                </option>
								</select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail"> المستوى الحالي للغة </label>
                                <input type="text" class="form-control" id="current_level" name="Current_level" placeholder="   أكنب المستوى الحالي للغة ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">معدل المستوى الحالي للغة </label>
                                <input type="text" class="form-control" id="curr_level_rate" name="Curr_level_rate" placeholder="   أكنب معدل المستوى الحالي للغة ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">معدل المستوى السابق للغة </label>
                                <input type="text" class="form-control" id="previ_level_rate" name="Previ_level_rate" placeholder="   أكنب معدل المستوى السابق للغة ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">طريقة قبول الجامعي </label>
                                <input type="text" class="form-control" id="univer_accept" name="Univer_Accept" placeholder="   أكنب طريقة قبول الجامعي ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">معدل القبول الجامعي </label>
                                <input type="text" class="form-control" id="accept_rate" name="Accept_rate" placeholder="   أكنب معدل القبول الجامعي ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">هل يدرس بحامعة ثانية </label>
                                <select type="text" class="form-control" id="are_you_univer" name="are_you_univer">
                                <option value="يوجد">
                                    يوجد
                                </option>
                                <option value="لايوجد">
                                    لايوجد
                                </option>
								</select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">اسم الجامعة الثانية </label>
                                <input type="text" class="form-control" id="ano_univer_name" name="Ano_univer_name" placeholder="   أكنب اسم الجامعة الثانية ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">الأختصاص الثاني </label>
                                <input type="text" class="form-control" id="ano_univer_special" name="Ano_univer_special" placeholder="   أكنب الأختصاص بالجامعة الثانية ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">طريقة القبول بالجامعة الثانية </label>
                                <input type="text" class="form-control" id="ano_univer_accept" name="Ano_univer_Accept" placeholder="   أكنب طريقة القبول ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">معدل القبول  للجامعة الثانية </label>
                                <input type="text" class="form-control" id="ano_accept_rate" name="Ano_accept_rate" placeholder="   أكنب معدل القبول ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">  السنة الدراسية بالجامعة الثانية   </label>
                                <select type="text" class="form-control" id="ano_schoo_year" name="Ano_Schoo_year">
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
                                <input type="text" class="form-control" id="ano_current_rate" name="Ano_Current_rate" placeholder="   أكنب المعدل بالجامعة الثانية ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">الأفساط الجامعية </label>
                                <input type="text" class="form-control" id="univer_premiums" name="univer_Premiums" placeholder="   أكنب الأفساط الجامعية ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">ماهي مصاريف الجامعية </label>
                                <input type="textarea" class="form-control" id="univer_fees" name="univer_fees" placeholder="    أكنب ماهي مصاريف الجامعية ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">كم قيمة المصاريف الجامعية  </label>
                                <input type="text" class="form-control" id="univer_fees_value" name="univer_fees_value" placeholder="   أكنب قيمة المصاريف الجامعية ">
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
        var univer_name = button.data('univer_name')
        var univer_location = button.data('univer_location')
        var univer_special = button.data('univer_special')
        var number_years = button.data('number_years')
        var schoo_year = button.data('schoo_year')
        var current_rate = button.data('current_rate')
        var cumulative_rate = button.data('cumulative_rate')
        var current_level = button.data('current_level')
        var curr_level_rate = button.data('curr_level_rate')
        var previ_level_rate = button.data('previ_level_rate')
        var univer_accept = button.data('univer_accept')
        var accept_rate = button.data('accept_rate')
        var are_you_univer = button.data('are_you_univer')
        var ano_univer_special = button.data('ano_univer_special')
        var ano_univer_accept = button.data('ano_univer_accept')
        var language_name = button.data('language_name')
        var ano_accept_rate = button.data('ano_accept_rate')
        var ano_univer_name = button.data('ano_univer_name')
        var ano_schoo_year = button.data('ano_schoo_year')
        var ano_current_rate = button.data('ano_current_rate')
        var univer_premiums = button.data('univer_premiums')
        var univer_fees = button.data('univer_fees')
        var univer_fees_value = button.data('univer_fees_value')
        var modal = $(this)
        modal.find('.modal-body #student_id').val(student_id);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #univer_name').val(univer_name);
        modal.find('.modal-body #univer_location').val(univer_location);
        modal.find('.modal-body #univer_special').val(univer_special);
        modal.find('.modal-body #number_years').val(number_years);
        modal.find('.modal-body #language_name').val(language_name);
        modal.find('.modal-body #schoo_year').val(schoo_year);
        modal.find('.modal-body #current_rate').val(current_rate);
        modal.find('.modal-body #cumulative_rate').val(cumulative_rate);
        modal.find('.modal-body #Current_level').val(current_level);
        modal.find('.modal-body #curr_level_rate').val(curr_level_rate);
        modal.find('.modal-body #previ_level_rate').val(previ_level_rate);
        modal.find('.modal-body #univer_accept').val(univer_accept);
        modal.find('.modal-body #accept_rate').val(accept_rate);
        modal.find('.modal-body #are_you_univer').val(are_you_univer);
        modal.find('.modal-body #ano_univer_name').val(ano_univer_name);
        modal.find('.modal-body #ano_univer_special').val(ano_univer_special);
        modal.find('.modal-body #ano_univer_accept').val(ano_univer_accept);
        modal.find('.modal-body #ano_accept_rate').val(ano_accept_rate);
        modal.find('.modal-body #ano_schoo_year').val(ano_schoo_year);
        modal.find('.modal-body #ano_current_rate').val(ano_current_rate);
        modal.find('.modal-body #univer_premiums').val(univer_premiums);
        modal.find('.modal-body #univer_fees').val(univer_fees);
        modal.find('.modal-body #univer_fees_value').val(univer_fees_value);
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



