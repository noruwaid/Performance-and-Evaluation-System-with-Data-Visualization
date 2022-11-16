@include ('partials.head')
@include ('partials.navbar')
@include ('partials.sidebar')
<div class="main-content">
        <section class="section">
          <div class="section-body">
            @if(Auth::User()->role == "director")
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>List of Employee Pre-evaluation</h4>
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
                            <th>No.</th>
                            @if (Auth::User()->role == "director")
                            <th>Name</th>
                            @endif
                            <th>Recorded Date</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @if (Auth::User()->role == "director")
                        @foreach ($evaluation as $index => $evaluations)
                          <tr>
                            <td>{{ $index +1 }}</td>
                            <td>{{ $evaluations->name}}</td>
                            <td>{{ $evaluations->recordeddate}}</td>
                            <td>{{ $evaluations->status}}</td>
                            <td>
                            @if (Auth::User()->jobdescription == "boss")
                            <a href="{{ route('createevaluation', $evaluations->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Create Employee Evaluation</a>
                            @endif
                          </tr>
                        @endforeach
                        @elseif (Auth::User()->role == "administrator")
                        @foreach ($evaluation as $index => $evaluations)
                        <tr>
                            <td>{{ $index +1 }}</td>
                            <td>{{ $evaluations->recordeddate}}</td>
                            <td>
                          </tr>
                          @endforeach
                        @elseif (Auth::User()->role == "sales")
                        @foreach ($evaluation as $index => $evaluations)
                        <tr>
                            <td>{{ $index +1 }}</td>
                            <td>{{ $evaluations->recordeddate}}</td>
                            <td>
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
            @endif
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Employee Evaluation Result</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="table-1" style="width:100%;">
                        <thead>
                          <tr>
                            <th>No.</th>
                            @if (Auth::User()->role == "director")
                            <th>Name</th>
                            @endif
                            <th>Recorded Date</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @if (Auth::User()->role == "director")
                        @foreach ($evaluatedevaluation as $index => $evaluations)
                          <tr>
                            <td>{{ $index +1 }}</td>
                            <td>{{ $evaluations->name}}</td>
                            <td>{{ $evaluations->recordeddate}}</td>
                            <td>{{ $evaluations->status}}</td>
                            <td>
                            <a href="{{ route('showevaluation', $evaluations->id)}}" class="btn btn-primary"><i class="fas fa-info"></i> Details</a>
                            @if (Auth::User()->jobdescription == "boss")
                            <a href="{{ route('editevaluation', $evaluations->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Update</a>
                            @endif
                          </tr>
                        @endforeach
                        @elseif (Auth::User()->role == "administrator")
                        @foreach ($evaluatedevaluation as $index => $evaluations)
                        <tr>
                            <td>{{ $index +1 }}</td>
                            <td>{{ $evaluations->recordeddate}}</td>
                            <td>{{ $evaluations->status}}</td>
                            <td>
                            <a href="{{ route('showevaluation', $evaluations->id)}}" class="btn btn-primary"><i class="fas fa-info"></i> Details</a>
                            </td>
                          </tr>
                          @endforeach
                        @elseif (Auth::User()->role == "sales")
                        @foreach ($evaluatedevaluation as $index => $evaluations)
                        <tr>
                            <td>{{ $index +1 }}</td>
                            <td>{{ $evaluations->recordeddate}}</td>
                            <td>{{ $evaluations->status}}</td>
                            <td>
                            <a href="{{ route('showevaluation', $evaluations->id)}}" class="btn btn-primary"><i class="fas fa-info"></i> Details</a>
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
