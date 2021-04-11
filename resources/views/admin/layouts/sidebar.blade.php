  <div class="app-sidebar__user" >


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
    <li><a class="app-menu__item {{ Request::is('admin/shop') ? 'active' : '' }}" href="{{ route('admin.shop.index') }}"><i class="app-menu__icon fa fa-plus"></i><span class="app-menu__label">Add Shop</span></a></li>
    <li><a class="app-menu__item {{ Request::is('admin/user') ? 'active' : '' }}" href="{{ route('admin.user') }}"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">ALL Users</span></a></li>

    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Entry</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item {{ Request::is('admin/category') ? 'active' : '' }}" href="{{ route('admin.category.index') }}"><i class="icon fa fa-circle-o"></i>Add Category</a></li>
        <li><a class="treeview-item {{ Request::is('admin/facility') ? 'active' : '' }}" href="{{ route('admin.facility.index') }}"><i class="icon fa fa-circle-o"></i>
        Facilites</a></li>
        <li><a class="treeview-item {{ Request::is('admin/in-app-purchases') ? 'active' : '' }}" href="{{ route('admin.in-app-purchases.index') }}"><i class="icon fa fa-circle-o"></i>
        In App Purchased</a></li>
        <li><a class="treeview-item {{ Request::is('admin/country') ? 'active' : '' }}" href="{{ route('admin.country.index') }}"><i class="icon fa fa-circle-o"></i>
        Country</a></li>
      </ul>
    </li>

    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-map"></i><span class="app-menu__label">Image Section</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item {{ Request::is('admin/header-image') ? 'active' : '' }}" href="{{ route('admin.header-image.index') }}"><i class="icon fa fa-circle-o"></i>Header Image</a></li>
        <li><a class="treeview-item {{ Request::is('admin/location') ? 'active' : '' }}" href="{{ route('admin.location.index') }}"><i class="icon fa fa-circle-o"></i>
        Popular Location</a></li>
        <li><a class="treeview-item {{ Request::is('admin/banner') ? 'active' : '' }}" href="{{ route('admin.banner.index') }}"><i class="icon fa fa-circle-o"></i>
        Add Banner</a></li>
        
      </ul>
    </li>




     <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cog"></i><span class="app-menu__label">Settings</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item {{ Request::is('admin/about') ? 'active' : '' }}" href="{{ route('admin.about.index') }}"><i class="icon fa fa-circle-o"></i>About & Setting</a></li>
        <li><a class="treeview-item {{ Request::is('admin/privacy_policy') ? 'active' : '' }}" href="{{ route('admin.privacy_policy') }}"><i class="icon fa fa-circle-o"></i>
        Privacy Policy</a></li>
        <li><a class="treeview-item {{ Request::is('admin/currency') ? 'active' : '' }}" href="{{ route('admin.currency') }}"><i class="icon fa fa-circle-o"></i>
        Currency</a></li>
        <li><a class="treeview-item {{ Request::is('admin/paypal-info') ? 'active' : '' }}" href="{{ route('admin.paypal-info') }}"><i class="icon fa fa-circle-o"></i>
        Paypal Info</a></li>
        <li><a class="treeview-item {{ Request::is('admin/notification') ? 'active' : '' }}" href="{{ route('admin.notification.index') }}"><i class="icon fa fa-circle-o"></i>
        Push Notification</a></li>
        
      </ul>
    </li>

  </ul>