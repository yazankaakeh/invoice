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
قسم الأطفال للعائلة
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
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="main-content-label mg-b-5">
                                        قائمة معلومات الأطفال  .
                                    </div>
                                    <p class="mg-b-20">معلومات أطفال  للعائلات.</p>
                                    <div class="table-responsive">
                                        <table id="example" class="table key-buttons text-md-nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">رقم العائلة</th>
                                                    <th class="border-bottom-0">اسم العائلة</th>
                                                    <th class="border-bottom-0">رقم </th>
                                                    <th class="border-bottom-0">اسم الطفل</th>
                                                    <th class="border-bottom-0">عمره</th>
                                                    <th class="border-bottom-0">جنسه</th>
                                                    <th class="border-bottom-0">الحالة الأجتماعية</th>
                                                    <th class="border-bottom-0">الحالة الصحية</th>
                                                    <th class="border-bottom-0">المرحلة الدراسية</th>
                                                    <th class="border-bottom-0">الصف الدراسي</th>
                                                    <th class="border-bottom-0">مدينة أصدار الهوية</th>
                                                    <th class="border-bottom-0">هل يعيشون معكم</th>
                                                    <th class="border-bottom-0">تاريخ التعديل</th>
                                                    <th class="border-bottom-0">العمليات</th>
                                                    <th class="border-bottom-0">معلومات القرأن الكريم</th>
                                                    <th class="border-bottom-0">إضافة مدرسة</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($child as $x)
                                                    @if($x->family_id != null)
                                                <tr>
                                                    <td>{{$x->family_id}}</td>
                                                    <td>{{$x->family->family_Constraint}}</td>
                                                    <td>{{$x->id}}</td>
                                                    <td>{{$x->childre_name}}</td>
                                                    <td>{{$x->childre_age}}</td>
                                                    <td>{{$x->childre_gender}}</td>
                                                    <td>{{$x->status}}</td>
                                                    <td>{{$x->medical_stat}}</td>
                                                    <td>{{$x->childre_educa_leve}}</td>
                                                    <td>{{$x->childre_class_number}}</td>
                                                    <td>{{$x->childre_id_extr}}</td>
                                                    <td>{{$x->childre_live_with}}</td>
                                                    <td>{{$x->updated_at}}</td>
                                                    <td>

                                                    @can(' تعديل قسم الأطفال العائلات ')
                                                            {{-- Edite --}}
                                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                                data-id="{{$x->id}}" data-childre_name="{{$x->childre_name}}"
                                                                data-childre_age="{{$x->childre_age }}" data-childre_gender="{{$x->childre_gender}}"
                                                                data-childre_educa_leve="{{$x->childre_educa_leve}}"
                                                                data-childre_class_number="{{$x->childre_class_number }}" data-childre_id_extr="{{$x->childre_id_extr}}"
                                                                data-medical_stat="{{$x->medical_stat}}"
                                                                data-status="{{$x->status}}"
                                                                data-childre_live_with="{{$x->childre_live_with}}"
                                                                data-family_Constraint="{{$x->family->family_Constraint}}"   data-family_id="{{$x->family_id}}"
                                                                data-toggle="modal"
                                                                href="#exampleModal2" title="تعديل">
                                                                <i class="las la-pen"style="font-size: 15px;"></i>
                                                            </a>
                                                    @endcan

                                                    @can('حذف قسم الأطفال العائلات ')
                                                            {{-- Delete --}}
                                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                                data-id="{{ $x->id }}" data-family_constraint="{{$x->family->family_Constraint}}"  data-family_id="{{$x->family_id}}"
                                                                data-toggle="modal" href="#modaldemo9" title="حذف">
                                                                <i class="las la-trash"style="font-size: 15px;"></i>
                                                            </a>
                                                    @endcan
                                                    </td>
 {{-- Quran  --}}
                                                        @if($x->quran_statu == 1)
                                                        <td>
                                                        @can(' قسم القرأن الطلاب ')
                                                        <a class=" btn btn-sm btn-info" href="/Quran/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                        @endcan
                                                        </td>
                                                        @elseif($x->quran_statu == 0)
                                                        <td>
                                                        @can(' اضافة القرأن الطلاب ')
                                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                                data-student_id="{{$x->id}}"  data-description="" data-toggle="modal"
                                                            href="#exampleModal7" title="إضافة معلومات القرآن">
                                                            <i class="fas fa-book-open" style="font-size: 20px;"></i>
                                                        </a>
                                                    @endcan
                                                    </td>
                                                    @endif

                                                    <td>
                                                    @can('  مدرسة لطفل العائلات ')

                                                            @if($x->family_statu != 0)
                                                            <a class=" btn btn-sm btn-info" href="/school_family/show/school/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                             @else                                                           {{-- Add_School --}}
                                                    @endcan
                                                    @can(' إضافة مدرسة لطفل العائلات ')
                                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                                data-id="{{$x->id}}" data-childre_name="{{$x->childre_name}}"
                                                                data-toggle="modal"
                                                                href="#exampleModal" title="إضافة مدرسة">
                                                                <i class="fas fa-address-card" style="font-size: 20px;"></i>
                                                            </a>
                                                            @endif
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

                            @if (session()->has('Edit_School'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Edit_School') }}</strong>
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

                            @if (session()->has('Add_Quran'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_Quran') }}</strong>
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

                    {{-- Add_School --}}
                    <div class="modal" id="exampleModal">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">إضافة مدرسة</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                        type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="{{ Route('school.family.store') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                    <div class="modal-body">
                                    <div class="form-group">
                                    <input type="hidden" name="id" id="id"  readonly>
                                    <label for="exampleInputEmail">اسم المدرسة </label>
                                    <input class="form-control" name="School_name" id="School_name" type="text" placeholder=" أكتب أسم المدرسة  ">
                                    </div>

                                    <div class="form-group">
                                    <label for="exampleInputEmail">نوع المدرسة </label>
                                    <input class="form-control" name="School_type" id="School_type" type="text" placeholder=" أكتب نوع المدرسة  ">
                                    </div>

                                    <div class="form-group">
                                    <label for="exampleInputEmail">موقع المدرسة </label>
                                    <input class="form-control" name="School_location" id="School_location" type="text" placeholder=" أكتب موقع  المدرسة  ">
                                    </div>

                                    <div class="form-group">
                                    <label for="exampleInputEmail">تكاليف الدراسة</label>
                                    <input class="form-control" name="School_cost" id="School_cost" type="text" placeholder=" أكتب تكاليف المالية للمدرسة  ">
                                    </div>

                                    <div class="form-group">
                                    <label for="exampleInputEmail">نكاليف عامة</label>
                                    <input class="form-control" name="School_fees" id="School_fees" type="text"  placeholder=" أكتب تكاليف العامة للطفل في المدرسة  ">
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

                            {{-- add  Holy Quran --}}
                        <div class="modal fade" id="exampleModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">القرآن الكريم</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('Quran.student.store') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                <div class="modal-body">

                                <input type="hidden" name="student_id" id="student_id" readonly>
                                    <div class="form-group">
                                    <p class="mg-b-10">هل تحفظ القرآن</p>
                                    <select class="form-control select2" name="quran_memorize" id="quran_memorize">
                                        <option label="test">
											    </option>
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
                                <input type="text" class="form-control" id="quran_parts" name="quran_parts" placeholder="    أكتب عدد الأجزاء المحفوظة ">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">أسم الشيخ الذي درسك</label>
                                <input type="text" class="form-control" id="quran_teacher" name="quran_teacher" placeholder="   أكتب أسم الشيخ ">
                                </div>
                                <div class="form-group">
                                <p class="mg-b-10">هل لديك شهادة حفظ قرآن</p>
                                <select class="form-control select2" name="quran_have_certif" id="quran_have_certif">
                                    <option label="test">
                                           </option>
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
                                <input type="text" class="form-control" id="quran_Certif_essuer" name="quran_Certif_essuer" placeholder="   أكتب مصدر الشهادة ">
                                </div>
                                <div class="form-group">
                                <p class="mg-b-10">هل الشهادة معك؟</p>
                                <select class="form-control select2" name="quran_with_Certif" id="quran_with_Certif" >
                                    <option label="test">
                                          </option>
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
                            </div>
                         </div>
				        </div>
                        </div>


                    {{-- delete --}}
                    <div class="modal" id="modaldemo9">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">حدف عملية الدفع </h6><button aria-label="Close" class="close" data-dismiss="modal"
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
                                        <label for="exampleInputEmail">البيانات المتعلقة بهذا الطفل  </label>
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
                                    <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات الطفل </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                 <form action="{{ route('children.update.family') }}" method="post">
                                {{ method_field('patch') }}
                                {{ csrf_field() }}
                               <div class="modal-body">
                              <div class="modal-body">
                                <div class="form-group">
                                <input type="hidden" name="id" id="id" readonly>
                                <input type="hidden" name="family_id" id="family_id" readonly>
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
                                <div class="form-group">{{-- it must be select options  --}}
                                    <p class="mg-b-10">الحالة الأجتماعية</p>
                                    <select class="form-control select2" name="status" id="status" placeholder="  ">
                                        <option label="test">
											       </option>
                                        <option value="يتيم/ة" >
                                        يتيم/ة
                                    </option>
                                    <option value="غير يتيم" >
                                        غير يتيم
                                    </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <p class="mg-b-10">هل يوجد لديك اي أمراض</p>
                                    <select class="form-control select2" name="medical_stat" id="medical_stat">
                                        <option label="test">
											  </option>
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
        var family_id = button.data('family_id')
        var id = button.data('id')
        var childre_age = button.data('childre_age')
        var childre_name = button.data('childre_name')
        var childre_gender = button.data('childre_gender')
        var status = button.data('status')
        var childre_educa_leve = button.data('childre_educa_leve')
        var childre_class_number = button.data('childre_class_number')
        var childre_id_extr = button.data('childre_id_extr')
        var childre_live_with = button.data('childre_live_with')
        var medical_stat = button.data('medical_stat')
        var modal = $(this)
        modal.find('.modal-body #family_id').val(family_id);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #childre_age').val(childre_age);
        modal.find('.modal-body #childre_name').val(childre_name);
        modal.find('.modal-body #childre_gender').val(childre_gender);
        modal.find('.modal-body #status').val(status);
        modal.find('.modal-body #childre_educa_leve').val(childre_educa_leve);
        modal.find('.modal-body #childre_class_number').val(childre_class_number);
        modal.find('.modal-body #childre_id_extr').val(childre_id_extr);
        modal.find('.modal-body #childre_live_with').val(childre_live_with);
        modal.find('.modal-body #medical_stat').val(medical_stat);
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

{{--  Quran  --}}
<script>
    $('#exampleModal7').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var student_id = button.data('student_id')
        var modal = $(this)
        modal.find('.modal-body #student_id').val(student_id);})
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



