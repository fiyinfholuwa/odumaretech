@extends('frontend.app')
@section('title')
About Us
@endsection
@section('content')

<!-- About Start -->
			<div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>About Us</h2>
                        </div>
                        <div class="col-12">
                            <a style="color: #fff;" href="{{route('home')}}">Home</a>
                            <a style="color:#fff;" href="#">About Us</a>
                        </div>
                    </div>
                </div>
            </div>

			<div style="margin-top: -100px" class="about about_about page">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-6">
                            <div class="about-img">
                                <img src="https://media.istockphoto.com/id/1321462048/photo/digital-transformation-concept-system-engineering-binary-code-programming.jpg?b=1&s=612x612&w=0&k=20&c=5S5LGG4cZl8DE3T-kD5ZYQRZMntgYg4E2IQAB-VJjqg=" alt="Image">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="section-header text-left">
                                <p>Welcome to Odumare Tech</p>
                            </div>
                            <div class="about-text">
                                <p>
								We are not just another tech company; we are your dedicated ally on the path to excellence. We go beyond theoretical concepts. We believe in the power of practical application, which is why we provide you with hands-on projects and real-world case studies. Your journey with us culminates in a prestigious certification that validates your comprehensive skills and expertise.
                                </p>
                                <p>
								We understand that practical experience is invaluable, which is why we offer you the unique opportunity to join our exclusive Research and Innovation department and acquire the practical skills necessary to flourish in your domain. Even after you complete our program, our commitment to your success remains unwavering. We offer ongoing drop-in sessions where our team provides guidance, interview tips, and valuable insights, maximizing your chances of securing your first job in the competitive tech market.
                                </p>
                                <a class="btn" href="{{route('course')}}">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About End -->

            <!-- Mission and Vision Statements -->
            <div class="feature" class="mt-8" style="margin-top:100px;">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-8">
                            <div class="mission-text">
                                <h3>Our Mission</h3>

                                <p>Our mission is to empower individuals with tech knowledge, skills, and practical experience for personal and professional growth. Through a supportive and innovative learning approach, we strive to level the playing field, providing equitable opportunities for all to learn, develop, and flourish.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-8">
                            <div class="mission-text">
                                <h3>Our Vision</h3>

                                <p>Our vision is to build a compassionate world where everyone is free to pursue their passions, live fulfilling lives, and reach their full potential. We want to see everyone have equitable access to education, training, and practical experience in the society.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-8">
                            <div class="mission-text">
                                <h3>Our Values</h3>

                                <p>Empowerment, Compassion, Innovation, Collaboration, Excellence and Inclusivity, Diversity, Creativity, Passion, Continuous improvement.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mission and Vision Statements -->

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

@endsection
