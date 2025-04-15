@extends('layouts.app')

@section('content') 
<div class="container">
    <h4 class="mb-4">Add New Currency</h4>

    <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Home</a>
    <a href="{{ route('company.index') }}" class="btn btn-secondary mb-3">Back to Currency Page</a>

    <form action="{{ route('company.store') }}" method="POST">
        @csrf

        <div class="form-group">
                        <label>Logo</label>
                        <input type="text" name="Logo" class="form-control" placeholder="Enter logo details" required>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="Name" class="form-control" placeholder="Company Name" required>
                    </div>
                    <div class="form-group">
                        <label>Currency</label>
                        <input type="text" name="currency" class="form-control" placeholder="Company's Currency" required>
                    </div>

        <button type="submit" class="btn btn-success mt-2">Add company</button>
    </form>
</div>
@endsection
