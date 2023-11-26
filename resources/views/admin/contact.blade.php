@extends('admin.app')

@section('content')
    <div class="row" style="margin:10px;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Messages</h4>
                    <div class="bg-white p-3   align-items-center">
                


                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Subject</th>
                                    <th>Message</th>
        
                                </tr>
                            </thead>
                           
                            <tbody>
                            <?php $i = 1; ?>
                             @foreach($all_messages as $message)
                             <tr>
                             
                             <td>{{$i++;}}</td>
                             <td>{{$message->name}}</td>
                             <td>{{$message->email}}</td>
                             <td>{{$message->phone}}</td>
                             <td>{{$message->subject}}</td>
                             <td>{{$message->message}}</td>
                             
                             @endforeach
                            </tbody>
                           
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection