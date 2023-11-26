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
                            <a href="{{route('home')}}">Home</a>
                            <a href="#!">Innovation</a>
                        </div>
                    </div>
                </div>
            </div>

				<div class="portfolio">
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
                                        <p>
										<a style="text-decoration:none;" target="_blank" href="{{$innovation->github}}" class="btn-link btn btn-danger">Github Link <i class="fab fa-github"></i></a>
                                        </p>
                                    </div>
                                </div>
                                <div class="portfolio-text">
                                    <h3>{{$innovation->name}}</h3>
                                    <a class="btn" href="{{$innovation->link}}"  ><i class="fa fa-globe"></i></a>
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