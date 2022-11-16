
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
                    <h4>Edit Task</h4>
                  </div>                  
                  <div class="card-body">
                  @if(session('success'))
                      <div class="alert alert-success">
                        {{session('success')}}
                      </div>
                    @endif   
                  @foreach ($task as $task)
                  @if (($task->roleid == null) and (Auth::User()->role == "administrator") and ($task->helpstatus == "Does Not Require Help"))
                  <form method="POST" action="{{ route('updaterole')}}">
                    @csrf

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Choose your role!</label>
                      <div class="col-sm-12 col-md-7">
                      <div class="selectgroup selectgroup-pills pretty p-default">
                        <label class="selectgroup-item">
                        <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="taskid" value="{{ $task->taskid }}">
                          <input type="radio" name="rolename" value="Submitter" class="selectgroup-input">
                          <span class="selectgroup-button">Submitter</span>
                        </label>
                        <label class="selectgroup-item">
                          <input type="radio" name="rolename" value="Doer" class="selectgroup-input">
                          <span class="selectgroup-button">Doer</span>
                        </label>
                      </div>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                    </div>
                  </form>
                    <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="name" value="{{ $task->name }}"  @if(Auth::User()->role == 'administrator') readonly @endif>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">End Date</label>
                      <div class="col-sm-12 col-md-3">
                        <input type="hidden" name="id" value="{{ $task->taskid }}">
                        <input type="datetime-local" class="form-control datetimepicker " name="enddate" value="{{ Carbon\Carbon::parse($task->enddate)->format('Y-m-d\TH:i')}}" @if(Auth::User()->role == 'administrator') readonly @endif>
                      </div>
                    </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="description" value="{{ $task->description }}" @if(Auth::User()->role == 'administrator') readonly @endif>
                      </div>
                    </div>
                    </div>                  
                  @elseif (($task->helpstatus == null) or ($task->roleid != null))
                  <form method="POST" action="{{ route('taskupdate') }}" enctype="multipart/form-data">
                      @csrf
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="name" value="{{ $task->name }}"  @if(Auth::User()->role == 'administrator') readonly @endif>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">End Date</label>
                      <div class="col-sm-12 col-md-3">
                        <input type="hidden" name="id" value="{{ $task->taskid }}">
                        <input type="datetime-local" class="form-control datetimepicker " name="enddate" value="{{ Carbon\Carbon::parse($task->enddate)->format('Y-m-d\TH:i')}}" @if(Auth::User()->role == 'administrator') readonly @endif>
                      </div>
                    </div>
                        @if(Auth::User()->role == 'administrator')
                        <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                          <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="description" value="{{ $task->roleid }}"  readonly>
                          </div>
                        </div>
                        @endif
                              @if(Auth::User()->role == 'director')
                              <div class="form-group row mb-4">
                              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Assign To</label>
                              <div class="col-sm-12 col-md-7">
                              @foreach ($users as $user)
                              @if($db->contains('id', $user->id))
                              <div class="selectgroup selectgroup-pills pretty p-default">
                                  <label class="selectgroup-item">
                                    <input type="checkbox" name="userid[]" value="{{ $user->id }}" class="selectgroup-input" checked onclick="return false;" >
                                    <span class="selectgroup-button">{{ $user->name }}</span>
                                  </label>
                                </div>
                              @else
                              <div class="selectgroup selectgroup-pills pretty p-default">
                                  <label class="selectgroup-item">
                                    <input type="checkbox" name="userid[]" value="{{ $user->id }}" class="selectgroup-input" onclick="return false;" >
                                    <span class="selectgroup-button">{{ $user->name }}</span>
                                  </label>
                                </div>
                                @endif
                              @endforeach
                              </div>
                              </div>
                              </div>
                              @endif
            
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="description" value="{{ $task->description }}" @if(Auth::User()->role == 'administrator') readonly @endif>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">File</label>
                      <div class="col-sm-12 col-md-3">
                        <input type="file" name="file" id="file" value="{{ $task->filepath }}" placeholder=" ">
                      </div>
                          @if($task->filepath !=null)   
                          <div class="col-sm-12 col-md-5">
                          <a href="{{ asset('/files/'.$task->filepath) }}" target="_blank">{{ $task->filepath }}</a>
                          <a href="{{ route('file.delete',$task->taskid) }}" class="btn btn-light">
                          <i class="fas fa-times"></i> Delete
                          </a>
                          </div>
                          @endif
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea class="summernote" name="content" placeholder="{{ old('content') }}" value="{{ $task->content }}">{{ $task->content }}</textarea>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                    @elseif (($task->helpstatus == "Require Help") and (Auth::User()->role == 'director'))
                    <form method="POST" action="{{ route('taskupdate') }}" enctype="multipart/form-data">
                      @csrf
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="name" value="{{ $task->name }}"  readonly>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">End Date</label>
                      <div class="col-sm-12 col-md-3">
                        <input type="hidden" name="id" value="{{ $task->taskid }}">
                        <input type="datetime-local" class="form-control datetimepicker " name="enddate" value="{{ Carbon\Carbon::parse($task->enddate)->format('Y-m-d\TH:i')}}" readonly>
                      </div>
                    </div>
                    @if(Auth::User()->role == 'administrator')
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="description" value="{{ $task->roleid }}"  readonly>
                      </div>
                    </div>
                    @endif
                    @if(Auth::User()->role == 'director')
                    <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Assign To</label>
                    <div class="col-sm-12 col-md-7">
                    @foreach ($users as $user)
                    @if($db->contains('id', $user->id))
                    <div class="selectgroup selectgroup-pills pretty p-default">
                        <label class="selectgroup-item">
                          <input type="checkbox" name="userid[]" value="{{ $user->id }}" class="selectgroup-input" checked onclick="return false;" >
                          <span class="selectgroup-button">{{ $user->name }}</span>
                        </label>
                      </div>
                    @else
                    <div class="selectgroup selectgroup-pills pretty p-default">
                        <label class="selectgroup-item">
                          <input type="checkbox" name="userid[]" value="{{ $user->id }}" class="selectgroup-input" onclick="return false;" >
                          <span class="selectgroup-button">{{ $user->name }}</span>
                        </label>
                      </div>
                      @endif
                    @endforeach
                    </div>
                    </div>
                    </div>
                    @endif
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="description" value="{{ $task->description }}" readonly>
                     </div>
                    </div>
                    @if($task->filepath !=null)   
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">File</label>
                      <div class="col-sm-12 col-md-5">
                      <a href="{{ asset('/files/'.$task->filepath) }}" target="_blank">{{ $task->filepath }}</a>
                      </a>
                      </div>
                    </div>
                    @endif

                    @if($task->content !=null)
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                      <div class="col-sm-12 col-md-7">
                      {!!$task->content!!}
                      </div>
                    </div>
                    @endif
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Suggestion</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="suggestion" value="{{$task->suggestion}}" >
                     </div>
                    </div>


                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                    </form>



                    @elseif (($task->helpstatus == "Require Help") and (Auth::User()->role == 'administrator'))
                    <form method="POST" action="{{ route('taskupdate') }}" enctype="multipart/form-data">
                      @csrf
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="name" value="{{ $task->name }}"  readonly>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="name" value="{{ $task->helpstatus }}"  readonly>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">End Date</label>
                      <div class="col-sm-12 col-md-3">
                        <input type="hidden" name="id" value="{{ $task->taskid }}">
                        <input type="datetime-local" class="form-control datetimepicker " name="enddate" value="{{ Carbon\Carbon::parse($task->enddate)->format('Y-m-d\TH:i')}}" readonly>
                      </div>
                    </div>
                    @if(Auth::User()->role == 'administrator')
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="description" value="{{ $task->roleid }}"  readonly>
                      </div>
                    </div>
                    @endif
                    @if(Auth::User()->role == 'director')
                    <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Assign To</label>
                    <div class="col-sm-12 col-md-7">
                    @foreach ($users as $user)
                    @if($db->contains('id', $user->id))
                    <div class="selectgroup selectgroup-pills pretty p-default">
                        <label class="selectgroup-item">
                          <input type="checkbox" name="userid[]" value="{{ $user->id }}" class="selectgroup-input" checked onclick="return false;" >
                          <span class="selectgroup-button">{{ $user->name }}</span>
                        </label>
                      </div>
                    @else
                    <div class="selectgroup selectgroup-pills pretty p-default">
                        <label class="selectgroup-item">
                          <input type="checkbox" name="userid[]" value="{{ $user->id }}" class="selectgroup-input" onclick="return false;" >
                          <span class="selectgroup-button">{{ $user->name }}</span>
                        </label>
                      </div>
                      @endif
                    @endforeach
                    </div>
                    </div>
                    </div>
                    @endif
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Suggestion</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="suggestion" value="{{$task->suggestion}}" readonly>
                     </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">File</label>
                      <div class="col-sm-12 col-md-3">
                        <input type="file" name="file" id="file" value="{{ $task->filepath }}" placeholder=" ">
                      </div>
                          @if($task->filepath !=null)   
                          <div class="col-sm-12 col-md-5">
                          <a href="{{ asset('/files/'.$task->filepath) }}" target="_blank">{{ $task->filepath }}</a>
                          <a href="{{ route('file.delete',$task->taskid) }}" class="btn btn-light">
                          <i class="fas fa-times"></i> Delete
                          </a>
                          </div>
                          @endif
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea class="summernote" name="content" placeholder="{{ old('content') }}" value="{{ $task->content }}">{{ $task->content }}</textarea>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                    </form>


                    @elseif (($task->helpstatus == "Does Not Require Help") and (Auth::User()->role == 'director'))
                    <form method="POST" action="{{ route('taskupdate') }}" enctype="multipart/form-data">
                      @csrf
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="name" value="{{ $task->name }}" >
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">End Date</label>
                      <div class="col-sm-12 col-md-3">
                        <input type="hidden" name="id" value="{{ $task->taskid }}">
                        <input type="datetime-local" class="form-control datetimepicker " name="enddate" value="{{ Carbon\Carbon::parse($task->enddate)->format('Y-m-d\TH:i')}}" >
                      </div>
                    </div>
                    @if(Auth::User()->role == 'administrator')
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="description" value="{{ $task->roleid }}"  >
                      </div>
                    </div>
                    @endif
                    @if(Auth::User()->role == 'director')
                    <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Assign To</label>
                    <div class="col-sm-12 col-md-7">
                    @foreach ($users as $user)
                    @if($db->contains('id', $user->id))
                    <div class="selectgroup selectgroup-pills pretty p-default">
                        <label class="selectgroup-item">
                          <input type="checkbox" name="userid[]" value="{{ $user->id }}" class="selectgroup-input" checked onclick="return false;" >
                          <span class="selectgroup-button">{{ $user->name }}</span>
                        </label>
                      </div>
                    @else
                    <div class="selectgroup selectgroup-pills pretty p-default">
                        <label class="selectgroup-item">
                          <input type="checkbox" name="userid[]" value="{{ $user->id }}" class="selectgroup-input" onclick="return false;" >
                          <span class="selectgroup-button">{{ $user->name }}</span>
                        </label>
                      </div>
                      @endif
                    @endforeach
                    </div>
                    </div>
                    </div>
                    @endif
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="description" value="{{ $task->description }}" >
                     </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">File</label>
                      <div class="col-sm-12 col-md-5">
                      <input type="file" name="file" id="file" placeholder="" >
                      <a href="{{ asset('/files/'.$task->filepath) }}" target="_blank">{{ $task->filepath }}</a>
                      </a>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                      <div class="col-sm-12 col-md-7">
                      <textarea class="summernote" name="content" placeholder="{{ old('content') }}" value="{{ $task->content }}">{{ $task->content }}</textarea>
                      {!!$task->content!!}
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                    </form>

                    @endif
                    @endforeach
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
