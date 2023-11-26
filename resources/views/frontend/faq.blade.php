@extends('frontend.app')

@section('title')
FAQ
@endsection
@section('content')

		<div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Frequently Asked Question</h2>
                        </div>
                        <div class="col-12">
                            <a href="{{route('home')}}">Home</a>
                            <a href="#!">Frequently Asked Question</a>
                        </div>
                    </div>
                </div>
            </div>

		
       <!-- FAQs Start -->
	   <div class="faqs">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Frequently Asked Question</p>
                        <h2>You May Ask</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div id="accordion-1">
                                <div class="card ">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseOne">
										What is OdumareTech?
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="collapse" data-parent="#accordion-1">
                                        <div class="card-body">
										OdumareTech is a tech platform that focuses on practical, hands-on learning. Through real-world projects and industry collaboration, we prepare students for their first professional role, equipping them with practical expertise and confidence.
                                        </div>
                                    </div>
                                </div>
                                <div class="card ">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseTwo">
										What are the courses offered by OdumareTech?
                                        </a>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion-1">
                                        <div class="card-body">
										We offer a wide range of courses including but not limited to  Data Science, Data Analytics, and Web development.
                                        </div>
                                    </div>
                                </div>
                                <div class="card ">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseThree">
										What teaching methods or instructional approaches do you employ?
                                        </a>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordion-1">
                                        <div class="card-body">
										At OdumareTech, we employ Lectures and Presentations, Practical Application and Hands-on Projects, Collaborative Learning, Interactive Workshops and Demos, Feedback and Assessments, Guest Speakers and Industry Insights, Online Resources and Learning Materials.
                                        </div>
                                    </div>
                                </div>
                                <div class="card ">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseFour">
										What is the course duration?
                                        </a>
                                    </div>
                                    <div id="collapseFour" class="collapse" data-parent="#accordion-1">
                                        <div class="card-body">
										The course runs for a period of 16 weeks over the weekend.
                                        </div>
                                    </div>
                                </div>
                                <div class="card ">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseFive">
										Having trouble logging in to the learning platform?
                                        </a>
                                    </div>
                                    <div id="collapseFive" class="collapse" data-parent="#accordion-1">
                                        <div class="card-body">
										Kindly send a mail to academy@odumaretech.com for assistance.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="accordion-2">
                                <div class="card ">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseSix">
										What is the cost of the courses?
                                        </a>
                                    </div>
                                    <div id="collapseSix" class="collapse" data-parent="#accordion-2">
                                        <div class="card-body">
										Course cost vary. Kindly have a look at your preference course in the course icon.
                                        </div>
                                    </div>
                                </div>
                                <div class="card ">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseSeven">
										What are the payment options available?
                                        </a>
                                    </div>
                                    <div id="collapseSeven" class="collapse" data-parent="#accordion-2">
                                        <div class="card-body">
										We accept payment in two instalment. You can reach out to finance@odumaretech.com for more details.
                                        </div>
                                    </div>
                                </div>
                                <div class="card ">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseEight">
										Can my employer sponsor or reimburse the cost of the training?
                                        </a>
                                    </div>
                                    <div id="collapseEight" class="collapse" data-parent="#accordion-2">
                                        <div class="card-body">
										Yes, we can provide you with evidence of payment that can be presented to your sponsor.
                                        </div>
                                    </div>
                                </div>
                                <div class="card ">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseNine">
										Can I get a refund if I change my mind?
                                        </a>
                                    </div>
                                    <div id="collapseNine" class="collapse" data-parent="#accordion-2">
                                        <div class="card-body">
										The policy varies, kindly check the refund policy icon or send details to finance@odumaretech.com for details.
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="card ">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseTen">
                                            Lorem ipsum dolor sit amet?
                                        </a>
                                    </div>
                                    <div id="collapseTen" class="collapse" data-parent="#accordion-2">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non.
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FAQs End -->

@endsection