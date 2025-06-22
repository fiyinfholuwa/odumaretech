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
    <div style="margin-top: -100px;" class="single">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-content">
                        <img src="{{asset($course->image)}}"/>
                        <div class="sidebar-widget wow fadeInUp">
                            <h2 class="widget-title">Course Breakdown</h2>
                            <div class="basic-info card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Start Date:</strong> <i
                                            class="fas fa-calendar-alt"></i>{{ date('Y-m-d', strtotime($course->start_date)) }}
                                    </li>
                                    <li class="list-group-item"><strong>Cohort:</strong> <i class="fas fa-users"></i>
                                        @if($cohort_name != NULL)
                                            {{$cohort_name->name}}
                                        @else
                                            Not Available
                                        @endif
                                    </li>
                                    <li class="list-group-item"><strong>Schedules:</strong> <i class="fas fa-clock"></i>
                                        Weekends
                                    </li>
                                    <li class="list-group-item"><strong>Duration:</strong> <i
                                            class="far fa-clock"></i> {{$course->duration}} Weeks
                                    </li>
                                    <li class="list-group-item"><strong>Skill Level:</strong> <i
                                            class="fas fa-graduation-cap"></i> {{$course->level}}</li>
                                    <li class="list-group-item"><strong>Language:</strong> <i
                                            class="fas fa-language"></i> {{$course->language}}</li>
                                </ul>
                            </div>
                        </div>

                        <h2>Course Description</h2>
                        <p>
                            {!! nl2br(e($course->description)) !!}

                        </p>

                        <h2>Certification</h2>
                        <p>
                            {!! nl2br(e($course->certification)) !!}

                        </p>

                        <h2>Support</h2>
                        <p>
                            {!! nl2br(e($course->support)) !!}

                        </p>

                        <h2>Experience</h2>
                        <p>
                            {!! nl2br(e($course->experience)) !!}
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
                                            <label>Full Payment:
                                                #{{number_format($course->price - ($course->price * $coupon_check->discount /100),00) }}</label>
                                        @else
                                            <label>Full Payment: #{{$course->price}}</label>
                                        @endif
                                    @else

                                        @if($check_user_has_coupon)
                                            <del>#{{$course->price}}.00</del>
                                            <label>Full Payment:
                                                #{{ number_format($course->price - ($course->price * $course->discount/100) - ($course->price * $coupon_check->discount /100) ,00)}}
                                                .00 </label>
                                        @else
                                            <del>#{{$course->price}}.00</del>
                                            <label>Full Payment:
                                                #{{ number_format($course->price - ($course->price * $course->discount/100),00)}}
                                                .00 </label>
                                        @endif

                                    @endif


                                    <div>
                                        <form action="{{route('pay')}}" method="post">
                                            @csrf
                                            <h4></h4>
                                            <label>Choose Payment Gateway</label>
                                            <select name="payment" required class="form-control" id="paymentSelect">
                                                <option value="">Select Payment option</option>
                                                <option value="paystack">Naira Payment (#)</option>
                                                <option value="stripe">International Payment</option>
                                                <option value="bank_transfer">International Bank Transfer</option>
                                            </select>

                                            <br>

                                            <div id="bankTransferFields" style="display: none;">
                                                <span style="padding: 10px; font-weight: bolder;" class="card">Account holder: ODUMARETECH LTD <br/>
                                                    Account number: 57675753 <br/>
                                                    Sort code: 041450 <br/>
                                                    BIC: SUPAGB21XXX <br/>
                                                    Institution: SumUp Payments Limited</span>

                                                @php
                                                $dollar_details = \App\Models\DollarRate::first();
                                                $dollar_rate = ($course->price - ($course->price * $course->discount/100)) / $dollar_details->price;

                                                $partial_payment = ($course->price/  $dollar_details->price) * 0.4;
                                                 @endphp
                                                <span class="card" style="background: #4d7cfe; padding: 20px;">
                                                    <h6>Full Payment: &#163;{{number_format($dollar_rate, 2)}}</h6>
                                                    <h6>Partial Payment(40%): &#163;{{number_format($partial_payment, 2)}} </h6>
                                                </span>
                                                <div class="mt-1">
                                                    <label>Amount Sent</label>
                                                    <input class="form-control" name="amount_sent" type="text" id="amountSent" placeholder="Amount Sent">
                                                </div>

                                                <div class="mt-1">
                                                    <label>Bank Name</label>
                                                    <input class="form-control" name="bank_name" type="text" id="bankName" placeholder="Bank Name">
                                                </div>
                                                <div class="mt-1">
                                                    <label>Account Name</label>
                                                    <input class="form-control" name="account_name" type="text" id="accountName" placeholder="Account Name">
                                                </div>

                                            </div>


                                            <label>Choose Payment Type</label>
                                            <select name="payment_type" class="form-control" required>
                                                <option value="">Select payment type</option>
                                                <option value="full">Full Payment</option>
                                                <option value="first installment">Installment 40% of the Actual Cost
                                                </option>
                                            </select>

                                            <input type="hidden" name="course_id" value="{{$course->id}}"/>
                                            <input type="hidden" name="cohort_id"
                                                   value="{{$cohort_name != NULL ? $cohort_name->id : 1 }}"/>
                                            @if(Auth::check())
                                                <input type="hidden" name="user_email" value="{{Auth::user()->email}}"/>
                                                @if($course->discount == 0 || $course->discount == null)
                                                    @if($check_user_has_coupon)
                                                        <input type="hidden" name="amount"
                                                               value="{{$course->price - ($course->price * $coupon_check->discount /100)}}"/>
                                                    @else
                                                        <input type="hidden" name="amount" value="{{$course->price}}"/>
                                                    @endif

                                                @else
                                                    @if($check_user_has_coupon)
                                                        <input type="hidden" name="amount"
                                                               value="{{$course->price - ($course->price * $course->discount/100) - ($course->price * $coupon_check->discount /100)}}"/>
                                                    @else
                                                        <input type="hidden" name="amount"
                                                               value="{{$course->price - ($course->price * $course->discount/100)}}"/>
                                                    @endif

                                                @endif

                                                @if($has_pending)
                                                    <button id="myBtn" type="button"
                                                            class="btn cta-btn radius-xl text-uppercase">You Already
                                                        Registered for a course.
                                                    </button>
                                                @else
                                                    <button id="myBtn" type="submit"
                                                            class="btn  cta-btn radius-xl text-uppercase">Enroll
                                                    </button>
                                                @endif
                                            @else
                                                <a href="{{route('login')}}"
                                                   class="btn cta-btn  radius-xl text-uppercase">Enroll</a>
                                            @endif
                                        </form>


                                        </br>
                                        </br>
                                        @if($coupon_check != null)
                                            <form method="post" action="{{route('coupon.validate')}}">
                                                @csrf
                                                <div class="row mt-4">
                                                    <div class="col-12">
                                                        <input name="code" type="text" placeholder="Enter Coupon"
                                                               class="form-control"/>
                                                        <input type="hidden" name="coupon_id"
                                                               value="{{$coupon_check->id}}" placeholder="Enter Coupon"
                                                               class="form-control"/>
                                                        <input type="hidden" name="course_id" value="{{$course->id}}"
                                                               placeholder="Enter Coupon" class="form-control"/>
                                                    </div>
                                                    <div class="col-12">
                                                        @if(Auth::check())

                                                            <input type="submit" class="btn btn-danger cta-btn btn-sm"
                                                                   value="Apply Coupon"/>
                                                        @else
                                                            <a href="{{route('login')}}"
                                                               class="btn btn-info cta-btns btn-sm">Apply Coupon</a>
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

    <script>
        document.getElementById("paymentSelect").addEventListener("change", function() {
            var paymentMethod = this.value;
            var bankTransferFields = document.getElementById("bankTransferFields");

            if (paymentMethod === "bank_transfer") {
                bankTransferFields.style.display = "block";
            } else {
                bankTransferFields.style.display = "none";
            }
        });
    </script>

@endsection
