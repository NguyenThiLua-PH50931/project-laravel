{{-- Sử dụng cho component --}}
@props(['title']) 
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        {{ $title }} | Shop Táo
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="{{ asset('css/stytle.css') }}">
</head>

<body>
    @include('layouts.admin.header')

    <div class="container mt-4 min-vh-100 d-flex flex-column">
        {{ $slot }}
    </div>
    @include('layouts.client.footer')
</body>

</html>
