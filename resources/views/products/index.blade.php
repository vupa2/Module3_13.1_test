@extends('products.master')

@section('title', 'Danh sách sản phẩm mới nhất')

@section('content')
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên</th>
                <th scope="col">Giá(VND)</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <img src="{{ asset('storage/images/product/' . $product->image) }}" alt="{{ $product->name }}" width="100">
                    </td>
                    <td>
                        <a class="btn btn-sm btn-success" href="{{ route('products.edit', $product->id) }}"><i class="far fa-edit"></i></a>
                        <a class="btn btn-sm btn-danger delete-btn" onclick="deleteProduct(this)" href="#"><i class="fas fa-trash"></i></a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <script>
        function deleteProduct(e) {
            if (confirm('Bạn có thực sự muốn xóa sản phầm này ?')) {
                e.parentElement.querySelector('.delete-form').submit();
            }
        }

    </script>
@endsection
