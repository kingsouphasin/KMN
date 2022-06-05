@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
 
@endphp


  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{route('check-admin')}}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
						  <h3><b>KMN</b> Admin</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li class="{{ ($route == 'dashboard')? 'active':'' }}">
          <a href="{{ url('admin/dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>         

        <li class="header nav-small-cap">Order From User</li>
		  
        <li class="treeview {{ ($prefix == '/orders')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'PendingAdmin3')? 'active':'' }}"><a href="{{route('PendingAdmin3')}}"><i class="ti-more"></i>Pending Orders</a></li>
            <li class="{{ ($route == 'ConfirmedAdmin3')? 'active':'' }}"><a href="{{route('ConfirmedAdmin3')}}"><i class="ti-more"></i>Confirmed Orders</a></li>
          </ul>
        </li>
		
        <li class="header nav-small-cap">Order From Original</li>
		  
        <li class="treeview {{ ($prefix == '/orders-Original-branch')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>from Original branch</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'ProcessingAdmin3')? 'active':'' }}"><a href="{{route('ProcessingAdmin3')}}"><i class="ti-more"></i>Processing Orders</a></li>
            <li class="{{ ($route == 'ArrivedAdmin3')? 'active':'' }}"><a href="{{route('ArrivedAdmin3')}}"><i class="ti-more"></i>Order has arrived</a></li>
            <li class="{{ ($route == 'PickedAdmin3')? 'active':'' }}"><a href="{{route('PickedAdmin3')}}"><i class="ti-more"></i>Picked Orders</a></li>
          </ul>
        </li>
		  
        		  
		  
		 
        
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="{{route('admin.logout')}}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>