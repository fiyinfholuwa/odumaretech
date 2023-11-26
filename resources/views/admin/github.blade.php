@extends('admin.app')

@section('content')

            <div class="row" style="margin:10px">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Manage Github Link</div>
                        </div>
                        <div class="card-body">
                           <form action="{{route('github.link.add')}}" method="post">
                               @csrf
                           @if($github_link !=null)
                           <div class="form-group">
                                <label for="email2">Github Link</label>
                                <input type="text" class="form-control" id="email2" value="{{$github_link->link}}" required name="link" placeholder="Enter Github Class Link">
                                <small style="color:red; font-weight:500">
                                @error('link')
                                {{$message}}
                                @enderror
                                </small>
                                <input type="hidden" name="id" value="{{$github_link->id}}"/>
                            </div>
                        
                        </div>
                        <div class="card-action">
                            <button class="btn btn-primary">Update Link</button>
                
                        </div>
                           @else
                           <div class="form-group">
                                <label for="email2">Github Link</label>
                                <input type="text" class="form-control" id="email2"  required name="link" placeholder="Enter Github Link">
                                
                                <small style="color:red; font-weight:500">
                                @error('link')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>
                        
                        </div>
                        <div class="card-action">
                            <button class="btn btn-primary">Add Github Link</button>
                
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
									<h4 class="card-title">Check Github Link</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
                                                    <td>S/N</td>
													<th>Github Url</th>
										
												</tr>
											</thead>
                                            <tbody>
                                            <?php $i = 1; ?>
										
											<tr>
                                            <td>{{$i;}}</td>
                                           <td> @if($github_link != null)
                                            <a target="_blank" class="btn btn-info" href="{{$github_link->link}}">View github link</a>
                                            @else
                                            No Github Link Found
                                            @endif
                                            </td>  
                                                
											</tr>
										
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