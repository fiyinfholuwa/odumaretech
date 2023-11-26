@extends('admin.app')

@section('content')

    <div class="row" style="margin:10px">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Add Innovation</div>
                </div>
                <div class="card-body">
                    <form action="{{route('innovation.add')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="form-group">
                        <label for="email2">Innovation Title</label>
                        <input type="text" class="form-control" id="email2" required name="name" placeholder="Enter Innovation Title">
                        <small style="color:red; font-weight:500">
                        @error('name')
                        {{$message}}
                        @enderror
                        </small>
                        
                    </div>
                    <div class="form-group">
                        <label for="email2">Innovation Github Link</label>
                        <textarea type="text" class="form-control" id="email2" required name="github" placeholder="Enter Innovation Github Link"></textarea>
                        <small style="color:red; font-weight:500">
                        @error('content')
                        {{$message}}
                        @enderror
                        </small>
                        
                    </div>
                    <div class="form-group">
                        <label for="email2">Innovation Status</label>
                        <select class="form-control" name="status" required>
                            <option value="">Select Innovation Status</option>
                            <option value="Completed">Completed</option>
                            <option value="Running">Running</option>
                            <option value="Upcoming">Upcoming</option>
                        </select>
                        
                        </small>
                        
                    </div>
                    <div class="form-group">
                        <label for="email2">Innovation Website Link</label>
                        <input type="text" class="form-control" id="email2" required name="link" placeholder="Enter Innovation Link">
                        <small style="color:red; font-weight:500">
                        
                        </small>
                        
                    </div>

                    <div class="form-group">
                        <label for="email2">Innovation Image</label>
                        <input type="file" class="form-control" id="email2" accept="image/*" required name="image" >
                        <small style="color:red; font-weight:500">
                        
                    
                        </small>
                        
                    </div>
                
                </div>
                <div class="card-action">
                    <button class="btn btn-primary">Add Innovation</button>
        
                </div>
                    </form>
            </div>
            
        </div>
        
    </div>

@endsection