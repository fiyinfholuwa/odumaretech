@extends('instructor.app')

@section('content')

            <div class="row" style="margin:10px">
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Slide</div>
                        </div>
                        <div class="card-body">
                           <form action="{{route('slide.update', $slide->id)}}" method="post" enctype="multipart/form-data">
                               @csrf
                           <div class="form-group">
                                <label for="email2">Slide Title</label>
                                <input type="text" class="form-control" id="email2" value="{{$slide->title}}" required name="title" placeholder="Enter  Slide Title">
                                <small style="color:red; font-weight:500">
                                @error('title')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>
                            <div class="form-group">
                            <label for="email2">Slide Category</label>
                                <select class="form-control" name="course_id" id="validationCustom02"  required>
                                <option disabled selected >Select Slide Category</option>
                                @foreach($courses as $course)
                                <option value="{{$course->id}}"  {{$slide->course_id == $course->id ? "selected" : ""}} >{{$course->title}}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="email2">Cohort Category</label>
                                <select class="form-control" name="cohort_id" id="validationCustom02"  required>
                                <option disabled selected >Select Cohort Category</option>
                                @if(count($cohorts) > 0)
                                @foreach($cohorts as $cohort)
                                <option value="{{$cohort->id}}" {{$cohort->id== $slide->cohort_id ? "selected" : ""}}>{{$cohort->name}}</option>
                                @endforeach
                                @else
                                <option disabled>No Cohort</option>
                                @endif
                                </select>
                            </div>


                            <div>
                            <label for="email2">Slide Status</label>
                                <select class="form-control" name="status" id="validationCustom02"  required>
                                <option disabled selected >Select Slide Status</option>
                                @if($slide->status == "pending")
                                <option value="{{$slide->status}}" selected>Draft</option>
                                @else
                                <option value="{{$slide->status}}" selected>Publish</option>
                                @endif
                                <option value="pending" >Draft</option>
                                <option value="active" >Publish</option>
                                </select>
                            </div>
                            

                            <div class="form-group">
                                <label for="email2">Slide Attachement</label>
                                <input type="file" class="form-control" id="email2"   name="image" >
                                <a target="_blank" class="btn btn-info" href="{{asset($slide->image)}}">View Slide</a>
                                <small style="color:red; font-weight:500">
                                @error('image')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>
                        
                        <div class="card-action">
                            <button class="btn btn-primary">Update Slide</button>
                
                        </div>
                           </form>
                    </div>
                    
                </div>
                
            </div>

@endsection