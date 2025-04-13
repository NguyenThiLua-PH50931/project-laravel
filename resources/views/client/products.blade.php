<x-app-layout title="Sản phẩm">
        <div>
            <hr>
            <h2 style="font-size: 25px">Sản phẩm</h2>
            <hr>
        </div>
        <div class="page-layout">
            <!-- Danh Sách Sản Phẩm -->
            <div class="product-section">
                <h2 class="mb-4 text-center"></h2>
                <div class="product-container">
                    @foreach($products as $value)
                    <div class="product">
                        <img src="{{ Storage::url($value->image) }}" alt="">
                        <a style="text-decoration: none; color:black;" href="{{ route('client.product.detail', $value->id) }}"> <h3>{{ $value->name }}</h3></a>
                        <p class="price">{{ $value->price }}</p>
                        <div class="d-flex justify-content-end gap-2 mt-3">
                            <!-- Nút thêm giỏ -->
                            <form action="{{ route('client.cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $value->id }}">
                                <input type="hidden" name="price" value="{{ $value->price }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-outline-warning btn-sm">
                                    <i class="bi bi-cart-plus me-1"></i> Giỏ
                                </button>
                            </form>
                        
                            <!-- Nút mua ngay -->
                            <form action="" method="POST">
                                @csrf
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
