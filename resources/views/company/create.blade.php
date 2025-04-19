@extends('layouts.app')

@section('content') 
<div class="container">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <h3 class="mb-4">Add New Company</h3>

    <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Home</a>
    <a href="{{ route('company.index') }}" class="btn btn-primary mb-3">Back to Currency Page</a>

    <form action="{{ route('company.store') }}" method="POST">
        @csrf

        <div class="form-group">
                        <label>Logo</label>
                        <input type="text" name="logo" class="form-control" placeholder="Enter logo details" required>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Company Name" required>
                    </div>
                    <div class="form-group"> 
    <label for="currency_id">Select Currency</label>
    <select name="currency_id" class="form-control" required>
        <option value="">-- Select Currency --</option>
        @foreach($currencies as $currency)
            <option value="{{ $currency->id }}">{{ $currency->currency }} ({{ $currency->code }})</option>
        @endforeach
    </select>
</div>

        <button type="submit" class="btn btn-success mt-2">Add company</button>
    </form>
</div>
@endsection
