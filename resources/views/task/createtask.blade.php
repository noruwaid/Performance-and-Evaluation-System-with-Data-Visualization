
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
                    <h4>Add Task</h4>
                  </div>
                  <form method="POST" action="{{ route('storetask') }}" enctype="multipart/form-data">
                      @csrf
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
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
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">End Date</label>
                      <div class="col-sm-12 col-md-4">
                        <input type="datetime-local" class="form-control datetimepicker @error('enddate') is-invalid @enderror" name="enddate" placeholder="{{ old('enddate') }}"  min="<?php echo date('Y-m-d'); ?>">
                        @error('enddate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Assign To</label>
                    <div class="col-sm-12 col-md-7">
                    @foreach ($users as $user)
                    <div class="selectgroup selectgroup-pills pretty p-default">
                        <label class="selectgroup-item">
                          <input type="checkbox" name="userid[]" value="{{ $user->id }}" class="selectgroup-input @error('userid[]') is-invalid @enderror">
                          @error('userid[]')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          <span class="selectgroup-button">{{ $user->name }}</span>
                        </label>
                      </div>
                    @endforeach
                    </div>
                    </div>
                    <!--<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric">
                          <option>Tech</option>
                          <option>News</option>
                          <option>Political</option>
                        </select>
                      </div>
                    </div>-->
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="{{ old('description') }}">
                        @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">File</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="file" name="file" id="file" placeholder="" >
                      
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea class="summernote" name="content" placeholder="{{ old('content') }}"></textarea>
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
@include ('partials.footer')
@include ('partials.javascript')
