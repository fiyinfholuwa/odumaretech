@extends('frontend.app')

@section('title')
Research and Innovation
@endsection

@section('content')
	<!-- Portfolio Start -->
			<div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Innovation</h2>
                        </div>
                        <div class="col-12">
                            <a href="{{route('home')}}">Home</a>
                            <a href="#!">Innovation</a>
                        </div>
                    </div>
                </div>
            </div>


    <!-- Single Course Start-->
    <div class="single">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-content">
                        <img src="{{asset($innovation->image)}}" />
                        @if($innovation->status == 'Upcoming')
                        <div class="sidebar-widget">
                            <h2 class="widget-title">Project Breakdown</h2>
                            <div class="basic-info">
                                <ul style="padding-left: 20px;">
                                    <li><strong>Start Date:</strong>{{\Carbon\Carbon::parse($innovation->start_date)->isoFormat('Do MMMM YYYY')}}</li>
                                    <li><strong>End Date</strong> {{\Carbon\Carbon::parse($innovation->end_date)->isoFormat('Do MMMM YYYY')}}</li>
                                    <li><strong>Duration:</strong> {{$innovation->duration}} Weeks</li>
                                </ul>
                            </div>
                        </div>
                        @endif
                        <h2>Project Description</h2>
                        <p>
                            {{$innovation->description}}
                        </p>

                        @if($innovation->status == 'Upcoming')
                        <h2>Requirements</h2>
                        <p>
                            {{$innovation->requirement}}
                        </p>
                        @endif
                    </div>

                </div>



                <div class="col-lg-4">
                    <div class="sidebar">
                        @if($innovation->status == 'Completed')
                        <div class="cards">
                            <a href="#">
                                <a href="{{$innovation->github}}" class="cta-btn" type="submit" id="sendMessageButton">Github Link</a>
                            </a>

                            <a href="#">
                                <a href="{{$innovation->link}}" class="cta-btn" type="submit" id="sendMessageButton">Project Website</a>
                            </a>
                        </div>
                        @endif

                        @if($innovation->status == 'Running')
                        <div class="cards">
                            <a href="#">
                                <button class="cta-btn" type="submit" id="sendMessageButton">Github Link</button>
                            </a>
                        </div>
                        @endif

                        @if($innovation->status == 'Upcoming')

                        <div class="contact-form">
                            <div id="success"></div>
                            <form  action="{{route('innovation.apply')}}" method="post" name="sentMessage" id="contactForm" novalidate="novalidate">
                                @csrf
                                <div class="control-group">
                                    <input type="text" name="name" class="form-control" id="firstname" placeholder="Full Name" required="required" data-validation-required-message="Please enter your name" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label> <br>
                                    <select class="form-control" name="gender" id="gender">
                                        <option value="">Select Gender Option</option>
                                        <option value="Male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="prefered not to say">Prefered Not to Say</option>
                                    </select>
                                    <p class="help-block text-danger"></p>
                                </div>

                                <div class="control-group">
                                    <label for="courses">Selected Innovation</label> <br>
                                    <input type="text" name="topic" readonly value="{{$innovation->name}}" class="form-control" id="name" placeholder="Innovation Title" required="required" data-validation-required-message="Please enter your name" />
                                    <p class="help-block text-danger"></p>
                                    <p class="help-block text-danger"></p>
                                </div>

                                <div class="control-group">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                                    <p class="help-block text-danger"></p>
                                </div>

                                <div class="control-group">
                                    <input type="checkbox" required name="checkbox" id="checkbox">
                                    <label style="color:#fff" for="file">Subscribe to our mail list</label>
                                </div>


                                <div class="cards">

                                        <button class="cta-btn" type="submit" id="sendMessageButton">Register to Join</button
                                </div>

                            </form>
                        </div>
                    </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single Post End-->



@endsection
