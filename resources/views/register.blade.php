<x-app-layout title="Đăng ký">
    <div class="container">
        <h2 style="text-align: center">Đăng Ký Tài Khoản</h2>
        @if (session('msg'))
            <p class="text-danger">{{ session('msg') }}</p>
        @endif
        <form action="{{ route('postRegister') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Họ và Tên</label>
                <input type="text" id="name" name="name" class="form-control">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div><br>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control">
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div><br>

            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" class="form-control">
                @error('password')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div><br>

            <button type="submit" class="btn btn w-100 nut">Đăng ký</button>
        </form>
        <a href="{{ route('login') }}" style=" text-decoration: none">Đăng nhập</a>
    </div>
</x-app-layout>
