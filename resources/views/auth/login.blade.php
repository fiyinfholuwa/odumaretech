@extends('frontend.app')
@section('title')
Login
@endsection
@section('content')

<div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Login</h2>
                        </div>
                        <div class="col-12">
                            <a href="{{route('home')}}">Home</a>
                            <a href="#">Login</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Start -->
            <div class="contact wow fadeInUp">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Don't have an account? 
                            <a href="{{route('register')}}">Create on here</a>
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-info">
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-form">
                                <div id="success"></div>
                                <form action="{{route('login')}}" method="post" id="contactForm"  novalidate="novalidate">
                                    @csrf
                                    <div class="control-group">
                                        <input type="text" class="form-control" id="email" value="{{old('email')}}" placeholder="Email" name="email" data-validation-required-message="Please enter your name" />
                                        <p class="help-block text-danger"></p>
                                        <span style="color:red; font-weight:bold;">
                                    @error('email')
                                    {{$message}}
                                    @enderror
                                    </span>

                                    </div>

                                    <div class="control-group">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Your Password"  data-validation-required-message="Please enter your password" />
                                        <p class="help-block text-danger"></p>
                                        <span style="color:red; font-weight:bold;">
                                    @error('password')
                                    {{$message}}
                                    @enderror
                                    </span>

                                    </div>
                                    
                                    <div class="reme">
                                        <div class="control-group">
                                            <input name="remember" type="checkbox" name="checkbox" id="checkbox">
                                            <label for="file">Remember me</label>
                                        </div>
                                        <div class="forget">
                                            <a href="{{ route('password.request') }}">Forgot Password?</a>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <button class="btn" type="submit" id="sendMessageButton">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact End -->

@endsection