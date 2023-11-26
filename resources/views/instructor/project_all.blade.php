@extends('instructor.app')

@section('content')

            <div class="row" style="margin:10px">
            
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">All Projects</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>S/N</th>
                                                    <th>Title</th>
													<th>Course</th>
													<th>Cohort</th>
                                                    <th>Image</th>
													<th>Status</th>
                                                    <th>Description</th>
													<th>Action</th>
												</tr>
											</thead>
											
                                            <tbody>
											<?php $i = 1; ?>
                                            @foreach($projects as $project)
                                           
											<tr>
												<td>{{$i++;}}</td>
                                                <td>{{$project->title}}</td>
                                                <td>{{optional($project->course_name)->title}}</td>
                                                <td>{{optional($project->cohort_name)->name}}</td>
                                                <td><a target="_blank" class="btn btn-info" href="{{asset($project->image)}}">View Attachement</a></td>
                                                <td>@if($project->status == "pending")
                                                    <span class="btn btn-warning btn-sm">Draft</span>
                                                    @else
                                                    <span class="btn btn-success btn-sm">Published</span>
                                                    @endif
                                                </td>
                                                <td>{!!Str::limit(html_entity_decode($project->description),20,"...")!!}</td>
								
                                                
                                                <td>
                                                <a href="{{route('project.instructor', $project->id)}}" ><i style="color:blue;" class="fa fa-edit"></i></a>    
                                                <a href="#" data-toggle="modal" data-target="#project_{{$project->id}}" ><i style="color:red;" class="fa fa-trash"></i></a>
                                                </td>
                                                @include('instructor.modal.deleteproject')
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