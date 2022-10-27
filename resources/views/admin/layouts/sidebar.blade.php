<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="{{ asset('adm-template/assets/images/faces/face1.jpg') }}" alt="profile">
          <span class="login-status online"></span>
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">{{ ucwords(auth()->user()->name) }}</span>
          <span class="text-secondary text-small">Project Manager</span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="{{ route('home') }}">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('intro.index') }}">
        <span class="menu-title">Intro</span>
        <i class="mdi mdi-human-handsup menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('about.index') }}">
        <span class="menu-title">About</span>
        <i class="mdi mdi-comment-multiple-outline menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('resume.index') }}">
        <span class="menu-title">Resume</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('portfolio.index') }}">
        <span class="menu-title">Portfolio</span>
        <i class="mdi mdi-barley menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span class="menu-title">Services</span>
        <i class="mdi mdi-visual-studio menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <span class="menu-title">Contact</span>
        <i class="mdi mdi-deskphone menu-icon"></i>
      </a>
    </li>
    <li class="nav-item sidebar-actions">
      <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <span class="nav-link">
          <button type="submit" class="btn btn-block btn-lg btn-gradient-primary mt-4">Sign Out</button>
        </span>
      </form>
    </li>
  </ul>
</nav>
