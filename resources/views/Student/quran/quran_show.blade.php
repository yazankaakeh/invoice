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
 قسم حفظ القران للطالب
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="my-auto mb-0 content-title">اقسام عامة</h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">/قسم القران</span>
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
                                        قائمة معلومات القرأن  .
                                    </div>
                                    <p class="mg-b-20">معلومات القرأن للطلاب .</p>
                                    <div class="table-responsive">
                                        <table id="example" class="table key-buttons text-md-nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">رقم الطالب</th>
                                                    <th class="border-bottom-0">اسم الطالب</th>
                                                    <th class="border-bottom-0">رقم</th>
                                                    <th class="border-bottom-0">هل تحفظ قرأن</th>
                                                    <th class="border-bottom-0"> عدد أجزاء</th>
                                                    <th class="border-bottom-0">اسم  مدرسك</th>
                                                    <th class="border-bottom-0">يوجد شهادة</th>
                                                    <th class="border-bottom-0">مصدر الشهادة</th>
                                                    <th class="border-bottom-0">هل هي معك</th>
                                                    <th class="border-bottom-0">تاريخ الإضافة</th>
                                                    <th class="border-bottom-0">عمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($qurans as $x)
                                                <tr>
                                                    <td>{{$x->student_id}}</td>
                                                    <td>{{$x->student->student_name}}</td>
                                                    <td>{{$x->id}}</td>
                                                    <td>{{$x->quran_memorize}}</td>
                                                    <td>{{$x->quran_parts}}</td>
                                                    <td>{{$x->quran_teacher}}</td>
                                                    <td>{{$x->quran_have_certif}}</td>
                                                    <td>{{$x->quran_Certif_essuer}}</td>
                                                    <td>{{$x->quran_with_Certif}}</td>
                                                    <td>{{$x->updated_at}}</td>
                                                    <td>
                                                            {{-- Edite --}}
                                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                                data-id="{{$x->id}}" data-quran_parts="{{$x->quran_parts}}"
                                                                data-name="{{$x->name }}" data-quran_memorize="{{$x->quran_memorize}}"
                                                                data-quran_teacher="{{$x->quran_teacher}}" data-quran_have_certif="{{$x->quran_have_certif}}"
                                                                data-quran_certif_essuer="{{$x->quran_Certif_essuer}}"
                                                                data-quran_with_certif="{{$x->quran_with_Certif}}" data-student_name="{{$x->student->student_name}}"
                                                                data-student_id="{{$x->student_id}}"
                                                                data-toggle="modal"
                                                                href="#exampleModal2" title="تعديل">
                                                                <i class="las la-pen"></i>
                                                            </a>
                                                            {{-- Delete --}}
                                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                                data-id="{{ $x->id }}"  data-name="{{$x->student->student_name}}" data-student_id="{{$x->student_id}}"
                                                                data-toggle="modal" href="#modaldemo9" title="حذف">
                                                                <i class="las la-trash"> </i>
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
                                    <h6 class="modal-title">حذف مععلومات القرأن</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                        type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="{{ Route('Quran.destroy') }}" method="post">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                        <div class="form-group">
                                        <input type="hidden" name="student_id" id="student_id" readonly>
                                        <input type="hidden" name="id" id="id"  readonly>
                                        <label for="exampleInputEmail"> هل أنت متأكد من حذف معلومات هذه للطالب ؟</label>
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
                                    <h5 class="modal-title" id="exampleModalLabel">تعديل معلومات القرأن</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                 <form action="{{ route('Quran.update') }}" method="post">
                                {{ method_field('patch') }}
                                {{ csrf_field() }}
                                <div class="modal-body">
                                <input type="hidden" name="student_id" id="student_id" readonly>
                                <input type="hidden" name="id" id="id" readonly>
                                    <div class="form-group">
                                    <p class="mg-b-10">هل تحفظ القرآن</p>
                                    <select class="form-control select2" name="quran_memorize" id="quran_memorize">
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
                                <input type="text" class="form-control" id="quran_parts" name="quran_parts" placeholder="    أكنب عدد الأجزاءالمحفوظة ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">أسم الشيخ الذي درسك</label>
                                <input type="text" class="form-control" id="quran_teacher" name="quran_teacher" placeholder="   أكنب أسم الشيخ ">
                                </div>
                                <div class="form-group">
                                <p class="mg-b-10">هل لديك شهادة حفظ قرآن</p>
                                <select class="form-control select2" name="quran_have_certif" id="quran_have_certif">
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
                                <input type="text" class="form-control" id="quran_Certif_essuer" name="quran_Certif_essuer" placeholder="   أكنب مصدر الشهادة ">
                                </div>
                                <div class="form-group">
                                <p class="mg-b-10">هل الشهادة معك؟</p>
                                <select class="form-control select2" name="quran_with_Certif" id="quran_with_Certif" >
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
        var quran_memorize = button.data('quran_memorize')
        var quran_teacher = button.data('academicquran_teacherel')
        var quran_parts = button.data('quran_parts')
        var student_id = button.data('student_id')
        var quran_have_certif = button.data('quran_have_certif')
        var quran_certif_essuer = button.data('quran_certif_essuer')
        var quran_with_certif = button.data('quran_with_certif')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #quran_memorize').val(quran_memorize);
        modal.find('.modal-body #quran_teacher').val(quran_teacher);
        modal.find('.modal-body #student_id').val(student_id);
        modal.find('.modal-body #quran_parts').val(quran_parts);
        modal.find('.modal-body #quran_have_certif').val(quran_have_certif);
        modal.find('.modal-body #quran_certif_essuer').val(quran_certif_essuer);
        modal.find('.modal-body #quran_with_certif').val(quran_with_certif);
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



