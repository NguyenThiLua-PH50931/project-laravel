<x-app-layout title="Thông tin vận chuyển">
    <div>
        <hr>
        <h2 style="font-size: 25px">Thông tin vận chuyển</h2>
        <hr>
    </div>
    <form action="{{ route('client.checkout.info') }}" method="POST">
        @csrf
        <label>Họ tên:</label>
        <input type="text" name="full_name" required class="form-control" ><br>

        <label>Số điện thoại:</label>
        <input type="text" name="phone" required class="form-control" ><br>

        <label>Địa chỉ:</label>
        <input type="text" name="address" required class="form-control" ><br>

        <button type="submit" class="btn btn-success">Tiếp tục</button>
    </form>
</x-app-layout>
