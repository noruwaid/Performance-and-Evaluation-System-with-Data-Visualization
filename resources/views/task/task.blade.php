
@include ('partials.head')
@include ('partials.navbar')
@include ('partials.sidebar')
@if(Auth::User()->role !="sales")
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Task Details</h4>
                    @if(Auth::User()->role == 'director')
                    <a href="{{ route('createtask') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create Task</a>
                    @endif
                  </div>
                  <div class="card-body">
                  @if(session('success'))
                  <div class="alert alert-success">
                    {{session('success')}}
                  </div>
                  @endif
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="table-1" style="width:100%;">
                        <thead>
                          <tr>
                              <th>No</th>
                              <th>Task</th>
                              <th>Status</th>
                              <th>Created</th>
                              <th>End Date</th>
                              <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @if(Auth::User()->role == 'director')
                        @foreach ($assign as $index => $assign)
                        
                        <tr>
                          <td>{{ $index +1 }}</td>
                          <td>{{ $assign->name }}</td>
                          <td><div class="badge badge-info">{{ $assign->status }}</div></td>
                          <td>{{ Carbon\Carbon::parse($assign->created)->diffForHumans()}}</td>
                          <td>{{ $assign->enddate }}<br>{{ Carbon\Carbon::parse($assign->enddate )->diffForHumans(Carbon\Carbon::now())}}</td>
                          
                            <td><form action="{{ route('taskdestroy', $assign->id)}}" method="POST">
                            <a href="{{ route('task.edit', $assign->id)}}" class="btn btn-warning"><i class="far fa-edit"></i> Edit</a>
                          <a href="{{ route('taskshow', $assign->id)}}" class="btn btn-primary"><i class="fas fa-info-circle"></i> Detail</a>
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button></td>
                          </form>
                        </tr>
                        @endforeach
                        @elseif(Auth::User()->role == 'administrator')
                        @foreach ($adminassign as $index => $adminassign)
                        <tr>
                          <td>{{ $index +1 }}</td>
                          <td>{{ $adminassign->name }}</td>
                          <td><div class="badge badge-info">{{ $adminassign->status }}</div></td>
                          <td>{{ Carbon\Carbon::parse($adminassign->created)->diffForHumans()}}</td>
                          <td>{{ $adminassign->enddate }}<br>{{ Carbon\Carbon::parse($adminassign->enddate )->diffForHumans(Carbon\Carbon::now())}}</td>
                          <form action="{{ route('task.updateprogress', $adminassign->id)}}" method="POST">
                              <td><a href="{{ route('task.edit', $adminassign->id)}}" class="btn btn-warning"><i class="far fa-edit"></i> Edit</a>
                              <a href="{{ route('taskshow', $adminassign->id)}}" class="btn btn-primary"><i class="fas fa-info-circle"></i> Detail</a>
                              @csrf
                              <button type="submit" class="btn btn-dark"><i class="fas fa-check"></i> In-Progress</button></td>
                          </form>                        
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
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Task Details: Progress</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                              <th>No</th>
                              <th>Task</th>
                              <th>Status</th>
                              <th>Created</th>
                              <th>End Date</th>
                              <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @if(Auth::User()->role == 'director')
                        @foreach ($progress as $index => $progress)
                        
                        <tr>
                          <td>{{ $index +1 }}</td>
                          <td>{{ $progress->name }}</td>
                          <td><div class="badge badge-warning">{{ $progress->status }}</div></td>
                          <td>{{ Carbon\Carbon::parse($progress->created)->diffForHumans()}}</td>
                          <td>{{ $progress->enddate }}<br>{{ Carbon\Carbon::parse($progress->enddate )->diffForHumans(Carbon\Carbon::now())}}</td>
                          <td>
                          <form action="{{ route('updatehelp', $progress->id)}}" method="POST">    
                          @csrf                          
                            <a href="{{ route('taskshow', $progress->id)}}" class="btn btn-primary"><i class="fas fa-info-circle"></i> Detail</a>
                              <button type="submit" class="btn btn-light"><i class="fas fa-exclamation-triangle"></i> Need Guidance</button></td>

                          </form>
                          </td>
                          
                        </tr>
                        @endforeach
                        @elseif(Auth::User()->role == 'administrator')
                        @foreach ($adminprogress as $index => $progress)

                        <tr>
                          <td>{{ $index +1 }}</td>
                          <td>{{ $progress->name }}</td>
                          <td><div class="badge badge-warning">{{ $progress->status }}</div></td>
                          <td>{{ Carbon\Carbon::parse($progress->created)->diffForHumans()}}</td>
                          <td>{{ $progress->enddate }}<br>{{ Carbon\Carbon::parse($progress->enddate )->diffForHumans(Carbon\Carbon::now())}}</td>
                          <td>
                          <form action="{{ route('updatehelp', $progress->id)}}" method="POST">  
                            @csrf                            
                              <a href="{{ route('task.edit', $progress->id)}}" class="btn btn-warning"><i class="far fa-edit"></i> Edit</a>
                              <a href="{{ route('taskshow', $progress->id)}}" class="btn btn-primary"><i class="fas fa-info-circle"></i> Detail</a>
                              <button type="submit" class="btn btn-light"><i class="fas fa-exclamation-triangle"></i> Need Guidance</button></td>
                            </form>
                          </td>
                          
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
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Task Details: Completed</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                        <thead>
                          <tr>
                          <th>No</th>
                          <th>Task</th>
                          <th>Status</th>
                          <th>Submitted</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @if(Auth::User()->role == 'director')

                        @foreach ($completed as $index => $assign)
                        <tr>
                          <td>{{ $index +1 }}</td>
                          <td>{{ $assign->name }}</td>
                          <td>
                          @if($assign->submissionstatus =='Late')
                            <div class="badge badge-danger">{{ $assign->submissionstatus }}</div>
                            @elseif($assign->submissionstatus =='On-Time')                                     
                            <div class="badge badge-success">{{ $assign->submissionstatus }}</div>
                          @endif
                          </td>
                          <td>{{ Carbon\Carbon::parse($assign->submitted)->diffForHumans()}}</td>
                          <td>{{ $assign->startdate }}<br>{{ Carbon\Carbon::parse($assign->startdate )->diffForHumans(Carbon\Carbon::now())}}</td>
                          <td>{{ $assign->enddate }}<br>{{ Carbon\Carbon::parse($assign->enddate )->diffForHumans(Carbon\Carbon::now())}}</td>
                          <td>
                          <form action="{{ route('updatehelp', $assign->id)}}" method="POST">    
                          @csrf                          
                            <a href="{{ route('taskshow', $assign->id)}}" class="btn btn-primary"><i class="fas fa-info-circle"></i> Detail</a>
                              <button type="submit" class="btn btn-light"><i class="fas fa-exclamation-triangle"></i> Need Guidance</button></td>

                          </form>
                          </td>
                        </tr>
                        @endforeach
                        @elseif(Auth::User()->role == 'administrator')
                        @foreach ($admincompleted as $index => $admincompleted)
                        <tr>
                          <td>{{ $index +1 }}</td>
                          <td>{{ $admincompleted->name }}</td>
                          <td>@if($admincompleted->submissionstatus =='Late')
                            <div class="badge badge-danger">{{ $admincompleted->submissionstatus }}</div>
                            @elseif($admincompleted->submissionstatus =='On-Time')                                     
                            <div class="badge badge-success">{{ $admincompleted->submissionstatus }}</div>
                          @endif</td>
                          <td>{{ Carbon\Carbon::parse($admincompleted->submitted)->diffForHumans()}}</td>
                          <td>{{ $admincompleted->startdate }}<br>{{ Carbon\Carbon::parse($admincompleted->startdate )->diffForHumans(Carbon\Carbon::now())}}</td>
                          <td>{{ $admincompleted->enddate }}<br>{{ Carbon\Carbon::parse($admincompleted->enddate )->diffForHumans(Carbon\Carbon::now())}}</td>
                          <td><a href="{{ route('taskshow', $admincompleted->id)}}" class="btn btn-primary"><i class="fas fa-info-circle"></i> Detail</a></td>
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

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Task Details: Need Guidance</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                          <th>No</th>
                          <th>Task</th>
                          <th>Status</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @if(Auth::User()->role == 'director')

                        @foreach ($directorhelp as $index => $progress)
                        
                        <tr>
                          <td>{{ $index +1 }}</td>
                          <td>{{ $progress->name }}</td>
                          <td>@if($progress->status =='In-Progress')
                            <div class="badge badge-warning">{{ $progress->status }}</div>
                            @elseif($progress->status =='Completed')                                     
                            <div class="badge badge-info">{{ $progress->status }}</div>
                          @endif</td>                          <td>{{ Carbon\Carbon::parse($progress->created)->diffForHumans()}}</td>
                          <td>{{ $progress->enddate }}<br>{{ Carbon\Carbon::parse($progress->enddate )->diffForHumans(Carbon\Carbon::now())}}</td>
                          <td>
                          <form action="{{ route('updatehelp', $progress->id)}}" method="POST">                              
                              <a href="{{ route('task.edit', $progress->id)}}" class="btn btn-warning"><i class="far fa-edit"></i> Edit</a>
                              <a href="{{ route('taskshow', $progress->id)}}" class="btn btn-primary"><i class="fas fa-info-circle"></i> Detail</a>
                          </form>
                          </td>
                          
                        </tr>
                        @endforeach
                        @elseif(Auth::User()->role == 'administrator')
                        @foreach ($adminhelp as $index => $progress)
                        
                        <tr>
                          <td>{{ $index +1 }}</td>
                          <td>{{ $progress->name }}</td>
                          <td>@if($progress->status =='In-Progress')
                            <div class="badge badge-warning">{{ $progress->status }}</div>
                            @elseif($progress->status =='Completed')                                     
                            <div class="badge badge-info">{{ $progress->status }}</div>
                          @endif</td>                          <td>{{ Carbon\Carbon::parse($progress->created)->diffForHumans()}}</td>
                          <td>{{ $progress->enddate }}<br>{{ Carbon\Carbon::parse($progress->enddate )->diffForHumans(Carbon\Carbon::now())}}</td>
                          <td>
                          <form action="{{ route('updatehelp', $progress->id)}}" method="POST">                              
                              <a href="{{ route('task.edit', $progress->id)}}" class="btn btn-warning"><i class="far fa-edit"></i> Edit</a>
                              <a href="{{ route('taskshow', $progress->id)}}" class="btn btn-primary"><i class="fas fa-info-circle"></i> Detail</a>
                          </form>
                          </td>
                          
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
          </section>
 
    </div>
  </div>
@else
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="card-body">
                    <div class="empty-state" data-height="400">
                      <div class="empty-state-icon bg-danger">
                        <i class="fas fa-times"></i>
                      </div>
                      <h2>You have no access to this page</h2>
                      <p class="lead">
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
@endif
@include ('partials.footer')
@include ('partials.javascript')
