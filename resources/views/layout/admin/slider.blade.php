<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
      <div class="profile-usertitle">
        <div class="profile-usertitle-name">{{ Auth::user()->name }}，您好！</div>
        {{-- <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div> --}}
      </div>
      <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
      <li><a href="/admin/studentData"><em class="fa fa-dashboard">&nbsp;</em> 學生資料管理</a></li>
      <li><a href="/admin/academy"><em class="fa fa-calendar">&nbsp;</em> 學制管理</a></li>
      <li><a href="/admin/academyPermission"><em class="fa fa-bar-chart">&nbsp;</em> 學制權限管理</a></li>
      <li><a href="/admin/user"><em class="fa fa-toggle-off">&nbsp;</em> 帳號管理</a></li>
      <li><a href="/admin/role"><em class="fa fa-clone">&nbsp;</em> 角色管理</a></li>
      {{-- <li class="parent">
        <a data-toggle="collapse" href="#sub-item-1">
          <em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
        </a>
        <ul class="children collapse" id="sub-item-1">
          <li><a class="" href="#">
            <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 1
          </a></li>
          <li><a class="" href="#">
            <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2
          </a></li>
          <li><a class="" href="#">
            <span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3
          </a></li>
        </ul>
      </li> --}}
      <li><a href="{{ url('/logout') }}"><em class="fa fa-power-off">&nbsp;</em> 登出</a></li>
    </ul>
  </div>
