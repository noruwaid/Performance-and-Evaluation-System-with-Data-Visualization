
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
                    <div class="table-responsive">
                    @if(session('success'))
                  <div class="alert alert-success">
                     {{session('success') }}
                  </div>
                  @endif
                      <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                        <thead>
                          <tr>
                          <th>No</th>
                              <th>Attendance Date</th>
                              @if(Auth::User()->role != "director")
                              <th>Status</th>
                              @endif
                              <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @if(Auth::User()->role == "director")
                          @foreach ($attendance as $index => $attendances)
                            <tr>
                            <td>{{ $index +1 }}</td>
                                <td>{{$attendances->attendancedate}}</td>
                                <td><a href="{{ route('showattendance', $attendances->id)}}" class="btn btn-primary"><i class="fas fa-info-circle"></i> Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                        @foreach ($attendance as $index => $attendances)
                            <tr>
                            <td>{{ $index +1 }}</td>
                                <td>{{$attendances->date}}</td>
                                <td>{{$attendances->status}}</td>
                                <td><a href="{{ route('showattendance', $attendances->id)}}" class="btn btn-primary"><i class="fas fa-info-circle"></i> Detail</a>
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



@include ('partials.footer')
@include ('partials.javascript')


