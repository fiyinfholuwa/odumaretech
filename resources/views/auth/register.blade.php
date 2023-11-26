@extends('frontend.app')
@section('title')
Contact Us
@endsection
@section('content')

<div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Register</h2>
                        </div>
                        <div class="col-12">
                            <a href="index.html">Home</a>
                            <a href="#">Register</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Start -->
            <div class="contact ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-info">
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-form">
                                <div id="success"></div>
                                <form method="post" action="{{route('register')}}" >
                                    @csrf
                                    <div class="control-group">
                                        <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{old('first_name')}}" data-validation-required-message="Please enter your name" />
                                        <p class="help-block text-danger"></p>
                                        <span style="color:red; font-weight:bold;">
                                    @error('first_name')
                                    {{$message}}
                                    @enderror
                                    </span>
                                    </div>
                                    <div class="control-group">
                                        <input type="text" class="form-control" name="last_name"  placeholder="Last Name"  value="{{old('last_name')}}" data-validation-required-message="Please enter your name" />
                                        <p class="help-block text-danger"></p>
                                        <span style="color:red; font-weight:bold;">
                                    @error('last_name')
                                    {{$message}}
                                    @enderror
                                    </span>
                                    </div>

                                    <div class="control-group">
                                        <input type="email" class="form-control" name="email" placeholder="Your Email Address"  data-validation-required-message="Please enter your email" />
                                        <p class="help-block text-danger"></p>
                                        <span style="color:red; font-weight:bold;">
                                    @error('email')
                                    {{$message}}
                                    @enderror
                                    </span>
                                    </div>

                                    <div class="control-group">
                                        <input type="password" class="form-control" name="password" placeholder="Your Password"  data-validation-required-message="Please enter your password" />
                                        <p class="help-block text-danger"></p>
                                        <span style="color:red; font-weight:bold;">
                                    @error('password')
                                    {{$message}}
                                    @enderror
                                    </span>
                                    </div>

                                    <div class="control-group">
                                        <input type="password" class="form-control" name="password_confirmation" placeholder="Retype Password"  data-validation-required-message="Please enter your password" />
                                        <p class="help-block text-danger"></p>
                                        
                                    </div>
                                    
                                    <div class="control-group">
                                        <input required type="checkbox" name="checkbox" id="checkbox">
                                        <label for="file">Subscribe to our mail list</label>
                                    </div>
                                    
                                    <div>
                                        <button class="btn" type="submit" id="sendMessageButton">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact End -->

@endsection