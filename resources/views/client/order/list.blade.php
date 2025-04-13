<x-app-layout title="Đơn hàng của bạn">
    <div>
        <hr>
        <h2 style="font-size: 25px">Danh sách đơn hàng</h2>
        <hr>
    </div>
    @forelse ($orders as $order)
        <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 15px;">
            <p><strong>Mã đơn:</strong> #{{ $order->id }}</p>
            <p><strong>Trạng thái:</strong> {{ $order->table }}</p>
            <p><strong>Tổng tiền:</strong> {{ number_format($order->total_price) }}đ</p>
            <p><strong>Phương thức thanh toán:</strong> {{ $order->payment_method == 'cod' ? 'COD' : 'Chuyển khoản' }}
            </p>
            <p><strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
            <a href="{{ route('client.order.detail', $order->id) }}"><button class="btn btn-warning">Chi tiết
                </button></a>

        </div>

    @empty
        <p>Bạn chưa có đơn hàng nào.</p>
    @endforelse
</x-app-layout>
