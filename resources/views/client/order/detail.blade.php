<x-app-layout title="Chi tiết đơn hàng #{{ $order->id }}">
    <h2>🧾 Chi tiết đơn hàng</h2>

    <p><strong>Mã đơn hàng:</strong> #{{ $order->id }}</p>
    <p><strong>Trạng thái:</strong> {{ $order->table }}</p>
    <p><strong>Phương thức thanh toán:</strong> {{ $order->payment_method == 'cod' ? 'COD' : 'Chuyển khoản' }}</p>
    <p><strong>Tổng tiền:</strong> {{ number_format($order->total_price) }}đ</p>
    <p><strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>

    <hr>
    <h3>Sản phẩm:</h3>
    <ul>
        @foreach ($order->orderItems as $item)
            <li>
                {{ $item->product->name ?? 'Sản phẩm đã xoá' }} - 
                SL: {{ $item->quantity }} - 
                Giá: {{ number_format($item->price) }}đ
            </li>
        @endforeach
    </ul>

    <hr>
    <h3>Thông tin người nhận</h3>
        <p><strong>Họ tên:</strong> {{ $order->full_name }}</p>
        <p><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
        <p><strong>Địa chỉ:</strong> {{ $order->address }}</p>
   
</x-app-layout>
