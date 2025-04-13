<header>
    <div class="navbar">
        <a href="{{ route('client.home') }}" class="logo">Shop Táo</a>
        <ul class="nav-menu">
            <li><a href="{{ route('client.home') }}">Trang Chủ</a></li>
            <li><a href="{{ route('client.product.list') }}">Sản Phẩm</a></li>
            <li><a href="{{ route('client.lienhe') }}">Liên Hệ</a></li>
            <li><a href="">Yêu thích</a></li>
            <li><a href="{{ route('client.cart.list') }}">🛒</a></li>
            {{-- Nếu đã đăng nhập --}}
            @if (Auth::check())
                <li class="dropdown">
                    <a href="#" style="color: rgb(240, 194, 109);">🧑‍💻 {{ Auth::user()->name }}</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
                        <li><a href="{{ route('client.order.list') }}">Đơn mua</a></li>
                    </ul>
                </li>
            @else
                {{-- Nếu chưa đăng nhập --}}
                <li class="dropdown">
                    <a href="#">Tài Khoản</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('register') }}">Đăng ký</a></li>
                        <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</header>
