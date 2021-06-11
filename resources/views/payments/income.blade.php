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
{{--  @dd($medical)  --}}
@section('title')
قسم الدخل المالي
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="my-auto mb-0 content-title">الأقسام المالية</h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">/قسم الدخل</span>
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
                                        <div class="col-sm-3 col-md-4 col-xl-2">
                                            @can(' إضافة دفعة قسم الدخل المالي ')

                                            <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">اضافة دفعة مالية </a>
                                            @endcan
                                        </div>
                                     </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table key-buttons ">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">Id</th>
                                                    <th class="border-bottom-0">الدخل بالدولار</th>
                                                    <th class="border-bottom-0">الدخل بالدولار المتبقي</th>
                                                    <th class="border-bottom-0">الدخل بالتركي</th>
                                                    <th class="border-bottom-0">الدخل بالتركي المتبقي</th>
                                                    <th class="border-bottom-0">الدخل باليورو</th>
                                                    <th class="border-bottom-0">الدخل باليورو المتبقي</th>
                                                    <th class="border-bottom-0">كروت بيم</th>
                                                    <th class="border-bottom-0">كروت بيم المتبقية</th>
                                                    <th class="border-bottom-0">قيمة كرت البيم</th>
                                                    <th class="border-bottom-0">ملاحظات</th>
                                                    <th class="border-bottom-0">تاريخ الإضافة</th>
                                                    <th class="border-bottom-0">حذف دفعة الدخل</th>
                                                    <th class="border-bottom-0">تعديل دفعة الدخل</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($income as $x)
                                                <tr>
                                                    <td>{{$x->id}}</td>
                                                    <td>{{$x->value_usd_fixed}}</td>
                                                    <td>{{$x->value_usd}}</td>
                                                    <td>{{$x->value_tr_fixed}}</td>
                                                    <td>{{$x->value_tr}}</td>
                                                    <td>{{$x->value_euro_fixed}}</td>
                                                    <td>{{$x->value_euro}}</td>
                                                    <td>{{$x->number_bim_fixed}}</td>
                                                    <td>{{$x->number_bim}}</td>
                                                    <td>{{$x->value_bim}}</td>
                                                    <td>{{$x->note}}</td>
                                                    <td>{{$x->created_at}}</td>

                                                    <td>
                                                    @can(' حذف الدفعة قسم الدخل المالي ')

                                                    {{-- delete medical  --}}
                                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                            data-value_usd_fixed="{{$x->value_usd_fixed}}"
                                                            data-number_bim="{{$x->number_bim}}" data-value_bim="{{$x->value_bim}}"
                                                            data-value_tr_fixed="{{$x->value_tr_fixed}}" data-note="{{$x->note}}"
                                                            data-value_euro_fixed="{{$x->value_euro_fixed}}" data-id="{{$x->id}}"
                                                            data-number_bim="{{$x->number_bim_fixed}}" data-value_bim="{{$x->value_bim}}"
                                                            data-value_tr_fixed="{{$x->value_tr_fixed}}" data-note="{{$x->note}}"
                                                            data-value_euro_fixed="{{$x->value_euro_fixed}}" data-id="{{$x->id}}"
                                                            data-toggle="modal" href="#modaldemo9" title="حذف">
                                                            <i class="las la-trash"  style="font-size: 20px;"> </i>
                                                        </a>
                                                    </td>
                                                    @endcan

                                                    <td>

                                                    @can(' تعديل الدفعة قسم الدخل المالي ')
                                                    {{-- edit medical  --}}
                                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                            data-number_bim="{{$x->number_bim}}" data-value_bim="{{$x->value_bim}}"
                                                            data-value_usd_fixed="{{$x->value_usd_fixed}}"
                                                            data-value_tr_fixed="{{$x->value_tr_fixed}}" data-note="{{$x->note}}"
                                                            data-value_euro_fixed="{{$x->value_euro_fixed}}" data-id="{{$x->id}}"
                                                            data-number_bim="{{$x->number_bim_fixed}}" data-value_bim="{{$x->value_bim}}"
                                                            data-value_usd_fixed="{{$x->value_usd_fixed}}"

                                                            data-value_usd_fixed1="{{$x->value_usd}}"  data-number_bim1="{{$x->number_bim}}"
                                                            data-value_tr_fixed1="{{$x->value_tr_fixed}}" data-value_euro_fixed1="{{$x->value_euro_fixed}}"

                                                            data-value_tr_fixed="{{$x->value_tr_fixed}}" data-note="{{$x->note}}"
                                                            data-value_euro_fixed="{{$x->value_euro_fixed}}" data-id="{{$x->id}}"
                                                            data-description="" data-toggle="modal" href="#exampleModal2" title="تعديل">
                                                            <i class="las la-pen"  style="font-size: 20px;"></i>
                                                        </a>
                                                    @endcan
                                                    </td>

                                                @endforeach
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                        <div>
                            @if (session()->has('Add'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif



                            @if (session()->has('Edit'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Edit') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                             @if (session()->has('Add Money'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add Money') }}</strong>
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

                            @if (session()->has('warning'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('warning') }}</strong>
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

                        {{-- add --}}
                        <div class="modal" id="modaldemo8">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">اضافة الدفعة المالية </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="{{ route('income.store') }}" method="POST">
                                        {{ csrf_field() }}
                                    <div class="modal-body">

                                        <div class="form-group">
                                        <label for="exampleInputEmail">المبلغ المدخل بالدولار$</label>
                                        <input type="number" class="form-control" id="value_usd" name="value_usd" placeholder=" ">
                                        </div>

                                        <div class="form-group">
                                        <label for="exampleInputEmail"> المبلغ المدخل بالتركي TL</label>
                                        <input type="number" class="form-control" id="value_tr" name="value_tr" placeholder=" ">
                                        </div>


                                        <div class="form-group">
                                        <label for="exampleInputEmail"> المبلغ المدخل باليورو€</label>
                                        <input type="number" class="form-control" id="value_euro" name="value_euro" placeholder=" ">
                                        </div>

                                        <div class="form-group">
                                        <label for="exampleInputEmail"> كروت البيم</label>
                                        <input type="number" class="form-control" id="number_bim" name="number_bim" placeholder=" " >
                                        </div>

                                        <div class="form-group">
                                        <label for="exampleInputEmail"> قيمة كروت البيم</label>
                                        <input type="number" class="form-control" id="value_bim" name="value_bim" placeholder=" " >
                                        </div>

                                        <div class="form-group">
                                        <label for="exampleInputEmail">ملاحظات</label>
                                        <input type="text" class="form-control" id="note" name="note"  placeholder=" ">
                                        </div>
                                        </div>

                                    <div class="modal-footer">
                                        <button class="btn ripple btn-primary" type="submit">حفظ المعلومات</button>
                                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">اغلاق</button>
                                    </div>
                            </form>
                            </div>
                            </div>
                        </div>

                        {{-- delete --}}
                        <div class="modal" id="modaldemo9">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">حذف الدفعة المالية  لللدخل</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                            type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="{{ route('income.destroy') }}" method="post">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                      <div class="modal-body">
                                        <label for="exampleInputEmail">المبلغ المدخل بالدولار</label>
                                        <input type="text" class="form-control" id="value_usd_fixed" name="value_usd" placeholder=" " readonly>
                                        <input type="hidden" class="form-control" id="id" name="id" placeholder=" ">
                                        </div>

                                        <div class="modal-body">
                                        <label for="exampleInputEmail"> المبلغ المدخل بالتركي</label>
                                        <input type="number" class="form-control" id="value_tr_fixed" name="value_tr" placeholder=" " readonly>
                                        </div>


                                        <div class="modal-body">
                                        <label for="exampleInputEmail"> المبلغ المدخل باليورو</label>
                                        <input type="text" class="form-control" id="value_euro_fixed" name="value_euro" placeholder=" " readonly>
                                        </div>

                                        <div class="modal-body">
                                        <label for="exampleInputEmail"> كروت البيم</label>
                                        <input type="text" class="form-control" id="number_bim" name="number_bim" placeholder=" " readonly>
                                        </div>

                                        <div class="modal-body">
                                        <label for="exampleInputEmail"> قيمة كروت البيم</label>
                                        <input type="text" class="form-control" id="value_bim" name="value_bim" placeholder=" " readonly>
                                        </div>

                                        <div class="modal-body">
                                        <label for="exampleInputEmail">ملاحظات</label>
                                        <input type="text" class="form-control" id="note" name="note"  placeholder=" " readonly>
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
                                        <h5 class="modal-title" id="exampleModalLabel"> تعديل الدفعة المالية للدخل </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ route('income.update') }}" method="post" autocomplete="off">
                                        {{ method_field('patch') }}
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                        <label for="exampleInputEmail">المبلغ المدخل بالدولار $</label>
                                        <input type="text" class="form-control" id="value_euro_fixed" name="value_usd" placeholder=" ">
                                        <label for="exampleInputEmail">المبلغ المدخل بالدولار</label>
                                        <input type="text" class="form-control" id="value_usd_fixed" name="value_usd" placeholder=" ">
                                        <input type="hidden" class="form-control" id="id" name="id" placeholder=" ">
                                        </div>

                                        <div class="modal-body">
                                        <label for="exampleInputEmail"> المبلغ المدخل بالتركي TL</label>
                                        <input type="number" class="form-control" id="value_tr_fixed" name="value_tr" placeholder=" ">
                                        </div>

                                        <div class="modal-body">
                                        <label for="exampleInputEmail"> المبلغ المدخل باليورو€</label>
                                        <input type="text" class="form-control" id="value_euro_fixed" name="value_euro" placeholder=" ">
                                        </div>

                                        <div class="modal-body">
                                        <label for="exampleInputEmail"> كروت البيم</label>
                                        <input type="text" class="form-control" id="number_bim" name="number_bim" placeholder=" " >
                                        </div>

                                        <div class="modal-body">
                                        <label for="exampleInputEmail"> قيمة كروت البيم</label>
                                        <input type="text" class="form-control" id="value_bim" name="value_bim" placeholder=" " >
                                        </div>

                                        <div class="modal-body">
                                        <label for="exampleInputEmail">ملاحظات</label>
                                        <input type="text" class="form-control" id="note" name="note"  placeholder=" ">
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
{{--  edit student Jquery  --}}
<script>
    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var value_tr_fixed = button.data('value_tr_fixed')
        var value_tr_fixed1 = button.data('value_tr_fixed1')
        var value_usd_fixed = button.data('value_usd_fixed')
        var value_usd_fixed1 = button.data('value_usd_fixed1')
        var value_euro_fixed = button.data('value_euro_fixed')
        var value_euro_fixed1 = button.data('value_euro_fixed1')
        var value_bim = button.data('value_bim')
        var number_bim = button.data('number_bim')
        var number_bim1 = button.data('number_bim1')
        var note = button.data('note')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #value_usd_fixed').val(value_usd_fixed);
        modal.find('.modal-body #value_euro_fixed1').val(value_euro_fixed1);
        modal.find('.modal-body #value_tr_fixed1').val(value_tr_fixed1);
        modal.find('.modal-body #value_tr_fixed').val(value_tr_fixed);
        modal.find('.modal-body #value_euro_fixed').val(value_euro_fixed);
        modal.find('.modal-body #value_bim').val(value_bim);
        modal.find('.modal-body #value_usd_fixed1').val(value_usd_fixed1);
        modal.find('.modal-body #number_bim1').val(number_bim1);
        modal.find('.modal-body #number_bim').val(number_bim);
        modal.find('.modal-body #note').val(note);

    })
</script>

{{--  delete Student Jquery  --}}
<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var value_usd_fixed = button.data('value_usd_fixed')
        var value_tr_fixed = button.data('value_tr_fixed')
        var note = button.data('note')
        var value_euro_fixed = button.data('value_euro_fixed')
        var value_bim = button.data('value_bim')
        var number_bim = button.data('number_bim')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #value_usd_fixed').val(value_usd_fixed);
        modal.find('.modal-body #value_tr_fixed').val(value_tr_fixed);
        modal.find('.modal-body #value_bim').val(value_bim);
        modal.find('.modal-body #note').val(note);
        modal.find('.modal-body #number_bim').val(number_bim);
        modal.find('.modal-body #value_euro_fixed').val(value_euro_fixed);
    })
</script>
@endsection



