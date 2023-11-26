@extends('admin.app')

@section('content')

            <div class="row" style="margin:10px">
            
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Manage All Applied Students</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>S/N</th>
													<th>Email</th>
                                                    <th>Cohort</th>
                                                    <th>Course</th>
                                                    <th>Actions</th>
												</tr>
											</thead>
											
                                            <tbody>
											<?php $i = 1; ?>
                                            @foreach($applied as $ap)
                                           
											<tr>
												<td>{{$i++;}}</td>
                                                <td>{{optional($ap->user_email)->email}}</td>
                                                <td>{{optional($ap->cohort_name)->name}}</td>
                                                <td>{{optional($ap->course_name)->title}}</td>
                                                <td>
                                                <a href="#" data-toggle="modal" data-target="#applied_{{$ap->id}}" ><i style="color:blue;" class="fa fa-edit"></i></a>
                                                </td>
                                            
											</tr>
											@include('admin.modal.update_user_cohort')
                                            @endforeach
                                    
                                            </tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

				
            </div>

@endsection