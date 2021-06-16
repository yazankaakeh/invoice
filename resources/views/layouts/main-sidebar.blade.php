<!-- main-sidebar -->
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll">
			<div class="main-sidebar-header active">
				<a class="desktop-logo logo-light active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="main-logo" alt="logo"></a>
				<a class="desktop-logo logo-dark active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="logo-icon" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon-white.png')}}" class="logo-icon dark-theme" alt="logo"></a>
			</div>
			<div class="main-sidemenu">
				<div class="clearfix app-sidebar__user">
					<div class="dropdown user-pro-body">
						<div class="">
							<img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('assets/img/faces/6.jpg')}}"><span class="avatar-status profile-status bg-green"></span>
						</div>
						<div class="user-info">
                            {{--  //showing the email and the name   --}}
							<h4 class="mt-3 mb-0 font-weight-semibold">{{ Auth::user()->name }}</h4>
							<span class="mb-0 text-muted">{{ Auth::user()->email }}</span>
						</div>
					</div>
				</div>
				<ul class="side-menu">
					<li class="side-item side-item-category">أهلاً وسهلاً بكم </li>
					<li class="slide">
						<a class="side-menu__item" href="{{ url('/' . $page='index') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/><path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/></svg><span class="side-menu__label">الصفحة الرئيسية</span><span class="badge badge-success side-badge">1</span></a>
					</li>

					@can(' قسم الدخل المالي ')
					<li class="side-item side-item-category">الأقسام المالية .</li>


					<li class="slide">
						<a class="side-menu__item" href="{{ route('income.show') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/><path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/></svg><span class="side-menu__label">الدخل المالي</span></a>
					</li>
					@endcan

					@can('المستخدمين')
               				 <li class="side-item side-item-category">المستخدمين.</li>
              				  <li class="slide">
               			     <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}"><svg
                            xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3" />
                            <path
                                d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z" />
                        	</svg><span class="side-menu__label">المستخدمين</span><i class="angle fe fe-chevron-down"></i></a>
             			       <ul class="slide-menu">
                        	@can('قائمة المستخدمين')
                            	<li><a class="slide-item" href="{{ url('/' . ($page = 'users')) }}">قائمة المستخدمين</a></li>
                        	@endcan

                        	@can('صلاحيات المستخدمين')
                            	<li><a class="slide-item" href="{{ url('/' . ($page = 'roles')) }}">صلاحيات المستخدمين</a></li>
                        	@endcan
                    		</ul>
                			    </li>
            				@endcan
					{{--  <li class="slide">
						<a class="side-menu__item" href="{{ url('/' . $page='icons') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon"  viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 4c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm3.5 4c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5zm-7 0c.83 0 1.5.67 1.5 1.5S9.33 11 8.5 11 7 10.33 7 9.5 7.67 8 8.5 8zm3.5 9.5c-2.33 0-4.32-1.45-5.12-3.5h1.67c.7 1.19 1.97 2 3.45 2s2.76-.81 3.45-2h1.67c-.8 2.05-2.79 3.5-5.12 3.5z" opacity=".3"/><circle cx="15.5" cy="9.5" r="1.5"/><circle cx="8.5" cy="9.5" r="1.5"/><path d="M12 16c-1.48 0-2.75-.81-3.45-2H6.88c.8 2.05 2.79 3.5 5.12 3.5s4.32-1.45 5.12-3.5h-1.67c-.69 1.19-1.97 2-3.45 2zm-.01-14C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"/></svg><span class="side-menu__label">ايقونات</span><span class="badge badge-danger side-badge">New</span></a>
					</li>  --}}
					<li class="side-item side-item-category">الأقسام الرئيسية .</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M3.31 11l2.2 8.01L18.5 19l2.2-8H3.31zM12 17c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z" opacity=".3"/><path d="M22 9h-4.79l-4.38-6.56c-.19-.28-.51-.42-.83-.42s-.64.14-.83.43L6.79 9H2c-.55 0-1 .45-1 1 0 .09.01.18.04.27l2.54 9.27c.23.84 1 1.46 1.92 1.46h13c.92 0 1.69-.62 1.93-1.46l2.54-9.27L23 10c0-.55-.45-1-1-1zM12 4.8L14.8 9H9.2L12 4.8zM18.5 19l-12.99.01L3.31 11H20.7l-2.2 8zM12 13c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg><span class="side-menu__label">الأقسام</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
						@can(' قسم الطلاب ')
							<li><a class="slide-item" href="{{ route('student.show') }}"> قسم الطلاب</a></li>
						@endcan
						@can(' قسم العائلات ')
							<li><a class="slide-item" href="{{ route('family.show') }}"> قسم العائلات</a></li>
						@endcan
						@can(' قسم الطبي ')
							<li><a class="slide-item" href="{{ route('medical.show')}}">قسم الطبي</a></li>
						@endcan
						</ul>
					</li>
					<li class="slide ">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 9h14V5H5v4zm2-3.5c.83 0 1.5.67 1.5 1.5S7.83 8.5 7 8.5 5.5 7.83 5.5 7 6.17 5.5 7 5.5zM5 19h14v-4H5v4zm2-3.5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5z" opacity=".3"/><path d="M20 13H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1zm-1 6H5v-4h14v4zm-12-.5c.83 0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5-1.5.67-1.5 1.5.67 1.5 1.5 1.5zM20 3H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1zm-1 6H5V5h14v4zM7 8.5c.83 0 1.5-.67 1.5-1.5S7.83 5.5 7 5.5 5.5 6.17 5.5 7 6.17 8.5 7 8.5z"/></svg><span class="side-menu__label">المدفوعات</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">


					<li class="sub-slide">
								<a class="sub-side-menu__item" data-toggle="sub-slide" href="{{ url('/' . $page='#') }}"><span class="sub-side-menu__label">مدفوعات العائلات</span><i class="sub-angle fe fe-chevron-down"></i></a>
								<ul class="sub-slide-menu">
								@can(' مدفوعات بالتركي العائلات ')
							<li><a class="slide-item" href="{{ route('tr.family.pay') }}">مدفوعات التركي</a></li>
								@endcan
								@can(' مدفوعات باليورو العائلات ')
							<li><a class="slide-item" href="{{ route('euro.family.pay') }}">مدفوعات اليورو</a></li>
								@endcan
								@can(' مدفوعات بالدولار العائلات ')
							<li><a class="slide-item" href="{{ route('usd.family.pay') }}">مدفوعات الدولار</a></li>
								@endcan
								@can(' مدفوعات بالكرت البيم العائلات ')
							<li><a class="slide-item" href="{{ route('bim.family.pay') }}">كروت البيم</a></li>
								@endcan
								</ul>
							</li>

							@can(' مدفوعات الطلاب ')
							<li class="sub-slide">
								<a class="sub-side-menu__item" data-toggle="sub-slide" href="{{ url('/' . $page='#') }}"><span class="sub-side-menu__label">مدفوعات الطلاب</span><i class="sub-angle fe fe-chevron-down"></i></a>
								<ul class="sub-slide-menu">
								@can(' مدفوعات بالتركي الطلاب ')
							<li><a class="slide-item" href="{{ route('tr.student.pay') }}">مدفوعات التركي</a></li>
								@endcan
								@can(' مدفوعات باليورو الطلاب ')
							<li><a class="slide-item" href="{{ route('euro.student.pay') }}">مدفوعات اليورو</a></li>
								@endcan
								@can(' مدفوعات بالدولار الطلاب ')
							<li><a class="slide-item" href="{{ route('usd.student.pay') }}">مدفوعات الدولار</a></li>
								@endcan
								@can(' مدفوعات بالكرت البيم الطلاب ')
							<li><a class="slide-item" href="{{ route('bim.student.pay') }}">كروت البيم</a></li>
								@endcan
								</ul>
							</li>
							@endcan

							@can(' مدفوعات قسم الطبي ')
							<li class="sub-slide">
								<a class="sub-side-menu__item" data-toggle="sub-slide" href="{{ url('/' . $page='#') }}"><span class="sub-side-menu__label">مدفوعات القسم الطبي</span><i class="sub-angle fe fe-chevron-down"></i></a>
								<ul class="sub-slide-menu">
								@can(' مدفوعات بالتركي الطبي ')
							<li><a class="slide-item" href="{{ route('tr.medical.pay') }}">مدفوعات التركي</a></li>
								@endcan
								@can(' مدفوعات باليورو الطبي ')
							<li><a class="slide-item" href="{{ route('euro.medical.pay') }}">مدفوعات اليورو</a></li>
								@endcan
								@can(' مدفوعات بالدولار الطبي ')
							<li><a class="slide-item" href="{{ route('usd.medical.pay') }}">مدفوعات الدولار</a></li>
								@endcan
								@can(' مدفوعات بالكرت البيم الطبي ')
							<li><a class="slide-item" href="{{ route('bim.medical.pay') }}">كروت البيم</a></li>
								@endcan
								</ul>
							</li>
							@endcan

							<li class="sub-slide">
								<a class="sub-side-menu__item" data-toggle="sub-slide" href="{{ url('/' . $page='#') }}"><span class="sub-side-menu__label">مدفوعات عامة</span><i class="sub-angle fe fe-chevron-down"></i></a>
								<ul class="sub-slide-menu">
								@can(' مدفوعات بالتركي ')
							<li><a class="slide-item" href="{{ route('tr.pay') }}">مدفوعات التركي</a></li>
								@endcan
								@can(' مدفوعات باليورو ')
							<li><a class="slide-item" href="{{ route('euro.pay') }}">مدفوعات اليورو</a></li>
								@endcan
								@can(' مدفوعات بالدولار ')
							<li><a class="slide-item" href="{{ route('usd.pay') }}">مدفوعات الدولار</a></li>
								@endcan
								</ul>
							</li>
						</ul>
					</li>



                    <li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/><path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/></svg><span class="side-menu__label">قسم التسجيل</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="{{ route('student.register') }}">قائمة تسجيل الطلاب</a></li>
							<li><a class="slide-item" href="{{ route('family.register') }}">قائمة تسجيل العائلات</a></li>
							<li><a class="slide-item" href="{{ route('register.medical') }}">قائمة تسجيل المرضى</a></li>

						</ul>
					</li>


                    <li class="slide ">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 9h14V5H5v4zm2-3.5c.83 0 1.5.67 1.5 1.5S7.83 8.5 7 8.5 5.5 7.83 5.5 7 6.17 5.5 7 5.5zM5 19h14v-4H5v4zm2-3.5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5z" opacity=".3"/><path d="M20 13H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1zm-1 6H5v-4h14v4zm-12-.5c.83 0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5-1.5.67-1.5 1.5.67 1.5 1.5 1.5zM20 3H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1zm-1 6H5V5h14v4zM7 8.5c.83 0 1.5-.67 1.5-1.5S7.83 5.5 7 5.5 5.5 6.17 5.5 7 6.17 8.5 7 8.5z"/></svg><span class="side-menu__label">الأقسام العامة </span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">

						@can(' قسم الطلاب ')

                         <li class="sub-slide">
						<a class="sub-side-menu__item" data-toggle="sub-slide" href="{{ url('/' . $page='#') }}"><span class="sub-side-menu__label"> الأقسام العامة للطلاب</span><i class="sub-angle fe fe-chevron-down"></i></a>
						<ul class="sub-slide-menu">
						@can(' قسم الأطفال الطلاب ')
							<li><a class="slide-item" href="{{ route('children.show') }}">قسم الاطفال</a></li>
						@endcan
                        <hr>
						@can(' قسم الزوج والزوجة الطلاب ')
							<li><a class="slide-item" href="{{ route('husband_Wife.show') }}">قسم الزوج والزوجة</a></li>
						@endcan
                        <hr>
						@can(' قسم الأخوة الطلاب ')
							<li><a class="slide-item" href="{{ route('Sister_and_Brother.show') }}"> قسم الاخوة</a></li>
						@endcan
                        <hr>
						@can(' اضافة الأب والأم الطلاب ')
							<li><a class="slide-item" href="{{ route('FatherandMother.show') }}"> قسم الأب والأم </a></li>
						@endcan
                        <hr>
						@can(' قسم الجامعة الطلاب ')
							<li><a class="slide-item" href="{{ route('University.show') }}"> قسم الجامعة</a></li>
						@endcan
                        <hr>
						@can(' قسم المنح الدراسية الطلاب ')
							<li><a class="slide-item" href="{{ route('Scholarship.show') }}"> قسم المنح الدراسية</a></li>
						@endcan
                        <hr>
						@can(' اضافة الحالة الصحية الطلاب ')
							<li><a class="slide-item" href="{{ route('Medical_Statu.show') }}"> قسم الحالة الصحية</a></li>
						@endcan
                        <hr>
						@can(' قسم سكن الطلاب ')
							<li><a class="slide-item" href="{{ route('Student_Residence.show') }}"> قسم سكن الطلاب</a></li>
						@endcan
                        <hr>
						@can(' اضافة القرأن الطلاب ')
							<li><a class=" slide-item" href="{{ route('Quran.show') }}"> قسم القرآن</a></li>
						@endcan
                        <hr>
						@can(' اضافة العمل الطلاب ')
							<li><a class="slide-item" href="{{ route('job.show') }}"> قسم العمل</a></li>
						@endcan
						</ul>
					</li>
					@endcan

					@can(' قسم العائلات ')

					<li class="sub-slide">
					<a class="sub-side-menu__item" data-toggle="sub-slide" href="{{ url('/' . $page='#') }}"><span class="sub-side-menu__label"> الأقسام العامة العائلات</span><i class="sub-angle fe fe-chevron-down"></i></a>
						<ul class="sub-slide-menu">
						@can(' قسم الزوج والزوجة العائلات ')
							<li><a class="slide-item" href="{{ route('husband_Wife.show.family')}}"> قسم الزوج والزوجة</a></li>
						@endcan
                        <hr>
						@can(' قسم الأطفال العائلات ')
							<li><a class="slide-item" href="{{ route('children.show.family')}}"> قسم الاطفال</a></li>
						@endcan
                        <hr>
						@can(' قسم السكن العائلات ')
							<li><a class="slide-item" href="{{ route('address.show') }}"> قسم السكن</a></li>
						@endcan
						{{--  @can(' قسم العمل العائلات ')
							<li><a class="slide-item" href="{{ route('job.show.family') }}"> قسم   العمل</a></li>
						@endcan  --}}
						</ul>
					</li>
					@endcan

					@can(' قسم الطبي ')

					<li class="sub-slide">
					<a class="sub-side-menu__item" data-toggle="sub-slide" href="{{ url('/' . $page='#') }}"><span class="sub-side-menu__label"> الأقسام العامة للطبي</span><i class="sub-angle fe fe-chevron-down"></i></a>
						<ul class="sub-slide-menu">
								{{--  @can()
							<li><a class="slide-item" href="{{ route('children.show.medical')}}"> قسم   الاطفال</a></li>
								@endcan
								@can()
							<li><a class="slide-item" href="{{ route('husband_Wife.show.medical')}}"> قسم   الزوج والزوجة</a></li>
								@endcan  --}}

								@can(' قسم الأب والأم الطبي ')
							<li><a class="slide-item" href="{{ route('FatherandMother.show.medical') }}"> قسم الأب و الأم</a></li>
								@endcan
                                <hr>
								@can(' قسم الحالة الصحية الطبي ')
							<li><a class="slide-item" href="{{ route('Medical_Statu.show.medical') }}"> قسم الحالة الصحية</a></li>
								@endcan
                                <hr>
                                @can(' قسم السكن الطبي ')
							<li><a class="slide-item" href="{{ route('address.medical.show') }}"> قسم السكن</a></li>
								@endcan
                                <hr>
								@can(' قسم العمل الطبي ')
							<li><a class="slide-item" href="{{ route('job.show.medical') }}"> قسم العمل</a></li>
								@endcan
								</li>
								@endcan

				</ul>
			</div>
		</aside>
<!-- main-sidebar -->
