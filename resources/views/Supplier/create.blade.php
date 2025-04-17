@extends('layouts.app')

@section('content') 
<div class="container">
    <h4 class="mb-4">Add New Supplier</h4>

    <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Home</a>
    <a href="{{ route('supplier.index') }}" class="btn btn-primary mb-3">Back to Supplier Page</a>

    <form action="{{ route('supplier.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Supplier Name" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter Supplier Email" required>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" placeholder="Enter Supplier Phone" required>
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control" placeholder="Enter Supplier Address" required>
        </div>
        <div class="form-group">
    <label for="company_id" style="color: black;">Select Company</label>
    <select name="company_id" class="form-control" required style="color: black;">
        <option value="" style="color: black;">-- Choose Company --</option>
        @foreach($companies as $company)
            <option value="{{ $company->id }}" style="color: black;">{{ $company->name }}</option>
        @endforeach
    </select>
</div>

        <button type="submit" class="btn btn-success mt-2">Add Supplier</button>
    </form>
</div>
@endsection
