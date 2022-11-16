
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
                    <h4>@foreach ($name as $name)
                      {{ $name->name }}
                      @endforeach
                    </h4>
                    
                    @if(Auth::User()->role == 'sales')
                    <a href="{{ route('sales/create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Sales</a>
                    @endif
                  </div>
                  <div class="card-body">
                  @if(session('success'))
                      <div class="alert alert-success">
                        {{session('success')}}
                      </div>
                    @endif 
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                        <thead>
                          <tr>
                              <th>No</th>
                              <th>House Unit</th>
                              <th>Sales</th>
                              <th>Remarks Date</th>
                              <th>Purchaser Name</th>
                              <th>Sales Plan</th>
                              @if(Auth::User()->role != 'sales')
                              <th>Sales Employee</th>
                              <th>Action</th>
                              @endif
                              @if(Auth::User()->role == 'sales')
                              <th>Action</th>
                              @endif
                          </tr>
                        </thead>
                        <tbody>
                        @if(Auth::User()->role != 'sales')
                        @foreach ($sales as $index => $sales)
                        <tr>
                          <td>{{ $index +1 }}</td>
                          <td>{{ $sales->unit }}</td>
                          <td>RM {{ $sales->price }}</td>
                          <td>{{ $sales->remarksdate }}</td>
                          <td>{{ $sales->purchasername }}</td>
                          <td><a href="{{ route('listactivities', $sales->planid)}}" > {{ $sales->planname }}it</a>
                          <td>{{ $sales->name }}</td>
                          <td>
                          @if(Auth::User()->role == 'administrator')
                          <a href="{{ route('salesedit', $sales->id)}}" class="btn btn-warning"><i class="far fa-edit"></i> Edit</a>
                          @endif
                          <a href="{{ route('salesdetails', $sales->id)}}" class="btn btn-primary"><i class="fas fa-info-circle"></i> Detail</a>  
                          </td>
                        </tr>
                        @endforeach
                        @elseif(Auth::User()->role == 'sales')
                        @foreach ($agentsales as $index => $sales)
                        <tr>
                          <td>{{ $index +1 }}</td>
                          <td>{{ $sales->unit }}</td>
                          <td>RM {{ $sales->price }}</td>
                          <td>{{ $sales->remarksdate }}</td>
                          <td>{{ $sales->purchasername }}</td>
                          <td><a href="{{ route('listactivities', $sales->planid)}}" > {{ $sales->planname }}it</a>
                          <td><form action="{{ route('destroy', $sales->id)}}" method="POST">
                          <a href="{{ route('salesdetails', $sales->id)}}" class="btn btn-primary"><i class="fas fa-info-circle"></i> Detail</a>  
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button></td>
                          </form>
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
            
          </section>
 
    </div>
  </div>
@include ('partials.footer')
@include ('partials.javascript')