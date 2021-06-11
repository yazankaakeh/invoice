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
قسم معلومات السكن للعائلة
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="my-auto mb-0 content-title">اقسام عامة</h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">/معلومات العنوان</span>
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
                                        قائمة معلومات السكن  .
                                    </div>
                                    <p class="mg-b-20">معلومات السكن للعائلات .</p>
                                    <div class="table-responsive">
                                        <table id="example" class="table key-buttons text-md-nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">رقم العائلة</th>
                                                    <th class="border-bottom-0">اسم العائلة</th>
                                                    <th class="border-bottom-0">رقم </th>
                                                    <th class="border-bottom-0">اسم المحافظة</th>
                                                    <th class="border-bottom-0">الحي</th>
                                                    <th class="border-bottom-0">الموقع كما في الفاتورة</th>
                                                    <th class="border-bottom-0">الموقع السابق</th>
                                                    <th class="border-bottom-0">تاريخ التعديل</th>
                                                    <th class="border-bottom-0">العمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($address as $x)
                                                @if($x->family_id != null)
                                                <tr>
                                                    <td>{{$x->family_id}}</td>
                                                    <td>{{$x->family->family_Constraint}}</td>
                                                    <td>{{$x->id}}</td>
                                                    <td>{{$x->address_country}}</td>
                                                    <td>{{$x->address_city}}</td>
                                                    <td>{{$x->address_like_bill}}</td>
                                                    <td>{{$x->address_last}}</td>
                                                    <td>{{$x->updated_at}}</td>
                                                    <td>
                                                    @can(' تعديل قسم السكن العائلات ')
                                                            {{-- Edite --}}
                                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                                data-id="{{$x->id}}" data-address_last="{{$x->address_last}}"
                                                                data-address_like_bill="{{$x->address_like_bill }}" data-address_city="{{$x->address_city}}"
                                                                data-address_country="{{$x->address_country}}"
                                                                data-family_constraint="{{$x->family->family_Constraint}}"   data-family_id="{{$x->family_id}}"
                                                                data-toggle="modal"
                                                                href="#exampleModal2" title="تعديل">
                                                                <i class="las la-pen"></i>
                                                            </a>
                                                    @endcan
                                                    @can('حذف قسم السكن العائلات ')
                                                            {{-- Delete --}}
                                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                                data-id="{{ $x->id }}" data-family_constraint="{{$x->family->family_Constraint}}"  data-family_id="{{$x->family_id}}"
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
                                    <h6 class="modal-title">حذف بيانات سكن عائلة</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                        type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="{{ Route('address.destroy') }}" method="post">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                        <div class="form-group">
                                        <input type="hidden" name="family_id" id="family_id" readonly>
                                        <input type="hidden" name="id" id="id"  readonly>
                                        <label for="exampleInputEmail"> اسم صاحب القيد </label>
                                        <input class="form-control" name="family_Constraint" id="family_Constraint" type="text" readonly>
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
                                    <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات سكن العائلة</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                 <form action="{{ route('address.update') }}" method="post">
                                {{ method_field('patch') }}
                                {{ csrf_field() }}
                               <div class="modal-body">
                                <div class="form-group">
                                <input type="hidden" name="family_id" id="family_id"  readonly>
                                <input type="hidden" name="id" id="id"  readonly>
                                <label for="exampleInputEmail">اسم المحافظة</label>
                                <input type="text" class="form-control" id="address_country" name="address_country" placeholder=" أكتب اسم الزوجة ">
                                </div>

                                <div class="form-group">
                                <label for="exampleInputEmail">اسم الحي</label>
                                <input type="text" class="form-control" id="address_city" name="address_city" placeholder=" أكتب اسم الزوجة ">
                                </div>

                                 <div class="form-group">
                                <label for="exampleInputEmail">العنوان كما في الفاتورة</label>
                                <input type="text" class="form-control" id="address_like_bill" name="address_like_bill" placeholder=" أكتب أسم المحافظة ">
                                </div>

                                 <div class="form-group">
                                <label for="exampleInputEmail">العنوان السابق</label>
                                <input type="text" class="form-control" id="address_last" name="address_last" placeholder=" أكتب أسم المحافظة ">
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
        var address_city = button.data('address_city')
        var address_country = button.data('address_country')
        var address_like_bill = button.data('address_like_bill')
        var address_last = button.data('address_last')
        var modal = $(this)
        modal.find('.modal-body #family_id').val(family_id);
        modal.find('.modal-body #id').val(id);

        modal.find('.modal-body #address_city').val(address_city);
        modal.find('.modal-body #address_country').val(address_country);
        modal.find('.modal-body #address_like_bill').val(address_like_bill);
        modal.find('.modal-body #address_last').val(address_last);
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



