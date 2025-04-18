@extends('layouts.app')

@section('content') 
<div class="container">
    
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <h4 class="mb-4">Add New Supplier</h4>

    <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Home</a>
    <a href="{{ route('stock.index') }}" class="btn btn-primary mb-3">Back to Stock Page</a>

    <form action="{{ route('stock.store') }}" method="POST">
        @csrf

        <div class="modal-body">
        <div class="form-group">
        <div class="form-group">
        <div class="form-group">
                        <label>Purchase Order</label>
                        <input type="text" name="purchase_order" class="form-control" placeholder="Purchase Number" required>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" name="date" class="form-control" placeholder="Purchase Date" required>
                    </div>
                    <div class="form-group">
                        <label>No of Days</label>
                        <input type="number" name="no_of_days" class="form-control" placeholder="Number of Days" required>
                    </div>
                    <div class="form-group">
                        <label>Supplier</label>
                        <select name="supplier_id" class="form-control" placeholder="Supplier of Products" required>
                            <option value="">Select Supplier</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Total</label>
                        <input type="number" step="0.01" name="total" class="form-control" placeholder="Total number of Stock"required>
                    </div>
                </div>
        <button type="submit" class="btn btn-success mt-2">Add Supplier</button>
    </form>
</div>
@endsection
