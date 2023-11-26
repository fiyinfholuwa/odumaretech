@extends('frontend.app')

@section('title')
Research and Innovation
@endsection

@section('content')
<div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(https://img.freepik.com/free-vector/abstract-technology-particle-background_52683-25766.jpg?w=740&t=st=1689522194~exp=1689522794~hmac=3ef985596ecd568c61237b819557c75dc2241c4a93c5c675d8d8bbe88e942641);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Our Innovations</h1>
				 </div>
            </div>
        </div>
        <div class="content-block">
			<div class="section-area section-sp1">
				<div class="container">
					<div class="row">
						<!-- left part start -->
						<div class="col-lg-12 col-xl-12 col-md-6">
							<!-- blog grid -->
							<div id="masonry" class="ttr-blog-grid-3 row">
                                @if(count($innovations) > 0)
                                @foreach($innovations as $innovation)
								<div class="post action-card col-xl-4 col-lg-4 col-md-6 col-xs-12 m-b40">
									<div class="recent-news">
										<div class="action-box">
											<img src="{{asset($innovation->image)}}" alt="">
										</div>
										<div class="info-bx">
											<ul class="media-post">
												<li><a href="#"><i class="fa fa-calendar"></i>{{date('d-m-Y', strtotime($innovation->created_at))}}</a></li>
												<li><a href="#"><i class="fa fa-user"></i>By Admin</a></li>
											</ul>
											<h5 class="post-title"><a href="#!">{{$innovation->name}}.</a></h5>
											<!-- <p>Knowing that, you’ve optimised your pages countless amount of times, written tons.</p> -->
											<div class="post-extra">
												<a target="_blank" href="{{$innovation->github}}" class="btn-link btn btn-danger">Github Link <i class="fa fa-github"></i></a>
												<a target="_blank" href="{{$innovation->link}}" class="comments-bx btn btn-primary"><i class="fa fa-globe"></i>visit website </a>
											</div>
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
							<!-- blog grid END -->
							<!-- Pagination -->
							<div class="pagination-bx rounded-sm gray clearfix">

                                    {{$innovations->links('frontend.paginate')}}
									
							<!-- Pagination END -->
						</div>
						<!-- left part END -->
						
					</div>
				</div>
			</div>
        </div>
    </div>

@endsection