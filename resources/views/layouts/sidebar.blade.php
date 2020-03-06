<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ url('/admin') }}" class="brand-link pt-3 pb-3">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .5">
    <span class="brand-text font-weight-light">{{ App\Configuration::where('configname','project_name')->first()->configvalue }}</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div> --}}
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        
        <li class="nav-item">
            <a href="{{ url('/admin') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                  Dashboard
              </p>
            </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/admin/user') }}" class="nav-link">
            <i class="nav-icon fas fa-user-ninja"></i>
            <p>
              User
            </p>
          </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/admin/role') }}" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Role
              </p>
            </a>
          </li>
        <li class="nav-item">
            <a href="{{ url('/admin/configuration') }}" class="nav-link">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                Configuration
              </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/admin/banner') }}" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Banner
              </p>
            </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/admin/category') }}" class="nav-link">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>
              Category
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/admin/product') }}" class="nav-link">
            <i class="nav-icon fas fa-barcode"></i>
            <p>
              Product
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/admin/product_parameter') }}" class="nav-link">
            <i class="nav-icon fas fa-sliders-h"></i>
            <p>
              Parameter
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/admin/coupon') }}" class="nav-link">
            <i class="nav-icon fas fa-gift"></i>
            <p>
              Coupon
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/admin/contact') }}" class="nav-link">
            <i class="nav-icon fas fa-question-circle"></i>
            <p>
              Query
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/admin/order') }}" class="nav-link">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>
              Order
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/admin/page') }}" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>
              Static Page
            </p>
          </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/admin/template') }}" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Template
              </p>
            </a>
          </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>        
</aside>
<style>
    .nav-item {
        padding: 5px 0;
    }
</style>