@extends('layouts.app') <!-- or any layout you're using -->

@section('content')
<div class="container">

<link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <h3 class="mb-4">Product Management</h3>

  <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Back</a>
  <a href="{{ route('product.create') }}" class="btn btn-primary mb-3">+ Create Product</a>

  <table class="table table-bordered">
    <thead>
      <tr>
      <th>No</th>
        <th>Product</th>
        <th>Category</th>
        <th>Brand</th>
        <th>SKU</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $index => $product)
      <tr>
  <td>{{ $index + 1 }}</td>
  <td>{{ $product->product }}</td>
  <td>{{ $product->category }}</td>
  <td>{{ $product->brand->title ?? 'N/A' }}</td>
  <td>{{ $product->SKU }}</td>
  <td>
    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal{{ $product->id }}">Edit</button>
    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $product->id }}">Delete</button>
  </td>
</tr>

      <!-- Edit Modal -->
      <div class="modal fade" id="editModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $product->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <form action="{{ route('product.update', $product->id) }}" method="POST">
          @csrf
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Edit Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span>&times;</span>
            </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Product</label>
                <input type="text" name="product" class="form-control" value="{{ $product->product}}" required>
              </div>
              <div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control" required>
        <option value="">-- Select Category --</option>
        @foreach($categories as $cat)
            <option value="{{ $cat->title }}" {{ $product->category == $cat->title ? 'selected' : '' }}>
                {{ $cat->title }}
            </option>
        @endforeach
    </select>
</div>

<select name="brand" class="form-control" required>
  @foreach($brands as $brand)
  <option value="{{ $brand->id }}" {{ isset($product->brand) && $product->brand->id == $brand->id ? 'selected' : '' }}>
    {{ $brand->title }}
</option>
  @endforeach
</select>
              <div class="form-group">
                <label>SKU</label>
                <input type="text" name="SKU" class="form-control" value="{{ $product->SKU }}" required>
              </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
        </form>
        </div>
      </div>
      @endforeach
    </tbody>
  </table>
</div>

<!-- Add Currency Modal -->
<div class="modal fade" id="addCurrencyModal" tabindex="-1" role="dialog" aria-labelledby="addCurrencyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('product.store') }}" method="POST">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addCurrencyModalLabel">Add Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span>&times;</span>
            </button>
          </div>
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
</div>

<div class="form-group">
  <label>Brand</label>
  <select name="brand" class="form-control" required>
    <option value="" disabled selected>Select Brand</option>
    @foreach($brands as $brand)
      <option value="{{ $brand->id }}">{{ $brand->title }}</option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label>SKU</label>
  <input type="text" name="SKU" class="form-control" placeholder="Total Number of Units" required>
</div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>
        </div>
    </form>
  </div>
</div>
@endsection

<!-- Delete Modal -->
@foreach($products as $product)
<div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $product->id }}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('product.destroy', $product->id) }}" method="POST">
      @csrf
      @method('DELETE')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel{{ $product->id }}">Delete Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this product?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endforeach