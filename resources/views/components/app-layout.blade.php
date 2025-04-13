@props(['title', 'banner'])
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        {{-- @yield('title') | Lavender Tea --}}
     {{ $title }} | Shop Táo
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="{{ asset('css/stytle.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body>
    @include('layouts.client.header')

    {{-- Hiển thị banner ngang nếu có --}}
    @if($banner)
        <div class="anh">
            <img src="{{ asset($banner) }}" alt="Banner ngang">
        </div>
    @endif

    <div class="container mt-4 min-vh-100">
        {{ $slot }}
    </div>
    {{-- x-app-layout --}}
    {{-- @yield('content')  
        @extends('components.app-layout')
        @section('title', 'Sản phẩm') --}}
    @include('layouts.client.footer')
</body>

</html>
