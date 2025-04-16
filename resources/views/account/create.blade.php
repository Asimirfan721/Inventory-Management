@extends('layouts.app')

@section('content') 
<div class="container">
    <h4 class="mb-4">Add New Account</h4>

    <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Home</a>
    <a href="{{ route('account.index') }}" class="btn btn-primary mb-3">Back to Account Page</a>

    <form action="{{ route('account.store') }}" method="POST">
        @csrf

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder ="Enter your Name" required>  
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" placeholder ="Enter your Number"required>
          </div>
          <div class="form-group">
  <label>Balance</label>
  <input type="number" step="0.01" name="balance" class="form-control" placeholder ="Enter your Amount" required>
</div>
          <div class="form-group">
            <label>Description</label>
            <input type="text" name="description" class="form-control" placeholder ="Enter your Description" required>
          </div>
          <div class="form-group">
            <label>Account Number</label>
            <input type="text" name="account_number" class="form-control" placeholder ="Enter your Account Number" required>
          </div>
        </div>
        <button type="submit" class="btn btn-success mt-2">Add Account</button>
    </form>
</div>
@endsection
