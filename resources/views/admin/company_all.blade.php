@extends('admin.app')

@section('content')

            <div class="row" style="margin:10px">
            
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">All Corporate Training Requests</h4>

									<form method="post" action="{{route('company.export')}}">
										@csrf
                                <div class="row">
                                    <div class="col-lg-2 col-12 mt-1">
                                    <div class="" style="">

                                    <input name="date_from" class="form-control "  type="date"  placeholder="Start Date"    required/>
                                    
                                    </div>
                                </div>
                                <div class="col-lg-2 col-12 mt-1">
                                    <div class="" style="">

                                    <input name="date_to" class="form-control "  type="date"  placeholder="End Date"   required/>
                                    
                                    </div>
                                </div>
                                
                                <div>
                                <div class="col-lg-1 ml-5 col-4 mt-1" >
                                <button type="submit" class='btn btn-secondary btn-sm'>Export to CSV</button>
                                </div>
                                </div>
                            </div>
                        </form>


								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>S/N</th>
													<th>Company Name</th>
                                                    <th>Company Email</th>
                                                    <th>Company Phone Number</th>
                                                    <th>Intrested In</th>
                                                    <th>Career</th>
                                                    <th>Location</th>
												
												</tr>
											</thead>
											
                                            <tbody>
											<?php $i = 1; ?>
                                            @foreach($company_requests as $request)
                                           
											<tr>
												<td>{{$i++;}}</td>
                                                <td>{{$request->name}}</td>
                                                <td>{{$request->email}}</td>
                                                <td>{{$request->phone}}</td>
                                                <td>{{$request->intrested_in}}</td>
                                                <td>{{$request->career}}</td>
                                                <td>{{$request->location}}</td>
                                                
                                                </td>
                                            
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