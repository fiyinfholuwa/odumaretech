@extends('admin.app')

@section('content')

            <div class="row" style="margin:10px">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Category </br><span class="text-danger">{{$category->name}}<span></div>
                        </div>
                        <div class="card-body">
                           <form action="{{route('category.update', $category->id)}}" method="post">
                               @csrf
                           <div class="form-group">
                                <label for="email2">Category Name</label>
                                <input type="text" value="{{$category->name}}" class="form-control" id="email2" required name="name" placeholder="Enter Category Name">
                                <small style="color:red; font-weight:500">
                                @error('name')
                                {{$message}}
                                @enderror
                                </small>
                               
                            </div>
                        
                        </div>
                        <div class="card-action">
                            <button class="btn btn-primary">Update Category</button>
                
                        </div>
                           </form>
                    </div>
                    
                </div>

                <div class="col-md-8">
                <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">All Categories</h4>
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
											@if(isset($categories))
                                            @foreach($categories as $category)
                                           
											<tr>
                                                <td>{{$i++;}}</td>
                                                <td>{{$category->name}}</td>
                                                
                                                <td>
                                                <a href="{{route('category.edit', $category->id)}}" ><i style="color:blue;" class="fa fa-edit"></i></a>    
                                                <a href="#" data-toggle="modal" data-target="#category_{{$category->id}}" ><i style="color:red;" class="fa fa-trash"></i></a>
                                                </td>
                                                @include('admin.modal.deleteCategory')
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