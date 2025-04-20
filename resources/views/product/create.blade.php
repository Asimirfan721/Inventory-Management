@extends('layouts.app')

@section('content') 
<div class="container">
    
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <h3 class="mb-4">Add New Product</h3>

    <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Home</a>
    <a href="{{ route('product.index') }}" class="btn btn-primary mb-3">Back to Product Page</a>

    <form action="{{ route('product.store') }}" method="POST">
        @csrf

        <div class="modal-body">
                <div class="form-group">
                    <label>Product</label>
                    <input type="text" name="product" class="form-control" placeholder="Product Name" required>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category" class="form-control" required>
    <option value="">-- Select Category --</option>
    @foreach($categories as $cat)
        <option value="{{ $cat->title }}">{{ $cat->title }}</option>
    @endforeach
</select>

                <div class="form-group">
                    <label for="brand">Select Brand</label>
                    <select name="brand" class="form-control" style="color: black;" required>
                        <option value="">-- Select Brand --</option>
                        @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                        @endforeach
                        </select>
                </div>
                <div class="form-group">
                    <label>SKU</label>
                    <input type="text" name="SKU" class="form-control" placeholder="Total Number of Units"required>
                </div>
          </div>
        
        <button type="submit" class="btn btn-success mt-2">Add Product</button>
    </form>
</div>
@endsection
