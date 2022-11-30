  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard" class="brand-link text-center">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light"><?= $vendor_data->company_name != '' ? $vendor_data->company_name : 'Invoice Management Software' ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= url($vendor_data->logo != '' ? $vendor_data->logo : 'public/dist/img/user2-160x160.jpg' ) ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $vendor_data->username != '' ? $vendor_data->username : 'User' ?></a>
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
          <li class="nav-item">
            <a href="dashboard" class="nav-link active">
            <i class="nav-icon fas fa-bars"></i>
              <p>Dashboard v1</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="allClients" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                All Clients
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>

          <li class="nav-header">Invoice</li>
          <li class="nav-item">
            <a href="addInvoice" class="nav-link">
              <i class="nav-icon far fa-file"></i>
              <p>
                Add Invoice
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="allInvoice" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                All Invoices
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>

          <li class="nav-header">Settings</li>
          <li class="nav-item">
            <a href="profile" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>