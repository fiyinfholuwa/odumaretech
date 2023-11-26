<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Odumare Tech</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="We empower individuals with tech knowledge, skills, and practical experience for personal and professional growth" name="keywords">
        <meta content="Odumare Tech provides Tech Training in Data Science, Web Development and Data Analytics" name="description">

        <!-- Favicon -->
        <link href="{{asset('frontend/img/img/favicon.ico')}}" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{asset('frontend/lib/flaticon/font/flaticon.css')}}" rel="stylesheet"> 
        <link href="{{asset('frontend/lib/animate/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/lib/slick/slick.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/lib/slick/slick-theme.css')}}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" >


        <!-- Stylesheet -->
        <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
    </head>

    <body>

        <div class="wrapper">
            

            <!-- Nav Bar Start -->
            <div class="nav-bar">
                <div class="">
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                        <a href="index.html" class="navbar-brand">
                            <div class="logo small-logo">
                                <img src="{{asset('frontend/img/img/logo.png')}}" alt="Logo"> 
                            </div>
                        </a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            
                                <div class="logo">
                                    <a href="{{route('home')}}">
                                        <img src="{{asset('frontend/img/img/logo.png')}}" alt="Logo"> 
                                    </a>
                                </div>
                            
                            <div class="navbar-nav">
                                <a href="{{route('home')}}" class="nav-item nav-link active">Home</a>
                                <a href="{{route('course')}}" class="nav-item nav-link ">Our Courses</a>
                                <a href="{{route('blog')}}" class="nav-item nav-link">Blog</a>                              
                                <a href="{{route('about')}}" class="nav-item nav-link">About</a>
                                <a href="{{route('contact')}}" class="nav-item nav-link">Contact Us</a>
                                @if($masterclass != null || $masterclass != "" )
								@if($masterclass->visible == "on")
								<a href="{{route('masterclass')}}" class="nav-item nav-link">Free Masterclass</a>
								@else
								@endif
							@else
							@endif
							
                                
                                 <a href="{{route('instructor')}}" class="nav-item nav-link">Become an Instructor</a>
                                <!-- <a href="login.html" class="nav-item nav-link">Login</a> -->
                            </div>
                            <div class="ml-auto">

							@auth
							@if(Auth::check() && Auth::user()->user_type == "2")
							<a class="btn btn-register" href="{{route('admin.dashboard')}}">Dashboard</a>
							@elseif(Auth::check() && Auth::user()->user_type == "1")
							<a class="btn btn-register" href="{{route('instructor.dashboard')}}">Dashboard</a>
							@else
							@if($check_courses)
							<a class="btn btn-register" href="{{route('user.dashboard')}}">Dashboard</a>
							@else
							@endif
							@endif
                            <a href="{{route('logout')}}" class="btn">Logout</a>
							@else
							<a href="{{route('login')}}" class="btn">Login</a>
                            <a class="btn btn-register" href="{{route('register')}}">Get Started</a>
							@endauth
                                
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- Nav Bar End -->
            
            @yield('content')

             <!-- Footer Start -->
             <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-contact">
                                <h2>Contact</h2>
                                <p><i class="fa fa-phone-alt"></i>+447784927399</p>
                                <p><i class="fa fa-envelope"></i>contact@dumaretech.com</p>
                                <div class="footer-social">
                                    <!-- <a href=""><i class="fab fa-twitter"></i></a> -->
                                    <a href="https://www.facebook.com/profile.php?id=100094441748614"><i class="fab fa-facebook-f"></i></a>
                                    <!-- <a href=""><i class="fab fa-youtube"></i></a> -->
                                    <a href="https://www.instagram.com/odumaretech/"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.linkedin.com/company/odumaretech/"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-link">
                                <h2>Our Services</h2>
                                <a href="{{route('corporate.training')}}">Corporate Training</a>
                                <a href="{{route('innovation')}}">Research and Innovation</a>
                                <a href="{{route('course')}}">Intensive Bootcamps</a>
                                <a href="{{route('masterclass')}}">Free Masterclass</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-link">
                                <h2>Pages</h2>
                                <a href="{{route('course')}}">Our Courses</a>
                                <a href="{{route('about')}}">About</a>
                                <a href="{{route('contact')}}">Contact Us</a>
                                <a href="{{route('instructor')}}">Join Us</a>
                                <a href="{{route('faq')}}">FAQs</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="newsletter">
                                <h2>Newsletter</h2>
                                <p>
                                    <!-- Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulpu -->
                                </p>
                                <div class="form">
                                    <input class="form-control" placeholder="Email here">
                                    <button class="btn">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" footer-menu">
                    <div class="f-menu">
                        <a href="{{route('terms')}}">Terms of use</a>
                        <a href="{{route('privacy')}}">Privacy policy</a>
                        <a href="{{route('policy')}}">Refund Policy</a>
                        <a href="#!">Help</a>
                        <a href="{{route('faq')}}">FAQs</a>
                    </div>
                </div>
                <div class="container copyright">
                    <div class="row">
                        <div class="col-md-12">
                            <p>&copy; <a href="#">Odumare Tech</a>, All Right Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>

            <a href="https://api.whatsapp.com/send?phone=+447784927399&text=Hi%2C%20I%20would%20love%20to%20loosen%20my%20tech%20superpowers%21
" class="float" target="_blank">
<i class="fab fa-whatsapp my-float"></i>
</a>
<style>
	.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  font-size:30px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}

.my-float{
	margin-top:16px;
}
</style>

            <!-- Footer End -->

            <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('frontend/lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('frontend/lib/wow/wow.min.js')}}"></script>
        <script src="{{asset('frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('frontend/lib/isotope/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('frontend/lib/lightbox/js/lightbox.min.js')}}"></script>
        <script src="{{asset('frontend/lib/waypoints/waypoints.min.js')}}"></script>
        <script src="{{asset('frontend/lib/counterup/counterup.min.js')}}"></script>
        <script src="{{asset('frontend/lib/slick/slick.min.js')}}"></script>

        <!-- Main Javascript -->
        <script src="{{asset('frontend/js/main.js')}}"></script>

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