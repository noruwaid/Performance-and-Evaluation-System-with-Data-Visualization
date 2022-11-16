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
                    <h4>Sales Property Details</h4>
                  </div>
                  <div class="card-body">
                  @if(session('success'))
                  <div class="alert alert-success">
                    {{session('success')}}
                  </div>
                  @endif
                      @foreach ($details as $sales)
                    <div class="form-group row mb-4 col-12">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">House Unit</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control-plaintext @error('unit') is-invalid @enderror" name="unit" value="{{ $sales->unit }}" readonly>
                        @error('unit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                    </div>
                    <div class="form-group row mb-4 col-12">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Property</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control-plaintext @error('unit') is-invalid @enderror" name="unit" value="{{ $sales->propertyname}}" readonly>
                        @error('unit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                    </div>
                    <div class="form-group row mb-4 col-12">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sales Employee</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control-plaintext @error('unit') is-invalid @enderror" name="unit" value="{{ $sales->username}}" readonly>
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
                        <input type="text" class="form-control-plaintext @error('purchasername') is-invalid @enderror" name="purchasername" value="{{ $sales->purchasername}}" readonly>
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
                        <input type="number" class="form-control-plaintext @error('purchasername') is-invalid @enderror" name="finalselling" value="{{ $sales->finalselling}}" readonly>
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
                        <input type="number" class="form-control-plaintext @error('netselling') is-invalid @enderror" name="netselling" value="{{ $sales->netselling}}" readonly>
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
                        <input type="number" class="form-control-plaintext @error('commission') is-invalid @enderror" step=".01" name="commission" value="{{ $sales->commission}}" readonly>
                        @error('commission')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Commission (RM)</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control-plaintext @error('commission') is-invalid @enderror" step=".01" name="commission" value="{{ $sales->commissionprice}}" readonly>
                        @error('commission')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Remarks Date</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="date" class="form-control-plaintext @error('commission') is-invalid @enderror" step=".01" name="commission" value="{{ $sales->remarksdate}}" readonly>
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
                        <input type="date" class="form-control-plaintext @error('name') is-invalid @enderror" name="loanapproved" value="{{ $sales->loanapproved}}" readonly>
                        @error('salesdate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                    </div>
                    @if(Auth::User()->role=="administrator")
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <a href="{{ route('salesedit', $sales->salesid)}}" class="btn btn-primary">Update</a>
                      </div>
                    </div>
                    @endif
                    @endforeach
                    
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
