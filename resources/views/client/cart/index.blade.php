<x-app-layout title="Sản phẩm">
    <div>
        <hr>
        <h2 style="font-size: 25px">Giỏ hàng</h2>
        <hr>
    </div>
    <div class="page-layout">
        @if (count($items) > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Ảnh</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Giá</th>
                        <th>Tổng</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td>
                            <img src="{{ Storage::url($item->product->image)}}" alt="" width="100px">
                        </td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price, 2) }} VNĐ</td>
                        <td>{{ number_format($item->quantity * $item->price, 2) }} VNĐ</td>
                        <td>
                            <form action="{{ route('client.cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="cart_item_id" value="{{ $item->id }}">
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-6 text-muted">Tổng giá trị:</span>
                    <span class="fs-6 text-success fw-bold">{{ number_format(collect($items)->sum(function($item) { return $item->quantity * $item->price; }), 2) }} VNĐ</span>
                </div>
            </div><br>
             <!-- Nút mua ngay -->
             <form action="{{ route('client.checkout.info') }}" method="GET">
                <input type="hidden" name="payment_method" value="cod">
                <button type="submit" class="btn btn-success btn-sm">
                    <i></i> Thanh toán
                </button>
            </form> 
        </div>

      
        @else
        <p class="text-center">Giỏ hàng của bạn đang trống.</p>
        @endif
    </div>
</x-app-layout>
