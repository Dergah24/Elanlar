<body class="animsition ">

    <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-expand-md"
      role="navigation">

      <div class="navbar-header">
        <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
          data-toggle="menubar">
          <span class="sr-only">Toggle navigation</span>
          <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
          data-toggle="collapse">
          <i class="icon wb-more-horizontal" aria-hidden="true"></i>
        </button>
        <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
          <img class="navbar-brand-logo" src="{{ asset('Back/base//assets/images/logo.png') }}" title="Remark">
          <span class="navbar-brand-text hidden-xs-down"> Remark</span>
        </div>

      </div>

      <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
          <!-- Navbar Toolbar -->
          <ul class="nav navbar-toolbar">
            <li class="nav-item hidden-float" id="toggleMenubar">
              <a class="nav-link" data-toggle="menubar" href="#" role="button">
                  <i class="icon hamburger hamburger-arrow-left">
                    <span class="sr-only">Toggle menubar</span>
                    <span class="hamburger-bar"></span>
                  </i>
                </a>
            </li>
          </ul>

          <!-- Navbar Toolbar Right -->
          <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">

              <li class="nav-item dropdown">
              <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
                data-animation="scale-up" role="button">
                <span class="avatar avatar-online">
                  <img src="{{  asset('Back') }}/global/portraits/5.jpg" alt="...">
                  <i></i>
                </span>
              </a>
              <div class="dropdown-menu" role="menu">
                <a class="dropdown-item" href="{{ route('profile.show') }}" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Profile</a>
                <div class="dropdown-divider" role="presentation"></div>
                <a class="dropdown-item"  role="menuitem">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  <i class="icon wb-power" aria-hidden="true"></i> {{ __('Logout') }}
               </a>

               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                   @csrf
               </form>
              </div>
            </li>

          </ul>
          <!-- End Navbar Toolbar Right -->
        </div>
        <!-- End Navbar Collapse -->


      </div>
    </nav>
    <div class="site-menubar">

      <div class="site-menubar-body">
        <div>
          <div>
            <ul class="site-menu" data-plugin="menu">
              <li class="site-menu-category">General</li>
              <li class="site-menu-item has-sub">
                <a href="javascript:void(0)">
                                  <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                                  <span class="site-menu-title">Dashboard</span>
                                      <div class="site-menu-badge">
                                          <span class="badge badge-pill badge-success">3</span>
                                      </div>
                              </a>
                <ul class="site-menu-sub">
                  <li class="site-menu-item">
                    <a href="../index.html">
                      <span class="site-menu-title">Dashboard v1</span>
                    </a>
                  </li>

                </ul>
              </li>
              <li class="site-menu-item has-sub">
                <a href="{{ route('category.index') }}">
                                  <i class="site-menu-icon wb-layout" aria-hidden="true"></i>
                                  <span class="site-menu-title">Kateqoriyalar</span>
                                          <span class="site-menu-arrow"></span>
                              </a>

              </li>
              <li class="site-menu-item has-sub">
                <a href="#">
                                  <i class="site-menu-icon wb-layout" aria-hidden="true"></i>
                                  <span class="site-menu-title">Elanlar</span>
                                          <span class="site-menu-arrow"></span>
                              </a>
                <ul class="site-menu-sub">
                  <li class="site-menu-item">
                    <a href="{{ route('advertisement.index') }}">
                      <span class="site-menu-title">Yeni  Elanlar Yarat</span>
                    </a>
                  </li>
                  {{--  <li class="site-menu-item">
                    <a href="{{ route('status1') }}">
                      <span class="site-menu-title">Yoxlanışda olan elanlar</span>
                    </a>
                  </li>

                  <li class="site-menu-item">
                    <a href="{{ route('status2') }}">
                      <span class="site-menu-title">Dərc edilən elanlar</span>
                    </a>
                  </li>

                  <li class="site-menu-item">
                    <a href="{{ route('status3') }}">
                      <span class="site-menu-title">Qəbul edilməyən elanlar</span>
                    </a>
                  </li>  --}}


                </ul>
              </li>



            </ul>

          </div>
        </div>
      </div>


    </div>
