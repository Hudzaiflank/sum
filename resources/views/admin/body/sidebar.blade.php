 @php
 $prefix = Request::route()->getPrefix();
 $route = Route::current()->getName();

 @endphp


 <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
						  <h3><b>Siakad</b></h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li class="{{ ($route == 'dashboard')?'active':'' }}" >
          <a href="{{ route('dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
        {{-- kita butuh sih --}}
        



        @if(Auth::user()->role == 'Admin')
    <li class="treeview {{ ($prefix == '/setups')?'active':'' }}">
          <a href="#">
            <i data-feather="credit-card"></i> <span>Setup Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li><a href="{{ route('student.class.view') }}"><i class="ti-more"></i>Student Class</a></li>
        <li><a href="{{ route('school.subject.view') }}"><i class="ti-more"></i>School Subject</a></li>
        <li><a href="{{ route('assign.subject.view') }}"><i class="ti-more"></i>Assign Subject</a></li>


         
            
          </ul>
        </li>
        @endif
        @if(Auth::user()->role == 'Admin')
<li class="treeview {{ ($prefix == '/students')?'active':'' }}">
          <a href="#">
             <i data-feather="hard-drive"></i></i> <span>Student Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li><a href="{{ route('student.registration.view') }}"><i class="ti-more"></i>Student Registration</a></li>

          </ul>
        </li>
        @endif
      
        <li class="treeview {{ ($prefix == '/employees')?'active':'' }}">
          <a href="#">
            <i data-feather="package"></i> <span>Employee Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li  class="{{ ($route == 'employee.registration.view')?'active':'' }}"><a href="{{ route('employee.registration.view') }}"><i class="ti-more"></i>Employee Registration</a></li>


            
          </ul>
        </li>
      </ul>
    </section>
	

  </aside>