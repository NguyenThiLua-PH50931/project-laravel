<header>
    <div class="navbar">
        <a href="{{  route('client.home') }}" class="logo">Shop Táo</a>
        <ul class="nav-menu">
            <li><a href="{{ route('admin.product.listProduct') }}">Sản phẩm</a></li>
            <li><a href="{{ route('admin.category.list') }}">Danh mục</a></li>
            {{-- <li><a href="{{ route('admin.user') }}">Người dùng</a></li> --}}
            {{-- <li><a href="{{ route('admin.order') }}">Đơn hàng</a></li> --}}
            <li><a href="">Thống kê</a></li>
            <li class="dropdown">
                <a href="#">Tài Khoản</a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
                    <li><a href="{{ route('client.home')}}">Trang chủ</a></li>
                </ul>
            </li>
        </ul>
    </div>
</header>



