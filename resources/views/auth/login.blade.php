@include ('partials.head')

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>{{ __('Login') }}</h4>
              </div>
              <div class="card-body">
              <form method="POST" action="{{ route('login') }}">
                        @csrf
                  <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">{{ __('Password') }}</label>
                      <div class="float-right">
                      </div>
                    </div>
                    <div class="input-group colorpickerinput">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="fas fa-eye-slash" id="eye"></i>
                      </div>
                        </div>
                      </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                  <div class="form-group">
                    
                  </div>
                  <div class="form-group">
                    <input name type="submit" value="Login"  class="btn btn-primary btn-lg btn-block"/>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="{{ route('register') }}">{{ __('Register') }}</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @include ('partials.javascript')
