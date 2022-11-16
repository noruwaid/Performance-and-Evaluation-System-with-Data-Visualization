
@include ('partials.head')
@include ('partials.navbar')
@include ('partials.sidebar')
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                  <div class="card-body">
                    <div class="author-box-center">
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <a href="#">{{ Auth::user()->name }}</a>
                      </div>
                      <div class="author-box-job">{{ Auth::user()->jobdescription }}</div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4>Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="py-4">
                      <p class="clearfix">
                        <span class="float-left">
                          Birthday
                        </span>
                        <span class="float-right text-muted">
                        {{ Auth::user()->dob }}
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Phone
                        </span>
                        <span class="float-right text-muted">
                          +60-{{ Auth::user()->phoneno }}
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Mail
                        </span>
                        <span class="float-right text-muted">
                        {{ Auth::user()->email }}
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Department
                        </span>
                        <span class="float-right text-muted">
                        {{ Auth::user()->role }}
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Age
                        </span>
                        <span class="float-right text-muted">
                        {{ app\User::age() }}
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                <div class="card-body">
                    <div class="author-box-center">
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <center><a href="">{{ Auth::user()->name }}</a></center>
                      </div>
                      <center> <div class="author-box-job">{{ Auth::user()->jobdescription }}</div></center>
                    </div>
                </div>
                  <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                          aria-selected="true">About</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                          aria-selected="false">Setting</a>
                      </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                        <div class="row">
                          <div class="col-md-3 col-6 b-r">
                            <strong>IC Number</strong>
                            <br>
                            <p class="text-muted">{{ Auth::user()->ic }}</p>
                          </div>
                          <div class="col-md-3 col-6 b-r">
                            <strong>Salary</strong>
                            <br>
                            <p class="text-muted">RM {{ Auth::user()->salary }}</p>
                          </div>
                          <div class="col-md-3 col-6 b-r">
                            <strong>Start Date</strong>
                            <br>
                            <p class="text-muted">{{ Auth::user()->startdate }}</p>
                          </div>
                          <div class="col-md-3 col-6 b-r">
                            <strong>Duration</strong>
                            <br>
                            <p class="text-muted">{{ app\User::duration() }}</p>
                          </div>
                        </div>
                        <div class="section-title">Education</div>
                        {!!Auth::user()->education!!}
                        <div class="section-title">Address</div>
                        <ul>
                          <li>{{ Auth::user()->address }}</li>
                        </ul>
                      </div>
                      <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                          <div class="card-header">
                            <h4>Edit Profile</h4>
                          </div>
                           @if(session('success'))
                      <div class="alert alert-success">
                        {{session('success')}}
                      </div>
                    @endif   
                          @foreach ($user as $user)
                          <form method="POST" action="{{ route('updateprofile') }}" enctype="multipart/form-data">
                          @csrf
                          <div class="card-body">
                            <div class="row">
                              <div class="form-group col-md-6 col-12">
                                <label>Full Name</label>
                                <input type="hidden" class="form-control" name="id" value="{{$user->id}}">
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                      
                              </div>
                              <div class="form-group col-md-6 col-12">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-6 col-12">
                                <label>IC Number</label>
                                <input type="number" class="form-control" name="ic" value="{{ $user->ic }}">
                              </div>
                              <div class="form-group col-md-6 col-12">
                                <label>Salary</label>
                                <input type="number" class="form-control" name="salary" value="{{ $user->salary }}">
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-6 col-12">
                                <label>Phone Number: +60</label>
                                <input type="number" class="form-control" name="phoneno" value="{{ $user->phoneno }}">
                              </div>
                              <div class="form-group col-md-6 col-12">
                                <label>Start Date</label>
                                <input type="date" class="form-control" name="startdate" value="{{ $user->startdate }}">
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-6 col-12">
                                <label>Date of Birth</label>
                                <input type="date" class="form-control" name="dob" value="{{ $user->dob }}">
                              </div>
                              <div class="form-group col-md-6 col-12">
                                <label>Job Description</label>
                                <input type="text" class="form-control" name="jobdescription" value="{{ $user->jobdescription }}">
                              </div>
                            </div>
                            
                            <div class="row">
                              <div class="form-group col-md-12 col-12">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" value="{{ $user->password }}"> 
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-12">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" value="{{ $user->address }}"> 
                              </div>
                            </div>

                            <div class="row">
                              <div class="form-group col-12">
                                <label>Education</label>
                                <textarea style="height:4px;" class="summernote" name="education">{{ $user->education }}</textarea>
                              </div>
                            </div>

                          </div>
                          <div class="card-footer text-left">
                          <button class="btn btn-primary">Submit</button>
                          </div>

                        </form>
                        @endforeach

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
@include ('partials.footer')
@include ('partials.javascript')
