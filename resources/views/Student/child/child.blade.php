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
قسم الأطفال للطالب
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="my-auto mb-0 content-title">اقسام عامة</h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">/ قسم الأطفال</span>
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
                                    <p class="mg-b-20">معلومات أطفال الطلاب المتزوجين.</p>
                                    <div class="table-responsive">
                                        <table id="example" class="table key-buttons text-md-nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">رقم الطالب</th>
                                                    <th class="border-bottom-0">اسم الطالب</th>
                                                    <th class="border-bottom-0">رقم </th>
                                                    <th class="border-bottom-0">اسم الطفل</th>
                                                    <th class="border-bottom-0">عمره</th>
                                                    <th class="border-bottom-0">الجنس</th>
                                                    <th class="border-bottom-0">المرحلة الدراسية</th>
                                                    <th class="border-bottom-0">الصف الدراسي</th>
                                                    <th class="border-bottom-0">نوع الهوية الشخصية</th>
                                                    <th class="border-bottom-0">مدينة أصدار الهوية</th>
                                                     <th class="border-bottom-0">هل يعيشون معكم</th>
                                                    <th class="border-bottom-0">تاريخ التعديل</th>
                                                    <th class="border-bottom-0">العمليات</th>
                                                    <th class="border-bottom-0">إضافة مدرسة</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($child as $x)
                                                @if($x->student_id != null)
                                                <tr>
                                                    <td>{{$x->student_id}}</td>
                                                    <td>{{$x->student->student_name}}</td>
                                                    <td>{{$x->id}}</td>
                                                    <td>{{$x->childre_name}}</td>
                                                    <td>{{$x->childre_age}}</td>
                                                    <td>{{$x->childre_gender}}</td>
                                                    <td>{{$x->childre_educa_leve}}</td>
                                                    <td>{{$x->childre_class_number}}</td>
                                                    <td>{{$x->identity}}</td>
                                                    <td>{{$x->childre_id_extr}}</td>
                                                    <td>{{$x->childre_live_with}}</td>
                                                    <td>{{$x->updated_at}}</td>
                                                    <td>

                                                            @can(' تعديل قسم الأطفال الطلاب ')

                                                            {{-- Edite --}}
                                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                                data-id="{{$x->id}}" data-childre_name="{{$x->childre_name}}"
                                                                data-childre_age="{{$x->childre_age }}" data-childre_gender="{{$x->childre_gender}}"
                                                                data-childre_educa_leve="{{$x->childre_educa_leve}}"
                                                                data-childre_class_number="{{$x->childre_class_number }}" data-childre_id_extr="{{$x->childre_id_extr}}"
                                                                data-childre_live_with="{{$x->childre_live_with}}"
                                                                data-identity="{{$x->identity}}"
                                                                data-student_name="{{$x->student->student_name}}"   data-student_id="{{$x->student_id}}"
                                                                data-toggle="modal"
                                                                href="#exampleModal2" title="تعديل">
                                                                <i class="las la-pen"></i>
                                                            </a>
                                                            @endcan
                                                            @can('حذف قسم الأطفال الطلاب ')
                                                            {{-- Delete --}}
                                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                                data-id="{{ $x->id }}" data-student_name="{{$x->student->student_name}}"  data-student_id="{{$x->student_id}}"
                                                                data-toggle="modal" href="#modaldemo9" title="حذف">
                                                                <i class="las la-trash"> </i>
                                                            </a>
                                                            @endcan
                                                    </td>
                                                    <td>
                                                            {{-- Add_School --}}

                                                            @if($x->student_statu == 1)
                                                            @can('  مدرسة لطفل الطلاب ')
                                                            <a class=" btn btn-sm btn-info" href="/school_student/show/school/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                            @endcan
                                                            @elseif($x->student_statu == 0)
                                                            @can(' إضافة مدرسة لطفل الطلاب ')

                                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                                data-id="{{$x->id}}" data-childre_name="{{$x->childre_name}}"
                                                                data-toggle="modal"
                                                                href="#exampleModal" title="إضافة مدرسة">
                                                                <i class="las la-pen" style="font-size: 20px;"></i>
                                                            </a>
                                                            @endcan
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

                   {{-- Edit_School --}}
                    <div class="modal" id="exampleModal">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">إضافة مدرسة</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                        type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="{{ Route('school.student.store') }}" method="post">
                                {{ method_field('POST') }}
                                {{ csrf_field() }}
                                    <div class="modal-body">
                                    <div class="form-group">
                                    <input type="hidden" name="id" id="id"  readonly>
                                    <label for="exampleInputEmail">اسم المدرسة </label>
                                    <input class="form-control" name="School_name" id="School_name" type="text" placeholder="أكتب أسم المدرسة " required>
                                    </div>

                                    <div class="form-group">
                                    <label for="exampleInputEmail">نوع المدرسة </label>
                                    <input class="form-control" name="School_type" id="School_type" type="text" placeholder="أكتب نوع المدرسة " required>
                                    </div>

                                    <div class="form-group">
                                    <label for="exampleInputEmail">موقع المدرسة </label>
                                    <input class="form-control" name="School_location" id="School_location" type="text" placeholder="أكتب موقع المدرسة " required>
                                    </div>

                                    <div class="form-group">
                                    <label for="exampleInputEmail">تكاليف مصروف الطفل</label>
                                    <input class="form-control" name="School_cost" id="School_cost" type="text" placeholder="أكتب قيمة تكاليف مصروف الطفل " required>
                                    </div>

                                    <div class="form-group">
                                    <label for="exampleInputEmail">نكاليف المدرسة أو الأقصاط</label>
                                    <input class="form-control" name="School_fees" id="School_fees" type="text" placeholder="أكتب قيمة تكاليف المدرسة " required>
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

                    {{-- delete --}}
                    <div class="modal" id="modaldemo9">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">حذف الطفل</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                        type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="{{ Route('children.destroy') }}" method="post">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                        <div class="form-group">
                                        <input type="hidden" name="student_id" id="student_id" readonly>
                                        <input type="hidden" name="id" id="id"  readonly>
                                        <label for="exampleInputEmail"> اسم الطالب.</label>
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
                                    <h5 class="modal-title" id="exampleModalLabel">تعديل بيانات الطفل</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                 <form action="{{ route('children.update') }}" method="post">
                                {{ method_field('patch') }}
                                {{ csrf_field() }}
                               <div class="modal-body">
                              <div class="modal-body">
                                <div class="form-group">
                                <input type="hidden" name="id" id="id" readonly>
                                <input type="hidden" name="student_id" id="student_id" readonly>
                                <label for="exampleInputEmail">اسم الطفل</label>
                                <input type="text" class="form-control" id="childre_name" name="childre_name" placeholder=" أكتب أسم الطفل" required>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail">العمر</label>
                                <input type="number" class="form-control" id="childre_age" name="childre_age" placeholder=" أكتب  العمر بالرقم " required>
                                </div>
                                <div class="form-group">{{-- it must be select options  --}}
                                    <p class="mg-b-10">الجنس</p>
                                    <select class="form-control select2" name="childre_gender" id="childre_gender" placeholder=" أكتب الجنس الطفل " required>
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
                                <input type="text" class="form-control" id="childre_educa_leve" name="childre_educa_leve" placeholder=" أكتب المرحلة الدراسية "  required>
                                </div>
                                 <div class="form-group">
                                <label for="exampleInputEmail"> رقم الصف الدراسي </label>
                                <input type="text" class="form-control" id="childre_class_number" name="childre_class_number" placeholder="  أكتب رقم الصف الدراسي " required>
                                </div>
                                <div class="form-group">{{-- it must be select options  --}}
                                    <p class="mg-b-10">  نوع الهوية الشخصية</p>
                                    <select class="form-control select2" name="identity" id="identity" placeholder="  " required>
                                        <option label="test">
											        </option>
                                        <option value="لايوجد">
                                            لايوجد</option>
                                        <option value="كملك">
                                            كملك</option>
                                        <option value="اقامة سياحية">
                                            اقامة سياحية </option>
                                            <option value="الجنسية التركي">
                                                 الجنسية التركية </option>
                                            </select>
                                            <div>
                                <div class="form-group">{{-- it must be select options  --}}
                                    <p class="mg-b-10">الهوية الشخصية من اي ولاية</p>
                                    <select class="form-control select2" name="childre_id_extr" id="childre_id_extr" placeholder=" أختر من اسم الولاية الصادرة منها الكملك " required>
                                        <option label="test">
                                        </option>
                             <option value="لايوجد">
                                 لايوجد</option>
                            <option value="أضنة">
                                أضنة</option>
                            <option value="	أدي‌يمن">
                                أدي‌يمن</option>
                            <option value="	أفيون ‌قرةحصار">
                                أفيون ‌قرةحصار</option>
                            <option value="	أغري">
                                أغري</option>
                            <option value="	أماسيا">
                                أماسيا</option>
                            <option value="	أنقرة">
                                أنقرة</option>
                            <option value="	أنطاليا">
                                أنطاليا</option>
                            <option value="	أرتڤين">
                                أرتڤين</option>
                            <option value="	أيدين">
                                أيدين</option>
                            <option value="	بالكسير">
                                بالكسير</option>
                            <option value="	بيلجيك">
                                بيلجيك</option>
                            <option value="	بينگول">
                                بينگول</option>
                            <option value="	بيطليس">
                                بيطليس</option>
                            <option value="بولو">
                                بولو</option>
                            <option value="	بوردور">
                                بوردور</option>
                            <option value="	بورصة">
                                بورصة</option>
                            <option value="	چنق‌قلعه">
                                چنق‌قلعه</option>
                            <option value="	شانكيري">
                                شانكيري</option>
                            <option value="	چوروم">
                                چوروم</option>
                            <option value="	دنيزلي">
                                دنيزلي</option>
                            <option value="	ديار بكر">
                                ديار بكر</option>
                            <option value="	إدرنه">
                                إدرنه</option>
                            <option value="	الازيغ">
                                الازيغ</option>
                            <option value="إرزنجان">
                                إرزنجان</option>
                            <option value="	أرض‌ روم">
                                أرض‌ روم</option>
                            <option value="	إسكي‌ شهر">
                                إسكي‌ شهير</option>
                            <option value="	غازي‌عنتاپ">
                                غازي‌عنتاپ</option>
                            <option value="	گره‌سون">
                                گره‌سون</option>
                            <option value="	گوموش‌خانه">
                                گوموش‌خانه</option>
                            <option value="حكاري">
                                حكاري</option>
                            <option value="	هاتاي">
                                هاتاي</option>
                            <option value="	إسبرطة">
                                إسبرطة</option>
                            <option value="	مرسين">
                                مرسين</option>
                            <option value="	إسطنبول">
                                إسطنبول</option>
                            <option value="	إزمير">
                                إزمير</option>
                            <option value="	قارص">
                                قارص</option>
                            <option value="	كاستامونو">
                                كاستامونو</option>
                            <option value="	قيصري">
                                قيصري</option>
                            <option value="	كريك‌قلعه">
                                كريك‌قلعه</option>
                            <option value="	كيرشهر">
                                كيرشهر</option>
                            <option value="	خوجةإلي">
                                خوجةإلي</option>
                            <option value="قونيا">
                                قونيا</option>
                            <option value="	كوتاهيا">
                                كوتاهيا</option>
                            <option value="	ملاطيا">
                                ملاطيا</option>
                            <option value="	مانيسا">
                                مانيسا</option>
                            <option value="	كهرمان‌مرعش">
                                كهرمان‌مرعش</option>
                            <option value="	ماردين">
                                ماردين</option>
                            <option value="	موغلا">
                                موغلا</option>
                            <option value="	موش">
                                موش</option>
                            <option value="	نڤشهر">
                                نڤشهر</option>
                            <option value="	نيغدة">
                                نيغدة</option>
                            <option value="	أردو">
                                أردو</option>
                            <option value="	ريزه">
                                ريزه</option>
                            <option value="	ساكاريا">
                                ساكاريا</option>
                            <option value="سامسون">
                                سامسون</option>
                            <option value="سيرت">
                                سيرت</option>
                            <option value="سينوپ">
                                سينوپ</option>
                            <option value="	سيڤاس">
                                سيڤاس</option>
                            <option value="	تكيرداغ">
                                تكيرداغ</option>
                            <option value="توقاد">
                                توقاد</option>
                            <option value="	طرابزون">
                                طرابزون</option>
                            <option value="تونج‌ايلي">
                                تونج‌ايلي</option>
                            <option value="شانلي‌اورفا">
                                شانلي‌اورفا</option>
                            <option value="	عشاق">
                                عشاق</option>
                            <option value="	ڤان">
                                ڤان</option>
                            <option value="	يوزگات">
                                يوزگات</option>
                            <option value="	زونگولداك">
                                زونگولداك</option>
                            <option value="	أكساراي">
                                أكساراي</option>
                            <option value="بايبورت">
                                بايبورت</option>
                            <option value="	قرةمان">
                                قرةمان</option>
                            <option value="	قريق‌قلعه">
                                قريق‌قلعه</option>
                            <option value="	بطمان">
                                بطمان</option>
                            <option value="	شرناق">
                                شرناق</option>
                            <option value="	بارتين">
                                بارتين</option>
                            <option value="	أرض‌خان">
                                أرض‌خان</option>
                            <option value="	إغدير">
                                إغدير</option>
                            <option value="	يالوڤا">
                                يالوڤا</option>
                            <option value="	قرةبوك">
                                قرةبوك</option>
                            <option value="	كلس">
                                كلس</option>
                            <option value="	عثمانية">
                                عثمانية</option>
                            <option value="	دوزجه">
                                دوزجه</option>
                        </select>
                    </div>
                                 <div class="form-group">{{-- it must be select options  --}}
                                    <p class="mg-b-10">هل يعيشون معكم</p>
                                    <select class="form-control select2" name="childre_live_with" id="childre_live_with" placeholder=" هل الأطفال يعيشون معكم " required>
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
        var student_id = button.data('student_id')
        var id = button.data('id')
        var identity = button.data('identity')
        var childre_age = button.data('childre_age')
        var childre_name = button.data('childre_name')
        var childre_gender = button.data('childre_gender')
        var childre_educa_leve = button.data('childre_educa_leve')
        var childre_class_number = button.data('childre_class_number')
        var childre_id_extr = button.data('childre_id_extr')
        var childre_live_with = button.data('childre_live_with')
        var modal = $(this)
        modal.find('.modal-body #student_id').val(student_id);
        modal.find('.modal-body #identity').val(identity);
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



