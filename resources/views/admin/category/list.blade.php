<x-admin-layout title="Danh mục">
    @if (session('msg'))
        <div class="alert alert-success" role="alert">
            {{ session('msg') }}
        </div>
    @endif
    <div class="page-layout">
        <div class="table-responsive">
            <h3 style="text-align: center; margin-bottom: 15px">Danh sách danh mục</h3>
            <a href="{{ route('admin.category.add') }}" class="btn btn-info" style="margin-bottom: 10px">Thêm mới</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Created_at</th>
                        <th>Update_at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $cate)
                        <tr>
                            <td>{{ $cate->id }}</td>
                            <td>{{ $cate->name }}</td>
                            <td>{{ $cate->created_at->format('d/m/Y H:i') }}</td> <!-- Định dạng ngày tháng -->
                            <td>{{ $cate->updated_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <div style="display: flex; gap: 15px; justify-content: flex-start;">
                                    <form action="{{ route('admin.category.delete', $cate->id) }}" method="POST"
                                        onsubmit="return confirm('Bạn có muốn xóa không?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                    </form>

                                    <a href="{{ route('admin.category.update', $cate->id) }}"
                                        class="btn btn-warning btn-sm">Sửa</a>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- Phân trang --}}
            {{-- {{ $products->links('pagination::bootstrap-5') }} --}}
        </div>
    </div>
</x-admin-layout>
