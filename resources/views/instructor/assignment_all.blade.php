@extends('instructor.app')

@section('content')

            <div class="row" style="margin:10px">
            
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">All Assignments</h4>
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
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											
                                            <tbody>
											<?php $i = 1; ?>
                                            @foreach($assignments as $assignment)
                                           
											<tr>
												<td>{{$i++;}}</td>
                                                <td>{{$assignment->title}}</td>
                                                <td>{{optional($assignment->course_name)->title}}</td>
                                                <td>{{optional($assignment->cohort_name)->name}}</td>
                                                <td>{!!Str::limit(html_entity_decode($assignment->description),20,"...")!!}</td>
								
                                                <td>@if($assignment->status == "pending")
                                                    <span class="btn btn-warning btn-sm">Draft</span>
                                                    @else
                                                    <span class="btn btn-success btn-sm">Published</span>
                                                    @endif
                                                </td>
                                                <td>
                                                <a href="{{route('assignment.edit', $assignment->id)}}" ><i style="color:blue;" class="fa fa-edit"></i></a>    
                                                <a href="#" data-toggle="modal" data-target="#assignment_{{$assignment->id}}" ><i style="color:red;" class="fa fa-trash"></i></a>
                                                </td>
                                                @include('instructor.modal.deleteAssignment')
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