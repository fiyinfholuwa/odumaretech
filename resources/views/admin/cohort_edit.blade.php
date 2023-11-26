@extends('admin.app')

@section('content')

            <div class="row" style="margin:10px">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Cohort </br><span class="text-danger">{{$cohort->name}}<span></div>
                        </div>
                        <div class="card-body">
                           <form action="{{route('cohort.update', $cohort->id)}}" method="post">
                               @csrf
                           <div class="form-group">
                                <label for="email2">cohort Name</label>
                                <input type="text" value="{{$cohort->name}}" class="form-control" id="email2" required name="name" placeholder="Enter cohort Name">
                                <small style="color:red; font-weight:500">
                                @error('name')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>
                        
                        </div>
                        <div class="card-action">
                            <button class="btn btn-primary">Update Cohort</button>
                
                        </div>
                           </form>
                    </div>
                    
                </div>

                <div class="col-md-8">
                <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">All Cohorts</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
                                                    <td>S/N</td>
													<th>Name</th>
													<th>Action</th>
												</tr>
											</thead>
											
                                            <tbody>
                                            <?php $i = 1; ?>
											@if(isset($cohorts))
                                            @foreach($cohorts as $cohort)
                                           
											<tr>
                                                <td>{{$i++;}}</td>
                                                <td>{{$cohort->name}}</td>
                                                
                                                <td>
                                                <a href="{{route('cohort.edit', $cohort->id)}}" ><i style="color:blue;" class="fa fa-edit"></i></a>    
                                                <a href="#" data-toggle="modal" data-target="#cohort_{{$cohort->id}}" ><i style="color:red;" class="fa fa-trash"></i></a>
                                                </td>
                                                @include('admin.modal.deletecohort')
											</tr>
											
                                            @endforeach
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