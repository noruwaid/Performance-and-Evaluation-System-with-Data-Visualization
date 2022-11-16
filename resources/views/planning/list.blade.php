
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
                    <h4>Planning Details</h4>
                    <div class="card-body">
                    @if (Auth::User()->role =="sales")
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Create Plan</button>
                    @endif
                  </div>
                  </div>
                  <div class="card-body">
                  @if(session('success'))
                  <div class="alert alert-success">
                    {{session('success')}}
                  </div>
                  @endif
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                              <th>No</th>
                              <th>Plan Name</th>
                              <th>Plan Date</th>
                              <th>Plan Status</th>
                              @if (Auth::User()->role!="sales")
                              <th>Sales Employee</th>
                              @endif
                                  <th>Suggestion</th>
\                              <th>Action</th>
                          </tr>

                        </thead>
                        <tbody>
                          @if (Auth::User()->role == "sales")
                          @foreach ($planlist as $index => $plan)
                            <tr>
                                  <td>{{$index +1}}</td>
                                  <td>{{$plan->name}}</td>
                                  <td>{{Carbon\Carbon::parse($plan->plandate)->format('d F Y')}}</td>
                                  <td>{{$plan->status}}</td>
                                  @if (Auth::User()->role != "sales")
                                  <td>Sales Employee</td>
                                  @endif
                                  <td>{{$plan->suggestion}}</td>
                                  <td>
                                    <form action="{{ route('deleteplanning', $plan->id)}}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <a href="{{ route('editplanning', $plan->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                      <a href="{{ route('listactivities', $plan->id)}}" class="btn btn-primary"><i class="fas fa-info-circle"></i> Detail</a>
                                      
                                      <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                                    </form>
                                  </td>
                              </tr>
                              @endforeach
                              @elseif (Auth::User()->role != "sales")
                              @foreach ($directorplanview as $index => $plan)
                            <tr>
                                  <td>{{$index +1}}</td>
                                  <td>{{$plan->name}}</td>
                                  <td>{{Carbon\Carbon::parse($plan->date)->format('d F Y')}}</td>
                                  <td>{{$plan->status}}</td>
                                  <td>{{$plan->user['name']}}</td>
                                  <td>{{$plan->suggestion}}</td>
                                  
                                  <td>
                                    @if(Auth::User()->role=="director")
                                      <a href="{{ route('editplanning', $plan->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                    @endif
                                      <a href="{{ route('listactivities', $plan->id)}}" class="btn btn-primary"><i class="fas fa-info-circle"></i> Detail</a>
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Create Plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{ route('storeplanning') }}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label>Plan Name</label>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Plan Name" name="name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Plan Date</label>
                    <div class="input-group">
                      <input type="date" class="form-control" placeholder="Plan Date" name="date">
                    </div>
                  </div>                  
                  <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        