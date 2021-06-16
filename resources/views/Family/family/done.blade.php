@extends('layouts.master2')
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('title')
تسجيل العائلات
@endsection
<style>
body{
    background-image:url('/assets/img/family.jpg');
      background-position: center;
      background-size: cover;
}
</style>


@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="my-auto mb-0 content-title">قسم التسجيل  </h4><span class="mt-1 mb-0 mr-2 text-muted tx-13">/ معلومات العائلة</span>
						</div>
					</div>
				</div>

@endsection
@section('content')

                <div class="container" >
                <!-- Main-error-wrapper -->
                <div class="main-error-wrapper">

                    <h2 style="font-size: 75px;">لقد تم إيقاف الرابط بشكل مؤقت</h2>
                    <h2> يرجى المحاولة لاحقا وشكرا</h6>
                </div>
                </div>
@endsection


@section('js')
<!--Internal  Select2 js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Jquery.steps js -->
<script src="{{URL::asset('assets/plugins/jquery-steps/jquery.steps.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!--Internal  Form-wizard js -->
<script src="{{URL::asset('assets/js/form-wizard.js')}}"></script>
@endsection
