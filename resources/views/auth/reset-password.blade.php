@extends('frontend.app')
@section('title')
Contact Us
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
                                
                                <form method="POST" action="{{ route('password.store') }}">
                                    @csrf
                                    <div class="control-group">
                                        <input class="form-control" type="hidden" name="email" value="{{ old('email', $request->email) }}" />
                                        <p class="help-block text-danger"></p>
                                        @if ($errors->has('email'))
                                        <div class="mt-2 text-danger">
                                            @foreach ($errors->get('email') as $error)
                                            <span style="color:red;">{{ $error }}</span><br>
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>


                                    <div class="control-group">
                                        <input class="form-control"  type="password" name="password" placeholder="Enter Password" name="email" />
                                        <p class="help-block text-danger"></p>
                                        @if ($errors->has('password'))
                                        <div class="mt-2 text-danger">
                                            @foreach ($errors->get('password') as $error)
                                            <span>{{ $error }}</span><br>
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>
                                    
                                    <div class="control-group">
                                        <input class="form-control"  type="password" name="password_confirmation" placeholder="Enter Confirmation Password" name="email" />
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