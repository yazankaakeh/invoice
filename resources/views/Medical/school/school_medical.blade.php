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
قسم الأطفال
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="my-auto mb-0 content-title">اقسام عامة</h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">/قسم الأطفال</span>
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
                                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table key-buttons text-md-nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">رقم المريض</th>
                                                    <th class="border-bottom-0">اسم المريض</th>
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
                                                    @if($x->medical_id != null)
                                                <tr>
                                                    <td>{{$x->medical_id}}</td>
                                                    <td>{{$x->medical->medical_name}}</td>
                                                    <td>{{$x->id}}</td>
                                                    <td>{{$x->School_name}}</td>
                                                    <td>{{$x->School_type}}</td>
                                                    <td>{{$x->School_location}}</td>
                                                    <td>{{$x->School_cost}}</td>
                                                    <td>{{$x->School_fees}}</td>
                                                    <td>{{$x->updated_at}}</td>
                                                    <td>
                                                            {{-- Edite --}}
                                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                                data-id="{{$x->id}}" data-School_location="{{$x->School_location}}"
                                                                data-School_type="{{$x->School_type }}" data-School_cost="{{$x->School_cost}}"
                                                                data-School_name="{{$x->School_name}}"  data-School_fees="{{$x->School_fees }}"
                                                                data-toggle="modal"
                                                                href="#exampleModal2" title="تعديل">
                                                                <i class="las la-pen"></i>
                                                            </a>
                                                            {{-- Delete --}}
                                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                                data-id="{{ $x->id }}"
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

                            @if (session()->has('Add_School'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_School') }}</strong>
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
                                <form action="{{ Route('children.delete.family') }}" method="post">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                        <div class="form-group">
                                        <input type="hidden" name="family_id" id="family_id" readonly>
                                        <input type="hidden" name="id" id="id"  readonly>
                                        <label for="exampleInputEmail">البيانات المتعلقة بهذا الطالب </label>
                                        <input class="form-control" name="family_constraint" id="family_constraint" type="text" readonly>
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
                                 <form action="{{ route('school.update.medical') }}" method="post">
                                {{ method_field('patch') }}
                                {{ csrf_field() }}
                                        <div class="modal-body">
                                        <div class="form-group">
                                        <input type="hidden" name="id" id="id"  readonly>
                                        <label for="exampleInputEmail">اسم المدرسة </label>
                                        <input class="form-control" name="School_name" id="School_name" type="text" readonly>
                                        </div>

                                        <div class="form-group">
                                        <label for="exampleInputEmail">نوع المدرسة </label>
                                        <input class="form-control" name="School_type" id="School_type" type="text" readonly>
                                        </div>

                                        <div class="form-group">
                                        <label for="exampleInputEmail">موقع المدرسة </label>
                                        <input class="form-control" name="School_location" id="School_location" type="text" readonly>
                                        </div>

                                        <div class="form-group">
                                        <label for="exampleInputEmail">تكاليف الدراسة</label>
                                        <input class="form-control" name="School_cost" id="School_cost" type="text" readonly>
                                        </div>

                                        <div class="form-group">
                                        <label for="exampleInputEmail">نكاليف عامة</label>
                                        <input class="form-control" name="School_fees" id="School_fees" type="text" readonly>
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
        var family_id = button.data('family_id')
        var id = button.data('id')
        var School_name = button.data('School_name')
        var School_type = button.data('School_type')
        var School_location = button.data('School_location')
        var School_cost = button.data('School_cost')
        var School_fees = button.data('School_fees')
        var modal = $(this)
        modal.find('.modal-body #family_id').val(family_id);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #School_name').val(School_name);
        modal.find('.modal-body #School_type').val(School_type);
        modal.find('.modal-body #School_location').val(School_location);
        modal.find('.modal-body #School_cost').val(School_cost);
        modal.find('.modal-body #School_fees').val(School_fees);
    })
</script>

{{-- Delete --}}
<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var family_id = button.data('family_id')
        var family_constraint = button.data('family_constraint')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #family_id').val(family_id);
        modal.find('.modal-body #family_constraint').val(family_constraint);
    })
</script>

@endsection



