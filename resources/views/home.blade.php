@extends('layouts.app')

@section('content')
<style>
    body {
        background-color:rgb(246, 241, 241);
    }
    .sidebar {
        height: 100vh;
        background-color:rgb(13, 99, 42);
        color: #fff;
        padding-top: 10px;
        position: fixed;
        width: 240px;
    }
    .sidebar h4 {
        text-align: center;
        padding-bottom: 20px;
    }
    .sidebar ul {
        list-style: none;
        padding-left: 10;
    }
    .sidebar ul li {
        padding: 10px 10px;
    }
    .sidebar ul li:hover {
        background-color: #34495e;
        cursor: pointer;
    }
    .main-content {
        margin-left: 240px;
        padding: 40px;
    }
    .topbar {
        background-color: #ecf0f1;
        padding: 10px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #ccc;
    }
    .topbar h5 {
        margin: 10;
    }
</style>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar">
        <h4>SILVER LIBERTY LLC</h4>
        <ul>
            <li>Dashboard</li>
            <li>Access</li>
            <a href="{{ route('currency.index') }}" class="btn btn-danger mt-4">Currency Managment</a>
            <a href="{{ route('company.index') }}" class="btn btn-danger mt-4">Company Management</a>
            <a href="{{ route('product.index') }}" class="btn btn-primary mt-4">Product Management</a>
            <a href="{{ route('supplier.index') }}" class="btn btn-primary mt-4">Supplier Management</a>
            <a href="{{ route('customer.index') }}" class="btn btn-primary mt-4">Customer Management</a>
            <a href="{{ route('expense.index') }}" class="btn btn-primary mt-4">Expense Management</a>
            <a href="{{ route('account.index') }}" class="btn btn-primary mt-4">Account Management</a>
            <a href="{{ route('stock.index') }}" class="btn btn-primary mt-4">Stock Management</a>
             
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content w-100">
        <div class="topbar">
            <h5>Home</h5>
            <i class="bi bi-person-circle" style="font-size: 24px;"></i>
        </div>
        <div class="p-4 bg-white rounded shadow-sm mt-4">
            <h4>Welcome Super Admin</h4>
        </div>
    </div>
</div>
@endsection
