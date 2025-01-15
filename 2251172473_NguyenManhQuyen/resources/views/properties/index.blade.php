@extends('layouts.app')

@section('title', 'Danh sách bất động sản')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Danh sách bất động sản</h1>
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Địa chỉ</th>
                    <th>Thành phố</th>
                    <th>Loại bất động sản</th>
                    <th>Giá</th>
                    <th>Trạng thái</th>
                    <th>Tên nhà môi giới</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($properties as $property)
                    <tr>
                        <td>{{ $property->id }}</td>
                        <td>{{ $property->address }}</td>
                        <td>{{ $property->city }}</td>
                        <td>{{ $property->type }}</td>
                        <td>{{ number_format($property->price, 2, ',', '.') }} $</td>
                        <td>{{ $property->status }}</td>
                        <td>{{ $property->agent->name }}</td>
                        <td>
                            <a href="{{ route('properties.edit', $property) }}" class="btn btn-warning" title="Sửa">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('properties.destroy', $property) }}" method="POST" style="display:inline;" title="Xóa">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa sản phẩm này?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-4">
    {{ $properties->links('vendor.pagination.bootstrap-5') }}
</div>
    </div>
@endsection
