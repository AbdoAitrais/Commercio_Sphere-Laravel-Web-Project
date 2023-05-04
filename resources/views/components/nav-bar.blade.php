<nav id="navbar-main" class="navbar is-fixed-top z-0">
    <div class="navbar-brand is-right">
      <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
        <span class="icon"><i class="fa fa-dots-vertical fa-24px"></i></span>
      </a>
    </div>
    <div class="navbar-menu" id="navbar-menu">
      <div class="navbar-end">
        <div class="navbar-item dropdown has-divider has-user-avatar">
          <a class="navbar-link">
            <div class="user-avatar">
              <img src="{{asset('images/initials_003.svg')}}" alt="John Doe" class="rounded-full">
            </div>
            <div class="is-user-name"><span>John Doe</span></div>
            <span class="icon"><i class="fa fa-chevron-down"></i></span>
          </a>
          <div class="navbar-dropdown">
            <a href="https://themewagon.github.io/admin-one/profile.html" class="navbar-item">
              <span class="icon"><i class="fa fa-user"></i></span>
              <span>My Profile</span>
            </a>
            <a class="navbar-item">
              <span class="icon"><i class="fa fa-gear"></i></span>
              <span>Settings</span>
            </a>
            <a class="navbar-item">
              <span class="icon"><i class="fa fa-message"></i></span>
              <span>Messages</span>
            </a>
            <hr class="navbar-divider">
            <form method="POST" action="{{route('logout')}}">
              @csrf
              <button type="submit" class="navbar-item">
                <span class="icon"><i class="fa fa-power-off"></i></span>
                <span>Logout</span>
              </button>
          </div>
        </div>
    </div>
  </nav>