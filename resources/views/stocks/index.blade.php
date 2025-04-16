@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Stock Management</h4>

    <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Back</a>
    <a href="{{ route('stock.create') }}" class="btn btn-primary mb-3">+ Create Stock</a>
<!-- Add Stock Modal -->
<div class="modal fade" id="addStockModal" tabindex="-1" role="dialog" aria-labelledby="addStockModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('stocks.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStockModalLabel">Create Stock</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Purchase Order</label>
                        <input type="text" name="purchase_order" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>No of Days</label>
                        <input type="number" name="no_of_days" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Supplier</label>
                        <select name="supplier_id" class="form-control" required>
                            <option value="">Select Supplier</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Total</label>
                        <input type="number" step="0.01" name="total" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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
                <td>{{ $stock->date }}</td>
                <td>{{ $stock->no_of_days }}</td>
                <td>{{ $stock->supplier->name ?? 'N/AA' }}</td>
                <td>{{ $stock->total }}</td>
                <td>
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal{{ $stock->id }}">Edit</button>
                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $stock->id }}">Delete</button>
                </td>
            </tr>

           <!-- Edit Modal -->
<div class="modal fade" id="editModal{{ $stock->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $stock->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('stocks.update', $stock->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Stock</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Purchase Order</label>
                        <input type="text" name="purchase_order" class="form-control" value="{{ $stock->purchase_order }}" required>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" name="date" class="form-control" value="{{ $stock->date }}" required>
                    </div>
                    <div class="form-group">
                        <label>No of Days</label>
                        <input type="number" name="no_of_days" class="form-control" value="{{ $stock->no_of_days }}" required>
                    </div>
                    <div class="form-group">
                        <label>Supplier</label>
                        <select name="supplier_id" class="form-control" required>
                            <option value="">Select Supplier</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" {{ $stock->supplier_id == $supplier->id ? 'selected' : '' }}>
                                    {{ $supplier->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Total</label>
                        <input type="number" step="0.01" name="total" class="form-control" value="{{ $stock->total }}" required>
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


<!-- Delete Modals -->
@foreach($stocks as $stock)
<div class="modal fade" id="deleteModal{{ $stock->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $stock->id }}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST">
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

