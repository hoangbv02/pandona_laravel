<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="index.php" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Admin</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('frontend/img/user.jpg') }}" alt=""
                    style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ session('admin')->tenad }}</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('admin.home') }}" class="nav-item nav-link {{ $active ?? '' }}"><i
                    class="fa-solid fa-gauge-simple-high"></i>Bảng điều
                khiển</a>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ str_contains(request()->path(), 'admin/users') ? 'active' : '' }}"
                    data-bs-toggle="dropdown"><i class="fa-solid fa-users"></i>Quản lý
                    khách hàng</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('admin.users.index', ['page' => 1]) }}" class="dropdown-item">Danh sách khách
                        hàng</a>
                    <a href="{{ route('admin.users.add') }}" class="dropdown-item">Thêm khách hàng</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#"
                    class="nav-link dropdown-toggle {{ str_contains(request()->path(), 'admin/products') ? 'active' : '' }}"
                    data-bs-toggle="dropdown"><i class="fa-solid fa-shop"></i>Quản lý sản phẩm</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('admin.products.index', ['page' => 1]) }}" class="dropdown-item">Danh sách sản
                        phẩm</a>
                    <a href="{{ route('admin.products.add') }}" class="dropdown-item">Thêm sản phẩm</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#"
                    class="nav-link dropdown-toggle {{ str_contains(request()->path(), 'admin/category') ? 'active' : '' }}"
                    data-bs-toggle="dropdown"><i class="fa-solid fa-bars-staggered"></i>Quản lý loại sản phẩm</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('admin.categorys.index', ['page' => 1]) }}" class="dropdown-item">Danh sách loại
                        sản
                        phẩm</a>
                    <a href="{{ route('admin.categorys.add') }}" class="dropdown-item">Thêm loại sản phẩm</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#"
                    class="nav-link dropdown-toggle {{ str_contains(request()->path(), 'admin/orders') ? 'active' : '' }}"
                    data-bs-toggle="dropdown"><i class="fa-solid fa-cart-shopping"></i>Quản lý đơn hàng</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('admin.orders.index', ['page' => 1]) }}" class="dropdown-item">Danh sách đơn
                        hàng</a>
                    <a href="{{ route('admin.orders.add') }}" class="dropdown-item">Thêm đơn hàng</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="{{ route('admin.report') }}" class="nav-link {{ str_contains(request()->path(), 'admin/report') ? 'active' : '' }}"><i class="fa-solid fa-chart-bar"></i>Báo cáo
                    thống
                    kê</a>
            </div>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
