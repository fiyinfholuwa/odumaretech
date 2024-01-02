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

            <div style="margin-top: -100px" class="about page ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6">
                    <div class="about-img">
                        <img src="https://cdn.get.tech/blog/wp-content/uploads/2018/10/content-curation.jpg" alt="Image">
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <div class="section-header text-left">
                        <p>Dive into our blog posts
                        </p>
                    </div>
                    <div class="about-text">

                        <p>
                            Thoughtfully curated by experts to seamlessly guide your learning experience. Read and learn with confidence

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
				 <!-- Blog Start -->
                 <div style="margin-top: -100px" class="blog course_movement">
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


    <style>
        @media (max-width: 425px) {

            .course_movement {
                margin-top: -300px !important;
                margin-bottom: 0px;
            }
        }

        @media (max-width: 375px) {


        }
    </style>

@endsection
