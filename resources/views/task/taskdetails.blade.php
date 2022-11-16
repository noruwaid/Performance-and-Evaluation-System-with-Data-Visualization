
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
                    <h4>View Task</h4>
                  </div>
                  
                  <div class="card-body">
                  @if(session('success'))
                      <div class="alert alert-success">
                        {{session('success')}}
                      </div>
                    @endif   
                    <form method="POST" action="">
                      @csrf
                      @foreach ($task as $task)
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control-plaintext" name="name" placeholder="" readonly value="{{ $task->name }}">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">End Date</label>
                      <div class="col-sm-12 col-md-4">
                      <input type="datetime" class="form-control-plaintext " name="enddate" value="{{ $task->enddate }}" readonly/>
                        </div>
                    </div>
                    @if(Auth::User()->role == 'director')
                    <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Assign To</label>
                    <div class="col-sm-12 col-md-7">
                    @foreach ($db as $db)
                    @if (is_null($db->rolename))
                    <div class="selectgroup selectgroup-pills pretty p-default">
                        <label class="selectgroup-item">
                          <input name="userid[]" value="{{ $db->id }}" class="selectgroup-input" readonly>
                          <span class="selectgroup-button">{{ $db->username }}</span>
                        </label>
                      </div>
                      @else
                    <div class="selectgroup selectgroup-pills pretty p-default">
                        <label class="selectgroup-item">
                          <input name="userid[]" value="{{ $db->id }}" class="selectgroup-input" readonly>
                          <span class="selectgroup-button">{{ $db->username }} - {{$db->rolename}}</span>
                        </label>
                      </div>
                      @endif
                    @endforeach
                    
                    </div>
                    </div>
                    @endif

                    <!--<div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control-plaintext selectric">
                          <option>Tech</option>
                          <option>News</option>
                          <option>Political</option>
                        </select>
                      </div>
                    </div>-->
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control-plaintext" name="description" placeholder="{{ $task->description }}" readonly>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                      <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control-plaintext" name="description" placeholder="{{ $task->status }}" readonly>
                      </div>
                    </div>
                    @if($task->filepath !=null)   
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">File</label>
                      <div class="col-sm-12 col-md-7">
                      <a href="{{ asset('/files/'.$task->filepath) }}" target="_blank">{{ $task->filepath }}</a>
                      </div>
                    </div>
                    @else 
                    <div class="form-group row mb-4">
                    </div>
                    @endif
                    @if($task->content !=null)   
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                      <div class="col-sm-12 col-md-7">
                        {!!$task->content!!}
                      </div>
                    </div>
                    @else
                    <div class="form-group row mb-4">
                    </div>
                    @endif
                    @endforeach
                    </form>

                    @if($task->status =='Assigned')         
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <a href="{{ route('task.edit', $task->id)}}" class="btn btn-primary">Update</a>
                      </div>
                    </div>
                    @else
                    <div class="form-group row mb-4">
                    </div>
                    @endif
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
