
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
                    <h4>Attendance Details</h4>
                  </div>
                  <div class="card-body">
                  @if(session('success'))
                  <div class="alert alert-success">
                    {{session('success')}}
                  </div>
                  @endif
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                              <th>No</th>
                              <th>Attendance Date</th>
                              @if (Auth::User()->role =="director")
                              <th>Employee Name</th>
                              @endif
                              <th>Status</th>
                              @if (Auth::User()->role !="director")
                              <th>Action</th>
                              @endif
                          </tr>
                             

                           
                        </thead>
                        <tbody>
                        @if (Auth::User()->role =="director")
                                    @foreach ($attendance as $index => $attendances)
                                    <tr>
                                    <td>{{ $index +1 }}</td>
                                    <td>{{$attendances->date}}</td>
                                        <td>{{$attendances->name}}</td>
                                        <td>{{$attendances->status}}</td>
                                    </tr>
                                    @endforeach
                            @else
                                    @foreach ($attendance as $index => $attendances)
                                    <tr>
                                        <td>{{ $index +1 }}</td>
                                        <td>{{$attendances->date}}</td>
                                        <td>{{$attendances->status}}</td>
                                        <td>
                                            @if ($attendances->status =="Attend" )
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="status" name="status" onchange="this.form.submit()" disabled> 
                                            </div>                                            
                                            @else
                                            @if (Carbon\Carbon::today()->eq($attendances->date))
                                            <form method="post" action="{{ route('attendanceupdate', $attendances->id)}}">
                                                @csrf
                                            <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1" onchange="this.form.submit()">
                                            <label class="custom-control-label" for="customCheck1">Tick</label>
                                            </div>
                                            </form>
                                            @elseif (Carbon\Carbon::today()->gt($attendances->date))
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="status" name="status" onchange="this.form.submit()" disabled> 
                                            </div>
                                            
                                            @endif
                                            @endif
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
          </div>
        </section>
@include ('partials.footer')
@include ('partials.javascript')
