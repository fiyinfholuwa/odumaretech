@extends('frontend.app')

@section('title')
    Company Training
@endsection

@section('content')

    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Corporate Training</h2>
                </div>
                <div class="col-12">
                    <a style="color: #fff;" href="{{route('home')}}">Home</a>
                    <a style="color: #fff;" href="#">Corporate Training</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Start -->
    <div class="contact">
        <div class="container">
            <div class="row">
                <div   class="col-md-6">
                    <div class="contact-info">
                        <h3 style="color: #fff; padding: 20px 2px">{{$course->title}}</h3>

                        <p style="color: #fff">{!! nl2br(e($course->description_corp)) !!}
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form method="post" action="{{route('corporate.training.add')}}">
                            @csrf
                            <div class="control-group">
                                <input type="text" class="form-control" name="name" placeholder="Company Name"
                                       required="required"
                                       data-validation-required-message="Please enter the company name"/>
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <input type="text" class="form-control" name="email" placeholder="Company Email"
                                       required="required"
                                       data-validation-required-message="Please enter the company's email"/>
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <input type="number" class="form-control" name="phone"
                                       placeholder="Company Phone Number" required="required"
                                       data-validation-required-message="Please enter the company's phone number"/>
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <label for="gender">Level of Career</label> <br>
                                <select name="level">
                                    <option value="Beginner">Beginner</option>
                                    <option value="Intermediate">Intermediate</option>
                                    <option value="Professional">Professional</option>
                                </select>
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group mb-2">

                                <!-- <label>Intrested Course</label> -->
                                <input name="intrested_in" placeholder="Intrested Course" value="{{$course->title}}" readonly
                                       type="text" required=""
                                       class="form-control">

                            </div>


                            <div class="control-group">
                                <input type="text" name="location" class="form-control" id="location"
                                       placeholder="Location" required="required"
                                       data-validation-required-message="Please enter your current location"/>
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <input type="checkbox" name="checkbox" id="checkbox">
                                <label for="file">Subscribe to our mail list</label>
                            </div>

                            <div>
                                <button class="btn" type="submit" id="sendMessageButton">Submit Quota</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

@endsection
