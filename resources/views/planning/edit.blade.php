@include ('partials.head')
@include ('partials.navbar')
@include ('partials.sidebar')
@if(Auth::User()->role == 'sales')
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Plan</h4>
                  </div>
                  @foreach ($planlist as $plan)
                  <div class="modal-body">
                  <form action="{{route('updateplanning', $plan->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                  <div class="form-group">
                    <label>Plan Name</label>
                    <div class="input-group">
                      <input type="text" class="form-control" value="{{$plan->name}}" name="name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Plan Date</label>
                    <div class="input-group">
                      <input type="date" class="form-control" value="{{ $plan->plandate}}" name="date">
                    </div>
                  </div>

                  <div class="form-group">
                      <div class="control-label">Status</div>
                      <div class="custom-switches-stacked mt-2">
                      @if ($plan->status == "Incompleted")
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
                        @else
                        <label class="custom-switch">
                          <input type="radio" name="status" value="Incompleted" class="custom-switch-input" >
                          <span class="custom-switch-indicator"></span>
                          <span class="custom-switch-description">Incompleted</span>
                        </label>
                        <label class="custom-switch">
                          <input type="radio" name="status" value="Completed" class="custom-switch-input" checked>
                          <span class="custom-switch-indicator"></span>
                          <span class="custom-switch-description">Completed</span>
                        </label>
                        @endif
                      </div>
                    </div>
                  
                  <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                </form>
                </div>
                @endforeach
                  </div>
                </div>
              </div>
            </div>
        </section>
    </div>
  </div>
@endif

@if(Auth::User()->role == 'director')
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Plan</h4>
                  </div>
                  @foreach ($planlist as $plan)
                  <div class="modal-body">
                  <form action="{{route('updateplanning', $plan->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                  <div class="form-group">
                    <label>Plan Name</label>
                    <div class="input-group">
                      <input type="text" class="form-control" value="{{$plan->name}}" name="name" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Plan Date</label>
                    <div class="input-group">
                      <input type="date" class="form-control" value="{{ $plan->plandate}}" name="date" disabled>
                    </div>
                  </div>

                  <div class="form-group">
                      <div class="control-label">Status</div>
                      <div class="custom-switches-stacked mt-2">
                      @if ($plan->status == "Incompleted")
                        <label class="custom-switch">
                          <input type="radio" name="status" value="Incompleted" class="custom-switch-input" checked disabled>
                          <span class="custom-switch-indicator"></span>
                          <span class="custom-switch-description">Incompleted</span>
                        </label>
                        <label class="custom-switch">
                          <input type="radio" name="status" value="Completed" class="custom-switch-input" disabled>
                          <span class="custom-switch-indicator"></span>
                          <span class="custom-switch-description">Completed</span>
                        </label>
                        @else
                        <label class="custom-switch">
                          <input type="radio" name="status" value="Incompleted" class="custom-switch-input" disabled>
                          <span class="custom-switch-indicator"></span>
                          <span class="custom-switch-description">Incompleted</span>
                        </label>
                        <label class="custom-switch">
                          <input type="radio" name="status" value="Completed" class="custom-switch-input" checked disabled>
                          <span class="custom-switch-indicator"></span>
                          <span class="custom-switch-description">Completed</span>
                        </label>
                        @endif
                      </div>
                    </div>
                    <div class="form-group">
                    <label>Plan Suggestion</label>
                    <div class="input-group">
                      <input type="text" class="form-control" value="{{$plan->suggestion}}" name="suggestion">
                    </div>
                  </div>
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                              <th>No</th>
                              <th>Plan Name</th>
                              <th>Plan Date</th>
                              <th>Plan Status</th>
                          </tr>

                        </thead>
                        <tbody>
                          @if (Auth::User()->role == "director")
                          @foreach ($directorplanview as $index => $plan)
                            <tr>
                                  <td>{{$index +1}}</td>
                                  <td>{{$plan->name}}</td>
                                  <td>{{Carbon\Carbon::parse($plan->activitiesdate)->format('d F Y')}}</td>
                                  <td>{{$plan->status}}</td>
                                  @if (Auth::User()->role!="administrator" and ($plan->suggestion != null))
                                  <td>Suggestion</td>
                                  @endif
                                   
                              </tr>
                            @endforeach
                            @endif
                        </tbody>
                      </table>
                    </div>
                  </div>
                  
                  <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                </form>
                </div>
                
                @endforeach
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
