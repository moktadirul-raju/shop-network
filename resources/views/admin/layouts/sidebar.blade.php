  <div class="app-sidebar__user">
    
    <div>
      <p class="app-sidebar__user-name">{{ Auth::check() ? Auth::user()->name : '' }}</p>
    </div>
  </div>


  <ul class="app-menu">
    <li><a class="app-menu__item {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

     <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Shop Management</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item {{ Request::is('admin/shop/pending') ? 'active' : '' }}" href="{{ route('admin.pending-shop') }}"><i class="icon fa fa-circle-o"></i>
          Pending Request({{ DB::table('shops')->where('approve_status',0)->count() }})
        </a></li>
        <li><a class="treeview-item {{ Request::is('admin/shop/approved') ? 'active' : '' }}" href="{{ route('admin.approved-shop') }}"><i class="icon fa fa-circle-o"></i>
        Approved Request({{ DB::table('shops')->where('approve_status',1)->count() }})</a></li>
        <li><a class="treeview-item {{ Request::is('admin/shop/rejected') ? 'active' : '' }}" href="{{ route('admin.rejected-shop') }}"><i class="icon fa fa-circle-o"></i>
        Rejected Request({{ DB::table('shops')->where('approve_status',2)->count() }})</a></li>
         
        
      </ul>
    </li>
    <li><a class="app-menu__item {{ Request::is('admin/user') ? 'active' : '' }}" href="{{ route('admin.user') }}"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Users</span></a></li>

    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Basic Elements</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item {{ Request::is('admin/category') ? 'active' : '' }}" href="{{ route('admin.category.index') }}"><i class="icon fa fa-circle-o"></i>Add Category</a></li>
        <li><a class="treeview-item {{ Request::is('admin/facility') ? 'active' : '' }}" href="{{ route('admin.facility.index') }}"><i class="icon fa fa-circle-o"></i>
        Facilites</a></li>
         <li><a class="treeview-item {{ Request::is('admin/banner') ? 'active' : '' }}" href="{{ route('admin.banner.index') }}"><i class="icon fa fa-circle-o"></i>
        Banner</a></li>
        
      </ul>
    </li>
    <li><a class="app-menu__item {{ Request::is('admin/division') ? 'active' : '' }}" href="{{ route('admin.division.index') }}"><i class="app-menu__icon fa fa-address-book"></i><span class="app-menu__label">Address</span></a></li>
    <li><a class="app-menu__item {{ Request::is('admin/notification') ? 'active' : '' }}" href="{{ route('admin.notification.index') }}"><i class="app-menu__icon fa fa-bell"></i><span class="app-menu__label">Push Notification</span></a></li>
    <li><a class="app-menu__item {{ Request::is('admin/paypal-info') ? 'active' : '' }}" href="{{ route('admin.paypal-info') }}"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">Paypal Info</span></a></li>

  </ul>