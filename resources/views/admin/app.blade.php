
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>OdumareTech</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<!-- <link rel="icon" href="../../assets/img/icon.ico" type="image/x-icon"/> -->

	<!-- Fonts and icons -->
	<script src="{{asset('../../assets/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ["{{asset('../../assets/css/fonts.css')}}"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>


@guest
    <meta http-equiv="refresh" content="2;url={{ route('login') }}">
    <script>
        setTimeout(function() {
            window.location.href = '{{ route("login") }}';
        }, 2000);
    </script>
    @endguest


	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('../../assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('../../assets/css/azzara.min.css')}}">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{asset('../../assets/css/demo.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" >
</head>

<body>
	<div class="wrapper">
		<!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div style="color:black;" class="main-header" data-background-color="dark">
			<!-- Logo Header -->
			<div class="logo-header">

				<a href="{{route('home')}}" class="logo">
					<!-- <img src="../../assets/img/logoazzara.svg" alt="navbar brand" class="navbar-brand"> -->
					<span style="background-color:#fff;padding:7px;border-radius:3px;"><img style="width:100px; height:25px; border-radius:5px;"  src="{{asset('frontend/img/img/logo.png')}}" /><span>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">

				<div class="container-fluid">
					<div class="collapse" id="search-nav">

					</div>
					@guest

						@php
							return redirect()->route('login');
						@endphp
					@else
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification">{{count($admin_inbox)}}</span>
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">Messages from Instructors ({{count($admin_inbox)}})</div>
								</li>
								@if(count($admin_inbox) > 0 )
									@foreach($admin_inbox as $inbox)
									<li>
									<div class="notif-center">

										<a href="#">
											<div class="notif-icon notif-primary"> <i class="fa fa-envelope"></i> </div>
											<div class="notif-content">
												<span class="block">
													{{$inbox->name}} : {{$inbox->instructor_message}}
												</span>
												<span class="time">{{ ($inbox->created_at)->diffForHumans() }}
												</span>
											</div>
										</a>

									</div>
								</li>
									@endforeach
								@else

								@endif
								<li>
									<a class="see-all" href="{{route('admin.chat.all')}}">See All Messages<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
								<img src="https://cdn-icons-png.flaticon.com/512/6386/6386976.png" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<li>
									<div class="user-box">
										<div class="avatar-lg"><img src="https://cdn-icons-png.flaticon.com/512/6386/6386976.png" alt="..." class="avatar-img rounded-circle"></div>
										<div class="u-text">
											<h3>hello</h3>
										</div>
									</div>
								</li>
								<li>
								<a class="dropdown-item text-info " style="font-weight:600;" target="_blank" href="{{route('home')}}" >Visit Main Website</a>
								</li>
								<li>
								<a class="dropdown-item text-danger" style="font-weight:600;" href="{{route('logout')}}" >Logout</a>
								</li>

							</ul>
						</li>

					</ul>
					@endguest
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
		<!-- Sidebar -->
		<div class="sidebar">

			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
						<img src="https://cdn-icons-png.flaticon.com/512/6386/6386976.png" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>

									<span class="user-level">Super Admin</span>
									<span class="caret"></span>

								</span>
							</a>
							<div class="clearfix"></div>

						</div>
					</div>
					<ul class="nav">

						<li class="nav-item active">
							<a href="{{route('admin.dashboard')}}">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
								<!-- <span class="badge badge-count">5</span> -->
							</a>
						</li>

						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-tag"></i>
								<p>Course Category</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('category.view')}}">
											<span class="sub-item">Manage Course Category</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<li class="nav-item">
							<a data-toggle="collapse" href="#cohort">
								<i class="fas fa-tag"></i>
								<p>Manage Course Cohort</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="cohort">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('cohort.view')}}">
											<span class="sub-item">Manage Cohort</span>
										</a>
									</li>
									<li>
										<a href="{{route('cohort_m.view')}}">
											<span class="sub-item">Manage Cohort Price</span>
										</a>
									</li>
								</ul>
							</div>
						</li>


						<li class="nav-item">
							<a data-toggle="collapse" href="#post">
								<i class="fas fa-sticky-note"></i>
								<p>Manage Courses</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="post">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('course.view')}}">
											<span class="sub-item">Add Course</span>
										</a>
									</li>
									<li>
										<a href="{{route('course.all')}}">
											<span class="sub-item">All Courses</span>
										</a>
									</li>

								</ul>
							</div>
						</li>
                        <li class="nav-item">
							<a data-toggle="collapse" href="#testimonial">
								<i class="fas fa fa-quote-left"></i>
								<p>Testimonials</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="testimonial">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('testimonial.view')}}">
											<span class="sub-item">Add Testimonial</span>
										</a>
									</li>
									<li>
										<a href="{{route('testimonial.all')}}">
											<span class="sub-item">All Testimonials</span>
										</a>
									</li>

								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#masterclass">
							<i class="fa fa-podcast" aria-hidden="true"></i>
								<p>Manage Master Class</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="masterclass">
								<ul class="nav nav-collapse">
									<li>
									<a href="{{route('masterclass.link')}}">
											<span class="sub-item">Manage Master Class Link</span>
										</a>
									</li>

									<li>
										<a href="{{route('masterclass.all')}}">
											<span class="sub-item">MasterClass Attendees</span>
										</a>
									</li>

								</ul>
							</div>
						</li>

						<li class="nav-item">
							<a data-toggle="collapse" href="#innovation">
								<i class="fa fa-users"></i>
								<p>Manage Innovations</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="innovation">
								<ul class="nav nav-collapse">
									<li>
									<a href="{{route('innovation.view')}}">
											<span class="sub-item">Add Innovation</span>
										</a>
									</li>

									<li>
										<a href="{{route('innovation.all')}}">
											<span class="sub-item">All Innovations</span>
										</a>
									</li>

                                    <li>
                                        <a href="{{route('innovation.apply.view')}}">
                                            <span class="sub-item">All Innovation Collaborators</span>
                                        </a>
                                    </li>

								</ul>
							</div>
						</li>


						<li class="nav-item">
							<a data-toggle="collapse" href="#blog">
								<i class="fa fa-users"></i>
								<p>Manage Blog</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="blog">
								<ul class="nav nav-collapse">
									<li>
									<a href="{{route('blog.view')}}">
											<span class="sub-item">Add Post</span>
										</a>
									</li>

									<li>
										<a href="{{route('blog.all')}}">
											<span class="sub-item">All Posts</span>
										</a>
									</li>

								</ul>
							</div>
						</li>



						<li class="nav-item">
							<a data-toggle="collapse" href="#account">
								<i class="fa fa-users"></i>
								<p>Manage Accounts</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="account">
								<ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{route('admin.user.view')}}">
                                            <span class="sub-item">Add User</span>
                                        </a>
                                    </li>


                                    <li>
									<a href="{{route('student.all')}}">
											<span class="sub-item">All Users</span>
										</a>
									</li>

									<li>
										<a href="{{route('instructor.all')}}">
											<span class="sub-item">All Instructors</span>
										</a>
									</li>

									<li>
										<a href="{{route('applied.view')}}">
											<span class="sub-item">Manage Applied Students</span>
										</a>
									</li>

								</ul>
							</div>
						</li>

						<li class="nav-item">
							<a href="{{route('company.all')}}">
							<i class="fa fa-school"></i>
								<p>Corporate Training <br/> Requests</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="{{route('github.link')}}">
							<i class="fa fa-globe"></i>
								<p>Manage Github</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('meeting.link')}}">
							<i class="fa fa-link"></i>
								<p>Manage </br> Meeting Link</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="{{route('record.link')}}">
							<i class="fas  fa-microphone"></i>
								<p>Manage </br>Record Sessions</p>
							</a>
						</li>


						<li class="nav-item">
							<a href="{{route('admin.chat.all')}}">
							<i class="fa fa-comments"></i>
								<p>Instructor Chats</p>
							</a>
						</li>


						<li class="nav-item">
							<a href="{{route('instructor.application.all')}}">
							<i class="fa fa-users"></i>
								<p>Instructor Applications</p>

							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('transaction.all')}}">
							<i class="fas fa-exchange-alt"></i>
								<p>All Transactions</p>

							</a>
						</li>

						<li class="nav-item">
							<a href="{{route('coupon.view')}}">
							<i class="fas fa-gift"></i>
								<p>Manage Coupons</p>

							</a>
						</li>

						<li class="nav-item">
							<a href="{{route('contact.all')}}">
							<i class="fa fa-envelope"></i>
								<p>Messages</p>

							</a>
						</li>

                        <li class="nav-item">
                            <a href="{{route('platform.configure')}}">
                                <i class="fa fa-cog"></i>
                                <p>Platform Configuration</p>

                            </a>
                        </li>

                        <li class="nav-item">

						<a href="{{route('logout')}}">
							<i class="fas fa-sign-out-alt"></i>
								<p class="text-danger">Logout</p>
								<!-- <span class="badge badge-count badge-success">4</span> -->
							</a>

						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="main-panel">
			<div class="content">


                @yield('content')


			</div>

		</div>

		<!-- Custom template | don't include it in your project! -->

		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="{{asset('../../assets/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{asset('../../assets/js/core/popper.min.js')}}"></script>
	<script src="{{asset('../../assets/js/core/bootstrap.min.js')}}"></script>
	<!-- jQuery UI -->
	<script src="{{asset('../../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{asset('../../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>
	<!-- Bootstrap Toggle -->
	<script src="{{asset('../../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>
	<!-- jQuery Scrollbar -->
	<script src="{{asset('../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
	<!-- Datatables -->
	<script src="{{asset('../../assets/js/plugin/datatables/datatables.min.js')}}"></script>
	<!-- Azzara JS -->
	<script src="{{asset('../../assets/js/ready.min.js')}}"></script>
	<!-- Azzara DEMO methods, don't include it in your project! -->
	<script src="{{asset('../../assets/js/setting-demo.js')}}"></script>
	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>


 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
      Toastify({ text: "{{ Session::get('message') }}", duration: 3000,
            style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
    }).showToast();
    break;

    case 'success':
      Toastify({ text: "{{ Session::get('message') }}", duration: 3000,
        style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
    }).showToast();
    break;

    case 'warning':
      Toastify({ text: "{{ Session::get('message') }}", duration: 3000,
            style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
    }).showToast();
    break;

    case 'error':
      Toastify({ text: "{{ Session::get('message') }}", duration: 3000,
            style: { background: "linear-gradient(to right, #ff0000, #ff0000)" }
    }).showToast();
    break;
 }
 @endif

</script>


</body>
</html>
