@extends('layouts.app')

@section('content') 
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Add New Stock</h4>
                </div>
                <div class="card-body">
                    <a href="{{ url('/') }}" class="btn btn-outline-secondary btn-sm mb-3 me-2">
                        <i class="bi bi-house"></i> Home
                    </a>
                    <a href="{{ route('stock.index') }}" class="btn btn-outline-primary btn-sm mb-3">
                        <i class="bi bi-arrow-left"></i> Back to Stock Page
                    </a>
                    <form action="{{ route('stock.store') }}" method="POST" autocomplete="off">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Purchase Order</label>
                            <input type="text" name="purchase_order" class="form-control" placeholder="Purchase Number" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" name="date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No of Days</label>
                            <input type="number" name="no_of_days" class="form-control" placeholder="Number of Days" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Supplier</label>
                            <select name="supplier_id" class="form-select" required>
                                <option value="">Select Supplier</option>
                                @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Total</label>
                            <input type="number" step="0.01" name="total" class="form-control" placeholder="Total number of Stock" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">
                            <i class="bi bi-plus-circle"></i> Add Stock
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
