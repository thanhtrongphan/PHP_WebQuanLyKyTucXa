<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-3 sidebar">
      <ul class="nav flex-column">
        <!-- Sidebar Menu Items -->
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('students.index') }}">Quản lý sinh viên</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('accounts.index') }}">Quản lý tài khoản</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('dorms.index') }}">Quản lý ký túc xá</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('rooms.index') }}">Quản lý phòng</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('registers.index') }}">Quản lý chi tiết phòng</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('payments.index') }}">Quản lý công nợ sinh viên</a>
        </li>
        <li class="nav-item">
            <!-- Go to LogOut controller function LogOut -->
            <a class="nav-link" href="{{ route('LogOut') }}">Log Out</a>
        </li>
      </ul>
    </div>