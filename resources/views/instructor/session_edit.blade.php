@extends('instructor.app')

@section('content')

            <div class="row" style="margin:10px">
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Live Session</div>
                        </div>
                        <div class="card-body">
                           <form action="{{route('session.update', $session->id)}}" method="post" enctype="multipart/form-data">
                               @csrf
                           <div class="form-group">
                                <label for="email2">Session Title</label>
                                <input type="text" class="form-control" id="email2" value="{{$session->title}}" required name="title" placeholder="Enter  Session Title">
                                <small style="color:red; font-weight:500">
                                @error('title')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>
                            <div class="form-group">
                            <label for="email2">Session Category</label>
                                <select class="form-control" name="course_id" id="validationCustom02"  required>
                                <option disabled selected >Select Session Category</option>
                                @foreach($courses as $course)
                                <option value="{{$course->id}}" {{$session->course_id == $course->id ? "selected" : ""}} >{{$course->title}}</option>
                                @endforeach
                                </select>
                            </div>
                            

                            <div class="form-group">
                                <label for="email2">Cohort Category</label>
                                <select class="form-control" name="cohort_id" id="validationCustom02"  required>
                                <option disabled selected >Select Cohort Category</option>
                                @if(count($cohorts) > 0)
                                @foreach($cohorts as $cohort)
                                <option value="{{$cohort->id}}" {{$cohort->id== $session->cohort_id ? "selected" : ""}}>{{$cohort->name}}</option>
                                @endforeach
                                @else
                                <option disabled>No Cohort</option>
                                @endif
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="email2">Session Link</label>
                                <textarea class="form-control" name="description" row="6">{{$session->description}}</textarea>
                                <small style="color:red; font-weight:500">
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="email2">Session Time</label>
                                <input type="datetime-local" value="{{$session->time}}" class="form-control" name="date" />
                                <small style="color:red; font-weight:500">
                                </small>
                            </div>
                            <div>
                            <label for="email2">Session Status</label>
                                <select class="form-control" name="status" id="validationCustom02"  required>
                                <option disabled selected >Select Session Status</option>
                                @if($session->status == "pending")
                                <option value="{{$session->status}}" selected>Draft</option>
                                @else
                                <option value="{{$session->status}}" selected>Publish</option>
                                @endif
                                <option value="pending" >Draft</option>
                                <option value="active" >Publish</option>
                                </select>
                            </div>
                            
                        </div>
                        <div class="card-action">
                            <button class="btn btn-primary">Update Session</button>
                
                        </div>
                        </form>
                    </div>
                    
                </div>
                
            </div>

@endsection