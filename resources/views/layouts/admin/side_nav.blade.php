<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{asset('images/VINDATA_RECORD.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Vin Data Record</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('admin/dist/img/avatar.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->role == 'admin' ? "Admin" : "User"}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-header">Menu</li>
          <?php
              if(Auth::user()->role == 'admin'){
          ?>
                <li class="nav-item active">
                  <a href="/transaction" class="nav-link active">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                      Transaction
                    </p>
                  </a>
                </li>

                <li class="nav-item active">
                  <a href="/list-refund" class="nav-link active">
                    <i class="nav-icon far fa-file"></i>
                    <p>
                      List Refund
                    </p>
                  </a>
                </li>
          <?php
              }else{
          ?>
                <li class="nav-item active">
                  <a href="/report" class="nav-link active">
                    <i class="nav-icon far fa-file"></i>
                    <p>
                      Report
                    </p>
                  </a>
                </li>
                <li class="nav-item active">
                  <a href="/user" class="nav-link active">
                    <i class="nav-icon far fa-user"></i>
                    <p>
                      Change Password
                    </p>
                  </a>
                </li>
          <?php
              }
          ?>
          

          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>