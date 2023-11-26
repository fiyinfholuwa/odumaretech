@extends('admin.app')

@section('content')

    <div class="row" style="margin:10px">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Innovation</div>
                </div>
                <div class="card-body">
                    <form action="{{route('innovation.update', $innovation->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="form-group">
                        <label for="email2">Innovation Title</label>
                        <input type="text" class="form-control" id="email2" value="{{$innovation->name}}" required name="name" placeholder="Enter Innovation Title">
                        <small style="color:red; font-weight:500">
                        @error('name')
                        {{$message}}
                        @enderror
                        </small>
                        
                    </div>
                    <div class="form-group">
                        <label for="email2">Innovation Github Link</label>
                        <textarea type="text" class="form-control" id="email2"  required name="github" placeholder="Enter Innovation Github Link">{{$innovation->github}}</textarea>
                        <small style="color:red; font-weight:500">
                        @error('content')
                        {{$message}}
                        @enderror
                        </small>
                        
                    </div>

                    <div class="form-group">
                        <label for="email2">Innovation Status</label>
                        <select class="form-control" name="status" required>
                            <option value="" >Select Innovation Status</option>
                            <option value="Completed" {{$innovation->status == "Completed" ? "selected" : ""}}>Completed</option>
                            <option value="Running" {{$innovation->status == "Running" ? "selected" : ""}}>Running</option>
                            <option value="Upcoming" {{$innovation->status == "Upcoming" ? "selected" : ""}}>Upcoming</option>
                        </select>
                        
                        </small>
                        
                    </div>


                    <div class="form-group">
                        <label for="email2">Innovation Website Link</label>
                        <input type="text" class="form-control" id="email2" value="{{$innovation->link}}" required name="link" placeholder="Enter Innovation Link">
                        <small style="color:red; font-weight:500">
                        
                        </small>
                        
                    </div>

                    <div class="form-group">
                        <label for="email2">Innovation Image</label>
                        <input type="file" class="form-control" id="email2" accept="image/*" name="image" >
                        <small style="color:red; font-weight:500">
                        <img height="60" width="60" src="{{asset($innovation->image)}}" />
                    
                        </small>
                        
                    </div>


                
                </div>
                <div class="card-action">
                    <button class="btn btn-primary">Update Innovation</button>
        
                </div>
                    </form>
            </div>
            
        </div>
        
    </div>

@endsection