

<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#dashboard" href="{{ url('staff/dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span></i>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('staff/farmreport') }}">
          <i class="bi bi-person"></i>
          <span>Farmers Data</span>
        </a>
      </li><!-- End Farmers Data Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('staff/reports') }}">
          <i class="bi bi-person"></i>
          <span>Reports</span>
        </a>
      </li><!-- End Reports Page Nav -->

      <li class="nav-heading">Profile</li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#settings-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="settings-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('staff/profile') }}" class="nav-item nav-link">
              <i class="bi bi-circle"></i><span>Profile</span>
            </a>
          </li>
          <li>
            <a href="{{ url('staff/audit') }}" class="nav-item nav-link">
              <i class="bi bi-circle"></i><span>Audit Trail</span>
            </a>
          </li>
          <li>
            <a href="{{ url('staff/manageusers') }}" class="nav-item nav-link">
              <i class="bi bi-circle"></i><span>Manage Brgy. Sec.</span>
            </a>
          </li>
          <li>
            <a href="{{ url('staff/backup') }}" class="nav-item nav-link">
              <i class="bi bi-circle"></i><span>System Backup</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="../index.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->

    </ul>

    </aside>
