@extends('instructor.app')

@section('content')

            <div class="row" style="margin:10px">
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Project</div>
                        </div>
                        <div class="card-body">
                           <form action="{{route('project.update', $project->id)}}" method="post" enctype="multipart/form-data">
                               @csrf
                           <div class="form-group">
                                <label for="email2">Project Title</label>
                                <input type="text" class="form-control" id="email2" required value="{{$project->title}}" name="title" placeholder="Enter Project Title ">
                                <small style="color:red; font-weight:500">
                                @error('title')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>
                            <div class="form-group">
                            <label for="email2">Project Category</label>
                                <select class="form-control" name="course_id" id="validationCustom02"  required>
                                <option disabled selected >Select Project Category</option>
                                @foreach($courses as $course)
                                <option value="{{$course->id}}" {{$project->course_id ==$course->id ? "selected" : ""}} >{{$course->title}}</option>
                                @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="email2">Cohort Category</label>
                                <select class="form-control" name="cohort_id" id="validationCustom02"  required>
                                <option disabled selected >Select Cohort Category</option>
                                @if(count($cohorts) > 0)
                                @foreach($cohorts as $cohort)
                                <option value="{{$cohort->id}}" {{$cohort->id== $project->cohort_id ? "selected" : ""}}>{{$cohort->name}}</option>
                                @endforeach
                                @else
                                <option disabled>No Cohort</option>
                                @endif
                                </select>
                            </div>


                            
                            <div class="form-group">
                                <label for="email2">Project Attachement</label>
                                <input type="file" class="form-control" id="email2"   name="image" >
                                <a target="_blank" class="btn btn-info" href="{{asset($project->image)}}">View Attachement</a>
                                <small style="color:red; font-weight:500">
                                @error('image')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>


                            <div class="form-group">
                                <label for="email2">Project Description</label>
                                <textarea class="form-control" name="description" row="6" placeholder="Project Description">{{$project->description}}</textarea>
                                <small style="color:red; font-weight:500">
                                </small>
                            </div>
                            
                        
                        </div>
                        <div class="card-action">
                            <button class="btn btn-primary">Update Project</button>
                
                        </div>
                        
                           </form>
                    </div>
                    
                </div>

                
            </div>

@endsection