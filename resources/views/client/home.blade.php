<x-app-layout title="Trang chủ" banner="image/anh20.jpg">
    <div class="page-layout">
        <!-- Banner Đứng -->
        <div class="banner-container">
            <div class="vertical-banner">
                <img src="{{ asset('image/Xanh đậm tím vàng hiện đại mỹ phẩm quảng cáo trung thu banner.png') }}"
                    alt="">
            </div>
        </div>
        <!-- Danh Sách Sản Phẩm -->
        <div class="product-section">
            <h2 class="mb-4 text-center">Sản Phẩm Nổi Bật</h2>
            <div class="product-container">
                @foreach ($products as $pro)
                    <div class="product">
                        <img src="{{ Storage::url($pro->image) }}" alt="">
                        <a style="text-decoration: none; color:black;"
                            href="{{ route('client.product.detail', $pro->id) }}">
                            <h3>{{ $pro->name }}</h3>
                        </a>
                        <p class="price">{{ $pro->price }} VNĐ</p>
                        <div class="d-flex justify-content-end gap-2 mt-3">
                            <!-- Nút thêm giỏ -->
                            <form action="{{ route('client.cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $pro->id }}">
                                <input type="hidden" name="price" value="{{ $pro->price }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-outline-warning btn-sm">
                                    <i class="bi bi-cart-plus me-1"></i> Giỏ
                                </button>
                            </form>

                            <!-- Nút mua ngay -->
                            <form action="" method="GET">
                                <input type="hidden" name="payment_method" value="cod">
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="bi bi-lightning-fill me-1"></i> Mua
                                </button>
                            </form>                            
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>
