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
                  <form method="POST" action="{{ route('sales/update') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                      @foreach ($details as $sales)
                    <div class="form-group row mb-4 col-12">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">House Unit</label>
                      <div class="col-sm-12 col-md-7">
                      <input type="hidden" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ $sales->id }}"  >
                        <input type="text" class="form-control @error('unit') is-invalid @enderror" name="unit" value="{{ $sales->unit }}"  >
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
                        <input type="text" class="form-control @error('property') is-invalid @enderror" name="property" value="{{ $sales->propertyname}}"  readonly>
                        @error('property')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                    </div>
                    <div class="form-group row mb-4 col-12">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sales Employee</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $sales->username}}" readonly >
                        @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Purchaser Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control @error('purchasername') is-invalid @enderror" name="purchasername" value="{{ $sales->purchasername}}"  >
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
                        <input type="number" class="form-control @error('finalselling') is-invalid @enderror" step="0.01" name="finalselling" value="{{ $sales->finalselling}}"  >
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
                        <input type="number" class="form-control @error('netselling') is-invalid @enderror" name="netselling" value="{{ $sales->netselling}}"  >
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
                        <input type="number" class="form-control @error('commission') is-invalid @enderror" step=".01" name="commission" value="{{ $sales->commission}}"  >
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
                        <input type="number" class="form-control @error('commissionprice') is-invalid @enderror" step=".01" name="commissionprice" value="{{ $sales->commissionprice}}"  readonly>
                        @error('commissionprice')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Remarks Date</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="date" class="form-control @error('remarksdate') is-invalid @enderror" name="remarksdate" value="{{ $sales->remarksdate}}"  >
                        @error('remarksdate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Date of Customer Loan Approved</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="date" class="form-control @error('loanapproved') is-invalid @enderror" name="loanapproved" value="{{ $sales->loanapproved}}"  >
                        @error('loanapproved')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                    </div>
                    
                    @endforeach
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>
  </div>
@include ('partials.footer')
@include ('partials.javascript')
