@extends('layouts.app')

@section('content') 
<div class="container">
    <h4 class="mb-4">Add New Currency</h4>

    <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Home</a>
    <a href="{{ route('currency.index') }}" class="btn btn-primary mb-3">Back to Currency Page</a>

    <form action="{{ route('currency.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Currency</label>
            <input type="text" name="currency" class="form-control" placeholder="Name of currency" required>
        </div>

        <div class="form-group">
            <label>Code</label>
            <input type="text" name="code" class="form-control" placeholder="Shortcut code" required>
        </div>

        <button type="submit" class="btn btn-success mt-2">Add Currency</button>
    </form>
</div>
<style>
    body {
        background-color:rgb(27, 120, 213);
        font-family: 'Times New Roman', sans-serif;
    }

    .container {
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        padding: 40px;
        max-width: 900px;
        margin: 50px auto;
    }

    h4 {
        color: #343a40;
        font-weight: bold;
    }

    .btn {
        border-radius: 20px;
        padding: 10px 20px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .form-group label {
        font-weight: bold;
        color: #495057;
    }

    .form-control {
        border-radius: 20px;
        padding: 10px;
        border: 1px solid #ced4da;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        border-radius: 20px;
        padding: 10px 20px;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }
</style>

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

<style>
    .form-group label::after {
        content: '*';
        color: red;
        margin-left: 8px;
        font-size: 1.2em;
    }
</style>