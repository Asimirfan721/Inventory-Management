@extends('layouts.app')

@section('content') 
<div class="container py-4">
    <h3 class="mb-4">Add New Expense</h3>
    <div class="mb-3">
        <a href="{{ url('/') }}" class="btn btn-outline-secondary me-2">
            <i class="bi bi-house"></i> Home
        </a>
        <a href="{{ route('expense.index') }}" class="btn btn-outline-primary">
            <i class="bi bi-arrow-left"></i> Back to Expense Page
        </a>
    </div>
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('expense.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Expense ID</label>
                    <input type="text" name="expense_id" class="form-control" placeholder="Expense Unique Id" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Date</label>
                    <input type="date" name="date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Note</label>
                    <input type="text" name="note" class="form-control" placeholder="Expense Type" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Type</label>
                    <select name="type" class="form-select" required>
                        <option value="">-- Select Type --</option>
                        <option value="In">In</option>
                        <option value="Out">Out</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Amount</label>
                    <input type="number" step="0.01" name="amount" class="form-control" placeholder="Enter Balance" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Account</label>
                    <select name="account" class="form-select" required>
                        <option value="">Select Account</option>
                        @foreach($accounts as $account)
                            <option value="{{ $account->account_number }}">{{ $account->account_title }} ({{ $account->account_number }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Remarks</label>
                    <input type="text" name="remarks" class="form-control" placeholder="Expense description" required>
                </div>
                <button type="submit" class="btn btn-success w-100">
                    <i class="bi bi-plus-circle"></i> Add Expense
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
