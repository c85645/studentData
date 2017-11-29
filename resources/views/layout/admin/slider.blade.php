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
      {{-- @if(auth()->user()->canDo('manage_students'))
      @endif --}}

      @foreach(auth()->user()->getMenus() as $menu)
        @if(in_array($menu->id, auth()->user()->hasPermissions()))
          <li><a href="{{ $menu->url }}"><i class="{{ $menu->icon }}">&nbsp;</i> {{ $menu->title }}</a></li>
        @endif
      @endforeach
      {{-- <li><a href="/admin/studentData"><i class="fa fa-file-text">&nbsp;</i> 學生資料管理</a></li>
      <li><a href="/admin/academy"><i class="fa fa-calendar">&nbsp;</i> 學制管理</a></li>
      <li><a href="/admin/academyPermission"><i class="fa fa-ban">&nbsp;</i> 學制權限管理</a></li> --}}

      {{-- 只有管理員身份有帳號管理/角色管理 --}}
      @if(auth()->user()->isAdministrator() == true)
        <li><a href="/admin/user"><i class="fa fa-sliders">&nbsp;</i> 帳號管理</a></li>
        <li><a href="/admin/role"><i class="fa fa-users">&nbsp;</i> 角色管理</a></li>
      @endif

      <li><a href="/admin/account"><i class="fa fa-cog">&nbsp;</i> 帳號設定</a></li>
      <li><a href="{{ url('/logout') }}"><i class="fa fa-power-off">&nbsp;</i> 登出</a></li>
    </ul>
  </div>
      {{-- <li class="parent">
        <a data-toggle="collapse" href="#sub-item-1">
          <em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
        </a>
        <ul class="children collapse" id="sub-item-1">
          <li><a class="" href="#">ㄝ
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
