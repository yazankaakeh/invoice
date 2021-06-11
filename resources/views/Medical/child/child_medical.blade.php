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
قسم الأطفال للمرضى
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="my-auto mb-0 content-title">اقسام عامة</h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">/معلومات الأطفال</span>
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
                                                    <th class="border-bottom-0">اسم الطفل</th>
                                                    <th class="border-bottom-0">عمره</th>
                                                    <th class="border-bottom-0">جنسه</th>
                                                    <th class="border-bottom-0">المرحلة الدراسية</th>
                                                    <th class="border-bottom-0">الصف الدراسي</th>
                                                    <th class="border-bottom-0">مدينة أصدار الهوية</th>
                                                    <th class="border-bottom-0">هل يعيشون معكم</th>
                                                    <th class="border-bottom-0">تاريخ التعديل</th>
                                                    <th class="border-bottom-0">العمليات</th>
                                                    <th class="border-bottom-0">إضافة مدرسة</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($child as $x)
                                                    @if($x->medical_id != null)
                                                <tr>
                                                    <td>{{$x->medical_id}}</td>
                                                    <td>{{$x->medical->medical_name}}</td>
                                                    <td>{{$x->id}}</td>
                                                    <td>{{$x->childre_name}}</td>
                                                    <td>{{$x->childre_age}}</td>
                                                    <td>{{$x->childre_gender}}</td>
                                                    <td>{{$x->childre_educa_leve}}</td>
                                                    <td>{{$x->childre_class_number}}</td>
                                                    <td>{{$x->childre_id_extr}}</td>
                                                    <td>{{$x->childre_live_with}}</td>
                                                    <td>{{$x->updated_at}}</td>
                                                    <td>
                                                            {{-- Edit --}}
                                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                                data-id="{{$x->id}}" data-childre_name="{{$x->childre_name}}"
                                                                data-childre_age="{{$x->childre_age }}" data-childre_gender="{{$x->childre_gender}}"
                                                                data-childre_educa_leve="{{$x->childre_educa_leve}}"
                                                                data-childre_class_number="{{$x->childre_class_number }}" data-childre_id_extr="{{$x->childre_id_extr}}"
                                                                data-childre_live_with="{{$x->childre_live_with}}"
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
                                                    <td>    
                                                            {{-- Add_School --}}
                                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                                data-id="{{$x->id}}" data-childre_name="{{$x->childre_name}}"
                                                                data-toggle="modal"
                                                                href="#exampleModal" title="إضافة مدرسة">
                                                                <i class="las la-pen"></i>
                                                            </a> 
                                                            @if($x->medical_statu != 0)
                                                            <td>
                                                            <a class=" btn btn-sm btn-info" href="/school/show/medical/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                            </td>
                                                            @endif
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
                                <form action="{{ Route('children.delete.medical') }}" method="post">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                        <div class="form-group">
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


                   {{-- Add_School --}}
                    <div class="modal" id="exampleModal">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">إضافة مدرسة</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                        type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="{{ Route('school.medical.store') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                    <div class="modal-body">
                                    <div class="form-group">
                                    <input type="hidden" name="id" id="id"  readonly>
                                    <label for="exampleInputEmail">اسم المدرسة </label>
                                    <input class="form-control" name="School_name" id="School_name" type="text">
                                    </div>
                                    
                                    <div class="form-group">
                                    <label for="exampleInputEmail">نوع المدرسة </label>
                                    <input class="form-control" name="School_type" id="School_type" type="text">
                                    </div>

                                    <div class="form-group">
                                    <label for="exampleInputEmail">موقع المدرسة </label>
                                    <input class="form-control" name="School_location" id="School_location" type="text">
                                    </div>
                                    
                                    <div class="form-group">
                                    <label for="exampleInputEmail">تكاليف الدراسة</label>
                                    <input class="form-control" name="School_cost" id="School_cost" type="text">
                                    </div>

                                    <div class="form-group">
                                    <label for="exampleInputEmail">نكاليف عامة</label>
                                    <input class="form-control" name="School_fees" id="School_fees" type="text">
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
                                 <form action="{{ route('children.update.medical') }}" method="post">
                                {{ method_field('patch') }}
                                {{ csrf_field() }}
                               <div class="modal-body">
                              <div class="modal-body">
                                <div class="form-group">
                                <input type="hidden" name="id" id="id" readonly>
                                <input type="hidden" name="medical_id" id="medical_id" readonly>
                                <label for="exampleInputEmail">اسم الطفل</label>
                                <input type="text" class="form-control" id="childre_name" name="childre_name" placeholder=" أكتب أسم الطفل ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">العمر</label>
                                <input type="number" class="form-control" id="childre_age" name="childre_age" placeholder=" أكتب  العمر بالرقم ">
                                </div>
                                <div class="form-group">{{-- it must be select options  --}}
                                    <p class="mg-b-10">الجنس</p>
                                    <select class="form-control select2" name="childre_gender" id="childre_gender" placeholder=" أكتب الجنس الطفل ">
                                    <option value="ذكر" >
                                        ذكر
                                    </option>
                                    <option value="انثى" >
                                        انثى
                                    </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">المرحلة الدراسية</label>
                                <input type="text" class="form-control" id="childre_educa_leve" name="childre_educa_leve" placeholder=" أكتب المرحلة الدراسية ">
                                </div>
                                 <div class="form-group">
                                <label for="exampleInputEmail"> رقم الصف الدراسي </label>
                                <input type="text" class="form-control" id="childre_class_number" name="childre_class_number" placeholder="  أكتب رقم الصف الدراسي ">
                                </div>
                                <div class="form-group">{{-- it must be select options  --}}
                                    <p class="mg-b-10">الهوية الشخصية من اي ولاية</p>
                                    <select class="form-control select2" name="childre_id_extr" id="childre_id_extr" placeholder=" أختر من اسم الولاية الصادرة منها الكملك ">
                                    <option value="لايوجد" >
                                        لايوجد
                                    </option>
                                    <option value="استطبول" >
                                        استطبول
                                    </option>
                                    <option value="بورصا" >
                                        بورصا
                                    </option>
                                    <option value="عتناب" >
                                        عتناب
                                    </option>
                                    <option value="اضنا" >
                                        اضنا
                                    </option>
                                    <option value="ملاطيا" >
                                        ملاطيا
                                    </option>
                                    <option value="انقرة" >
                                        انقرة
                                    </option>
                                    </select>
                                </div>
                                 <div class="form-group">{{-- it must be select options  --}}
                                    <p class="mg-b-10">هل يعيشون معكم</p>
                                    <select class="form-control select2" name="childre_live_with" id="childre_live_with" placeholder=" هل الأطفال يعيشون معكم ">
                                    <option value="لا" >
                                        لا
                                    </option>
                                    <option value="نعم" >
                                        نعم
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
        var medical_id = button.data('medical_id')
        var id = button.data('id')
        var childre_age = button.data('childre_age')
        var childre_name = button.data('childre_name')
        var childre_gender = button.data('childre_gender')
        var childre_educa_leve = button.data('childre_educa_leve')
        var childre_class_number = button.data('childre_class_number')
        var childre_id_extr = button.data('childre_id_extr')
        var childre_live_with = button.data('childre_live_with')
        var modal = $(this)
        modal.find('.modal-body #medical_id').val(medical_id);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #childre_age').val(childre_age);
        modal.find('.modal-body #childre_name').val(childre_name);
        modal.find('.modal-body #childre_gender').val(childre_gender);
        modal.find('.modal-body #childre_educa_leve').val(childre_educa_leve);
        modal.find('.modal-body #childre_class_number').val(childre_class_number);
        modal.find('.modal-body #childre_id_extr').val(childre_id_extr);
        modal.find('.modal-body #childre_live_with').val(childre_live_with);
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

{{--  Add_School  --}}
<script>
    $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var childre_name = button.data('childre_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #childre_name').val(childre_name);
    })
</script>
@endsection



