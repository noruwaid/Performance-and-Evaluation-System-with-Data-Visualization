
@include ('partials.head')
<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">
                <h4>{{ __('Register') }}</h4>
              </div>
              <div class="card-body">
              <form method="POST" action="{{ route('register') }}">
                        @csrf
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="name">{{ __('Full Name') }}</label>
                      <input id="name" type="text" class="form-control" :value="{{ old('name') }}" name="name" autofocus required>
                    </div>
                    <div class="form-group col-6">
                      <label for="ic">{{ __('IC Number') }}</label>
                      <input id="ic" type="number" class="form-control" name="ic" :value="{{ old('ic') }}"  autofocus required>
                    </div>
                  </div>
				  <div class="row">
                    <div class="form-group col-6">
                      <label for="email">{{ __('E-Mail Address') }}</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                
                    </div>
                    <div class="form-group col-6">
                      <label for="salary">{{ __('Salary') }}</label>
                      <input id="salary" type="number" class="form-control" name="salary" :value="{{ old('salary') }}" autofocus required>
                    </div>
                  </div>
				  <div class="row">
                    <div class="form-group col-6">
                      <label for="startdate">{{ __('Start Date') }}</label>
                      <input id="startdate" type="date" class="form-control" name="startdate" :value="{{ old('startdate') }}"  autofocus required>
                    </div>
                    <div class="form-group col-6">
                      <label for="education">{{ __('Education') }}</label>
                      <input id="education" type="text" class="form-control"  :value="{{ old('education') }}" name="education"  autofocus required>
                    </div>
                  </div>
				  <div class="row">
                    <div class="form-group col-6">
                      <label for="jobdescription">{{ __('Job Description') }}</label>
                      <input id="jobdescription" type="text" class="form-control" name="jobdescription" :value="{{ old('jobdescription') }}"  autofocus required>
                    </div>
                    <div class="form-group col-6">
                      <label for="role">{{ __('Department') }}</label>
                      <div>
                      <div class="pretty p-icon p-curve p-tada">
                        <input type="radio" name="role" value="administrator">
                        <div class="state p-warning">
                        <i class="icon material-icons">done</i>
                          <label>Administration</label>
                        </div>
                      </div>
                      <div class="pretty p-icon p-curve p-tada">
                        <input type="radio" name="role" value="sales">
                        <div class="state p-warning">
                        <i class="icon material-icons">done</i>
                          <label>Sales</label>
                        </div>
                     </div>
                      </div>
                    </div>
                  </div>
				  <div class="row">
                    <div class="form-group col-6">
                      <label for="dob">{{ __('Date of Birth') }}</label>
                      <input id="dob" type="date" class="form-control" name="dob" :value="{{ old('dob') }}"  autofocus required>
                    </div>
                    <div class="form-group col-6">
                      <label for="phone">{{ __('Phone Number +60') }}</label>
                      <input id="phoneno" type="number" class="form-control" :value="{{ old('phoneno') }}" name="phoneno"  placeholder="Example: 119291919" autofocus required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="address">{{ __('Address') }}</label>
                    <input  :value="{{ old('name') }}" id="address" type="textarea" class="form-control" name="address" :value="{{ old('address') }}"  autofocus required>
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">{{ __('Password') }}</label>
                      
                      <div class="input-group colorpickerinput">
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                      <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="fas fa-eye-slash" id="eye"></i>
                      </div>
                      </div>
                      
                      @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                        </div>
                      </div>
						                    
                      <div class="form-group col-6">
                      <label for="passwordconfirm" class="d-block">{{ __('Confirm Password') }}</label>
                      
                      
                        <div class="input-group colorpickerinput">
                      
                      <input id="passwordconfirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                      <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="fas fa-eye-slash" id="eye2"></i>
                      </div>
                        </div>
                      
                        @error('passwordconfirm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                      </div>
                    </div>
                            
                  </div>
                  <div class="form-group">
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Register" name"{{ __('Register') }}" class="btn btn-primary btn-lg btn-block">
                  </div>
                </form>
              </div>
              <div class="mb-4 text-muted text-center">
                Already Registered? <a href="{{ route('login') }}">{{ __('Login') }}</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  @include ('partials.javascript')

