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
قسم المرضى
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="my-auto mb-0 content-title">الاعدادات</h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">/الاقسام</span>
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
                                            <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo1">تفعيل فورم التسجيل</a>
                                            <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">اضافة مريض</a>
                                        </div>
                                     </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table key-buttons ">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">Id</th>
                                                    <th class="border-bottom-0">اسم المريض</th>
                                                    <th class="border-bottom-0">العمر</th>
                                                    <th class="border-bottom-0">الجنس</th>
                                                    <th class="border-bottom-0">هل يوجد هوية</th>
                                                    <th class="border-bottom-0">الولاية</th>
                                                    <th class="border-bottom-0"> الهاتف</th>
                                                    <th class="border-bottom-0">ملاحظات</th>
                                                    <th class="border-bottom-0">تاريخ الإضافة</th>
                                                    <th class="border-bottom-0"> اضافة دفعة بالدولار</th>
                                                    <th class="border-bottom-0">اضافة دفعة تركي</th>
                                                    <th class="border-bottom-0">اضافة دفعة يورو</th>
                                                    <th class="border-bottom-0">اضافة كروت بيم</th>
                                                    <th class="border-bottom-0">اضافة زوج وزوجة</th>
                                                    <th class="border-bottom-0">اضافة اب وام</th>
                                                    <th class="border-bottom-0">حذف المريض</th>
                                                    <th class="border-bottom-0">اضافة اطفال</th>
                                                    <th class="border-bottom-0">السكن </th>
                                                    <th class="border-bottom-0">الحالة الطبية</th>
                                                    <th class="border-bottom-0">العمل</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($medicals as $x)
                                                <tr>
                                                    <td>{{$x->id}}</td>
                                                    <td>{{$x->medical_name}}</td>
                                                    <td>{{$x->medical_age}}</td>
                                                    <td>{{$x->gender}}</td>
                                                    <td>{{$x->medical_have_id}}</td>
                                                    <td>{{$x->medical_id_extr}}</td>
                                                    <td>{{$x->medical_number}}</td>
                                                    <td>{{$x->note}}</td>
                                                    <td>{{$x->created_at}}</td>
                                                
                                                <td>
                                                    @if($x->usd_statu != 0)
                                                    <hr style="padding:0px; margin:5px 0px 5px 0px!important; margin-top:5px; margin-bottom:5px;">
                                                    <a class=" btn btn-sm btn-info" href="/Medical_usd/show/medical/usd/{{$x->id}}"><i class="far fa-eye"  style="font-size: 17px;"></i> </a>                                                        
                                                    @endif
                                                </td>                                                

                                                <td>
                                                    @if($x->tr_statu != 0)
                                                    <a class=" btn btn-sm btn-info" href="/Medical_tr/show/medical/tr/{{$x->id}}"><i class="far fa-eye"  style="font-size: 17px;"></i> </a>                                                        
                                                    @endif
                                                </td>  

                                                <td>
                                                    @if($x->euro_statu != 0)
                                                    <a class=" btn btn-sm btn-info" href="/Medical_euro/show/medical/euro/{{$x->id}}"><i class="far fa-eye"  style="font-size: 17px;"></i> </a>                                                        
                                                    @endif
                                                </td>    

                                                <td>
                                                    @if($x->bim_statu != 0)
                                                    <a class=" btn btn-sm btn-info" href="/Medical_bim/show/medical/bim/{{$x->id}}/"><i class="far fa-eye"  style="font-size: 17px;"></i> </a>                                                        
                                                    @endif
                                                </td>                                                

                                                {{-- wife and husband  --}}
                                                <td>
                                                @if($x->husband_wife_statu == 1)
                                                    <a class="btn btn-sm btn-info" href="/husband_Wife_medical_medical/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                @endif
                                                </td>
                                                   
                                                    
                                                {{-- father and mother  --}}
                                                <td>
                                                @if($x->father_mother_statu == 1)
                                                    <a class="btn btn-sm btn-info" href="/father_and_mother_medical/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                @endif
                                                </td>

                                                <td>
                                                @can(' حذف مريض العائلات ')
                                                {{-- delete Student  --}}
                                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                        data-id="{{$x->id}}" data-medical_name="{{$x->medical_name}}"
                                                        data-family_id="{{$x->family_id}}"
                                                        data-toggle="modal" href="#modaldemo9" title="حذف">
                                                        <i class="las la-trash"  style="font-size: 20px;"> </i>
                                                    </a>
                                                @endcan
                                                </td>
                                                   
                                                   
                                                {{-- add children  --}}
                                                <td>
                                                @if($x->child_statu != 0)
                                                    <a class=" btn btn-sm btn-info" href="/children_medical/show/child/medical/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                <hr style="padding:0px; margin:5px 0px 5px 0px!important; margin-top:5px; margin-bottom:5px;">
                                                @endif
                                                </td>


                                                <td>
                                                @if($x->residance_statu == 1)
                                                    <a class=" btn btn-sm btn-info" href="/address_medical/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                @endif
                                                </td>

                                                <td>
                                                {{-- Medical_Status  --}}
                                                @if($x->medical_statu == 1)
                                                    <a class=" btn btn-sm btn-info" href="/Medical_Statu_Medical/show/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                @endif
                                                </td>

                                                <td>
                                                {{-- Job  --}}
                                                @if($x->job_statu == 1)
                                                    <a class=" btn btn-sm btn-info" href="/job_medical/show/medical/{{$x->id}}"><i class="far fa-eye"  style="font-size: 20px;"></i> </a>
                                                @endif
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

                            @if (session()->has('Add_MedicalStatues'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_MedicalStatues') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if (session()->has('Warning'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Warning') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                                                 
                            @if (session()->has('Form'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Form') }}</strong>
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

                            @if (session()->has('Add_student_error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_student_error') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if (session()->has('Add_student'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_student') }}</strong>
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

                            @if (session()->has('Add_husbandandWife'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_husbandandWife') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if (session()->has('Add_Child'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_Child') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if (session()->has('Add_StudentResidences'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_StudentResidences') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            @if (session()->has('Add_jobs'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_jobs') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            
                            @if (session()->has('Add_Address'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong style="right: 30px; position: relative;">{{ session()->get('Add_Address') }}</strong>
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


                        {{-- delete --}}
                        <div class="modal" id="modaldemo9">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">حذف القسم</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                            type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="{{ route('medical.family.destroy') }}" method="post">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                            <input type="hidden" name="family_id" id="family_id" value="">
                                            <input type="hidden" name="id" id="id" value="">
                                            <input class="form-control" name="medical_name" id="medical_name" type="text" readonly>
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
                                    <form action="{{ route('medical.update') }}" method="post" autocomplete="off">
                                        {{ method_field('patch') }}
                                        {{ csrf_field() }}
                                     <div class="modal-body">
                                        <div class="form-group">
                                        <label for="exampleInputEmail">اسم المريض</label>
                                        <input type="text" class="form-control" id="medical_name" name="medical_name" placeholder="أكنب أسم الطالب ">
                                        <input type="hidden" class="form-control" id="id" name="id" placeholder="أكنب أسم الطالب ">
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail">  عمر المريض</label>
                                        <input type="number" class="form-control" id="medical_age" name="medical_age" placeholder="أكنب تاريخ الميلاد ">
                                        </div>   
                                                                                
                                        <div class="form-group">
                                        <label for="exampleInputEmail">الجنس</label>
                                        <select class="form-control" id="gender" name="gender"  placeholder=" أكنب اسم المحافظة الأصل ">
                                            <option label="test">
                                                حدد من فضلك </option>
                                            <option value="ذكر">
                                                ذكر</option>
                                            <option value="	انثى">
                                                انثى</option>
                                            </select>
                                        </div>  

                                        <div class="form-group">
                                        <label for="exampleInputEmail">هل يوجد كملك</label>
                                        <select class="form-control" id="medical_have_id" name="medical_have_id"  placeholder=" أكنب اسم المحافظة الأصل ">
                                            <option label="test">
                                                حدد من فضلك </option>
                                            <option value="	يوجد">
                                                يوجد</option>
                                            <option value="	لا يوجد">
                                                لا يوجد</option>
                                            </select>
                                        </div>     
                                                               
                                        <div class="form-group">
                                        <label for="exampleInputEmail"> الولاية</label>
                                        <input type="text" class="form-control" id="medical_id_extr" name="medical_id_extr" placeholder="أكنب العمر بأرقام ">
                                        </div>                       
                                        <div class="form-group">
                                        <label for="exampleInputEmail"> رقم هاتف المريض</label>
                                        <input type="text" class="form-control" id="medical_number" name="medical_number" placeholder="أكنب العمر بأرقام ">
                                        </div>
                       
                                        <div class="form-group">
                                        <label for="exampleInputEmail">ملاحظات</label>
                                        <input type="text" class="form-control" id="note" name="note"  placeholder=" أكنب تاريخ الدخول الى تركيا ">
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
        var medical_name = button.data('medical_name')
        var medical_age = button.data('medical_age')
        var medical_number = button.data('medical_number')
        var medical_have_id = button.data('medical_have_id')
        var gender = button.data('gender')
        var medical_id_extr = button.data('medical_id_extr')
        var note = button.data('note')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #medical_name').val(medical_name);
        modal.find('.modal-body #medical_age').val(medical_age);
        modal.find('.modal-body #medical_number').val(medical_number);
        modal.find('.modal-body #medical_have_id').val(medical_have_id);
        modal.find('.modal-body #gender').val(gender);
        modal.find('.modal-body #note').val(note);
        modal.find('.modal-body #medical_id_extr').val(medical_id_extr);
    })
</script>

{{--  delete Student Jquery  --}}
<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var medical_name = button.data('medical_name')
        var family_id = button.data('family_id')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #medical_name').val(medical_name);
        modal.find('.modal-body #family_id').val(family_id);
    })
</script>

<script type="text/javascript">
    function showDiv1(select){
       if(select.value==1){
        document.getElementById('hidden_div').style.display = "flex";
        document.getElementById('hidden1_div').style.display = "none";
       } else{
        document.getElementById('hidden_div').style.display = "none";
        document.getElementById('hidden1_div').style.display = "flex";

       }
    }
    </script>
@endsection



