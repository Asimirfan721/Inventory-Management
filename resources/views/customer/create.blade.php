@extends('layouts.app')

@section('content') 
<div class="container">
    <h4 class="mb-4">Add New Customer</h4>

    <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Home</a>
    <a href="{{ route('customer.index') }}" class="btn btn-primary mb-3">Back to Customer Page</a>

    <form action="{{ route('customer.store') }}" method="POST">
        @csrf

        <div class="modal-body">
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Customer Name"required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Customer Email" required>
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" placeholder="Customer Mobile" required>
          </div>
          <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control" placeholder="Customer Address" required>
          </div>
        </div>
       
        <button type="submit" class="btn btn-success mt-2">Add Currency</button>
    </form>
</div>
@endsection
