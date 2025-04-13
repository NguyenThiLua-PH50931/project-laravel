<x-app-layout title="Đăng nhập">
    <div class="container">
        <h2 style="text-align: center;">Đăng nhập Tài Khoản</h2>
        @if (session('msg'))
            <p class="text-danger">{{ session('msg') }}</p>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control">

                {{-- Validate --}}
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <br>

            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" class="form-control">

                {{-- Validate --}}
                @error('password')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <br>
            <div class="form-check">
                <input type="checkbox" id="remember" name="remember" class="form-check-input">
                <label for="remember" class="form-check-label">Remember Me</label>
            </div>
            <button type="submit" class="btn btn w-100 nut">Đăng nhập</button>
            <br>
   
            <a href="{{ route('register') }}" style=" text-decoration: none;">Đăng ký</a>
            
        </form>
    </div>
</x-app-layout>
