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
قسم مدفوعات الطبي  بالتركي
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
     <div class="my-auto">
    <div class="d-flex">
<h4 class="my-auto mb-0 content-title"> قسم الطبي </h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">/ قسم مدفوعات الطبي بالتركي </span>
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
                                        قائمة  مدفوعات الطبي بالتركي  .
                                    </div>
                                    <p class="mg-b-20">معلومات  مدفوعات الطبي بالتركي.</p>
                                    <div class="table-responsive">
                                        <table id="example" class="table key-buttons text-md-nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">Id</th>
                                                    <th class="border-bottom-0">المبلغ المدفوع بالتركي</th>
                                                    <th class="border-bottom-0">رقم المريض</th>
                                                    <th class="border-bottom-0">اسم المريض</th>
                                                    <th class="border-bottom-0">ملاحظات</th>
                                                    <th class="border-bottom-0">تاريخ الدفع</th>
                                                    <th class="border-bottom-0">عمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($payments as $x)
                                                @if($x->medical_id != null)
                                                <tr>
                                                    <td>{{$x->id}}</td>
                                                    <td>{{$x->medical_value}}</td>
                                                    <td>{{$x->medical_id}}</td>
                                                    <td>{{$x->medical->medical_name}}</td>
                                                    <td>{{$x->Note}}</td>
                                                    <td>{{$x->updated_at}}</td>
                                                    <td>
                                                    @can(' تعديل دفعة بالتركي الطبي ')
                                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                                data-id="{{$x->id}}"
                                                                data-medical_value="{{$x->medical_value }}" data-medical_id="{{$x->medical_id}}"
                                                                data-medical_name="{{$x->medical->medical_name}}" data-note="{{$x->Note }}"
                                                                 data-medical_value_euro="{{$x->medical_value_euro }}"
                                                                data-number_bim_medical="{{$x->number_bim_medical}}" data-value_bim_medical="{{$x->value_bim_medical }}"
                                                                data-toggle="modal"
                                                                href="#exampleModal2" title="تعديل">
                                                                <i class="las la-pen"></i>
                                                            </a>
                                                    @endcan
                                                    @can(' حذف دفعة بالتركي الطبي ')
                                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                                data-id="{{ $x->id }}"  data-medical_value="{{$x->medical_value }}"
                                                                data-Note="{{ $x->Note }}"  data-value_bim_medical="{{$x->value_bim_medical }}"
                                                                data-medical_id="{{$x->medical_id}}" data-medical_name="{{$x->medical->medical_name}}"
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
                    {{-- edit --}}
                    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">تعديل عملية الدفع</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ Route('tr.update.medical') }}" method="post" autocomplete="off">
                                        {{ method_field('patch') }}
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <input type="hidden" name="id" id="id" value="" readonly>
                                            <input type="hidden" name="medical_id" id="medical_id" value="" readonly>
                                            <label for="recipient-name" class="col-form-label">اسم المريض:</label>
                                            <input class="form-control" name="medical_name" id="medical_name" type="text" readonly>
                                        </div>
                                        <div class="modal-body">
                                        <label for="recipient-name" class="col-form-label">المبلغ بالدولار</label>
                                        <input class="form-control" name="medical_value_tr" id="medical_value" type="text" >
                                        <input class="form-control" name="medical_value_tr1" id="medical_value" type="hidden" >
                                        </div>

                                        <div class="modal-body">
                                            <label for="message-text" class="col-form-label">ملاحظات:</label>
                                            <textarea class="form-control" id="note" name="note"></textarea>
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

                    {{-- delete --}}
                    <div class="modal" id="modaldemo9">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">حذف عملية الدفع</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                        type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="{{ Route('tr.destroy.medical') }}" method="post">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}

                                    <div class="modal-body">
                                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                        <input type="hidden" name="medical_id" id="medical_id" value="" readonly>
                                        <input type="hidden" name="id" id="id" value="">
                                        <label for="recipient-name" class="col-form-label">اسم المريض:</label>
                                        <input class="form-control" name="medical_name" id="medical_name" type="text" readonly>
                                    </div>


                                        <div class="modal-body">
                                        <label for="recipient-name" class="col-form-label">المبلغ بالدولار</label>
                                        <input class="form-control" name="medical_value_tr" id="medical_value" type="text" readonly>
                                        </div>

                                        <div class="modal-body">
                                            <label for="message-text" class="col-form-label">ملاحظات:</label>
                                            <textarea class="form-control" id="note" name="note" readonly></textarea>
                                        </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                        <button type="submit" class="btn btn-danger">تاكيد</button>
                                    </div>

                                </form>
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
{{--  Edit  --}}
<script>
    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var medical_id = button.data('medical_id')
        var medical_value = button.data('medical_value')
        var medical_name = button.data('medical_name')
        var medical_value_euro = button.data('medical_value_euro')
        var medical_value = button.data('medical_value')
        var value_bim_medical = button.data('value_bim_medical')
        var number_bim_medical = button.data('number_bim_medical')
        var note = button.data('note')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #medical_id').val(medical_id);
        modal.find('.modal-body #medical_value').val(medical_value);
        modal.find('.modal-body #medical_name').val(medical_name);
        modal.find('.modal-body #note').val(note);
        modal.find('.modal-body #medical_value_euro').val(medical_value_euro);
        modal.find('.modal-body #medical_value').val(medical_value);
        modal.find('.modal-body #value_bim_medical').val(value_bim_medical);
        modal.find('.modal-body #number_bim_medical').val(number_bim_medical);
    })
</script>

<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var medical_name = button.data('medical_name')
        var number_bim_medical = button.data('number_bim_medical')
        var value_bim_medical = button.data('value_bim_medical')
        var medical_id = button.data('medical_id')
        var id = button.data('id')
        var medical_value_euro = button.data('medical_value_euro')
        var medical_value = button.data('medical_value')
        var medical_value = button.data('medical_value')
        var note = button.data('note')
        var modal = $(this)
        modal.find('.modal-body #number_bim_medical').val(number_bim_medical);
        modal.find('.modal-body #value_bim_medical').val(value_bim_medical);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #medical_value').val(medical_value);
        modal.find('.modal-body #medical_id').val(medical_id);
        modal.find('.modal-body #medical_value_euro').val(medical_value_euro);
        modal.find('.modal-body #medical_value').val(medical_value);
        modal.find('.modal-body #medical_name').val(medical_name);
        modal.find('.modal-body #note').val(note);
    })
</script>
@endsection



