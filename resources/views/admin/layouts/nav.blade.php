 <!-- ========== App Menu ========== -->
     <div class="app-menu navbar-menu">
         <!-- LOGO -->
         <div class="navbar-brand-box">
             <!-- Dark Logo-->
             <a href="/admin" class="logo logo-dark">
                 <span class="logo-sm">
                     <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                 </span>
                 <span class="logo-lg">
                     <img src="{{ asset('assets/images/suluck.png') }}" alt="" height="17">
                 </span>
             </a>
             <!-- Light Logo-->
             <a href="/admin" class="logo logo-light">
                 <span class="logo-sm">
                     <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                 </span>
                 <span class="logo-lg">
                     <img src="{{ asset('assets/images/suluck.png') }}" alt="" height="36">
                 </span>
             </a>
             <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                 id="vertical-hover">
                 <i class="ri-record-circle-line"></i>
             </button>
         </div>

         <div id="scrollbar">
             <div class="container-fluid">

                 <div id="two-column-menu">
                 </div>
                 <ul class="navbar-nav" id="navbar-nav">
                     <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                     <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarLayouts" data-bs-target="#sidebarLayouts">
                        <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Layouts</span>
                     </a>
                         <div class="collapse menu-dropdown ms-4" id="sidebarLayouts">
                             <ul class="nav nav-sm flex-column">
                                 <li class="nav-item">
                                    <a class="dropdown-item" style="color: white;" href="{{ url('categories/index') }}">Categories</a>
                                    </li>
                                    
                                 <li class="nav-item mt-1">
                                    <a class="dropdown-item" style="color: white;"  href="{{ url('products/index') }}">Products</a>

                                </li>
                             </ul>
                         </div>
                     </li> <!-- end Dashboard Menu -->
                 </ul>
             </div>
             <!-- Sidebar -->
         </div>

         <div class="sidebar-background"></div>
     </div>
     <!-- Left Sidebar End -->
     <!-- Vertical Overlay-->
     <div class="vertical-overlay"></div>
     <!-- ============================================================== -->