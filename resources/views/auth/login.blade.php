@extends('layouts.master2')

@section('title')
تسجيل الدخول - abo said
- للادارة البيانات
@stop
@section('recaptha')
{!! RecaptchaV3::initJs() !!}
@endsection

@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<!-- The content half -->
				<div class="bg-white col-md-6 col-lg-6 col-xl-5">
					<div class="py-2 login d-flex align-items-center">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="mx-auto col-md-10 col-lg-10 col-xl-9">
									<div class="card-sigin">
										<div class="mb-5 d-flex"> <a href="{{ url('/' . $page='Home') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="my-auto ml-1 mr-0 main-logo1 tx-28">Abo<span>Sa</span>id</h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2>مرحبا بك</h2>
												<h5 class="mb-4 font-weight-semibold"> تسجيل الدخول للادارة البيانات.</h5>
                                                <form method="POST" action="{{ route('login') }}">
                                                 @csrf
													<div class="form-group">
													<label>البريد الالكتروني</label>
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                     @error('email')
                                                     <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                     </span>
                                                     @enderror
													</div>

												 <div class="form-group">
											 	 <label>كلمة المرور</label>
                                                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                  @error('password')
                                                  <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                  </span>
												  @enderror
                                                  <div class="form-group row">
                                                      <div class="col-md-6 offset-md-4">
                                                   {!! RecaptchaV3::field('login') !!}

                                                           <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <label class="form-check-label" for="remember">
                                                                       {{ __('تذكرني') }}
                                                                </label>
                                                           </div>
                                                       </div>
                                                   </div>
												  </div>
                                                    <button type="submit" value="login" class="btn btn-main-primary btn-block">
                                                    {{ __('تسجيل الدخول') }}
                                                    </button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->

                <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="mx-auto text-center row wd-100p">
						<div class="mx-auto my-auto col-md-12 col-lg-12 col-xl-12 wd-100p">
							<img src="{{URL::asset('assets/img/media/login.jpg')}}" class="mx-auto my-auto ht-xl-80p wd-md-100p wd-xl-80p" alt="logo">
						</div>
					</div>
				</div>

			</div>
		</div>
@endsection

@section('js')
@endsection
