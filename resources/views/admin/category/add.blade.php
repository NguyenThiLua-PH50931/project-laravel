<x-admin-layout title="Thêm mới danh mục">
    @if(session('msg'))
    <div class="alert alert-success" role="alert">
        {{ session('msg') }}
    </div>
    @endif

    <div class="page-layout">
        <div class="container" style="max-width: 1000px; margin: auto;">
            <h3 style="text-align: center; margin-bottom: 15px">Thêm mới</h3>
            <form action="{{ route('admin.category.addPost') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <label for="name">Tên danh mục</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button class="btn btn-success">Thêm mới</button>
            </form>
        </div>
    </div>
</x-admin-layout>
