<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
  <div class="profile-sidebar">
    <div class="profile-usertitle">
      <div class="profile-usertitle-name">{{ Auth::user()->name }}，您好！</div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="divider"></div>
  <ul class="nav menu">
    @foreach(auth()->user()->getMenus() as $menu)
      @if(in_array($menu->id, auth()->user()->hasPermissions()))
        <li><a href="{{ $menu->url }}"><i class="{{ $menu->icon }}">&nbsp;</i> {{ $menu->title }}</a></li>
      @endif
    @endforeach

    {{-- 只有管理員身份有帳號管理/角色管理 --}}
    @if(auth()->user()->isAdministrator() == true)
      <li><a href="/studentData/admin/user"><i class="fa fa-sliders">&nbsp;</i> 帳號管理</a></li>
      <li><a href="/studentData/admin/role"><i class="fa fa-users">&nbsp;</i> 角色管理</a></li>
    @endif
    <li><a href="/studentData/admin/account"><i class="fa fa-cog">&nbsp;</i> 帳號設定</a></li>
    <li><a href="{{ url('/logout') }}"><i class="fa fa-power-off">&nbsp;</i> 登出</a></li>
  </ul>
</div>
