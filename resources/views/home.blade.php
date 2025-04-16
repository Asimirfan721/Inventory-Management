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
            <li class="mt-4">
                <a data-bs-toggle="collapse" href="#userSubmenu" role="button" aria-expanded="false" aria-controls="userSubmenu" class="btn btn-secondary w-100 text-start">
                    Currency Management ▾
                </a>
                <div class="collapse" id="userSubmenu">
                    <ul class="list-unstyled ps-3 mt-2">
                        <li><a href="{{ route('currency.create') }}" class="text-white d-block mb-1">Add Currency</a></li>
                        <li><a href="{{ route('currency.index') }}" class="text-white d-block mb-1">Browse Currency</a></li>
                    </ul>
                </div>
            </li>
            
            <li class="mt-4">
    <a data-bs-toggle="collapse" href="#companySubmenu" role="button" aria-expanded="false"aria-controles="companySubmenu" class="btn btn-primary w-100 text-start">
        Company Management ▾
    </a>
    <div class="collapse" id="companySubmenu">
        <ul class="list-unstyled ps-3 mt-2">
            <li><a href="{{ route('company.create') }}" class="text-white d-block mb-1">Add Company</a></li>
            <li><a href="{{ route('company.index') }}" class="text-white d-block mb-1">Browse Company</a></li>
</ul>
</div>
</li> 
            <li class="mt-4">
    <a data-bs-toggle="collapse" href="#productSubmenu" role="button" aria-expanded="false" aria-controls="productSubmenu" class="btn btn-secondary w-100 text-start">
        Product Management ▾
    </a>
    <div class="collapse" id="productSubmenu">
        <ul class="list-unstyled ps-3 mt-2">
            <li><a href="{{ route('product.index') }}" class="text-white d-block mb-1">Browse Product</a></li>
            <li><a href="{{ route('product.create') }}" class="text-white d-block mb-1">Add Product</a></li>
        </ul>
        </div>
    </li>
    <li class="mt-4">
        <a data-bs-toggle="collapse" href="#supplierSubmenu" role="button" aria-expanded="false" aria-controls="supplierSubmenu" class="btn btn-danger w-100 text-start">
        Supplier Management ▾
        </a>
        <div class="collapse" id="supplierSubmenu">
        <ul class="list-unstyled ps-3 mt-2">
            <li><a href="{{ route('supplier.index') }}" class="text-white d-block mb-1">Browse Supplier</a></li>
            <li><a href="{{ route('supplier.create') }}" class="text-white d-block mb-1">Add Supplier</a></li>
        </ul>
        </div>
    </li>
    <li class="mt-4">
        <a data-bs-toggle="collapse" href="#customerSubmenu" role="button" aria-expanded="false" aria-controls="customerSubmenu" class="btn btn-primary w-100 text-start">
        Customer Management ▾
        </a>
        <div class="collapse" id="customerSubmenu">
        <ul class="list-unstyled ps-3 mt-2">
            <li><a href="{{ route('customer.index') }}" class="text-white d-block mb-1">Browse Customer</a></li>
            <li><a href="{{ route('customer.create') }}" class="text-white d-block mb-1">Add Customer</a></li>
        </ul>
        </div>
    </li>
    <li class="mt-4">
        <a data-bs-toggle="collapse" href="#expenseSubmenu" role="button" aria-expanded="false" aria-controls="expenseSubmenu" class="btn btn-secondary w-100 text-start">
        Expense Management ▾
        </a>
        <div class="collapse" id="expenseSubmenu">
        <ul class="list-unstyled ps-3 mt-2">
            <li><a href="{{ route('expense.index') }}" class="text-white d-block mb-1">Browse Expense</a></li>
            <li><a href="{{ route('expense.create') }}" class="text-white d-block mb-1">Add Expense</a></li>
        </ul>
        </div>
    </li>
    <li class="mt-4">
        <a data-bs-toggle="collapse" href="#accountSubmenu" role="button" aria-expanded="false" aria-controls="accountSubmenu" class="btn btn-danger w-100 text-start">
        Account Management ▾
        </a>
        <div class="collapse" id="accountSubmenu">
        <ul class="list-unstyled ps-3 mt-2">
            <li><a href="{{ route('account.index') }}" class="text-white d-block mb-1">Browse Account</a></li>
            <li><a href="{{ route('account.create') }}" class="text-white d-block mb-1">Add Account</a></li>
        </ul>
        </div>
    </li>
    <li class="mt-4">
        <a data-bs-toggle="collapse" href="#stockSubmenu" role="button" aria-expanded="false" aria-controls="stockSubmenu" class="btn btn-primary w-100 text-start">
        Stock Management ▾
        </a>
        <div class="collapse" id="stockSubmenu">
        <ul class="list-unstyled ps-3 mt-2">
            <li><a href="{{ route('stock.index') }}" class="text-white d-block mb-1">Browse Stock</a></li>
            <li><a href="{{ route('stock.create') }}" class="text-white d-block mb-1">Add Stock</a></li>
        </ul>
        </div>
    </li>
</li>

             
             
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
