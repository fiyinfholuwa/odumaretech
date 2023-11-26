@extends('instructor.app')

@section('content')

            <div class="row" style="margin:10px">
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Notification</div>
                        </div>
                        <div class="card-body">
                           <form action="{{route('notification.update', $notification->id)}}" method="post" enctype="multipart/form-data">
                               @csrf
                           <div class="form-group">
                                <label for="email2">Notification Title</label>
                                <input type="text" class="form-control" id="email2" required value="{{$notification->title}}" name="title" placeholder="Enter  Notification Title">
                                <small style="color:red; font-weight:500">
                                @error('title')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>
                            <div class="form-group">
                            <label for="email2">Notification Category</label>
                                <select class="form-control" name="course_id" id="validationCustom02"  required>
                                <option disabled selected >Select Notification Category</option>
                                @foreach($courses as $course)
                                <option value="{{$course->id}}" {{$notification->course_id == $course->id ? "selected" : ""}} >{{$course->title}}</option>
                                @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="email2">Cohort Category</label>
                                <select class="form-control" name="cohort_id" id="validationCustom02"  required>
                                <option disabled selected >Select Cohort Category</option>
                                @if(count($cohorts) > 0)
                                @foreach($cohorts as $cohort)
                                <option value="{{$cohort->id}}" {{$cohort->id== $notification->cohort_id ? "selected" : ""}}>{{$cohort->name}}</option>
                                @endforeach
                                @else
                                <option disabled>No Cohort</option>
                                @endif
                                </select>
                            </div>

                            

                            <div class="form-group">
                                <label for="email2">Notification Description</label>
                                <textarea class="form-control" name="description" row="6" placeholder="Notification Description">{{$notification->title}}</textarea>
                                <small style="color:red; font-weight:500">
                                </small>
                            </div>
                            <div>
                            <label for="email2">Notification Status</label>
                                <select class="form-control" name="status" id="validationCustom02"  required>
                                <option disabled selected >Select Notification Status</option>
                                @if($notification->status == "pending")
                                <option value="{{$notification->status}}" selected>Draft</option>
                                @else
                                <option value="{{$notification->status}}" selected>Publish</option>
                                @endif
                                <option value="pending" >Draft</option>
                                <option value="active" >Publish</option>
                                </select>
                            </div>
                            
                        </div>
                        </div>
                        <div class="card-action">
                            <button class="btn btn-primary">Update Notification</button>
                
                        </div>
                        </form>
                    </div>
                    
                </div>
                
            </div>

@endsection