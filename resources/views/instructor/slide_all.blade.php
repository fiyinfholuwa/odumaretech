@extends('instructor.app')

@section('content')

            <div class="row" style="margin:10px">
            
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">All Slides</h4>
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
                                                    <th>Slide</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											
                                            <tbody>
											<?php $i = 1; ?>
                                            @foreach($slides as $slide)
                                           
											<tr>
												<td>{{$i++;}}</td>
                                                <td>{{$slide->title}}</td>
                                                <td>{{optional($slide->course_name)->title}}</td>
												<td>{{optional($slide->cohort_name)->name}}</td>
                                                
                                                <td><a target="_blank" class="btn btn-info" href="{{asset($slide->image)}}">View Slide</a></td>
								
                                                <td>@if($slide->status == "pending")
                                                    <span class="btn btn-warning btn-sm">Draft</span>
                                                    @else
                                                    <span class="btn btn-success btn-sm">Published</span>
                                                    @endif
                                                </td>
                                                <td>
                                                <a href="{{route('slide.edit', $slide->id)}}" ><i style="color:blue;" class="fa fa-edit"></i></a>    
                                                <a href="#" data-toggle="modal" data-target="#slide_{{$slide->id}}" ><i style="color:red;" class="fa fa-trash"></i></a>
                                                </td>
                                                @include('instructor.modal.deleteSlide')
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