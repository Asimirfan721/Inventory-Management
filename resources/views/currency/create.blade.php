@extends('layouts.app')

@section('content') 

<div class="container">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <h3 class="mb-4">Add New Currency</h3>

    <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Home</a>
    <a href="{{ route('currency.index') }}" class="btn btn-primary mb-3">Back to Currency Page</a>

    <form action="{{ route('currency.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>currency</label>
            <input type="text" name="currency" class="form-control" placeholder="Name of currency" required>
        </div>

        <div class="form-group">
            <label>Code</label>
            <input type="text" name="code" class="form-control" placeholder="Shortcut code" required>
        </div>

        <button type="submit" class="btn btn-success mt-2">Add Currency</button>
    </form>
</div>
 

@endsection


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('.btn');
        buttons.forEach(button => {
            button.addEventListener('mouseover', function () {
                this.style.transform = 'scale(1.1)';
                this.style.transition = 'transform 0.2s';
            });
            button.addEventListener('mouseout', function () {
                this.style.transform = 'scale(1)';
            });
        });
    });
</script>
   