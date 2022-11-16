
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
                    <h4>Employee Details</h4>
                  </div>
                  <div class="card-body ">               
                    <div class="table-responsive">
                    @if(session('success'))
                      <div class="alert alert-success">
                        {{session('success')}}
                      </div>
                    @endif     
                    <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                          <th>No</th>
                          <th>Name</th>
                          <th>Date of Birth</th>
                          <th>Job Description</th>
                          <th>Salary</th>
                          <th>Phone Number</th>
                          <th>Action</th>
                          </tr>

                         
                        </thead>
                        <tbody>
                        @foreach ($users as $index => $user)
                        <tr>
                          <td>{{ $index +1 }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->dob }}</td>
                          <td>{{ $user->jobdescription }}</td>
                          <td>RM {{ $user->salary }}</td>
                          <td>+60-{{ $user->phoneno }}</td>
                          <form action="{{ route('employee/destroy', $user->id)}}" method="POST">
                          <td><a href="{{ route('employee/show',$user->id) }}" class="btn btn-primary"><i class="fas fa-info-circle"></i> Detail</a>
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button></td>
                          </form>
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
            
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>
  </div>
@include ('partials.footer')
@include ('partials.javascript')
