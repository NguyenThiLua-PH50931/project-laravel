<x-app-layout title="Đặt hàng thành công">
    <h2>🎉 Đặt hàng thành công!</h2>

    <p>Mã đơn hàng: <strong>#{{ $order->id }}</strong></p>
    <p>Phương thức thanh toán: <strong>{{ $order->payment_method == 'cod' ? 'Thanh toán khi nhận hàng' : 'Chuyển khoản' }}</strong></p>
    <p>Tổng tiền: <strong>{{ number_format($order->total_price) }}đ</strong></p>

    <a href="{{ route('client.home') }}"><button class="btn btn-success">Về trang chủ</button></a>
    <a href="{{ route('client.order.detail', $order->id) }}"><button class="btn btn-warning">Chi tiết đơn hàng</button></a>
</x-app-layout>
