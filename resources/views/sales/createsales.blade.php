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
                    <h4>Create Sales Property</h4>
                  </div>
                  <form method="POST" action="{{ route('sales/store') }}">
                  @csrf
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">House Unit</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control @error('unit') is-invalid @enderror" name="unit" value="{{ old('unit') }}">
                        @error('unit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Purchaser Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control @error('purchasername') is-invalid @enderror" name="purchasername" value="{{ old('purchasername') }}">
                        @error('purchasername')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Final Selling By MKH (RM)</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="number" class="form-control @error('purchasername') is-invalid @enderror" name="finalselling" value="{{ old('finalselling') }}">
                        @error('finalselling')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                      </div>
                      <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Net Selling after Rebate (RM)</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="number" class="form-control @error('netselling') is-invalid @enderror" name="netselling" value="{{ old('netselling') }}">
                        @error('netselling')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Commission (%)</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="number" class="form-control @error('commission') is-invalid @enderror" step=".01" name="commission" value="{{ old('commision') }}">
                        @error('commission')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Date of Customer Loan Approved</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="date" class="form-control @error('name') is-invalid @enderror" name="loanapproved" value="{{ old('loanapproved') }}">
                        @error('salesdate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Property</label>
                      <div class="col-sm-12 col-md-7">
                      <select class="form-control form-control-sm @error('propertyid') is-invalid @enderror" name="propertyid" required>
                      <option  value="">Choose Property..</option>    
                      @foreach ($property as $property)
                      <option  value="{{$property->id}}">{{$property->name}}</option>  
                      @endforeach
                      </select>
                         @error('propertyid')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Plan</label>
                      <div class="col-sm-12 col-md-7">
                      <select class="form-control form-control-sm @error('propertyid') is-invalid @enderror" name="planid" required>
                      <option  value="">Choose Plan..</option>  
                      @foreach ($plan as $plan)
                      <option  value="{{$plan->id}}">{{$plan->name}}</option>  
                      @endforeach
                      </select>
                         @error('planid')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                    </div>
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                </form>
                  </div>
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
