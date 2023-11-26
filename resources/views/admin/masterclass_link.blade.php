@extends('admin.app')

@section('content')

            <div class="row" style="margin:10px">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Manage Master Class Link</div>
                        </div>
                        <div class="card-body">
                           <form action="{{route('masterclass.link.add')}}" method="post">
                               @csrf
                           @if($masterclass_link !=null)
                           <div class="form-group">
                                <label for="email2">Master Class Link</label>
                                <input type="text" class="form-control" id="email2" value="{{$masterclass_link->link}}" required name="link" placeholder="Enter Master Class Link">
                                <small style="color:red; font-weight:500">
                                @error('link')
                                {{$message}}
                                @enderror
                                </small>
                                <input type="hidden" name="id" value="{{$masterclass_link->id}}"/>
                            </div>
                            <div class="form-group">
                                <label for="email2">Master Class Title</label>
                                <input type="text" class="form-control" id="email2" value="{{$masterclass_link->title}}"  required name="title" placeholder="Enter Master Class Title">
                            </div>

                            <div class="form-group">
                                <label for="email2">Date</label>
                                <input type="date" class="form-control" value="{{$masterclass_link->date}}" id="email2"  required name="date">
                            </div>
                        
                            <div class="form-group">
                                <label for="email2">Time</label>
                                <input type="time" class="form-control" value="{{$masterclass_link->time}}" id="email2"  required name="time">
                            </div>

                            <div class="form-group">
                                <label for="email2">Visibility</label>
                                <select class="form-control" name="visible">
                                    <option value="">Select Option<option>
                                    <option value="on" {{$masterclass_link->visible =="on" ? "selected" : ""}} >Yes<option>
                                    <option value="off" {{$masterclass_link->visible =="off" ? "selected" : ""}}>No<option>
                                <select>
                            </div>
                        

                        </div>
                        <div class="card-action">
                            <button class="btn btn-primary">Update Link</button>
                
                        </div>
                           @else
                           <div class="form-group">
                                <label for="email2">Master Class Link</label>
                                <input type="text" class="form-control" id="email2"  required name="link" placeholder="Enter Master Class Link">
                            </div>

                            <div class="form-group">
                                <label for="email2">Master Class Title</label>
                                <input type="text" class="form-control" id="email2"  required name="title" placeholder="Enter Master Class Title">
                            </div>

                            <div class="form-group">
                                <label for="email2">Date</label>
                                <input type="date" class="form-control" id="email2"  required name="date">
                            </div>
                        
                            <div class="form-group">
                                <label for="email2">Time</label>
                                <input type="time" class="form-control" id="email2"  required name="time">
                            </div>

                            <div class="form-group">
                                <label for="email2">Visibility</label>
                                <select class="form-control" name="visible">
                                    <option value="">Select Option<option>
                                    <option value="on">Yes<option>
                                    <option value="off">No<option>
                                <select>
                            </div>
                        
                        </div>
                        <div class="card-action">
                            <button class="btn btn-primary">Add Link</button>
                
                        </div>
                           @endif
                           </form>
                    </div>
                    
                </div>

                <div class="col-md-7">
                <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Test Master Class Link</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
                                                    <td>S/N</td>
													<th>Title</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Visibility</th>
                                                    <th>Master Class Url</th>
										
												</tr>
											</thead>
											
                                            <tbody>
                                            <?php $i = 1; ?>
										
											@if($masterclass_link != null)
                                            <tr>
                                            <td>{{$i;}}</td>
                                            <td>{{$masterclass_link->title}}</td>
                                            <td>{{$masterclass_link->date}}</td>
                                            <td>{{$masterclass_link->time}}</td>
                                            <td>@if($masterclass_link->visible =="on")
                                                <span class="btn btn-success">{{$masterclass_link->visible}}<span>
                                                @else
                                                <span class="btn btn-danger">{{$masterclass_link->visible}}<span>
                                                @endif
                                            </td>
                                           <td> @if($masterclass_link != null)
                                            <a target="_blank" class="btn btn-info" href="{{$masterclass_link->link}}">View master class link</a>
                                            @else
                                            No Master Class Link Found
                                            @endif
                                            </td>  
                                                
											</tr>
                                            @else
                                            @endif
										
                                            </tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

					</div>
                    
                </div>
            </div>

@endsection