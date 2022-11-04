<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
       <li class="nav-item"> 
         <a class="nav-link {{ Request::is('dashboard') ? '':'collapsed' }}" href="{{ route('dashboard') }}"> 
            <i class="bi bi-grid"></i> 
            <span>Dashboard</span> 
         </a>
      </li>
      <li class="nav-item"> 
         <a class="nav-link {{ Request::is('/') ? '':'collapsed' }}" href="{{ route('frontindex') }}"> 
            <i class="bi bi-box-arrow-up-right"></i> 
            <span>Go to Website</span> 
         </a>
      </li>
      <li class="nav-heading">Images</li>
      <li class="nav-item"> 
         <a class="nav-link {{ Request::is('images') ? '':'collapsed' }}" href="{{ route('images') }}"> 
            <i class="bi bi-image"></i> 
            <span>Images</span> 
         </a>
      </li>
       <li class="nav-item"> 
         <a class="nav-link {{ Request::is('upload-image') ? '':'collapsed' }}" href="{{ route('upload-image') }}"> 
            <i class="bi bi-images"></i> 
            <span>Upload Image</span> 
         </a>
      </li>
      <li class="nav-heading">Categories</li>
      <li class="nav-item"> 
         <a class="nav-link {{ Request::is('categories') ? '':'collapsed' }}" href="{{ route('categories') }}"> 
            <i class="bi bi-bookmark-check"></i> 
            <span>Categories</span> 
         </a>
      </li>
       <li class="nav-item"> 
         <a class="nav-link {{ Request::is('add-category') ? '':'collapsed' }}" href="{{ route('add-category') }}"> 
            <i class="bi bi-bookmarks-fill"></i> 
            <span>Add Category</span> 
         </a>
      </li>
      <li class="nav-heading">Users</li>
      <li class="nav-item"> 
         <a class="nav-link {{ Request::is('users') ? '':'collapsed' }}" href="{{ route('users') }}"> 
            <i class="bi bi-person-lines-fill"></i> 
            <span>Users</span> 
         </a>
      </li>
       <li class="nav-item"> 
         <a class="nav-link {{ Request::is('add-user') ? '':'collapsed' }}" href="{{ route('add-user') }}"> 
            <i class="bi bi-person-plus-fill"></i> 
            <span>Add User</span> 
         </a>
      </li>
    </ul>
 </aside>