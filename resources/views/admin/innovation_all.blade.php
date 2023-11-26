@extends('admin.app')

@section('content')

            <div class="row" style="margin:10px">
            
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">All Innovations</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>S/N</th>
													<th>Name</th>
                                                    <th>Github Link</th>
                                                    <th>Website Link</th>
                                                    <th>Image</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											
                                            <tbody>
											<?php $i = 1; ?>
                                            @foreach($innovations as $innovation)
                                           
											<tr>
												<td>{{$i++;}}</td>
                                                <td>{{$innovation->name}}</td>
                                                <td><a target="_blank" class="btn btn-info" href="{{$innovation->github}}">View Github link</a></td>

                                                <td><a target="_blank" class="btn btn-secondary" href="{{$innovation->link}}">View Website link</a></td>
                                            
                                                <td><img height="40" width="40" src="{{asset($innovation->image)}}" /></td>
                                            
												<td>
													@if($innovation->status == "Running")
													<span class="btn btn-warning text-white">{{$innovation->status}}</span>

													@elseif($innovation->status == "Completed")
													<span class="btn btn-success text-white">{{$innovation->status}}</span>
													@else
													<span class="btn btn-primary text-white">{{$innovation->status}}</span>
													@endif
												</td>
												<td>
                                                <a href="{{route('innovation.edit', $innovation->id)}}" ><i style="color:blue;" class="fa fa-edit"></i></a>    
                                                <a href="#" data-toggle="modal" data-target="#innovation_{{$innovation->id}}" ><i style="color:red;" class="fa fa-trash"></i></a>
                                                </td>
                                                @include('admin.modal.deleteInnovation')
											</tr>
											
                                            @endforeach
                                    
                                            </tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

				
            </div>

@endsection