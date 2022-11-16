<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
<div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
          </ul>
        </div>
        @guest
        @else
            <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle">
              <div class="dropdown-header">
                  {{Carbon\Carbon::now()->format('d F Y')}}
              </div>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class=" dropdown-toggle"><i class="fas fa-cog"></i></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello,  <br>{{ Auth::user()->name }}</div>
              <a href="{{ route('profile') }}" class="dropdown-item has-icon {{ Request::url() == url('/profile') ? 'active' : '' }}"> <i class="far
										fa-user"></i> Profile
              <div class="dropdown-divider"></div>

              <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
            @endguest
            </div>
          </li>
        </ul>
      </nav>