<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="{{ route('students.index') }}" class="nav-link text-white" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
          Quản lý sinh viên
        </a>
      </li>
      <li>
        <a href="{{ route('accounts.index') }}" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
          Quản lý tài khoản
        </a>
      </li>
      <li>
        <a href="{{ route('dorms.index') }}" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
          Quản lý ký túc xá
        </a>
      </li>
      <li>
        <a href="{{ route('rooms.index') }}" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
          Quản lý phòng
        </a>
      </li>
      <li>
        <a href="{{ route('registers.index') }}" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
          Quản lý chi tiết phòng
        </a>
      </li>
      <li>
        <a href="{{ route('payments.index') }}" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#currency-dollar"></use></svg>
          Quản lý công nợ sinh viên
        </a>
      </li>
      <li>
        <a href="{{ route('LogOut') }}" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#log-out"></use></svg>
          Log Out
        </a>
      </li>
    </ul>
  </div>