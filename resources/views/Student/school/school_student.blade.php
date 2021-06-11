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
قسم المدرسة لأطفال الطلاب
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="my-auto mb-0 content-title">اقسام عامة</h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">/ قسم مدرسة الطفل للطالب</span>
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
                                        قائمة معلومات المدرسة  .
                                    </div>
                                    <p class="mg-b-20">معلومات المدرسة الطفل للطالب .</p>
                                    <div class="table-responsive">
                                        <table id="example" class="table key-buttons text-md-nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">رقم الطالب</th>
                                                    <th class="border-bottom-0">اسم الطالب</th>
                                                    <th class="border-bottom-0">رقم </th>
                                                    <th class="border-bottom-0">اسم المدرسة</th>
                                                    <th class="border-bottom-0">نوع المدرسة</th>
                                                    <th class="border-bottom-0">موقع المدرسة</th>
                                                    <th class="border-bottom-0">نكلفة المدرسة</th>
                                                    <th class="border-bottom-0">تكاليف عامة</th>
                                                    <th class="border-bottom-0">تاريخ التعديل</th>
                                                    <th class="border-bottom-0">العمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($school as $x)
                                                <tr>
                                                    <td>{{$x->children_id}}</td>
                                                    <td>{{$x->children->childre_name}}</td>
                                                    <td>{{$x->id}}</td>
                                                    <td>{{$x->School_name}}</td>
                                                    <td>{{$x->School_type}}</td>
                                                    <td>{{$x->School_location}}</td>
                                                    <td>{{$x->School_cost}}</td>
                                                    <td>{{$x->School_fees}}</td>
                                                    <td>{{$x->updated_at}}</td>
                                                    <td>
                                                            {{-- Edite --}}
                                                            @can(' تعديل مدرسة لطفل الطلاب ')
                                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                                data-id="{{$x->id}}" data-school_location="{{$x->School_location}}"
                                                                data-children_id="{{$x->children_id}}"
                                                                data-school_type="{{$x->School_type }}" data-school_cost="{{$x->School_cost}}"
                                                                data-school_name="{{$x->School_name}}"  data-school_fees="{{$x->School_fees }}"
                                                                data-toggle="modal"
                                                                href="#exampleModal20" title="تعديل">
                                                                <i class="las la-pen"></i>
                                                            </a>
                                                            @endcan

                                                            @can(' حذف مدرسة لطفل الطلاب ')
                                                            {{-- Delete --}}
                                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                                data-id="{{ $x->id }}"  data-children_id="{{$x->children_id}}"
                                                                data-childre_name="{{$x->children->childre_name}}"

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

                            @if (session()->has('Add_School'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_School') }}</strong>
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
                                    <h6 class="modal-title">حذف المدرسة </h6><button aria-label="Close" class="close" data-dismiss="modal"
                                        type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="{{ Route('school.destroy.student') }}" method="post">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                        <div class="form-group">
                                        <input type="hidden" name="children_id" id="children_id" readonly>
                                        <input type="hidden" name="id" id="id"  readonly>
                                        <label for="exampleInputEmail">هل أنت متأكد من حذف بيانات المدرسة للطفل </label>
                                        <input class="form-control" name="childre_name" id="childre_name" type="text" readonly>
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
                    <div class="modal fade" id="exampleModal20" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">تعديل معلومات المدرسة </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                 <form action="{{ route('school.update.student') }}" method="post">
                                {{ method_field('patch') }}
                                {{ csrf_field() }}
                               <div class="modal-body">
                                    <div class="form-group">
                                    <input type="hidden" name="children_id" id="children_id"  readonly>
                                    <input type="hidden" name="id" id="id"  readonly>
                                    <label for="exampleInputEmail">اسم المدرسة </label>
                                    <input class="form-control" name="School_name" id="school_name" type="text" placeholder="أكتب أسم المدرسة ">
                                    </div>

                                    <div class="form-group">
                                    <label for="exampleInputEmail">نوع المدرسة </label>
                                    <input class="form-control" name="School_type" id="school_type" type="text" placeholder="أكتب نوع المدرسة ">
                                    </div>

                                    <div class="form-group">
                                    <label for="exampleInputEmail">موقع المدرسة </label>
                                    <input class="form-control" name="School_location" id="school_location" type="text" placeholder="أكتب موقع المدرسة ">
                                    </div>

                                    <div class="form-group">
                                    <label for="exampleInputEmail">تكاليف مصروف الطفل</label>
                                    <input class="form-control" name="School_cost" id="school_cost" type="text" placeholder="أكتب قيمة تكاليف مصروف الطفل ">
                                    </div>

                                    <div class="form-group">
                                    <label for="exampleInputEmail">نكاليف المدرسة أو الأقصاط</label>
                                    <input class="form-control" name="School_fees" id="school_fees" type="text" placeholder="أكتب قيمة تكاليف المدرسة ">
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

    $('#exampleModal20').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var children_id = button.data('children_id')
        var id = button.data('id')
        var school_name = button.data('school_name')
        var school_type = button.data('school_type')
        var school_location = button.data('school_location')
        var school_cost = button.data('school_cost')
        var school_fees = button.data('school_fees')
        var modal = $(this)
        modal.find('.modal-body #children_id').val(children_id);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #school_name').val(school_name);
        modal.find('.modal-body #school_type').val(school_type);
        modal.find('.modal-body #school_location').val(school_location);
        modal.find('.modal-body #school_cost').val(school_cost);
        modal.find('.modal-body #school_fees').val(school_fees);
    })
</script>

{{-- Delete --}}
<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var children_id = button.data('children_id')
        var id = button.data('id')
        var childre_name = button.data('childre_name')
        var modal = $(this)
        modal.find('.modal-body #children_id').val(children_id);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #childre_name').val(childre_name);
    })
</script>


@endsection



