@extends('frontend.app')
@section('title')
Contact Us
@endsection
@section('content')

			<div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Contact</h2>
                        </div>
                        <div class="col-12">
                            <a style="color: #fff;" href="index.html">Home</a>
                            <a style="color: #fff" href="#">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Start -->
            <div style="margin-top: -50px;" class="contact ">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Get In Touch</p>
                        <h2>For Any Question</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6" style="background: url('https://www.carmeuse.com/sites/default/files/styles/facebook_share/public/2020-02/contact%20us.png?itok=xPq2DVbi'); background-repeat: no-repeat; background-size: cover;">
                            <div class="contact-info">
                                <div class="contact-item">
                                    <i class="flaticon-call"></i>
                                    <div class="contact-text">
                                        <h2>Phone</h2>
                                        <p>+447784927399</p>
                                    </div>
                                </div>
                                <div class="contact-item">
                                    <i class="flaticon-send-mail"></i>
                                    <div class="contact-text">
                                        <h2>Email</h2>
                                        <p>contact@odumaretech.com</p>
                                    </div>
                                </div>
                                <div class="contact-item">
                                    <div class="contact-text">
                                        <p>Follow Us</p>
                                    </div>
                                    <div class="h-100 d-inline-flex align-items-center socials contact-socials">
                                        <a class="btn btn-sm-square bg-white text-primary me-1" href="https://www.facebook.com/profile.php?id=100094441748614"><i class="fab fa-facebook-f"></i></a>
                                        <!-- <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-twitter"></i></a> -->
                                        <a class="btn btn-sm-square bg-white text-primary me-1" href="https://www.linkedin.com/company/odumaretech/"><i class="fab fa-linkedin-in"></i></a>
                                        <a class="btn btn-sm-square bg-white text-primary me-0" href="https://www.instagram.com/odumaretech/"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-form">
                                <!-- <div id="success"></div> -->
                                <form  method="post" action="{{route('contact.save')}}">
                                    @csrf
                                    <div class="control-group">
                                        <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Your Name"  />
                                        <p class="help-block text-danger"></p>
                                        <span style="color:red; font-weight:bold;">
                                    @error('name')
                                    {{$message}}
                                    @enderror
                                    </span>

                                    </div>
                                    <div class="control-group">
                                        <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Your Email" />
                                        <p class="help-block text-danger"></p>
                                        <span style="color:red; font-weight:bold;">
                                    @error('email')
                                    {{$message}}
                                    @enderror
                                    </span>

                                    </div>
                                    <div class="control-group">
                                        <input type="number" class="form-control" name="phone" value="{{old('phone')}}"  placeholder="Your Phone Number"/>
                                        <p class="help-block text-danger"></p>
                                        <span style="color:red; font-weight:bold;">
                                    @error('phone')
                                    {{$message}}
                                    @enderror
                                    </span>

                                    </div>
                                    <div class="control-group">
                                        <input type="text" class="form-control" name="subject" value="{{old('subject')}}" placeholder="Subject"   />
                                        <p class="help-block text-danger"></p>
                                        <span style="color:red; font-weight:bold;">
                                    @error('subject')
                                    {{$message}}
                                    @enderror
                                    </span>

                                    </div>
                                    <div class="control-group">
                                        <textarea class="form-control" name="message" placeholder="Message" >{{old('message')}}</textarea>
                                        <p class="help-block text-danger"></p>
                                        <span style="color:red; font-weight:bold;">
                                    @error('message')
                                    {{$message}}
                                    @enderror
                                    </span>

                                    </div>
                                    <div>
                                        <button class="btn" type="submit" >Send Message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact End -->

@endsection
