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

    <div style="margin-top: -100px;" class="about page">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6">
                    <div class="about-img">
                        <img
                            src="https://images.shiksha.com/mediadata/ugcDocuments/images/wordpressImages/2020_05_software-development-i1.jpg"
                            alt="Image">
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <div class="section-header text-left">
                        <p>Empower Your Team for Success
                        </p>
                    </div>
                    <div class="about-text">

                        <p>
                            Unlock the Potential of Corporate Training. Simply fill out the form to delve into advanced
                            enterprise digital training. An Advisor will reach out to discuss your unique training needs
                            and design a bespoke talent solution for your organization.

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog Start -->
    <div style="margin-top: -100px;" class="blog course_movement">
        <div class="container">
            <h3 style="color: #007bff; padding: 10px 0px" class="text-center">Latest Training</h3>
            <div class="row">
                @if(count($courses) > 0)
                    @foreach($courses as $course)
                        <div class="col-lg-4 col-md-6">
                            <div class="blog-item">
                                <div class="blog-img">
                                    <img src="{{asset($course->image)}}" alt="Image">
                                </div>
                                <div class="blog-title">
                                    <h3>{{$course->title}}</h3>
                                    <a class="btn" href="{{route('corporate.training.detail', $course->id)}}"> ></a>
                                </div>
                                <div class="blog-meta">
                                    <p>By<a href="">Admin</a></p>
                                </div>
                                <div class="blog-text">
                                    <p>
                                        {{ Str::limit($course->description, 30) }}...
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                @else
                    <div>
                        <h5 class="text-danger text-center">No Corporate Training yet</h5>
                    </div>

                @endif
            </div>
            {{$courses->links('frontend.paginate')}}
        </div>
    </div>
    <!-- Blog End -->

    <style>
        @media (max-width: 425px) {

            .course_movement {
                margin-top: -250px !important;
                margin-bottom: 0px;
            }
        }

        @media (max-width: 375px) {


        }
    </style>

@endsection
