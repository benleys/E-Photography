<header id="header" class="header fixed-top d-flex align-items-center">
   <div class="d-flex align-items-center justify-content-between"> <a href="#" class="logo d-flex align-items-center toggle-sidebar-btn"> <img src="{{ asset('admin/img/logo.png') }}"> <span class="d-none d-lg-block">Admin</span><i class="bi bi-list"></i></a></div>

   <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
         <li class="nav-item d-block d-lg-none"> <a class="nav-link nav-icon search-bar-toggle " href="#"> <i class="bi bi-search"></i> </a></li>
         
         <li class="nav-item dropdown pe-3">
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown"> <img src="{{ asset('assets/uploads/profile-image/'.Auth::user()->image) }}" alt="Profile" class="rounded-circle"> <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span> </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
               <li class="dropdown-header">
                  <img src="{{ asset('assets/uploads/profile-image/'.Auth::user()->image) }}" alt="Profile" class="rounded-circle" width="100" height="110">
                  <h6>{{ Auth::user()->name }}</h6>
               </li>
               <li>
                  <hr class="dropdown-divider">
               </li>
               <li> <a class="dropdown-item d-flex align-items-center" href="{{ url('my-profile') }}"> <i class="bi bi-person"></i> <span>My Profile</span> </a></li>
               <li>
                  <hr class="dropdown-divider">
               </li>
               <!--<li> <a class="dropdown-item d-flex align-items-center" href="users-profile.html"> <i class="bi bi-gear"></i> <span>Account Settings</span> </a></li>-->
               <li>
                  <hr class="dropdown-divider">
               </li>
               <!--<li> <a class="dropdown-item d-flex align-items-center" href="pages-faq.html"> <i class="bi bi-question-circle"></i> <span>Need Help?</span> </a></li>-->
               <li>
                  <hr class="dropdown-divider">
               </li>
               <li> 
                  <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                  <i class="bi bi-box-arrow-right"></i> 
                     {{ __('Logout') }}
               </a>

               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
               </form>
               </li>
            </ul>
         </li>
      </ul>
   </nav>
</header>