<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h1 class="h4 mb-0 font-weight-bold text-primary">History Request</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if(count($reject)> 0 || count($approve) > 0)
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr class="text-center">
                        <th>Date & Time</th>
                        <th>Meeting Method</th>
                        <th>Phone Number / Skype ID</th>
                        <th>Meeting Place</th>
                        <th>Topics</th>
                        <th>Notes</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($approve as $request)
                        <tr class="text-center">
                            <td>{{$request->dateMeet."-".$request->timeMeet}}</td>
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
                            <td><p class="text-success">Approved</p></td>
                        </tr>
                    @endforeach
                    @foreach($reject as $request)
                        <tr class="text-center">
                            <td>{{$request->id}}</td>
                            <td>{{$request->dateMeet."-".$request->timeMeet}}</td>
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
                            <td><p class="text-danger">Rejected</p></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h1 class="h4 mb-0 font-weight-bold text-primary">No Records</h1>
            @endif
        </div>
    </div>
</div>