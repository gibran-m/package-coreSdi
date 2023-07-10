<div class="page-main-header" style="background-color: #007AFF; height: 50px">
    <div class="main-header-right row m-0">
      <div class="main-header-left">
        <div class="logo-wrapper logo-headermenu-digi"><a href="index.html"><img class="img-fluid" src="/local_assets/img/header/Logo-white.png" alt="logo"></a></div>
        <div class="dark-logo-wrapper"><a href="index.html"><img class="img-fluid" src="{{asset('/local_assets/img/header/Logo-white.png')}}" alt="logo"></a></div>
        {{-- <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i></div> --}}
      </div>
      <div class="nav-right col pull-right right-menu p-0">
        <ul class="nav-menus">
          <li>
            <a class="text-white" href="#"><i class="bi bi-search"></i></a>
          </li>
          <li>
            <a class="text-white" href="#"><i class="bi bi-question-circle"></i></a>
          </li>
          <li class="onhover-dropdown">
            <div class="notification-box"><i class="bi bi-bell-fill text-white"></i><span class="dot-animated"></span></div>
            <ul class="notification-dropdown onhover-show-div">
              <li class="noti-primary">
                <div class="media"><span class="notification-bg bg-light-primary"><i data-feather="activity"> </i></span>
                  <div class="media-body">
                    <p>Delivery processing </p><span>10 minutes ago</span>
                  </div>
                </div>
              </li>
              <li class="noti-secondary">
                <div class="media"><span class="notification-bg bg-light-secondary"><i data-feather="check-circle"> </i></span>
                  <div class="media-body">
                    <p>Order Complete</p><span>1 hour ago</span>
                  </div>
                </div>
              </li>
              <li class="noti-success">
                <div class="media"><span class="notification-bg bg-light-success"><i data-feather="file-text"> </i></span>
                  <div class="media-body">
                    <p>Tickets Generated</p><span>3 hour ago</span>
                  </div>
                </div>
              </li>
              <li class="noti-danger">
                <div class="media"><span class="notification-bg bg-light-danger"><i data-feather="user-check"> </i></span>
                  <div class="media-body">
                    <p>Delivery Complete</p><span>6 hour ago</span>
                  </div>
                </div>
              </li>
            </ul>
          </li>
            <li class="onhover-dropdown">
              <div class="notification-box text-center"><img class="img-20 rounded-circle" src="/assets/images/dashboard/1.png" alt=""><span class="text-white"> {{ $name }}</span></div>
              <ul class="notification-dropdown onhover-show-div">
                <li class="noti-primary add-to-bookmark text-center"><a class="btn btn-primary" type="button" href="{{ route('logout') }}"> Log out <i data-feather="log-out"></i></a></li>
                  
                  {{-- <div class="media"><span class="notification-bg bg-light-primary"><i data-feather="activity"> </i></span>
                    <div class="media-body">
                      <p>Delivery processing </p><span>10 minutes ago</span>
                    </div>
                  </div> --}}
              </ul>
            </li>
          <li>
            <div class="text-white"><i class="bi bi-translate"></i></div>
          </li>
          {{-- <li class="onhover-dropdown p-0">
            <button class="btn btn-primary-light" type="button"><a href="login_two.html"><i data-feather="log-out"></i>Log out</a></button>
          </li> --}}
        </ul>
      </div>
      <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
    </div>
  </div>