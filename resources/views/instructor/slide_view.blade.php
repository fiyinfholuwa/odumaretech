@extends('instructor.app')

@section('content')

            <div class="row" style="margin:10px">
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Add Slide</div>
                        </div>
                        <div class="card-body">
                           <form action="{{route('slide.add')}}" method="post" enctype="multipart/form-data">
                               @csrf
                           <div class="form-group">
                                <label for="email2">Slide Title</label>
                                <input type="text" class="form-control" id="email2" required name="title" placeholder="Enter  Slide Title">
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
                                <option value="{{$course->id}}" >{{$course->title}}</option>
                                @endforeach
                                </select>
                            </div>

                            
                                <div class="form-group">
                                <label for="email2">Cohort Category</label>
                                <select class="form-control" name="cohort_id" id="validationCustom02"  required>
                                <option disabled selected >Select  Cohort Category</option>
                                @if(count($cohorts) > 0)
                                @foreach($cohorts as $cohort)
                                <option value="{{$cohort->id}}">{{$cohort->name}}</option>
                                @endforeach
                                @else
                                <option disabled>No Cohort</option>
                                @endif
                                </select>
                            </div>

                            

                            <div class="form-group">
                                <label for="email2">Slide Attachement</label>
                                <input type="file" class="form-control" id="email2"  required name="image" >
                                <small style="color:red; font-weight:500">
                                @error('image')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>
                        
                        </div>
                        <div class="card-action">
                            <button class="btn btn-primary">Add Slide</button>
                
                        </div>
                           </form>
                    </div>
                    
                </div>
                
            </div>

@endsection