
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
                  <h4>Property</h4>
              @if(Auth::User()->role == 'administrator')
              <a href="{{ route('createproperty') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Property</a>
              @endif
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
                              <th>Property Name</th>
                              <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($property as $index => $property)
                            <tr>
                                <td>{{ $index +1 }}</td>
                                <td>{{$property->name}}</td>
                                <td>
                                @if(Auth::User()->role == 'administrator')
                                <a href="{{ route('propertyedit', $property->id)}}" class="btn btn-warning"><i class="far fa-edit"></i> Edit</a>
                                @endif 
                                <a href="{{ route('salesview', $property->id)}}" class="btn btn-primary">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>



@include ('partials.footer')
@include ('partials.javascript')