<x-admin-layout title="Cập nhập sản phẩm">
    @if (session('msg'))
        <div class="alert alert-success" role="alert">
            {{ session('msg') }}
        </div>
    @endif
    <div class="page-layout">
        <div class="table-responsive">
            <h3 style="text-align: center; margin-bottom: 15px">Cập nhập</h3>
            <form action="" method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="mb-3" style="width:1000px">
                    <label for="name">Tên danh mục</label>
                    <input type="text" name="name" id="name" class="form-control"
                        value="{{ $category->name }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button class="btn btn-success">Cập nhập</button>
            </form>
        </div>
    </div>
</x-admin-layout>
