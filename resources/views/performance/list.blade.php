
@include ('partials.head')
@include ('partials.navbar')
@include ('partials.sidebar')
@if(Auth::User()->role=="administrator")
<div class="main-content">
        <section class="section">
          <div class="section-body">
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Evaluate Your Colleague</h4>
                    <div class="card-body">
                  </div>        
                  </div>
                  <div class="card-body">
                  @if(session('success'))
                  <div class="alert alert-success">
                     {{session('success') }}
                  </div>
                  @endif
                  <div>
                  </div>
                    <div class="table-responsive">
                    <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                        <thead>
                          <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Action</th>
                          </tr>

                         
                        </thead>
                        <tbody>
                        @foreach ($administrator as $index => $administrator)
                            <tr>
                                  <td>{{$index +1}}</td>
                                  <td>{{$administrator->name}}</td>
                                  <td>
                                  <a href="  {{route('performance/edit', $administrator->teamworkid)}} " class="btn btn-warning"><i class="fas fa-edit"></i> Evaluate</a>                      
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
          </div>
        </section>
@elseif(Auth::User()->role=="sales")
<div class="main-content">
        <section class="section">
          <div class="section-body">
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Evaluate Your Colleague</h4>
                    <div class="card-body">
                  </div>        
                  </div>
                  <div class="card-body">
                  @if(session('success'))
                  <div class="alert alert-success">
                     {{session('success') }}
                  </div>
                  @endif
                  <div>
                  </div>
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="table-1" style="width:100%;">
                        <thead>
                          <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Action</th>
                          </tr>

                         
                        </thead>
                        <tbody>
                        @foreach ($administrator as $index => $administrator)
                            <tr>
                                  <td>{{$index +1}}</td>
                                  <td>{{$administrator->name}}</td>
                                  <td>
                                  <a href="  {{route('performance/edit', $administrator->teamworkid)}} " class="btn btn-warning"><i class="fas fa-edit"></i> Evaluate</a>                      
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
      
          </div>
        </section>
@endif
@include ('partials.footer')
@include ('partials.javascript')

