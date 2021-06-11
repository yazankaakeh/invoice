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
قسم الحالة الصحية للطبي
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="my-auto mb-0 content-title">اقسام عامة</h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">/قسم الحالة الصحية</span>
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
                                        قائمة معلومات الحالة الصحية   .
                                    </div>
                                    <p class="mg-b-20">معلومات  الحالة الصحية للطبي .</p>
                                    <div class="table-responsive">
                                        <table id="example" class="table key-buttons text-md-nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">رقم المريض</th>
                                                    <th class="border-bottom-0">اسم المريض</th>
                                                    <th class="border-bottom-0">رقم</th>
                                                    <th class="border-bottom-0"> نوع المرض</th>
                                                    <th class="border-bottom-0"> اسم المرض</th>
                                                    <th class="border-bottom-0"> اسم الدكتور</th>
                                                    <th class="border-bottom-0"> تكلفة العلاج</th>
                                                    <th class="border-bottom-0"> نوع العلاج</th>
                                                    <th class="border-bottom-0"> مدة العلاج</th>
                                                    <th class="border-bottom-0"> تاريخ البدء</th>
                                                    <th class="border-bottom-0"> تاريخ الانتهاء </th>
                                                    <th class="border-bottom-0"> طبيب آخر </th>
                                                    <th class="border-bottom-0">تاريخ الإضافة</th>
                                                    <th class="border-bottom-0">عمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($med as $x)
                                                @if($x->medical_id != null)
                                                <tr>
                                                    <td>{{$x->medical_id}}</td>
                                                    <td>{{$x->medical->medical_name}}</td>
                                                    <td>{{$x->id}}</td>
                                                    <td>{{$x->disease_type}}</td>
                                                    <td>{{$x->disease_name}}</td>
                                                    <td>{{$x->dr_name}}</td>
                                                    <td>{{$x->treat_cost}}</td>
                                                    <td>{{$x->treat_type}}</td>
                                                    <td>{{$x->treat_Duratio}}</td>
                                                    <td>{{$x->date_accept}}</td>
                                                    <td>{{$x->date_end}}</td>
                                                    <td>{{$x->Trans_to_doctor}}</td>
                                                    <td>{{$x->updated_at}}</td>
                                                    <td>
                                                    @can(' تعديل قسم الحالة الصحية الطبي ')
                                                            {{-- Edite --}}
                                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                                data-id="{{$x->id}}" data-disease_type="{{$x->disease_type}}"
                                                                data-treat_duratio="{{$x->treat_Duratio }}" data-disease_name="{{$x->disease_name}}"
                                                                data-treat_type="{{$x->treat_type}}" data-dr_name="{{$x->dr_name}}"
                                                                data-trans_to_doctor="{{$x->Trans_to_doctor}}" data-medical_name="{{$x->medical->medical_name}}"
                                                                data-date_accept="{{$x->date_accept}}" data-date_end="{{$x->date_end}}"
                                                                data-treat_cost="{{$x->treat_cost}}"
                                                                data-medical_id="{{$x->medical_id}}"
                                                                data-toggle="modal"
                                                                href="#exampleModal2" title="تعديل">
                                                                <i class="las la-pen"></i>
                                                            </a>
                                                    @endcan
                                                    @can('حذف قسم الحالة الصحية الطبي ')
                                                            {{-- Delete --}}
                                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                                data-id="{{ $x->id }}"  data-name="{{$x->medical->medical_name}}" data-medical_id="{{$x->medical_id}}"
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
                                    <h6 class="modal-title">حذف المعلومات الحالة الصحية </h6><button aria-label="Close" class="close" data-dismiss="modal"
                                        type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="{{ Route('Medical_Statu.destroy.medical') }}" method="post">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                        <div class="form-group">
                                        <input type="hidden" name="medical_id" id="medical_id" readonly>
                                        <input type="hidden" name="id" id="id"  readonly>
                                        <label for="exampleInputEmail">الاسم</label>
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
                                    <h5 class="modal-title" id="exampleModalLabel">تعديل الحالة الصحية </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                 <form action="{{ route('Medical_Statu.update.medical') }}" method="post">
                                {{ method_field('patch') }}
                                {{ csrf_field() }}
                              <div class="modal-body">
                                <div class="form-group">
                                <input type="hidden" name="id" id="id"  readonly>
                                <input type="hidden" name="medical_id" id="medical_id" readonly>
                                </div>
                                 <div class="form-group">{{-- it must be select options  --}}
                                    <p class="mg-b-10">هل يوجد لديك اي أمراض</p>
                                    <select class="form-control select2" name="disease_type" id="disease_type">
                                    <option value="لايوجد" >
                                        لايوجد
                                    </option>
                                    <option value="اصابة حرب" >
                                        اصابة حرب
                                    </option>
                                    <option value="وباء" >
                                        وباء
                                    </option>
                                    <option value="مرض مزمن" >
                                        مرض مزمن
                                    </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">اسم المرض</label>
                                <input type="text" class="form-control" id="disease_name" name="disease_name" placeholder=" أكتب أسم المرض">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">اسم الدكتور</label>
                                <input type="text" class="form-control" id="dr_name" name="dr_name" placeholder=" أكتب أسم الطبيب">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">تكلفة العلاج</label>
                                <input type="text" class="form-control" id="treat_cost" name="treat_cost" placeholder="أكتب تكلفة العلاج ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">نوع العلاج</label>
                                <input type="text" class="form-control" id="treat_type" name="treat_type" placeholder=" أكتب نوع العلاج ">
                                </div>
                               <div class="form-group">
                                <label for="exampleInputEmail">مدة العلاج</label>
                                <input type="text" class="form-control" id="treat_Duratio" name="treat_Duratio" placeholder=" أكتب مدة العلاج">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">تاريخ بدء العلاج</label>
                                <input type="date" class="form-control" id="date_accept" name="date_accept" placeholder=" أكتب تاريخ بدء العلاج">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">تاريخ الانتهاء من العلاج</label>
                                <input type="date" class="form-control" id="date_end" name="date_end" placeholder=" أكتب تاريخ الأنتهاء العلاج">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">هل تم تحويلك لطبيب آخر؟ مع ذكر الأسم إن وجد</label>
                                <input type="text" class="form-control" id="Trans_to_doctor" name="Trans_to_doctor" placeholder=" أذكر أسم الطبيب ان وجد">
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
        var disease_name = button.data('disease_name')
        var disease_type = button.data('disease_type')
        var treat_duratio = button.data('treat_duratio')
        var medical_id = button.data('medical_id')
        var treat_type = button.data('treat_type')
        var treat_cost = button.data('treat_cost')
        var dr_name = button.data('dr_name')
        var trans_to_doctor = button.data('trans_to_doctor')
        var date_end = button.data('date_end')
        var date_accept = button.data('date_accept')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #disease_name').val(disease_name);
        modal.find('.modal-body #disease_type').val(disease_type);
        modal.find('.modal-body #medical_id').val(medical_id);
        modal.find('.modal-body #treat_duratio').val(treat_duratio);
        modal.find('.modal-body #treat_type').val(treat_type);
        modal.find('.modal-body #treat_cost').val(treat_cost);
        modal.find('.modal-body #dr_name').val(dr_name);
        modal.find('.modal-body #trans_to_doctor').val(trans_to_doctor);
        modal.find('.modal-body #date_end').val(date_end);
        modal.find('.modal-body #date_accept').val(date_accept);
    })
</script>

<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var medical_id = button.data('medical_id')
        var name = button.data('name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #medical_id').val(medical_id);
        modal.find('.modal-body #name').val(name);
    })
</script>
@endsection



