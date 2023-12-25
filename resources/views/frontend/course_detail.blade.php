@extends('frontend.app')

@section('content')
	<!-- Page Header Start -->
	<div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Course Details</h2>
                        </div>
                        <div class="col-12">
                            <a href="{{route('home')}}">Home</a>
                            <a href="#">{{$course->title}}</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Course Start-->
            <div class="single">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="single-content wow fadeInUp">
                                <img src="{{asset($course->image)}}" />
                                <div class="sidebar-widget wow fadeInUp">
                                    <h2 class="widget-title">Course Breakdown</h2>
                                    <div class="basic-info card">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><strong>Start Date:</strong> <i class="fas fa-calendar-alt"></i>{{ date('Y-m-d', strtotime($course->start_date)) }}
</li>
                                            <li class="list-group-item"><strong>Cohort:</strong> <i class="fas fa-users"></i>
                                            @if($cohort_name != NULL)
                                            {{$cohort_name->name}}
                                            @else
                                            Not Available
                                            @endif
                                        </li>
                                            <li class="list-group-item"><strong>Schedules:</strong> <i class="fas fa-clock"></i> Weekends</li>
                                            <li class="list-group-item"><strong>Duration:</strong> <i class="far fa-clock"></i>	   {{$course->duration}} Weeks</li>
                                            <li class="list-group-item"><strong>Skill Level:</strong> <i class="fas fa-graduation-cap"></i> {{$course->level}}</li>
                                            <li class="list-group-item"><strong>Language:</strong> <i class="fas fa-language"></i> {{$course->language}}</li>
                                        </ul>
                                    </div>
                                </div>

                                <h2>Course Description</h2>
                                <p>
                                    {{$course->description}}
                                </p>

                                <h2>Certification</h2>
                                <p>
                                    {{$course->certification}}
                                </p>

                                <h2>Support</h2>
                                <p>
                                    {{$course->support}}
                                </p>

                                <h2>Experience</h2>
                                <p>
                                    {{$course->experience}}
                                </p>

                            </div>

                        </div>

                        <div class="col-lg-4">
                            <div class="sidebar">

                                <div class="cards">
                                    <div class="cards-header">Payment Information</div>
                                        <div class="payment-details">
                                            <div class="">
                                            @if($course->discount == 0 || $course->discount == null)

                                            @if($check_user_has_coupon)
                                            <label >Full Payment: #{{number_format($course->price - ($course->price * $coupon_check->discount /100),00) }}</label>
                                            @else
                                            <label >Full Payment: #{{$course->price}}</label>
                                            @endif
                                            @else

                                            @if($check_user_has_coupon)
                                            <del>#{{$course->price}}.00</del>
                                            <label >Full Payment: #{{ number_format($course->price - ($course->price * $course->discount/100) - ($course->price * $coupon_check->discount /100) ,00)}}.00 </label>
                                            @else
                                            <del>#{{$course->price}}.00</del>
                                            <label >Full Payment: #{{ number_format($course->price - ($course->price * $course->discount/100),00)}}.00 </label>
                                            @endif


                                            @endif


                                            <div>
                                            <form action="{{route('pay')}}" method="post">
										@csrf
									<h4>Choose Payment Gateway</h4>
									<label>Local</label>
									<input type="radio" value="paystack" name="payment" required/> </br>
                                                <label>International</label>
									<input type="radio"  value="stripe" name="payment"/> </br>


									<h4>Payment Type</h4>
									<label>Full Payment </br> (Enjoy Discount and Coupon)</label>
									<input type="radio" value="full" name="payment_type" required/> </br>
									<label>Installment (40% of the Actual Cost, then pay remaining later.)</label>
									<input type="radio"  value="first installment" name="payment_type"/> </br>


									<input type="hidden" name="course_id" value="{{$course->id}}"/>
									<input type="hidden" name="cohort_id" value="{{$cohort_name != NULL ? $cohort_name->id : 1 }}"/>
									@if(Auth::check())
									<input type="hidden" name="user_email" value="{{Auth::user()->email}}"/>
									@if($course->discount == 0 || $course->discount == null)
									@if($check_user_has_coupon)
									<input type="hidden" name="amount" value="{{$course->price - ($course->price * $coupon_check->discount /100)}}"/>
									@else
									<input type="hidden" name="amount" value="{{$course->price}}"/>
									@endif

									@else
									@if($check_user_has_coupon)
									<input type="hidden" name="amount" value="{{$course->price - ($course->price * $course->discount/100) - ($course->price * $coupon_check->discount /100)}}"/>
									@else
									<input type="hidden" name="amount" value="{{$course->price - ($course->price * $course->discount/100)}}"/>
									@endif

									@endif

									@if($has_pending)
									<button id="myBtn" type="button"  class="btn cta-btn radius-xl text-uppercase">You Already Registered for a course.</button>
									@else
									<button id="myBtn" type="submit"  class="btn  cta-btn radius-xl text-uppercase">Enroll</button>
									@endif
									@else
									<a href="{{route('login')}}" class="btn cta-btn  radius-xl text-uppercase">Enroll</a>
									@endif
									</form>



                                    </br>
                                    </br>
                                    @if($coupon_check != null)
								<form method ="post" action="{{route('coupon.validate')}}">
									@csrf
										<div class="row mt-4">
											<div class="col-12">
												<input name="code" type="text" placeholder="Enter Coupon" class="form-control" />
												<input type="hidden" name="coupon_id" value="{{$coupon_check->id}}" placeholder="Enter Coupon" class="form-control" />
												<input type="hidden" name="course_id" value="{{$course->id}}" placeholder="Enter Coupon" class="form-control" />
											</div>
											<div class="col-12">
												@if(Auth::check())

												<input type="submit" class="btn btn-danger cta-btn btn-sm" value="Apply Coupon" />
												@else
												<a href="{{route('login')}}" class="btn btn-info cta-btns btn-sm">Apply Coupon</a>
												@endif
											</div>
										</div>
									</form>

								@endif

                                </div>


                                                <!-- <label for="fullPayment">Full Payment: #120,000.00</label><br> -->
                                                <!-- <input type="radio" id="fullPayment" name="payment" value="full">
                                            </div>
                                            <div class="flex-cards">
                                                <label for="installmentPayment">Installment (40% of the Actual Cost)</label><br>
                                                <input type="radio" id="installmentPayment" name="payment" value="installment">

                                            </div>
                                        </div> -->
                                    <!-- <button class="cta-btn" type="submit" id="sendMessageButton">Enroll Now</button> -->
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
