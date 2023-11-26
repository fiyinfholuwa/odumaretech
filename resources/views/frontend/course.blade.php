@extends('frontend.app')
@section('title')
Courses
@endsection
@section('content')
    <!-- Page Header Start -->
            <div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Our Courses</h2>
                        </div>
                        <div class="col-12">
                            <a href="{{route('home')}}">Home</a>
                            <a href="#">Our Courses</a>
                        </div>
                    </div>
                </div>
            </div>

                        <!-- Courses Start-->
            <div class="service">
                <div class="container">
                    <div class="section-header text-center">
        
                        <!-- <h2>We Provide Highly Structured Training and Courses</h2> -->
                    </div>
                    <div class="row portfolio container">

                    @if(count($courses) > 0)
                    @foreach($courses as $course)
                        <div class="col-lg-4 col-md-6 ">
                            <div class="service-item">
                                <div class="service-img">
                                    <img src="{{asset($course->image)}}" alt="Image">
                                    <div class="service-overlay">
                                    <a href="{{route('course.detail', $course->course_url)}}"><p>
										{{ Str::limit($course->description, 15) }}


                                        </p> </a>
                                    </div>
                                </div>
                                <div class="service-text">
                                    <h3>{{$course->title}}</h3>
                                    <a class="btn" href="{{route('course.detail', $course->course_url)}}">></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @else
                    <div><h3 class="text-center text-danger">No Courses Yet<h3></div>
                    @endif
                    </div>
                    {{$courses->links('frontend.paginate')}}
                </div>
            </div>

@endsection