@extends('admin.app')

@section('content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    
  <script>
    var $j = jQuery.noConflict();
    $j(document).ready(function() {
        $j(".datepicker").datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            onClose: function(dateText, inst) {
                $j(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            }
        });
    });
</script>

            <div class="row" style="margin:10px">
            
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">All Free Master Class Attendees  </h4>
									<form method="post" action="{{route('masterclass.export')}}">
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
													<th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email</th>
                                                    <th>Intrested In</th>
                                                    <th>Gender</th>
                                                    <th>Career</th>
                                                    <th>Location</th>
												
												</tr>
											</thead>
											
                                            <tbody>
											<?php $i = 1; ?>
                                            @foreach($attendees as $attendee)
                                           
											<tr>
												<td>{{$i++;}}</td>
                                                <td>{{$attendee->first_name}}</td>
                                                <td>{{$attendee->last_name}}</td>
                                                <td>{{$attendee->email}}</td>
                                                <td>{{$attendee->intrested_in}}</td>
                                                <td>{{$attendee->gender}}</td>
                                                <td>{{$attendee->career}}</td>
                                                <td>{{$attendee->location}}</td>
                                                
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