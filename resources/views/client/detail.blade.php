<x-app-layout title="Sản phẩm">
    <div>
        <hr>
        <h2 style="font-size: 25px">Chi tiết sản phẩm</h2>
        <hr>
    </div>
    <div class="page-layout">
        <div class="mt-5">
            <div class="row">
                <!-- Hình ảnh sản phẩm -->
                <div class="col-md-5">
                    <div class="product-image">
                        <img src="{{ Storage::url($product->image)}}" alt="{{ $product->name }}"
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
                            <a href="{{ route('client.home') }}" class="btn btn-success">Quay lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
