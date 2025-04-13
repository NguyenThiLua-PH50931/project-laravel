<x-admin-layout title="Chi tiết sản phẩm">
    @if (session('msg'))
        <div class="alert alert-success" role="alert">
            {{ session('msg') }}
        </div>
    @endif
    <div class="page-layout">
        <div class="mt-6">
        <h2 style="text-align: center; margin-bottom:40px; margin-top:20px">Chi tiết sản phẩm</h2>

            <div class="row">
                <!-- Hình ảnh sản phẩm -->
                <div class="col-md-4">
                    <div class="product-image">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                            class="img-fluid rounded shadow-sm">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="product-info">
                        <h3 class="product-title text-danger my-2">Tên sản phẩm: {{ $product->name }}</h3>
                        <p class="product-description">Mô tả: {{ $product->description }}</p>
                        <p class="product-description">Số lượng tồn: {{ $product->stock }}</p>
                        <p class="product-description">Độ hot: {{ $product->isHot }}</p>
                        <div class="product-price my-4">
                            <h5 class="">Giá bán: {{ number_format($product->price, 0, ',', '.') }} VND</h5>
                        </div>

                        <div class="product-category mb-4">
                            <span>Danh mục: {{ $product->category->name }}</span>
                        </div>
                        <div>
                            <a href="{{ route('admin.product.listProduct') }}" class="btn btn-success">Quay lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
