@if(Auth::User()->role == 'administrator')
<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('home') }}"> <img alt="image" src="{{ asset('/img/logo.png') }}" class="header-logo" /> <span
                class="logo-name">RMCSB</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown {{ Request::url() == url('home') ? 'active' : '' }}">
              <a href="{{ route('home') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown dropdown {{ Request::url() == url('/attendace/list') ? 'active' : '' }}">
            <a href="{{ route('listattendance') }}" class="nav-link"><i data-feather="check-square"></i><span>Attendance</span></a>
            </li>
            <li class="dropdown ">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="list"></i><span>Tasks Management</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('task') }}">View Tasks</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="clipboard"></i><span>Plan</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('listplanning') }}">Plan</a></li>
              </ul>
            </li>
            <li class="dropdownF">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="dollar-sign"></i><span>Sales</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('property') }}">Properties</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Performance</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('formperformance') }}">Create Performance</a></li>
              <li><a class="nav-link" href="{{ route('listperformance') }}">Evaluate Colleague</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="bar-chart-2"></i><span>Evaluation</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('listevaluation') }}">View Evaluation Result</a></li>
              <li><a class="nav-link" href="{{ route('rubric') }}">Evaluation Rubric</a></li>
              </ul>
            </li>
          </ul>
        </aside>
      </div>
@elseif(Auth::User()->role == 'director')

<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('home') }}"> <img alt="image" src="{{ asset('/img/logo.png') }}" class="header-logo" /> <span
                class="logo-name">RMCSB</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            
            <li class="dropdown {{ Request::url() == url('home') ? 'active' : '' }}">
              <a href="{{ route('home') }}" class="nav-link "><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown {{ Request::url() == url('/director/viewemployee') ? 'active' : '' }}">
              <a href="{{ route('employee') }}" class="nav-link"><i class="fas fa-users"></i><span>Employee</span></a>
            </li>
            <li class="dropdown dropdown {{ Request::url() == url('/attendance/list') ? 'active' : '' }}">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="check-square"></i><span>Attendance</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link dropdown {{ Request::url() == url('/task') ? 'active' : '' }}" href="{{ route('listattendance') }}">Attendance List</a></li>
                <li><a class="nav-link dropdown {{ Request::url() == url('/task') ? 'active' : '' }}" class="btn" data-toggle="modal" data-target="#CreateAttendance">Create Attendance</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown {{ Request::url() == url('/task') ? 'active' : '' }}">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="list"></i><span>Task Management</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link dropdown {{ Request::url() == url('/task') ? 'active' : '' }}" href="{{ route('createtask') }}">Create Tasks</a></li>
                <li><a class="nav-link dropdown {{ Request::url() == url('/task') ? 'active' : '' }}" href="{{ route('task') }}">View Task</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="clipboard"></i><span>Plan</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('listplanning') }}">Plan</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="dollar-sign"></i><span>Sales</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('property') }}">Properties</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="bar-chart-2"></i><span>Evaluation</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('listevaluation') }}">View Evaluation</a></li>
              <li><a class="nav-link" href="{{ route('rubric') }}">Evaluation Rubric</a></li>
              </ul>
            </li>
          </ul>
        </aside>
      </div>
@elseif(Auth::User()->role == 'sales')
<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('home') }}"> <img alt="image" src="{{ asset('/img/logo.png') }}" class="header-logo" /> <span
                class="logo-name">RMCSB</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown {{ Request::url() == url('home') ? 'active' : '' }}">
              <a href="{{ route('home') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            
            <li class="dropdown dropdown {{ Request::url() == url('/attendace/list') ? 'active' : '' }}">
              <a href="{{ route('listattendance') }}" class="nav-link"><i data-feather="check-square"></i><span>Attendance</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="clipboard"></i><span>Plan</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('listplanning') }}">Plan</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="dollar-sign"></i><span>Sales</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('property') }}">Properties</a></li>
              <li><a class="nav-link" href="{{ route('sales/create') }}">Create Sales</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Performance</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('formperformance') }}">Create Performance</a></li>
              <li><a class="nav-link" href="{{ route('listperformance') }}">Evaluate Colleague</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="bar-chart-2"></i><span>Evaluation</span></a>
              <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('listevaluation') }}">View Evaluation Result</a></li>
              <li><a class="nav-link" href="{{ route('rubric') }}">Evaluation Rubric</a></li>
              </ul>
            </li>
          </ul>
        </aside>
      </div>
@endif



<div class="modal fade" id="CreateAttendance" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Create Attendance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form method="POST" action="{{ route('attendance/store') }}">
                @csrf
                  <div class="form-group">
                    <label>Date</label>
                    <div class="input-group">
                      <input type="date" class="form-control" placeholder="Date" name="attendancedate" id="date" value="<?php echo date('Y-m-d');?>">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>


<script>
        $(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var minDate= year + '-' + month + '-' + day;
    
    $('#date').attr('min', minDate);
});
</script>