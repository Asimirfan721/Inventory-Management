@extends('layouts.app') <!-- or any layout you're using -->

@section('content')
<div class="container">

  <h4 class="mb-4">Stock Management</h4>

  <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Back</a>
  <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addCurrencyModal">+ Create stock</button>

  <table class="table table-bordered">
    <thead>
      <tr>
      <th>No</th>
        <th>Purchase Order</th>
        <th>Date</th>
        <th>No of Days</th>
        <th>Supplier</th>
        <th>Total</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($stocks as $index => $stock)
      <tr>
  <td>{{ $index + 1 }}</td>
  <td>{{ $stock->purchase_order }}</td>
  <td>{{ $stock->Date }}</td>
  <td>{{ $stock->No of Days }}</td>
  <td>{{ $stock->Supplier }}</td>
  <td>{{ $stock->Total }}</td>
  <td>
    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal{{ $stock->id }}">Edit</button>
    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $stock->id }}">Delete</button>
  </td>
</tr>

      <!-- Edit Modal -->
      <div class="modal fade" id="editModal{{ $stock->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $stock->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <form action="{{ route('stock.update', $stock->id) }}" method="POST">
          @csrf
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Edit stock</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span>&times;</span>
            </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>stock</label>
                <input type="text" name="stock" class="form-control" value="{{ $stock->stock}}" required>
              </div>
              <div class="form-group">
                <label>Category</label>
                <select name="category" class="form-control" required>
  <option value="Electronics" {{ $stock->category == 'Electronics' ? 'selected' : '' }}>Electronics</option>
  <option value="Accessories" {{ $stock->category == 'Accessories' ? 'selected' : '' }}>Accessories</option>
  <option value="Clothes" {{ $stock->category == 'Clothes' ? 'selected' : '' }}>Clothes</option>
  <option value="Shoes" {{ $stock->category == 'Shoes' ? 'selected' : '' }}>Shoes</option>
  <option value="Watches" {{ $stock->category == 'Watches' ? 'selected' : '' }}>Watches</option>
</select>   </div>
              <div class="form-group">
                <label>Brand</label>
                <input type="text" name="brand" class="form-control" value="{{ $stock->brand }}" required>
              </div>
              <div class="form-group">
                <label>SKU</label>
                <input type="text" name="SKU" class="form-control" value="{{ $stock->SKU }}" required>
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
    <form action="{{ route('stock.store') }}" method="POST">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addCurrencyModalLabel">Add stock</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span>&times;</span>
            </button>
          </div>
          <div class="modal-body">
                <div class="form-group">
                    <label>stock</label>
                    <input type="text" name="stock" class="form-control" placeholder="stock Name" required>
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
@foreach($stocks as $stock)
<div class="modal fade" id="deleteModal{{ $stock->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $stock->id }}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('stock.destroy', $stock->id) }}" method="POST">
      @csrf
      @method('DELETE')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel{{ $stock->id }}">Delete stock</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this stock?
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