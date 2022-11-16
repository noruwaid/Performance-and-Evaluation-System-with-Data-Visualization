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
                    <h4>Edit Plan Activity</h4>
                  </div>

                  <div class="modal-body">
                  @foreach ($plan as $plan)
                        <label>Plan Name   :   <b>{{$plan->name}}</b></label><br>
                        <label>Plan Status :   <b>{{$plan->status}}</b></label><br>
                        <label>Plan Date   :   <b>{{Carbon\Carbon::parse($plan->plandate)->format('d F Y')}}</b></label><br><br>
                    @endforeach
                  @foreach ($planactivity as $plan)
                  <form action="{{route('updateactivities', $plan->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                  <div class="form-group">
                    <label>Activity Name</label>
                    <div class="input-group">
                      <input type="text" class="form-control" value="{{$plan->name}}" name="name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Activity Description</label>
                    <div class="input-group">
                      <input type="text" class="form-control" value="{{$plan->description}}" name="description">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Activity Date</label>
                    <div class="input-group">
                      <input type="date" class="form-control" value="{{ $plan->activitiesdate}}" name="date">
                    </div>
                  </div>

                  <div class="form-group">
                      <div class="control-label">Activity Status</div>
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
@include ('partials.footer')
@include ('partials.javascript')
