<x-app-layout title="Xác nhận đơn hàng">
    <div>
        <hr>
        <h2 style="font-size: 25px">Xác nhận đơn hàng</h2>
        <hr>
    </div>

    <h5 style="color: rgb(182, 121, 7)">Thông tin giao hàng:</h5>
    <p><strong>Họ tên:</strong> {{ $shipping['full_name'] }}</p>
    <p><strong>Số điện thoại:</strong> {{ $shipping['phone'] }}</p>
    <p><strong>Địa chỉ:</strong> {{ $shipping['address'] }}</p>

    <hr>
    <h5 style="color: rgb(182, 121, 7)">Danh sách sản phẩm:</h5>
    <ul>
        @foreach($items as $item)
            <li>{{ $item->product->name }} - SL: {{ $item->quantity }} - {{ number_format($item->price) }}đ</li>
        @endforeach
    </ul>

    <p><strong>Tổng tiền:</strong> {{ number_format($total) }}đ</p>

    <hr>
    <form action="{{ route('client.checkout.place') }}" method="POST">
        @csrf
        <h5 style="color: rgb(182, 121, 7)">Chọn phương thức thanh toán:</h5>
        <label><input type="radio" name="payment_method" value="cod" checked> Thanh toán khi nhận hàng</label><br>
        <label><input type="radio" name="payment_method" value="bank_transfer"> Chuyển khoản ngân hàng</label><br><br>

        <button type="submit" class="btn btn-success">Đặt hàng</button>
    </form>
</x-app-layout>
