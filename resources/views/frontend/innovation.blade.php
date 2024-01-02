@extends('frontend.app')

@section('title')
Research and Innovation
@endsection

@section('content')
	<!-- Portfolio Start -->
			<div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Innovation</h2>
                        </div>
                        <div class="col-12">
                            <a style="color: #fff;" href="{{route('home')}}">Home</a>
                            <a style="color: #fff;" href="#!">Innovation</a>
                        </div>
                    </div>
                </div>
            </div>


                <div style="margin-top: -100px;" class="about page">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6">
                    <div class="about-img">
                        <img src="https://ood-jrshittu.vercel.app/img/img/pexels-cottonbro-studio-6804073.jpg" alt="Image">
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <div class="section-header text-left">
                        <p>Exploring Tomorrow's Innovations
                        </p>
                    </div>
                    <div class="about-text">

                        <p>
                            Dive into our cutting-edge research at OdumareTech. Curiosity knows no bounds, and neither do we. Are you passionate about shaping the future? Join us in our pursuit of knowledge. Express your interest by filling out the form, or explore our ongoing and completed research projects.

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
				<div style="margin-top: -100px;" class="portfolio">
                <div class="container">
                    <div class="section-header text-center">
                        <!-- <h2>Check Projects</h2> -->
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul id="portfolio-flters">
                                <li data-filter="*" class="filter-active">All</li>
                                <li data-filter=".Completed">Completed</li>
                                <li data-filter=".Running">Running</li>
                                <li data-filter=".Upcoming">Upcoming</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row portfolio-container">
						@if(count($innovations) > 0)
						@foreach($innovations as $innovation)
                        <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item {{$innovation->status}} wow fadeInUp" data-wow-delay="0.3s">
                            <div class="portfolio-warp">
                                <div class="portfolio-img">
                                    <img src="{{asset($innovation->image)}}" alt="Image">
                                    <div class="portfolio-overlay">
                                        <p>{{ Str::limit($innovation->description, 40) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="portfolio-text">
                                    <h3>{{$innovation->name}}</h3>
                                    <a class="btn" href="{{route('innovation.detail', $innovation->id)}}"  > > </a>
                                </div>
                            </div>
                        </div>
						@endforeach

						@else
						<div>
							<h5 class="text-danger text-center">No Research and Innovation yet</h5>
						</div>

						@endif

                    </div>
                    {{$innovations->links('frontend.paginate')}}
                </div>
            </div>

@endsection
