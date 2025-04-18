@extends('layouts.app')

@section('content') 
<div class="container">
    
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <h3 class="mb-4">Add New Expense</h3>

    <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Home</a>
    <a href="{{ route('expense.index') }}" class="btn btn-primary mb-3">Back to Expense Page</a>

    <form action="{{ route('expense.store') }}" method="POST">
        @csrf
        <div class="modal-body">
        <div class="form-group">
        <label>Expense_ID</label>
                <input type="text" name="expense_id" class="form-control" placeholder="Expense Unique Id" required>
            </div>

            <div class="form-group">
                <label>Date</label>
                <input type="date" name="date" class="form-control" placeholder="Select Date" required>
            </div>

            <div class="form-group">
                <label>Note</label>
                <input type="text" name="note" class="form-control" placeholder="Expense Type" required>
            </div>

            <div class="form-group">
                <label>Type</label>
                <input type="text" name="type" class="form-control" placeholder="cash In/Out" required>
            </div>

            <div class="form-group">
                <label>Amount</label>
                <input type="number" step="0.01" name="amount" class="form-control" placeholder="Enter Balance" required>
            </div>

            <div class="form-group">
                <label>Account</label>
                <input type="text" name="account" class="form-control" placeholder="Enter account Number" required>
            </div>

            <div class="form-group">
                <label>Remarks</label>
                <input type="text" name="remarks" class="form-control" placeholder="Expense description" required>
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-2">Add Expense</button>
    </form>
</div>
@endsection
