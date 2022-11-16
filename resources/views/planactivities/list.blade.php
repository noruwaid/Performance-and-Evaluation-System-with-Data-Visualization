
@include ('partials.head')
@include ('partials.navbar')
@include ('partials.sidebar')

<div class="main-content">
        <section class="section">
          <div class="section-body">
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Plan Activities Details</h4>
                    <div class="card-body">
                    @if(Auth::User()->role == "sales")
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Create Activities</button>
                    @endif
                  </div>        
                  </div>
                  <div class="card-body">
                  @if(session('success'))
                  <div class="alert alert-success">
                    {{session('success')}}
                  </div>
                  @endif
                  <div>
                  @foreach ($plan as $plan)
                  <label>Plan Name   :   <b>{{$plan->name}}</b></label><br>
                  <label>Plan Status :   <b>{{$plan->status}}</b></label><br>
                  <label>Plan Date   :   <b>{{Carbon\Carbon::parse($plan->plandate)->format('d F Y')}}</b></label><br><br>
                  @endforeach
                  </div>
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2" style="width:100%;">
                        <thead>
                          <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th style="width:40%;">Description</th>
                              <th>Status</th>
                              <th>Date</th>
                              @if(Auth::User()->role =="sales")
                              <th>Action</th>
                              @endif
                          </tr>

                         
                        </thead>
                        <tbody>
                          @foreach ($activitylist as $index => $activity)
                            <tr>
                                  <td>{{$index +1}}</td>
                                  <td>{{$activity->name}}</td>
                                  <td>{{$activity->description}}</td>
                                  <td>{{$activity->status}}</td>
                                  <td>{{$activity->activitiesdate}}</td>
                                  @if(Auth::User()->role =="sales")
                                  <td>
                                  <form action="{{ route('deleteactivities', $activity->id)}}" method="POST">
                                  <a href="{{ route('editactivities', $activity->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                                    </form>
                                  </td>
                                  @endif
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
@include ('partials.footer')
@include ('partials.javascript')


      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Create Activity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              @foreach ($planlist as $plan)
                <form method="POST" action="{{route('storeactivities', $plan->id)}}">
                @csrf
                <div class="form-group">
                    <label>Activity Name</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Activity Name" name="name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Activity Description</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Activity Description" name="description">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Activity Date</label>
                    <div class="input-group">
                      <input type="date" class="form-control" placeholder="Activity Date" name="date">
                    </div>
                  </div>

                  <div class="form-group">
                      <div class="control-label">Status</div>
                      <div class="custom-switches-stacked mt-2">
                        <label class="custom-switch">
                          <input type="radio" name="status" value="Incompleted" class="custom-switch-input" checked>
                          <span class="custom-switch-indicator"></span>
                          <span class="custom-switch-description">Incompleted</span>
                        </label>
                        <label class="custom-switch">
                          <input type="radio" name="status" value="Completed" class="custom-switch-input">
                          <span class="custom-switch-indicator"></span>
                          <span class="custom-switch-description">Completed</span>
                        </label>
                      </div>
                    </div>
                  
                  <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                </form>
                @endforeach
              </div>
            </div>
          </div>
        </div>



