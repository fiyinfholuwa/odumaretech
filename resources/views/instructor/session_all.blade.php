@extends('instructor.app')

@section('content')

            <div class="row" style="margin:10px">
            
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">All Sessions</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>S/N</th>
													<th>Title</th>
                                                    <th>Category</th>
                                                    <th>Cohort</th>
                                                    <th>Description</th>
                                                    <th>Time</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											
                                            <tbody>
											<?php $i = 1; ?>
                                            @foreach($sessions as $session)
                                           
											<tr>
												<td>{{$i++;}}</td>
                                                <td>{{$session->title}}</td>
                                                <td>{{optional($session->course_name)->title}}</td>
                                                <td>{{optional($session->cohort_name)->name}}</td>
                                                <td><a target="_blank" class="btn btn-info" href="{{$session->description}}">View Live Session link</a></td>
                                                <td>
                                                    @include('instructor.countdown')
                                                </td>
								
                                                <td>@if($session->status == "pending")
                                                    <span class="btn btn-warning btn-sm">Draft</span>
                                                    @else
                                                    <span class="btn btn-success btn-sm">Published</span>
                                                    @endif
                                                </td>
                                                <td>
                                                <a href="{{route('session.edit', $session->id)}}" ><i style="color:blue;" class="fa fa-edit"></i></a>    
                                                <a href="#" data-toggle="modal" data-target="#session_{{$session->id}}" ><i style="color:red;" class="fa fa-trash"></i></a>
                                                </td>
                                                @include('instructor.modal.deleteSession')
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