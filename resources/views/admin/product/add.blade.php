<x-admin-layout title="Thêm mới sản phẩm">
    @if(session('msg'))
    <div class="alert alert-success" role="alert">
        {{ session('msg') }}
    </div>
    @endif

    <div class="page-layout">
        <div class="container" style="max-width: 1000px; margin: auto;">
            <h3 style="text-align: center; margin-bottom: 15px">Thêm mới</h3>
            <form action="{{ route('admin.product.addPostProduct') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-2">
                    <label for="name">Tên sản phẩm</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category">Danh mục</label>
                    <select name="category_id" id="category" class="form-control">
                        <option value="">-- Chọn danh mục --</option>
                        @foreach($category as $cate)
                            <option value="{{ $cate->id }}" {{ old('category_id') == $cate->id ? 'selected' : '' }}>
                                {{ $cate->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price">Giá sản phẩm</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}">
                    @error('price')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="stock">Số lượng tồn kho</label>
                    <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock') }}">
                    @error('stock')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="isHot">Độ hot</label><br>
                    <input type="radio" name="isHot" value="1" {{ old('isHot') == '1' ? 'checked' : '' }}> Đang hot
                    <input type="radio" name="isHot" value="0" {{ old('isHot') == '0' ? 'checked' : '' }}> Không hot
                    @error('isHot')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image">Ảnh sản phẩm</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @error('image')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description">Mô tả</label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="5">{{ old('description') }}</textarea>
                    @error('description')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button class="btn btn-success">Thêm mới</button>
            </form>
        </div>
    </div>
</x-admin-layout>
