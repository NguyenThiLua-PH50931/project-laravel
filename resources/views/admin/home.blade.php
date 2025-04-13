<x-admin-layout title="Trang Admin">
    @if(session('msg'))
    <p class="text-success">{{ session('msg') }}</p>
    @endif
    <div class="page-layout">
        <h3>Trang chủ Admin</h3>
    </div>
</x-admin-layout>

