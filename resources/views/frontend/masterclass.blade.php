@extends('frontend.app')
@section('title')
Master Class
@endsection
@section('content')

<div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Join Our Free Masterclass</h2>
                        </div>
                        <div class="col-12">
                            <a style="color: #fff;" href="{{route('home')}}">Home</a>
                            <a style="color: #fff" href="#!">Join Masterclass</a>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Contact Start -->
            <div class="contact">
                <div class="container">
                    <div class="row">
                        <div id="image_top" class="col-md-6" style="background-image: url('https://images.unsplash.com/photo-1528901166007-3784c7dd3653?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8Ym9vdGNhbXB8ZW58MHx8MHx8fDA%3D'); background-size: cover; background-repeat: no-repeat;" >
                            <div class="contact-info">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-form">
                                <h3 style="padding: 20px 2px; color: navy;">Empower Your Skills with Expert Insight</h3>
                                <p style="color:navy;">Join Our Exclusive Free Masterclass Series – Your Gateway to Professional Knowledge. Seize the Opportunity to Learn Directly from Industry Experts. Reserve Your Spot Now!
                                </p>

                                <div id="success"></div>
                                <form method="post" action="{{route('masterclass.add')}}">
                                    @csrf
                                    <div class="control-group">
                                        <input type="text" class="form-control" name="first_name" id="firstname" placeholder="First Name" required="required" data-validation-required-message="Please enter your name" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group">
                                        <input type="text" class="form-control" name="last_name" id="name" placeholder="Last Name" required="required" data-validation-required-message="Please enter your name" />
                                        <p class="help-block text-danger"></p>
                                    </div>

                                    <div class="control-group">
                                        <input type="interested-skill" name="intrested_in" class="form-control" id="interested-skill" placeholder="interested Skill" required="required" data-validation-required-message="Please enter interested skill" />
                                        <p class="help-block text-danger"></p>
                                    </div>

                                    <div class="control-group">
                                        <input type="number" name="phone" class="form-control" id="" placeholder="Phone Number" required="required" data-validation-required-message="Please enter Phone Number" />
                                        <p class="help-block text-danger"></p>
                                    </div>


                                    <div class="control-group">
                                        <label for="gender">Gender</label> <br>
                                        <select name="gender" id="gender">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="prefered not to say">Prefered Not to Say</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>

                                    <div class="control-group">
                                        <label for="gender">Level of Career</label> <br>
                                        <select name="career">
                                            <option value="Beginner">Beginner</option>
                                            <option value="Intermediate">Intermediate</option>
                                            <option value="Professional">Professional</option>
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>

                                    <div class="control-group">
                                        <input type="text" name="location" class="form-control" id="location" placeholder="Location" required="required" data-validation-required-message="Please enter your current location" />
                                        <p class="help-block text-danger"></p>
                                    </div>

                                    <div class="control-group">
                                        <input type="email" class="form-control" name="email" placeholder="Your Email Address" required="required" data-validation-required-message="Please enter your email" />
                                        <p class="help-block text-danger"></p>
                                    </div>

                                    <!-- <div class="control-group">
                                        <input type="number" class="form-control" id="phone number" placeholder="Your Phone Number" required="required" data-validation-required-message="Please enter your phone number" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                     -->
                                    <div class="control-group">
                                        <input required type="checkbox" name="checkbox" id="checkbox">
                                        <label for="file">Subscribe to our mail list</label>
                                    </div>

                                    <div>
                                        <button class="btn" type="submit" id="sendMessageButton">Join</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact End -->
<style>
    @media (max-width: 425px){
        #image_top{
            height: 300px;
            margin-top: -50px;
        }
    }
</style>


@endsection
