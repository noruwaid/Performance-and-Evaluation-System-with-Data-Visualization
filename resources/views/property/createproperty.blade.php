@include ('partials.head')
@include ('partials.navbar')
@include ('partials.sidebar')
@if(Auth::User()->role == 'administrator')
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add Property</h4>
                  </div>
                  <form method="POST" action="{{ route('storeproperty') }}">
                  @csrf
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Property Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{ old('name') }}">
                        @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button onClick="return confirm('Are you sure to add this property?');" class="btn btn-primary">Submit</button>
                      </div>
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
