@extends('instructor.app')

@section('content')

            <div class="row" style="margin:10px">
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Assignment</div>
                        </div>
                        <div class="card-body">
                           <form action="{{route('assignment.update', $assignment->id)}}" method="post" enctype="multipart/form-data">
                               @csrf
                           <div class="form-group">
                                <label for="email2">Assignment Title</label>
                                <input type="text" class="form-control" id="email2" value="{{$assignment->title}}"  required name="title" placeholder="Enter  Slide Title">
                                <small style="color:red; font-weight:500">
                                @error('title')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>
                            <div class="form-group">
                            <label for="email2">Assignment Category</label>
                                <select class="form-control" name="course_id" id="validationCustom02"  required>
                                <option disabled selected >Select Assignment Category</option>
                                @foreach($courses as $course)
                                <option value="{{$course->id}}" {{$assignment->course_id ==$course->id ? "selected" : ""}} >{{$course->title}}</option>
                                @endforeach
                                </select>
                            </div>
                            

                            <div class="form-group">
                                <label for="email2">Cohort Category</label>
                                <select class="form-control" name="cohort_id" id="validationCustom02"  required>
                                <option disabled selected >Select Cohort Category</option>
                                @if(count($cohorts) > 0)
                                @foreach($cohorts as $cohort)
                                <option value="{{$cohort->id}}" {{$cohort->id== $assignment->cohort_id ? "selected" : ""}}>{{$cohort->name}}</option>
                                @endforeach
                                @else
                                <option disabled>No Cohort</option>
                                @endif
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="email2">Assignment Attachement</label>
                                <input type="file" class="form-control" id="email2"   name="image" >
                                @if(!is_null($assignment->image))
                                <a target="_blank" class="btn btn-info" href="{{asset($assignment->image)}}">View Attachement</a>
                                @else

                                @endif
                                
                                <small style="color:red; font-weight:500">
                                @error('image')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>



                            <div class="form-group">
                                <label for="email2">Assignment Description</label>
                                <textarea class="form-control" name="description" placeholder="Assignment Description" row="6">{{$assignment->title}}</textarea>
                                <small style="color:red; font-weight:500">
                                </small>
                            </div>
                        
                            <div>
                            <label for="email2">Assignment Status</label>
                                <select class="form-control" name="status" id="validationCustom02"  required>
                                <option disabled selected >Select Assignment Status</option>
                                @if($assignment->status == "pending")
                                <option value="{{$assignment->status}}" selected>Draft</option>
                                @else
                                <option value="{{$assignment->status}}" selected>Publish</option>
                                @endif
                                <option value="pending" >Draft</option>
                                <option value="active" >Publish</option>
                                </select>
                            </div>
                            
                        <div class="card-action">
                            <button class="btn btn-primary">Update Assignment</button>
                
                        </div>
                        </form>
                    </div>
                    
                </div>
                
            </div>

@endsection