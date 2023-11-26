@extends('frontend.app')
@section('title')
Forgot Password
@endsection
@section('content')

            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Password Reset</h2>
                        </div>
                        <div class="col-12">
                            <a href="{{route('home')}}">Home</a>
                            <a href="#!">Password Reset</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Start -->
            <div class="contact">
                <div class="container">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-info">
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-form">
                                <div id="success">@if(session('status'))
                                    <div class="mb-4 text-green-500">
                                        <span style="color:green; font-weight:bold;">{{ session('status') }}</span>
                                    </div>
                                @endif
                                </div>
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="control-group">
                                        <input type="text" class="form-control" name="email" placeholder="Enter Your Email" value="{{ old('email') }}" />
                                        <p class="help-block text-danger"></p>
                                        @if ($errors->has('password_confirmation'))
                                        <div class="mt-2 text-danger">
                                            @foreach ($errors->get('password_confirmation') as $error)
                                            <span>{{ $error }}</span><br>
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>
                                    
                                    <div>
                                        <button class="btn" type="submit" id="sendMessageButton">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact End -->

@endsection