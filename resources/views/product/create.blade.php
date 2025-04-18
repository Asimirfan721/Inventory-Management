@extends('layouts.app')

@section('content') 
<div class="container">
    
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <h4 class="mb-4">Add New Product</h4>

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
    <option value="" disabled selected>Select Category</option>
    <option value="Electronics">Electronics</option>
    <option value="Accessories">Accessories</option>
    <option value="Clothes">Clothes</option>
    <option value="Shoes">Shoes</option>
    <option value="Watches">Watches</option>
  </select>
                <div class="form-group">
                    <label>Brand</label>
                    <input type="text" name="brand" class="form-control"placeholder="Enter Brand Name" required>
                </div>
                <div class="form-group">
                    <label>SKU</label>
                    <input type="text" name="SKU" class="form-control" placeholder="Total Number of Units"required>
                </div>
          </div>
        
        <button type="submit" class="btn btn-success mt-2">Add Currency</button>
    </form>
</div>
@endsection
