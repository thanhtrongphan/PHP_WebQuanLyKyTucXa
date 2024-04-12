<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-3 sidebar">
      <ul class="nav flex-column">
        <!-- Sidebar Menu Items -->
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('users.index') }}">Thông tin sinh viên</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('users.changePassword') }}">Đổi mật khẩu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('users.register_room') }}">Đăng ký phòng</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('users.payment_show') }}">Kiểm tra công nợ</a>
        <li class="nav-item">
            <!-- Go to LogOut controller function LogOut -->
            <a class="nav-link" href="{{ route('LogOut') }}">Log Out</a>
        </li>
      </ul>
    </div>