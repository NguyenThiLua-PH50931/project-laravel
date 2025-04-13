<x-admin-layout title="Sản phẩm">
    @if (session('msg'))
        <div class="alert alert-success" role="alert">
            {{ session('msg') }}
        </div>
    @endif
    <div class="page-layout">
        <div class="table-responsive">
            <h3 style="text-align: center; margin-bottom: 15px">Danh sách sản phẩm</h3>
            <a href="{{ route('admin.product.addProduct') }}" class="btn btn-info" style="margin-bottom: 10px">Thêm mới</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category_name</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Stock</th>
                        <th>Ishot</th>
                        <th>Created_at</th>
                        <th>Update_at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $pro)
                        <tr>
                            <td>{{ $pro->id }}</td>
                            <td>{{ $pro->category->name }}</td>
                            <td>{{ $pro->name }}</td>
                            <td>{{ number_format($pro->price, 0, ',', '.') }} VNĐ</td> <!-- Định dạng giá -->
                            <td>
                                <img src="{{ Storage::url($pro->image) }}" width="100px" alt="">
                            </td>
                            <td>{{ Str::limit($pro->description, 50) }} <!-- Cắt ngắn mô tả nếu quá dài --></td>
                            <td>{{ $pro->stock }}</td>
                            <td>{{ $pro->isHot}}</td>
                            <td>{{ $pro->created_at->format('d/m/Y H:i') }}</td> <!-- Định dạng ngày tháng -->
                            <td>{{ $pro->updated_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <div style="display: flex; gap: 15px; justify-content: flex-start;">
                                    <form action="{{ route('admin.product.deleteProduct', $pro->id) }}" method="POST"
                                        onsubmit="return confirm('Bạn có muốn xóa không?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                    </form>

                                    <a href="{{ route('admin.product.detailProduct', $pro->id) }}"
                                        class="btn btn-primary btn-sm">Xem</a>

                                    <a href="{{ route('admin.product.updateProduct', $pro->id) }}"
                                        class="btn btn-warning btn-sm">Sửa</a>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- Phân trang --}}
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </div>
</x-admin-layout>
