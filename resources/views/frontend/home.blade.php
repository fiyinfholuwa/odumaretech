@extends('frontend.app')
@section('title')
Home
@endsection
@section('content')
	<!-- Carousel Start -->
			<div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('frontend/img/img/pexels-canva-studio-3153198.jpg')}}" alt="Carousel Image">
                        <div class="overlay"></div>
                        <div class="carousel-caption">
                            <p class="animated fadeInRight">Embark on an exciting journey into the extraordinary world of technology.</p>
                            <h1 class="animated fadeInLeft">Loosen your tech superpowers!</h1>
                            <a class="btn animated fadeInUp" href="{{route('register')}}">Get Started</a>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="{{asset('frontend/img/img/pexels-cottonbro-studio-6804073.jpg')}}" alt="Carousel Image">
                        <div class="overlay"></div>
                        <div class="carousel-caption">
                            <p class="animated fadeInRight">We are Professionals</p>
                            <h1 class="animated fadeInLeft">Our courses, Your path to a successful Tech Career</h1>
                            <a class="btn animated fadeInUp" href="#">Download Brochure</a>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="{{asset('frontend/img/img/pexels-canva-studio-3153207.jpg')}}" alt="Carousel Image">
                        <div class="overlay"></div>
                        <div class="carousel-caption">
                            <p class="animated fadeInRight">We Are Experienced</p>
                            <h1 class="animated fadeInLeft">For an Expert Professional Training and Advice</h1>
                            <a class="btn animated fadeInUp" href="{{route('corporate.training')}}">Book Consultation</a>
                        </div>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!-- Carousel End -->

            <!-- About Start -->
            <div class="about">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-6">
                            <div class="about-img">
                                <img src="https://images.unsplash.com/photo-1488590528505-98d2b5aba04b?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="section-header text-left">
                                <p>About Us</p>
                            </div>
                            <div class="about-text">
								<p>
								We are not just another tech company; we are your dedicated ally on the path to excellence. We go beyond theoretical concepts. We believe in the power of practical application, which is why we provide you with hands-on projects and real-world case studies. Your journey with us culminates in a prestigious certification that validates your comprehensive skills and expertise...
                                </p>
                                <a class="btn" href="{{route('about')}}">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About End -->

            <!-- Feature Start-->
            <div class="feature container">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-12">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="flaticon-address" aria-hidden="true"></i>
                                </div>
                                <div class="feature-text">
                                    <h3>Intensive BootCamp</h3>
                                    <p>Level up your skills, Join our intensive boot camp</p>
                                    <a class="btn animated fadeInUp" href="{{route('course')}}">Our Courses</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="flaticon-building"></i>
                                </div>
                                <div class="feature-text">
                                    <h3>Corporate Training</h3>
                                    <p>Get your Team updated with the latest Technology stack</p>
                                    <a class="btn animated fadeInUp" href="{{route('corporate.training')}}">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="flaticon-worker"></i>
                                </div>
                                <div class="feature-text">
                                    <h3>Research and Innovation</h3>
                                    <p>Revolutionizing Tomorrow: Cutting edge Research and Innovation</p>
                                    <a class="btn animated fadeInUp" href="{{route('innovation')}}">Check it out</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-12">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="flaticon-building"></i>
                                </div>
                                <div class="feature-text">
                                    <h3>Free Masterclass</h3>
                                    <p>Enrich your skills</p>
                                    @if($masterclass != null || $masterclass != "" )
								@if($masterclass->visible == "on")
								<a class="btn animated fadeInUp" href="{{route('masterclass')}}">Join Our Masterclass</a>
								@else
                                <span class="btn animated fadeInUp">Join Master Class</span>
								@endif
                                @endif
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- Feature End-->
            <!-- Courses Start-->
            <div class="service">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Our Courses</p>
                        <h2>We Provide Highly Structured Training and Courses</h2>
                    </div>
                    <div class="row">
					@if(count($courses) > 0)
							@foreach($courses as $course)
                        <div class="col-lg-4 col-md-6 ">
                            <div class="service-item">
                                <div class="service-img">
                                    <img src="{{asset($course->image)}}" alt="Image">
                                    <div class="service-overlay">
                                        <a href="{{route('course.detail', $course->course_url)}}"><p>
										{{ Str::limit($course->description, 15) }}


                                        </p> </a>
                                    </div>
                                </div>
                                <div class="service-text">
                                    <h3>{{$course->title}}</h3>
                                    <a class="btn" href="{{route('course.detail', $course->course_url)}}">></a>
                                </div>
                            </div>
                        </div>
					@endforeach
					@else
					<div><h3>No Courses yet</h3></div>
					@endif
                    </div>
                </div>
            </div>
            <!-- Courses End -->

            <!-- Fact Start -->
            <div class="fact">
                <div class="container-fluid">
                    <div class="row counters">
                        <div class="col-md-6 fact-left wow slideInLeft">
                            <div class="row">
                                <div class="col-6">
                                    <div class="fact-icon">
                                        <i class="flaticon-building"></i>
                                    </div>
                                    <div class="fact-text">
                                        <h2 data-toggle="counter-up">2000</h2>
                                        <p> + Student Taught</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="fact-icon">
                                        <i class="flaticon-worker"></i>
                                    </div>
                                    <div class="fact-text">
                                        <h2 data-toggle="counter-up">80</h2>
                                        <p>% Employability</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 fact-right wow slideInRight">
                            <div class="row">
                                <div class="col-6">
                                    <div class="fact-icon">
                                        <i class="flaticon-address"></i>
                                    </div>
                                    <div class="fact-text">
                                        <h2 data-toggle="counter-up">20</h2>
                                        <p> + BootCamps</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="fact-icon">
                                        <i class="flaticon-building"></i>
                                    </div>
                                    <div class="fact-text">
                                        <h2 data-toggle="counter-up">20</h2>
                                        <p> + Patnered Companies</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fact End -->



            <!-- Video Start -->
            <div class="video ">
                <div class="container">
                    <button type="button" class="btn-play" data-toggle="modal" data-src="https://www.youtube.com/embed/C7wtCtwyIMg?si=6SOFS7lfz9sju8Lq" data-target="#videoModal">
                        <span></span>
                    </button>
                </div>
            </div>
            
            <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>        
                            <!-- 16:9 aspect ratio -->
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/C7wtCtwyIMg?si=6SOFS7lfz9sju8Lq" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Video End -->
            <!-- How you learn -->
            <div class="feature">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="section-header text-center">
                            <h2>How you will learn</h2>
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <div class="feature-item">
                                <div class="feature-text">
                                    <h3>Immerse Learning</h3>
                                    <ul style="list-style-type: none;">
											<li><i class="fa fa-check"></i> Robust Content and Videos</li>
											<li><i class="fa fa-check"></i> Self Paced + Live Classess</li>
											<li><i class="fa fa-check"></i> Assessments and Project</li>
										</ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <div class="feature-item">
                                <div class="feature-text">
                                    <h3>Lectures & Lab</h3>
                                    <ul style="list-style-type: none;">
											<li><i class="fa fa-check"></i> Weekend Classes.</li>
											<li><i class="fa fa-check"></i> Intensive Training.</li>
											<li><i class="fa fa-check"></i> Focus on real business cases.</li>
										</ul>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <div class="feature-item">
                                <div class="feature-text">
                                    <h3>Capstone Projects</h3>
                                    <ul style="list-style-type: none;">
											<li><i class="fa fa-check"></i> Work on multiple Projects.</li>
											<li><i class="fa fa-check"></i> Get Real Time Feedback.</li>
											<li><i class="fa fa-check"></i> Real Time Mentoring.</li>
										</ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <div class="feature-item">
                                <div class="feature-text">
                                    <h3>Job and Career Coaching</h3>
                                    <ul style="list-style-type: none;">
											<li><i class="fa fa-check"></i> Learn to leverage Linkedin.</li>
											<li><i class="fa fa-check"></i> CV for tech Industry.</li>
											<li><i class="fa fa-check"></i> Access to Jobs opportunities.</li>
											<li><i class="fa fa-check"></i> Demo session on Interviews.</li>
										</ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <!-- Companies -->
            <div class="company container">
                <div class="">
                    <div class="section-header text-center">
                        <h2>Where Our Graduates Work</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 kompany">
                            <img src="{{asset('frontend/img/img/deloitte.png')}}" alt="Deloitte Image">
                        </div>
                        <div class="col-lg-3 col-md-6 kompany">
                            <img src="{{asset('frontend/img/img/firstbank.png')}}" alt="FirstBank Image">
                        </div>
                        <div class="col-lg-3 col-md-6 kompany">
                            <img src="{{asset('frontend/img/img/nhs.png')}}" alt="NHS Image">
                        </div>
                        <div class="col-lg-3 col-md-6 kompany">
                            <img src="{{asset('frontend/img/img/zenith.png')}}" alt="Zenith Image">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Testimonial Start -->
            <div class="testimonial">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="testimonial-slider-nav">
							@if(count($testimonials) > 0)
							@foreach($testimonials as $test)
                                <div class="slider-nav"><img src="{{asset($test->image)}}" alt="Testimonial"></div>
                            
							@endforeach
							@else
							<div><h3 class="text-white">No Testimonial yet</h3></div>
							@endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="testimonial-slider">
							@if(count($testimonials) > 0)
							@foreach($testimonials as $test)

                                <div class="slider-item">
                                    <h3>{{$test->name}}</h3>
                                    <h4>{{$test->title}}</h4>
                                    <p>{{$test->content}}</p>
                                    <h4 style="text-align: center;">
                                    <img style="height: 80px; width: 80px; display: inline-block; border-radius:50%;" src="{{asset($test->image)}}" alt="Testimonial">
                                </h4>

                                </div>

							@endforeach
							@else
							<div><h3 class="text-white">No Testimonial yet</h3></div>
							@endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Testimonial End -->
@endsection