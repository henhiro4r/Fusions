<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h1 class="h4 mb-0 font-weight-bold text-primary">Pending List</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if(count($requests)> 0)
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr class="text-center">
                    <th>Id</th>
                    <th>Date & Time</th>
                    <th>Applicant</th>
                    <th>Email</th>
                    <th>Meeting Method</th>
                    <th>Phone Number / Skype ID</th>
                    <th>Meeting Place</th>
                    <th>Topics</th>
                    <th>Notes</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($requests as $request)
                        <tr class="text-center">
                            <td>{{$request->id}}</td>
                            <td>{{$request->dateMeet."-".$request->timeMeet}}</td>
                            <td>{{ucwords($request->name)}}</td>
                            <td>{{$request->email}}</td>
                            <td>{{ucwords($request->methodmeet)}}</td>
                            <td>{{$request->phoneOrSkype}}</td>
                            <td>{{$request->placeMeet}}</td>
                            <td>
                                <ul style="margin-right: 1.5em;">
                                    @if($request->topic_design == 2) <li>Graphics Design</li> @endif
                                    @if($request->topic_web == 2) <li>Web Development</li> @endif
                                    @if($request->topic_app == 2) <li>Mobile Apps Development</li> @endif
                                </ul>
                            </td>
                            <td><a type="button" class="text-primary" data-toggle="modal"
                                   data-target="#notesModal-{{$request->id}}">Read</a></td>
                            @include('inc.notes')
                            <td><div class="row no-gutters">
                                    <div class="col-md-6">
                                        {!! Form::open(['method'=>'PUT', 'action' => ['Admin\RequestController@update', $request->id]]) !!}
                                        {{ csrf_field() }}
                                        {!! Form::hidden('ids', \Illuminate\Support\Facades\Auth::id()) !!}
                                        {!! Form::button('<i class="fas fa-check"></i>', ['type'=>'submit', 'class'=>'btn btn-success btn-circle', 'title'=>'Approve']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                    <div class="col-md-6">
                                        {!! Form::open(['method'=>'DELETE', 'action'=> ['Admin\RequestController@destroy', $request->id], 'id' => 'delete-user']) !!}
                                        {{ csrf_field() }}
                                        {!! Form::button('<i class="fas fa-trash"></i>', ['type'=>'submit', 'class'=>'btn btn-danger btn-circle', 'title'=>'Reject']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-left">
                <p>Displaying {{$requests->count()}} of {{$requests->total()}} entries</p>
            </div>
            <div class="float-right">
                {{$requests->links()}}
            </div>
            @else
                <h1 class="h4 mb-0 font-weight-bold text-primary">No Records</h1>
            @endif
        </div>
    </div>
</div>