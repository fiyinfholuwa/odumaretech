@extends('frontend.app')

@section('title')
Blog 
@endsection

@section('content')
	<!-- Portfolio Start -->
			<div class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Our  Blog Posts</h2>
                        </div>
                        <div class="col-12">
                            <a href="{{route('home')}}">Home</a>
                            <a href="#!">Blog</a>
                        </div>
                    </div>
                </div>
            </div>

				 <!-- Blog Start -->
                 <div class="blog">
                <div class="container">
                    
                    <div class="row">
                        @if(count($posts) > 0)
						@foreach($posts as $post)
                        <div class="col-lg-4 col-md-6">
                            <div class="blog-item">
                                <div class="blog-img">
                                    <img src="{{asset($post->image)}}" alt="Image">
                                </div>
                                <div class="blog-title">
                                    <h3>{{$post->title}}</h3>
                                    <a class="btn" href="{{$post->link}}"> ></a>
                                </div>
                                <div class="blog-meta">
                                    <p>By<a href="">Admin</a></p>
                                </div>
                                <div class="blog-text">
                                    <p>
                                    {{ Str::limit($post->desc, 15) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach

						@else
						<div>
							<h5 class="text-danger text-center">Blog Post yet</h5>
						</div>

						@endif
                    </div>
                    {{$posts->links('frontend.paginate')}}
                </div>
            </div>
            <!-- Blog End -->

            
@endsection