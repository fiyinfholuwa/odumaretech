@extends('frontend.app')

@section('title')
Search: {{$searchTerm}}
@endsection

@section('content')
<div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(https://img.freepik.com/free-vector/abstract-technology-particle-background_52683-25766.jpg?w=740&t=st=1689522194~exp=1689522794~hmac=3ef985596ecd568c61237b819557c75dc2241c4a93c5c675d8d8bbe88e942641);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Search: {{$searchTerm}}</h1>
				 </div>
            </div>
        </div>
        <!-- inner page banner END -->
		<div class="content-block">
            <!-- About Us -->
			<div class="section-area section-sp1">
                <div class="container">
					 <div class="row">
						<div class="col-lg-3 col-md-4 col-sm-12 m-b30">
							<div class="widget courses-search-bx placeani">
								<!-- <div class="form-group">
									<div class="input-group">
										<label>Search Courses</label>
										<input name="dzName" type="text" required class="form-control">
									</div>
								</div> -->
							</div>
							<div class="widget widget_archive">
                                <h5 class="widget-title style-1">All Categories</h5>
                                <ul>
                                @if(count($categories) > 0)
                                @foreach($categories as $category)
                                <li> <a href="{{route('course.category', $category->category_url)}}"><i class="fas fa-mark"></i> {{$category->name}}</a> </li>
                                @endforeach
                                @else
                                @endif

                                </ul>
                            </div>

							<div class="widget recent-posts-entry widget-courses">
                                <h5 class="widget-title style-1">Popular Courses</h5>
                                <div class="widget-post-bx">
                                    @if(count($courses) > 0)
                                    @foreach($courses as $course)
                                    <div class="widget-post clearfix">
                                        <div class="ttr-post-media"> <img src="{{asset($course->image)}}" width="200" height="143" alt=""> </div>
                                        <div class="ttr-post-info">
                                            <div class="ttr-post-header">
                                                <h6 class="post-title"><a href="{{route('course.detail', $course->course_url)}}">{{$course->title}}</a></h6>
                                            </div>
                                            <div class="ttr-post-meta">
                                                <!-- <ul>
                                                    <li class="price">
														<del>$190</del>
														<h5>$120</h5>
													</li>
                                                    <li class="review">03 Review</li>
                                                </ul> -->
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    @endif
                                </div>
                            </div>
						</div>
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="row">
                                @if(count($courses) > 0)
                                @foreach($courses as $course)
								<div class="col-md-6 col-lg-6 col-sm-6 m-b30">
									<div class="cours-bx">
										<div class="action-box">
											<img style="" src="{{asset($course->image)}}" alt="">
											<a href="{{route('course.detail', $course->course_url)}}" class="btn">View Course</a>
										</div>
										<div class="info-bx text-center">
											<h5><a href="{{route('course.detail', $course->course_url)}}">{{$course->title}}</a></h5>
											<span><i class="fa fa-tag text-info"></i>  {{$course->cat->name}}</span>
										</div>
										<div class="cours-more-info">
											
										</div>
									</div>
								</div>
                                @endforeach
								@else
                                <div><h3 class="text-center text-danger">No result found.<h3></div>
                                @endif
								<div class="col-lg-12 m-b20">
									<div class="pagination-bx rounded-sm  clearfix">
                                    {{$courses->links('frontend.paginate')}}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
		<!-- contact area END -->
		
    </div>

@endsection