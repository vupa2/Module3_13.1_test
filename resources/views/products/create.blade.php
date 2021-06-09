@extends('products.master')

@section('title', 'Tạo sản phẩm mới')

@section('content')
    <form class="w-50 mx-auto" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="name">Tên</label>
            <input id="name" class="form-control @error('name') is-invalid @enderror" name="name" type="text">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="price">Giá (VND)</label>
            <input id="price" class="form-control @error('price') is-invalid @enderror" name="price" type="text">
            @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Ảnh</label>
            <input class="form-control form-control-sm  @error('image') is-invalid @enderror" name="image" id="image" type="file">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Loại sản phẩm</label>
            <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="text-capitalize text-center">
            <button type="submit" class="btn btn-primary">Lưu sản phẩm</button>
            <a class="btn btn-secondary" href="{{ route('products.index') }}">Quay trở lại</a>
        </div>
    </form>
@endsection
