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
		
        <li class="treeview {{ ($prefix == '/brand')?'active':'' }}  ">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Branch</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'branch.view')? 'active':'' }}"><a href="{{route('branch.view')}}"><i class="ti-more"></i>All Branch</a></li>
            
          </ul>
        </li>   

        <li class="treeview {{ ($prefix == '/condition')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Condition</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'condition.view')? 'active':'' }}"><a href="{{route('condition.view')}}"><i class="ti-more"></i>All Condition</a></li>
            
          </ul>
        </li>   

        <li class="treeview {{ ($prefix == '/category')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'category.view')? 'active':'' }}"><a href="{{route('category.view')}}"><i class="ti-more"></i>Manage Category</a></li>
             
             
          </ul>
        </li>

         <li class="treeview {{ ($prefix == '/rate')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Fee Calculation</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'fee.view')? 'active':'' }}"><a href="{{route('fee.view')}}"><i class="ti-more"></i>Manage Calculated in Weight</a></li>
            <li class="{{ ($route == 'cm.view')? 'active':'' }}"><a href="{{route('cm.view')}}"><i class="ti-more"></i>Manage Calculated in Cm</a></li>
             
             
          </ul>
        </li>




             




		 
        <li class="header nav-small-cap">Order All</li>
		  
        <li class="treeview {{ ($prefix == '/orders')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'branch1.view')? 'active':'' }}"><a href="{{route('branch1.view')}}"><i class="ti-more"></i>Orders All Branch 1</a></li>
            <li class="{{ ($route == 'branch2.view')? 'active':'' }}"><a href="{{route('branch2.view')}}"><i class="ti-more"></i>Orders All Branch 2</a></li>
            <li class="{{ ($route == 'branch3.view')? 'active':'' }}"><a href="{{route('branch3.view')}}"><i class="ti-more"></i>Orders All Branch 3</a></li>
          </ul>
        </li>
		
        <li class="header nav-small-cap">Order All Pending</li>
		  
        <li class="treeview {{ ($prefix == '/orders-pending')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Pending Order Branch</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'pending1.view')? 'active':'' }}"><a href="{{route('pending1.view')}}"><i class="ti-more"></i>Order Branch 1</a></li>
            <li class="{{ ($route == 'pending2.view')? 'active':'' }}"><a href="{{route('pending2.view')}}"><i class="ti-more"></i>Order Branch 2</a></li>
            <li class="{{ ($route == 'pending3.view')? 'active':'' }}"><a href="{{route('pending3.view')}}"><i class="ti-more"></i>Order Branch 3</a></li>
          </ul>
        </li>

        <li class="header nav-small-cap">Order All Confirmed</li>

        <li class="treeview {{ ($prefix == '/orders-confirmed')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Confirmed Order Branch</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'confirmed1.view')? 'active':'' }}"><a href="{{route('confirmed1.view')}}"><i class="ti-more"></i>Order Branch 1</a></li>
            <li class="{{ ($route == 'confirmed2.view')? 'active':'' }}"><a href="{{route('confirmed2.view')}}"><i class="ti-more"></i>Order Branch 2</a></li>
            <li class="{{ ($route == 'confirmed3.view')? 'active':'' }}"><a href="{{route('confirmed3.view')}}"><i class="ti-more"></i>Order Branch 3</a></li>
          </ul>
        </li>

        <li class="header nav-small-cap">Order All Processing</li>

        <li class="treeview {{ ($prefix == '/orders-processing')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Processing Order Branch</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'processing1.view')? 'active':'' }}"><a href="{{route('processing1.view')}}"><i class="ti-more"></i>Order Branch 1</a></li>
            <li class="{{ ($route == 'processing2.view')? 'active':'' }}"><a href="{{route('processing2.view')}}"><i class="ti-more"></i>Order Branch 2</a></li>
            <li class="{{ ($route == 'processing3.view')? 'active':'' }}"><a href="{{route('processing3.view')}}"><i class="ti-more"></i>Order Branch 3</a></li>
          </ul>
        </li>

        <li class="header nav-small-cap">Order All Arrived</li>

        <li class="treeview {{ ($prefix == '/orders-arrived')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Order has arrived Branch</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'arrived1.view')? 'active':'' }}"><a href="{{route('arrived1.view')}}"><i class="ti-more"></i>Order Branch 1</a></li>
            <li class="{{ ($route == 'arrived2.view')? 'active':'' }}"><a href="{{route('arrived2.view')}}"><i class="ti-more"></i>Order Branch 2</a></li>
            <li class="{{ ($route == 'arrived3.view')? 'active':'' }}"><a href="{{route('arrived3.view')}}"><i class="ti-more"></i>Order Branch 3</a></li>
          </ul>
        </li>


        <li class="header nav-small-cap">Order All Picked</li>

        <li class="treeview {{ ($prefix == '/orders-Original-branch')?'active':'' }}  ">
          <a href="#">
            <i data-feather="file"></i>
            <span>Picked Order Branch</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'picked1.view')? 'active':'' }}"><a href="{{route('picked1.view')}}"><i class="ti-more"></i>Order Branch 1</a></li>
            <li class="{{ ($route == 'picked2.view')? 'active':'' }}"><a href="{{route('picked2.view')}}"><i class="ti-more"></i>Order Branch 2</a></li>
            <li class="{{ ($route == 'picked3.view')? 'active':'' }}"><a href="{{route('picked3.view')}}"><i class="ti-more"></i>Order Branch 3</a></li>
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