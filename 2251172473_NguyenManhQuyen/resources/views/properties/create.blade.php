@extends('layouts.app')

@section('title', 'Tạo bất động sản')

@section('content')
    <h1>Thêm bất động sản</h1>

    <form action="{{ route('properties.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
            @error('address') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">Thành phố</label>
            <input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}">
            @error('city') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Loại bất động sản</label>
            <select name="type" id="type" class="form-control">
                @foreach ($properties as $property)
                    <option value="{{ $property->id }}" {{ old('type') == $property->id ? 'selected' : '' }}>{{ $property->type }}</option>
                @endforeach
            </select>
            @error('type') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ old('price') }}">
            @error('price') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Loại bất động sản</label>
            <select name="type" id="status" class="form-control">
                @foreach ($properties as $property)
                    <option value="{{ $property->id }}" {{ old('status') == $property->id ? 'selected' : '' }}>{{ $property->status }}</option>
                @endforeach
            </select>
            @error('status') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
                <div class="mb-3">
            <label for="agent_id" class="form-label">Nhà môi giới</label>
            <select name="agent_id" id="store_id" class="form-control">
                @foreach ($agents as $agent)
                    <option value="{{ $agent->id }}" {{ old('agent_id') == $agent->id ? 'selected' : '' }}>{{ $agent->name }}</option>
                @endforeach
            </select>
            @error('store_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-success">Thêm</button>
        <a href="{{ route('properties.index')}}" class="btn btn-secondary">Quay lại</a>
    </form>
@endsection

