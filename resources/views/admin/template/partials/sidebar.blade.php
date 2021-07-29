<!-- Brand Logo -->
<a href="{{ url('/') }}" class="brand-link">
  <img src="{{ asset ('assets/dist/img/AdminLTELogo.png') }} " alt="AREA 6" class="brand-image img-circle elevation-3" style="opacity: .8">
  <span class="brand-text font-weight-light" style="font-family: 'Courgette', cursive;">AREA 6</span>
</a>

<!-- Sidebar -->
<div class="sidebar">

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

           <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">Data </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-database"></i>
          <p>
            Data
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('admin.dept') }}" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Department
              </p>
            </a>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.store') }}" class="nav-link">
              <i class="nav-icon fas fa-store"></i>
              <p>
                Store
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.level') }}" class="nav-link">
              <i class="nav-icon fas fa-level-up-alt"></i>
              <p>
                Level
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.team') }}" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Team
              </p>
            </a>
          </li>
        </ul>
      </li>

      {{-- <li class="nav-item">
        <a href="{{ route('admin.dept') }}" class="nav-link">
          <i class="nav-icon fas fa-building"></i>
          <p>
            Department
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.store') }}" class="nav-link">
          <i class="nav-icon fas fa-store"></i>
          <p>
            Store
          </p>
        </a>
      </li><li class="nav-item">
        <a href="{{ route('admin.level') }}" class="nav-link">
          <i class="nav-icon fas fa-level-up-alt"></i>
          <p>
            Level
          </p>
        </a>
      </li> --}}
      {{-- <li class="nav-header">Sales</>
      <li class="nav-item">
        <a href="{{ route('admin.salesid.index') }}" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Sales ID
          </p>
        </a>
      </li> --}}
     
      
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->

<div class="sidebar-custom">
  {{-- <a href="#" class="btn btn-link"><i class="fas fa-cogs"></i></a> --}}
  {{-- <a href="#" class="btn btn-secondary hide-on-collapse pos-right">Logout</a> --}}
  <a class="btn btn-secondary hide-on-collapse pos-right" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
</div>
<!-- /.sidebar-custom -->