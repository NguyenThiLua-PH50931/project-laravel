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
                    <label for="name">Tên sản phẩm</label>
                    <input type="text" name="name" id="name" class="form-control"
                        value="{{ $product->name }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category">Danh mục</label>
                    <select name="category_id" id="category" class="form-control" required>
                        <option value="">-- Chọn danh mục --</option>
                        @foreach ($category as $cate)
                            <option value="{{ $cate->id }}"
                                {{ $product->category_id == $cate->id ? 'selected' : '' }}>{{ $cate->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="price">Giá sản phẩm</label>
                    <input type="number" name="price" id="price" class="form-control"
                        value="{{ $product->price }}">
                    @error('price')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="stock">Số lượng tồn kho</label>
                    <input type="number" name="stock" id="stock" class="form-control"
                        value="{{ $product->stock }}">
                    @error('stock')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="isHot">Độ hot</label><br>
                    <input type="radio" name="isHot" value="Đang hot"
                        {{ $product->isHot == 'Đang hot' ? 'checked' : '' }}> Đang hot
                    <input type="radio" name="isHot" value="Không hot"
                        {{ $product->isHot == 'Không hot' ? 'checked' : '' }}> Không hot
                    @error('isHot')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image">Ảnh sản phẩm</label>
                    <img src="{{ asset($product->image) }}" alt="" width="100px">
                    <input type="file" name="image" id="image" class="form-control">
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description">Mô tả</label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="5">{{ $product->description }}</textarea>
                </div>
                <button class="btn btn-success">Cập nhập</button>
            </form>
        </div>
    </div>
</x-admin-layout>
