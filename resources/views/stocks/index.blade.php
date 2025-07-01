@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Stock Management</h3>
        <div>
            <a href="{{ url('/') }}" class="btn btn-outline-secondary me-2">
                <i class="bi bi-house"></i> Home
            </a>
            <a href="{{ route('stock.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Create Stock
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Purchase Order</th>
                            <th>Date</th>
                            <th>No of Days</th>
                            <th>Supplier</th>
                            <th>Total</th>
                            <th style="width: 90px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stocks as $index => $stock)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $stock->purchase_order }}</td>
                            <td>{{ $stock->date }}</td>
                            <td>{{ $stock->no_of_days }}</td>
                            <td>{{ $stock->supplier->name ?? 'N/A' }}</td>
                            <td>{{ $stock->total }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editModal{{ $stock->id }}">
                                                <i class="bi bi-pencil-square me-1"></i> Edit
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $stock->id }}">
                                                <i class="bi bi-trash me-1"></i> Delete
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $stock->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $stock->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{ route('stocks.update', $stock->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title" id="editModalLabel{{ $stock->id }}">Edit Stock</h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Purchase Order</label>
                                                <input type="text" name="purchase_order" class="form-control" value="{{ $stock->purchase_order }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Date</label>
                                                <input type="date" name="date" class="form-control" value="{{ $stock->date }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">No of Days</label>
                                                <input type="number" name="no_of_days" class="form-control" value="{{ $stock->no_of_days }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Supplier</label>
                                                <select name="supplier_id" class="form-select" required>
                                                    <option value="">Select Supplier</option>
                                                    @foreach($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}" {{ $stock->supplier_id == $supplier->id ? 'selected' : '' }}>
                                                            {{ $supplier->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Total</label>
                                                <input type="number" step="0.01" name="total" class="form-control" value="{{ $stock->total }}" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal{{ $stock->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $stock->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $stock->id }}">Delete Stock</h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this stock?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

